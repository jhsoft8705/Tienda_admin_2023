<?php

namespace App\Http\Controllers;

use App\Models\FaqPregunta;
use App\Models\FaqSeccion;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $secciones = FaqSeccion::all();
        return view('pages.faq.index', [
            "secciones" => $secciones
        ]);
    }

    public function create_seccion()
    {
        return view('pages.faq.create_seccion');
    }

    public function store_seccion(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:200|unique:faq_secciones',
        ]);

        try {

            $faqSeccion = new FaqSeccion();
            $faqSeccion->nombre = $request->nombre;
            $faqSeccion->save();
            return redirect()->action('FaqController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function edit_seccion($id)
    {
        $seccion = FaqSeccion::find($id);
        return view('pages.faq.edit_seccion', [
            "seccion" => $seccion
        ]);
    }

    public function update_seccion(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|max:200',
            'nombre' => 'required|max:200',
        ]);

        try {
            $faqSeccion = FaqSeccion::find($request->id);
            $faqSeccion->nombre = $request->nombre;
            $faqSeccion->update();
            return redirect()->action('FaqController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function create_pregunta($id)
    {
        $seccion = FaqSeccion::find($id);
        return view('pages.faq.create_pregunta', [
            "seccion" => $seccion
        ]);
    }

    public function store_pregunta(Request $request)
    {
        $this->validate($request, [
            'pregunta' => 'required|max:200|unique:faq_preguntas',
            'respuesta' => 'required|max:200',
            'id' => 'required',
        ]);

        try {

            $faqPregunta = new FaqPregunta();
            $faqPregunta->faq_seccion_id = $request->id;
            $faqPregunta->pregunta = $request->pregunta;
            $faqPregunta->respuesta = $request->respuesta;
            $faqPregunta->save();
            return redirect()->action('FaqController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function edit_pregunta($id)
    {
        $pregunta = FaqPregunta::find($id);
        return view('pages.faq.edit_pregunta', [
            "pregunta" => $pregunta
        ]);
    }

    public function update_pregunta(Request $request)
    {
        $this->validate($request, [
            'pregunta' => 'required|max:200|unique:faq_preguntas',
            'respuesta' => 'required|max:200',
            'id' => 'required',
        ]);

        try {

            $faqPregunta = FaqPregunta::find($request->id);
            $faqPregunta->pregunta = $request->pregunta;
            $faqPregunta->respuesta = $request->respuesta;
            $faqPregunta->update();
            return redirect()->action('FaqController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function delete_seccion(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        try {
            $faqSeccion = FaqSeccion::find($request->id);
            foreach ($faqSeccion->preguntas as $pregunta) {
                $pregunta->delete();
            }
            $faqSeccion->delete();
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

    public function delete_pregunta(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        try {
            $faqPregunta = FaqPregunta::find($request->id);
            $faqPregunta->delete();
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
