<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'Administrador']);
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('pages.clientes.index', [
            'clientes' => $clientes
        ]);
    }

    public function deshabilitar(Request $request)
    {
        try {
            $cliente = Cliente::find($request->id);
            $cliente->estado = 0;
            $cliente->update();
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
