<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Users;
use App\Pets;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        $users = Users::get();
        foreach ($users as $user) {
            $user->display_name = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
            unset($user->password);
        }
        return $users;
    }

    public function selecteduser($id)
    {
        $user = Users::where('id', $id)->first();
        return $user;
    }

    public function userpets($id)
    {
        $pets = [];
        $user = Users::where('id', $id)->first();
     
        if ($user != null) {
            $pets = Pets::where('user_id', $user->id)->with('favourite_foods')->get();
        }
     
        return $pets;    
    }

    public function userspost(Request $request)
    {
        if ($request->has('password')) {
            unset($request['password']);
        }
     
        if ($request->has('username')) {
            unset($request['username']);
        }
     
        if ($request->has('api_token')) {
            unset($request['api_token']);
        }
     
        $request->validate([
            'first_name' => 'required|max:64',
            'middle_name' => 'max:64',
            'last_name' => 'required|max:64',
            'email' => 'required|unique:users|max:256',
        ]);

        $insertUser = new User;
        $insertUser->first_name = $request->first_name;
        $insertUser->middle_name = $request->middle_name;
        $insertUser->last_name = $request->last_name;
        $insertUser->email = $request->email;
        $insertUser->contact_number = $request->contact_number;
        $insertUser->disabled = false;
        $insertUser->save();
     
        $user = Users::where('email', $email)->first();
     
        return $user;    
    }
}