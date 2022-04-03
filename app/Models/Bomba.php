<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\FirebaseService;

class Bomba
{
    private $state;
    private static $service;

    // public function __construct()
    // {
    // }
    
    public static function setState($id_maceta, $state)
    {
        $service = new FirebaseService();
        $updateBomba = $service->setStateBomba($id_maceta, $state);
        return $updateBomba;
    }
}
