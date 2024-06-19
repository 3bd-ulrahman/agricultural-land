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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references("id")->on("users")->cascadeOnDelete();
            $table->foreignId('plant_id')->nullable()->references("id")->on("plants")->cascadeOnDelete();
            $table->boolean("is_default")->default(false);
            $table->string('name');
            $table->string('image')->nullable();
            $table->double('watering');
            $table->smallInteger('temperature');
            $table->double('humidity');
            $table->double('soil_Humidity');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
