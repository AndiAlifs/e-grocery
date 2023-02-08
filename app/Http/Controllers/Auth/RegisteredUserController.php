<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $data['roles'] = Role::all();
        $data['gender'] = Gender::all();

        // dd($data);
        return view('auth.register', compact('data'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {   
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender_id' => ['required', 'integer'],
            'role_id' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $display_picture_link = '';
        if($request->display_picture){
            $request->validate([
                'display_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);
            $imageName = time().'.'.$request->display_picture->extension();  
            $request->display_picture->move(public_path('images/profile_pic'), $imageName);
            $display_picture_link = 'images/profile_pic/'.$imageName;
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'role_id' => $request->role_id,
            'gender_id' => $request->gender_id,
            'email' => $request->email,
            'display_picture_link' => $display_picture_link,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
