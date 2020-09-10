<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){

        $user = User::latest()->get();

        return view('users.index', [

            'users' => $user
        ]);

    }

    public function store(Request $request){

        //voy a validar los campos que ingreso:
        $request->validate([
        
            'name' => 'required',
            //colocando: unique:users le digo que quiero un campo de mail único en mi base de datos de la tabla users
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
        ]);
        
        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return back();
        
    }

    public function destroy(User $user){
        
        $user->delete();

        return back();

    }


}
