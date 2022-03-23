@extends('layouts.app')
@section('scripts')
<script>
    subDashMenu('subDashMenu1','fa-angle-left1')
</script>
@endsection
@section('appContent')
@php
$active = "all";
$current_date = date('Y-m-d H:i:s') 

@endphp
<div class="container-fluid p-5 shadow-sm bg-white br text-left">
<h3 class="font-bold text-uppercase"> Mes tâches </h3>
<h6 class="text-secondary mb-4"><span class="font-bold">Plan your task</span>, une application de gestion de tâches !</h6>
<!-- ================================================================================================================== -->
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link text-white active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tâches en cours</a>
  </li>
    <li class="nav-item" role="presentation">
    <a class="nav-link text-white" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Tâches en attentes</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tâches achevées</a>
  </li>

</ul>
<hr>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <!-- =================================================================================================================== -->

      @if($taches->count() > 0)
        @foreach($taches as $tache)
        <div class="bg-light p-3 mb-3 @if($current_date > $tache->date_fin || $current_date < $tache->date_debut) d-none  @endif">
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
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    @if($taches->count() > 0)
        @foreach($taches as $tache)
        <div class="bg-light p-3 mb-3 @if($current_date >= $tache->date_debut && $current_date <= $tache->date_fin || $current_date > $tache->date_fin) d-none  @endif">
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
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
       <!-- =================================================================================================================== -->

       @if($taches->count() > 0)
        @foreach($taches as $tache)
        <div class="bg-light p-3 mb-3 @if($current_date >= $tache->date_debut && $current_date <= $tache->date_fin || $current_date < $tache->date_debut) d-none  @endif">
        <h5 class="font-bold"> {{$tache->titre}} </h5>
        <h6 class="text-secondary">{{$tache->description}}</h6>
        <h6 class="text-secondary"> Date début :  <span class="font-bold">{{$tache->date_debut}}</span>
        Date fin :  <span class="font-bold">{{$tache->date_fin}}</span> </h6>
        <div class="d-flex justify-content-between align-items-end py-1">
            <div>
                <small>Publié le {{$tache->created_at}}</small>
            </div>
            <div>
                <a class="btn btn-info mr-2 text-white" href="{{ route('tache.update',['id'=>$tache->id])}}">Relancer la tâche</a>
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
  
</div>


</div>

@endsection