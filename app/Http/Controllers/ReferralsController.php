<?php

namespace App\Http\Controllers;

use App\Models\Ledger;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ReferralsController extends Controller
{
    private $directory = "main.user.referrals.";
    private $title_singular = "Referral";
    private $title_plurar = "Referrals";

    public function index()
    {
        $directory = $this->directory;
        $title_singular = __($this->title_singular);
        $active_item = "referrals";
        $refered_by_user = User::where("referred_by", Auth::user()->id)->count();
        $earned_via_referral = to_cash_format_small(Ledger::where("user_id", Auth::user()->id)->where("type", 3)->sum("amount"));
        return view($this->directory . "index", compact('title_singular', 'directory','active_item', 'refered_by_user', 'earned_via_referral'));

    }  
}
