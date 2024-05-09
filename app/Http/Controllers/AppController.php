<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AppController extends Controller
{
    public function getData()
    {
        $data = [
            'datas' => Data::select('id', 'nome', 'bairro', 'contato', 'lideranca', 'resultado')->get()
        ];

        return response()->json($data);
    }

    public function saveData(Request $request)
    {
        $dataToSave = $request->all();

        Data::create($dataToSave);

        return response()->json();
    }

    public function editData(Request $request)
    {
        $dataToSave = $request->all();

        info($dataToSave);

        $data = Data::find($dataToSave['_id']);

        $data->update($dataToSave);
    }
}
