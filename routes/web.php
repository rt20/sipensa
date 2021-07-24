<?php


Route::get('/', 'HomeController@index')->name('home');


Auth::routes(['register' => false]);

Route::prefix('/')
    ->middleware(['auth:sanctum'])
    ->group(function(){

    Route::resource('user', 'UserController');
    Route::resource('sarana', 'SaranaController');
    Route::resource('iku', 'IkuController');
    Route::resource('budget', 'BudgetController');
    Route::resource('audit', 'AuditController');

    Route::post('audit/{id}/set-status', 'AuditController@setStatus')->name('audit.status');
    Route::get('/referAudit', 'AuditController@referAudit')->name('/refer');
    Route::get('/cariaudit', 'AuditController@loadData')->name('/cariaudit');

    Route::get('/addsarana', 'SaranaController@addsarana')->name('sarana.addsarana');
    Route::post('/storeAddsarana', 'SaranaController@storeAddsarana')->name('sarana.storeAddsarana');
    Route::get('/carisarana', 'SaranaController@loadData')->name('/carisarana');

    Route::resource('capa', 'CapaController');
    Route::resource('individu', 'IndividuController');
    Route::resource('event', 'EventController');

    Route::resource('convert', 'ConvertController');
    Route::post('convert/import', 'ConvertController@import')->name('convert.import');   # import data
    Route::get('convert.export', 'ConvertController@export')->name('convert.export');   # export data

    Route::resource('stugas', 'StugasController');
    Route::get('/addstugas', 'StugasController@addstugas')->name('stugas.addstugas');
    Route::post('/storeAddstugas', 'StugasController@storeAddstugas')->name('stugas.storeAddstugas');
    Route::get('/cari', 'StugasController@loadData')->name('/cari');

    Route::get('budget/export', 'BudgetController@export')->name('budget.export');    # export data
    Route::post('budget/import', 'BudgetController@import')->name('budget.import');   # import data


    Route::get('audit/export/', 'AuditController@export')->name('audit.export');    # export data
    Route::get('export','AuditController@export')->name('export'); # export data
});