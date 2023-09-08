<?php

namespace App\Http\Controllers;

use App\Models\Registro_Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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


        $resmail = Mail::send('emails.forget-password', ['token' => $token], function($message) use($request){
            $message->to($request->correo);
            $message->subject('Reset Password');
        });

        if (!$resmail){
            return redirect()->route('reset')->with('error','Problemas al enviar el email intentalo mas tarde!');
        }

        DB::table('password_reset_tokens')->insert([
            'email' => $request->correo,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('login.index')->with('success', 'Se envio con exito el link a tu correo');

    }

    public function resetPassUser($token)
    {
        return view('new-password', compact('token'));
    }

    public function resetPassUserPost(Request $request)
    {

        $request->validate([
            'correo' => 'required|email|exists:registro_usuarios',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                'email' => $request->correo,
                'token' => $request->token
            ])->first();

        if(!$updatePassword){
                return redirect()->route('reset.pass.user')->with('error', 'Datos Invalidos');
        }

        Registro_Usuario::where('correo', $request->correo)
            ->update(['password' => Hash::make($request->password)
            ]);

        DB::table('password_reset_tokens')
            ->where(['email' => $request->correo])->delete();

        return redirect()->route('login.index')->with('success', 'Contraseña cambiada con exito');
    }
}
