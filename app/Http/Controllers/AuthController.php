<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class AuthController extends Controller
{
    public function loginView(Request $request){
         if (Auth::check()) {
            //return $this->getDefaultRedirect($request);
            return redirect()->route('dashboard');
        }

        return view('security.login-form');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 404);
        }

        $user = User::where('email', $request->input('email'))
            ->where('estado', true)
            ->first();

        if (!$user || (!password_verify($request->input('password'), $user->password))) {
            return response()->json(['errors' => [
                'credenciales' => 'Credenciales Incorrectas',
            ]]);
        }
        Auth::login($user);

        return response()->json([
            'msg' => 'Credenciales correctas',
            'url' => route('dashboard'),
        ]);

    }
}
