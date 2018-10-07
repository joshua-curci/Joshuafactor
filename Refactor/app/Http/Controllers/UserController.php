<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Users;
use App\Pets;
use App\Petfood;

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
        $user = null;
        $users = Users::where('id', $id)->get();
        if (count($users) > 0) {
            $user = $users[0];
        }
    
        return $user;
    }

    public function userpets($id)
    {
        $user = null;
        $pets = [];
        $users = Users::where('id', $id)->get();
        if (count($users) > 0) {
            $user = $users[0];
        }
     
        if ($user != null) {
            $pets = Pets::where('user_id', $user->id)->get();
            if (count($pets) > 0) {
                foreach ($pets as $pet) {
                    $pet->favourite_foods = Petfood::where('pet_id', $pet->id)->get();
                }
            }
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
        $insertUser->first_name = $request->first_name,
        $insertUser->middle_name = $request->middle_name,
        $insertUser->last_name = $request->last_name,
        $insertUser->email = $request->email,
        $insertUser->contact_number = $request->contact_number,
        $insertUser->disabled => false,
        $insertUser->save();
     
        $users = Users::where('email', $email)->get();
     
        if (count($users) > 0) {
            $user = $users[0];
            $user->login_date_formatted = $user->login_date->format('Y-m-d H:i:s'); 
            $user->create_date_formatted = $user->created_at->format('Y-m-d H:i:s'); 
            $user->update_date_formatted = $user->updated_at->format('Y-m-d H:i:s'); 
            return $user;
        }
     
        return null;    
    }
}