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
        Schema::create('resume_users', function (Blueprint $table) {
            $table->id(); 
            $table->string('job_title');
            $table->string('summary');
            $table->string('phone');
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('codepen')->nullable();
            $table->string('website')->nullable();
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
        Schema::dropIfExists('resume_users');
    }
};
