@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row">

        <div class="col">
            <h1 class="title-h1"> Offres d'alternance</h1>
        </div>

        <div>
            <div class="col d-md-flex justify-content-md-end mt-3">
                <button class="buttons button_general" data-bs-toggle="modal" data-bs-target="#modalPost">
                    Ajouter une nouvelle offre d'alternance
                </button>
            </div>
        </div>


        <!-- Modal add offer -->

        <div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('post')}}" method="post">
                    @csrf
                    <div class="modal-content">
                        <input type="hidden" id="date_create" name="date_create" value="2021-08-10">
                        <div class="modal-header">
                            <h5 class="modal-title mx-auto fs-3 fw-bold " id="ModalLabel"> Nouvelle offre d'alternance
                            </h5>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Intitulé</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Contact</label>
                                    <input type="email" class="form-control" id="contact" name="contact">
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name_company" class="form-label">Entreprise</label>
                                    <input type="text" class="form-control" id="name_company" name="name_company">
                                </div>

                                <div class="col-md-6">
                                    <label for="domaine" class="form-label">Formation concernée</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Choisir une formation</option>
                                        <option value="1">...</option>
                                    </select>
                                    {{-- <input type="text" class="form-control" id="domaine"
                                        name="domaine"> --}}
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="modal-title" id="exampleModalLabel"> Description du poste : </h5>
                                <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-around">
                            <button type="button" class="buttons button_cancel" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="buttons button_save">Valider</button>
                        </div>
                    </div>
                    <div>
                        <input type="hidden" value="1" name="adviser_id">
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div>
        <table class="table table-striped my-3">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Intitulé</th>
                    <th scope="col">Entreprises</th>
                    <th scope="col">Domaine</th>
                    <th scope="col">Contacts</th>
                    <th scope="col">Description de l'offre</th>
                    <th class="text-center" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($Posts as $key)

                <tr>
                    <th scope="row">{{$key->id}}</th>
                    <td>{{$key->name}}</td>
                    <td>{{$key->name_company}}</td>
                    <td>{{$key->domaine}}</td>
                    <td>{{$key->contact}}</td>
                    <td>{{$key->content}}</td>
                    <td class="d-flex justify-content-evenly">

                        <button type="button" class="buttons button_infos btn-sm">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="buttons button_edit btn-sm">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="buttons button_trash delete" type="button" data-bs-toggle="modal"
                            data-bs-target="#deletPostModal-{{ $key->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                    <!-- Modal delet one post -->
                    <form action="{{ route('listingPosts.delete', $key->id) }}" method="post">
                        <div class="modal fade" id="deletPostModal-{{ $key->id }}" tabindex="-1"
                            aria-labelledby="deletPostModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        @csrf
                                        <h5 class="modal-title " id="deletPostModalLabel">Confirmation de la suppression
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sûr de vouloir supprimer cette offre ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="buttons button_cancel"
                                            data-bs-dismiss="modal">Annuler</button>

                                        @method('DELETE')
                                        <button type="submit" class="buttons button_trash">Suprimer</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
