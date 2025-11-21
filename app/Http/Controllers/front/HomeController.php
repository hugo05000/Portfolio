<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Client;

class HomeController extends Controller
{
    public function index() {
        $clients = Client::all();

        return view('pages.index', compact('clients'));
    }
}
