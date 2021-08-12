@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="title-h1">Dernières offres d'alternance</h1>
</div>
<div class="container d-flex mt-4">
    <div class="col-12 row m-2">     
        @if($posts->count()>0)
                        @foreach($posts as $post)
        <div class="card p-1 m-1 col-4 " style="width: 24%; justify-content: center;">
            <div class="card-body">
                <p class="card-text p-0 m-1">
                    <small class="text-muted">{{  $post->date_create }}</small>
                </p>
                <h5 class="card-title">{{  $post->name }}</h5>
                <p>{{  $post->content }}</p>
                
            </div>
            <div class="card-footer text-muted">                    
                    <div class="container text-end">
                        <button class="buttons button_general" data-bs-toggle="modal" data-bs-target="#modalReadPost-{{ $post->id }}" ><i class="fas fa-eye"></i></button>
                        <button class="buttons button_save d-none"><i class="far fa-thumbs-up"></i></button>
                    </div>
                </div>
        </div> 
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
                                            <p class="fs-3 " id="ModalLabel" > {{$post->section->class_name}}</p>
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
@endsection
