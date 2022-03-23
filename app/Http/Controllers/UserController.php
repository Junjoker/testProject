<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // if (!Gate::allows('user-admin')) {
        //     abort(403);
        // }
        $users =  User::orderByDesc('updated_at')->get();
        return view("listeUsers",["users" => $users]);
    }
    public function delete(Request $request)
    {
        $user = User::all()->find($request->id);
        $users = User::find($user->id)->taches()->delete();
        $user -> delete();
        $users =  User::orderByDesc('updated_at')->get();
        return view("listeUsers",["users" => $users]);
    }
}
