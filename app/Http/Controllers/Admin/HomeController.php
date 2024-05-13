<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\RegisterSingInHelper;
use App\Helpers\NotificationHelper;
use App\Models\Application;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       
        $dashboard['total'] = Application::count('id');
        $dashboard['pending'] = Application::where('status','pending')->count('id');
        $dashboard['accepted'] = Application::where('status','accepted')->count('id');
        $dashboard['rejected'] = Application::where('status','rejected')->count('id');
   
        $dashboard['activities'] = NotificationHelper::getAdminNotifications(7);
        return view('admin.dashboard.index')->with(['dashboard'=>$dashboard]);
    }

    public function updateAdmin(Request $request)
    {
        return RegisterSingInHelper::updateAdmin($request);
    }

    public function allActivityFeeds() {
        $feeds = NotificationHelper::getAdminNotifications();
        return view('admin.activity_feeds.list')->with('feeds', $feeds);
    }
}
