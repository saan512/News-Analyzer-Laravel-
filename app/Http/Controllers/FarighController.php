<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FarighController extends Controller
{
    public function index()
    {
        return view('/support');
    }
}
