<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ProgrammeHelper;
use App\Helpers\DepartmentHelper;
use App\Helpers\IntakeHelper;
use App\Helpers\CenterHelper;
use App\Helpers\ApplicationHelper;

class HomeController extends Controller
{
  function index(){
    // $departments = DepartmentHelper::getDepartment();
    // $centers = CenterHelper::getCenter();
    $programs = ProgrammeHelper::getProgramme();
    return view('front.application.application')
    ->with('programs',$programs);
  }

  public function getProgrammeByDepartment(Request $request){
    return IntakeHelper::getProgrammeByDepartment($request);
  }
  public function getIntakeByProgramme(Request $request){
    return IntakeHelper::getIntakeByProgramme($request);
  }
  public function getCenterInfo(Request $request){
    return CenterHelper::getCenterById($request);
  }
  public function storeApplication(Request $request){
    return ApplicationHelper::storeApplication($request);
  }
}
