@extends('layouts.app')

@section('content')

<!-- Bloc avec infos alternant + "boutons" de nav -->
<section class="container-fluid">
    
    <div class="row">

        <div class="col-5">
            <h2>FRANCINE Kendrick</h2>
        </div>

        <div class="col-2 d-grid">
            <input type="radio" class="btn-check" name="btnradio" id="btnInfoPerso" autocomplete="off" checked>
            <label class="btn btn-light" for="btnInfoPerso">Mon profil</label>
        </div>

        <div class="col-2 d-grid">
            <input type="radio" class="btn-check" name="btnradio" id="btnCv" autocomplete="off">
            <label class="btn btn-light" for="btnCv">Mon CV</label>
        </div>

        <div class="col-3 d-grid">
            <input type="radio" class="btn-check" name="btnradio" id="btnMdp" autocomplete="off">
            <label class="btn btn-light" for="btnMdp">Modifier mon mot de passe</label>
        </div>
    </div>

</section>

<!-- Bloc "Mes informations personnelles" -->
<section id="infoPerso">
    <div class="row">
        <div class="col-12">
            <h1 class="title-h1">
                Mes informations personnelles
            </h1>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <input type="text" id="floatingInput" class="form-control" placeholder="Nom" aria-label="Last name" value="">
            <label for="floatingInput">Nom</label>
        </div>
        <div class="col-6 form-floating">
            <input type="text" id="floatingInput" class="form-control" placeholder="Prénom" aria-label="First name" value="">
            <label for="floatingInput">Prénom</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <input type="date" id="floatingInput" class="form-control" placeholder="Date de naissance" aria-label="Birthday" value="">
            <label for="floatingInput">Date de naissance</label>
        </div>
        <div class="col-6 form-floating">
            <input type="text" id="floatingInput" class="form-control" placeholder="Ville" aria-label="City" value="">
            <label for="floatingInput">Ville</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <input type="tel" id="floatingInput" class="form-control" placeholder="Numéro de téléphone" aria-label="Phone" value="">
            <label for="floatingInput">Numéro de téléphone</label>
        </div>
        <div class="col-6 form-floating">
            <input type="email" id="floatingInput" class="form-control" placeholder="Email" aria-label="Email" value="">
            <label for="floatingInput">Email</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <input type="text" id="floatingInput" class="form-control" placeholder="Mon Conseiller" value="Caroline" disabled readonly>
            <label for="floatingInput">Mon conseiller</label>
        </div>
        <div class="col-6 form-floating">
            <input type="text" id="floatingInput" class="form-control" placeholder="Ma Formation" value="DEV WEB PROMO 2" disabled readonly>
            <label for="floatingInput">Ma formation</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col d-md-flex justify-content-md-end">
            <button type="button" class="btn me-md-2 buttons button_edit">Modifier</button>
            <button type="button" class="btn buttons button_save">Valider</button>
        </div>
    </div>
</section>

<!-- Bloc "Mon CV" -->
<section id="monCv">
    <div class="row">
        <div class="col-12">
            <h1 class="title-h1">
                Mon CV
            </h1>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <textarea class="form-control" placeholder="Décriez-vous en quelques mots" id="floatingTextarea" maxlength="200" value=""></textarea>
            <label for="floatingTextarea">Décriez-vous en quelques mots</label>
        </div>
        <div class="col-6 form-floating">
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <label for="floatingSelect">Niveaux d'études</label>
            </div>
        
            <div class="row my-4">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Expérience professionnelle</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <label for="floatingSelect">Centre d’intérêts</label>
        </div>
        <div class="col-6 form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <label for="floatingSelect">Compétences</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col d-md-flex justify-content-md-end">
            <button type="button" class="btn me-md-2 buttons button_edit">Modifier</button>
            <button type="button" class="btn buttons button_save">Valider</button>
        </div>
    </div>
</section>

<!-- Bloc "Modifier mon mot de passe" -->
<section id="monMdp">
    <div class="row">
        <div class="col-12">
            <h1 class="title-h1">
                Mon mot de passe
            </h1>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <input type="text" id="floatingInput" class="form-control" placeholder="Entrer votre mot de passe actuel" value="">
            <label for="floatingInput">Entrer votre mot de passe actuel</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <input type="text" id="floatingInput" class="form-control" placeholder="Nouveau mot de passe">
            <label for="floatingInput">Nouveau mot de passe</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <input type="text" id="floatingInput" class="form-control" placeholder="Confirmer votre nouveau mot de passe">
            <label for="floatingInput">Confirmer votre nouveau mot de passe</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col d-md-flex justify-content-md-end">
            <button type="button" class="btn buttons button_save">Valider</button>
        </div>
    </div>
</section>


@endsection