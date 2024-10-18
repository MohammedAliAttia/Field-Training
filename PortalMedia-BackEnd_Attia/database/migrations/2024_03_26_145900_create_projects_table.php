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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');      
            $table->string('title');
            $table->text('description');
            $table->string('video_demo')->nullable();
            $table->enum('status', ['pending', 'approved'])->default('pending');
            $table->unsignedBigInteger('coordinator_id')->nullable();
            $table->integer('StarRating')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->integer('Year')->nullable();

              // Define foreign key constraint
             
        });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
