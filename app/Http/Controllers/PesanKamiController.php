<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanKami;

class PesanKamiController extends Controller
{
    public function kirimPesan(Request $request)
    {
 
        $this->validate($request, [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|email',
            'subjek' => 'required',
            'pesan' => 'required',
        ]);

        $pesan = new pesanKami();
        $pesan->id_pesan = $request->id_pesan;
        $pesan->nama_depan = $request->nama_depan;
        $pesan->nama_belakang = $request->nama_belakang;
        $pesan->email = $request->email;
        $pesan->subjek = $request->subjek;
        $pesan->pesan = $request->pesan;
        $pesan->save();

        return response()->json(['success' => 'Pesan berhasil dikirim!']);
    }
}
