<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\HeroProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BackendHero extends Controller {
    public function heroPage() {
        return view('backend.pages.home.hero');
    }

    // get hero data
    public function herodata(Request $request) {
        $heroData = HeroProperty::where('id', 1)->first();

        return response()->json([
            'status' => 'success',
            'message' => 'Request successful',
            'data' => $heroData,
        ], 200);
    }

    // update hero data
    public function updateHero(Request $request) {

        $id = $request->input('id');

        if ($request->hasFile('img')) {

            // Upload New File
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$t}-{$file_name}";
            $img->move(public_path('uploads'), $img_name);

            $img_url = "uploads/{$img_name}";

            // Delete Old File
            $filePath = $request->input('img_path');
            File::delete($filePath);

            // Update

            return HeroProperty::where('id', $id)->update([
                'key_line' => $request->input('key_line'),
                'title' => $request->input('title'),
                'short_title' => $request->input('short_title'),
                'img' => $img_url,
            ]);

        } else {
            return HeroProperty::where('id', $id)->update([
                'key_line' => $request->input('key_line'),
                'title' => $request->input('title'),
                'short_title' => $request->input('short_title'),
            ]);
        }

    }

    // ---------- about
    public function aboutPage() {
        return view('backend.pages.home.about');
    }
    public function aboutData(Request $request) {
        $aboutData = About::first();

        return response()->json([
            'status' => 'success',
            'message' => 'Request successful',
            'data' => $aboutData,
        ], 200);
    }

    public function updateAbout(Request $request) {
        return About::first()->update([
            'title'=> $request->input('title'),
            'details'=> $request->input('details'),
        ]);
    }


     // ---------- social
     public function socialPage() {
        return view('backend.pages.home.about');
    }
    public function socialData(Request $request) {
        $aboutData = About::first();

        return response()->json([
            'status' => 'success',
            'message' => 'Request successful',
            'data' => $aboutData,
        ], 200);
    }

    public function updateSocial(Request $request) {
        return About::first()->update([
            'title'=> $request->input('title'),
            'details'=> $request->input('details'),
        ]);
    }
}
