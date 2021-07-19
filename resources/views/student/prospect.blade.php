@extends('layouts.app')

@section('content')


<!-- Form to insert a company in the database -->
<h1 class="text-center">Ajouter une entreprise</h1>

<form class="w-50 m-auto" action="/prospect" method="POST">
    <div class="mb-3">
        <label for="company-name" class="form-label">Nom de l'entreprise</label>
        <input type="text" class="form-control" id="company-name">
    </div>
    <div class="mb-3">
        <label for="company-mail" class="form-label">E-mail de l'entreprise</label>
        <input type="email" class="form-control" id="company-mail">
    </div>
    <div class="mb-3">
        <label for="company-phone" class="form-label">Numéro de téléphone de l'entreprise</label>
        <input type="tel" class="form-control" id="company-phone">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<!-- List of companies -->
<table class="table">

    <thead>
        <tr>
            <th scope="col">Nom de l'entreprise</th>
            <th scope="col">E-mail de l'entreprise</th>
            <th scope="col">Téléphone de l'entreprise</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $key)
        <tr>
            <td>{{ $key->company_name }}</td>
            <td>{{ $key->email_contact }}</td>
            <td>{{ $key->phone_contact }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection