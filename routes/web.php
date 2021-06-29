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

Route::prefix("backend")->group(function (){


    Route::get("/dealers", "dealerController@index");

    Route::get("/dealer/{dealer}", "dealerController@show");
    Route::get("/users", "dealerController@user");
    Route::get("/users/{type}", "dealerController@users");

    Route::post("/user", "dealerController@storeUser");

    Route::post("/dealer","dealerController@store");
    Route::put("/dealer/{dealer}","dealerController@update");
    Route::put("/dealer/isActiveSetter/{dealer}","dealerController@isActiveSetter");
    Route::delete("/dealer/{dealer}","dealerController@destroy");



    Route::get("/assays/{client_id}", "assayController@index");
    Route::post("/assay","assayController@store");
    Route::put("/assay/{assay}","assayController@update");
    Route::delete("/assay/{assay}","assayController@destroy");

    Route::get("/calendar", "appointmentController@load");


    Route::get("/appointment/{appointment}", "appointmentController@show");
    Route::get("/appointments/{client_id}", "appointmentController@index");
    Route::get("/appointments", "appointmentController@list");
    Route::post("/appointment","appointmentController@store");
    Route::post("/appointment/client","appointmentController@storeWithClient");
    Route::get("/appoint/getDate","appointmentController@getDate");
    Route::get("/appoint/getWithName","appointmentController@getWithName");
    Route::put("/appointment/{appointment}","appointmentController@update");
    Route::delete("/appointment/{appointment}","appointmentController@destroy");


    Route::get("/clients", "clientController@index");
    Route::get("/client/name/{name}", "clientController@searchName");
    Route::get("/clients", "clientController@index");
    Route::get("/client/{client}", "clientController@show");
    Route::post("/client","clientController@store");
    Route::put("/client/{client}","clientController@update");
    Route::delete("/client/{client}","clientController@destroy");

    Route::get("/opinions/{clint_id}", "opinionController@index");
    Route::post("/opinion","opinionController@store");
    Route::put("/opinion/{opinion}","opinionController@update");
    Route::delete("/opinion/{opinion}","opinionController@destroy");
    Route::get("/opinion-form/{opinion}","opinionController@formIndex");

    Route::get("/forms/{clint_id}", "formController@index");
    Route::get("/forms/client/{client}", "formController@getWithClient");
    Route::get("/form/{clint_id}/{type}", "formController@show");
    Route::post("/form","formController@store");
    Route::put("/form/{form}","formController@update");
    Route::delete("/form/{form}","formController@destroy");

    Route::get("/currents", "currentController@index");
    Route::get("/currents/{client}", "currentController@show");
    Route::post("/current","currentController@store");
    Route::get("/current/getDate","currentController@getCurrentBeetweenDate");
    Route::put("/current/{current}","currentController@update");
    Route::delete("/current/{current}","currentController@destroy");

});
Route::Auth();
Route::get("/logout", "Auth\LoginController@logout");
    Route::get('{any}', 'homeController')->where('any', '(.*)')->middleware("auth");
    Route::get("/home", "homeController@index")->middleware("auth");
