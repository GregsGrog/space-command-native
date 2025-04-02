<?php

namespace App\Http\Classes;


use App\Jobs\ProcessSystemPage;
use Illuminate\Support\Facades\Http;

class SystemClass
{

    function getAllSystems(){
        //loop through the systems and create a row for each.


        $systems = Http::get('https://api.spacetraders.io/v2/systems', [
            'page' => 1,
            'limit' => 1,
        ]);
        $meta = json_decode($systems->getBody()->getContents())->meta;

        $pages = round($meta->total / 20);
        while($pages > 0){
            ProcessSystemPage::class::dispatch($pages);
            $pages --;
        }

       //ProcessSystem::dispatch($system);

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


