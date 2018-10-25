<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::table('rooms', function($table){
            $table->string('city')->after('description');
            $table->string('latitude')->nullable()->after('city');
            $table->string('longitude')->nullable()->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('rooms', 'city'))
            Schema::table('rooms', function($table) { $table->dropColumn('city'); });

        if (Schema::hasColumn('rooms', 'latitude'))
            Schema::table('rooms', function($table) { $table->dropColumn('latitude'); });
            
        if (Schema::hasColumn('rooms', 'longitude'))
            Schema::table('rooms', function($table) { $table->dropColumn('longitude'); });
    }
}
