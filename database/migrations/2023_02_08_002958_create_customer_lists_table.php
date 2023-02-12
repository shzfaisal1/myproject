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
        Schema::create('customer_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('mobile_number');
            $table->string('password');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('company');
            $table->string('gstin');
            $table->enum('status',[0,1])->default(1);
         
    
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
        Schema::dropIfExists('customer_lists');
    }
};
