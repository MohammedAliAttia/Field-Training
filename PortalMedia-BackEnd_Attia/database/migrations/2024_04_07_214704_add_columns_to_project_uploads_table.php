<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('project_uploads', function (Blueprint $table) {
            $table->id()->primary(); // This will create 'id' as the primary key
            $table->unsignedBigInteger('project_id');
            $table->binary('project_data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
    }
};
