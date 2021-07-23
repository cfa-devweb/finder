@extends('layouts.app')
@section('content')
<h1 class="title-h1"> {{$student->first()->section->class_name}}</h1>
<div class="container d-flex p-2">
    <div class="col-3">
        <p><strong class="text-capitalize">Nom: {{ $student->first()->last_name }} </strong></p>
        <p><strong class="text-capitalize">Prénom: {{ $student->first()->first_name }}</strong></p>
        <p><strong >Email: </strong>{{ $User->first()->email }} </p>
        <p><strong>Téléphone: </strong>{{ $User->first()->phone }}</p>
    </div>
    <div class="col-9"></div>
</div>
<table class="table table-bordered table-striped w-100">
    <thead class="text-center">
        <tr class="d-lg-table-row table-dark align-middle">
            <th scope="col">Entreprises</th>
            <th scope="col">Email</th>
            <th scope="col">Télèphone</th>
            <th scope="col">Actions</th>
            <th scope="col">Date</th>
            <th scope="col">Réponse</th>
        </tr>
    </thead>
    <tbody>
    @if($FollowUps->count()>0)
        @foreach($FollowUps as $FollowUp)    
        <tr class="text-center">    
            <td class="">{{$FollowUp->enterprise->name_company}}</td>
            <td class="">{{$FollowUp->enterprise->email_contact}}</td>
            <td class="">{{$FollowUp->enterprise->phone_contact}}</td>
            <td class="text-capitalize">{{$FollowUp->mode_contact}}</td>
            <td class="text-capitalize">{{$FollowUp->date}} </td>
            <td class="text-capitalize">{{$FollowUp->answer}}</td>
        </tr>
        @endforeach
    @else
        <tr>
            <td colspan="9" class="table-active text-center">Aucun suivi disponible</td>
        </tr>
    @endif
    </tbody>
</table>
@endsection
