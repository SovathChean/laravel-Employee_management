<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    //
    public function index(){
      $id = auth()->user()->id;
      $users = User::where('id', $id)->get();
      return view('admin.profile.index', compact('users'));
    }
}
