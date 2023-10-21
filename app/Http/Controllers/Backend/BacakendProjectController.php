<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BacakendProjectController extends Controller {
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
            'title' => $request->input('title'),
            'thumbnailLink' => $thumb_filePath,
            'previewLink' => $prev_filePath,
            'details' => $request->input('details'),
        ]);
        return response()->json([
            'status' => 'ok',
            'message' => 'Created successfully',
        ], 200);
    }

    public function ProjectById(Request $request) {

        $project_id = $request->input('id');
        return Project::where('id', $project_id)->first();

    }

    public function updateProject(Request $request) {

        $id = $request->input('id');

        if ($request->hasFile('update_thumbnailLink') || $request->hasFile('update_previewLink')) {

            // -------thumbnailLink
            $thumb_file = request()->file('update_thumbnailLink');
            $thumb_fileName = hexdec(uniqid()) . '.' . $thumb_file->getClientOriginalExtension();
            $thumb_file->move(public_path('/uploads/project'), $thumb_fileName);
            $thumb_filePath = "uploads/project/{$thumb_fileName}";

            //--------- previewLink
            $prev_file = request()->file('update_previewLink');
            $prev_fileName = hexdec(uniqid()) . '.' . $prev_file->getClientOriginalExtension();
            $prev_file->move(public_path('/uploads/project'), $prev_fileName);
            $prev_filePath = "uploads/project/{$prev_fileName}";

            // Delete Old File
            $delete_thumb_filePath = $request->input('thumb_filePath');
            File::delete($delete_thumb_filePath);

            $delete_filePath = $request->input('prev_filePath');
            File::delete($delete_filePath);

            // Update

            return Project::where('id', $id)->update([
                'title' => $request->input('title'),
                'thumbnailLink' => $thumb_filePath,
                'previewLink' => $prev_filePath,
                'details' => $request->input('details'),
            ]);

        } else {
            return Project::where('id', $id)->update([
                'key_line' => $request->input('key_line'),
                'title' => $request->input('title'),
                'short_title' => $request->input('short_title'),
            ]);
        }

    }

    function deleteProject(Request $request) {

        $poject_id = $request->input('id');

        $delete_thumb_filePath = $request->input('thumb_filePath');
        File::delete($delete_thumb_filePath);

        $delete_filePath = $request->input('prev_filePath');
        File::delete($delete_filePath);

        return Project::where('id', $poject_id)->delete();

    }
}
