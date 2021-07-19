@extends('layouts.app')

@section('content')

<div class="row my-1 py-2 bg-secondary border rounded">
    <div class="col d-flex justify-content-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajouter une prise de contact
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Formulaire d'édition de suivi
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary text-white">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- List of companies -->
<table class="table table-bordered text-center">

    <thead class="bg-dark text-white">
    <tr>
        <th scope="col">Actions</th>
        <th scope="col">Date</th>
        <th scope="col">Commentaires</th>
        <th scope="col">Réponses</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($followUp as $key)
    <tr>
        <td>{{ $key->mode_contact }}</td>
        <td>{{ $key->date }}</td>
        <td>{{ $key->comment }}</td>
        <td>{{ $key->status }}</td>
        <td>
            <button class="btn btn-outline-primary">Modifier</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection
