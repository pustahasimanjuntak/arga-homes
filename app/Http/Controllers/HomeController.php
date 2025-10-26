<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pricelists = Pricelist::where('is_active', true)->get();
        return view('home', compact('pricelists'));
    }
}