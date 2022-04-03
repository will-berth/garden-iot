<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JardinesController extends Controller
{
    //
    public function index(Request $request)
    {
        $nameUser = $request->session()->get('authenticated');
        return view('jardines', ['nombre' => $nameUser]);
    }
}
