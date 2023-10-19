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
        Schema::create('previous_class_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('student_admissions');
            $table->string('class')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('board_roll')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('group')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('gpa')->nullable();
            $table->string('files')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_class_infos');
    }
};
