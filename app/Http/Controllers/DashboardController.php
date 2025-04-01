<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use App\Models\Agent;
use App\Models\Ship;
class DashboardController extends Controller
{
    function index(){

        $agents = Agent::with(['ships'])->get();

        return Inertia::render('dashboard', ['agents' => $agents]);
    }
}
