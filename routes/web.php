<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
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
Route::get('courses', [CourseController::class, 'index'])->name('course.index');
Route::get('calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('community', [CommunityController::class, 'index'])->name('community.index');
Route::get('about', [AboutController::class, 'index'])->name('about.index');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('timezone', [AjaxController::class, 'timezone'])->name('timezone');

Route::get('/register-retry', function(){
    // Chrome F12 Headers - my_first_application_session=eyJpdiI6ImNnRH...
    $all_cookies = Cookie::get();
    foreach ($all_cookies as $name => $value) {
        Cookie::queue(Cookie::forget($name));
    }

    return redirect('/');
 })->name('register-retry');

