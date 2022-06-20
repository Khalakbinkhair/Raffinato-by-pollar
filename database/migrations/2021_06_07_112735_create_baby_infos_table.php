<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baby_infos', function (Blueprint $table) {
          $table->id();
          
          $table->string('name');
          $table->string('member_id')->nullable();
          $table->string('gender');
          $table->string('area')->nullable();
          $table->char('phone')->nullable();
          $table->string('email')->nullable();
          $table->string('mocha')->nullable();
          $table->string('natural_vanilla')->nullable();
          $table->string('mint_chocolate')->nullable();
        
          $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('baby_infos');
    }
}
