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

Route::get('/2', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('dashboard2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user', 'middleware' => ['prevent-back-history','auth']], function() {
    Route::get('/', function () {
        return view('user.index');
    });
    
    //Route Profile User
    Route::get('/profile', 'User\ProfileController@index')->name('user.profile');
    Route::get('/profile/edit/{id}', 'User\ProfileController@edit')->name('user.profile.edit');
    Route::put('/profile/update/{id}', 'User\ProfileController@update')->name('user.profile.update');
    Route::get('/profile/changepassword', 'HomeController@changePasswordForm')->name('user.changePassword.form');
    Route::post('/profile/changepassword', 'HomeController@changePassword')->name('user.changePassword');

    //Route Kriteria Halaman User
    Route::get('/kriteria', 'User\CriteriaController@index')->name('user.criteria');
    
    //Route Beasiswa Halaman User
    Route::get('/beasiswa', 'User\PeriodController@index')->name('user.period');
    Route::get('/beasiswa/{id}/daftar', 'User\PeriodController@create')->name('user.period.create');
    Route::post('/beasiswa/{id}/save', 'User\PeriodController@save')->name('user.period.save');
});


Route::get('/super_admin', 'Super_admin\AdminController@index')->name('super_admin.index');
Route::post('/super_admin/save', 'Super_admin\AdminController@save')->name('super_admin.save');
Route::get('/super_admin/delete/{id}', 'Super_admin\AdminController@delete');

//Route untuk login admin
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

//Route Group Untuk Admin
Route::group(['prefix' => 'admin', 'middleware' => ['prevent-back-history','auth:admin']], function() {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

    // Route Halaman Mahasiswa
    Route::get('/mahasiswa', 'Admin\MahasiswaController@index')->name('admin.mahasiswa'); 
    Route::get('/mahasiswa/detail/{id}', 'Admin\MahasiswaController@detail')->name('admin.mahasiswa.detail');
    Route::delete('/mahasiswa/delete/{id}', 'Admin\MahasiswaController@delete')->name('admin.mahasiswa.delete');

    // Route Halaman Kriteria
    Route::get('/kriteria', 'Admin\CriteriaController@index')->name('admin.criteria');
    Route::post('/kriteria', 'Admin\CriteriaController@save')->name('admin.criteria.save');
    Route::get('/kriteria/delete/{id}', 'Admin\CriteriaController@delete')->name('admin.criteria.delete'); //Menggunakan SweetAlert Dalam Delete
    Route::match(['get', 'post'], '/kriteria/update/{id}', 'Admin\CriteriaController@update')->name('admin.criteria.update');
    Route::post('/kriteria/weight/save', 'Admin\WeightController@save')->name('admin.criteria.weight.save');
    Route::get('/kriteria/weight/delete/{id}', 'Admin\WeightController@delete')->name('admin.criteria.weight.delete'); //Menggunakan SweetAlert Dalam Delete
    Route::match(['get', 'post'], '/kriteria/weight/update/{id}', 'Admin\WeightController@update')->name('admin.criteria.weight.update'); 

    Route::get('/periode', 'Admin\PeriodController@index')->name('admin.period');
    Route::post('/periode/save', 'Admin\PeriodController@save')->name('admin.period.save');
    Route::get('/periode/delete/{id}', 'Admin\PeriodController@delete')->name('admin.period.delete'); //Menggunakan SweetAlert Dalam Delete
    Route::match(['get', 'post'], 'periode/update/{id}', 'Admin\PeriodController@update')->name('admin.period.update');
    Route::match(['get', 'post'], 'periode/change_status/{id}', 'Admin\PeriodController@changeStatus')->name('admin.period.status');

    Route::get('/periode/{id}/peserta', 'Admin\BeasiswaController@peserta')->name('admin.beasiswa.peserta');
    Route::match(['get', 'post'], 'periode/peserta/change_status/{id}', 'Admin\BeasiswaController@changeStatus')->name('admin.beasiswa.status.peserta');
    Route::get('/periode/{period_id}/peserta/{mahasiswa_id}/nilai', 'Admin\BeasiswaController@nilai')->name('admin.beasiswa.peserta.nilai');
    Route::get('/periode/{period_id}/analisis', 'Admin\BeasiswaController@analisis')->name('admin.beasiswa.analisis');
});

Route::get('/log', function() {
    return view('login');
});
