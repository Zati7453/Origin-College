<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\DepartmentHelper;
class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDepartment(){
        $departments = DepartmentHelper::getDepartment();
        return view('admin.department.list')->with('departments',$departments);
    }
    public function storeDepartment(Request $request){
            return DepartmentHelper::storeDepartment($request);
    }
    public function getDepartmentById(Request $request){
        return DepartmentHelper::getDepartmentById($request);
    }
    public function updateDepartment(Request $request){
        return DepartmentHelper::updateDepartment($request);
    }
}
