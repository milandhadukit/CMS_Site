<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
             $table->text('left_content')->nullable();
             $table->text('right_content')->nullable();
             $table->string('left_image')->nullable();
             $table->string('right_image')->nullable();
             $table->enum('status', ['1', '0'])->comment('1=enable,0=disable')->default(1);
             $table->string('slug'); 
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
        Schema::dropIfExists('services');
    }
}
