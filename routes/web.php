<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\AddStudentController;
use App\Http\Controllers\Follow_upController;
use App\Http\Controllers\ListingPostController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\listingStudentController;

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

Route::get('/', function () {
    return view('index');
});

//login

// Auth::routes(['verify' => true]);

// dashboard
// Route for the "dashboard" function of the "DashboardController" controller
Route::get('dashboard',[DashboardController::class,"index"])->name('dashboard-index');
Route::post('dashboard',[DashboardController::class,"post"])->name('dashboard-post');
Route::get('/dashboard/{id}',[listingStudentController::class, 'showTable'])->name('dashboard-formation');

//Auth::routes();


// Route for the "ListingPost" function of the "ListingPostController" controller
Route::get('/listingPosts',[ListingPostController::class,'listingPost']);

// Route for the "addoffer" function of the "ListingPostController" controller
Route::post('/listingPosts', [ListingPostController::class, 'addoffer']);

// Route for the "displaycompany" function of the "CompanyController" controller
Route::get('/prospect', [ProspectController::class, 'displaycompany']);

// Route for the "addcompany" function of the "CompanyController" controller
Route::post('/prospect', [ProspectController::class, 'addcompany']);

Route::post('/student/create-profil', [ProspectController::class,'CreateProfil']);


Route::get('/prospect/{id}/follow-up', [Follow_upController::class, 'index']);
Route::post('/prospect/follow-up/create', [Follow_upController::class, 'addfollowup'])->name('followup-create');

// get view of modale add student
Route::get('/addStudentModal', function () {
    return view('/adviser/addStudentModal');
});

// create new student in database
Route::post('/addStudentModal', [AddStudentController::class, 'addStudent']);

Route::get('send-mail', function () {

    $details = [
        'title' => 'Take a look of your new profil on Kinder.nc',
        'body' => 'kndrx.github.io'
    ];

    \Mail::to('francinekendrick@gmail.com')->send(new \App\Mail\MyTestMail($details));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(["verified"]);