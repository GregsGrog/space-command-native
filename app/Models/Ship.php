<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    protected $table = 'ships';
    protected $fillable = [
        'symbol', 'nav_system_symbol', 'nav_waypoint_symbol', 'nav_route', 'nav_status', 'nav_flight_mode',
        'crew_current', 'crew_capacity', 'crew_required', 'crew_rotation', 'crew_morale', 'crew_wages',
        'fuel_current', 'fuel_capacity', 'fuel_consumed', 'cooldown_ship_symbol', 'cooldown_total_seconds',
        'cooldown_remaining_seconds', 'frame_symbol', 'frame_name', 'frame_description', 'frame_module_slots',
        'frame_mounting_points', 'frame_fuel_Capacity', 'frame_condition', 'frame_integrity', 'frame_quality',
        'frame_requirements', 'reactor_symbol', 'reactor_name', 'reactor_description', 'reactor_condition',
        'reactor_integrity', 'reactor_powerOutput', 'reactor_quality', 'reactor_requirements', 'engine_symbol',
        'engine_name', 'engine_description', 'engine_condition', 'engine_integrity', 'engine_speed', 'engine_quality',
        'engine_requirements', 'modules', 'mounts', 'registration_name', 'registration_faction_symbol',
        'registration_role', 'cargo_capacity', 'cargo_units', 'cargo_inventory', 'agent_id' // Make sure foreign key is included
    ];

    protected $casts = [
        'nav_route' => 'array',
        'fuel_consumed' => 'array',
        'frame_requirements' => 'array',
        'reactor_requirements' => 'array',
        'engine_requirements' => 'array',
        'mounts' => 'array',
        'modules' => 'array',
        'cargo_inventory' => 'array',
    ];



    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
