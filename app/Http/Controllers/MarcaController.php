<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewMarca(){
        return view('admin.marca');
    }

    public function addMarca(Request $request){

        $marca = new Marca();
        $maxId = Marca::max('id');
        if(!isset($maxId)){
            $maxId = 0;
        }else{
            $maxId = $maxId +1;
        }
        $marca->id = $maxId;
        $marca->descripcion = $request->input('descripcion');
        $marca->nombre = $request->input('nombre');
        $marca->save();
        return back();
    }

}
