<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title_event');
            $table->text('description')->nullable();
            $table->string('start_date');
            $table->string('end_date')->nullable();
            $table->string('day')->nullable();
            $table->string('time')->nullable();
            $table->text('slug')->nullable(); 
            $table->enum('status', ['1', '0'])->comment('1=Enable,0=disable')->default(1);
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
        Schema::dropIfExists('events');
    }
}
