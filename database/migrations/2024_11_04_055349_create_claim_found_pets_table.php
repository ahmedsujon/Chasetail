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
        Schema::create('claim_found_pets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable;
            $table->string('name')->nullable;
            $table->string('email')->nullable;
            $table->string('phone')->nullable;
            $table->string('descriptions')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim_found_pets');
    }
};