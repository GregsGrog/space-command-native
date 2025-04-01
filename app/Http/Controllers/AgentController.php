<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use App\Http\Classes\AgentClass;

class AgentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|void
     * @throws \Illuminate\Http\Client\ConnectionException
     */
    function create(Request $request)
    {
        $agentController = new AgentClass();
        $agentController->collectAgent($request->get('id'));


        return Agent::all();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function delete(Request $request)
    {
        $agent = Agent::find($request->get('id'));
        $agent->delete();
        $agents = Agent::all();
        return $agents;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection|void
     * @throws \Illuminate\Http\Client\ConnectionException
     */
    function refresh(Request $request){
        $agentController = new AgentClass();
        $agentController->refreshAgent($request->get('symbol'));
        return Agent::all();
    }

    /**
     * @param $symbol
     * @return \Inertia\Response
     */
    function view($symbol){

        $agent = Agent::where('symbol', $symbol)->with("ships")->first();
        return Inertia::render('agents/view', ['agent' => $agent]);
    }
}
