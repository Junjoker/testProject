@extends('layouts.app')
@section('scripts')
<script>
    subDashMenu('subDashMenu1','fa-angle-left1')
</script>
@endsection
@section('appContent')
@php
$active = "all";
@endphp
<div class="container-fluid p-5 shadow-sm bg-white br text-left">
<h3 class="font-bold text-uppercase"> Liste des utilisateurs </h3>
<h6 class="text-secondary mb-4"><span class="font-bold">Plan your task</span>, une application de gestion de tâches !</h6>
<!-- ================================================================================================================== -->
<hr>
@if($users->count() > 0)
        @foreach($users as $user)
        <div class="bg-light p-3 mb-3">
        <h5 class="font-bold"> {{ $user->username ? $user->username : $user->name." ".$user->prenom  }} </h5>
        <h6 class="text-secondary">{{$user->name}} {{$user->prenom}}</h6>
       
        <div class="d-flex justify-content-between align-items-end py-1">
            <div>
                <small>Inscrit le {{$user->created_at}}</small>
            </div>
            <div>
                <!-- <a class="btn btn-success mr-2 text-white" href="">Modifier</a> -->
                <form action="{{route('user.delete')}}" method="post" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id}}">
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