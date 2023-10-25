<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all(); 
        return view('marcas.list', ['brands' => $brands]);
    }

    public function create() {
        return view('marcas.create');
    }

    public function store(Request $request) {
        Brand::create([
            'name' => $request->name,
        ]);
        return "Marca criada com sucesso";
    }

    public function getAll() {
        $brands = Brand::all();
        return $brands;
    }
}
