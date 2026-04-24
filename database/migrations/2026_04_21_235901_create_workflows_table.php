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
        Schema::create('workflows', function (Blueprint $table) {
             $table->id();

            // 🔥 UNIQUE ORDER ID (for sorting / workflow step order)
            $table->integer('order_id')->unique();

            // 🔹 NAME (same like type)
            $table->string('name')->unique();

            // 🔹 STATUS
            $table->enum('status', ['active', 'inactive'])->default('active');

            // 🔹 DESCRIPTION
            $table->text('description')->nullable();

            // 🔹 TRACKING
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // 🔹 TIMESTAMPS
            $table->timestamps();

            // 🔹 SOFT DELETE
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflows');
    }
};
