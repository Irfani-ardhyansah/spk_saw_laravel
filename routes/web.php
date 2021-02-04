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

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('user.index');
    });
    
    Route::get('/profile', 'User\ProfileController@index')->name('user.profile');
    
    Route::get('/profile/edit/{id}', 'User\ProfileController@edit')->name('user.profile.edit');

    Route::put('/profile/update/{id}', 'User\ProfileController@update')->name('user.profile.update');
    
    Route::get('/kriteria', function() {
        return view('user.kriteria');
    });
    
    Route::get('/beasiswa', function() {
        return view('user.beasiswa.index');
    });
    
});


Route::get('/super_admin', function() {
    return view('admin.data_admin.index');
});

//Route untuk login admin
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

//Route Group Untuk Admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('/mahasiswa', function() {
        return view('admin.mahasiswa.index');
    }); 

    Route::get('/mahasiswa/detail', function() {
        return view('admin.mahasiswa.detail');
    });

    Route::get('/kriteria', function() {
        return view('admin.kriteria.index');
    });

    Route::get('/periode', function() {
        return view('admin.periode.index');
    });

    Route::get('/periode/peserta', function() {
        return view('admin.periode.peserta');
    });

    Route::get('/periode/analisis', function() {
        return view('admin.periode.analisis');
    });

    Route::get('/periode/peserta/nilai', function() {
        return view('admin.periode.nilai');
    });

});

Route::get('/log', function() {
    return view('login');
});
