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
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('college');
            $table->text('image')->nullable();
            $table->string('name')->nullable();
            $table->string('name_bangla')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('established')->nullable();
            $table->string('established_bangla')->nullable();
            $table->string('eiin')->nullable();
            $table->string('eiin_bangla')->nullable();
            $table->string('meta')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('map')->nullable();
            $table->longText('page')->nullable();
            $table->longText('youtube')->nullable();
            $table->longText('address')->nullable();
            $table->longText('address_bangla')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting');
    }
};
