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

Route::get('/', function() {
    return view('dashboard2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user', 'middleware' => ['prevent-back-history','auth']], function() {
    Route::get('/', 'User\DashboardController@index')->name('user.index');
    
    //Route Profile User
    Route::group(['prefix' => 'profile'], function() {
        Route::get('/{id}', 'User\ProfileController@index')->name('user.profile');
        // Route::get('/edit/{id}', 'User\ProfileController@edit')->name('user.profile.edit');
        Route::put('/update/{id}', 'User\ProfileController@update')->name('user.profile.update');
        Route::get('/changepassword', 'HomeController@changePasswordForm')->name('user.changePassword.form');
        Route::post('/changepassword', 'HomeController@changePassword')->name('user.changePassword');
    });

    //Route Kriteria Halaman User
    Route::get('/kriteria', 'User\CriteriaController@index')->name('user.criteria');
    
    //Route Beasiswa Halaman User
    Route::group(['prefix' => 'beasiswa'], function() {
        Route::get('/', 'User\PeriodController@index')->name('user.period');
        Route::get('/{id}/daftar', 'User\PeriodController@register')->name('user.period.register');
        Route::post('/{id}/save', 'User\PeriodController@save')->name('user.period.save');
    });
    

    Route::get('/pengumuman', 'User\PengumumanController@index')->name('user.pengumuman');
});

//Route untuk login admin
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

//Route Group Untuk Admin
Route::group(['prefix' => 'admin', 'middleware' => ['prevent-back-history','auth:admin']], function() {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
    
    Route::group(['middleware' => 'can:isSuper'], function() {

        Route::get('/super', 'Super_admin\AdminController@index')->name('super_admin.index');
        Route::match(['get', 'post'], '/super/update/{id}', 'Super_admin\AdminController@update')->name('super_admin.update');
        Route::post('/super/save', 'Super_admin\AdminController@save')->name('super_admin.save');
        Route::get('/super/delete/{id}', 'Super_admin\AdminController@delete');
        Route::get('/pimpinan', 'Pimpinan\PengumumanController@index')->name('pimpinan.index');
        Route::match(['get', 'post'], '/pimpinan/status/{id}', 'Pimpinan\PengumumanController@changeStatus')->name('pengumuman.update');

    });

    Route::group(['middleware' => 'can:isPimpinan'], function() {
        Route::get('/pimpinan', 'Pimpinan\PengumumanController@index')->name('pimpinan.index');
        Route::match(['get', 'post'], '/pimpinan/status/{id}', 'Pimpinan\PengumumanController@changeStatus')->name('pengumuman.update');
    });


    Route::group(['middleware' => 'can:isAdmin'], function() {

        // Route Halaman Mahasiswa
        Route::group(['prefix' => 'mahasiswa'], function() {
            Route::get('/', 'Admin\MahasiswaController@index')->name('admin.mahasiswa'); 
            Route::get('/json', 'Admin\MahasiswaController@getData')->name('admin.data.mahasiswa'); 
            Route::get('/search', 'Admin\MahasiswaController@search')->name('admin.mahasiswa.search'); 
            Route::get('/pdf', 'Admin\MahasiswaController@cetak_pdf')->name('admin.mahasiswa.pdf');
            Route::get('/detail/{id}', 'Admin\MahasiswaController@detail')->name('admin.mahasiswa.detail'); //Menggunakan SweetAlert Delete
            Route::get('/delete/{id}', 'Admin\MahasiswaController@delete')->name('admin.mahasiswa.delete');
            Route::match(['get', 'post'], '/import', 'Admin\MahasiswaController@store')->name('admin.mahasiswa.store');
        });
        

        Route::get('/dashboardUser', 'Admin\DashboardController@user')->name('admin.dashboard.user');
        Route::post('/dashboardUser/save', 'Admin\DashboardController@save')->name('admin.dashboard.user.save');
        Route::match(['get', 'post'], '/dashboardUser/update/{id}', 'Admin\DashboardController@update')->name('admin.dashboard.user.update'); 

        //Route Halaman Prodi
        Route::group(['prefix' => 'prodi'], function() {
            Route::get('/', 'Admin\ProdiController@index')->name('admin.prodi');
            Route::post('/', 'Admin\ProdiController@save')->name('admin.prodi.save');
            Route::match(['get', 'post'], '/update/{id}', 'Admin\ProdiController@update')->name('admin.prodi.update');
            Route::get('/delete/{id}', 'Admin\ProdiController@delete')->name('admin.prodi.delete');
        });


        // Route Halaman Kriteria
        Route::group(['prefix' => 'kriteria'], function() {
            Route::get('/', 'Admin\CriteriaController@index')->name('admin.criteria');
            Route::post('/', 'Admin\CriteriaController@save')->name('admin.criteria.save');
            Route::get('/delete/{id}', 'Admin\CriteriaController@delete')->name('admin.criteria.delete'); //Menggunakan SweetAlert Dalam Delete
            Route::match(['get', 'post'], '/update/{id}', 'Admin\CriteriaController@update')->name('admin.criteria.update');
            Route::post('/weight/save', 'Admin\WeightController@save')->name('admin.criteria.weight.save');
            Route::get('/weight/delete/{id}', 'Admin\WeightController@delete')->name('admin.criteria.weight.delete'); //Menggunakan SweetAlert Dalam Delete
            Route::match(['get', 'post'], '/weight/update/{id}', 'Admin\WeightController@update')->name('admin.criteria.weight.update'); 
        });

        Route::group(['prefix' => 'periode'], function() {
            Route::get('/', 'Admin\PeriodController@index')->name('admin.period');
            Route::post('/save', 'Admin\PeriodController@save')->name('admin.period.save');
            Route::get('/delete/{id}', 'Admin\PeriodController@delete')->name('admin.period.delete'); //Menggunakan SweetAlert Dalam Delete
            Route::match(['get', 'post'], '/update/{id}', 'Admin\PeriodController@update')->name('admin.period.update');
            Route::match(['get', 'post'], '/change_status/{id}', 'Admin\PeriodController@changeStatus')->name('admin.period.status');
    
            Route::get('/{id}/kuota', 'Admin\BeasiswaController@kuota')->name('admin.beasiswa.kuota');
            Route::get('/{id}/kuota/{prodi_id}/analisis', 'Admin\BeasiswaController@analisisProdi')->name('admin.beasiswa.analisisProdi');
            Route::get('/{id}/kuota/analisis', 'Admin\BeasiswaController@analisisFull')->name('admin.beasiswa.analisisFull');
            Route::get('/pdf/{id}/analisis', 'Admin\BeasiswaController@analisis_cetak_pdf')->name('admin.beasiswa.analisis.pdf'); 
    
            Route::get('/{id}/peserta', 'Admin\BeasiswaController@peserta')->name('admin.beasiswa.peserta');
            Route::get('/{id}/peserta/search', 'Admin\BeasiswaController@search')->name('admin.beasiswa.peserta.search'); 
            Route::get('/{id}/peserta/{mahasiswa_id}/delete', 'Admin\BeasiswaController@delete')->name('admin.beasiswa.peserta.delete');
            Route::match(['get', 'post'], '/peserta/change_status/{id}', 'Admin\BeasiswaController@changeStatus')->name('admin.beasiswa.status.peserta');
            Route::get('/{period_id}/peserta/{mahasiswa_id}/nilai', 'Admin\BeasiswaController@nilai')->name('admin.beasiswa.peserta.nilai');
            Route::get('/{period_id}/analisis', 'Admin\BeasiswaController@analisis')->name('admin.beasiswa.analisis');
            Route::get('/pdf/{period_id}', 'Admin\BeasiswaController@cetak_pdf')->name('admin.beasiswa.search'); 
        });

        Route::group(['prefix' => 'pengumuman'], function(){
            Route::get('/', 'Admin\PengumumanController@index');
            Route::post('/save', 'Admin\PengumumanController@save')->name('admin.pengumuman.save');
            Route::match(['get', 'post'], '/change_status/{id}', 'Admin\PengumumanController@changeStatus')->name('admin.pengumuman.status');
            Route::get('/delete/{id}', 'Admin\PengumumanController@delete')->name('admin.pengumuman.delete');
        });

    });

});
