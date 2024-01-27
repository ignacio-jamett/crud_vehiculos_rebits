<?php

namespace App\Http\Controllers;

use App\Models\Historicos;

use Illuminate\Http\Request;

class HistoricosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['historicos'] = Historicos::paginate(5);

        return view('historicos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Historicos $historicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Historicos $historicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historicos $historicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historicos $historicos)
    {
        //
    }
}
