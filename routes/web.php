<?php

use App\Http\Controllers\TypeController;
use App\Http\Livewire\Admin\AdminEditCompanyComponent;
use App\Http\Livewire\AssetComponent;
use App\Http\Livewire\CompanyComponent;
use App\Http\Livewire\Demo\DemoDashboardComponent;
use App\Http\Livewire\Employee\EmployeeDashboardComponent;
use App\Http\Livewire\Employee\TicketsComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;



//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',HomeComponent::class)->name('home');


//For Demo
Route::middleware(['auth:sanctum', 'verified'])->group(function (){
    Route::get('/demo/dashboard',DemoDashboardComponent::class)->name('demo.dashboard');
});


//For Employee
Route::middleware(['auth:sanctum', 'verified','defaultauth'])->group(function (){
    Route::get('/employee/dashboard',EmployeeDashboardComponent::class)->name('employee.dashboard');
    Route::get('/employee/dashboard/my-tickets',TicketsComponent::class)->name('employee.my-tickets');

});

//For Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function (){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/dashboard/companies', CompanyComponent::class)->name('home.companies');
    Route::get('/admin/dashboard/assets', AssetComponent::class)->name('home.assets');
    Route::get('/admin/dashboard/companies/edit/{company_id}',AdminEditCompanyComponent::class)->name('admin.edit_company');

});