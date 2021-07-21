@extends('layouts.app')

@section('content')

<div class="row my-1 py-2 bg-secondary border rounded">
    <div class="col d-flex justify-content-end">
        <!-- Button show modal to create follow-up -->
        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#createModal">
            Ajouter une prise de contact
        </button>
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
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal">Modifier</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('create-followup') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title mx-auto fs-3 fw-bold" id="exampleModalLabel">Ajout prise de contact</h5>
                </div>
                <div class="modal-body m-3">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <label for="modeContact" class="form-label">Méthode de contact :</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="mode_contact" placeholder="Mail, téléphone, entretien,..." required/>
                        </div>
                    </div>
                    <div class="row align-items-center my-3">
                        <div class="col-auto">
                            <label for="dateContact" class="form-label">Date de la prise de contact :</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" name="date" required/>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <label for="status" class="form-label">Réponse de l'entreprise :</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="status" placeholder="En attente, Refus, Accepté,..." required/>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="comment" class="form-label">Commentaire :</label>
                        <textarea type="text" class="form-control" name="comment" placeholder="Commentaire" rows="4"></textarea>
                    </div>
                    <input type="hidden" name="prospect_id" value="{{ $prospectId }}" />
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary text-white me-4">Valider</button>
                    <button type="button" class="btn btn-danger text-white ms-4" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('edit-followup') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title mx-auto fs-3 fw-bold" id="exampleModalLabel">Ajout prise de contact</h5>
                </div>
                <div class="modal-body m-3">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <label for="modeContact" class="form-label">Méthode de contact :</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="mode_contact" name="mode_contact" placeholder="Mail, téléphone, entretien,..." required/>
                        </div>
                    </div>
                    <div class="row align-items-center my-3">
                        <div class="col-auto">
                            <label for="dateContact" class="form-label">Date de la prise de contact :</label>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="date" name="date" required/>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <label for="status" class="form-label">Réponse de l'entreprise :</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="status" name="status" placeholder="En attente, Refus, Accepté,..." required/>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="comment" class="form-label">Commentaire :</label>
                        <textarea type="text" class="form-control" id="comment" name="comment" placeholder="Commentaire" rows="4"></textarea>
                    </div>
                    <input type="hidden" id="prospect_id" name="prospect_id" value="{{ $prospectId }}" />
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary text-white me-4">Valider</button>
                    <button type="button" class="btn btn-danger text-white ms-4" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
