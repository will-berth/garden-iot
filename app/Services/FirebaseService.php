<?php
namespace App\Services;

require './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth\SignIn\FailedToSignIn;
use Kreait\Firebase\Exception\Auth\EmailExists;

class FirebaseService
{
    private $firebase;
    private $db;

    public function __construct()
    {
        $this->firebase = (new Factory)->withServiceAccount('./key/test-int-2851b.json')->withDatabaseUri('https://test-int-2851b-default-rtdb.firebaseio.com');
        $this->db = $this->firebase->createDatabase();
    }

    public function setTemp()
    {
        $this->db->getReference('config/website')->set([
            'name' => 'My Application',
            'emails' => [
                'support' => 'support@domain.tld',
                'sales' => 'sales@domain.tld',
            ],
            'website' => 'https://app.domain.tld',
           ]);
    }

    public function getHumedad(){
        $reference = $this->db->getReference('jardin');
        $snapshot = $reference->getSnapshot();

        $value = $snapshot->getValue();
        return $value;
    }

    // Registrar
    public function signUp($email, $pass, $name)
    {
        $auth = $this->firebase->createAuth();
        $response = [];
        $userProperties = [
            'email' => $email,
            'emailVerified' => false,
            'password' => $pass,
            'displayName' => $name,
            'photoUrl' => '',
        ];

        try{

            $result = $auth->createUser($userProperties);
            $response = [
                'status' => true,
            ];
        }catch(EmailExists $e){
            $response = [
                'status' => false,
                'data' => $e->getMessage(),
            ];
        }
        return $response;
    }

    // Iniciar Sesión
    public function signIn($email, $pass)
    {
        $auth = $this->firebase->createAuth();
        $response = [];
        try{
            $signInResult = $auth->signInWithEmailAndPassword($email, $pass);
            $response = [
                'status' => true,
                'data' => $signInResult,
            ];
        }catch(FailedToSignIn $e){
            $response = [
                'status' => false,
                'data' => $e->getMessage(),
            ];
        }
        return $response;
    }

    public function updatePhotoURI($uri, $uidUser)
    {
        $auth = $this->firebase->createAuth();
        $properties = [
            'photoURL' => $uri
        ];

        return $auth->updateUser($uidUser, $properties);
    }

    public function updateDataUser($name, $email, $uidUser)
    {
        $auth = $this->firebase->createAuth();
        $properties = [
            'email' => $email,
            'displayName' => $name,
        ];

        return $auth->updateUser($uidUser, $properties);
    }
}