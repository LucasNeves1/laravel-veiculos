<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{
    public function index()
    {
        $vehicles = Veiculo::with(['brand', 'model'])->get();
        return view('veiculos.list', ['vehicles' => $vehicles]);
    }

    public function create() {
        return view('veiculos.create');
    }

    public function show($id)
    {
        $veiculo = Veiculo::find($id);

        if ($veiculo) {
            // Se encontrado, você pode retornar uma view com os detalhes do veículo

            $brandsAndModels = $this->getBrandsAndModels();

            // Combine as informações do veículo com as marcas e modelos
            $data = [
                'veiculo' => $veiculo,
                'brands' => $brandsAndModels['brands'],
                'models' => $brandsAndModels['models'],
            ];
            
            return view('veiculos.update', ['veiculo' => $veiculo]);
        } 
    }

    public function store(Request $request) {
        Veiculo::create([
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'price' => $request->price,
            'year' => $request->year,
        ]);
        return redirect()->route('veiculos.list')->with('success', 'Veículo criado com sucesso!');
    }

    public function update(Request $request, Veiculo $veiculo)
    {
        $request->validate([
            'brand_id' => 'required',
            'model_id' => 'required',
            'price' => 'required',
            'year' => 'required',
        ]);

        $veiculo->update([
            'brand_id' => $request->brand_id,
            'model_id' => $request->model_id,
            'price' => $request->price,
            'year' => $request->year,
        ]);

        return redirect()->route('veiculos.list')->with('success', 'Veículo atualizado com sucesso!');
    }


    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return redirect()->route('veiculos.list')->with('success', 'Veículo excluído com sucesso!');
    }


    public function getAll() {
        $vehicles = Veiculo::all();
        return $vehicles;
    }

    public function getBrandsAndModels() {
        $brands = app('App\Http\Controllers\BrandController')->getAll();
        $models = app('App\Http\Controllers\ModelsController')->getAll();
        return view('veiculos.create', ['brands' => $brands, 'models' => $models]);
    }
}
