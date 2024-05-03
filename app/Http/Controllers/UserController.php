<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index')->with("usuarios", $usuarios);
    }

    /**
     * Guarda en BD los datos del formulario de registro de discotecas
     * y despues redirecciona a el indice
     */
    public function store(Request $request)
    {
        //Validamos los datos
        $request->validate([
            'name' => 'required|max:70|min:5',
            'email' => 'required',
            'password' => 'required',
        ]);

        //Guardamos en bd los datos
        User::create($request->all());

        //Redireccionamos a la vista
        return redirect()->route('usuarios.index')->with('success', 'usuario creado correctamente');
    }

    public function create()
    {
        return view('registro.create');
    }

    public function edit($id)
    {
        $usuario = User::find($id);


        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Sacamos los datos de un usuario con el id que nos dan
        $usuario = User::find($id);

        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validamos los datos
        $request->validate([
            'name' => 'required|max:70|min:5',
            'email' => 'required',
        ]);

        //Cargamos la discoteca a modificar
        $usuarios = User::find($id);

        //modificamos los datos en bd
        $usuarios->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'Modificación realizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuarios = User::find($id);

        $usuarios->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'usuario borrado');
    }

    public function formularioLogin()
    {
        return view("login.index");
    }

    public function iniciarSesion(Request $request)
    {
        $sesion = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (auth()->attempt($sesion)) {
            $request->session()->regenerate();
            return redirect('/enemigos');
        } else {
        }
        return back();
    }
    public function login(Request $request)
    {
        return view('login.index');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back();
    }
}
