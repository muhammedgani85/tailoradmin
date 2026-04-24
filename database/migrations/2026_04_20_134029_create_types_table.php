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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->index('type');

            // TYPE NAME
            $table->string('type')->unique(); // e.g. Pant, Shirt, Kurta

            // STATUS (ACTIVE / INACTIVE)
            $table->enum('status', ['active', 'inactive'])->default('active');

            // OPTIONAL DESCRIPTION
            $table->text('description')->nullable();

            // TRACKING
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();

            // TIMESTAMPS
            $table->timestamps();

            // SOFT DELETE
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
