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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("account_id")->nullable();
            $table->string("symbol");
            $table->string("headquarters");
            $table->integer("credits");
            $table->string("starting_faction");
            $table->string("token");
            $table->boolean("is_owned");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
