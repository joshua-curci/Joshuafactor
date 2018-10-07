<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;

class PetsController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function deletepets($id)
    {
        DB::table('pets')->where('id', $petId)->delete();
        return null;
    }
}