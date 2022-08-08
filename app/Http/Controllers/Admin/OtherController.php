<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Other;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OtherController extends Controller
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

        return view('admin.other.create', [
            'title' => 'Tambah Lainnya',
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

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $url = $file->store('other');
        }

        $other = Other::create([
            'desc' => $request->desc,
            'file' => $url,
            'file_name' => $name,
            'file_extension' => $extension,
        ]);

        $subject = Subject::find($request->subject_id);
        $subject->update([
            'other_id' => $other->id,
        ]);

        return redirect()->route('admin.subject.show', $request->subject_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function show(Other $other)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function edit(Other $other)
    {
        $other = Other::with(['subject'])->find($other->id);

        return view('admin.other.edit', [
            'title' => 'Edit Materi',
            'other' => $other,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Other $other)
    {
        $old_file = $other->file;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $url = $file->store('other');

            $other->update([
                'file' => $url,
                'file_name' => $name,
                'file_extension' => $extension,
            ]);

            if ($old_file) {
                Storage::delete($old_file);
            }
        }

        $other->update([
            'desc' => $request->desc,
        ]);

        return redirect()->route('admin.subject.show', $other->subject->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Other  $other
     * @return \Illuminate\Http\Response
     */
    public function destroy(Other $other)
    {
        $other = Other::with(['subject'])->find($other->id);

        $url = $other->file;

        Storage::delete($url);

        $other->delete();

        return redirect()->route('admin.subject.show', $other->subject->id);
    }
}
