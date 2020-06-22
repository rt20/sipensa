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
    Route::get('audit/{id}/set-status', 'AuditController@setStatus')
    ->name('audit.status');

    Route::resource('capa', 'CapaController');
    Route::resource('individu', 'IndividuController');




    Route::get('budget/export', 'BudgetController@export')->name('budget.export');    # export data
    Route::post('budget/import', 'BudgetController@import')->name('budget.import');   # import data
   
    
    Route::get('audit/export/', 'AuditController@export')->name('audit.export');    # export data
    Route::get('export','AuditController@export')->name('export'); # export data
   
   
    


 

 

   
   
    





