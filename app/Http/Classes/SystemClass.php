<?php

namespace App\Http\Classes;

use Illuminate\Support\Facades\Http;

class SystemClass
{

    function getAllSystems(){
        //loop through the systems and create a row for each.
    }

    function getSystem($system_symbol){
        //check if the system is in the table if it isnt get it;
        //If it is check if it has had its waypoints collected, if not get them
    }

    function refreshWaypoints($system_symbol){
        //check if the system is in the table if it isnt get it;
        //If it is check if it has had its waypoints collected, if not get them
    }

    function getWaypoint($waypoint_symbol){
        //check if the waypoint is in the table if it isnt get it;
    }

}


