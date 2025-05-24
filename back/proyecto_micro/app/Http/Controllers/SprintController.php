<?php

namespace App\Http\Controllers;

use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Sprint::all();
        return response()->json(
            ['data' => $rows],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newModel = new Sprint();
        $newModel->id = $data['pk'];
        $newModel->nombre = $data['name'];
        $newModel->fecha_inicio = $data['fecha_inicio'];
        $newModel->fecha_fin = $data['fecha_fin'];
        $newModel->created_at = $data['created_at'];
        $newModel->updated_at = $data['updated_at'];
        $newModel->cod = $data['code'];
        $newModel->save();
        return response()->json(
            ['data' => $newModel],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Sprint::find($id);
        // $row = ProgramacionTema::where('nombre', 'Pepe')->get();
        return response()->json(
            ['data' => $row],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $row = Sprint::find($id);
        $row->nombre = $data['name'];
        $row->cod = $data['code'];
        $row->save();
        return response()->json(
            ['data' => $row],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Sprint::find($id);
        $row->delete();
        return response()->json(
            ['data' => "Registro eliminado"],
            200
        );
    }
}
