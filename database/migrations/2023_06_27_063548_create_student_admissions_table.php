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
        Schema::create('student_admissions', function (Blueprint $table) {
            $table->id();
            $table->date('apply_date')->nullable();
            $table->string('student_name',100)->nullable();
            $table->string('father_name',100)->nullable();
            $table->string('mother_name',100)->nullable();
            $table->string('religion',100)->nullable();
            $table->string('blood_group',100)->nullable();
            $table->date('date_of_birth',)->nullable();
            $table->string('gender',20)->nullable();
            $table->string('image',100)->default('0');
            $table->bigInteger('class_id')->unsigned()->nullable();
            $table->foreign('class_id')->references('id')->on('addclass');
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->foreign('group_id')->references('id')->on('addgroup');
            $table->string('year',10)->nullable();
            $table->string('present_house_name')->nullable();
            $table->string('present_village')->nullable();
            $table->string('present_po')->nullable();
            $table->string('present_post_code')->nullable();
            $table->string('present_upazila')->nullable();
            $table->string('present_district')->nullable();
            $table->string('permenant_house_name')->nullable();
            $table->string('permenant_village')->nullable();
            $table->string('permenant_po')->nullable();
            $table->string('permenant_post_code')->nullable();
            $table->string('permenant_upazila')->nullable();
            $table->string('permenant_district')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('relation')->nullable();
            $table->string('guardian_contact')->nullable();
            $table->string('guardian_email')->nullable();
            $table->integer('status')->default(1)->comment(' 1 = Active & 0 = Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_admissions');
    }
};
