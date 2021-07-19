@extends('layouts.app')
@section('content')
@include('partials.navbar')
<div class="container pt-1 pb-4">
    <div class="col-12 text-center m-auto row align-items-center border d-flex " style="height: 50px;">
    <div class="col-4"></div>
    <div class="col-4">
    <button type="button" class="btn btn-primary m-auto">Crée un alternant</button></div>
    <div class="col-4"></div>
    </div>
</div>
<div class="container">
    <div class="col-12 d-flex p-3">
        <div class="col-8">            
            <h4 class="text-uppercase text-center">recherche de toutes les formations</h4>
        </div>
        <div class="col-4">
            <button type="button" class="btn btn-outline-primary">Ajouter une formation</button>
        </div>
    </div>
    <div class="container d-flex">
        <div class="col-2"></div>
            <div class="col-8">                
                <table class="table table-bordered w-100 " >
                    <thead class="bg-giep text-white w-100 ">
                        <tr class=" d-lg-table-row text-dark">
                            <th>#Index</th>

                            <th>Formation</th>
                            <th>Nombre d'apprenant</th>
                            <th>Nombre à avoir trouvé</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($Sections->count()>0)
                        @foreach($Sections as $Section)
                        <tr>
                            <td scope="row">{{$loop->index + 1 }}</td>
                            <td class="text-capitalize">{{$Section->class_name }} </td>
                            <td class="text-capitalize">{{$Section->students->count() }}</td>
                            <td>{{$Section->students->where('followUps->status','oui')->count() }}</td>
                            <td>
                                <a href="{{ route('dashboard-formation', $Section->id)}}">
                                    <button type="button" class="btn btn-primary">Voir</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9" class="table-active text-center">Aucunes Formation disponible </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        <div class="col-2"></div>
    </div>
            </div>
@endsection