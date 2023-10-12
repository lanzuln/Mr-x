<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    function page(Request $request){
        $seo= DB::table('seoproperties')->where('pageName','=','projects')->first();
        return view('pages.projects',compact('seo'));
    }
    function projectsData(Request $request){
        return DB::table('projects')->get();
    }
}
