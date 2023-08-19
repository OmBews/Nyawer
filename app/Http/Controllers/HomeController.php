<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index', [
            'donations' => Donation::latest()->get()
        ]);
    }
}
