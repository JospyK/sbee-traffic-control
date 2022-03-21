<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/etats/1', 'HomeController@index')->name('etats.1');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Traffic
    Route::delete('traffic/destroy', 'TrafficController@massDestroy')->name('traffic.massDestroy');
    Route::get('traffic/filter/{date?}', 'TrafficController@index')->name('traffic.filter');
    Route::resource('traffic', 'TrafficController');

    // Horaires
    Route::delete('horaires/destroy', 'HoraireController@massDestroy')->name('horaires.massDestroy');
    Route::resource('horaires', 'HoraireController');

    // Retards
    Route::delete('retards/destroy', 'RetardController@massDestroy')->name('retards.massDestroy');
    Route::resource('retards', 'RetardController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Agents Presents
    Route::resource('agents-presents', 'AgentsPresentsController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');

    // Situation Geographiques
    Route::delete('situation-geographiques/destroy', 'SituationGeographiqueController@massDestroy')->name('situation-geographiques.massDestroy');
    Route::resource('situation-geographiques', 'SituationGeographiqueController');

    // Directions
    Route::delete('directions/destroy', 'DirectionController@massDestroy')->name('directions.massDestroy');
    Route::resource('directions', 'DirectionController');

    // etats ET STATISTIQUES
    Route::group(['prefix' => 'etats', 'as' => 'etats.'], function () {
        Route::get('/traffic', 'EtatController@traffic_agent')->name('traffic_agent');
        Route::get('/', 'EtatController@index')->name('index');
        Route::post('generate', 'EtatController@generate')->name('generate');
    });
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});


// Route::get('test', function () {
//     dd(Carbon\Carbon::now());
// })->name('globalSearch');

// Route::get('test/import', 'Admin\TestController@test')->name('test.import');
Route::get('test/job', 'Admin\TestController@job')->name('test.job');
Route::get('test/import', 'Admin\TestController@import')->name('test.import');
