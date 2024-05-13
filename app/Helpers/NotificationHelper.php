<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\VreitPointsTransfer;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class NotificationHelper
{
    public static function save($data) {
        $activity = new ActivityLog();
        $activity->triggered_by = $data['triggered_by'];
        $activity->triggered_for = $data['triggered_for'];
        $activity->post_type = $data['post_type'];
        $activity->is_read = $data['is_read'];
        $activity->post_details = isset($data['post_details']) ? $data['post_details'] : null;
        $activity->ip_address = $data['ip_address'];
        $activity->checked_by = isset($data['checked_by']) ? $data['checked_by'] : DatetimeHelper::getNow();
        $activity->save();
    }
   
	public static function getAdminNotifications($count=null) {
        $post_type = ['logout','login','application','application_status'];
        if(!empty($count)) {
            $post_type = ['application','application_status'];
        }

		$data = ActivityLog::whereIn('post_type',$post_type)->take($count)->orderBy('created_at','desc')->get();

		$act = [];
		$count = 0;
		foreach ($data as $d){
            // Logout \\
            if($d->post_type == 'logout') {
                $pd = json_decode($d->post_details);
                $act['data'][] = [
                    'heading' => 'Logout',
                    'detail' => $d->post_details,
                    'is_read' => $d->is_read,
                    'date' => date('F d, Y H:i:s',strtotime($d->created_at)),
                    'route' => 'javascript:void(0)'
                ];

                if($d->is_read == 0){
                    $count ++;
                }
            }

            // Login \\
            if($d->post_type == 'login') {
                $pd = json_decode($d->post_details);
                $act['data'][] = [
                    'heading' => 'Login',
                    'detail' => $d->post_details,
                    'is_read' => $d->is_read,
                    'date' => date('F d, Y H:i:s',strtotime($d->created_at)),
                    'route' => 'javascript:void(0)'
                ];

                if($d->is_read == 0){
                    $count ++;
                }
            }

            // Withdrawal Action \\
            if($d->post_type == 'application') {
                $pd = json_decode($d->post_details);
                $act['data'][] = [
                    'heading' => 'Application Submitted',
                    'detail' => 'new application for program ' .$pd->programme.' by '.$pd->by ,
                    'is_read' => $d->is_read,
                    'date' => date('F d, Y H:i:s',strtotime($d->created_at)),
                    'route' => 'javascript:void(0)'
                ];
                if($d->is_read == 0){
                    $count ++;
                }
            }

            // Withdrawal Action by Admin \\
            if($d->post_type == 'application_status') {
                $pd = json_decode($d->post_details);

                if($pd->action == 'accepted') {
                    $heading = 'Application Accepted';
                    $details = $pd->by.' is accepted the application  for user '.$pd->for;
                } elseif($pd->action == 'rejected') {
                    $heading = 'Application Rejected';
                    $details = $pd->by.' is rejected the application  for user '.$pd->for;
                } 

                $act['data'][] = [
                    'heading' => $heading,
                    'detail' => $details,
                    'is_read' => $d->is_read,
                    'date' => date('F d, Y H:i:s',strtotime($d->created_at)),
                    'route' =>'javascript:void(0)'
                ];
                if($d->is_read == 0){
                    $count ++;
                }
            }
        }

		$act['count'] = $count;
		return $act;
	}

  

}
