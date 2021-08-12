@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="title-h1">Liste des alternants de la formation {{ $section->class_name }}</h1>
    <div class="d-flex justify-content-end my-2">
        @include('adviser.createStudentAccount', ['section' => $section])
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Prénom</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Recherche effectuée</th>
                    <th scope="col">Entreprise trouvée</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td>{{ $student->enterprises->count() }}</td>
                    <!-- Récupére la variable student et prend le modéle 
                student utilise la methode followUps() et utilise la 
                donné recue soue forme d'un tableau le premier nom_contact  
                -->
                <td>
                    <!-- waiting -->
                    @if($student->followUps->where('answer','sign')->count())
                        {{ $student->followUps->where('answer','sign')->first()->name_contact }}
                    @endif
                    Aucune entreprise trouvée
                </td>
                    <td>
                        <a class="buttons button_infos" href="{{ route('dashboard-formation-suivi', $student->id)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <button type="button" class="buttons button_trash">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>


@endsection