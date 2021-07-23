@extends('layouts.app')

@section('content')

<style>

    #monCv {
        display: none;
    }

    #monMdp{
        display: none;
    }

</style>

<!-- Bloc avec infos alternant + "boutons" de nav -->
<section class="container-fluid">
    
    <div class="row">
        <!-- Nom + Prénom de l'alternant -->
        <div class="col-5">
            @foreach ($students as $student)
            <h2>{{ $student->last_name }} {{ $student->first_name }}</h2>
            @endforeach
        </div>

        <!-- Bouton "Mon profil" -->
        <div class="col-2 d-grid">
            <input type="radio" class="btn-check" name="btnradio" id="btnInfoPerso" autocomplete="off">
            <label class="btn btn-light" for="btnInfoPerso" id="labelInfoPerso" >Mon profil</label>
        </div>

        <!-- Bouton "Mon CV" -->
        <div class="col-2 d-grid">
            <input type="radio" class="btn-check" name="btnradio" id="btnCv" autocomplete="off">
            <label class="btn" for="btnCv" id="labelCv">Mon CV</label>
        </div>

        <!-- Bouton "Modifier mon mot de passe" -->
        <div class="col-3 d-grid">
            <input type="radio" class="btn-check" name="btnradio" id="btnMdp" autocomplete="off">
            <label class="btn" for="btnMdp" id="labelMdp">Modifier mon mot de passe</label>
        </div>
    </div>

</section>

<!-- Bloc "Mes informations personnelles" -->
<section id="infoPerso">
    <!-- Titre du bloc "Mes informations personnelles" -->
    <div class="row">
        <div class="col-12">
            <h1 class="title-h1">
                Mes informations personnelles
            </h1>
        </div>
    </div>
    @foreach ($students as $student)
        <!-- Nom + Prénom -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="text" id="floatingInput" class="form-control" placeholder="Nom" aria-label="Last name" value="{{ $student->last_name }}">
                <label for="floatingInputValue">Nom</label>
            </div>
            <div class="col-6 form-floating">
                <input type="text" id="floatingInput" class="form-control" placeholder="Prénom" aria-label="First name" value="{{ $student->first_name }}">
                <label for="floatingInputValue">Prénom</label>
            </div>
        </div>
        <!-- Date de naissance + Ville -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="date" id="floatingInput" class="form-control" placeholder="Date de naissance" aria-label="Birthday" value="{{ $student->birthday }}">
                <label for="floatingInput">Date de naissance</label>
            </div>
            <div class="col-6 form-floating">
                <input type="text" id="floatingInput" class="form-control" placeholder="Ville" aria-label="City" value="{{ $student->city }}">
                <label for="floatingInputValue">Ville</label>
            </div>
        </div>
        <!-- Numéro de téléphone + Email -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="tel" id="floatingInput" class="form-control" placeholder="Numéro de téléphone" aria-label="Phone" value="{{ $student->user->phone }}">
                <label for="floatingInputValue">Numéro de téléphone</label>
            </div>
            <div class="col-6 form-floating">
                <input type="email" id="floatingInput" class="form-control" placeholder="Email" aria-label="Email" value="{{ $student->user->email }}">
                <label for="floatingInputValue">Email</label>
            </div>
        </div>
        <!-- Conseiller + Formation -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="text" id="floatingInput" class="form-control" placeholder="Mon Conseiller" value="" disabled readonly>
                <label for="floatingInputValue">Mon conseiller</label>
            </div>

            <div class="col-6 form-floating">
                <input type="text" id="floatingInput" class="form-control" placeholder="Ma Formation" value="" disabled readonly>
                <label for="floatingInputValue">Ma formation</label>
            </div>
        </div>
    @endforeach
    <!-- Bouton modifier + Bouton valider -->
    <div class="row my-4">
        <div class="col d-md-flex justify-content-md-end">
            <button type="button" class="btn me-md-2 buttons button_edit">Modifier</button>
            <button type="button" class="btn buttons button_save">Valider</button>
        </div>
    </div>
</section>

<!-- Bloc "Mon CV" -->
<section id="monCv">
    <!-- Titre du bloc "Mon CV" -->
    <div class="row">
        <div class="col-12">
            <h1 class="title-h1">
                Mon CV
            </h1>
        </div>
    </div>
    @foreach ($students as $student)
        <!-- Description perso. + Niveaux d'études + Expérience pro. -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <textarea class="form-control" placeholder="Décriez-vous en quelques mots" id="floatingTextarea" style="height: 142px;"  maxlength="200" value="{{ $student->$resumes->about_me }}"></textarea>
                <label for="floatingTextarea">Décriez-vous en quelques mots</label>
            </div>
            <div class="col-6 form-floating">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option value="Aucun diplôme">Aucun diplôme</option>
                        <option value="CAP">CAP</option>
                        <option value="BAC">BAC</option>
                        <option value="BAC +2">BAC +2</option>
                        <option value="BAC +3">BAC +3</option>
                        <option value="BAC +5">BAC +5</option>
                    </select>
                    <label for="floatingSelect">Niveaux d'études</label>
                </div>
            
                <div class="row mt-4">
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option value="Jamais">Jamais</option>
                            <option value="6 mois">6 mois</option>
                            <option value="1 an">1 an</option>
                            <option value="2 ans">2 ans</option>
                            <option value="3 ans">3 ans</option>
                            <option value="4 ans ou plus">4 ans ou plus</option>
                        </select>
                        <label for="floatingSelect">Expérience professionnelle</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Centre d’intérêts + Compétences -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option value="1">Musique</option>
                    <option value="2">Informatique</option>
                    <option value="3">Lecture</option>
                    <option value="4">Ecriture</option>
                    <option value="5">Photographie</option>
                    <option value="6">Voyage</option>
                    <option value="7">Sports</option>
                    <option value="8">Jeux-vidéos</option>
                    <option value="9">Chasse</option>
                    <option value="10">Pêche</option>
                </select>
                <label for="floatingSelect">Centre d’intérêts</label>
            </div>
            <div class="col-6 form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option value="1">Relationel</option>
                    <option value="2">Communication</option>
                    <option value="3">Tourisme</option>
                    <option value="4">Informatique</option>
                    <option value="5">Gestion</option>
                    <option value="6">Mécanique</option>
                    <option value="7">Cuisine</option>
                </select>
                <label for="floatingSelect">Compétences</label>
            </div>
        </div>
        <!-- Permis + Véhicule -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option value="Aucun permis">Aucun</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
                <label for="floatingSelect">Permis</label>
            </div>
            <div class="col-6 form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    <option value="Non">Non</option>
                    <option value="Oui">Oui</option>
                </select>
                <label for="floatingSelect">Véhicule</label>
            </div>
        </div>
    @endforeach
    <!-- Bouton modifier + Bouton valider -->
    <div class="row my-4">
        <div class="col d-md-flex justify-content-md-end">
            <button type="button" class="btn me-md-2 buttons button_edit">Modifier</button>
            <button type="button" class="btn buttons button_save">Valider</button>
        </div>
    </div>
</section>

<!-- Bloc "Modifier mon mot de passe" -->
<section id="monMdp">
    <!-- Titre du bloc "Modifier mon mot de passe" -->
    <div class="row">
        <div class="col-12">
            <h1 class="title-h1">
                Mon mot de passe
            </h1>
        </div>
    </div>
    <div class="row my-4 ">
        <div class="col-6 form-floating">
            <input type="password" id="floatingInput" class="form-control" placeholder="Entrer votre mot de passe actuel" value="">
            <label for="floatingInput">Entrer votre mot de passe actuel</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <input type="password" id="floatingInput" class="form-control" placeholder="Nouveau mot de passe" value="">
            <label for="floatingInput">Nouveau mot de passe</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-6 form-floating">
            <input type="password" id="floatingInput" class="form-control" placeholder="Confirmer votre nouveau mot de passe" value="">
            <label for="floatingInput">Confirmer votre nouveau mot de passe</label>
        </div>
    </div>
    <div class="row my-4">
        <div class="col d-md-flex justify-content-md-end">
            <button type="button" class="btn buttons button_save">Valider</button>
        </div>
    </div>
</section>

<script type="text/javascript">

$('#btnInfoPerso').click(function(){

    $('#infoPerso').show();
    $('#monCv , #monMdp').hide();

    $('#labelInfoPerso').addClass('btn-light');

    $('#labelCv, #labelMdp').removeClass('btn-light');

});


$('#btnCv').click(function(){

    $('#monCv').show();
    $('#infoPerso , #monMdp').hide();

    $('#labelCv').addClass('btn-light');

    $('#labelInfoPerso , #labelMdp').removeClass('btn-light');

});

$('#btnMdp').click(function(){

    $('#monMdp').show();
    $('#infoPerso , #monCv').hide();

    $('#labelMdp').addClass('btn-light');

    $('#labelInfoPerso , #labelCv').removeClass('btn-light');

});



</script>

@endsection