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
        Schema::create('subject_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('class_infos');
            $table->bigInteger('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('group_infos');
            $table->string('subject_name')->nullable();
            $table->string('subject_code')->nullable();
            $table->string('select_subject_type')->nullable();
            $table->integer('serial')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_infos');
    }
};
