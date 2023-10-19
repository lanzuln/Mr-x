<?php

namespace App\Http\Controllers\Backend\Resume;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendEducation extends Controller
{
    public function listEducationPage() {
        return view('backend.pages.resume.education');
    }

    public function educationData() {
        return  Education::get();
    }

    public function createEducation(Request $request){
        Education::create([
            'duration'=>$request->input('duration'),
            'institutionName'=>$request->input('institutionName'),
            'field'=>$request->input('field'),
            'details'=>$request->input('details')
        ]);

        return response()->json([
        'status'=>'ok',
        'message'=>'Request successfull'
        ], 200);
    }

    function educationById(Request $request){
        $Education_id=$request->input('id');
        return Education::where('id',$Education_id)->first();
    }
    public function updateEducation(request $request){

        $Education_id=$request->input('id');

         Education::where('id',$Education_id)->update([
            'duration'=>$request->input('duration'),
            'institutionName'=>$request->input('institutionName'),
            'field'=>$request->input('field'),
            'details'=>$request->input('details'),
        ]);

        return response()->json([
        'status'=>'ok',
        'message'=>'Update succesfull'
        ], 200);

    }

    public function deleteEducation(request $request){

        $Education_id = $request->input('id');

        Education::where('id',$Education_id)->delete();

        return response()->json([
        'status'=>'ok',
        'message'=>'delete succesfull'
        ], 200);

    }
}
