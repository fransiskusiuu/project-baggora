<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', Rule::unique('tb_user')->ignore($user->id)],
            'email' => 'required|email',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return back()->with('SuccessGantiInfoProfile', 'Profile berhasil diupdate!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'currentPassword' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('Current password is incorrect.');
                }
            }],
            'newPassword' => 'required|min:8|confirmed',
        ]);

        $user->password = Hash::make($request->input('newPassword'));
        $user->save();

        return back()->with('SuccessGantiPassword', 'Password berhasil diupdate!');
    }

    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();

        if ($user->delete()) {
            return redirect('/home')->with('Message', 'Akun Anda telah dihapus!');
        }
    }
}
