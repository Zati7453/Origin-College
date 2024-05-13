<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ProgrammeHelper;
use App\Helpers\DepartmentHelper;
use App\Helpers\IntakeHelper;
class IntakeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIntake(){
        $departments = DepartmentHelper::getDepartment();
        $programmes = ProgrammeHelper::getProgramme();
        $intakes = IntakeHelper::getIntake();
        return view('admin.intake.list')
        ->with('departments',$departments)
        ->with('programmes',$programmes)
        ->with('intakes',$intakes);
    }

    public function getProgrammeByDepartment(Request $request){
        return IntakeHelper::getProgrammeByDepartment($request);
    }
    public function storeIntake(Request $request){
        return IntakeHelper::storeIntake($request);
    }
    public function getIntakeById(Request $request){
        return IntakeHelper::getIntakeById($request);
    }
    public function updateIntake(Request $request){
        return IntakeHelper::updateIntake($request);
    }

}
