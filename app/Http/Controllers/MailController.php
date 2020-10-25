<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{
    public function getMail(Request $request)
    {
        $data = ['name' => $request->input('name'),
            'asunto' => $request->input('subject'),
            'messag' => $request->input('message')
            ];
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new TestMail($data));
        Alert::success('Correo enviado', 'koko.swimear');
        return back();
    }
}
