<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Pets;

class PetsController extends Controller
{
    public function deletepets($userId, $petId)
    {
        Pets::where('id', $petId)->delete();
        return null;
    }
}