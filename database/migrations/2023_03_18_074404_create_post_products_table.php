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
        Schema::create('post_products', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('name_products')->nullable();
            $table->string('product_details')->nullable();
            $table->integer('product_price')->nullable();
            $table->integer('categorie_name')->nullable();
            $table->integer('zom_name')->nullable();
            $table->integer('expiration_date')->nullable();
            $table->JSON('image')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_products');
    }
};