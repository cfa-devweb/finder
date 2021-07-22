@extends('layouts.app')

@section('content')

<h1 class="title-h1">Liste des alternants de la formation {{ $sections->first()->class_name }}</h1>

<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Recherche effectuée</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            
            <tr class="text-center">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->user->email }}</td>
                <td>{{ $student->enterprises->count() }}</td>
            </tr>
        @endforeach
        
    </tbody>
    </table>

@endsection