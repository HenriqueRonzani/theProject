<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('data.index');
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
        $validated = $request->validate([
            'nome' => 'required|string',
            'bairro' => 'required|string',
            'contato' => 'required|string',
            'lideranca' => 'required|string',
            'resultado' => 'required|string'
        ]);

        Data::create($validated);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'bairro' => 'required|string',
            'contato' => 'required|string',
            'lideranca' => 'required|string',
            'resultado' => 'required|string'
        ]);

        $data = Data::find($request->_id);

        $data->update($validated);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Data::find($request->input('id'));

        

        $responseData = [
            'name' => $data->nome,
        ];

        $data->delete();

        return response()->json($responseData);
    }
}
