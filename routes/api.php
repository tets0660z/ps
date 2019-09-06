
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


Route::apiResource('subjects', 'API\SubjectsController');
Route::apiResource('classlists', 'API\ImportedClasslistsController');
// Route::apiResource('lecture', 'API\LecturesController');
Route::apiResource('laboratory', 'API\LaboratoriesController');