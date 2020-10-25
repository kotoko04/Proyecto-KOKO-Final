<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewEmpresa(){
        $dataEmpresa  = DB::select('SELECT * FROM users');
        return view('admin.informacion')->with(compact('dataEmpresa'));
    }

    public function updateEmpresa(Request $request){
        try {
            $user = User::first();
            $user->name = $request->input('name');
            $user->quienessomos = $request->input('somos');
            $user->direccion = $request->input('direccion');
            $user->telefono = $request->input('telefono');
            $user->email = $request->input('email');
            $user->username = $request->input('usuario');
            $user->facebook = $request->input('facebook');
            $user->twitter = $request->input('twitter');
            $user->instagram = $request->input('instagram');
            $user->save();
            return back();
        }catch (\Illuminate\Database\QueryException $e){
            Alert::error('Error', 'Descripcion demasiado larga');
            return back();
        }
    }

}
