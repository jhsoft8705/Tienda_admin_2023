<?php

namespace App\Http\Controllers;

use App\Models\PrecioPorMayor;
use App\Models\Producto;
use Illuminate\Http\Request;

class PrecioPorMayorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['Administrador']);
    }

    public function create($id)
    {
        $producto = Producto::find($id);
        return view(
            'pages.precios_por_mayor.create',
            [
                'producto' => $producto
            ]
        );
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cantidad' => 'required',
            'precio' => 'required',
        ]);

        try {
            $precio_por_mayor = new PrecioPorMayor();
            $precio_por_mayor->cantidad = $request->cantidad;
            $precio_por_mayor->precio = $request->precio;
            $precio_por_mayor->producto_id = $request->id;
            $precio_por_mayor->save();
            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $precio = PrecioPorMayor::find($id);
        return view('pages.precios_por_mayor.edit', [
            'precio' => $precio
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
        ]);

        try {
            $precio = PrecioPorMayor::find($request->id);
            $precio->cantidad = $request->cantidad;
            $precio->precio = $request->precio;
            $precio->update();
            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $precio = PrecioPorMayor::find($request->id);
            $precio->delete();
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
