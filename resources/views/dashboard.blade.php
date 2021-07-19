@extends('layouts.app')
@section('content')
@include('partials.navbar')
<div class="container">
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
                        <td class="text-capitalize">{{$Section->student->count() }}</td>
                        <td>{{$Section->job->name }}</td>
                        <td><button type="button" class="btn btn-primary">Voir</button></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="9" class="table-active text-center">Aucunes Classe </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            </div>
@endsection