<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodosDePagoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create()
    {
        return view('pages.metodos_de_pagos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200',
        ]);

        try {
            $metodo = new MetodoPago();
            $metodo->nombre = $request->nombre;
            $metodo->estado = $request->estado;
            $metodo->nro_abono = $request->nro_abono;
            $metodo->save();
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $file_name = time() . '_' . $metodo->metodo_de_pago_id . $file->getClientOriginalExtension();
                $file->move('metodos_de_pago', $file_name);
                $metodo->imagen = $file_name;
                $metodo->update();
            }

            return redirect()->action('VentasController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $metodo = MetodoPago::find($id);
        return view('pages.metodos_de_pagos.edit', [
            'metodo' => $metodo
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'nombre' => 'required|max:200',
            'nro_abono' => 'required',
        ]);

        try {
            $metodo = MetodoPago::find($request->id);
            $metodo->nombre = $request->nombre;
            $metodo->estado = $request->estado;
            $metodo->nro_abono = $request->nro_abono;
            $metodo->update();
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $file_name = time() . '_' . $metodo->metodo_de_pago_id . $file->getClientOriginalExtension();
                $file->move('metodos_de_pago', $file_name);
                $metodo->imagen = $file_name;
                $metodo->update();
            }

            return redirect()->action('VentasController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $metodo = MetodoPago::find($request->id);
            $metodo->delete();
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
