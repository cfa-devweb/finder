@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row">

        <div class="col d-flex justify-content-between">
            <h2 class="fw-bold"> Offres d'alternance</h2>

            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                AJOUTER
            </button>
        </div>

        <!-- Modal add offer -->
        <form action="" method="POST">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Nouvelle offre d'alternance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Intitulé" aria-label="Intitulé"
                                        id="entitled" name="entitled">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Contact" aria-label="Contact"
                                        id="contact" name="contact">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Entreprise"
                                        aria-label="Entreprise" id="company" name="company">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Domaine" aria-label="Domaine"
                                        id="domaine" name="domaine">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="modal-title" id="exampleModalLabel"> Description du poste : </h5>
                                <textarea class="form-control" rows="5" id="content" name="content"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger"
                                data-bs-dismiss="modal">ANNULER</button>
                            <button type="submit" class="btn btn-outline-success">VALIDER</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                        <button type="button" class="btn btn-warning btn-sm">M</button>
                        <button class="btn btn-danger" type="submit" data-bs-toggle="modal" data-bs-target="#deletPostModal">x</button>
                        <form action="{{ route('listingPosts.delete', $key->id)}}" method="post">
                            <!-- Modal delet one post -->
                            <div class="modal fade" id="deletPostModal" tabindex="-1" aria-labelledby="deletPostModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    @csrf
                                    @method('DELETE')
                                        <h5 class="modal-title" id="deletPostModalLabel">Supprimer l'offre</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Être vous sur de vouloir supprimer l'offre ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Suprimer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                
             @endforeach
             
            </tbody>
        </table>
  </div>
</div>
    @endsection
