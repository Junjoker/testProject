@extends('layouts.app')
@section('scripts')
<script>
    subDashMenu('subDashMenu1','fa-angle-left1')
</script>
@endsection
@section('appContent')
@php
$active = 'l-tache';
$current_date = date('Y-m-d H:i:s') 

@endphp
<div class="container-fluid p-5 shadow-sm bg-white br text-left">
<h3 class="font-bold text-uppercase"> Tâches utilisateurs</h3>
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
        <div class="bg-light p-3 mb-3 @if($current_date > $tache->date_fin || $current_date < $tache->date_debut) d-none  @endif" style="position:relative">
        <button class="badge badge-dark text-end px-3 py-2 shadow" data-toggle="modal" data-target="#exampleModal{{  $tache->id.$tache->user->id}}" style="right :1rem">{{$tache->user->name." ".$tache->user->prenom}}</button>
        <h5 class="font-bold"> {{$tache->titre}} </h5>
        <h6 class="text-secondary">{{$tache->description}}</h6>
        <h6 class="text-secondary"> Date début :  <span class="font-bold">{{$tache->date_debut}}</span>
        Date fin :  <span class="font-bold">{{$tache->date_fin}}</span> </h6>
        <div class="d-flex justify-content-between align-items-end py-1">
            <div>
                <small>Publié le {{$tache->created_at}}</small>
            </div>
            <div>
                <a class="btn btn-primary mr-2 text-white" href="{{ route('tache.update',['id'=>$tache->id])}}">Commenter</a>
                <form action="{{ route('tache.delete')}}" method="post" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="id" value="{{ $tache->id}}">
                    <input type="submit" class="btn btn-danger text-white" value="Supprimer">
                </form>
                <!-- <a class="btn btn-danger text-white">supprimer</a> -->
            </div>
        </div>
        </div>
        <!-- Modal -->
            <div class="modal fade" id="exampleModal{{  $tache->id.$tache->user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{  $tache->id.$tache->user->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{$tache->user->name." ".$tache->user->prenom}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <b>{{$tache->user->username}}</b>
                <br>
                {{$tache->user->email}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                </div>
            </div>
            </div>
         <!-- Modal -->
        @endforeach
        @endif
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    @if($taches->count() > 0)
        @foreach($taches as $tache)
        <div class="bg-light p-3 mb-3 @if($current_date >= $tache->date_debut && $current_date <= $tache->date_fin || $current_date > $tache->date_fin) d-none  @endif" style="position:relative">
        <span class="badge badge-dark text-end px-3 py-2 shadow" data-toggle="modal" data-target="#exampleModal{{  $tache->id.$tache->user->id}}" style="right :1rem">{{$tache->user->name." ".$tache->user->prenom}}</span>
        <h5 class="font-bold"> {{$tache->titre}} </h5>
        <h6 class="text-secondary">{{$tache->description}}</h6>
        <h6 class="text-secondary"> Date début :  <span class="font-bold">{{$tache->date_debut}}</span>
        Date fin :  <span class="font-bold">{{$tache->date_fin}}</span> </h6>
        <div class="d-flex justify-content-between align-items-end py-1">
            <div>
                <small>Publié le {{$tache->created_at}}</small>
            </div>
            <div>
                <a class="btn btn-primary mr-2 text-white" href="{{ route('tache.update',['id'=>$tache->id])}}">Commenter</a>
                <form action="{{ route('tache.delete')}}" method="post" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="id" value="{{ $tache->id}}">
                    <input type="submit" class="btn btn-danger text-white" value="Supprimer">
                </form>
                <!-- <a class="btn btn-danger text-white">supprimer</a> -->
            </div>
        </div>
        </div>
      

         <!-- Modal -->
         <div class="modal fade" id="exampleModal{{  $tache->id.$tache->user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{  $tache->id.$tache->user->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{$tache->user->name." ".$tache->user->prenom}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <b>{{$tache->user->username}}</b>
                <br>
                {{$tache->user->email}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                </div>
            </div>
            </div>
        <!-- Modal -->

        @endforeach
        @endif
    </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
       <!-- =================================================================================================================== -->

       @if($taches->count() > 0)
        @foreach($taches as $tache)
        <div class="bg-light p-3 mb-3 @if($current_date >= $tache->date_debut && $current_date <= $tache->date_fin || $current_date < $tache->date_debut) d-none  @endif" style="position:relative">
        <span class="badge badge-dark text-end px-3 py-2 shadow" data-toggle="modal" data-target="#exampleModal{{  $tache->id.$tache->user->id}}" >{{$tache->user->name." ".$tache->user->prenom}}</span>
        <h5 class="font-bold"> {{$tache->titre}} </h5>
        <h6 class="text-secondary">{{$tache->description}}</h6>
        <h6 class="text-secondary"> Date début :  <span class="font-bold">{{$tache->date_debut}}</span>
        Date fin :  <span class="font-bold">{{$tache->date_fin}}</span> </h6>
        <div class="d-flex justify-content-between align-items-end py-1">
            <div>
                <small>Publié le {{$tache->created_at}}</small>
            </div>
            <div>
                <a class="btn btn-primary mr-2 text-white" href="{{ route('tache.update',['id'=>$tache->id])}}">Commenter</a>
                <form action="{{ route('tache.delete')}}" method="post" class="d-inline-block">
                    @csrf
                    <input type="hidden" name="id" value="{{ $tache->id}}">
                    <input type="submit" class="btn btn-danger text-white" value="Supprimer">
                </form>
                <!-- <a class="btn btn-danger text-white">supprimer</a> -->
            </div>
        </div>
        </div>
       

         <!-- Modal -->
         <div class="modal fade" id="exampleModal{{  $tache->id.$tache->user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{  $tache->id.$tache->user->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> {{$tache->user->name." ".$tache->user->prenom}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <b>{{$tache->user->username}}</b>
                <br>
                {{$tache->user->email}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                </div>
            </div>
            </div>
             <!-- Modal -->
        @endforeach
        @endif
  </div>
  </div>


</div>

@endsection