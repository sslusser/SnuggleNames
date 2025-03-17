<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameVariationsToNamesTable extends Migration
{
    public function up()
    {
        Schema::table('names', function (Blueprint $table) {
            $table->string('prefix')->nullable()->after('name'); // e.g., "Sir", "Captain"
            $table->string('compound_name')->nullable()->after('name'); // e.g., "Muffin", "Bear"
        });
    }

    public function down()
    {
        Schema::table('names', function (Blueprint $table) {
            $table->dropColumn('prefix');
            $table->dropColumn('compound_name');
        });
    }
}
