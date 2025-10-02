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
        Schema::create('robotic_kits', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger autoincrement
            $table->string('name');
            $table->timestamps();

            $table->engine = 'InnoDB'; // asegurar compatibilidad con FK
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robotic_kits');
    }
};
