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
        Schema::create('mpo_nationalizatios', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('subject')->nullable();
            $table->string('subject_bn')->nullable();
            $table->string('layer')->nullable();
            $table->string('layer_bn')->nullable();
            $table->string('memorial_no')->nullable();
            $table->string('image')->default('0');
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mpo_nationalizatios');
    }
};
