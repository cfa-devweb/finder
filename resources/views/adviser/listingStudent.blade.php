@extends('layouts.app')

@extends('partials.navbar')

@section('content')

<h1 class="text-center">Liste des alternants</h1>
<h2 class="text-center">Formation (nom de la formation)</h2>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Formation</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Recherche effectuée</th>
            <th scope="col">Entreprise trouvé</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td></td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->email }}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        
    </tbody>
    </table>

@endsection