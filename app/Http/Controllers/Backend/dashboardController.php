<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function dashboardPage(){

        return view('backend.pages.dashboard.dashboard-page');
    }

    public function profilePage(){
        return view('backend.pages.dashboard.profile-page');

    }
}
