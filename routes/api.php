
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('classrecords', 'API\ClassRecordsController');
// Route::apiResource('sections', 'API\ClasslistController');
// Route::apiResource('classlists', 'API\ImportedClasslistsController');
Route::get('sections','API\ClasslistController@index')->name('section');

Route::get('classlists/{section}','API\ImportedClasslistsController@show');
// Route::get('classlists/{section}', function ($section){
//     return $section;
// });
