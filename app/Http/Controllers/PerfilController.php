<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class PerfilController extends Controller
{
    //
    public function index(Request $request)
    {
        $dataUser = $request->session()->get('authenticated');
        return view('profile', ['dataProfile' => $dataUser]);
    }

    public function changePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->photo->extension();  
     
        $request->photo->move(public_path('profile-photos'), $imageName);
        $dataUser = $request->session()->get('authenticated');
        User::updatePhoto($imageName, $dataUser['uid']);
        $request->session()->put('authenticated.photo', $imageName);
        return redirect()->back();
    }

    public function changeDataUser(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $dataUser = $request->session()->get('authenticated');
        User::updateInfoUser($name, $email, $dataUser['uid']);
        $request->session()->put('authenticated.name', $name);
        $request->session()->put('authenticated.email', $email);
        return redirect()->back();
    }
}
