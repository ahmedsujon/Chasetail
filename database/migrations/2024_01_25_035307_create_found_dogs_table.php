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
        Schema::create('found_dogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('found_date')->nullable();
            $table->string('color')->nullable();
            $table->string('gender')->nullable();
            $table->string('marking')->nullable();
            $table->string('breed')->nullable();
            $table->string('microchip_id')->nullable();
            $table->string('description')->nullable();
            $table->string('images')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('address')->nullable();
            $table->string('status')->default(1);
            $table->string('missing_status')->default('Missing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_dogs');
    }
};
