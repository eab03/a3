<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrabbleController extends Controller
{
    /**
    * GET
    * /
    */
    public function index() {
        return view('welcome');
    }
}
