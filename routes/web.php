<?php

use App\Livewire\App\ContactUs\ContactUsComponent;
use App\Livewire\App\Donation\DonationComponent;
use App\Livewire\App\FoundDog\FoundDogComponent;
use App\Livewire\App\HomeComponent;
use App\Livewire\App\LostDog\LostDogComponent;
use App\Livewire\App\Pages\AboutUsComponent;
use App\Livewire\App\Pages\PricingComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeComponent::class)->name('app.home');
Route::get('/about-us', AboutUsComponent::class)->name('app.aboutus');
Route::get('/lost-dogs', LostDogComponent::class)->name('app.lost.dogs');
Route::get('/found-dogs', FoundDogComponent::class)->name('app.found.dogs');
Route::get('/pricing', PricingComponent::class)->name('app.pricing');
Route::get('/donation', DonationComponent::class)->name('app.donation');
Route::get('/contact-us', ContactUsComponent::class)->name('app.contact');

//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/vendor.php';
require __DIR__ . '/user.php';
