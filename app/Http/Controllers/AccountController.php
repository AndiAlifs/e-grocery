<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class AccountController extends Controller
{

    public function edit()
    {
        $id = auth()->user()->account_id;
        $data['user'] = User::find($id);
        $data['roles'] = Role::all();
        $data['gender'] = Gender::all();

        return view('editprofile', compact('data'));
    }

    public function update(Request $request){
        $id = auth()->user()->account_id;
        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender_id = $request->gender_id;
        $user->role_id = $request->role_id;
        $user->email = $request->email;

        if($request->password){
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user->password = bcrypt($request->password);
        }

        if($request->display_picture){
            $request->validate([
                'display_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);
            $imageName = time().'.'.$request->display_picture->extension();  
            $request->display_picture->move(public_path('images/profile_pic'), $imageName);
            $display_picture_link = 'images/profile_pic/'.$imageName;
            $user->display_picture = $display_picture_link;
        }

        $user->save();

        return redirect()->route('profile');
    }

    public function account_maintenance(){
        $data['accounts'] = User::all();

        return view('account_maintenance', compact('data'));
    }

    public function account_detail($id){
        $data['roles'] = Role::all();
        $data['account'] = User::find($id);

        return view('account_detail', compact('data'));
    }

    public function save_update_role(Request $request){
        $newRole_id = $request->role_id;
        $account_id = $request->account_id;

        $account = User::find($account_id);
        $account->role_id = $newRole_id;
        $account->save();

        return redirect()->route('account_maintenance');
    }
}
