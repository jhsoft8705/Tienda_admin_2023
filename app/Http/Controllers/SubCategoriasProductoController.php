<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\SubCategoriaProducto;
use Illuminate\Http\Request;

class SubCategoriasProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id)
    {
        $categoria = CategoriaProducto::find($id);
        return view('pages.sub_categorias_producto.create', [
            'categoria' => $categoria
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200|unique:sub_categorias_producto',
            'estado' => 'required',
            'id' => 'required'
        ]);

        try {
            $sub_categoria_producto = new SubCategoriaProducto();
            $sub_categoria_producto->nombre = $request->nombre;
            $sub_categoria_producto->estado = $request->estado;
            $sub_categoria_producto->categoria_producto_id = $request->id;
            $sub_categoria_producto->save();

            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $subcategoria = SubCategoriaProducto::find($id);
        return view('pages.sub_categorias_producto.edit', [
            'subcategoria' => $subcategoria
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200',
            'estado' => 'required',
            'id' => 'required'
        ]);

        try {
            $sub_categoria_producto = SubCategoriaProducto::find($request->id);
            $sub_categoria_producto->nombre = $request->nombre;
            $sub_categoria_producto->estado = $request->estado;
            $sub_categoria_producto->update();

            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function storeProducto(Request $request)
    {
        try {
            $sub_categorias_producto = CategoriaProducto::all();
            foreach ($sub_categorias_producto as $object) {
                if ($object->nombre == $request->nombre && $object->categoria_producto_id == $request->id) {
                    return response()->json([
                        'error' => true,
                        'msg' => 'El nombre que ingreso ya existe'
                    ]);
                }
            }
            $sub_categoria_producto = new SubCategoriaProducto();
            $sub_categoria_producto->nombre = $request->nombre;
            $sub_categoria_producto->categoria_producto_id = $request->id;
            $sub_categoria_producto->estado = 1;
            $sub_categoria_producto->save();

            return response()->json([
                'error' => false,
                'id' => $sub_categoria_producto->sub_categoria_producto_id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'msg' => 'Lo sentimos ocurrio un error, intentelo mas tarde'
            ]);
        }
    }

    public function delete(Request $request)
    {
        try {
            $sub_categoria_producto = SubCategoriaProducto::find($request->id);
            $sub_categoria_producto->delete();
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
