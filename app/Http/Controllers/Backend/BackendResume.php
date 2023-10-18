<?php

namespace App\Http\Controllers\Backend;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendResume extends Controller {
    public function listExperiencePage() {
        return view('backend.pages.resume.experience');
    }

    public function ExperienceData() {
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
        'message'=>'সব ঠিক আছে'
        ], 200);

    }

    public function deleteExperience(request $request){

        $experience_id = $request->input('id');

        Experience::where('id',$experience_id)->delete();

        return response()->json([
        'status'=>'ok',
        'message'=>'ডিলেট হইছে'
        ], 200);

    }
}
