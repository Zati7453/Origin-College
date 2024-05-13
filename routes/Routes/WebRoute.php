<?php
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;
Route::get('/', function() {
    return view('front.layouts.main');
});
Route::get('admission-application', [HomeController::Class,'index'])->name('admission_application');
Route::post('store-application', [HomeController::Class,'storeApplication'])->name('store_application');
Route::post('get-programme-by-department',[HomeController::Class,'getProgrammeByDepartment'])->name("get_programme_by_department");
Route::post('get-intake-by-programme',[HomeController::Class,'getIntakeByProgramme'])->name("get_intake_by_programme");
Route::post('get-center-info',[HomeController::Class,'getCenterInfo'])->name("get_center_info");