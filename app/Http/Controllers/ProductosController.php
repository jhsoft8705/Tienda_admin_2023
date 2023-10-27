<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\MarcaProducto;
use App\Models\Producto;
use App\Models\SubCategoriaProducto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $productos = Producto::all();
        $categorias = CategoriaProducto::all();
        foreach ($categorias as $categoria) {
            switch ($categoria->tipo) {
                case 0:
                    $categoria->tipo_nombre = 'Mujer';
                    break;
                case 1:
                    $categoria->tipo_nombre = 'Hombre';
                    break;
                case 2:
                    $categoria->tipo_nombre = 'Niños';
                    break;
                case 3:
                    $categoria->tipo_nombre = 'Otros';
                    break;
            }
        }
        $marcas = MarcaProducto::all();
        return view('pages.productos.index', [
            "productos" => $productos,
            "categorias" => $categorias,
            "marcas" => $marcas
        ]);
    }

    public function create()
    {
        $producto_tiempo = (Producto::where('estado_mostrar_inicio_oferta', '=', 1)->first()) ? Producto::where('estado_mostrar_inicio_oferta', '=', 1)->first()->nombre : false;
        $productos_imagenes = Collection::make(new Producto);
        for ($i = 1; $i < 8; $i++) {
            $producto_imagen = Producto::where('order_imagen', '=', $i)->where('estado_mostrar_inicio', '=', 1)->first();
            if ($producto_imagen) {
                $productos_imagenes->add($producto_imagen);
            } else {
                $productos_imagenes->add(null);
            }
        }
        $subcategorias = SubCategoriaProducto::where('estado', '=', 1)->get();
        $categorias = CategoriaProducto::where('estado', '=', 1)->get();
        $marcas = MarcaProducto::all();
        return view('pages.productos.create', [
            "producto_tiempo" => $producto_tiempo,
            "subcategorias" => $subcategorias,
            "categorias" => $categorias,
            "marcas" => $marcas,
            "productos_imagenes" => $productos_imagenes,
            "productos_imagenes_json" => $productos_imagenes->toJson()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200|unique:productos',
            'precio' => 'required',
            'precio_oferta' => 'required',
            'estado_stock' => 'required',
            'estado' => 'required',
            'sub_categoria_producto_id' => 'required',
            'marca_producto_id' => 'required',
            'material' => 'required',
            'estado_oferta' => 'required',
        ]);
        try {
            $producto = new Producto();
            $producto->codigo = "000000";
            $producto->nombre = $request->nombre;
            $producto->precio = $request->precio;
            $producto->descripcion = $request->descripcion;
            $producto->precio_oferta = $request->precio_oferta;
            $producto->estado_stock = $request->estado_stock;
            $producto->estado = $request->estado;
            $producto->sub_categoria_producto_id = $request->sub_categoria_producto_id;
            $producto->marca_producto_id = $request->marca_producto_id;
            $producto->material = $request->material;
            $producto->estado_oferta = $request->estado_oferta;

            if ($request->has('imagenTiempoCheck')) {
                $producto->estado_mostrar_inicio_oferta = 1;
                if ($request->hasFile('image2') && $request->file('image2')->isValid()) {
                    $file = $request->file('image2');
                    $file_name = time() . '_' . $request->orden_imagen . '.' . $file->getClientOriginalExtension();
                    $file->move('producto_banner_inicio', $file_name);
                    $producto->imagen_inicio_oferta = $file_name;
                }
            } else {
                $producto->estado_mostrar_inicio_oferta = 0;
            }
            $producto->estado_mostrar_inicio = 0;

            if ($request->has('imagenCheck')) {
                $producto->estado_mostrar_inicio = 1;
                $producto->order_imagen = $request->orden_imagen;
                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    $file = $request->file('image');
                    $file_name = time() . '_' . $request->orden_imagen . '.' . $file->getClientOriginalExtension();
                    $file->move('producto_banner', $file_name);
                    $producto->imagen_inicio = $file_name;
                }
            } else {
                $producto->estado_mostrar_inicio = 0;
            }
            if ($request->estado_oferta == 2) {
                $tiempo_separado = explode('T', $request->tiempo);
                $producto->tiempo_oferta = $tiempo_separado[0] . ' ' . $tiempo_separado[1];
            }
            $producto->save();
            $codigo = "PR" . sprintf("%'.04d\n", $producto->producto_id);
            $producto->codigo = $codigo;
            $producto->update();
            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $productos_imagenes = Collection::make(new Producto);
        for ($i = 1; $i < 8; $i++) {
            $producto_imagen = Producto::where('order_imagen', '=', $i)->where('estado_mostrar_inicio', '=', 1)->first();
            if ($producto_imagen) {
                $productos_imagenes->add($producto_imagen);
            } else {
                $productos_imagenes->add(null);
            }
        }
        $producto_tiempo = (Producto::where('estado_mostrar_inicio_oferta', '=', 1)->first()) ? Producto::where('estado_mostrar_inicio_oferta', '=', 1)->first()->nombre : false;
        $subcategorias = SubCategoriaProducto::where('estado', '=', 1)->get();
        $categorias = CategoriaProducto::where('estado', '=', 1)->get();
        $marcas = MarcaProducto::all();
        $producto = Producto::find($id);
        $tiempo_separado = $producto->estado_oferta == 2 ? explode(' ', $producto->tiempo_oferta) : null;
        $tiempo = $tiempo_separado ? $tiempo_separado[0] . 'T' . $tiempo_separado[1] : null;
        return view('pages.productos.edit', [
            "producto_tiempo" => $producto_tiempo,
            "subcategorias" => $subcategorias,
            "categorias" => $categorias,
            "marcas" => $marcas,
            "productos_imagenes" => $productos_imagenes,
            "productos_imagenes_json" => $productos_imagenes->toJson(),
            "producto" => $producto,
            "tiempo" => $tiempo
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'producto_id' => 'required',
            'nombre' => 'required|max:200',
            'precio' => 'required',
            'precio_oferta' => 'required',
            'estado_stock' => 'required',
            'estado' => 'required',
            'sub_categoria_producto_id' => 'required',
            'marca_producto_id' => 'required',
            'material' => 'required',
            'estado_oferta' => 'required',
        ]);
        try {
            $productos = Producto::all();
            foreach ($productos as $object) {
                if ($object->producto_id != $request->producto_id && $object->nombre == $request->nombre) {
                    return Redirect::back()->with('nombre', 'El nombre que ingreso ya esta registrado.');
                }
            }
            $producto = Producto::find($request->producto_id);
            $producto->nombre = $request->nombre;
            $producto->precio = $request->precio;
            $producto->descripcion = $request->descripcion;
            $producto->precio_oferta = $request->precio_oferta;
            $producto->estado_stock = $request->estado_stock;
            $producto->estado = $request->estado;
            $producto->sub_categoria_producto_id = $request->sub_categoria_producto_id;
            $producto->marca_producto_id = $request->marca_producto_id;
            $producto->material = $request->material;
            $producto->estado_oferta = $request->estado_oferta;
            if ($producto->imagen_inicio) {
                if ($request->has('imagenCheck')) {
                    $producto->estado_mostrar_inicio = 1;
                    $producto->order_imagen = $request->orden_imagen;
                    if ($request->hasFile('image') && $request->file('image')->isValid()) {
                        $file = $request->file('image');
                        $file_name = time() . '_' . $request->orden_imagen . '.' . $file->getClientOriginalExtension();
                        $file->move('producto_banner', $file_name);
                        $producto->imagen_inicio = $file_name;
                    }
                }
            } else {
                if ($request->has('imagenCheck')) {
                    $producto->estado_mostrar_inicio = 1;
                    $producto->order_imagen = $request->orden_imagen;
                    if ($request->hasFile('image') && $request->file('image')->isValid()) {
                        $file = $request->file('image');
                        $file_name = time() . '_' . $request->orden_imagen . '.' . $file->getClientOriginalExtension();
                        $file->move('producto_banner', $file_name);
                        $producto->imagen_inicio = $file_name;
                    }
                } else {
                    $producto->estado_mostrar_inicio = 0;
                    $producto->imagen_inicio = null;
                    $producto->order_imagen = null;
                }
            }
            if ($producto->imagen_inicio_oferta) {
                if ($request->has('imagenTiempoCheck') && $request->estado_oferta == 2) {
                    $producto->estado_mostrar_inicio_oferta = 1;
                    if ($request->hasFile('image2') && $request->file('image2')->isValid()) {
                        $file = $request->file('image2');
                        $file_name = time() . '_' . $request->orden_imagen . '.' . $file->getClientOriginalExtension();
                        $file->move('producto_banner_inicio', $file_name);
                        $producto->imagen_inicio_oferta = $file_name;
                    }
                }
            } else {
                if ($request->has('imagenTiempoCheck') && $request->estado_oferta == 2) {
                    $producto->estado_mostrar_inicio_oferta = 1;
                    if ($request->hasFile('image2') && $request->file('image2')->isValid()) {
                        $file = $request->file('image2');
                        $file_name = time() . '_' . $request->orden_imagen . '.' . $file->getClientOriginalExtension();
                        $file->move('producto_banner_inicio', $file_name);
                        $producto->imagen_inicio_oferta = $file_name;
                    }
                } else {
                    $producto->estado_mostrar_inicio_oferta = 0;
                    $producto->imagen_inicio_oferta = null;
                }
            }

            if ($request->estado_oferta == 2) {
                $tiempo_separado = explode('T', $request->tiempo);
                $producto->tiempo_oferta = $tiempo_separado[0] . ' ' . $tiempo_separado[1];
            } else {
                $producto->tiempo_oferta = null;
            }
            $producto->update();
            return redirect()->action('ProductosController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $producto = Producto::find($request->id);
            foreach ($producto->colores as $color) {
                foreach ($color->imagenes as $imagen) {
                    $imagen->delete();
                }
                foreach ($color->tallas as $talla) {
                    $talla->delete();
                }
                $color->delete();
            }
            foreach ($producto->precios_por_mayor as $detalle) {
                $detalle->delete();
            }
            $producto->delete();
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
