<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\FirebaseService;

class Humedad
{
    private $humMax;
    private static $service;

    public static function setState($id_maceta, $humMax)
    {
        $service = new FirebaseService();
        $updateHumMax = $service->setMaxHumedad($id_maceta, $humMax);
        return $updateHumMax;
    }

    public static function humedadActual($id_maceta)
    {
        $service = new FirebaseService();
        $response = $service->getHumedadAct($id_maceta);
        return $response;
    }
}
