<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil{
    private $name;
    private $email;
    private static $service;

    public function __construct()
    {
        $service = new FirebaseService();
    }

    public static function updatePhoto($uri)
    {
        $properties = [
            'photoURL' => $uri
        ];

        $updatedUser = $service->updateUser($uid, $properties);
    }
}