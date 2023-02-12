<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallbackController extends Controller
{
    public function __invoke(){
        return view('frontend.fallback.error-404');
    }
}
