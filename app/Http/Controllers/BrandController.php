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
        return redirect()->route('marcas.list')->with('success', 'Marca criada com sucesso!');
    }

    public function show($id)
    {
        $marca = Brand::find($id);

        if ($marca) {
            return view('marcas.update', ['marca' => $marca]);
        } 
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $brand->update([
            'name' => $request->name,
        ]);

        return redirect()->route('marcas.list')->with('success', 'Modelo atualizado com sucesso!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('marcas.list')->with('success', 'Marca excluída com sucesso!');
    }

    public function getAll() {
        $brands = Brand::all();
        return $brands;
    }
}
