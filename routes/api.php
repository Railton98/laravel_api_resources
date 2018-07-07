<?php

use Illuminate\Http\Request;

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

/**
* ===========================================================================
* Home Route (Presentation)
* ===========================================================================
*/
Route::get('/', function () {
    return redirect()->route('home.api');
});

Route::group(['prefix' => 'v1'], function() {
    /**
    * ===========================================================================
    * Home Route (Presentation)
    * ===========================================================================
    */
    Route::get('/', function () {
        return response()->json([
            'message' => 'API Home',
            'welcome' => 'Seja Bem-Vindo!',
        ], 200);
    })->name('home.api');

    /**
    * ===========================================================================
    * Default Routes
    * ===========================================================================
    */
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    /**
    * ===========================================================================
    * Resources Routes
    * ===========================================================================
    */
    Route::resource('student', 'StudentController');
    Route::resource('course', 'CourseController');

});
