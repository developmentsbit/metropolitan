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
        Schema::create('co_curriculam_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_bn')->nullable();
            $table->text('description')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('image')->default('0');
            $table->date('deleted_at')->nullable();
            $table->bigInteger('create_by')->unsigned()->nullable();
            $table->foreign('create_by')->references('id')->on('users');
            $table->bigInteger('edit_by')->unsigned()->nullable();
            $table->foreign('edit_by')->references('id')->on('users');
            $table->bigInteger('delete_by')->unsigned()->nullable();
            $table->foreign('delete_by')->references('id')->on('users');
            $table->bigInteger('restore_by')->unsigned()->nullable();
            $table->foreign('restore_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('co_curriculam_activities');
    }
};
