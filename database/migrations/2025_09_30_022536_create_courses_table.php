<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('course_key')->unique();
        $table->string('title');
        $table->string('course_cover')->nullable(); // URL o path de imagen
        $table->text('content')->nullable();
        $table->string('didactic_material')->nullable();
        $table->string('robotics_kit');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('courses');
}

};
