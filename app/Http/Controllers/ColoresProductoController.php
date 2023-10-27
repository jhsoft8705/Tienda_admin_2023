<?php

namespace App\Http\Controllers;

use App\Models\ColorProducto;
use App\Models\ImagenProducto;
use App\Models\Producto;
use App\Models\TallaProducto;
use Illuminate\Http\Request;

class ColoresProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['Administrador']);
    }

    public function create($id)
    {
        $producto = Producto::find($id);
        return view('pages.colores_producto.create', [
            'producto' => $producto
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200',
        ]);
        try {
            $color_producto = new ColorProducto();
            $color_producto->nombre = $request->nombre;
            $color_producto->codigo_color = $request->codigo_color;
            $color_producto->estado_stock = $request->estado_stock;
            $color_producto->estado_principal = $request->estado_principal;
            $color_producto->producto_id = $request->id;
            $color_producto->save();

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $imagen_producto = new ImagenProducto();
                $file = $request->file('image');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('colores_producto/' . $request->id, $file_name);
                $imagen_producto->imagen = $file_name;
                $imagen_producto->color_producto_id = $color_producto->color_producto_id;
                $imagen_producto->save();
            }


            if ($request->hasFile('image2') && $request->file('image2')->isValid()) {
                $imagen_producto = new ImagenProducto();
                $file = $request->file('image2');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('colores_producto/' . $request->id, $file_name);
                $imagen_producto->imagen = $file_name;
                $imagen_producto->color_producto_id = $color_producto->color_producto_id;
                $imagen_producto->save();
            }


            if ($request->hasFile('image3') && $request->file('image3')->isValid()) {
                $imagen_producto = new ImagenProducto();
                $file = $request->file('image3');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('colores_producto/' . $request->id, $file_name);
                $imagen_producto->imagen = $file_name;
                $imagen_producto->color_producto_id = $color_producto->color_producto_id;
                $imagen_producto->save();
            }
            $tallas = (array)json_decode($request->tallas);
            foreach ($tallas as $tallaObject) {
                $talla = new TallaProducto();
                $talla->talla = $tallaObject->nombre;
                $talla->estado_stock = $tallaObject->estado_stock;
                $talla->color_producto_id = $color_producto->color_producto_id;
                $talla->save();
            }

            return response()->json([
                'error' => false
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'e' => $e
            ]);
        }
    }

    public function edit($id)
    {
        $color = ColorProducto::find($id);
        $imagen1 =  $color->imagenes()->skip(0)->first();
        $imagen2 =  $color->imagenes()->skip(1)->first();
        $imagen3 =  $color->imagenes()->skip(2)->first();
        return view('pages.colores_producto.edit', [
            'color' => $color,
            'imagen1' => $imagen1,
            'imagen2' => $imagen2,
            'imagen3' => $imagen3
        ]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200',
        ]);
        try {
            $color_producto = ColorProducto::find($request->id);
            $color_producto->nombre = $request->nombre;
            $color_producto->codigo_color = $request->codigo_color;
            $color_producto->estado_principal = $request->estado_principal;
            $color_producto->estado_stock = $request->estado_stock;
            $color_producto->update();

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $imagen_producto = $request->id_image1 == 0 ? new ImagenProducto() : ImagenProducto::find($request->id_image1);
                $file = $request->file('image');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('colores_producto/' . $color_producto->producto_id, $file_name);
                $imagen_producto->imagen = $file_name;
                if ($request->id_image1 == 0) {
                    $imagen_producto->color_producto_id = $color_producto->color_producto_id;
                    $imagen_producto->save();
                } else {
                    $imagen_producto->update();
                }
            }


            if ($request->hasFile('image2') && $request->file('image2')->isValid()) {
                $imagen_producto = $request->id_image2 == 0 ? new ImagenProducto() : ImagenProducto::find($request->id_image2);
                $file = $request->file('image2');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('colores_producto/' . $color_producto->producto_id, $file_name);
                $imagen_producto->imagen = $file_name;
                if ($request->id_image2 == 0) {
                    $imagen_producto->color_producto_id = $color_producto->color_producto_id;
                    $imagen_producto->save();
                } else {
                    $imagen_producto->update();
                }
            }


            if ($request->hasFile('image3') && $request->file('image3')->isValid()) {
                $imagen_producto = $request->id_image3 == 0 ? new ImagenProducto() : ImagenProducto::find($request->id_image3);
                $file = $request->file('image3');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('colores_producto/' . $color_producto->producto_id, $file_name);
                $imagen_producto->imagen = $file_name;
                if ($request->id_image3 == 0) {
                    $imagen_producto->color_producto_id = $color_producto->color_producto_id;
                    $imagen_producto->save();
                } else {
                    $imagen_producto->update();
                }
            }
            $tallas = (array)json_decode($request->tallas);
            foreach ($tallas as $tallaObject) {
                $talla = new TallaProducto();
                $talla->talla = $tallaObject->nombre;
                $talla->estado_stock = $tallaObject->estado_stock;
                $talla->color_producto_id = $color_producto->color_producto_id;
                $talla->save();
            }

            $tallasRegistradas = (array)json_decode($request->tallasRegistradas);
            foreach ($tallasRegistradas as $tallaObject) {
                $talla = TallaProducto::find($tallaObject->talla_producto_id);
                $talla->talla = $tallaObject->talla;
                $talla->estado_stock = $tallaObject->estado_stock;
                $talla->update();
            }
            $tallasEliminar = (array)json_decode($request->tallasEliminar);
            foreach ($tallasEliminar as $tallaObject) {
                $talla = TallaProducto::find($tallaObject->id);
                $talla->delete();
            }

            return response()->json([
                'error' => false
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'e' => $e
            ]);
        }
    }
}
