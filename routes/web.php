<?php

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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', function () {
    return view('user.index');
});

Route::get('/user/profile', function () {
    return view('user.profile.index');
});

Route::get('/user/profile/edit', function () {
    return view('user.profile.edit');
});

Route::get('/user/profile/changepassword', function() {
    return view('user.profile.changePassword');
});

Route::get('/user/kriteria', function() {
    return view('user.kriteria');
});

Route::get('/user/beasiswa', function() {
    return view('user.beasiswa.index');
});

Route::get('/super_admin', function() {
    return view('admin.data_admin.index');
});

Route::get('/admin/mahasiswa', function() {
    return view('admin.mahasiswa.index');
}); 

Route::get('/admin/mahasiswa/detail', function() {
    return view('admin.mahasiswa.detail');
});

Route::get('/admin/kriteria', function() {
    return view('admin.kriteria.index');
});

Route::get('/admin/periode', function() {
    return view('admin.periode.index');
});

Route::get('/admin/periode/peserta', function() {
    return view('admin.periode.peserta');
});

Route::get('/regist', function() {
    return view('register');
});

Route::get('/log', function() {
    return view('login');
});

Route::get('/reg', function() {
    return view('register');
});

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');