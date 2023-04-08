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
            $table->string('categorie_name_id')->nullable();
            $table->string('sub_category')->nullable();
            $table->string('zom_name')->nullable();
            $table->string('province')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('url_Line')->nullable();
            $table->string('expiration_date')->nullable();
            $table->JSON('image')->nullable();
            $table->string('status')->nullable();
            $table->string('number_of_times')->nullable();
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