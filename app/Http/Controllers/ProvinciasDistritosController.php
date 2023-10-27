<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\ProvinciaDistrito;
use Illuminate\Http\Request;

class ProvinciasDistritosController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create($id)
    {
        $departamentos = Departamento::where('estado', '=', 1)->get();
        $departamento = Departamento::find($id);
        return view('pages.provincias_distritos.create', [
            'departamentos' => $departamentos,
            'departamento' => $departamento,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200',
        ]);

        try {
            $provincia = new ProvinciaDistrito();
            $provincia->nombre = $request->nombre;
            $provincia->estado = $request->estado;
            $provincia->departamento_id = $request->departamento_id;
            $provincia->save();

            return redirect()->action('VentasController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $provincia = ProvinciaDistrito::find($id);
        $departamentos = Departamento::where('estado', '=', 1)->get();

        return view('pages.provincias_distritos.edit', [
            'provincia' => $provincia,
            'departamentos' => $departamentos
        ]);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
            'nombre' => 'required|max:200',
            'estado' => 'required',
            'departamento_id' => 'required'
        ]);

        try {
            $provincia = ProvinciaDistrito::find($request->id);
            $provincia->nombre = $request->nombre;
            $provincia->estado = $request->estado;
            $provincia->departamento_id = $request->departamento_id;
            $provincia->update();

            return redirect()->action('VentasController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function delete(Request $request)
    {
        try {
            $provincia = ProvinciaDistrito::find($request->id);
            $provincia->delete();
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
