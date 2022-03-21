<?php

// Route::post('login', 'Api\V1\Admin\AuthController@login');
// Route::post('register', 'Api\V1\Admin\AuthController@register');
// Route::group(['middleware' => 'auth:api'], function(){
// Route::post('details', 'Api\V1\Admin\AuthController@details');
// });
#Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // // Traffic
    Route::apiResource('traffic', 'TrafficApiController');

    // Horaires
    Route::apiResource('horaires', 'HoraireApiController');

    // Retards
    Route::apiResource('retards', 'RetardApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Situation Geographiques
    Route::apiResource('situation-geographiques', 'SituationGeographiqueApiController');

    // Directions
    Route::apiResource('directions', 'DirectionApiController');
});
