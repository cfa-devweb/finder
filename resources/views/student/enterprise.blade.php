@extends('layouts.app')

@section('content')


<!-- Form to insert a company in the database -->
<h1 class="title-h1">Mon suivi d'entreprise</h1>

<div class="enterprise_btn-addcompany">
    <button class="buttons button_general" data-bs-toggle="modal" data-bs-target="#add-company_modal">
        Ajouter une entreprise
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="add-company_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('enterprises.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title mx-auto fs-3 fw-bold">Ajouter une entreprise</h5>
                </div>
                <div class="modal-body m-3">
                    <div class="mb-3">
                        <label for="name_company" class="form-label">Nom de l'entreprise</label>
                        <input type="text" class="form-control" name="name_company" maxlength="30">
                    </div>
                    <div class="mb-3">
                        <label for="name_contact" class="form-label">Nom du contact</label>
                        <input type="text" class="form-control" name="name_contact" maxlength="30">
                    </div>
                    <div class="mb-3">
                        <label for="email_contact" class="form-label">E-mail du contact</label>
                        <input type="email" class="form-control" name="email_contact">
                    </div>
                    <div class="mb-3">
                        <label for="phone_contact" class="form-label">Numéro de téléphone du contact</label>
                        <input type="tel" class="form-control" name="phone_contact" maxlength="6">
                    </div>
                    <div>
                        <input type="hidden" value="1" name="student_id">
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
            <th scope="col">Nom du contact</th>
            <th scope="col">E-mail du contact</th>
            <th scope="col">Téléphone du contact</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($enterprises as $enterprise)
        <tr>
            <td>{{ $enterprise->name_company }}</td>
            <td>{{ $enterprise->name_contact }}</td>
            <td>{{ $enterprise->email_contact }}</td>
            <td>{{ $enterprise->phone_contact }}</td>
            <td>
                <a class="buttons button_infos" href="/enterprise/{{$enterprise->id}}/follow-up"><i class="fas fa-eye"></i></a>
            </td>
            <td>
                <button class="buttons button_edit" data-bs-toggle="modal" data-bs-target="#edit-company_modal-{{$enterprise->id}}">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </td>
            <td>
                <form action="{{route('enterprises.destroy', $enterprise->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="buttons button_trash" type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="edit-company_modal-{{$enterprise->id}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('enterprises.update', $enterprise->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-header">
                            <h5 class="modal-title mx-auto fs-3 fw-bold" id="exampleModalLabel">Modifier les informations de l'entreprise</h5>
                        </div>
                        <div class="modal-body m-3">
                            <div class="mb-3">
                                <label for="name_company" class="form-label">Nom de l'entreprise</label>
                                <input type="text" class="form-control" name="name_company" maxlength="30" value="{{ $enterprise->name_company }}">
                            </div>
                            <div class="mb-3">
                                <label for="name_contact" class="form-label">Nom du contact</label>
                                <input type="text" class="form-control" name="name_contact" maxlength="30" value="{{ $enterprise->name_contact }}">
                            </div>
                            <div class="mb-3">
                                <label for="email_contact" class="form-label">E-mail du contact</label>
                                <input type="email" class="form-control" name="email_contact" value="{{ $enterprise->email_contact }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone_contact" class="form-label">Numéro de téléphone du contact</label>
                                <input type="tel" class="form-control" name="phone_contact" maxlength="6" value="{{ $enterprise->phone_contact }}">
                            </div>
                            <div>
                                <input type="hidden" value="1" name="student_id">
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
        @endforeach
    </tbody>
</table>




@endsection