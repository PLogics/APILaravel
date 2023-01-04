<?php

use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's

    Route::get('data',[dummyAPI::class,'getData']);
    Route::get('device/{id?}',[dummyAPI::class,'getData1']);//optional id
    Route::post('add',[dummyAPI::class,'add']);
    Route::put('update',[dummyAPI::class,'update']);
    //search data//
    Route::get('search/{name}',[dummyAPI::class,'search']);
    //delete data//
    Route::delete('delete/{id}',[dummyAPI::class,'delete']);

    //API Validations//
    Route::post('save',[dummyAPI::class,'testdata']);
   
    //API with Resource//
    Route::apiResource('member',MemberController::class);
});

//API login//
Route::post('login',[UserController::class,'index']);//login and signup must be outside the secure mode