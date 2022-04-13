<?php

namespace App\View\Components;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $quizzes = Quiz::all();
        $quiz_answers = QuizAnswer::where('user_id', auth()->user()->id)->get();

        $finish = 0;
        foreach ($quizzes as $quiz) {
            foreach ($quiz_answers as $answer) {
                if ($answer->quiz_id == $quiz->id) {
                    $finish++;
                }
            }
        }

        $pendings = count($quizzes) - $finish;

        return view('components.navbar', [
            'pendings' => $pendings,
        ]);
    }
}
