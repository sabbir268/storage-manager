<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $files = new File;
        if ($request->has('category_id')) {
            $files = $files->where('category_id', $request->category_id);
        }
        if ($request->has('sub_category_id')) {
            $files = $files->where('sub_category_id', $request->sub_category_id);
        }
        $files = $files->paginate(20);
        return view('dashboard.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'file' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'comment' => 'nullable',
        ]);

        if ($request->has('file')) {
            $date['path'] = $request->file('file')->store('/', 'public');
        }

        $data['source'] = 'local';

        if (File::create($data)) {
            toastr()->success('File stored successfully!');
        } else {
            toastr()->error('File stored filed!');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view('dashboard.files.show', compact('file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('dashboard.files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $data = $request->validate([
            'name' => 'required',
            'file' => 'nullable',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'comment' => 'nullable',
        ]);

        if ($request->hasFile('file')) {
            $date['path'] = $request->file('file')->store('/', 'public');
        }

        $data['source'] = 'local';

        if ($file->update($data)) {
            toastr()->success('File updated successfully!');
        } else {
            toastr()->error('File update filed!');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        if ($file) {
            if ($file->delete()) {
                toastr()->success('File deleted successfully');
            } else {
                toastr()->error('File delete failed');
            }
        } else {
            toastr()->warning('File not found');
        }

        return redirect()->route('dashboard');
    }


    public function dirveImport(Request $request)
    {
        // $file =  json_decode($request->toArchive[0]);
        // $filename = $file->name;
        // $ext = $file->extension;
        // $filepath = $file->path;
        // $rawData = Storage::cloud()->get($filepath);
        // Storage::disk('public')->put($filename, $rawData);
        // return back();
        $request->validate([
            'toArchive' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ]);

        if (count($request->toArchive) < 1) {
            toastr()->warning('No file selected');
        } else {
            $driveFiles = $request->toArchive;
            foreach ($driveFiles as $key => $file) {
                try {
                    $file = json_decode($file);
                    $filename = $file->name;
                    $ext = $file->extension;
                    $filepath = $file->path;
                    $rawData = Storage::cloud()->get($filepath);
                    Storage::disk('public')->put($filename, $rawData);
                    $newFile = new File();
                    $newFile->name = $filename;
                    $newFile->category_id = $request->category_id;
                    $newFile->sub_category_id = $request->sub_category_id;
                    $newFile->source = 'drive';
                    $newFile->path = '/storage/'.$filename;
                    $newFile->save();
                } catch (\Throwable $th) {
                    return $th;
                }
            }
        }
        toastr()->success('File improted');
        return back();
    }
}
