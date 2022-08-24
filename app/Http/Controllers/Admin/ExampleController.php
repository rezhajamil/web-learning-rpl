<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Example;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExampleController extends Controller
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

        return view('admin.example.create', [
            'title' => 'Tambah Contoh',
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
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $url = $file->storeAs('example', $name);
        }

        $example = Example::create([
            'desc' => $request->desc,
            'file' => $url,
            'file_name' => $name,
            'file_extension' => $extension,
        ]);

        $subject = Subject::find($request->subject_id);
        $subject->update([
            'example_id' => $example->id,
        ]);

        return redirect()->route('admin.subject.show', $request->subject_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function show(Example $example)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function edit(Example $example)
    {
        $example = Example::find($example->id);

        return view('admin.example.edit', [
            'title' => 'Edit Contoh',
            'example' => $example,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Example $example)
    {
        $old_file = $example->file;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $url = $file->storeAs('example', $name);

            $example->update([
                'file' => $url,
                'file_name' => $name,
                'file_extension' => $extension,
            ]);

            if ($old_file) {
                Storage::delete($old_file);
            }
        }

        $example->update([
            'desc' => $request->desc,
        ]);

        return redirect()->route('admin.subject.show', $example->subject->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Example  $example
     * @return \Illuminate\Http\Response
     */
    public function destroy(Example $example)
    {
        $example = Example::with(['subject'])->find($example->id);

        $url = $example->file;

        Storage::disk('local')->delete($url);

        $example->delete();

        return redirect()->route('admin.subject.show', $example->subject->id);
    }
}
