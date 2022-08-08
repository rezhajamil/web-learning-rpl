<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SubjectController as AdminSubjectController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\ExampleController as AdminExampleController;
use App\Http\Controllers\Admin\QuizController as AdminQuizController;
use App\Http\Controllers\Admin\OtherController as AdminOtherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\SubjectController as UserSubjectController;
use App\Http\Controllers\User\QuizAnswerController as UserQuizAnswerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('landing-page');
    });
    Route::resource('user', UserController::class);
    Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
    Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');
});

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        if (auth()->user()->is_admin) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    });

    Route::resource('help', HelpController::class);

    Route::get('/edit_profile', [UserController::class, 'edit_profile']);
    Route::post('/edit_profile/{user}', [UserController::class, 'save_profile'])->name('save_profile');

    Route::prefix('/')->name('user.')->middleware('ensureUserRole:user')->group(function () {
        Route::get('dashboard', UserDashboardController::class)->name('dashboard');
        Route::resource('subject', UserSubjectController::class);
        Route::resource('quiz_answer', UserQuizAnswerController::class);
    });

    Route::prefix('admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function () {
        Route::resource('dashboard', AdminDashboardController::class);
        Route::resource('subject', AdminSubjectController::class);
        Route::resource('lesson', AdminLessonController::class);
        Route::resource('example', AdminExampleController::class);
        Route::resource('quiz', AdminQuizController::class);
        Route::resource('other', AdminOtherController::class);
        Route::resource('student', StudentController::class);
        Route::get('quiz/answer/{quiz_id}', [AdminQuizController::class, 'showAnswer'])->name('quiz.answer');
        Route::post('point/{quiz_answer}', [AdminQuizController::class, 'set_point'])->name('point');
    });
});


require __DIR__ . '/auth.php';
