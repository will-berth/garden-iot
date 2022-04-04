<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\FirebaseService;

class Maceta
{
    private $administrador;
    private $tipo;
    private $id_sensor;
    private $limite;
    private static $service;
    public function __construct($admin, $tipo, $id_sensor, $limite)
    {
        $this->administrador = $admin;
        $this->tipo = $tipo;
        $this->id_sensor = $id_sensor;
        $this->limite = $limite;
    }

    public function getAdmin()
    {
        return $this->administrador;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getId_sensor()
    {
        return $this->id_sensor;
    }

    public function getLimite()
    {
        return $this->limite;
    }

    public static function addMaceta($admin, $tipo, $id_sensor, $limite)
    {
        $service = new FirebaseService();
        $maceta = new Maceta($admin, $tipo, $id_sensor, $limite);
        $response = $service->addMacetaTest($maceta);
        return $response;
    }
}
