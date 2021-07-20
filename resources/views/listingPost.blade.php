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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Nouvelle offre d'alternance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First name"
                                    aria-label="First name">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First name"
                                    aria-label="First name">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
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
            @foreach ($listingPost as $listingPost)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$listingPost->name}}</td>
                    <td>{{$listingPost->name_company}}</td>
                    <td>{{$listingPost->domaine}}</td>
                    <td>{{$listingPost->contact}}</td>
                    <td>{{$listingPost->content}}</td>
                    <td class="d-flex justify-content-evenly">
                        <button type="button" class="btn btn-warning btn-sm">M</button>
                        <button type="button" class="btn btn-danger btn-sm">X</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @endsection
