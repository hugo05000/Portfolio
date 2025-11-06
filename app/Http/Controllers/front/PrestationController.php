<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Prestation;

class PrestationController extends Controller
{
    public function index() {
        $prestations = Prestation::with('photos')->get();
        return view('pages.prestations', compact('prestations'));
    }
}
