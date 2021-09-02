<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CreateStudentAccountController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\ListingPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\listingStudentController;
use App\Http\Controllers\Auth\CreatePasswordController;

use App\Models\Section;

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
Route::middleware(['basicAuth'])->group(function () {
    Auth::routes();

    Route::get('password/create/{token}', [CreatePasswordController::class, 'showCreateForm'])->name('password.create');
    Route::post('password/create', [CreatePasswordController::class, 'store'])->name('password.store');

    Route::get('/student/create-profil', [ProfilController::class,'CreateProfil'])->name('profil.create');
    Route::post('/saveprofil', [ProfilController::class, 'SaveProfil']);

    Route::middleware('auth')->group(function() {
        /* ---------------------------------------------------------------------------------- */
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard-index');
        Route::post('dashboard', [DashboardController::class, 'post'])->name('dashboard-post');
        Route::get('/dashboard/{id}', [listingStudentController::class, 'showTable'])->name('dashboard-formation');
        Route::delete('/dashboard/{id}',[listingStudentController::class,'deleteOneAlternant'])->name('listingAlternant.delete');
        Route::get('/dashboard/{id}/', [listingStudentController::class, 'showTable'])->name('dashboard-formation');
        Route::get('/dashboard/{id}/listingOneStudent', [listingStudentController::class, 'showUserInfo'])->name('dashboard-formation-suivi');
        /* ------------------------------------------------------------------ */
        Route::get('/listingPosts',[ListingPostController::class,'listingPost']);
        Route::delete('/listingPosts/{id}',[ListingPostController::class,'deletePost'])->name('listingPosts.delete');
        Route::post('/listingPosts/{id}',[ListingPostController::class,'updatePost'])->name('update');
        Route::post('listingPosts',[ListingPostController::class,'addoffer'])->name('post');

Route::middleware('auth')->group(function() {
    /* ---------------------------------------------------------------------------------- */
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard-index');
    Route::post('dashboard', [DashboardController::class, 'post'])->name('dashboard-post');
    Route::get('/dashboard/{id}', [listingStudentController::class, 'showTable'])->name('dashboard-formation');
    Route::delete('/dashboard/{id}',[listingStudentController::class,'deleteOneAlternant'])->name('listingAlternant.delete');
    Route::get('/dashboard/{id}/listingOneStudent', [listingStudentController::class, 'showUserInfo'])->name('dashboard-formation-suivi');
    /* ------------------------------------------------------------------ */
    Route::get('/listingPosts',[ListingPostController::class,'listingPost'])->name('listingsPosts');
    Route::delete('/listingPosts/{id}',[ListingPostController::class,'deletePost'])->name('listingPosts.delete');
    Route::post('/listingPosts/{id}',[ListingPostController::class,'updatePost'])->name('update');
    Route::post('listingPosts',[ListingPostController::class,'addoffer'])->name('post');

    /* ------------------------------------------------------ */
    Route::resource('enterprises', EnterpriseController::class);
    Route::get('/enterprises/{id}/follow-up', [FollowUpController::class, 'index'])->name('followup');

    /* ------------------------------------------------------------------------- */
    Route::get('/student/profil', [ProfilController::class, 'ShowProfil'])->name('profil');
    Route::post('/student/{student}', [ProfilController::class, 'UpdateProfil'])->name('profil.update');
    Route::put('/resumes/{resume}', [ResumeController::class, 'update'])->name('resumes.update');
    Route::get('/createStudentAccount', function () {
        $sections = Section::all();
        return view('/adviser/createStudentAccount', compact('sections'));
    });
    Route::post('/createStudentAccount', [CreateStudentAccountController::class, 'createStudent'])->name('create.student');

    /* ------------------------------------------------------------------------------------ */
    Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(["verified"]);
});
