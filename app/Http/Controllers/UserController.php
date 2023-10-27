<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'Administrador']);
    }

    public function index()
    {
        $users = User::all();
        return view('pages.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users',
            'tipo_usuario' => 'required',
            'estado' => 'required'
        ]);

        try {
            $users = User::all();
            foreach ($users as $userObject) {
                $nombre = strtoupper($request->nombre) . " " . strtoupper($request->apellidos);
                $nombreObject = strtoupper($userObject->nombre) . " " . strtoupper($userObject->apellidos);
                if ($nombre == $nombreObject) {
                    return Redirect::back()->with('nombre', 'Ya existe un usuario llamado ' . $nombre);
                }
            }
            $user = new User;
            $user->nombre = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->celular = $request->celular;
            $user->email = strtolower($request->email);
            $user->password = bcrypt('@wos1234'); //CLAVE POR DEFECTO AL CREAR UN USUARIO
            $user->tipo_usuario = $request->tipo_usuario;
            $user->estado = $request->estado;
            $user->save();
            return redirect()->action('UserController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'email' => 'required|email|max:100',
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'tipo_usuario' => 'required',
            'estado' => 'required'
        ]);

        try {
            $users = User::all();
            foreach ($users as $userObject) {
                $nombre = strtoupper($request->nombre) . " " . strtoupper($request->apellidos);
                $nombreObject = strtoupper($userObject->nombre) . " " . strtoupper($userObject->apellidos);
                if ($nombre == $nombreObject && $userObject->user_id != $request->user_id) {
                    return Redirect::back()->with('nombre', 'Ya existe un usuario llamado ' . $nombre);
                }
            }
            $user = User::find($request->user_id);
            $user->nombre = $request->nombre;
            $user->apellidos = $request->apellidos;
            $user->email = strtolower($request->email);
            $user->celular = $request->celular;
            $user->tipo_usuario = $request->tipo_usuario;
            if ($user->password != $request->clave) {
                $user->password = bcrypt($request->clave);
            }
            $user->estado = $request->estado;
            $user->update();
            return redirect()->action('UserController@index');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
