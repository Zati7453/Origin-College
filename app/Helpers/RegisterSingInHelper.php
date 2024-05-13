<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use App\Models\Node;
use App\Models\UserBlock;
use Illuminate\Support\Facades\Hash;

use Exception;
class RegisterSingInHelper
{

    public static function getSignupMessage($token)
    {
        try {
            $exploded_token = explode("__", $token);
            $username = User::where('name',$exploded_token[0])->first();
            // $token_message['message'] = ResponseHelper::validToken($username->name . ",<br> " . $username->user_profile->first_name . " " . $username->user_profile->last_name);
            $token_message['user'] = $username->name;

        } catch(Exception $e) {
            // $token_message['message'] = ResponseHelper::$inValidToken;
            $token_message['user'] = null;
        }
        return $token_message;
    }

    public static function userRegister($request)
    {
        DB::beginTransaction();
        try { 
            $user_email = User::where('email',$request->useremail)->first();
            if(!empty($user_email)){
                return ReturnToastHelper::Custom('danger' , 'Email already exist.');
            }

            $userRegister = new User();
            $userRegister->name = $request->username;
            $userRegister->email = $request->useremail;
            $userRegister->phone_no = $request->userphone;
            $userRegister->password =  Hash::make($request->userpassword);
            $userRegister->save();
            if(!empty($request->sponsor)) {
                $sponser_id = User::where('name',$request->sponsor)->first();
                $node = new Node();
                $node->sponser_id = $sponser_id->id;
                $node->child_id = $userRegister->id;
                $node->save();
            }
            
            DB::commit();
            return ReturnToastHelper::Custom('success','you are registered successfully.');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();

             return ReturnToastHelper::Failed();
        }
    }

    public static function signInProcess(Request $request) {
        DB::beginTransaction();
        try {
           
            $credentials = $request->only('email', 'password');
            // dd($credentials);
            if (Auth::attempt($credentials)) {
                if(Auth::user()->role =='admin') {
                    return redirect('/admin');
                } else {
                    // if(Auth::user()->user_status == 'deleted') {
                    //     return ReturnToastHelper::Custom('danger' , 'You account have been deleted. Please contact to support.');
                    // } elseif(Auth::user()->userBlock->login_status == 'active') {
                        return redirect('/member');
                    // } else {
                    //     return ReturnToastHelper::Custom('danger' , 'You have been locked. Please contact to support.');
                    // }
                }
            } else {
                return ReturnToastHelper::Custom('danger','Email or Password is incorrect. Please try again.');
            }

            DB::commit();
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }

    public static function updateAdmin($request){
        DB::beginTransaction();
        try { 
            $admin = User::findOrFail($request->id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone_no = $request->phone;
            if(!empty($request->password)){
                $admin->password =  Hash::make($request->password);
            }
            $admin->updated_at = DatetimeHelper::getNow();
            $admin->save();
            DB::commit();
            return ReturnToastHelper::Custom('success','Profile Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return ReturnToastHelper::Failed();
        }
    }
}