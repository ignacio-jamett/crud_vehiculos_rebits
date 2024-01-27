<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use SoftDeletes;
    public function index()
    {
        //
        $datos['usuarios'] = Usuarios::paginate(5);

        return view('usuarios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Correo' => 'required|string|max:100'
        ];
        $mensaje = ['required' => 'El :attribute es requerido'];
        $this->validate($request, $campos, $mensaje);

        $datosUsuario = request()->except('_token');
        Usuarios::insert($datosUsuario);
        return redirect('usuarios')->with('Mensaje', 'Usuario agregado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $usuario = Usuarios::findOrFail($id);

        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'Nombre' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Correo' => 'required|string|max:100'
        ];
        $mensaje = ['required' => 'El :attribute es requerido'];
        $this->validate($request, $campos, $mensaje);

        $datosUsuario = request()->except(['_token', '_method']);
        Usuarios::where('id', '=', $id)->update($datosUsuario);

        //$usuario = Usuarios::findOrFail($id);
        //return view('usuarios.edit', compact('usuario'));
        return redirect('usuarios')->with('Mensaje', 'Usuario modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Usuarios::destroy($id);
        //Usuarios::softDeletes($id);
        $usuario = Usuarios::findOrFail($id);
        $usuario->delete();

        return redirect('usuarios')->with('Mensaje', 'Usuario eliminado exitosamente');
    }
}
