<?php
use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\IntakeController;
use App\Http\Controllers\Admin\CenterController;
use App\Http\Controllers\Admin\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('', [HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('dashboard.index');
// });
Route::get('login', [LoginController::Class,'login'])->name('login');
Route::post('login-process', [LoginController::Class,'loginProcess'])->name('login_process');

Route::get('register/{token?}', [LoginController::Class,'register'])->name('register');
Route::post('register-process',[LoginController::Class,'registerProcess'])->name("register_process");

Route::middleware(['auth'])->group(function () {
    Route::middleware(CheckRole::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('', [HomeController::class, 'index'])->name('home');
        Route::get('logout-process',[LoginController::Class,'Logout'])->name("logout_process");


        // Department
        Route::get('departments',[DepartmentController::Class,'getDepartment'])->name("department_list");
        Route::post('store-departments',[DepartmentController::Class,'storeDepartment'])->name("store_department");
        Route::post('get-dpepartment-by-id',[DepartmentController::Class,'getDepartmentById'])->name("get_dpepartment_by_id");
        Route::post('update-dpepartment',[DepartmentController::Class,'updateDepartment'])->name("update_dpepartment");

        // Programme
        Route::get('programmes',[ProgrammeController::Class,'getProgramme'])->name("programmes_list");
        Route::post('store-programme',[ProgrammeController::Class,'storeProgramme'])->name("store_programme");
        Route::post('get-programme-by-id',[ProgrammeController::Class,'getProgrammeById'])->name("get_programme_by_id");
        Route::post('update-programme',[ProgrammeController::Class,'updateProgramme'])->name("update_programme");

        //Intake
        Route::get('intakes',[IntakeController::Class,'getIntake'])->name("intake_list");
        Route::post('get-programme-by-department',[IntakeController::Class,'getProgrammeByDepartment'])->name("get_programme_by_department");
        Route::post('store-intake',[IntakeController::Class,'storeIntake'])->name("store_intake");
        Route::post('get-intake-by-id',[IntakeController::Class,'getIntakeById'])->name("get_intake_by_id");
        Route::post('update-intake',[IntakeController::Class,'updateIntake'])->name("update_intake");

        // Center
        Route::get('centers',[CenterController::Class,'getCenter'])->name("center_list");
        Route::post('store-center',[CenterController::Class,'storeCenter'])->name("store_center");
        Route::post('get-center-by-id',[CenterController::Class,'getCenterById'])->name("get_center_by_id");
        Route::post('update-center',[CenterController::Class,'updateCenter'])->name("update_center");
        
        //Application
        Route::get('pending-applications',[ApplicationController::Class,'getPendingApplication'])->name("pending_application_list");
        Route::get('accepted-applications',[ApplicationController::Class,'getAcceptedApplication'])->name("accepted_application_list");
        Route::get('rejected-applications',[ApplicationController::Class,'getRejectedApplication'])->name("rejected_application_list");
        Route::get('view-applications/{id?}',[ApplicationController::Class,'viewApplication'])->name("view_application");
        Route::post('update-application-status',[ApplicationController::Class,'updateApplication'])->name("update_application_status");


        //activity logs
        Route::get('activity-feeds',[HomeController::Class,'allActivityFeeds'])->name("activity_feeds");

        //admin profile
        Route::post('update-admin', [HomeController::class, 'updateAdmin'])->name('update_admin');
      
    });
});