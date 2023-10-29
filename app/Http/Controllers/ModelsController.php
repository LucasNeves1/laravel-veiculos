<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;
use Illuminate\Support\Facades\View;

class ModelsController extends Controller
{

    public function __construct()
    {
        $brands = app('App\Http\Controllers\BrandController')->getAll();
        $models = $this->getAll();

        View::share('brands', $brands);
        View::share('models', $models);
    }

    public function index()
    {
        $models = Models::all(); 
        $brands = app('App\Http\Controllers\BrandController')->index()->getData(); 
        return view('model.list', ['brands' => $brands, 'models' => $models]);
    }


    public function create() {
        $models = Models::all(); 
        $brands = app('App\Http\Controllers\BrandController')->getAll(); 
        return view('model.create', ['brands' => $brands, 'models' => $models]);
    }

    public function show($id)
    {
        $model = Models::find($id);

        if ($model) {
            return view('model.update', ['modelo' => $model]);
        } 
    }

    public function store(Request $request) {
        Models::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
        ]);
        return redirect()->route('model.list')->with('success', 'Modelo criado com sucesso!');
    }

    public function update(Request $request, Models $model)
    {
        $request->validate([
            'brand_id' => 'required',
            'name' => 'required',
        ]);

        $model->update([
            'brand_id' => $request->brand_id,
            'name' => $request->name,
        ]);

        return redirect()->route('model.list')->with('success', 'Modelo atualizado com sucesso!');
    }


    public function destroy(Models $model)
    {
        $model->delete();
        return redirect()->route('model.list')->with('success', 'Modelo excluído com sucesso!');
    }

    public function getAll() {
        $models = Models::with(['brand'])->get();
        return $models;
    }
}
