<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //     $users = User::where('role','user')->where('user_status','active')->pluck('id')->toArray();
        //     $dashboard['accepted_blance'] = Recharge::whereIn('user_id',$users)->where('status','accepted')->sum('recharge_amount');
        //     $dashboard['pending_blance'] = Recharge::where('status','pending')->sum('recharge_amount');
        //     $dashboard['pending_withdrawal'] = Withdraw::where('status','pending')->count('id');
        //     $dashboard['pending_withdrawal_amount'] = Withdraw::where('status','pending')->sum('amount');
        //     $dashboard['total_member'] = User::where('role','user')->where('user_status','active')->count('id');
        //     return view('admin.dashboard.index')->with(['dashboard'=>$dashboard]);
        return view('user.dashboard.index');
    }
}
