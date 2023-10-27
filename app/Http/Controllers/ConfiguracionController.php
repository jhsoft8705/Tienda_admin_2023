<?php

namespace App\Http\Controllers;

use App\Models\Guia;
use App\Models\Informacion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'Administrador']);
    }

    public function index()
    {
        $configuracion = Informacion::find(1);
        $guia = Guia::find(1);
        return view('pages.configuracion.index', [
            'configuracion' => $configuracion,
            'guia' => $guia
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'horario' => 'required',
            'whatsapp' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
            'facebook' => 'required',
            'nosotros' => 'required',
            'mapa' => 'required',
            'url_whatsapp' => 'required'
        ]);

        try {
            $configuracion = Informacion::find(1);
            $configuracion->horario = $request->horario;
            $configuracion->whatsapp = $request->whatsapp;
            $configuracion->correo = $request->correo;
            $configuracion->direccion = $request->direccion;
            $configuracion->facebook = $request->facebook;
            $configuracion->nosotros = $request->nosotros;
            $configuracion->mapa = $request->mapa;
            $configuracion->url_whatsapp = $request->url_whatsapp;
            $configuracion->update();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function storeGuia(Request $request)
    {
        try {
            $guia = Guia::find(1);
            if ($request->hasFile('imagenguiafile') && $request->file('imagenguiafile')->isValid()) {
                $file = $request->file('imagenguiafile');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('guia', $file_name);
                $guia->imagen_guia = $file_name;
            }
            if ($request->hasFile('videoguia') && $request->file('videoguia')->isValid()) {
                $file = $request->file('videoguia');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file->move('guia', $file_name);
                $guia->video_guia = $file_name;
            }
            $guia->update();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
