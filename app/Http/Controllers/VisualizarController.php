<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menor;
use Illuminate\Http\Request;

class VisualizarController extends Controller
{
    public function index(Menor $menor)
    {
        return view('visualizar.index', $menor);
    }
}
