@extends('layouts.app')

@section('content')

<h1 class="text-center">Liste des alternants</h1>
<h2 class="text-center">Formation {{ $sections->first()->class_name }}</h2>

<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">Formation</th>
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
                <td>{{ $student->section->class_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->enterprises->count() }}</td>
            </tr>
        @endforeach
        
    </tbody>
    </table>

@endsection