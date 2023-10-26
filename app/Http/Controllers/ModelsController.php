<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;

class ModelsController extends Controller
{
    public function index()
    {
        $models = Models::all(); 
        $brands = app('App\Http\Controllers\BrandController')->index()->getData(); 
        return view('modelos.list', ['brands' => $brands, 'models' => $models]);
    }



    public function create() {
        $models = Models::all(); 
        $brands = app('App\Http\Controllers\BrandController')->getAll(); 
        return view('modelos.create', ['brands' => $brands, 'models' => $models]);
    }

    public function store(Request $request) {
        Models::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
        ]);
        return "Modelo criado com sucesso";
    }

    public function update(Request $request, Models $model)
    {
        $request->validate([
            'brand_id' => 'required',
            'name' => 'required',
        ]);

        $veiculo->update([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
        ]);

        return redirect()->route('modelos.list')->with('success', 'Modelo atualizado com sucesso!');
    }


    public function destroy(Models $modelo)
    {
        $modelo->delete();
        return redirect()->route('modelos.list')->with('success', 'Modelo excluído com sucesso!');
    }

    public function getAll() {
        $models = Models::all();
        return $models;
    }
}
