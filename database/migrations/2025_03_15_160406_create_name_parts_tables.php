<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Prefixes Table
        Schema::create('prefixes', function (Blueprint $table) {
            $table->id();
            $table->string('prefix')->unique();
            $table->timestamps();
        });

        // Base Names Table
        Schema::create('base_names', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('category', ['pet', 'partner']);
            $table->enum('type', ['dog', 'cat', 'bird', 'fish', 'hamster', 'rabbit', 'lizard', 'boyfriend', 'girlfriend', 'neutral']);
            $table->timestamps();
        });

        // Compound Names Table
        Schema::create('compound_names', function (Blueprint $table) {
            $table->id();
            $table->string('compound_name')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prefixes');
        Schema::dropIfExists('base_names');
        Schema::dropIfExists('compound_names');
    }
};
