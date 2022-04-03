<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function iniciarSesion(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('pass');
        $user = User::getUserLog($email, $pass);
        if($user != null)
        {
            // Alert::success('Success Title', 'Success Message');
            alert()->image(
                'Exitoso!',
                'Bienvenido precioso.',
                asset('img-alert/signInSuccess.png'),
                500,
                300, 
                'al'
            );
            $dataAuth = [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'photo' => $user->getPhotoUri(),
                'uid' => $user->getUid(),
            ];
            $request->session()->put('authenticated', $dataAuth);
            return redirect()->intended('/dashboard');
            // return view('dashboard');
        }
        alert()->image(
            'Error!',
            'Contraseña o correo incorrecto.',
            asset('img-alert/signInFail.png'),
            500,
            300, 
            'al'
        );
        return redirect()->back();

    }

    public function registrar(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('pass');
        $name = $request->input('name');

        $response = User::createUser($email, $pass, $name);
        if($response['status'])
        {
            alert()->image(
                'Registro exitoso!',
                'Ahora puedes iniciar sesión.',
                asset('img-alert/signUpSuccess.png'),
                500,
                300, 
                'al'
            );
            return redirect()->back();
        }
        alert()->image(
            'Error!',
            'El correo ya existe.',
            asset('img-alert/signUpFail.png'),
            500,
            300, 
            'al'
        );
        return redirect()->back();
    }
}
