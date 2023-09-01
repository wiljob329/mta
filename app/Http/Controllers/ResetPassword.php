<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPassword extends Controller
{
    //
    public function create() 
    {
        return view('resetpass');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'correo' => 'required|email|exists:registro_usuarios'
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->correo,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('emails.forget-password', ['token' => $token], function($message) use($request){
            $message->to($request->correo);
            $message->subject('Reset Password');
        });

        return redirect()->to(route('reset'))->with('success', 'Se envio con exito el link a tu correo');

    }

    public function resetPassUser($token)
    {
        return view('new-password', compact('token'));
    }

    public function resetPassUserPost(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:registro_usuarios',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        

    }
}
