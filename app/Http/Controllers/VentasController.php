<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Informacion;
use App\Models\MetodoPago;
use App\Models\ProvinciaDistrito;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $provincias_distritos = ProvinciaDistrito::all();
        $departamentos = Departamento::all();
        $metodos_de_pago = MetodoPago::all();
        $ventas = Venta::all();
        $ventas_json = $ventas->toJson();
        $informacion = Informacion::find(1);
        foreach ($ventas as $venta) {
            if ($venta->cliente_id != null) {
                $venta->cliente = Cliente::find($venta->cliente_id);
            } else {
                $venta->cliente = null;
            }
        }
        return view('pages.ventas.index', [
            'ventas' => $ventas,
            'provincias_distritos' => $provincias_distritos,
            'departamentos' => $departamentos,
            'metodos' => $metodos_de_pago,
            'ventas_json' => $ventas_json,
            'informacion' => $informacion,
        ]);
    }

    public function liquidar(Request $request)
    {
        try {
            $venta = Venta::find($request->id);
            $venta->estado = 1;
            $venta->update();
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

    public function cancelar(Request $request)
    {
        try {
            $venta = Venta::find($request->id);
            $venta->estado = 2;
            $venta->observacion = $request->observacion;
            $venta->update();
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


    public function listar_ventas()
    {
        try {
            $ventas = Venta::all();
            return view('blocks.lista-ventas', ['ventas' => $ventas]);
        } catch (\Exception $e) {
            return view('blocks.lista-ventas');
        }
    }

    public function modificar_precios(Request $request)
    {
        try {
            $configuracion = Informacion::find(1);
            $configuracion->costo_envio_principal = $request->precio_principal;
            $configuracion->costo_envio_secundario = $request->precio_secundario;
            $configuracion->update();
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
