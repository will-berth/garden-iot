<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        $dataUser = $request->session()->get('authenticated');
        return view('dashboard', ['dataProfile' => $dataUser]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('authenticated');
        $request->session()->flush();
        alert()->image(
            'Chau!',
            'mil besos, mil besitos, vuelva pronto, mil besos...',
            asset('img-alert/logOut.jpg'),
            300,
            300, 
            'al'
        );
        return redirect()->intended('/auth/login');
    }
}
