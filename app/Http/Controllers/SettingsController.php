<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingsController extends Controller
{
    function index(){
        return Inertia::render('settings/settings');
    }
}
