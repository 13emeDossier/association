@extends('layouts.app')
@section('title') Liste des adherents @endsection

@section('content')
    <p>
        <div>
            <a href="{{route('adherentsCreate')}}">Nouvel Adherent</a>
        </div>
        <table id="adherent_list">
            <thead>
                <tr>
                    <th>Numero adhesion {{date('Y')}}</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone Fixe</th>
                    <th>Telephone Mobile</th>
                    <th>Adresse</th>
                    <th>Code postal</th>
                    <th>Ville</th>
                    <th>Emails</th>
                    <th>Fiche</th>
                </tr>
            </thead>
            <tbody>
            @foreach($adherentList as $adherent)
                <tr>
                    <td>{{ $adherent->adhesions()->where('year','=',date('Y'))->first()}}</td>
                    <td>{{ $adherent->name }}</td>
                    <td>{{ $adherent->firstname }}</td>
                    <td>{{ $adherent->phone_number }}</td>
                    <td>{{ $adherent->mobile_number }}</td>
                    <td>{{ $adherent->street_number }} {{ $adherent->street }}</td>
                    <td>{{ $adherent->zip }}</td>
                    <td>{{ $adherent->city }}</td>
                    <td>
                        @foreach($adherent->mails() as $mail) 
                            {{ $mail->email }} ({{ $mail->usage }})<br>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('adherentsShow', ['id'=>$adherent->id]) }}">Details</a>
                        <a href="{{ route('adherentsDestroy', ['id'=>$adherent->id]) }}">Archiver</a>
                    </td>
                </tr>
            @endForeach
            </tbody>
        </table>
    </p>
@stop
