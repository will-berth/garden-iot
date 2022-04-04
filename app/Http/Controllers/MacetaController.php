<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maceta;

class MacetaController extends Controller
{
    //
    public function index(Request $request)
    {
        $dataUser = $request->session()->get('authenticated');
        return view('agregar', ['dataProfile' => $dataUser]);
    }

    public function registrarMaceta(Request $request)
    {
        $admin = $request->input('admin');
        $tipo = $request->input('tipo');
        $id_sensor = $request->input('id_sensor');
        $limite = $request->input('limite');
        $data = Maceta::addMaceta($admin, $tipo, $id_sensor, intval($limite));
        return redirect()->back();
    }
}