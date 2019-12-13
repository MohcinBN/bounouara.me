<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }

    public function portfolio()
    {
        return view('portfolio');
    }
    
    public function contactPage()
    {
        return view('contact');
    }

    public function resume()
    {
        return view('resume');
    }

}
