<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\User;
use App\Rules\ValidateDebut;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tacheController extends Controller
{
    //
    public function welcome()
    {
        $taches =  User::find(Auth::user()->id)->taches()->orderByDesc('updated_at')->paginate(3);
        return view("dashboard",["taches" => $taches]);
    }
    public function index()
    {
        $taches =  User::find(Auth::user()->id)->taches()->orderByDesc('updated_at')->get();
        return view("listeTache",["taches" => $taches]);
    }
    public function indexAdmin()
    {
        $taches =  Tache::orderByDesc('updated_at')->get();
        return view("listeTacheAdmin",["taches" => $taches]);
    }
    public function create()
    {
        return view("ajoutTache");
    }
    public function update($id)
    {
        $tache = Tache::all()->find($id);
        return view("updateTache",["tache" => $tache]);
    }
    public function addUpdateTache(Request $request)
    {
        $request->validate([
            "date_debut" => [new ValidateDebut($request->date_debut)],
            "date_fin" => [new ValidateDebut($request->date_debut,$request->date_fin)]
        ]);
        $tache = Tache::all()->find($request->id);
        $tache -> update([
            "titre" => $request->titre,
            "description"  => $request->description,
            "date_debut"  => $request->date_debut,
            "date_fin"  => $request->date_fin,
        ]);
        $taches =  User::find(Auth::user()->id)->taches()->orderByDesc('updated_at')->get();
        return view("listeTache",["taches" => $taches]);
    }
    public function delete(Request $request)
    {
        $tache = Tache::all()->find($request->id);
        $tache -> delete();
        $taches = User::find(Auth::user()->id)->taches()->orderByDesc('updated_at')->get();
        return view("listeTache",["taches" => $taches]);
    }
    public function addTache(Request $request)
    {
        $request->validate([
            "date_debut" => [new ValidateDebut($request->date_debut)],
            "date_fin" => [new ValidateDebut($request->date_debut,$request->date_fin)]
        ]);
         Tache::firstOrCreate(
             [
                "titre" => $request->titre,
                "description"  => $request->description,
                "user_id" => Auth::user()->id,
                "date_debut"  => $request->date_debut,
                "date_fin"  => $request->date_fin,
             ]
         );
         $taches = User::find(Auth::user()->id)->taches()->orderByDesc('updated_at')->get();
         return view("listeTache",["taches" => $taches]);


    }
     


}
