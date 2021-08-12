@extends('layouts.app')
@section('content')
<style>
    .card-footer{
            box-shadow:none ;
            border-top: none;
    }
    .possi{
        justify-content: flex-end;
    }
</style>
<div class="container">
    <h1 class="title-h1">Dernières offres d'alternance</h1>
</div>
<div class="container">
<div class="album pt-5 pb-1 ">
    <div class="container">
        <div class="row">
            @if($posts->count()>0)
            @foreach($posts as $post)
            <div class="col-md-4 p-2" style="min-height: 50px;">
                <div class="card mb-4 box-shadow h-100">
                    <div class="card-body border border-2 border-bottom-0">
                        <p class="card-text">
                            <small class="text-muted">{{  $post->date_create }}</small>
                        </p>
                        <h5 class="card-title">{{  $post->name }}</h5>
                        <p>{{  $post->content }}</p>     
                    </div>                                       
                    <footer class="card-footer text-muted border border-2 border-top-0">
                            <div class="possi" >
                                <button class="buttons button_general" data-bs-toggle="modal"data-bs-target="#modalReadPost-{{ $post->id }}"><i class="fas fa-eye"></i></button>
                                <button class="buttons button_save d-none"><i class="far fa-thumbs-up"></i></button>
                            </div>
                        </footer>
                </div>
            </div>

            <div class="modal fade" id="modalReadPost-{{ $post->id }}" tabindex="-1" aria-labelledby="ModalLabel"
                aria-hidden="true">
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
                                    <p class="fs-3 " id="ModalLabel"> {{$post->section->class_name}}</p>
                                </div>
                                <div class="col-md-6">
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
            @endforeach

            {{ $posts->links()}}
            @else
            <p>Aucunes Formation disponible </p>
            @endif
        </div>
    </div>
</div>
</div>
@endsection
