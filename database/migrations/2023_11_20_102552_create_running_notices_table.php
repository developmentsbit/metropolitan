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
        Schema::create('running_notices', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->longText('title')->nullable();
            $table->longText('title_bn')->nullable();
            $table->longText('details')->nullable();
            $table->longText('details_bn')->nullable();
            $table->string('image',100)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('running_notices');
    }
};
