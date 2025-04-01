<?php

namespace App\Http\Classes;

use App\Http\Classes\ShipClass;
use App\Models\Agent;
use Illuminate\Support\Facades\Http;
class AgentClass
{
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|true|void
     * @throws \Illuminate\Http\Client\ConnectionException
     */
    public function collectAgent($token){


        $response = Http::withToken($token)->get('https://api.spacetraders.io/v2/my/agent');

        if($response->successful()){
            $data = json_decode($response->getBody()->getContents())->data;
            $duplicateCheck = Agent::where('symbol', '=', $data->symbol)->first();

            if ($duplicateCheck !== null){
                return $this->refreshAgent($duplicateCheck->symbol);
            }

            $agent = new Agent();
            $agent->account_id = $data->accountId;
            $agent->symbol = $data->symbol;
            $agent->headquarters = $data->headquarters;
            $agent->credits = $data->credits;
            $agent->starting_faction = $data->startingFaction;
            $agent->is_owned = true;
            $agent->token = $token;
            $agent->save();
            $ships = new ShipClass($agent->symbol);

            return $agent;
        }
    }

    public function refreshAgent($symbol){


        $agent = Agent::where('symbol', '=', $symbol)->first();
        if (strtotime($agent->updated_at) > (time() - 300)) {
            return; //the data is not old enough yet
        }

        $response = Http::withToken($agent->token)->get('https://api.spacetraders.io/v2/my/agent');

        if($response->successful()){
            $data = json_decode($response->getBody()->getContents())->data;
            $agent->account_id = $data->accountId;
            $agent->symbol = $data->symbol;
            $agent->headquarters = $data->headquarters;
            $agent->credits = $data->credits;
            $agent->starting_faction = $data->startingFaction;
            $agent->is_owned = true;
            $agent->save();

        }

        return $agent;
    }

}


