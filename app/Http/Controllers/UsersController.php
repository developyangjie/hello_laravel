<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function show(User $user){
        return view("users.show",array("user"=>$user));
    }

    public function store(Request $request){
        $this->validate($request,array(
            "name"=>"required|max:50",
            "email"=>"required|email|unique:users|max:255",
            "password"=>"required|confirmed"
        ));
        $user = new User();
        $user->email = $request->email;
        $user->name = trim($request->name);
        $user->password = bcrypt($request->password);

        if(false !== $user->save()){
            session()->flash("success","保存成功");
            return redirect()->route("users.show",array($user->id));
        }else{
            session()->flash("danger","保存失败");
            return;
        }
    }
}
