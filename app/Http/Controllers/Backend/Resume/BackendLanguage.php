<?php

namespace App\Http\Controllers\Backend\Resume;

use App\Models\Skill;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendLanguage extends Controller {
    public function listLanguagePage() {
        return view('backend.pages.resume.language');
    }

    public function languageData() {
        return  Language::get();
    }

    public function createLanguage(Request $request){
        Language::create([
            'name'=>$request->input('name'),
        ]);

        return response()->json([
        'status'=>'ok',
        'message'=>'Create successful'
        ], 200);
    }

    function languageById(Request $request){
        $language_id=$request->input('id');
        return Language::where('id',$language_id)->first();
    }
    public function updateLanguage(request $request){

        $language_id=$request->input('id');

         Language::where('id',$language_id)->update([
            'name'=>$request->input('name'),
        ]);

        return response()->json([
        'status'=>'ok',
        'message'=>'Update succesfull done'
        ], 200);

    }

    public function deleteLanguage(request $request){

        $language_id = $request->input('id');

        Language::where('id',$language_id)->delete();

        return response()->json([
        'status'=>'ok',
        'message'=>'Delete succesfull'
        ], 200);

    }
}
