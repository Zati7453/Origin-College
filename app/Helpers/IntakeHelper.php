<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Programme;
use App\Models\Intake;
use App\Helpers\DatetimeHelper;
use Exception;
class IntakeHelper
{
    public static function getIntake()
    {
        DB::beginTransaction();
        try {
            $intake = Intake::orderBy('created_at','asc')->get();
            $sr=0;
            $intakeList= [];
            if(count($intake) > 0) {
                foreach ($intake as $key => $list) {
                    $department = Department::where('id',$list->dep_id)->first();
                    $programme = Programme::where('id',$list->pro_id)->first();
                    $sr++;

                    $intakeList[$key] = new \stdClass();
                    $intakeList[$key]->sr = $sr;
                    $intakeList[$key]->id = $list->id;
                    $intakeList[$key]->intake = $list->intake;
                    $intakeList[$key]->department = $department->name;
                    $intakeList[$key]->programme = $programme->name;
                    $intakeList[$key]->created_at = $list->created_at;
                }
            }
            DB::commit();
            return $intakeList;
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }
    public static function getProgrammeByDepartment($request)
    {
        DB::beginTransaction();
        try {
            $programme = Programme::where('dep_id',$request->depid)->orderBy('created_at','asc')->get();
        
            $programmeList= [];
            if(count($programme) > 0) {
                foreach ($programme as $key => $list) {
                    $programmeList[$key] = new \stdClass();
                    $programmeList[$key]->id = $list->id;
                    $programmeList[$key]->name = $list->name;
                    $programmeList[$key]->created_at = $list->created_at;
                }
            }
            DB::commit();
            return $programmeList;
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }
    public static function getIntakeByProgramme($request)
    {
        DB::beginTransaction();
        try {
            $intake = Intake::where('pro_id',$request->proid)->orderBy('created_at','asc')->get();
        
            $intakeList= [];
            if(count($intake) > 0) {
                foreach ($intake as $key => $list) {
                    $intakeList[$key] = new \stdClass();
                    $intakeList[$key]->id = $list->id;
                    $intakeList[$key]->intake = $list->intake;
                    $intakeList[$key]->created_at = $list->created_at;
                }
            }
            DB::commit();
            return $intakeList;
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }

    public static function getIntakeById($request)
    {
        DB::beginTransaction();
        try {
            $intake = Intake::where('id',$request->id)->first();
            
            if(!empty($intake)) {
               
                $department = Department::orderBy('created_at','asc')->get();
                $programme = Programme::where('dep_id',$intake->dep_id)->orderBy('created_at','asc')->get();
                $intakeList= new \stdClass();
                $intakeList->id = $intake->id;
                $intakeList->dep_id = $intake->dep_id;
                $intakeList->pro_id = $intake->pro_id;
                $intakeList->intake = $intake->intake;
                $intakeList->created_at = $intake->created_at;
                $intakeList->department = $department;
                $intakeList->programme = $programme;
               
            }
            DB::commit();
            return $intakeList;
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
    public static function updateIntake($request)
    {
        DB::beginTransaction();
        try {
            $intake = Intake::findOrFail($request->intake_id);
            $intake->dep_id= $request->department;
            $intake->pro_id= $request->programme;
            $intake->intake= $request->intake;
            $intake->updated_at = DatetimeHelper::getNow();
            $intake->save();
            DB::commit();
            return ReturnToastHelper::Custom('success','Intake updated.');
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }

    public static function storeIntake($request)
    {
        DB::beginTransaction();
        try {
            $department = new Intake();    
            $department->dep_id = $request->department;
            $department->pro_id = $request->programme;
            $department->intake = $request->intake;
            $department->save();
            DB::commit();
            return ReturnToastHelper::Custom('success','Intake created.');
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }

}