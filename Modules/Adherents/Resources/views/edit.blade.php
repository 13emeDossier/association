@extends('layouts.app')
@section('title') Nouvel adherent @endsection

@section('content')
    <p>
        <div>
            <a href="{{route('adherents')}}">Retour liste des adherent</a>
        </div>
        <form id="adherent_create_form" action="{{route('adherentsUpdate',['id'=>$adherent->id])}}" method="post" >
            @csrf
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
            <input name="id" type="hidden" value="{{$adherent->id}}">
            <label>Nom</label><input name="name" value="{{$adherent->name}}"><br>
            <label>Prenom</label><input name="firstname" value="{{$adherent->firstname}}"><br>
            <label>Telephone Fixe</label><input name="phone_number" value="{{$adherent->phone_number}}"><br>
            <label>Telephone Mobile</label><input name="mobile_number" value="{{$adherent->mobile_number}}"><br>
            <label>Numero de rue</label><input name="street_number" value="{{$adherent->street_number}}"><br>
            <label>Nom de rue</label><input name="street" value="{{$adherent->street}}"><br>
            <label>Code postal</label><input name="zip" value="{{$adherent->zip}}"><br>
            <label>Ville</label><input name="city" value="{{$adherent->city}}"><br>
            <input value="Enregistrer" type="submit">       
        </form>
    </p>
@stop
