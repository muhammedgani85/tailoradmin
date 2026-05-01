<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WhatsAppController;

// dashboard pages
Route::get('/', function () {
    return view('pages.dashboard.ecommerce', ['title' => 'E-commerce Dashboard']);
})->name('dashboard');

// calender pages
Route::get('/calendar', function () {
    return view('pages.calender', ['title' => 'Calendar']);
})->name('calendar');

// profile pages
Route::get('/profile', function () {
    return view('pages.profile', ['title' => 'Profile']);
})->name('profile');

// form pages
Route::get('/form-elements', function () {
    return view('pages.form.form-elements', ['title' => 'Form Elements']);
})->name('form-elements');

// tables pages
Route::get('/basic-tables', function () {
    return view('pages.tables.basic-tables', ['title' => 'Basic Tables']);
})->name('basic-tables');

// pages

Route::get('/blank', function () {
    return view('pages.blank', ['title' => 'Blank']);
})->name('blank');

Route::get('/taskkanban', [DashboardController::class, 'taskkanban'])->name('taskkanban');

// error pages
Route::get('/error-404', function () {
    return view('pages.errors.error-404', ['title' => 'Error 404']);
})->name('error-404');

// chart pages
Route::get('/line-chart', function () {
    return view('pages.chart.line-chart', ['title' => 'Line Chart']);
})->name('line-chart');

Route::get('/bar-chart', function () {
    return view('pages.chart.bar-chart', ['title' => 'Bar Chart']);
})->name('bar-chart');


// authentication pages
Route::get('/signin', function () {
    return view('pages.auth.signin', ['title' => 'Sign In']);
})->name('signin');

Route::get('/signup', function () {
    return view('pages.auth.signup', ['title' => 'Sign Up']);
})->name('signup');

// ui elements pages
Route::get('/alerts', function () {
    return view('pages.ui-elements.alerts', ['title' => 'Alerts']);
})->name('alerts');

Route::get('/avatars', function () {
    return view('pages.ui-elements.avatars', ['title' => 'Avatars']);
})->name('avatars');

Route::get('/badge', function () {
    return view('pages.ui-elements.badges', ['title' => 'Badges']);
})->name('badges');

Route::get('/buttons', function () {
    return view('pages.ui-elements.buttons', ['title' => 'Buttons']);
})->name('buttons');

Route::get('/image', function () {
    return view('pages.ui-elements.images', ['title' => 'Images']);
})->name('images');

Route::get('/videos', function () {
    return view('pages.ui-elements.videos', ['title' => 'Videos']);
})->name('videos');

//Customer routes
/* Route::get('/customerlist', function () {
    return view('customers.customerlist', ['title' => 'Customer List']);
})->name('customerlist'); */

Route::get('/orderlist', function () {
    return view('orders.orderlist', ['title' => 'Order List']);
})->name('orderlist');


Route::get('/deliverylist', function () {
    return view('delivery.deliverylist', ['title' => 'Delivery List']);
})->name('deliverylist');

Route::get('/delivered', function () {
    return view('delivery.delivered', ['title' => 'Delivered']);
})->name('delivered');

Route::get('/deliverytracking', function () {
    return view('delivery.deliverytracking', ['title' => 'Delivery Tracking']);
})->name('deliverytracking');

Route::get('/tailororder', function () {
    return view('orders.tailororder', ['title' => 'Tailor Order']);
})->name('tailororder');

Route::get('/analyticsorder', function () {
    return view('analytics.orders', ['title' => 'Orders']);
})->name('analyticsorder');

Route::get('/workbalanceanalytics', function () {
    return view('analytics.workbalance', ['title' => 'Orders']);
})->name('workbalanceanalytics');

/* Route::get('/tailorlist', function () {
    return view('taillors.tailorlist', ['title' => 'Tailor List']);
})->name('tailorlist'); */

/* Route::get('/types', function () {
    return view('settings.types.typelist', ['title' => 'Types']);
})->name('types'); */

/* Route::get('/workflow', function () {
    return view('settings.workflow.workflowlist', ['title' => 'Types']);
})->name('workflow'); */


Route::get('/orderreport', function () {
    return view('reports.order_report', ['title' => 'Order Report']);
})->name('orderreport');

Route::get('/dueorders', function () {
    return view('orders.dueorderlist', ['title' => 'Due Order']);
})->name('dueorders');


Route::get('/orderstatus', function () {
    return view('orders.orderstatus', ['title' => 'Blank']);
})->name('orderstatus');

Route::get('/support', function () {
    return view('settings.common.contactus', ['title' => 'Support']);
})->name('support');


/* Route::get('/addorder', function () {
    return view('orders.addorder', ['title' => 'Add Order']);
})->name('addorder'); */


Route::get('/printorder', function () {
    return view('orders.printorderlist', ['title' => 'Print Order']);
})->name('printorder');



Route::any('/whatsapp/send', [WhatsAppController::class, 'send'])->name('whatsapp.send');


/** Types Routes */


Route::get('/types', [TypeController::class,'index']);
Route::post('/types', [TypeController::class,'store']);
Route::get('/types/{id}/edit', [TypeController::class,'edit']);
Route::put('/types/{id}', [TypeController::class,'update']);
Route::delete('/types/{id}', [TypeController::class,'destroy']);
Route::post('/types/toggle-status', [TypeController::class,'toggleStatus']);



// Work Flow Routes
Route::get('/workflow', [WorkflowController::class,'index']);
Route::post('/workflow', [WorkflowController::class,'store']);
Route::get('/workflow/{id}/edit', [WorkflowController::class,'edit']);
Route::put('/workflow/{id}', [WorkflowController::class,'update']);
Route::delete('/workflow/{id}', [WorkflowController::class,'destroy']);
Route::post('/workflow/toggle-status', [WorkflowController::class,'toggleStatus']);

// Customer Routes

// LIST PAGE
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

// STORE (AJAX)
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

// EDIT (GET SINGLE DATA)
Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');

// UPDATE
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');

// DELETE
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.delete');

Route::post('/customers/toggle-status', [CustomerController::class, 'toggleStatus']);

Route::post('/customers/newstore', [CustomerController::class, 'newstore'])->name('customers.newstore');


//  Tailors Routes
Route::get('/tailors',[Tailors::class,'index']);
Route::post('/tailors',[Tailors::class,'store'])->name('tailors.store');
Route::get('/tailors/{id}/edit',[Tailors::class,'edit']);
Route::put('/tailors/{id}',[Tailors::class,'update']);
Route::post('/tailors/toggle-status',[Tailors::class,'toggleStatus']);
Route::get('/tailors/workbalance',[Tailors::class,'workbalance'])->name('tailors.workbalance');
Route::post('/workflow/save-types',[WorkflowController::class,'saveTypes'])->name('workflow.save-types');

Route::get('/orders',[OrderController::class,'index']);
Route::post('/orders',[OrderController::class,'store'])->name('orders.store');

Route::get('/orders/{id}/edit',[OrderController::class,'edit']);
Route::put('/orders/{id}',[OrderController::class,'update']);
Route::delete('/orders/{id}',[OrderController::class,'destroy']);
Route::get('/orders/addorder',[OrderController::class,'addorder'])->name('orders.addorder');
Route::get('/customers/search', [CustomerController::class, 'search']);

//Routes Types

Route::get('/types/{id}/measurements', [MeasurementController::class, 'getMeasurements']);































