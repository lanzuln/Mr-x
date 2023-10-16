<?php

namespace App\Http\Controllers\Backend;

use view;
use App\Models\HeroProperty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function heroPage() {
        return view('backend.pages.home.hero');
    }



}
