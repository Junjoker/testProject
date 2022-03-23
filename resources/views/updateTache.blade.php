@extends('layouts.app')
@section('appContent')
@php
$active = "all"
@endphp
<div class="container-fluid p-5 shadow-sm bg-white br">
    <h1 class="font-bold text-uppercase">  {{ $tache->titre}}  </h1>
    <h6 class="text-secondary">Modification de la tâche !</h6>
   
    <div class="pt-5">
    <form action="{{route('tache.addUpdate')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $tache->id}}">
        <div class="row">
        <div class="form-group col-12">
            <input type="text" name="titre" value="{{ $tache->titre}}" class="form-control" placeholder="Libellé de la nouvelle tâche" required>
        </div>
        <div class="form-group col-12">
            <textarea class="form-control" name="description" id="" cols="30" rows="5" placeholder="Description de la tâche" required>
            {{ $tache->description}}
            </textarea>
        </div>
        <div class="col-12 text-left py-3">
        <h5 class="text-uppercase"> Horaires </h5>
        </div>
        <div class="form-group col-md-6 text-left">
            <input type="text" value="{{ $tache->date_debut}}" onfocus="this.type = 'date'" name="date_debut" class="form-control" placeholder="Date début" required>
            @error('date_debut')
                <small class="font-bold text-danger">{{ $errors->first('date_debut') }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6 text-left">
            <input type="text" value="{{ $tache->date_fin}}" onfocus="this.type = 'date'" name="date_fin" class="form-control" placeholder="Date Fin" required>
            @error('date_fin')
                <small class="font-bold text-danger">{{ $errors->first('date_fin') }}</small>
            @enderror
        </div>
        </div>
        <div class="d-flex justify-content-end py-3">
            <input type="reset" class="btn btn-secondary px-5 mr-2" value="Annuler">
            <input type="submit" class="btn btn-success px-5" value="Modifier">
        </div>
    </form>
    </div>
</div>
@endsection