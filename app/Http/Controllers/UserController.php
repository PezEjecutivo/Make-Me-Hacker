<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
 
        return view('welcome', ['user' => $user]);
    }

    public function ranking(Request $request)
    {
        $users = User::all()->sortByDesc('score');

        $toppers = 3;
 
        return view('usuarios.index', ['users' => $users, "toppers" => $toppers]);
    }

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

    public function saveScore(Request $request)
    {
        $request->validate([
            'score' => 'required|integer',
        ]);

        $user = $request->user();

        $user->score = $request->input('score');
        $user->save();

        return redirect()->back()->with('success', 'Score updated successfully.');
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

    public function show(Request $request)
    {
        $user = $request->user();

        return view('usuarios.show', compact('user'));
    }

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
            return redirect('/');
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

    //Admin routes
    public function allUsers(Request $request)
    {

        $user = $request->user();

        if($user->name != "TetecilloBombilla"){
            return view('welcome', ['user' => $user]);
        }

        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function showUser(Request $request, $id )
    {

        $user = $request->user();

        if($user->name != "TetecilloBombilla"){
            return view('welcome', ['user' => $user]);
        }
        
        $user = User::findOrFail($id);
        return view('admin.show', compact('user'));
    }

    public function createUser(Request $request)
    {

        $user = $request->user();

        if($user->name != "TetecilloBombilla"){
            return view('welcome', ['user' => $user]);
        }

        return view('admin.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('allUsers')->with('success', 'User created successfully.');
    }

    public function editUser(Request $request, $id)
    {
        $user = $request->user();

        if($user->name != "TetecilloBombilla"){
            return view('welcome', ['user' => $user]);
        }

        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('allUsers')->with('success', 'User updated successfully.');
    }

    public function destroyUser(Request $request, $id)
    {
        $user = $request->user();

        if($user->name != "TetecilloBombilla"){
            return view('welcome', ['user' => $user]);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('allUsers')->with('success', 'User deleted successfully.');
    }
}
