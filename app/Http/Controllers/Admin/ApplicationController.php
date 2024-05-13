<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApplicationHelper;
class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPendingApplication(){
        $applications = ApplicationHelper::getApplication('pending');
        return view('admin.applications.pending_list')
        ->with('applications',$applications);
    }
    public function getAcceptedApplication(){
        $applications = ApplicationHelper::getApplication('accepted');
        return view('admin.applications.accepted_list')
        ->with('applications',$applications);
    }
    public function getRejectedApplication(){
        $applications = ApplicationHelper::getApplication('rejected');
        return view('admin.applications.rejected_list')
        ->with('applications',$applications);
    }
    public function viewApplication($id){
        $application = ApplicationHelper::viewApplication($id);
        return view('admin.applications.view')
        ->with('application',$application);
    }
    public function updateApplication(Request $request){
        return ApplicationHelper::updateApplication($request);
        
    }
}
