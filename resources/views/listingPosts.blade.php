@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-between">
            <h2 class="fw-bold"> Offres d'alternance</h2>
            <button type="button" class="buttons button_general" data-bs-toggle="modal" data-bs-target="#modalPost">
                Ajouter une offre d'alternance
            </button>
        </div>
        <!-- Modal add offer -->
        <div class="modal fade" id="modalPost" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('post')}}" method="post">
                    @csrf
                    <div class="modal-content">
                        <input type="hidden" id="date_create" name="date_create" value="2021-08-10">
                        <div class="modal-header">
                            <h5 class="modal-title mx-auto fs-3 fw-bold " id="ModalLabel"> Nouvelle offre d'alternance </h5>
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
                                    <label for="section" class="form-label">Formation concernée</label>
                                    <select class="form-select" aria-label="Default select example" name="concerned">
                                        <option selected>Choisir une formation</option>
                                        @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->class_name }}</option>
                                        @endforeach
                                    </select>
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
                    <th scope="col">Intitulé</th>
                    <th scope="col">Entreprises</th>
                    <th scope="col">Formation concernée</th>
                    <th scope="col">Contacts</th>
                    <th scope="col">Description de l'offre</th>
                    <th class="text-center" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Posts as $post)
                <tr>
                    <td>{{$post->name}}</td>
                    <td>{{$post->name_company}}</td>
                    <td value='{{$post->concerned}}'>{{$post->section->class_name}}</td>
                    <td>{{$post->contact}}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{$post->content}}</td>
                    <td class="d-flex justify-content-evenly">
                        <button type="button" class="buttons button_infos btn-sm" data-bs-toggle="modal" data-bs-target="#modalReadPost-{{ $post->id }}">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="buttons button_edit btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdatePost-{{ $post->id }}">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <button class="buttons button_trash delete" type="button" data-bs-toggle="modal" data-bs-target="#deletPostModal-{{ $post->id }}">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>

                    <!-- Modal delete one post -->
                    <div class="modal fade" id="deletPostModal-{{ $post->id }}" tabindex="-1" aria-labelledby="deletPostModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('listingPosts.delete', $post->id) }}" method="POST">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        @csrf
                                        <h5 class="modal-title " id="deletPostModalLabel">Confirmation de la suppression </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sûr de vouloir supprimer cette offre ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="buttons button_cancel" data-bs-dismiss="modal">Annuler</button>
                                        @method('DELETE')
                                        <button type="submit" class="buttons button_trash">Suprimer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Modal read one post -->
                    <div class="modal fade" id="modalReadPost-{{ $post->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            @csrf
                            <div class="modal-content">
                                <input type="hidden" id="date_create" name="date_create" value="2021-08-10">
                                <div class="modal-header">
                                    <h5 class="modal-title fs-3 fw-bold" id="ModalLabel"> {{$post->name}}</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <h6 class="modal-body fs-3" id="ModalLabel"> {{$post->name_company}}</h6>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6 ">
                                            <p class="fs-3 " id="ModalLabel"> {{$post->contact}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="fs-3 " id="ModalLabel" value="{{ $section->id }}"> {{$post->section->class_name}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p id="ModalLabel"> {{$post->content}}</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="buttons button_cancel" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                            <div>
                                <input type="hidden" value="1" name="adviser_id">
                            </div>
                        </div>
                    </div>

                    <!-- Modal update one post -->
                    <div class="modal fade" id="modalUpdatePost-{{ $post->id }}" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('update', $post->id)}}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <input type="hidden" id="date_create" name="date_create" value="2021-08-10">
                                    <div class="modal-header">
                                        <h5 class="modal-title mx-auto fs-3 fw-bold" id="ModalLabel"> Modifification offre d'alternance</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Intitulé</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{$post->name}}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Contact</label>
                                                <input type="text" class="form-control" id="contact" name="contact" value="{{$post->contact}}">
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="name_company" class="form-label">Entreprise</label>
                                                <input type="text" class="form-control" value="{{$post->name_company}}" id="name_company" name="name_company">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="section" class="form-label">Formation concernée</label>
                                                <select class="form-select" aria-label="Default select example" name="concerned">
                                                    <option selected value="{{ $section->id }}"> {{ $section->class_name }}</option>
                                                    @foreach($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->class_name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <h5 class="modal-title" id="exampleModalLabel"> Description du poste : </h5>
                                                <textarea class="form-control" rows="5" id="content" name="content">{{$post->content}}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-around">
                                            <button type="button" class="buttons button_cancel" data-bs-dismiss="modal">ANNULER</button>
                                            <button type="submit" class="buttons button_save">VALIDER</button>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" value="1" name="adviser_id">
                                    </div>
                            </form>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
