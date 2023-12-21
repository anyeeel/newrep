<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('resolutions', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('memorandum_number')->unique(); // Unique index for memorandum_number
            $table->text('description');
            $table->string('photo')->nullable();
            $table->string('file_path')->nullable();
            $table->string('category');
            $table->timestamps();

            // Adding indexes
            $table->index('category'); // Index for category
            // memorandum_number already has a unique index
        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resolutions');
    }
};
