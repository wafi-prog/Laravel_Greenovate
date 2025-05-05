<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataUserController extends Controller
{
    public function index(){
        $user = User::all();
        return view('DataUser.index',compact('user'));
    }
}
