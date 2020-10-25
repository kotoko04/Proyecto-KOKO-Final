<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewCategoria(){
        return view('admin.categoria');
    }

    public function addCategoria(Request $request){

        $categoria = new Categoria();
        $maxId = Categoria::max('id');
        if(!isset($maxId)){
            $maxId = 0;
        }else{
            $maxId = $maxId +1;
        }
        $categoria->id = $maxId;
        $categoria->descripcion = $request->input('descripcion');
        $categoria->estado = $request->input('estado');
        $categoria->save();
        return back();
    }



}
