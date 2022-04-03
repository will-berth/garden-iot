<?php

namespace App\Models;
use App\Services\FirebaseService;

class User
{
    private $email;
    private $name;
    private $photoURI;
    private $uid;
    private static $service;

    public function __construct($email, $name, $photoURI, $uid)
    {
        $this->email = $email;
        $this->name = $name;
        $this->photoURI = $photoURI;
        $this->uid = $uid;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhotoUri()
    {
        return $this->photoURI;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public static function getUserLog($email, $pass)
    {
        $service = new FirebaseService();
        $result = $service->signIn($email, $pass);
        if($result['status'])
        {
            $uriPhoto = '';
            $resEmail = $result['data']->data()['email'];
            $resName = $result['data']->data()['displayName'];
            $uid = $result['data']->data()['localId'];
            if($result['data']->data()['profilePicture'] != '')
            {
                $uriPhoto = $result['data']->data()['profilePicture'];
            }

            return new User($resEmail, $resName, $uriPhoto, $uid);
        }
        // return $result['status'];
    }

    public static function createUser($email, $pass, $name)
    {
        $service = new FirebaseService();
        $result = $service->signUp($email, $pass, $name);
        return $result;
    }

    public static function updatePhoto($uri, $uidUser)
    {
        $service = new FirebaseService();
        $response = $service->updatePhotoURI($uri, $uidUser);
    }

    public static function updateInfoUser($name, $email, $uidUser)
    {
        $service = new FirebaseService();
        $response = $service->updateDataUser($name, $email, $uidUser);
    }
}