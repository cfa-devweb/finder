@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="title-h1">Dernières offres d'alternance</h1>
</div>
<div class="container d-flex mt-4">
    <div class="col-2"></div>
    <div class="col-8">        
        @if($posts->count()>0)
                        @foreach($posts as $post)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text p-0 m-1">
                    <small class="text-muted">{{  $post->date_create }}</small>
                </p>
                <h5 class="card-title">{{  $post->name }}</h5>
                <p>{{  $post->content }}</p>
                <div class="container text-end">
                    <button class="buttons button_general"><i class="fas fa-eye"></i></button>
                    <button class="buttons button_save"><i class="far fa-thumbs-up"></i></button>
                </div>
            </div>
        </div>        
        @endforeach
                        @else
                            <p>Aucunes Formation disponible </p>
                        @endif
    </div>
    <div class="col-2"></div>
</div>
@endsection
