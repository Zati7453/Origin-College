<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Programme;
use App\Helpers\DatetimeHelper;
use Exception;
class ProgrammeHelper
{
    public static function getProgramme()
    {
        DB::beginTransaction();
        try {
            $programme = Programme::orderBy('created_at','asc')->get();
            $sr=0;
            $programmeList= [];
            if(count($programme) > 0) {
                foreach ($programme as $key => $list) {
                    // $department = Department::where('id',$list->dep_id)->first();
                    $sr++;

                    $programmeList[$key] = new \stdClass();
                    $programmeList[$key]->sr = $sr;
                    $programmeList[$key]->id = $list->id;
                    // $programmeList[$key]->dep_name = $department->name;
                    $programmeList[$key]->pro_name = $list->name;
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
    public static function getProgrammeById($request)
    {
        DB::beginTransaction();
        try {
            $programme = Programme::where('id',$request->id)->first();
            if(!empty($programme)) {
                $department = Department::orderBy('created_at','asc')->get();
                $programmeList = new \stdClass();
                $programmeList->id = $programme->id;
                $programmeList->dep_id = $programme->dep_id;
                $programmeList->name = $programme->name;
                $programmeList->department = $department;
            }
            DB::commit();
            return $programmeList;
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }
    public static function updateProgramme($request)
    {
        DB::beginTransaction();
        try {
            $department = Programme::findOrFail($request->pro_id);
            // $department->dep_id = $request->dep;
            $department->name = $request->pro_name;
            $department->updated_at = DatetimeHelper::getNow();
            $department->save();
            DB::commit();
            return ReturnToastHelper::Custom('success','Programme updated.');
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }

    public static function storeProgramme($request)
    {
        DB::beginTransaction();
        try {
            $department = new Programme();    
            // $department->dep_id = $request->dep;
            $department->name = $request->pro_name;
            $department->save();
            DB::commit();
            return ReturnToastHelper::Custom('success','Programme created.');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return ReturnToastHelper::Failed();
        }
    }

}