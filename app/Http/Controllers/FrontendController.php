<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function employee()
    {
        return view('frontend.employee');
    }
}
