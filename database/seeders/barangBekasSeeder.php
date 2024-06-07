<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\barangBekas;

class barangBekasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tb_barangbekas = [
            [
                'image' => 'images/products/0b64ea8f-a662-4095-92cd-a30820d8d511.jpeg',
                'file' => '/detailbarang-1',
                'nama_merk' => 'Casio',
                'nama_barang' => 'Baby-G',
                'kuantitas' => 1,
                'harga' => 900000,
                'penawaran' => 0
            ],
            [
                'image' => 'images/products/117df7c2-81b4-486d-bc34-2e300e2c0e71.jpeg',
                'file' => '/detailbarang-2',
                'nama_merk' => 'Casio',
                'nama_barang' => 'Adult-G',
                'kuantitas' => 1,
                'harga' => 1200000,
                'penawaran' => 0
            ],
            [
                'image' => 'images/products/69682436-cb65-4186-b289-f1325d044c51.jpeg',
                'file' => '/detailbarang-3',
                'nama_merk' => 'Casio',
                'nama_barang' => 'Kalkulator Ilmiah',
                'kuantitas' => 1,
                'harga' => 95000,
                'penawaran' => 0
            ],
            [
                'image' => 'images/products/79b119ef-26b4-4a87-b961-673f670bf970.jpeg',
                'file' => '/detailbarang-4',
                'nama_merk' => 'Telkomsel',
                'nama_barang' => 'Model Orbit Pro H2',
                'kuantitas' => 1,
                'harga' => 750000,
                'penawaran' => 0
            ],
            [
                'image' => 'images/products/9a1a17e0-0341-440b-9a19-837c77fefdbf.jpeg',
                'file' => '/detailbarang-5',
                'nama_merk' => 'UKCA',
                'nama_barang' => 'RAM Laptop 8GB DDR5',
                'kuantitas' => 1,
                'harga' => 350000,
                'penawaran' => 0
            ],
            [
                'image' => 'images/products/a96f9dff-c862-404c-ad29-012886db038e.jpeg',
                'file' => '/detailbarang-6',
                'nama_merk' => 'Unbranded',
                'nama_barang' => 'Jeans',
                'kuantitas' => 1,
                'harga' => 90000,
                'penawaran' => 0
            ],
            [
                'image' => 'images/products/d7757059-b875-487f-9506-4b010f59d998.jpeg',
                'file' => '/detailbarang-7',
                'nama_merk' => 'Unbranded',
                'nama_barang' => 'Cardigan',
                'kuantitas' => 1,
                'harga' => 50000,
                'penawaran' => 0
            ],
            [
                'image' => 'images/products/f6ccb5bd-944a-46aa-9964-4020c2441f1a.jpeg',
                'file' => '/detailbarang-8',
                'nama_merk' => 'KRIS',
                'nama_barang' => 'Hair Dryer 1800 Watt',
                'kuantitas' => 1,
                'harga' => 175000,
                'penawaran' => 0
            ]
            
        ];
            
        foreach ($tb_barangbekas as $key => $value) {
            barangBekas::create($value);
        }
    }
}
