<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function create()
    {
        return view('pages.departamento.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200',
        ]);

        try {
            $departamento = new Departamento();
            $departamento->nombre = $request->nombre;
            $departamento->estado = $request->estado;
            $departamento->estado_principal = $request->estado_principal;
            $departamento->save();

            return redirect()->action('VentasController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $departamento = Departamento::find($id);
        return view('pages.departamento.edit', [
            'departamento' => $departamento
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'nombre' => 'required|max:200',
            'estado' => 'required',
            'estado_principal' => 'required'
        ]);

        try {
            $departamento = Departamento::find($request->id);
            $departamento->nombre = $request->nombre;
            $departamento->estado = $request->estado;
            $departamento->estado_principal = $request->estado_principal;
            $departamento->update();
            return redirect()->action('VentasController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function delete(Request $request)
    {
        try {
            $departamento = Departamento::find($request->id);
            $departamento->delete();
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
