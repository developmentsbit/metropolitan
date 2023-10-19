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
        Schema::create('addgroup', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('addclass')->cascadeOnDelete();
            $table->string('group_name')->nullable();
            $table->string('group_name_bn')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('addgroup');
    }
};
