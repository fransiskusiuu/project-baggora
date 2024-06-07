<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PesanKamiController;
use App\Http\Controllers\barangBekasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*---------------------
  Home
-----------------------*/

Route::get('/home', function () {
    return view('home');
}); 

/*-----------------------*/

/*---------------------
  Barang
-----------------------*/

Route::get('/barang-1', function () {
    return view('/barang/barang-1');
});

Route::get('/barang-2', function () {
    return view('/barang/barang-2');
});

Route::get('/barang-3', function () {
    return view('/barang/barang-3');
});

/*-----------------------*/

/*---------------------
  Detail Barang
-----------------------*/

Route::get('/detailbarang/{id}', [barangBekasController::class, 'show'])->name('detailbarang');

/*-----------------------*/

/*---------------------
  Login Register
-----------------------*/

Route::get('/login', [LoginController::class, 'home'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'register'])->name('user.register');

/*-----------------------*/

/*---------------------
  Profile
-----------------------*/

Route::get('/profile', function () {
    return view('profile');
});

Route::post('/update-profile', [ProfileController::class, 'update'])->name('update.profile');
Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('update.password');

Route::delete('/user/{user}', [ProfileController::class, 'destroy'])->name('user.destroy');

/*-----------------------*/

/*---------------------
  Footer
-----------------------*/

Route::post('/newsletter', [NewsletterController::class, 'store']);

/*-----------------------*/

/*---------------------
  Footer
-----------------------*/

Route::get('/kontak', function () {
    return view('kontak');
});

Route::post('/kirim-pesan', [PesanKamiController::class, 'kirimPesan']);

/*-----------------------*/

/*---------------------
  Keranjang
-----------------------*/

Route::get('/keranjang', function () {
    return view('keranjang');
});

Route::get('/barang/{id}', [barangBekasController::class, 'addBarang'])->name('addBarang.ke.keranjang');
Route::get('/total-keranjang', [barangBekasController::class, 'calculateTotal'])->name('cart.total');
Route::delete('/delete-keranjang', [barangBekasController::class, 'deleteBarang'])->name('deleteBarang.keranjang');
Route::get('/clear-keranjang', [barangBekasController::class, 'clearKeranjang'])->name('delete.keranjang');

/*-----------------------*/

Route::get('/forum', function () {
    return view('forum');
});

Route::get('/tentang', function () {
    return view('tentang');
});




