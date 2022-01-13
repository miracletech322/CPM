<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\CClass;
use App\Models\Course;
use App\Models\CustomerPayment;
use App\Models\DepositRequest;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\User;
use App\Models\WithdrawRequest;
use Auth, DB;

class DashboardController extends Controller
{


    private $directory = "main.dashboard.";
    private $title_singular = "Dashboard";
    private $title_plurar = "Dashboard";


    public function index()
    {
        if (Auth::user()->role_id == 3)
            return redirect("/miners");

        $directory = $this->directory;
        $title_singular = $this->title_singular;
        $active_item = "dashboard";

        $calculationController = new CalculationController();
        $pageData = $calculationController->get_page_data();
        $total_earning = Payment::sum("amount_deposit");
        $total_users = User::where("role_id", 3)->count();
        $total_admins = User::where("role_id", 2)->count();

        $total_withdraw_requests = WithdrawRequest::where("is_resolved", 0)->count();
        $total_deposit_requests = DepositRequest::where("is_resolved", 0)->count();


        $get_power = Payment::select(
                        DB::RAW("SUM( (IF (hashing_id=1 , energy_bought, 0) ) ) as sha"),
                        DB::RAW("SUM( (IF (hashing_id=2 , energy_bought, 0) ) ) as ethash"),
                        DB::RAW("SUM( (IF (hashing_id=3 , energy_bought, 0) ) ) as equihash")
                    )
                    ->first();

        $total_power_th = $get_power->sha;
        $total_power_mh_th = $get_power->ethash > 0 ? (($get_power->ethash / 1000) / 1000) : 0;
        $total_power_kh_th = $get_power->equihash > 0 ? ((($get_power->equihash / 1000) / 1000)/ 1000) : 0;
        $total_power = $total_power_th + $total_power_mh_th + $total_power_kh_th;

        return view($this->directory . "index", compact('title_singular', 'directory', 'active_item', 'pageData', 'total_earning', 'total_users', 'total_withdraw_requests', 'total_deposit_requests', 'total_power', 'total_admins'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
