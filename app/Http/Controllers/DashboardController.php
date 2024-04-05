<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'datas' => Data::all(),
            'count' => 0,
        ]);
    }
}
