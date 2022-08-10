<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Example;
use App\Models\Lesson;
use App\Models\Other;
use App\Models\Quiz;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subject.create', [
            'title' => 'Tambah Pertemuan',
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
            'name' => 'required',
        ]);

        $subject = Subject::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::with(['lesson', 'example', 'quiz', 'other'])->find($id);

        return view('admin.subject.show', [
            'title' => $subject->name,
            'subject' => $subject,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);

        return view('admin.subject.edit', [
            'title' => 'Edit Materi',
            'subject' => $subject,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subject = Subject::find($id);
        $subject->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        if ($subject->lesson_id) {
            $lesson = Lesson::destroy($subject->lesson_id);
        }

        if ($subject->example_id) {
            $example = Example::destroy($subject->example_id);
        }

        if ($subject->quiz_id) {
            $quiz = Quiz::destroy($subject->quiz_id);
        }

        if ($subject->other_id) {
            $other = Other::destroy($subject->other_id);
        }

        $subject->delete();

        return redirect()->route('admin.dashboard.index');
    }
}
