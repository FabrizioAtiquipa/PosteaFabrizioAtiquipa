<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datetime;
use Jenssegers\Mongodb\Eloquent\Model;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('posts.cuenta',compact('user'));
    }

    public function update(Request $request)
    {
  
        $user_id = Auth::id();
        $usuario = User::find($user_id);
        $usuario->name = $request->get('name');
        $usuario->password = $request->get('password');
     
        if($request->get('status') != null){
            $usuario->status = 0;
        }else{
            $usuario->status = 1;
        }
        $usuario->save();
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $user->delete();
    }
}
