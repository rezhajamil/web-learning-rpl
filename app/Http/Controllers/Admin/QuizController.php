<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::whereNotNull('quiz_id')->get();

        return view('admin.quiz.index', [
            'title' => 'Daftar Tugas',
            'subjects' => $subjects,
        ]);
    }

    public function showAnswer(Request $request)
    {
        $answers = QuizAnswer::with(['quiz', 'user'])->where('quiz_id', $request->quiz_id)->get();

        return view('admin.quiz.answer', [
            'title' => 'Jawaban Tugas',
            'answers' => $answers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $subject = $request->subject_id;

        return view('admin.quiz.create', [
            'title' => 'Tambah Tugas',
            'subject' => $subject,
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
            'subject_id' => 'required',
            'file' => 'required|file',
            'deadline' => 'required|date',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $url = $file->store('quiz');
        }

        $quiz = Quiz::create([
            'desc' => $request->desc,
            'file' => $url,
            'file_name' => $name,
            'file_extension' => $extension,
            'deadline' => $request->deadline,
        ]);

        $subject = Subject::find($request->subject_id);
        $subject->update([
            'quiz_id' => $quiz->id,
        ]);

        return redirect()->route('admin.subject.show', $request->subject_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        $quiz = Quiz::find($quiz->id);

        return view('admin.quiz.edit', [
            'title' => 'Edit Tugas',
            'quiz' => $quiz,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        $old_file = $quiz->file;
        $quiz = Quiz::with(['subject'])->find($quiz->id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $url = $file->store('quiz');

            $quiz->update([
                'file' => $url,
                'file_name' => $name,
                'file_extension' => $extension,
            ]);

            if ($old_file) {
                Storage::delete($old_file);
            }
        }

        $quiz->update([
            'desc' => $request->desc,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('admin.subject.show', $quiz->subject->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        $quiz = Quiz::with(['subject'])->find($quiz->id);

        $url = $quiz->file;

        Storage::disk('local')->delete($url);

        $quiz->delete();

        return redirect()->route('admin.subject.show', $quiz->subject->id);
    }
}
