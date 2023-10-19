<?php

namespace App\Http\Controllers\Backend\Resume;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendExperience extends Controller {
    public function listExperiencePage() {
        return view('backend.pages.resume.experience');
    }

    public function experienceData() {
        return  Experience::get();
    }

    public function createExperience(Request $request){
        Experience::create([
            'duration'=>$request->input('duration'),
            'title'=>$request->input('title'),
            'designation'=>$request->input('designation'),
            'details'=>$request->input('details')
        ]);

        return response()->json([
        'status'=>'ok',
        'message'=>'Request successfull'
        ], 200);
    }

    function experienceById(Request $request){
        $experience_id=$request->input('id');
        return Experience::where('id',$experience_id)->first();
    }
    public function updateExperience(request $request){

        $experience_id=$request->input('id');

         Experience::where('id',$experience_id)->update([
            'duration'=>$request->input('duration'),
            'title'=>$request->input('title'),
            'designation'=>$request->input('designation'),
            'details'=>$request->input('details'),
        ]);

        return response()->json([
        'status'=>'ok',
        'message'=>'Update succesfull'
        ], 200);

    }

    public function deleteExperience(request $request){

        $experience_id = $request->input('id');

        Experience::where('id',$experience_id)->delete();

        return response()->json([
        'status'=>'ok',
        'message'=>'Delete succesfull'
        ], 200);

    }
}
