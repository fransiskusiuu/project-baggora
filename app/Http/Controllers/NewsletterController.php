<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\emailSubs;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:tb_emailsubscription',
        ]);
        

        $newsletter = new emailSubs;
        $newsletter->email = $request->email;
        $newsletter->save();

        return response()->json(['success'=>'Berhasil disimpan']);
    }
}
