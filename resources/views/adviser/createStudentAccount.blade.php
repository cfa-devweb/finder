@extends('layouts.app')
@section('content')

<button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#studentModal"
    data-bs-whatever="@fat">Ajouter un alternant</button>
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Formulaire d'ajout d'un alternant</h5>
            </div>
            <div class="modal-body">
                <form action="{{ url('createStudentAccount') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="col-form-label">Prénom</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="col-form-label">Nom</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="margin-top:35px;">
                                <select class="form-select" aria-label="Formation" name="section_id" id="section_id">
                                    <option value="">Formation</option>
                                    @foreach($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->class_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row mx-auto">
                            <div class="col-md-6">
                                <button type="button" class="buttons button_cancel"
                                    data-bs-dismiss="modal">Annuler</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="buttons button_save">Valider</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
