<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {

            //
            if (!Schema::hasColumn('events', 'end_time')) {
				$table->string('end_time')->nullable()->after('time');
			}
            if (!Schema::hasColumn('events', 'location')) {
				$table->string('location')->nullable()->after('end_time')->comment('where');
			}
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'location')) {
				$table->dropColumn('end_time');
			}
            if (Schema::hasColumn('events', 'location')) {
				$table->dropColumn('location');
			}
        });
    }
}
