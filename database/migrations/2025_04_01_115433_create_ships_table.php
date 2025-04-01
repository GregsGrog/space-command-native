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
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('agent_symbol');
            $table->string('symbol');
            $table->string('nav_system_symbol');
            $table->string('nav_waypoint_symbol');
            $table->JSON('nav_route');
            $table->string('nav_status');
            $table->string('nav_flight_mode');

            $table->integer('crew_current');
            $table->integer('crew_capacity');
            $table->integer('crew_required');
            $table->string('crew_rotation');
            $table->integer('crew_morale');
            $table->integer('crew_wages');

            $table->integer('fuel_current');
            $table->integer('fuel_capacity');
            $table->JSON('fuel_consumed');

            $table->string('cooldown_ship_symbol');
            $table->integer('cooldown_total_seconds');
            $table->integer('cooldown_remaining_seconds');

            $table->string('frame_symbol');
            $table->string('frame_name');
            $table->string('frame_description');
            $table->integer('frame_module_slots');
            $table->integer('frame_mounting_points');
            $table->integer('frame_fuel_Capacity');
            $table->integer('frame_condition');
            $table->integer('frame_integrity');
            $table->integer('frame_quality');
            $table->JSON('frame_requirements');

            $table->string('reactor_symbol');
            $table->string('reactor_name');
            $table->string('reactor_description');
            $table->integer('reactor_condition');
            $table->integer('reactor_integrity');
            $table->integer('reactor_powerOutput');
            $table->integer('reactor_quality');
            $table->JSON('reactor_requirements');

            $table->string('engine_symbol');
            $table->string('engine_name');
            $table->string('engine_description');
            $table->integer('engine_condition');
            $table->integer('engine_integrity');
            $table->integer('engine_speed');
            $table->integer('engine_quality');
            $table->JSON('engine_requirements');

            $table->JSON('modules');

            $table->JSON('mounts');

            $table->string('registration_name');
            $table->string('registration_faction_symbol');
            $table->string('registration_role');

            $table->integer('cargo_capacity');
            $table->integer('cargo_units');
            $table->JSON('cargo_inventory');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
