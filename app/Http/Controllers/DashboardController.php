<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\Producto;
use App\Models\SubCategoriaProducto;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $arrayMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $ventasMeses = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        $arrayColorsMeses = \App\Helpers\RandomColor::many(count($ventasMeses), array('luminosity' => 'bright', 'hue' => 'random'));
        $ventas = Venta::where('estado', '=', 1)->get();
        $categorias_producto = CategoriaProducto::where('estado', '=', 1)->get();
        $monto_vendido_hoy = 0;
        $monto_vendido_mes = 0;
        $productos = Producto::where('estado', '=', 1)->limit(5)->get();
        $arrayProductosVentas = $productos->map(function ($obj) {
            return $obj->detalles_venta->count();
        });
        $arrayColorProductos = \App\Helpers\RandomColor::many(count($arrayProductosVentas), array('luminosity' => 'bright', 'hue' => 'random'));
        $arrayColorsCategoria = \App\Helpers\RandomColor::many(count($categorias_producto), array('luminosity' => 'bright', 'hue' => 'random'));
        $arrayProductos = $productos->map(function ($obj) {
            return $obj->nombre;
        });
        $arrayCategorias = $categorias_producto->map(function ($obj) {
            return $obj->nombre;
        });
        $ventasCategorias = $categorias_producto->map(function ($obj) use ($ventas) {
            $ganacia_categoria = 0;
            foreach ($ventas as $venta) {
                foreach ($venta->detalles as $detalle) {
                    if (!empty($detalle->producto)) {
                        $subcategoria = SubCategoriaProducto::find($detalle->producto->sub_categoria_producto_id);
                        if ($subcategoria->categoria_producto_id == $obj->categoria_producto_id) {
                            $ganacia_categoria += $venta->total;
                            break;
                        }
                    }
                }
            }
            $ganancia_categoria = round($ganacia_categoria, 2);
            return $ganancia_categoria;
        });
        foreach ($ventas as $venta) {
            $convert_date = strtotime($venta->created_at);
            $month = date('m', $convert_date);
            $year = date('Y', $convert_date);
            $day = date('d', $convert_date);
            if ($year == date('Y')) {
                if ($month == date('m')) {
                    if ($day == date("d")) {
                        $monto_vendido_hoy += $venta->total;
                    }
                    $monto_vendido_mes += $venta->total;
                }
            }



            if ($year == date('Y')) {
                switch ($month) {
                    case 1:
                        $ventasMeses[0] += $venta->total;
                        break;
                    case 2:
                        $ventasMeses[1] += $venta->total;
                        break;
                    case 3:
                        $ventasMeses[2] += $venta->total;
                        break;
                    case 4:
                        $ventasMeses[3] += $venta->total;
                        break;
                    case 5:
                        $ventasMeses[4] += $venta->total;
                        break;
                    case 6:
                        $ventasMeses[5] += $venta->total;
                        break;
                    case 7:
                        $ventasMeses[6] += $venta->total;
                        break;
                    case 8:
                        $ventasMeses[7] += $venta->total;
                        break;
                    case 9:
                        $ventasMeses[8] += $venta->total;
                        break;
                    case 10:
                        $ventasMeses[9] += $venta->total;
                        break;
                    case 11:
                        $ventasMeses[10] += $venta->total;
                        break;
                    case 12:
                        $ventasMeses[11] += $venta->total;
                        break;
                }
            }
        }
        $categoria_vendida = $arrayCategorias->first();
        $producto_vendido = $arrayProductos->first();
        return view('pages.dashboard.index', [
            'monto_vendido_hoy' => round($monto_vendido_hoy, 2),
            'monto_vendido_mes' => round($monto_vendido_mes, 2),
            'ventasMeses' => $ventasMeses,
            'arrayMeses' => $arrayMeses,
            'arrayCategorias' => $arrayCategorias,
            'arrayColorsMeses' => $arrayColorsMeses,
            'ventasCategorias' => $ventasCategorias,
            'arrayProductos' => $arrayProductos,
            'arrayProductosVentas' => $arrayProductosVentas,
            'arrayColorProductos' => $arrayColorProductos,
            'arrayColorsCategoria' => $arrayColorsCategoria,
            'categoria_vendida' =>  $categoria_vendida,
            'producto_vendido' => $producto_vendido


        ]);
    }

    public function profile()
    {
        $user_id = Auth::user()->user_id;
        $user = User::find($user_id);
        return view('pages.dashboard.profile', [
            'user' => $user
        ]);
    }

    public function settings()
    {
        $user_id = Auth::user()->user_id;
        $user = User::find($user_id);
        return view('pages.dashboard.settings', [
            'user' => $user
        ]);
    }


    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:100',
            'nombre' => 'required',
            'apellidos' => 'required'
        ]);

        try {
            $usuarios = User::all();
            $user_id = Auth::user()->user_id;
            foreach ($usuarios as $object) {
                if ($object->user_id != $user_id && $object->email == $request->email) {
                    return Redirect::back()->with('email', 'El email que ingreso ya esta registrado.');
                }
            }

            $user = User::find($user_id);
            $user->email = strtolower($request->email);
            $user->nombre = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->celular = $request->celular;
            $user->update();
            return redirect()->action('DashboardController@profile')->with('success', 'El perfil ha sido actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Algo salió mal. Inténtelo de nuevo más tarde.');
        }
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6'
        ]);

        try {
            if (Hash::check($request->current_password, Auth::user()->password)) {
                $user_id = Auth::user()->user_id;
                $user = User::find($user_id);
                $user->password = bcrypt($request->new_password);
                $user->update();
                return redirect()->action('DashboardController@settings')->with('success', 'La contraseña ha sido cambiada correctamente.');
            }
            return redirect()->back()->with('failed', 'Contraseña actual es incorrecta.');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Algo salió mal Inténtelo de nuevo más tarde.');
        }
    }
}
