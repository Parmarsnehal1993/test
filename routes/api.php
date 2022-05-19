<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CaseStatusController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\GeneralSettingGroupController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\IncomeOutgoingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/add-asset', [AssetController::class, 'create'])->name('add_asset');
Route::get('/view-asset', [AssetController::class, 'store'])->name('view_asset');
Route::post('/update-asset/{id}', [AssetController::class, 'update'])->name('update_asset');
Route::post('/delete-asset/{id}', [AssetController::class, 'destroy'])->name('delete_asset');

Route::post('/add-case', [CaseStatusController::class, 'create'])->name('add_case');
Route::get('/view-case-status', [CaseStatusController::class, 'store'])->name('view_case_status');
Route::post('/update-case/{id}', [CaseStatusController::class, 'update'])->name('update_case');
Route::post('/delete-case/{id}', [CaseStatusController::class, 'delete'])->name('delete_case');

Route::post('/add-debt', [DebtController::class, 'create'])->name('add_debt');
Route::get('/view-debt', [DebtController::class, 'store'])->name('view_debt');
Route::post('/update-debt/{id}', [DebtController::class, 'update'])->name('update_debt');
Route::post('/delete-debt/{id}', [DebtController::class, 'destroy'])->name('delete_debt');

Route::post('/add-general-group', [GeneralSettingGroupController::class, 'create'])->name('add_general_group');
Route::get('/view-general-group', [GeneralSettingGroupController::class, 'store'])->name('view_general_group');
Route::post('/update-general-group/{id}', [GeneralSettingGroupController::class, 'update'])->name('update_general_group');
Route::post('/delete-group/{id}', [GeneralSettingGroupController::class, 'destroy'])->name('delete_group');

Route::post('/add-general-setting', [GeneralSettingController::class, 'create'])->name('add_general_setting');
Route::get('/view-general-setting', [GeneralSettingController::class, 'store'])->name('view_general_setting');
Route::post('/update-general-setting/{id}', [GeneralSettingController::class, 'update'])->name('update_general_setting');
Route::post('/delete-general-setting/{id}', [GeneralSettingController::class, 'destroy'])->name('delete_general_setting');

Route::post('/add-income-outgoing', [IncomeOutgoingController::class, 'create'])->name('add_income_outgoing');
Route::get('/view-income-outgoing', [IncomeOutgoingController::class, 'store'])->name('view_income_outgoing');
Route::post('/update-income-outgoing/{id}', [IncomeOutgoingController::class, 'update'])->name('update_income_outgoing');
Route::post('/delete-income-outgoing/{id}', [IncomeOutgoingController::class, 'destroy'])->name('delete_income_outgoing');
