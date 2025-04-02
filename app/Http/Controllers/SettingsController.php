<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Classes\SystemClass;

class SettingsController extends Controller
{
    function index(){
        $system = new SystemClass();
        $system->getAllSystems();
        return Inertia::render('settings/settings');
    }
}
