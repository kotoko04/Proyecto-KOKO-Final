<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $dataEmpresa  = DB::select('SELECT * FROM users');
        $dataCategoria  = DB::select('SELECT * FROM categorias');
        return view('welcome')->with(compact('dataEmpresa', 'dataCategoria'));
    }

    public function listProducto(Request $request){

        $dato = $request->input('search');
        if($dato=='no'){
            $dataProducto = Producto::select( 'productos.id','productos.ruta','productos.descripcioncorta','productos.nombre','productos.valor')->join('categorias', 'categorias.id', '=', 'productos.categoria_id')->paginate(6);;
        }else{
            $dataProducto = Producto::select( 'productos.id','productos.ruta','productos.descripcioncorta','productos.nombre','productos.valor')->join('categorias', 'categorias.id', '=', 'productos.categoria_id')->where('categorias.id', '=', $dato)->paginate(3);
        }
        if($dataProducto!=""){
            foreach ($dataProducto as $est) {
                $json[] = array(
                    'id' => $est['id'],
                    'ruta' => $est['ruta'],
                    'nombre' => $est['nombre'],
                    'valor' => $est['valor'],
                    'descripcion' => $est['descripcioncorta'],
                );
            }
            $JString = json_encode($json);
            echo $JString;
        }else{
            echo 0;
        }

    }

    public function viewlistProductoOrden(){
        $dataCategorias  = DB::select('SELECT descripcion ,estado, id FROM categorias ');
        $dataMarcas  = DB::select('SELECT descripcion ,nombre, id FROM marcas ');
        return view('dashboard.index')->with(compact('dataCategorias','dataMarcas'));;
    }

    public function listProductoOrden($idC, $idM){
        $dataCategorias  = DB::select('SELECT descripcion ,estado, id FROM categorias ');
        $dataMarcas  = DB::select('SELECT descripcion ,nombre, id FROM marcas ');
        if($idM=='no'){
            $dataProducto = Producto::select( 'productos.id','productos.ruta','productos.descripcioncorta','productos.nombre','productos.valor')->join('categorias', 'categorias.id', '=', 'productos.categoria_id')
                ->where('productos.categoria_id', '=', $idC)
                ->get();

        }else{
            $dataProducto = Producto::select( 'productos.id','productos.ruta','productos.descripcioncorta','productos.nombre','productos.valor')->join('categorias', 'categorias.id', '=', 'productos.categoria_id')->join('marcas', 'marcas.id', '=', 'productos.marca_id')
                ->where('productos.categoria_id', '=', $idC)->where('productos.marca_id', '=', $idM)
                ->get();
        }
        return view('dashboard.index')->with(compact('dataProducto','dataCategorias','dataMarcas'));;


    }

    function buscarProducto(Request $request){
        $dato = $request->input('search');

        try {
            $producto = Producto::where('productos.nombre', 'like',  $dato.'%' )->get();

            foreach ($producto as $est) {
                $json[] = array(
                    'id' => $est['id'],
                    'ruta' => $est['ruta'],
                    'descripcion' => $est['descripcioncorta'],
                    'valor' => $est['valor'],
                    'nombre' => $est['nombre'],
                );
            }
            $JString = json_encode($json);
            echo $JString;

        } catch (\Exception $e) {

            echo 0;
        }

    }
}
