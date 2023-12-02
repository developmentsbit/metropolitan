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
        Schema::create('teaching_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->string('subject_bn')->nullable();
            $table->string('part')->nullable();
            $table->string('part_bn')->nullable();
            $table->string('memorial_no')->nullable();
            $table->string('date')->nullable();
            $table->string('image')->nullable();
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_permissions');
    }
};
