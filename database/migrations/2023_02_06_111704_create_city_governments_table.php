<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityGovernmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_governments', function (Blueprint $table) {
            $table->id();
            $table->string('title_city');
            $table->text('descreption_city')->nullable();
            $table->text('left_content')->nullable();
            $table->text('right_content')->nullable();
            $table
                ->enum('status', ['1', '0'])
                ->comment('1=enable,0=disable')
                ->default(1);
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
        Schema::dropIfExists('city_governments');
    }
}
