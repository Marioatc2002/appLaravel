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
        Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('course_key')->unique();
        $table->string('course_name');

        // Relación correcta
        $table->foreignId('robotics_kit_id')
            ->constrained('robotic_kits')
            ->onDelete('cascade');

        $table->timestamps();
        $table->engine = 'InnoDB';
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
