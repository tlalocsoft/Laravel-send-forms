<?php

namespace App\Http\Controllers;

use App\Mail\EjemploEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function emailUno(Request $request) 
    {

        $email = env('MAIL_FROM_ADDRESS');
        $data = $request->all();
        try {
            $response = Mail::to($email)->send(new EjemploEmail($data));
            Log::info("el email EmailContacto se envió a " . $email);
        } catch (\Throwable $th) {
            Log::info("NO se envió el email EmailContacto " . $email);
            Log::info($th);
            // return $this->response(400, 'El email no se pudo enviar', $th);
        }
        // return $this->response(200, "<b>Hemos recibido su correo.</b> <br><br> ¡Nos comunicaremos con usted, lo más pronto posible!", []);
    }
}


