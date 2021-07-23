<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CreateStudentAccountController;
use App\Http\Controllers\FollowUpController;
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

Auth::routes();

Route::get('/',[HomeController::class, "index"])->name('accueil');


Route::middleware('auth')->group(function() {
    /* ---------------------------------------------------------------------------------- */
    Route::get('dashboard', [DashboardController::class, "index"])->name('dashboard-index')->middleware('auth');
    Route::post('dashboard', [DashboardController::class, "post"])->name('dashboard-post');
    Route::get('/dashboard/{id}', [listingStudentController::class, 'showTable'])->name('dashboard-formation');

    /* ------------------------------------------------------------------ */
    Route::get('/listingPosts',[ListingPostController::class,'listingPost']);
    Route::delete('/listingPosts/{id}',[ListingPostController::class,'deletePost'])->name('listingPosts.delete');
    Route::post('/listingPosts/{id}',[ListingPostController::class,'updatePost'])->name('listingPosts.update');
    Route::post('listingPosts',[ListingPostController::class,'addoffer'])->name('post');


    /* ------------------------------------------------------ */
    Route::resource('enterprises', EnterpriseController::class);
    Route::get('/enterprises/{id}/follow-up', [FollowUpController::class, 'index']);


    /* ------------------------------------------------------------------------- */
    Route::get('/student/create-profil', [ProfilController::class,'CreateProfil']);
    Route::post('/saveprofil', [ProfilController::class, 'SaveProfil']);
    Route::get('/student/profil', [ProfilController::class,'ShowProfil']);

    Route::get('/createStudentAccount', function () { return view('/adviser/createStudentAccount'); });
    Route::post('/createStudentAccount', [CreateStudentAccountController::class, 'createStudent']);


    // send email
    // Route::get('send-mail', function () {
    //     $details = [
    //         'title' => 'Take a look of your new profil on Kinder.nc',
    //         'body' => 'kndrx.github.io'
    //     ];

    //     \Mail::to('francinekendrick@gmail.com')->send(new \App\Mail\MyTestMail($details));
    // });
    /* ------------------------------------------------------------------------------------ */
    Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(["verified"]);
});