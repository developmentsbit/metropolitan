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
        Schema::create('ex__principal_vice_principals', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('profession')->nullable();
            $table->string('duration')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->integer('status')->default(1)->comment(' 1 = Active & 0 = Inactive');
            $table->string('image',100)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ex__principal_vice_principals');
    }
};
