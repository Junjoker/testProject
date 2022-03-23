@extends('layouts.app')
@section('appContent')
@php
$active = "dash"
@endphp
<div class="row mx-1 justify-content-between p-5 shadow-sm bg-white br mb-4">
    <div class="col-6 text-left px-0">
    <div class="container-fluid">
    <h1> Bienvenue sur <span class="font-bold">Plan your task</span> </h1>
    <h3 class="text-secondary">Une application de gestion de tâches !</h3>
    <div style="background-color: orange;width:5.5rem;height:.4rem" class="my-4"></div>
    <div>
        <a href="{{route('tache.create')}}" class="btn btn-primary br px-5 mt-3 font-bold">Ajouter une nouvelle tâche !</a>
    </div>
</div>
    </div>
    <div class="col-4 text-right">
        <img src="{{asset('images/welcome.svg')}}" alt="" class="container-fluid">
    </div>
</div>
<!-- ================================================================================ -->

<div class="px-4 col">
<h5 class="font-bold text-uppercase text-left mb-4"> Tâches les plus récentes </h5>
</div>
<!-- ================================================================================ -->
<div class="container-fluid mx-0 p-5 shadow-sm bg-white br text-left">

        @if($taches->count() > 0)
        @foreach($taches as $tache)
        <div class="bg-light p-3 mb-3">
        <h5 class="font-bold"> {{$tache->titre}} </h5>
        <h6 class="text-secondary">{{$tache->description}}</h6>
        <h6 class="text-secondary"> Date début :  <span class="font-bold">{{$tache->date_debut}}</span>
        Date fin :  <span class="font-bold">{{$tache->date_fin}}</span> </h6>
        <div class="d-flex justify-content-between align-items-end py-1">
            <div>
                <small>Publié le {{$tache->created_at}}</small>
            </div>
            <div>
                <a class="btn btn-success mr-2 text-white" href="{{ route('tache.update',['id'=>$tache->id])}}">Modifier</a>
                <form action="{{ route('tache.delete')}}" method="post" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="id" value="{{ $tache->id}}">
                    <input type="submit" class="btn btn-danger text-white" value="Supprimer">
                </form>
                <!-- <a class="btn btn-danger text-white">supprimer</a> -->
            </div>
        </div>
        </div>
       
        @endforeach
        @endif
</div>
@endsection