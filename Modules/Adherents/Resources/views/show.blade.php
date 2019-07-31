@extends('layouts.app')
@section('title') Fiche Adherent @endsection

@section('content')
    <p>
        <div>
            <a href="{{route('adherents')}}">Retour liste des adherent</a>
        </div>
        <div>
            <span>Nom : </span><span>{{$adherent->name}}</span><br>
            <span>Prenom : </span><span>{{$adherent->firstname}}</span><br>
            <span>Telephone Fixe : </span><span>{{$adherent->phone_number}}</span><br>
            <span>Telephone Mobile : </span><span>{{$adherent->mobile_number}}</span><br>
            <span>Numero de rue : </span><span>{{$adherent->street_number}}</span><br>
            <span>Nom de rue : </span><span>{{$adherent->street}}</span><br>
            <span>Code postal : </span><span>{{$adherent->zip}}</span><br>
            <span>Ville : </span><span>{{$adherent->city}}</span><br>     
        </div>
        <div>
            <a href="{{route('adherentEdit')}}">Editer adherent</a>
        </div>
    </p>
@stop
