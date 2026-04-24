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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            // 🔹 BASIC DETAILS
            $table->string('name');
            $table->date('dob')->nullable();
            $table->string('phone')->unique();

            // 🔹 LOCATION
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();

            // 🔹 ADDRESS
            $table->text('address')->nullable();

            // 🔹 TRACKING
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            // 🔹 CUSTOM DATE (if needed separate from created_at)
            $table->date('date')->nullable();

            // 🔹 DEFAULT TIMESTAMPS
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
        Schema::dropIfExists('customers');
    }
};
