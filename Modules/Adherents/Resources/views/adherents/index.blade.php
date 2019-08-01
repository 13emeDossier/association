@extends('layouts.app')
@section('title') Liste des adherents @endsection

@section('content')
    <p>
        @can('create', Modules\Adherents\Models\Adherent::class)
            <div>
                <a href="{{route('adherents.create')}}">Nouvel Adherent</a>
            </div>
        @endcan
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
                        @foreach($adherent->adherentsMails as $mail) 
                            {{ $mail->email }} ({{ $mail->usage }})<br>
                        @endforeach
                    </td>
                    <td>
                        @can('view', $adherent)
                            <a href="{{ route('adherents.show', ['adherent'=>$adherent]) }}">Details</a>
                        @endcan
                        @can('update', $adherent)
                            <a href="{{ route('adherents.edit',['adherent'=>$adherent]) }}">Editer</a>
                        @endcan
                        @can('delete', $adherent)
                            <a href="{{ route('adherents.destroy', ['adherent'=>$adherent]) }}">Archiver</a>
                        @endcan
                    </td>
                </tr>
            @endForeach
            </tbody>
        </table>
    </p>
@stop
