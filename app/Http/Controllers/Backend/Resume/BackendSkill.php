<?php

namespace App\Http\Controllers\Backend\Resume;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendSkill extends Controller {
    public function listSkillPage() {
        return view('backend.pages.resume.Skill');
    }

    public function skillData() {
        return  Skill::get();
    }

    public function createSkill(Request $request){
        Skill::create([
            'name'=>$request->input('name'),
        ]);

        return response()->json([
        'status'=>'ok',
        'message'=>'Create successful'
        ], 200);
    }

    function skillById(Request $request){
        $Skill_id=$request->input('id');
        return Skill::where('id',$Skill_id)->first();
    }
    public function updateSkill(request $request){

        $Skill_id=$request->input('id');

         Skill::where('id',$Skill_id)->update([
            'name'=>$request->input('name'),
        ]);

        return response()->json([
        'status'=>'ok',
        'message'=>'Update succesfull'
        ], 200);

    }

    public function deleteSkill(request $request){

        $Skill_id = $request->input('id');

        Skill::where('id',$Skill_id)->delete();

        return response()->json([
        'status'=>'ok',
        'message'=>'Delete succesfull'
        ], 200);

    }
}
