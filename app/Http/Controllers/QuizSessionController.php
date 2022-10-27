<?php

namespace App\Http\Controllers;

use App\Models\QuizSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz = QuizSession::first();
        $answer = DB::table('quiz_answer')->where('email', auth()->user()->email)->first();
        $title = 'Quiz';
        return view('user.quiz.index', compact('quiz', 'answer', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $answer = DB::table('quiz_answer')->where('email', auth()->user()->email)->count();
        $quiz = QuizSession::first();
        if ($answer < 1) {
            DB::table('quiz_answer')->insert([
                'email' => auth()->user()->email,
                'session' => $quiz->id,
                'finish' => false,
                'hasil' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('user.quiz_session.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz = QuizSession::first();
        $jawaban = json_decode($quiz->jawaban);
        $hasil = 0;

        foreach ($jawaban as $key => $data) {
            if ($data == $request['pilihan' . $key]) {
                $hasil++;
            }
        }
        // ddd($hasil);

        DB::table('quiz_answer')->where('email', auth()->user()->email)->update([
            'hasil' => $hasil,
            'finish' => true,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('user.quiz_session.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizSession  $quizSession
     * @return \Illuminate\Http\Response
     */
    public function show(QuizSession $quizSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizSession  $quizSession
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizSession $quizSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizSession  $quizSession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizSession $quizSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizSession  $quizSession
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizSession $quizSession)
    {
        //
    }
}
