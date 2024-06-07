<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'username' => ['required','min:3','max:255', 'unique:tb_user'],
            'email' => 'required|email|unique:tb_user',
            'password'=> 'required|min:5|max:255'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $values = [
                 'name'=>$request->name,
                 'username'=>$request->username,
                 'email'=>$request->email,
                 'password'=>Hash::make($request->password)
            ];

            $query = DB::table('tb_user')->insert($values);
            if( $query ){
                return response()->json(['status'=>1, 'msg'=>'New Account has been successfully registered! Please Login!']);
            }
        }
    }
}
