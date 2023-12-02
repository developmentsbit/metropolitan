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
        Schema::create('vice_principal_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name',200)->nullable();
            $table->string('name_bn',200)->nullable();
            $table->text('details')->nullable();
            $table->text('details_bn')->nullable();
            $table->string('image',100)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vice_principal_messages');
    }
};
