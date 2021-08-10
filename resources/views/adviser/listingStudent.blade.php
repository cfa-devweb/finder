@extends('layouts.app')

@section('content')

<h1 class="title-h1">Liste des alternants de la formation {{ $sections->first()->class_name }}</h1>
<div class="container text-end p-2">
    @include('adviser.createStudentAccount')
</div>
<table class="table">
    <thead>
        <tr class="text-center">
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Recherche effectuée</th>
            <th scope="col">Entreprise trouvée</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr class="text-center">
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->user->email }}</td>
                <td>{{ $student->enterprises->count() }}</td>
                <!-- Récupére la variable student et prend le modéle 
                student utilise la methode followUps() et utilise la 
                donné recue soue forme d'un tableau le premier nom_contact  
                -->
                <td>{{ $student->followUps->whereNotNull('nom_contact')->first()->nom_contact}}</td>
                <td>
                    <a href="{{ route('dashboard-formation-suivi', $student->id)}}">
                        <button type="button" class="buttons button_infos">
                            <i class="fas fa-eye"></i>
                        </button>                    
                    </a>
                        <button type="button" class="buttons button_trash">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
