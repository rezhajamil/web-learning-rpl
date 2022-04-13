<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuizAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('user.quiz_answer.create', [
            'title' => 'Jawab Quiz',
            'quiz_id' => $request->quiz_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'desc' => 'required',
            'quiz_id' => 'required',
            'file' => 'required|file',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $url = $file->store('answer');
        }

        $subject = Quiz::find($request->quiz_id);
        $subject = $subject->subject->id;

        $answer = QuizAnswer::create([
            'desc' => $request->desc,
            'quiz_id' => $request->quiz_id,
            'user_id' => auth()->user()->id,
            'file' => $url,
            'file_name' => $name,
            'file_extension' => $extension,
        ]);

        return redirect()->route('user.subject.show', $subject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizAnswer  $quizAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(QuizAnswer $quizAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizAnswer  $quizAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizAnswer $quizAnswer)
    {
        return view('user.quiz_answer.edit', [
            'title' => 'Edit Jawaban',
            'quiz_answer' => $quizAnswer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizAnswer  $quizAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizAnswer $quizAnswer)
    {
        $old_file = $quizAnswer->file;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $url = $file->store('answer');

            $quizAnswer->update([
                'file' => $url,
                'file_name' => $name,
                'file_extension' => $extension,
            ]);

            if ($old_file) {
                Storage::delete($old_file);
            }
        }

        $subject = Quiz::find($quizAnswer->quiz_id);
        $subject = $subject->subject->id;

        $quizAnswer->update([
            'desc' => $request->desc,
        ]);

        return redirect()->route('user.subject.show', $subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizAnswer  $quizAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizAnswer $quizAnswer)
    {
        //
    }
}
