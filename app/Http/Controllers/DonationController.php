<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function donation_create() {
        return view('donations.create');
    }

    public function donation_create_action(Request $request) {
        $validasi = $request->validate([
            'thumb' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'desc' => 'required'
        ]);

        if ($request->file('thumb')) {
            $validasi['thumb'] = $request->file('thumb')->store('thumbs');
        }

        $validasi['user_id'] = auth()->user()->id;

        Donation::create($validasi);

        return redirect('/');
    }

    public function donation_detail(Request $request, $id) {
        return view('donations.detail', [
            'donation' => Donation::firstWhere('id', $id)
        ]);
    }
}
