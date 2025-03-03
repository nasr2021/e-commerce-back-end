<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    if (!Schema::hasTable('products')) {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->boolean('estDisponible')->default(true);
            $table->integer('quantiteStock')->default(0);
            $table->foreignId('categorieId')->constrained('categories')->onDelete('cascade'); // Clé étrangère
            $table->string('imageUrl')->nullable();
            $table->timestamps();
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
