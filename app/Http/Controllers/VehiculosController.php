<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use App\Models\Usuarios;
use App\Models\Historicos;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;


class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use SoftDeletes;
    public function index()
    {
        //
        $datos['vehiculos'] = Vehiculos::paginate(5);
        $vehiculos = isset($datos) ? $datos['vehiculos'] : [];
        foreach ($vehiculos as $vehiculo) {
            $duenio = Usuarios::findOrFail($vehiculo->id_usuario);
            $vehiculo['nombre_usuario'] = $duenio->Nombre;
            $vehiculo['apellido_usuario'] = $duenio->Apellidos;
        }
        $datos['vehiculos'] = $vehiculos;


        return view('vehiculos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $usuarios = Usuarios::all();

        return view('vehiculos.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos = [
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio' => 'required|numeric',
            'id_usuario' => 'required|numeric',
            'precio' => 'required|numeric'
        ];
        $mensaje = ['required' => 'El :attribute es requerido'];

        $this->validate($request, $campos, $mensaje);
        $datosVehiculo = request()->except('_token', 'nombre_usuario', 'apellido_usuario');
        Vehiculos::insert($datosVehiculo);
        return redirect('vehiculos')->with('Mensaje', 'Vehiculo agregado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehiculo = Vehiculos::findOrFail($id);
        $usuarios = Usuarios::all();

        return view('vehiculos.edit', compact('vehiculo'), compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            'marca' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'anio' => 'required|numeric',
            'id_usuario' => 'required|numeric',
            'precio' => 'required|numeric'
        ];
        $mensaje = ['required' => 'El :attribute es requerido'];
        $this->validate($request, $campos, $mensaje);

        $datosVehiculo = request()->except(['_token', '_method']);

        /*---------------*/
        $vehiculo_sin_modificar = Vehiculos::findOrFail($id);
        $id_duenio_anterior = $vehiculo_sin_modificar->id_usuario;
        $id_duenio_nuevo = $datosVehiculo['id_usuario'];
        $duenio_nuevo = Usuarios::findOrFail($id_duenio_nuevo);
        $duenio_anterior = Usuarios::findOrFail($id_duenio_anterior);
        /*----------------*/

        Vehiculos::where('id', '=', $id)->update($datosVehiculo);
        if ($id_duenio_anterior != $id_duenio_nuevo) {
            Historicos::insert(
                [
                    'marca' => $datosVehiculo['marca'],
                    'modelo' => $datosVehiculo['modelo'],
                    'duenio_anterior' => $duenio_anterior['Nombre'] . ' ' . $duenio_anterior['Apellidos'],
                    'duenio_nuevo' => $duenio_nuevo['Nombre'] . ' ' . $duenio_nuevo['Apellidos']
                ]
            );
        }

        return redirect('vehiculos')->with('Mensaje', 'Vehiculo modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $vehiculo = Vehiculos::findOrFail($id);
        $vehiculo->delete();

        return redirect('vehiculos')->with('Mensaje', 'Vehiculo eliminado exitosamente');
    }
}
