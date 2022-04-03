<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bomba;

class BombaController extends Controller
{
    //
    public function stateBomba(Request $request)
    {
        $state = $request->state;
        $response = Bomba::setState('maceta1', intval($state));
        return $response;
    }
}
