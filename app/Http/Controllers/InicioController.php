<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menor;
use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menores = Menor::paginate(20);
        return view('inicio', ['menores' => $menores]);
    }
}
