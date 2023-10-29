<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all(); 
        return view('brand.list', ['brands' => $brands]);
    }

    public function create() {
        return view('brand.create');
    }

    public function store(Request $request) {
        Brand::create([
            'name' => $request->name,
        ]);
        return redirect()->route('brand.list')->with('success', 'Marca criada com sucesso!');
    }

    public function show($id)
    {
        $brand = Brand::find($id);

        if ($brand) {
            return view('brand.update', ['marca' => $brand]);
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

        return redirect()->route('brand.list')->with('success', 'Modelo atualizado com sucesso!');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.list')->with('success', 'Marca excluída com sucesso!');
    }

    public function getAll() {
        $brands = Brand::all();
        return $brands;
    }
}
