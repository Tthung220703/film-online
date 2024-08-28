<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\danhmucController;
use App\Http\Controllers\phimController;
use App\Http\Controllers\theloaiController;
use App\Http\Controllers\tapphimController;
use App\Http\Controllers\quocgiaController;

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

Route::get('/', [indexController::class, 'home'])->name('homeweb');
Route::get('/danh-muc/{slug}', [indexController::class, 'danhmuc'])->name('danhmuc');
Route::get('/quoc-gia/{slug}', [indexController::class, 'quocgia'])->name('quocgia');
Route::get('/the-loai/{slug}', [indexController::class, 'theloai'])->name('theloai');
Route::get('/phim/{slug}', [indexController::class, 'phim'])->name('phim');
Route::get('/xem-phim/{slug}/{tap}', [indexController::class, 'xemphim'])->name('xemphim');
Route::get('/tap-phim', [indexController::class, 'tapphim'])->name('tapphim');
Route::get('/namphim/{year}', [indexController::class, 'year'])->name('namphim');
route::get('/tim-kiem', [indexController::class, 'timkiem'])->name('tim-kiem');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// admin route

Route::resource('danhmuc', danhmucController::class);
Route::resource('theloai', theloaiController::class);
Route::resource('quocgia', quocgiaController::class);
Route::resource('phims', phimController::class);
Route::resource('tapphim', tapphimController::class);

Route::get('/select-tapphim', [tapphimController::class, 'selecttapphim'])->name('select-tapphim');

Route::get('/update-year-phim', [phimController::class, 'update_year']);
Route::get('/update-topview-phim', [phimController::class, 'update_topview']);
Route::get('/filter-topview-phim', [phimController::class, 'filter_topview']);
