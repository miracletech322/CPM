<?php

namespace App\Http\Controllers;

use App\Models\DepositRequest;
use App\Models\Ledger;
use App\Models\Payment;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WithdrawRequest;
use Auth, Hash, File, Image, Session, Str, PDF; 
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{
    private $directory = "main.user.invoice.";
    private $title_singular = "Invoice";
    private $title_plurar = "Invoices";

    public function index()
    {
        $directory = $this->directory;
        $title_plurar = __($this->title_plurar);
        $active_item = "invoice";
        return view($this->directory . "index", compact('title_plurar', 'directory','active_item'));
    } 

    public function get_deposit_listing()
    {
        
        $records = Payment::with("coin")->where("user_id", Auth::user()->id)
                            ->with('users', 'hashings', 'coinbase_payments', 'stripe_payments')
                            ->get();

                    
        return DataTables::of($records)
            ->addColumn('transaction_date', function ($records) {
                return to_date($records->created_at);
            })
            ->addColumn('transaction_id', function ($records) {
                if($records->payment_method == 1){
                    return $records->stripe_payments ? $records->stripe_payments->transaction_id : ("TRA".$records->id);
                }
                else if($records->payment_method == 3){
                    return $records->coinbase_payments ? $records->coinbase_payments->coinbase_code : ("TRA".$records->id);
                }
                else {
                    return ("TRA".$records->id);
                }
            })
            ->addColumn('payment_method', function ($records) {
                return get_payent_method($records->payment_method);
            })
            ->addColumn('total_paid', function ($records) {
                return "$".to_cash_format_small($records->amount_deposit);
            })
            ->addColumn('hashing', function ($records) {
                return $records->hashings->name;
            })
            ->addColumn('power_bought', function ($records) {
                return to_power_format($records->energy_bought)." ". $records->coin->unit;
            })
            ->addColumn('action', function ($records) {

                $show_url = url("invoice") . "/" . $records->public_id ."?type=deposit";
                $show = "<a href='$show_url' class='dropdown-item'>".__("Show Invoice")."</a>";
                return '<div class="dropdown">
                    <a href="#" class="btn btn-dark-100 btn-icon btn-sm rounded-circle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg data-name="Icons/Tabler/Notification" xmlns="http://www.w3.org/2000/svg" width="13.419" height="13.419" viewBox="0 0 13.419 13.419">
                            <rect data-name="Icons/Tabler/Dots background" width="13.419" height="13.419" fill="none"></rect>
                            <path d="M0,10.4a1.342,1.342,0,1,1,1.342,1.342A1.344,1.344,0,0,1,0,10.4Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,10.4ZM0,5.871A1.342,1.342,0,1,1,1.342,7.213,1.344,1.344,0,0,1,0,5.871Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,5.871ZM0,1.342A1.342,1.342,0,1,1,1.342,2.684,1.344,1.344,0,0,1,0,1.342Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,1.342Z" transform="translate(5.368 0.839)" fill="#6c757d"></path>
                    </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                '.$show.'
                        </div>
                    </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function get_withdrawl_listing()
    {

        $records = WithdrawRequest::where("user_id", Auth::user()->id)
                            ->where("is_resolved", 1)
                            ->where("is_accepted", 1)
                            ->with('users', 'hashings', 'action_performer', 'user_banks', 'user_cryptos')
                            ->get();
                    
        return DataTables::of($records)
            ->addColumn('transaction_date', function ($records) {
                return to_date($records->created_at);
            })
            ->addColumn('transaction_id', function ($records) {
                return ("WTH".$records->id);
            })
            ->addColumn('payment_method', function ($records) {
                return get_payent_method($records->payment_method);
            })
            ->addColumn('total_paid', function ($records) {
                return "$".to_cash_format_small($records->amount_withdraw);
            })
            ->addColumn('action', function ($records) {

                $model_body = __("No record found.");
                $model_header = __("Details");
                if($records->payment_method == 2 && $records->user_banks){
                    //Bank
                    $model_header = __("Bank Details");
                    $model_body = "<div><p><b>".__("Account Holder Name").": </b>".$records->user_banks->account_holder_name."<br><b>".__("Account Number").": </b>".$records->user_banks->account_number."<br><b>".__("Country").": </b>".$records->user_banks->country."<br><b>".__("Bank Currency").": </b>".$records->user_banks->bank_currency."<br><b>".__("Bank Name").": </b>".$records->user_banks->bank_name."<br><b>".__("Branch Name").": </b>".$records->user_banks->branch_name."<br><b>".__("Swift Code / BIC").": </b>".$records->user_banks->swift_bic."<br><b>".__("IBAN Number").": </b>".$records->user_banks->iban_number."</p></div>";

                }else if($records->payment_method == 3 && $records->user_cryptos){
                    //Coin
                    $model_header = __("Wallet Details");
                    $model_body = "<div><p><b>".__("Crypto Option").": </b>".$records->user_cryptos->crypto_options->name."<br><b>".__("Crypto Wallet Address").": </b>".$records->user_cryptos->wallet_address."</p></div>";
                }

                $global_modal = "<a
                onclick='show_global_modal(\"" . $model_header . "\" , \"". $model_body ."\" )' class='dropdown-item'>".__("Show Details")."</a>";

                $show_url = url("invoice") . "/" . $records->public_id ."?type=withdraw";
                $show = "<a href='$show_url' class='dropdown-item'>".__("Show Invoice")."</a>";

                return '<div class="dropdown">
                    <a href="#" class="btn btn-dark-100 btn-icon btn-sm rounded-circle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg data-name="Icons/Tabler/Notification" xmlns="http://www.w3.org/2000/svg" width="13.419" height="13.419" viewBox="0 0 13.419 13.419">
                            <rect data-name="Icons/Tabler/Dots background" width="13.419" height="13.419" fill="none"></rect>
                            <path d="M0,10.4a1.342,1.342,0,1,1,1.342,1.342A1.344,1.344,0,0,1,0,10.4Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,10.4ZM0,5.871A1.342,1.342,0,1,1,1.342,7.213,1.344,1.344,0,0,1,0,5.871Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,5.871ZM0,1.342A1.342,1.342,0,1,1,1.342,2.684,1.344,1.344,0,0,1,0,1.342Zm1.15,0a.192.192,0,1,0,.192-.192A.192.192,0,0,0,1.15,1.342Z" transform="translate(5.368 0.839)" fill="#6c757d"></path>
                    </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" style="margin: 0px;">
                                '.$global_modal. $show.'
                        </div>
                    </div>';


              
            })
            ->rawColumns(['action', 'account_used'])
            ->make(true);
    }


    public function show($public_id, Request $request){
        
        $directory = $this->directory;
        $title_singular = __($this->title_singular);
        $active_item = "invoice";
        $setting = Setting::first();

        if(!isset($request->type))
            return redirect()->back()->with("error", __("Invoice not found."));

        if($request->type != "withdraw" && $request->type != "deposit")
            return redirect()->back()->with("error", __("Invoice not found."));

        $type = $request->type;
        if($request->type == "withdraw"){
            $record = WithdrawRequest::where("user_id", Auth::user()->id)
                        ->where("is_resolved", 1)
                        ->where("is_accepted", 1)
                        ->with('users', 'hashings', 'action_performer', 'user_banks', 'user_cryptos')
                        ->where("public_id", $public_id)
                        ->first();

            if(!$record)
                return redirect()->back()->with("error", __("Invoice not found."));

            $data["date_title"] = __("Withdrawal Date");
            $data["total"] = __("Withdrawal");
            $data["method"] = __("Withdrawal Method");
            $data["method_text"] = get_withdraw_method($record->payment_method);
            $data["by"] = __("Paid By");
            $data["status"] = __("Withdrawn");
            $data["invoice_letter"] = "W";
            $data["cash"] = to_cash_format_small($record->amount_withdraw);
            $data["transaction_id"] = "WTH".$record->id;
            $data["table_data"] = "<tr>
                                        <td class='text-bold-800'>Sub Total</td>
                                        <td class='text-bold-800 text-right'>$".to_cash_format_small($data['cash'])."</td>
                                    </tr>
                                    <tr>
                                        <td class='text-bold-800'>VAT</td>
                                        <td class='text-bold-800 text-right'>".($record->vat ?? 0)."%</td>
                                    </tr>
                                    <tr>
                                        <td class='text-bold-800'>Total</td>
                                        <td class='text-bold-800 text-right'>$". to_cash_format_small( (($data['cash']/100)*(100-$record->vat)) ) ."</td>
                                    </tr>";

        }
        else{
            $record = Payment::where("user_id", Auth::user()->id)
                            ->with('users', 'hashings', 'coinbase_payments', 'stripe_payments')
                            ->where("public_id", $public_id)
                            ->first();

            if(!$record)
                return redirect()->back()->with("error", __("Invoice not found."));

            $data["date_title"] = __("Payment Date");
            $data["total"] = __("Deposit");
            $data["method"] = __("Payment Method");
            $data["method_text"] = get_payent_method($record->payment_method);
            $data["by"] = __("Paid To");
            $data["status"] = __("Paid");
            $data["invoice_letter"] = "D";
            $data["cash"] = to_cash_format_small($record->amount_deposit);
            $data["transaction_id"] = "TRA".$record->id;
            if($record->payment_method == 1){
                $data["transaction_id"] = $record->stripe_payments->transaction_id ?? $data["transaction_id"];
            }
            else if($record->payment_method == 3){
                $data["transaction_id"]  = $record->coinbase_payments->coinbase_code ?? $data["transaction_id"];
            }

            $data["table_data"] = "<tr>
                                        <td class='text-bold-800'>Total</td>
                                        <td class='text-bold-800 text-right'>$".to_cash_format_small($data['cash'])."</td>
                                    </tr>";

        }

        return view($this->directory . "show", compact('title_singular', 'directory','active_item', 'record', 'setting', 'type', 'data'));
    }

    public function pdf($public_id, Request $request){

        $directory = $this->directory;
        $title_singular = __($this->title_singular);
        $active_item = "invoice";
        $setting = Setting::first();

        if(!isset($request->type))
            return redirect()->back()->with("error", __("Invoice not found."));

        if($request->type != "withdraw" && $request->type != "deposit")
            return redirect()->back()->with("error", __("Invoice not found."));

        $type = $request->type;
        if($request->type == "withdraw"){
            $record = WithdrawRequest::where("user_id", Auth::user()->id)
                        ->where("is_resolved", 1)
                        ->where("is_accepted", 1)
                        ->with('users', 'hashings', 'action_performer', 'user_banks', 'user_cryptos')
                        ->where("public_id", $public_id)
                        ->first();

            if(!$record)
                return redirect()->back()->with("error", __("Invoice not found."));

            $data["date_title"] = __("Withdrawal Date");
            $data["total"] = __("Withdrawal");
            $data["method"] = __("Withdrawal Method");
            $data["method_text"] = get_withdraw_method($record->payment_method);
            $data["by"] = __("Paid By");
            $data["status"] = __("Withdrawn");
            $data["invoice_letter"] = "W";
            $data["cash"] = to_cash_format_small($record->amount_withdraw);
            $data["transaction_id"] = "WTH".$record->id;
            $data["table_data"] = "<tr>
                                        <td class='text-bold-800'>Sub Total</td>
                                        <td class='text-bold-800 text-right'>$".to_cash_format_small($data['cash'])."</td>
                                    </tr>
                                    <tr>
                                        <td class='text-bold-800'>VAT</td>
                                        <td class='text-bold-800 text-right'>".($record->vat ?? 0)."%</td>
                                    </tr>
                                    <tr>
                                        <td class='text-bold-800'>Total</td>
                                        <td class='text-bold-800 text-right'>$". to_cash_format_small( (($data['cash']/100)*(100-$record->vat)) ) ."</td>
                                    </tr>";

        }
        else{
            $record = Payment::where("user_id", Auth::user()->id)
                            ->with('users', 'hashings', 'coinbase_payments', 'stripe_payments')
                            ->where("public_id", $public_id)
                            ->first();

            if(!$record)
                return redirect()->back()->with("error", "Invoice not found.");

            $data["date_title"] = __("Payment Date");
            $data["total"] = __("Deposit");
            $data["method"] = __("Payment Method");
            $data["method_text"] = get_payent_method($record->payment_method);
            $data["by"] = __("Paid To");
            $data["status"] = __("Paid");
            $data["invoice_letter"] = "D";
            $data["cash"] = to_cash_format_small($record->amount_deposit);
            $data["transaction_id"] = "TRA".$record->id;
            if($record->payment_method == 1){
                $data["transaction_id"] = $record->stripe_payments->transaction_id ?? $data["transaction_id"];
            }
            else if($record->payment_method == 3){
                $data["transaction_id"]  = $record->coinbase_payments->coinbase_code ?? $data["transaction_id"];
            }

            $data["table_data"] = "<tr>
                                        <td class='text-bold-800'>Total</td>
                                        <td class='text-bold-800 text-right'>$".to_cash_format_small($data['cash'])."</td>
                                    </tr>";

        }

        // return view($this->directory . "pdf", compact('title_singular', 'directory','active_item', 'record', 'setting', 'type', 'data'));

        $pdf = PDF::loadView($this->directory . "pdf", compact('title_singular', 'directory','active_item', 'record', 'setting', 'type', 'data'));

        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $canvas->page_text(270, 800, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));

        $current_date = strtotime(date("Y-m-d h:i:sa"));
        $fileName = "user_invoice_" . $current_date . ".pdf";
        return $pdf->download($fileName);

    }

}
