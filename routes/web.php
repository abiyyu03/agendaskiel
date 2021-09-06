<?php

Route::get('/logout', 'Auth\\LoginController@logout')
    ->name('logout');

Route::get('/dynamic_dependent', 'DynamicDependent@index');

Route::post('dynamic_dependent/fetch', 'DynamicDependent@fetch')->name('dynamicdependent.fetch');

Route::get('/prodview', 'TestController@prodfunct');

Route::get('/findKelas', 'FormAgendaController@findKelas');

Route::get('/findMapel', 'FormAgendaController@findMapel');

Route::get('/findKompetensi', 'FormAgendaController@findKompetensi');

Route::get('/findProductName', 'TestController@findProductName');

Route::get('/findMapel', 'FormAgendaController@findMapel');
Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/form-agenda', 'FormAgendaController@index')->name('form-agenda')
    ->middleware(['auth', 'verified']);
Route::post('/form-agenda/store', 'FormAgendaController@store')->name('form-agenda.store')
    ->middleware(['auth', 'verified']); 
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        //resource controller
        Route::resource('mapel', 'MapelController'); 
        Route::resource('kelas', 'kelasController');
        Route::resource('pengaturan', 'PengaturanController');
        Route::resource('agenda', 'AgendaController');   
        Route::resource('kompetensi', 'KompetensiController'); 
        Route::resource('akun', 'UserController');   
        Route::resource('jam', 'JamController'); 
        Route::resource('kelastingkat', 'KelastingkatController');   
        Route::resource('jurusan', 'JurusanController');      
        Route::resource('pengaturan', 'PengaturanController');      
        Route::resource('absensi', 'AbsensiController');    

        //custom route
        Route::get('/agendafetch/{id}', 'FormAgendaController@fetch'); 
        Route::get('agenda/export', 'AgendaController@export')->name('agenda.export'); 
        Route::get('kompetensi/import', 'KompetensiController@import')->name('kompetensi.import');
        Route::get('mapel/import', 'MapelController@import')->name('mapel.import');
        Route::get('kelas/import', 'KelasController@import')->name('kelas.import');
        Route::get('jam/import', 'KelasController@import')->name('jam.import');
        Route::get('akun/import', 'UserController@import')->name('akun.import');
        Route::get('agenda/filter', 'AgendaController@rangedate')->name('agenda.filter');
        Route::get('agenda/{id}/destroy', 'AgendaController@destroy')->name('agenda.destroy');
        Route::get('absensi/{id}/destroy', 'AbsensiController@destroy')->name('absensi.destroy');
        Route::get('jam/{id}/destroy', 'JamController@destroy')->name('jam.destroy');
        Route::get('akun/{id}/destroy', 'UserController@destroy')->name('akun.destroy');
        Route::get('kompetensi/{id}/destroy', 'KompetensiController@destroy')->name('kompetensi.destroy');
        Route::get('kelas/{id}/destroy', 'kelasController@destroy')->name('kelas.destroy');
        Route::get('mapel/{id}/destroy', 'MapelController@destroy')->name('mapel.destroy');

        //pengaturan route
        Route::get('pengaturan/truncate/jam','PengaturanController@jam')->name('pengaturan.jam');
        Route::get('pengaturan/truncate/absensi','PengaturanController@absensi')->name('pengaturan.absensi');
        Route::get('pengaturan/truncate/agenda','PengaturanController@agenda')->name('pengaturan.agenda');
        Route::get('pengaturan/truncate/kelas','PengaturanController@kelas')->name('pengaturan.kelas');
        Route::get('pengaturan/truncate/kompetensi','PengaturanController@kompetensi')->name('pengaturan.kompetensi');
        Route::get('pengaturan/truncate/mapel','PengaturanController@mapel')->name('pengaturan.mapel');
        
    }); 
    
//Authentication 
Auth::routes([
    'verify' => true 
    ]);
