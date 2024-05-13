<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ProgrammeHelper;
use App\Helpers\DepartmentHelper;
class ProgrammeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getProgramme(){
        $departments = DepartmentHelper::getDepartment();
        $programmes = ProgrammeHelper::getProgramme();
        return view('admin.programme.list')
        ->with('departments',$departments)
        ->with('programmes',$programmes);
    }

    public function storeProgramme(Request $request){
        return ProgrammeHelper::storeProgramme($request);
    }
    public function getProgrammeById(Request $request){
        return ProgrammeHelper::getProgrammeById($request);
    }
    public function updateProgramme(Request $request){
        return ProgrammeHelper::updateProgramme($request);
    }
}
