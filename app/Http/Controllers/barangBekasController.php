<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barangBekas;

class barangBekasController extends Controller
{
    public function show($id)
    {
        $bekas = barangBekas::find($id);
        return view('detailbarang', compact('bekas'));
    }

    public function addBarang($id)
    {
        $tb_barangbekas = barangBekas::findOrFail($id);

        $keranjang = session()->get('keranjang', []);
        if(isset($keranjang[$id])) {
            $keranjang[$id]['kuantitas']++;
        } else {
            $keranjang[$id] = [
                "image" => $tb_barangbekas->image,
                "nama_merk" => $tb_barangbekas->nama_merk,
                "nama_barang" => $tb_barangbekas->nama_barang,
                "kuantitas" => 1,
                "harga" => $tb_barangbekas->harga
            ];
        }
        session()->put('keranjang', $keranjang);
        return redirect()->back()->with('Success', 'Barang berhasil ditambahkan ke keranjang!');
    }

    public function deleteBarang(Request $request)
    {
        if($request->has('id')) {
            $keranjang = session()->get('keranjang', []);
            if(array_key_exists($request->id, $keranjang)) {
                unset($keranjang[$request->id]);
                session()->put('keranjang', $keranjang);
                session()->flash('Success', 'Barang berhasil dihapus!');
            }
        }
    }

    public function clearKeranjang()
    {
        session()->put('keranjang', []);

        session()->flash('Success', 'Semua barang berhasil dihapus dari keranjang!');

        return redirect('/keranjang');
    }

    public function calculateTotal(Request $request)
    {
        $keranjang = $request->session()->get('keranjang');
        $total = 0;

        foreach ($keranjang as $id => $details) {
            $total += $details['harga'] * $details['kuantitas'];
        }

        return response()->json(['total' => $total]);
    }

}
