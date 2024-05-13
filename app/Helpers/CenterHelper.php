<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Center;
use App\Helpers\DatetimeHelper;
use Exception;
class CenterHelper
{
    public static function getCenter()
    {
        DB::beginTransaction();
        try {
            $center = Center::orderBy('created_at','asc')->get();
            $sr=0;
            $centerList= [];
            if(count($center) > 0) {
                foreach ($center as $key => $list) {
                    $sr++;

                    $centerList[$key] = new \stdClass();
                    $centerList[$key]->sr = $sr;
                    $centerList[$key]->id = $list->id;
                    $centerList[$key]->name = $list->name;
                    $centerList[$key]->email = $list->email;
                    $centerList[$key]->contact = $list->contact;
                    $centerList[$key]->created_at = $list->created_at;
                }
            }
            DB::commit();
            return $centerList;
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }
    public static function getCenterById($request)
    {
        DB::beginTransaction();
        try {
            $center = Center::where('id',$request->id)->first();
            if(!empty($center)) {
               
                $centerList = new \stdClass();
                $centerList->id = $center->id;
                $centerList->name = $center->name;
                $centerList->email = $center->email;
                $centerList->contact = $center->contact;
            }
            DB::commit();
            return $centerList;
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }
    public static function updateCenter($request)
    {
        DB::beginTransaction();
        try {
            $center = Center::findOrFail($request->center_id);
            $center->name = $request->name;
            $center->email = $request->email;
            $center->contact = $request->contact;
            $center->updated_at = DatetimeHelper::getNow();
            $center->save();
            DB::commit();
            return ReturnToastHelper::Custom('success','Center updated.');
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }

    public static function storeCenter($request)
    {
        DB::beginTransaction();
        try {
            $center = new Center();    
            $center->name = $request->name;
            $center->email = $request->email;
            $center->contact = $request->contact;
            $center->save();
            DB::commit();
            return ReturnToastHelper::Custom('success','Center created.');
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }

}