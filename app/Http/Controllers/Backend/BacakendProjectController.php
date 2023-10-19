<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BacakendProjectController extends Controller
{
    public function listProjectPage() {
        return view('backend.pages.project.project');
    }

    public function projectData() {
        return Project::get();
    }

    public function createProject(Request $request) {

        // -------thumbnailLink
        $thumb_file = request()->file('thumbnailLink');
        $thumb_fileName = hexdec(uniqid()) . '.' . $thumb_file->getClientOriginalExtension();
        $thumb_file->move(public_path('/uploads/project'), $thumb_fileName);
        $thumb_filePath = "uploads/project/{$thumb_fileName}";

        //--------- previewLink
        $prev_file = request()->file('previewLink');
        $prev_fileName = hexdec(uniqid()) . '.' . $prev_file->getClientOriginalExtension();
        $prev_file->move(public_path('/uploads/project'), $prev_fileName);
        $prev_filePath = "uploads/project/{$prev_fileName}";


         Project::create([
            'title'=>$request->input('title'),
            'thumbnailLink'=>$thumb_filePath,
            'previewLink'=>$prev_filePath,
            'details'=>$request->input('details')
        ]);
        return response()->json([
        'status'=>'ok',
        'message'=>'Created successfully'
        ], 200);
    }

}
