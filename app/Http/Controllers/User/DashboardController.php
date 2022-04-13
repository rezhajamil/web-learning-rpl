<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\Subject;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __invoke()
    {
        $subjects = Subject::with(['lesson', 'example', 'quiz', 'other'])->get();
        $quizzes = Quiz::all();
        $quiz_answers = QuizAnswer::where('user_id', auth()->user()->id)->get();

        return view('user.dashboard', [
            'title' => 'Dashboard',
            'subjects' => $subjects,
            'quizzes' => $quizzes,
            'quiz_answers' => $quiz_answers,
        ]);
    }
}
