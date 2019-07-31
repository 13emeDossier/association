@extends('layouts.app')
@section('title') Nouvel adherent @endsection

@section('content')
    <p>
        <div>
            <a href="{{route('adherents')}}">Retour liste des adherent</a>
        </div>
        <form id="adherent_create_form" action="{{route('adherentsStore')}}" method="post" >
            @csrf
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
            <label>Nom</label><input name="name"><br>
            <label>Prenom</label><input name="firstname"><br>
            <label>Telephone Fixe</label><input name="phone_number"><br>
            <label>Telephone Mobile</label><input name="mobile_number"><br>
            <label>Numero de rue</label><input name="street_number"><br>
            <label>Nom de rue</label><input name="street"><br>
            <label>Code postal</label><input name="zip"><br>
            <label>Ville</label><input name="city"><br>
            <input value="Enregistrer" type="submit">       
        </form>
    </p>
@stop
