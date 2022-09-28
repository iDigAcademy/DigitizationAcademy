<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('courses', [HomeController::class, 'courses'])->name('courses');
Route::get('calendar', [HomeController::class, 'calendar'])->name('calendar');
Route::get('community', [HomeController::class, 'community'])->name('community');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [HomeController::class, 'contact'])->name('contact.post');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/register-retry', function(){
    // Chrome F12 Headers - my_first_application_session=eyJpdiI6ImNnRH...
    $all_cookies = Cookie::get();
    foreach ($all_cookies as $name => $value) {
        Cookie::queue(Cookie::forget($name));
    }

    return redirect('/');
 })->name('register-retry');

