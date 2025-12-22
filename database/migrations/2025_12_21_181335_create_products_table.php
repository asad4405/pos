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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('barcode')->nullable();
            $table->integer('cost');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('quantity_alert')->default(0);
            $table->string('tax');
            $table->string('tax_type')->nullable();
            $table->string('unit');
            $table->text('note')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
