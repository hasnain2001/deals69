<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function showNotFound()
    {
        return view('notfound');
    }
}
