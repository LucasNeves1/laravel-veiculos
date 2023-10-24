<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'brand_id' => 'integer',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

}
