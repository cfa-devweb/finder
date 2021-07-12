@extends('layouts.app')

@section('content')

<!-- List of companies -->
<table class="table">

    <thead>
    <tr>
        <th scope="col">Commentaire</th>
        <th scope="col">XXx</th>
        <th scope="col">XXXXXXXX</th>
    </tr>
    </thead>
    <tbody>
    @foreach($followUp as $key)
    <tr>
        <td>{{ $key->comment }}</td>
        <td>{{ $key->date }}</td>
        <td>{{ $key->status }}</td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection
