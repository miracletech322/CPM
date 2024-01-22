<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\CClass;
use App\Models\CoinData;
use App\Models\Course;
use App\Models\CustomerPayment;
use App\Models\DepositRequest;
use App\Models\Hashing;
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

        $pageData =  CoinData::with("hashing")->where("is_active", 1)->get();
        $coin_data = $pageData;
        
        $total_earning = Payment::sum("amount_deposit");
        $total_users = User::where("role_id", 3)->count();
        $total_admins = User::where("role_id", 2)->count();

        $total_withdraw_requests = WithdrawRequest::where("is_resolved", 0)->count();
        $total_deposit_requests = DepositRequest::where("is_resolved", 0)->count();

        $total_power = Hashing::select(
                        "hashings.name as hashing_name",
                        "hashings.name as hashing_name",
                        DB::RAW("SUM(COALESCE(payments.energy_bought, 0)) as purchased")
                    )
                    ->leftJoin("payments", function($join) {
                        $join->on("hashings.id", "=", "payments.hashing_id");
                    })
                    ->groupBy("hashings.name")
                    ->pluck("purchased", "hashing_name")
                    ->toArray();


        return view($this->directory . "index", compact('title_singular', 'directory', 'active_item', 'pageData', 'total_earning', 'total_users', 'total_withdraw_requests', 'total_deposit_requests', 'total_power', 'total_admins', 'coin_data'));
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
