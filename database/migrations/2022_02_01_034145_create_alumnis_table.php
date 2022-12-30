<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('salary')->nullable();
            $table->string('address')->nullable();
            $table->string('linkedin')->nullable();

            // $table->string('github')->nullable();
            // $table->string('youtube')->nullable();
        
            
            $table->string('specialist')->nullable();
            
            //$table->string('maps')->nullable();
            
            // $table->string('hafalan')->nullable();
            
            // $table->string('cv')->nullable();
            // $table->string('portofolio')->nullable();
            // $table->string('experience')->nullable();

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
        Schema::dropIfExists('alumnis');
    }
}
