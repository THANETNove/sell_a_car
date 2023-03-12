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
        Schema::create('add_points', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->nullable();
            $table->string('point')->nullable();
            $table->string('date')->nullable();
            $table->string('point_bank_name')->nullable();
            $table->string('other')->nullable();
            $table->string('images')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_points');
    }
};