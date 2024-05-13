<?php
use App\Http\Controllers\Member\HomeController;
use App\Http\Controllers\Member\InvestmentPlansController;
use App\Http\Controllers\Member\RechargeController;
use App\Http\Controllers\Member\WithdrawController;
use App\Http\Controllers\Member\TeamController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Member\ReportController;
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
// Route::get('/', [LoginController::Class,'login'])->name('login');
// Route::post('login-process', [LoginController::Class,'loginProcess'])->name('login_process');

// Route::get('register', [LoginController::Class,'register'])->name('register');
// Route::post('register-process',[LoginController::Class,'registerProcess'])->name("register_process");

Route::middleware(['auth'])->group(function () {
    Route::middleware(CheckRole::class)->prefix('member')->name('member.')->group(function () {
        Route::delete('impersonate', [HomeController::class, 'stopImpersonation'])->name('stop_impersonate');
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('', [HomeController::class, 'index'])->name('home');

        Route::get('logout-process',[LoginController::Class,'Logout'])->name("logout_process");

        Route::get('recharge', [RechargeController::Class,'recharge'])->name('recharge');
        Route::post('recharge-process',[RechargeController::Class,'rechargeProcess'])->name("recharge_process");
        Route::get('recharge-report', [RechargeController::Class,'rechargeReport'])->name('recharge_report');

        Route::get('investment-plans-list', [InvestmentPlansController::Class,'investmentPlanslist'])->name('investment_plans_list');
        Route::get('profit-list', [InvestmentPlansController::Class,'profitList'])->name('profit_list');
        Route::post('store-investment-plans',[InvestmentPlansController::Class,'storeInvestmentPlans'])->name("store_investment_plans");
        Route::get('user-investment-plans-list', [InvestmentPlansController::Class,'userInvestmentPlanslist'])->name('user_investment_plans_list');
        Route::get('withdrawal', [WithdrawController::Class,'withdrawal'])->name('withdrawal');
        Route::post('store-withdrawal-process', [WithdrawController::Class,'storeWithdrawalProcess'])->name('store_withdrawal_process');
        Route::get('withdrawal-history', [WithdrawController::Class,'getWithdrawRequestReport'])->name('withdrawal_history');
        Route::get('user-team', [TeamController::Class,'userTeam'])->name('user_team');
        Route::get('user-commission', [TeamController::Class,'userCommission'])->name('user_commission');
        Route::get('recevide-amount', [ReportController::Class,'getUserRecevideAmount'])->name('recevide_amount');

        Route::get('access-blocked', function () { return view('member_new.access_blocked'); })->name('access_blocked');

    });
});