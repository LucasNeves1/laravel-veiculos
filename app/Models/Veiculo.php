<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'price',
    ];

    protected $casts = [
        'brand_id' => 'integer',
        'model_id' => 'integer',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function model()
    {
        return $this->belongsTo(Model::class, 'model_id', 'id');
    }
}
