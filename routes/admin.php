<?php

use App\Http\Controllers\Chart\ChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\Admin\DashboardComponent;
use App\Livewire\Admin\Auth\LoginComponent;
use App\Livewire\Admin\Users\UsersComponent;
use App\Livewire\Admin\Users\AdminsComponent;
use App\Livewire\Admin\Auth\ForgotPasswordComponent;
use App\Livewire\Admin\Auth\UpdatePasswordComponent;
use App\Livewire\Admin\Donation\DonationComponent;
use App\Livewire\Admin\FoundDog\FoundDogComponent;
use App\Livewire\Admin\LostDog\LostDogComponent;
use App\Livewire\Admin\Subscription\SubscriptionComponent;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::get('admin/login', LoginComponent::class)->middleware('guest:admin')->name('admin.login');
Route::get('admin/forget-password', ForgotPasswordComponent::class)->middleware('guest:admin')->name('admin.forgetPassword');
Route::get('admin/change-password', UpdatePasswordComponent::class)->middleware('guest:admin')->name('admin.changePassword');

Route::get('admin', DashboardComponent::class)->middleware('auth:admin');
Route::prefix('admin/')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::post('logout', [LogoutController::class, 'adminLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('lost-dogs', LostDogComponent::class)->name('lost.dogs');
    Route::get('found-dogs', FoundDogComponent::class)->name('found.dogs');

    // Donation
    Route::get('donations', DonationComponent::class)->name('donations');

    // Subscription
    Route::get('subscription', SubscriptionComponent::class)->name('subscriptions');

    // Chart Report
    Route::post('lost-dog-chart', [ChartController::class, 'lostDogs']);

    //user management
    Route::get('all-users', UsersComponent::class)->name('allUsers')->middleware('adminPermission:users_manage');
    Route::get('all-admins', AdminsComponent::class)->name('allAdmins')->middleware('adminPermission:admins_manage');
});
