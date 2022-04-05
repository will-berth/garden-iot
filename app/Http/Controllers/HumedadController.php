<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Humedad;

class HumedadController extends Controller
{
    //
    public function getHumedadAct()
    {
        return 2;
    }

    public function setHumMax(Request $request)
    {
        $id_maceta = $request->input('id_maceta');
        $humMax = $request->input('humMax');
        Humedad::setState($id_maceta, intval($humMax));
        return redirect()->back();
    }

    public function verHumedadAct(Request $request)
    {
        $id_maceta = $request->id_maceta;
        $humedadActual = Humedad::humedadActual($id_maceta);
        return $humedadActual;
    }
}
