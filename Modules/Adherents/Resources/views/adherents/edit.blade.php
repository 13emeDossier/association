@extends('layouts.app')
@section('title') Editer adherent @endsection

@section('content')
    <p>
        <div>
            <a href="{{route('adherents.index')}}">Retour liste des adherent</a>
        </div>
        
        {{ html()->modelForm($adherent,'PUT',route('adherents.update',['adherent'=>$adherent->id]))->open() }}
            {{ html()->div()->class('form-elem')->open() }}
                {{ html()->label('name','name') }} 
                {{ html()->text('name') }} 
            {{ html()->div()->close() }}
            {{ html()->div()->class('form-elem')->open() }}
                {{ html()->label('name','firstname') }} 
                {{ html()->text('firstname') }}
            {{ html()->div()->close() }}
            {{ html()->div()->class('form-elem')->open() }}   
                {{ html()->label('name','street_number') }} 
                {{ html()->text('street_number') }}
            {{ html()->div()->close() }}
            {{ html()->div()->class('form-elem')->open() }}
                {{ html()->label('name','street') }} 
                {{ html()->text('street') }}
            {{ html()->div()->close() }}
            {{ html()->div()->class('form-elem')->open() }}
                {{ html()->label('name','zip') }} 
                {{ html()->text('zip') }}
            {{ html()->div()->close() }}
            {{ html()->div()->class('form-elem')->open() }}
                {{ html()->label('name','city') }} 
                {{ html()->text('city') }}
            {{ html()->div()->close() }}
            {{ html()->div()->class('form-elem')->open() }} 
                {{ html()->label('name','phone_number') }} 
                {{ html()->text('phone_number') }}
            {{ html()->div()->close() }}
            {{ html()->div()->class('form-elem')->open() }} 
                {{ html()->label('name','mobile_number') }} 
                {{ html()->text('mobile_number') }}
            {{ html()->div()->close() }}
            {{ html()->div()->class('form-submit') }} 
                {{ html()->input('submit','submit','Enregistrer') }}
            {{ html()->div()->close() }}
            
        {{ html()->closeModelForm() }}   
        <table>
            <thead>
                <tr><th>Usage</th><th>Email</th><th>Actions</th></tr>
            </thead>
            <tbody>
            @foreach ($adherent->adherentsMails as $mail)
                <tr><td>{{$mail->email}}</td><td>{{$mail->usage}}</td><td><a href="{{route('adherents.mails.edit',['mail'=>$mail])}}">Editer</a><a href="{{route('adherents.mails.destroy',['mail'=>$mail])}}">Archiver</a></td></tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('adherents.mails.create',['adherent'=>$adherent])}}">Nouvel email</a>
    </p>
@stop
