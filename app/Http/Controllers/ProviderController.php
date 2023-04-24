<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index() {
       
        return view('app.provider.index');
    
    }

    public function list() {

        return view('app.provider.list');

    }

    public function add() {

        return view('app.provider.add');

    }

}
