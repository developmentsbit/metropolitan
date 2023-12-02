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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();;
            $table->string('name')->nullable();;
            $table->string('father_name')->nullable();;
            $table->string('mother_name')->nullable();;
            $table->string('designation')->nullable();;
            $table->string('profession')->nullable();;
            $table->string('duration')->nullable();;
            $table->string('mobile')->nullable();;
            $table->string('email')->nullable();;
            $table->longText('address')->nullable();;
             $table->string('status')->nullable();;
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
