<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\LogAcessoMiddleware;

class AboutController extends Controller
{

    // public function __construct() {
       
    //     $this->middleware(LogAcessoMiddleware::class);
    
    // }

    public function about () {

        return view('site.about');

    }
}
