<?php

namespace App\Http\Classes;

use App\Models\Agent;
use App\Models\Ship;
use Illuminate\Support\Facades\Http;

class ShipClass
{
    private $agent;


    function __construct($agent_symbol) {

        $agent = Agent::where('symbol', '=', $agent_symbol)->first();
        if($agent !== null){
            $this->agent = $agent;
            $this->getAllShips();
        }else{
            return true;
        }
    }

    private function getAllShips(){
        //call the enpoint to get a list of ships.
        //pass them to storeShip with all data

        $ships = Http::withToken($this->agent->token)->get('https://api.spacetraders.io/v2/my/ships');
        $ships_decoded = json_decode($ships->getBody()->getContents())->data;

        foreach($ships_decoded as $ship){
           $this->storeShip($ship);
        }

    }

    private function storeShip($ship){

        //checks if the ship is already in the DB if it is refresh it instead.
        //take a single ships data and store it in the DB

        $new_ship = new Ship();

        $new_ship->symbol = $ship->symbol;
        $new_ship->nav_system_symbol = $ship->nav->systemSymbol;
        $new_ship->nav_waypoint_symbol = $ship->nav->waypointSymbol;
        $new_ship->nav_route = $ship->nav->route;
        $new_ship->nav_status = $ship->nav->status;
        $new_ship->nav_flight_mode = $ship->nav->flightMode;

        $new_ship->crew_current = $ship->crew->current;
        $new_ship->crew_capacity = $ship->crew->capacity;
        $new_ship->crew_required = $ship->crew->required;
        $new_ship->crew_rotation = $ship->crew->rotation;
        $new_ship->crew_morale = $ship->crew->morale;
        $new_ship->crew_wages = $ship->crew->wages;

        $new_ship->fuel_current = $ship->fuel->current;
        $new_ship->fuel_capacity = $ship->fuel->capacity;
        $new_ship->fuel_consumed = $ship->fuel->consumed;

        $new_ship->cooldown_ship_symbol = $ship->cooldown->shipSymbol;
        $new_ship->cooldown_total_seconds = $ship->cooldown->totalSeconds;
        $new_ship->cooldown_remaining_seconds = $ship->cooldown->remainingSeconds;

        $new_ship->frame_symbol = $ship->frame->symbol;
        $new_ship->frame_name = $ship->frame->name;
        $new_ship->frame_description = $ship->frame->description;
        $new_ship->frame_module_slots = $ship->frame->moduleSlots;
        $new_ship->frame_mounting_points = $ship->frame->mountingPoints;
        $new_ship->frame_fuel_Capacity = $ship->frame->fuelCapacity;
        $new_ship->frame_condition = $ship->frame->condition;
        $new_ship->frame_integrity = $ship->frame->integrity;
        $new_ship->frame_quality = $ship->frame->quality;
        $new_ship->frame_requirements = $ship->frame->requirements;

        $new_ship->reactor_symbol = $ship->reactor->symbol;
        $new_ship->reactor_name = $ship->reactor->name;
        $new_ship->reactor_description = $ship->reactor->description;
        $new_ship->reactor_condition = $ship->reactor->condition;
        $new_ship->reactor_integrity = $ship->reactor->integrity;
        $new_ship->reactor_powerOutput = $ship->reactor->powerOutput;
        $new_ship->reactor_quality = $ship->reactor->quality;
        $new_ship->reactor_requirements = $ship->reactor->requirements;

        $new_ship->engine_symbol = $ship->engine->symbol;
        $new_ship->engine_name = $ship->engine->name;
        $new_ship->engine_description = $ship->engine->description;
        $new_ship->engine_condition = $ship->engine->condition;
        $new_ship->engine_integrity = $ship->engine->integrity;
        $new_ship->engine_speed = $ship->engine->speed;
        $new_ship->engine_quality = $ship->engine->quality;
        $new_ship->engine_requirements = $ship->engine->requirements;

        $new_ship->modules = $ship->modules;
        $new_ship->mounts = $ship->mounts;

        $new_ship->registration_name = $ship->registration->name;
        $new_ship->registration_faction_symbol = $ship->registration->factionSymbol;
        $new_ship->registration_role = $ship->registration->role;

        $new_ship->cargo_capacity = $ship->cargo->capacity;
        $new_ship->cargo_units = $ship->cargo->units;
        $new_ship->cargo_inventory = $ship->cargo->inventory;

        $this->agent->ships()->save($new_ship);

    }

    private function refreshShip(){
        //get a ship and check the last time it was updated using its symbol
        //if older than a few mins update it.
    }




}


