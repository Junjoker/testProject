@extends('layouts.app')
@section('scripts')
<script>
    subDashMenu('subDashMenu1','fa-angle-left1')
</script>
@endsection
@section('appContent')
@php
$active = "add"
@endphp

<div class="container-fluid p-5 shadow-sm bg-white br">
    <h1 class="font-bold text-uppercase"> Nouvelle tâche </h1>
    <h6 class="text-secondary"><span class="font-bold">Plan your task</span>, une application de gestion de tâches !</h6>
   
    <div class="pt-5">
    <form action="{{route('tache.add')}}" method="post">
        @csrf
        <div class="row">
        <div class="form-group col-12">
            <input type="text" name="titre" class="form-control" value="{{ old('titre')}}" placeholder="Libellé de la nouvelle tâche" required>
        </div>
        <div class="form-group col-12">
            <textarea class="form-control" name="description" id="" cols="30" rows="5" placeholder="Description de la tâche" required>
            {{ old('description')}}
            </textarea>
        </div>
        <div class="col-12 text-left py-3">
        <h5 class="text-uppercase"> Horaires </h5>
        </div>
        <div class="form-group col-md-6 text-left">
            <input type="text" onfocus="this.type = 'date'" name="date_debut" value="{{ old('date_debut')}}" class="form-control @error('date_debut') is-invalid @enderror" placeholder="Date début" required>
            @error('date_debut')
                <small class="font-bold text-danger">{{ $errors->first('date_debut') }}</small>
            @enderror
        </div>
        <div class="form-group col-md-6 text-left">
            <input type="text" onfocus="this.type = 'date'" name="date_fin" value="{{ old('date_fin')}}" class="form-control @error('date_fin') is-invalid @enderror" placeholder="Date Fin" required>
            @error('date_fin')
                <small class="font-bold text-danger">{{ $errors->first('date_fin') }}</small>
            @enderror
        </div>
        </div>
        <div class="d-flex justify-content-end py-3">
            <input type="reset" class="btn btn-secondary px-5 mr-2" value="Annuler">
            <input type="submit" class="btn btn-primary px-5" value="Créer">
        </div>
    </form>
    </div>
</div>
@endsection