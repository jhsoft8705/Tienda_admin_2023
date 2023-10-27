<?php

namespace App\Http\Controllers;

use App\Models\MarcaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MarcasProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['Administrador']);
    }

    public function create()
    {
        return view('pages.marcas_producto.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200|unique:marcas_producto',
        ]);

        try {

            $marca_producto = new MarcaProducto();
            $marca_producto->nombre = $request->nombre;
            $marca_producto->save();

            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function storeProducto(Request $request)
    {
        try {
            $marcas_producto = MarcaProducto::all();
            foreach ($marcas_producto as $object) {
                if ($object->nombre == $request->nombre) {
                    return response()->json([
                        'error' => true,
                        'msg' => 'El nombre que ingreso ya existe'
                    ]);
                }
            }
            $marca_producto = new MarcaProducto();
            $marca_producto->nombre = $request->nombre;
            $marca_producto->save();

            return response()->json([
                'error' => false,
                'id' => $marca_producto->marca_producto_id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'msg' => 'Lo sentimos ocurrio un error, intentelo mas tarde'
            ]);
        }
    }


    public function edit($id)
    {
        $marca_producto = MarcaProducto::find($id);
        return view('pages.marcas_producto.edit', [
            'marca_producto' => $marca_producto
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'marca_producto_id' => 'required',
            'nombre' => 'required|max:200',
        ]);

        try {
            $marcas_producto = MarcaProducto::all();
            foreach ($marcas_producto as $object) {
                if ($object->marca_producto_id != $request->marca_producto_id && $object->nombre == $request->nombre) {
                    return Redirect::back()->with('nombre', 'El nombre que ingreso ya esta registrado.');
                }
            }
            $marca_producto = MarcaProducto::find($request->marca_producto_id);
            $marca_producto->nombre = $request->nombre;
            $marca_producto->update();
            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function delete(Request $request)
    {
        try {
            $marca_producto = MarcaProducto::find($request->id);
            $marca_producto->delete();
            return response()->json([
                'error' => false,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'e' => $e,
                'error' => true,
            ]);
        }
    }
}
