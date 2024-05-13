<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Helpers\DatetimeHelper;
use Exception;
class DepartmentHelper
{
    public static function getDepartment()
    {
        DB::beginTransaction();
        try {
            $department = Department::orderBy('created_at','asc')->get();
            $sr=0;
            $departmentList= [];
            if(count($department) > 0) {
                foreach ($department as $key => $list) {
                    $sr++;

                    $departmentList[$key] = new \stdClass();
                    $departmentList[$key]->sr = $sr;
                    $departmentList[$key]->id = $list->id;
                    $departmentList[$key]->name = $list->name;
                    $departmentList[$key]->created_at = $list->created_at;
                }
            }
            DB::commit();
            return $departmentList;
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }
    public static function getDepartmentById($request)
    {
        DB::beginTransaction();
        try {
            $department = Department::where('id',$request->id)->first();
            if(!empty($department)) {
               
                $departmentList = new \stdClass();
                $departmentList->id = $department->id;
                $departmentList->name = $department->name;
            }
            DB::commit();
            return $departmentList;
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }
    public static function updateDepartment($request)
    {
        DB::beginTransaction();
        try {
            $department = Department::findOrFail($request->dep_id);
            $department->name = $request->dep_name;
            $department->updated_at = DatetimeHelper::getNow();
            $department->save();
            DB::commit();
            return ReturnToastHelper::Custom('success','Department updated.');
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }

    public static function storeDepartment($request)
    {
        DB::beginTransaction();
        try {
            $department = new Department();    
            $department->name = $request->dep_name;
            $department->save();
            DB::commit();
            return ReturnToastHelper::Custom('success','Department created.');
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }

}