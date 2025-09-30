<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregar rol
            if (!Schema::hasColumn('users', 'role')) {
                $table->enum('role', ['Administrator', 'Teacher', 'Student'])->default('Student');
            }
            
            // Agregar grupo
            if (!Schema::hasColumn('users', 'group_id')) {
                $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
            if (Schema::hasColumn('users', 'group_id')) {
                $table->dropForeign(['group_id']);
                $table->dropColumn('group_id');
            }
        });
    }
};
