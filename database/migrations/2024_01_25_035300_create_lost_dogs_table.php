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
        Schema::create('lost_dogs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('payment_status')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('color')->nullable();
            $table->string('breed')->nullable();
            $table->string('marking')->nullable();
            $table->string('last_seen')->nullable();
            $table->string('microchip_id')->nullable();
            $table->longText('medicine_info')->nullable();
            $table->longText('description')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('address')->nullable();
            $table->string('images')->nullable();
            $table->string('missing_status')->default('Found');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_dogs');
    }
};
