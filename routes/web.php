<?php


Route::get('/', function ($guard = null) {
    if (Auth::guard($guard)->check()) {
        return redirect('/home');
    }
    else {
        return view('auth.login');
    }
    
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
   
    Route::resource('user', 'UserController');
    Route::resource('sarana', 'SaranaController');
    Route::resource('iku', 'IkuController');
    Route::resource('budget', 'BudgetController');
    Route::resource('audit', 'AuditController');

    Route::post('audit/{id}/set-status', 'AuditController@setStatus')->name('audit.status');
    Route::get('/referAudit', 'AuditController@referAudit')->name('audit.refer');
   
    Route::get('/addsarana', 'SaranaController@addsarana')->name('sarana.addsarana');
    Route::post('/storeAddsarana', 'SaranaController@storeAddsarana')->name('sarana.storeAddsarana');
    Route::get('/cari', 'SaranaController@loadData');

    Route::resource('capa', 'CapaController');
    Route::resource('individu', 'IndividuController');
    Route::resource('event', 'EventController');

    Route::resource('convert', 'ConvertController');
    Route::post('convert/import', 'ConvertController@import')->name('convert.import');   # import data
    Route::get('convert.export', 'ConvertController@export')->name('convert.export');   # export data

    Route::resource('stugas', 'StugasController');
    Route::get('/addstugas', 'StugasController@addstugas')->name('stugas.addstugas');
    Route::post('/storeAddstugas', 'StugasController@storeAddstugas')->name('stugas.storeAddstugas');
    Route::get('/cari', 'StugasController@loadData');

    Route::get('budget/export', 'BudgetController@export')->name('budget.export');    # export data
    Route::post('budget/import', 'BudgetController@import')->name('budget.import');   # import data
   
    
    Route::get('audit/export/', 'AuditController@export')->name('audit.export');    # export data
    Route::get('export','AuditController@export')->name('export'); # export data
    
   
    


 

 

   
   
    





