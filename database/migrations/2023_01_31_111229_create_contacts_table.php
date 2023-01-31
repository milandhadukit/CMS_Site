<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('employment_descreption');
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('description_2')->nullable(); 
            $table->text('image')->nullable(); 
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
        Schema::dropIfExists('contacts');
    }
}
