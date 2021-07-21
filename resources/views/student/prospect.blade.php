@extends('layouts.app')

@section('content')


<!-- Form to insert a company in the database -->
<h1 class="title-h1">Mon suivi d'entreprise</h1>

<div class="prospect_btn-addcompany">
    <button class="buttons button_general" data-bs-toggle="modal" data-bs-target="#add-company_modal">
        Ajouter une entreprise
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="add-company_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('prospects.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title mx-auto fs-3 fw-bold">Modifier les informations de l'entreprise</h5>
                </div>
                <div class="modal-body m-3">
                    <div class="mb-3">
                        <label for="company-name" class="form-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control" name="company_name" maxlength="30">
                    </div>
                    <div class="mb-3">
                        <label for="company-mail" class="form-label">E-mail de l'entreprise</label>
                        <input type="email" class="form-control" name="email_contact">
                    </div>
                    <div class="mb-3">
                        <label for="company-phone" class="form-label">Numéro de téléphone de l'entreprise</label>
                        <input type="tel" class="form-control" name="phone_contact" maxlength="6">
                    </div>
                    <div>
                        <input type="hidden" value="1" name="student-id">
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="buttons button_cancel" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="buttons button_save">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- List of companies -->
<table class="table table-striped">

    <thead>
        <tr class="table-dark">
            <th scope="col">Nom de l'entreprise</th>
            <th scope="col">E-mail de l'entreprise</th>
            <th scope="col">Téléphone de l'entreprise</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($prospects as $prospect)
        <tr>
            <td>{{ $prospect->company_name }}</td>
            <td>{{ $prospect->email_contact }}</td>
            <td>{{ $prospect->phone_contact }}</td>
            <td><a class="buttons button_infos" href="/prospect/{{$prospect->id}}/follow-up"><i class="fas fa-eye"></i></a></td>
            <td>
                <button class="buttons button_edit" data-bs-toggle="modal" data-bs-target="#edit-company_modal">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </td>
            <td>
                <form action="{{route('prospects.destroy', $prospect->id)}}">
                    @csrf
                    <button class="buttons button_trash" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="edit-company_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('prospects.update', $prospect->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h5 class="modal-title mx-auto fs-3 fw-bold" id="exampleModalLabel">Modifier les informations de l'entreprise</h5>
                </div>
                <div class="modal-body m-3">
                    <div class="mb-3">
                        <label for="company-name" class="form-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control" value="{{ $prospect->company_name}}" name="company-name" maxlength="30">
                    </div>
                    <div class="mb-3">
                        <label for="company-mail" class="form-label">E-mail de l'entreprise</label>
                        <input type="email" class="form-control" value="{{ $prospect->email_contact}}" name="company-mail">
                    </div>
                    <div class="mb-3">
                        <label for="company-phone" class="form-label">Numéro de téléphone de l'entreprise</label>
                        <input type="tel" class="form-control" value="{{ $prospect->phone_contact}}" name="company-phone" maxlength="6">
                    </div>
                    <div class="mb-3">
                        <label for="contact-date" class="fotm-label">Date de la première prise de contacte avec l'entreprise</label>
                        <input type="date" value="{{ $prospect->date}}" name="contact-date">
                    </div>
                    <div>
                        <input type="hidden" value="1" name="student-id">
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="buttons button_cancel" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="buttons button_save">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection