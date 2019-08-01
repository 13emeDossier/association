@extends('layouts.app')
@section('title') Nouvel email @endsection

@section('content')
    <p>
        <div>
            <a href="{{route('adherents.index')}}">Retour liste des adherent</a>
        </div>
        <span>Adherent : {{$adherent->firstname}} {{$adherent->name}}</span>
        <form id="adherent_mail_create_form" action="{{route('adherents.mails.store')}}" method="post" >
            @csrf
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
            <input name="adherent_id" type="hidden" value="{{$adherent->id}}">
            <label>Mail</label><input name="email"><br>
            <label>Usage</label><input name="usage"><br>
           
            <input value="Enregistrer" type="submit">       
        </form>
    </p>
@stop
