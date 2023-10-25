<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->unsignedBigInteger('brand_id');
            // Define a relação de chave estrangeira
            $table->foreign('brand_id')->references('id')->on('brands');

            $table->unsignedBigInteger('model_id');
            // Define a relação de chave estrangeira
            $table->foreign('model_id')->references('id')->on('models');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
