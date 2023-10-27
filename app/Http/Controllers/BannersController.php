<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\CategoriaProducto;
use App\Models\Producto;
use App\Models\SubCategoriaProducto;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $productos = Producto::where('estado', '=', 1)->where('estado_stock', '=', 1)->get();
        $categorias_produtos = SubCategoriaProducto::where('estado', '=', 1)->get()->sortByDesc('categoria_producto_id');
        $banner1 = Banner::find(1);
        $banner2 = Banner::find(2);
        $banner3 = Banner::find(3);
        $banner4 = Banner::find(4);
        $banner5 = Banner::find(5);
        $banner6 = Banner::find(6);
        $banner7 = Banner::find(7);
        $banner8 = Banner::find(8);
        $banner9 = Banner::find(9);
        $banner10 = Banner::find(10);
        $banner11 = Banner::find(11);
        $banner12 = Banner::find(12);
        return view('pages.banners.index', [
            'productos' => $productos,
            'categorias' => $categorias_produtos,
            'banner1' => $banner1,
            'banner2' => $banner2,
            'banner3' => $banner3,
            'banner4' => $banner4,
            'banner5' => $banner5,
            'banner6' => $banner6,
            'banner7' => $banner7,
            'banner8' => $banner8,
            'banner9' => $banner9,
            'banner10' => $banner10,
            'banner11' => $banner11,
            'banner12' => $banner12,
        ]);
    }

    public function update(Request $request)
    {
        try {
            $banner = Banner::find($request->id);
            $banner->texto_1 = $request->texto_1;
            if ($request->texto_2) {
                $banner->texto_2 = $request->texto_2;
            }
            if ($request->texto_3) {
                $banner->texto_3 = $request->texto_3;
            }
            if ($request->texto_boton) {
                $banner->texto_boton = $request->texto_boton;
            }
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('banner/' . $request->id, $file_name);
                $banner->imagen = $file_name;
            }
            $banner->estado_hover = $request->estado_hover;
            $banner->link_imagen = $request->link_imagen;
            $banner->link_boton = $request->link_boton;
            $banner->update();
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
