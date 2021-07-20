@extends('layouts.app')

@extends('partials.navbar')

@section('content')

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
    data-bs-whatever="@fat">Créer un alternant</button>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORMULAIRE AJOUT D'UN ALTERNANT</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addStudentModal" method="post">
                    @csrf
                    <input type="hidden" id="gender" name="gender" value="homme">
                    <input type="hidden" id="date_of_birth" name="date_of_birth" value="1999-07-24">
                    <input type="hidden" id="city" name="city" value="noumea">
                    <input type="hidden" id="phone" name="phone" value="123456">
                    <input type="hidden" id="password" name="password" value="256mj4h9k8i">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="col-form-label">Prénom:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="col-form-label">Nom:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="margin-top:35px;">
                                <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>

                    <div>
                        <input type="hidden" value="1" name="section_id">
                    </div>

                    <?php var_dump($_POST); ?>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
