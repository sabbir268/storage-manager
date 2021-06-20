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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }


    public function dirveImport(Request $request)
    {
        $file =  json_decode($request->toArchive[0]);
        // return $file->name;
        // return $rawData = Storage::cloud()->get($request->toArchive[0]);
        $file = json_decode($file);
        $filename = $file->name;
        $ext = $file->extension;
        $filepath = $file->path;
        $rawData = Storage::cloud()->get($filepath);
        $completeFileName = $filename.'.'.$ext;
        Storage::disk('public')->put($completeFileName, $rawData);
        return back();
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
                $file = json_decode($file);
                $filename = $file->name;
                $ext = $file->extension;
                $filepath = $file->path;
                $rawData = Storage::cloud()->get($filepath);
                $completeFileName = $filename.'.'.$ext;
                Storage::disk('public')->put($completeFileName, $rawData);
            }
        }
        toastr()->success('File improted');
        return back();
    }
}
