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
        Schema::create('resume_works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->year('start_year');
            $table->year('end_year');
            $table->text('description');
            $table->text('achievements');
            $table->json('technologies');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume_works');
    }
};
