<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriasProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('pages.categorias_producto.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200|unique:categorias_producto',
            'estado' => 'required',
            'tipo' => 'required'
        ]);

        try {
            $categoria_producto = new CategoriaProducto();
            $categoria_producto->nombre = $request->nombre;
            $categoria_producto->estado = $request->estado;
            $categoria_producto->tipo = $request->tipo;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('categorias', $file_name);
                $categoria_producto->imagen = $file_name;
            }
            $categoria_producto->save();

            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $categoria_producto = CategoriaProducto::find($id);
        return view('pages.categorias_producto.edit', [
            'categoria_producto' => $categoria_producto
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'categoria_producto_id' => 'required',
            'nombre' => 'required|max:200',
            'estado' => 'required',
            'tipo' => 'required'
        ]);

        try {
            $categorias_producto = CategoriaProducto::all();
            foreach ($categorias_producto as $object) {
                if ($object->categoria_producto_id != $request->categoria_producto_id && $object->nombre == $request->nombre) {
                    return Redirect::back()->with('nombre', 'El nombre que ingreso ya esta registrado.');
                }
            }
            $categoria_producto = CategoriaProducto::find($request->categoria_producto_id);
            //TODO: ELIMINAR IMAGEN PREVIA
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('categorias', $file_name);
                $categoria_producto->imagen = $file_name;
            }
            $categoria_producto->nombre = $request->nombre;
            $categoria_producto->estado = $request->estado;
            $categoria_producto->tipo = $request->tipo;
            $categoria_producto->update();
            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function delete(Request $request)
    {
        try {
            $categoria_producto = CategoriaProducto::find($request->id);
            $categoria_producto->delete();
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
