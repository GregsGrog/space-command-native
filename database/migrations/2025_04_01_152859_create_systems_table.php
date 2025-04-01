<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("symbol");
            $table->string("constellation");
            $table->string("name");
            $table->string("sector_symbol");
            $table->string("type");
            $table->integer("x");
            $table->integer("y");
            $table->boolean("waypoints_collected")->default(false);
            $table->JSON("waypoints")->default(json_encode([]));
            $table->JSON("factions")->default(json_encode([]));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('systems');
    }
};
