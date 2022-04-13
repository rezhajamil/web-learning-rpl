<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;

class LessonController extends Controller
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
        $subject = $request->subject_id;

        return view('admin.lesson.create', [
            'title' => 'Tambah Materi',
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
        ]);

        $lesson = Lesson::create([
            'desc' => $request->desc,
        ]);

        $subject = Subject::find($request->subject_id);
        $subject->update([
            'lesson_id' => $lesson->id,
        ]);

        return redirect()->route('admin.subject.show', $request->subject_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $lesson = Lesson::with(['subject'])->find($lesson->id);

        return view('admin.lesson.edit', [
            'title' => 'Edit Materi',
            'lesson' => $lesson,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson = Lesson::with(['subject'])->find($lesson->id);

        $request->validate([
            'desc' => 'required',
        ]);

        $lesson->update([
            'desc' => $request->desc,
        ]);

        return redirect()->route('admin.subject.show', $lesson->subject->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson = Lesson::with(['subject'])->find($lesson->id);

        $lesson->delete();

        return redirect()->route('admin.subject.show', $lesson->subject->id);
    }
}
