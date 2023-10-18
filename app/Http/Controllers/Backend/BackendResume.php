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
}
