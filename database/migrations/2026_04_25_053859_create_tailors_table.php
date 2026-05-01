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
        Schema::create('tailors', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('age')->nullable();
    $table->string('phone')->unique();
    $table->string('state')->nullable();
    $table->string('city')->nullable();
    $table->string('district')->nullable();
    $table->text('address')->nullable();
    $table->json('types')->nullable(); // checkbox data
    $table->enum('status',['active','inactive'])->default('active');
    $table->timestamps();
    $table->softDeletes();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tailors');
    }
};
