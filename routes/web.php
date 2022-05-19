<?php

use App\Http\Controllers\CaseStatusController;
// use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\GeneralSettingGroupController;
use App\Http\Controllers\IncomeOutgoingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\paypalcontroller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Profile;

/*


// [9:52 am, 09/09/2021] Raj Abhishek: 1) Agent advisior
// chetanmakwana3385@gmail.com
// 123456


// s[3:14 pm, 08/09/2021] Raj Abhishek: admin@admin.com
// [3:14 pm, 08/09/2021] Raj Abhishek: Admin@3385

// 2) DMP advisior
// dmp1@mailinator.com
// 123456

// 3) IVA advisior
// iva3385@gmail.com
// 123456
// [9:55 am, 09/09/2021] Raj Abhishek: 7496759188


// manager123@gmail.com
// 123456

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/new', function () {
    return view('new');
});

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/time', function () {
    echo date('Y-m-d H:i:s');
});

Auth::routes();
Route::get('/profile', Profile::class);

Route::view('ass', 'asset_live');

Route::get('/home', [HomeController::class, 'index'])->name('home');
//for case status
Route::get('/case-statuses', [CaseStatusController::class, 'index'])->name('case_status');
Route::post('/add-case', [CaseStatusController::class, 'create'])->name('add_case');
Route::get('/view-case-status', [CaseStatusController::class, 'store'])->name('view_case_status');
Route::post('/all-case-status', [CaseStatusController::class, 'allCaseStatus'])->name('all_case_status');
Route::get('/edit-case/{records}', [CaseStatusController::class, 'edit'])->name('edit_case');
Route::post('/update-case/{id}', [CaseStatusController::class, 'update'])->name('update_case');
Route::post('/delete-case/{id}', [CaseStatusController::class, 'delete'])->name('delete_case');
Route::post('/delete-all', [CaseStatusController::class, 'deleteAll'])->name('delete_all');
Route::post('/active-all', [CaseStatusController::class, 'activeAll'])->name('active_all');
Route::post('/inactive-all', [CaseStatusController::class, 'inactiveAll'])->name('inactive_all');



//for debt type
Route::get('/debts', [DebtController::class, 'index'])->name('debt');
Route::post('/add-debt', [DebtController::class, 'create'])->name('add_debt');
Route::get('/view-debt', [DebtController::class, 'store'])->name('view_debt');
Route::post('/all-debt-type', [DebtController::class, 'allDebtType'])->name('all_debt_type');
Route::get('/edit-debt/{records}', [DebtController::class, 'edit'])->name('edit_debt');
Route::post('/update-debt/{id}', [DebtController::class, 'update'])->name('update_debt');
Route::post('/delete-debt/{id}', [DebtController::class, 'destroy'])->name('delete_debt');
Route::post('/delete-all-debt', [DebtController::class, 'deleteAllDebt'])->name('delete_all_debt');

//for assets
Route::get('/assets', [AssetController::class, 'index'])->name('asset');
Route::post('/add-asset', [AssetController::class, 'create'])->name('add_asset');
Route::post('/all-asset', [AssetController::class, 'allAssets'])->name('all_asset');
Route::get('/view-asset', [AssetController::class, 'store'])->name('view_asset');
Route::get('/edit-asset/{records}', [AssetController::class, 'edit'])->name('edit_asset');
Route::post('/update-asset/{id}', [AssetController::class, 'update'])->name('update_asset');
Route::post('/delete-asset/{id}', [AssetController::class, 'destroy'])->name('delete_asset');
Route::post('/delete-all-asset', [AssetController::class, 'deleteAllasset'])->name('delete_all_asset');

//for general setting groups
Route::get('/general-setting-groups', [GeneralSettingGroupController::class, 'index'])->name('general_setting_group');
Route::post('/add-general-group', [GeneralSettingGroupController::class, 'create'])->name('add_general_group');
Route::post('/all-general-setting-group', [GeneralSettingGroupController::class, 'AllGeneralSettingGroup'])->name('general_setting_group');
Route::get('/view-general-group', [GeneralSettingGroupController::class, 'store'])->name('view_general_group');
Route::get('/edit-group/{records}', [GeneralSettingGroupController::class, 'edit'])->name('edit_group');
Route::post('/update-general-group/{id}', [GeneralSettingGroupController::class, 'update'])->name('update_general_group');
Route::post('/delete-group/{id}', [GeneralSettingGroupController::class, 'destroy'])->name('delete_group');
Route::post('/delete-multiple-group', [GeneralSettingGroupController::class, 'deleteMultipleGroup'])->name('delete_multiple_group');


//for general settings
Route::get('/general-settings', [GeneralSettingController::class, 'index'])->name('general_setting');
Route::post('/add-general-setting', [GeneralSettingController::class, 'create'])->name('add_general_setting');
Route::post('/all-general-setting', [GeneralSettingController::class, 'AllGeneralSetting'])->name('general_setting');
Route::get('/view-general-setting', [GeneralSettingController::class, 'store'])->name('view_general_setting');
Route::get('/edit-setting/{records}', [GeneralSettingController::class, 'edit'])->name('edit_setting');
Route::post('/update-general-setting/{id}', [GeneralSettingController::class, 'update'])->name('update_general_setting');
Route::post('/delete-general-setting/{id}', [GeneralSettingController::class, 'destroy'])->name('delete_general_setting');
Route::post('/delete-multiple-setting', [GeneralSettingController::class, 'deleteMultipleSetting'])->name('delete_multiple_setting');

//for income outgoing
Route::get('/income-outgoings', [IncomeOutgoingController::class, 'index'])->name('income_outgoing');
Route::post('/add-income-outgoing', [IncomeOutgoingController::class, 'create'])->name('add_income_outgoing');
Route::post('/all-income-outgoings', [IncomeOutgoingController::class, 'allIncomeOutgoings'])->name('all_income_outgoing');
Route::get('/view-income-outgoing', [IncomeOutgoingController::class, 'store'])->name('view_income_outgoing');
Route::get('/edit-income-outgoing/{id}', [IncomeOutgoingController::class, 'edit'])->name('edit_income_outgoing');
Route::post('/update-income-outgoing/{id}', [IncomeOutgoingController::class, 'update'])->name('update_income_outgoing');
Route::post('/delete-income-outgoing/{id}', [IncomeOutgoingController::class, 'destroy'])->name('delete_income_outgoing');
Route::post('/delete-multiple-question', [IncomeOutgoingController::class, 'deleteMultipleQuestion'])->name('delete_multiple_question');
Route::post('/show', [IncomeOutgoingController::class, 'show'])->name('show');
Route::get('/showType/{id?}', [IncomeOutgoingController::class, 'showType'])->name('showType');

//for super-admin Dash-board user

// Route::get('/admin-workflow', [UserController::class, 'index'])->name('admin_workflow');
// Route::get('/agent-adviser-workflow', [UserController::class, 'agent'])->name('agent_adviser_workflow');
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/manager-workflow', [UserController::class, 'create'])->name('manager_workflow');
Route::get('/compliance-manager-workflow', [UserController::class, 'store'])->name('compliance_manager_workflow');
Route::get('/compliance-agent-workflow', [UserController::class, 'complianceAgent'])->name('compliance_agent_workflow');
Route::get('/debt-manager-workflow', [UserController::class, 'debtManager'])->name('debt_manager_workflow');
Route::get('/list/data/{data_text?}', [UserController::class, 'list_inprocess_awaiting_data'])->name('inprocess_awaiting_data');
Route::get('/user/filter_da_data', [UserController::class, 'filter_da_data'])->name('filter_data');



Route::get('/payment-with-instamojo', [UserController::class, 'payment'])->name('payment');
Route::get('/instamojo', [UserController::class, 'instamojo'])->name('instamojo');

Route::get('event', [PaymentController::class, 'index'])->name('payment');
Route::post('pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('pay-success', [PaymentController::class, 'success'])->name('pay_success');


Route::get('/products', [ProductController::class, 'productList'])->name('products.list');
Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

// Route::get('payment', [PaypalController::class, 'payment'])->name('payment');
// Route::get('payment/success', [PaypalController::class, 'success'])->name('payment.success');
// Route::get('cancel', [PaypalController::class, 'cancel'])->name('payment.cancel');

Route::get('paywithpaypal', [PaypalController::class, 'payWithPaypal']);
Route::post('paypal', [PaypalController::class, 'postPaymentWithpaypal'])->name('paypal');
Route::get('paypal', [PaypalController::class, 'getPaymentStatus'])->name('status');

// Route::get('handle-payment', [PaypalController::class, 'handlePayment'])->name('make.payment');
// Route::get('cancel-payment', [PaypalController::class, 'paymentCancel'])->name('cancel.payment');
// Route::get('payment-success', [PaypalController::class, 'paymentSuccess'])->name('success.payment');

// Route::get(uri:'/');
Route::get('/', function () {
    dispatch(new \App\Jobs\MatchSendEmail())->delay(now());
    echo 'mail sent';
});
Route::get('send-test-email', [EmailController::class, 'sendEmail']);
// Route::post('/payment', [PaypalController::class, 'payWithpaypal']);
// Route::get('/payment/status', [PaypalController::class, 'getPaymentStatus']);

// Route::get('paywithpaypal', array('as' => 'paywithpaypal', 'uses' => 'PaypalController@payWithPaypal',));
// // route for post request
// Route::post('paypal', array('as' => 'paypal', 'uses' => 'PaypalController@postPaymentWithpaypal',));
// // route for check status responce
// Route::get('paypal', array('as' => 'status', 'uses' => 'PaypalController@getPaymentStatus',));
