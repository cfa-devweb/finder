<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\follow\CompanyController;

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

Route::get('/test', function () {
    return view('test');
});

//Auth::routes();

// Route for the "displaycompany" function of the "CompanyController" controller 
Route::get('/company', [CompanyController::class, 'displaycompany']);

// Route for the "addcompany" function of the "CompanyController" controller 
Route::post('/company', [CompanyController::class, 'addcompany']);
