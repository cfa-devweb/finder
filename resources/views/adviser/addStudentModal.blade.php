@extends('layouts.app')

@extends('partials.navbar')

@section('content')

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
    data-bs-whatever="@fat">+ Créer un alternant</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORMULAIRE AJOUT D'UN ALTERNANT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="create" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="mb-3">
                        <label for="first_name" class="col-form-label">Prénom:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" require>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="col-form-label">Nom:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" require>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" require>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Téléphone:</label>
                        <input type="number" class="form-control" id="phone" name="phone" require>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>
    </div>
</div>


@endsection

