<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

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
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $user->display_name = $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
            unset($user->password);
        }
        return $users;
    }

    public function selecteduser($id)
    {
        $user = null;
        $users = DB::table('users')->where('id', $id)->get();
        if (count($users) > 0) {
            $user = $users[0];
        }
    
        return $user;
    }

    public function userpets($id)
    {
        $user = null;
        $pets = [];
        $users = DB::table('users')->where('id', $id)->get();
        if (count($users) > 0) {
            $user = $users[0];
        }
     
        if ($user != null) {
            $pets = DB::table('pets')->where('user_id', $user->id)->get();
            if (count($pets) > 0) {
                foreach ($pets as $pet) {
                    $pet->favourite_foods = DB::table('pet_foods')->where('pet_id', $pet->id)->get();
                }
            }
        }
     
        return $pets;    
    }

    public function userspost($id)
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
     
        DB::table('users')->insert([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'disabled' => false,
        ]);
     
        $users = DB::table('users')->where('email', $email)->get();
     
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