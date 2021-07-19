@extends('layouts.app')

@section('content')

<div class="row my-1 py-2 bg-secondary border rounded">
    <div class="col d-flex justify-content-end">
        <button class="btn btn-light">Ajouter une prise de contact</button>
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
