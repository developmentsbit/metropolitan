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
        Schema::create('teacherstaff', function (Blueprint $table) {
            $table->id();
            $table->integer('sl')->default(1);
            $table->foreignId('department_id')->nullable()->constrained('department')->cascadeOnDelete();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('nid')->nullable();
            $table->string('dob')->nullable();
            $table->string('blood')->nullable();
            $table->string('religion')->nullable();
            $table->string('relationship')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('join_date')->nullable();
            $table->string('mpo_date')->nullable();
            $table->text('present_address')->nullable();
            $table->text('parmanent_address')->nullable();
            $table->text('education')->nullable();
            $table->string('gender')->nullable();
            $table->string('type')->nullable();
            $table->integer('status')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacherstaff');
    }
};
