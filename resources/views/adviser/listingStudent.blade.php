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
                    <th class="text-center" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @if($students->count()>0)
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
                        @if($student->followUps->where('answer','sign')->count()>0)
                        {{ $student->followUps->where('answer','sign')->first()->name_contact }}
                        @else
                        Aucune entreprise trouvée.
                        @endif
                    </td>
                    <td class="d-flex justify-content-evenly">
                        <a class="buttons button_infos" href="{{ route('dashboard-formation-suivi', $student->user_id)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <button class="buttons button_trash delete" type="button" data-bs-toggle="modal" data-bs-target="#deletPostModal-{{ $student->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>



                     <!-- Modal delete one alternant -->
                     <div class="modal fade" id="deletPostModal-{{ $student->id }}" tabindex="-1" aria-labelledby="deletPostModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('listingAlternant.delete', $student->id) }}" method="POST">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        @csrf
                                        <h5 class="modal-title " id="deletPostModalLabel">Confirmation de la suppression </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sûr de vouloir supprimer cette alternant ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="buttons button_cancel" data-bs-dismiss="modal">Annuler</button>
                                        @method('DELETE')
                                        <button type="submit" class="buttons button_trash">Suprimer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="table-active text-center">Aucun alternant disponible</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

</div>


@endsection