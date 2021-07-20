@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row">
        <div class="col">
            <h2> Offres d'alternance</h2>
        </div>
        <div class="col">
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
                                        id="entitled" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Contact" aria-label="Contact"
                                        id="contact" required>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Entreprise"
                                        aria-label="Entreprise" id="company" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Domaine" aria-label="Domaine"
                                        id="domaine" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5 class="modal-title" id="exampleModalLabel"> Description du poste : </h5>
                                <textarea class="form-control" rows="5" id="content" required></textarea>
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

    @endsection
