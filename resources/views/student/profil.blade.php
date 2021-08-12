@extends('layouts.app')

@section('content')

<!-- Bloc avec infos alternant + "boutons" de nav -->
<section class="container-fluid">

    <div class="row">

        <!-- Nom + Prénom de l'alternant -->
        <div class="col-5">

            <h2>{{ $student->name }}</h2>

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

    <form action="{{route('profil.update', $student->id)}}" method="POST">
        @csrf

        <!-- Nom + Prénom -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="text" name="last_name" id="floatingInput1" class="form-control" placeholder="Nom" value="{{ $student->last_name }}" required>
                <label for="floatingInputValue1">Nom</label>
            </div>
            <div class="col-6 form-floating">
                <input type="text" name="first_name" id="floatingInput2" class="form-control" placeholder="Prénom" value="{{ $student->first_name }}" required>
                <label for="floatingInputValue2">Prénom</label>
            </div>
        </div>

        <!-- Date de naissance + Ville -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="date" name="birthday" id="floatingInput3" class="form-control" placeholder="Date de naissance" value="{{ $student->birthday }}" required>
                <label for="floatingInput3">Date de naissance</label>
            </div>
            <div class="col-6 form-floating">
                <input type="text" name="city" id="floatingInput4" class="form-control" placeholder="Ville" value="{{ $student->city }}" required>
                <label for="floatingInputValue4">Ville</label>
            </div>
        </div>

        <!-- Numéro de téléphone + Email -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="tel" name="phone" id="floatingInput5" class="form-control" placeholder="Numéro de téléphone" value="{{ $student->user->phone }}" required>
                <label for="floatingInputValue5">Numéro de téléphone</label>
            </div>
            <div class="col-6 form-floating">
                <input type="email" name="email" id="floatingInput6" class="form-control" placeholder="Email" value="{{ $student->user->email }}" required>
                <label for="floatingInputValue6">Email</label>
            </div>
        </div>

        <!-- Conseiller + Formation -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="text" id="floatingInput7" class="form-control" placeholder="Mon Conseiller" value="{{ $student->section->adviser->name }}" disabled readonly>
                <label for="floatingInputValue7">Mon conseiller</label>
            </div>

            <div class="col-6 form-floating">
                <input type="text" id="floatingInput8" class="form-control" placeholder="Ma Formation" value="{{ $student->section->class_name }}" disabled readonly>
                <label for="floatingInputValue8">Ma formation</label>
            </div>
        </div>

        <!-- Bouton "Valider" -->
        <div class="row my-4">
            <div class="col d-md-flex justify-content-md-end">
                <button type="submit" class="btn buttons button_save">Valider</button>
            </div>
        </div>
        
    </form>

</section>

<!-- Bloc "Mon CV" -->
<section id="monCv" style="display:none;">

    <!-- Titre du bloc "Mon CV" -->
    <div class="row">
        <div class="col-12">
            <h1 class="title-h1">
                Mon CV
            </h1>
        </div>
    </div>

    <form action="{{route('resumes.update', $student->resume->id)}}" method="POST">
        @csrf
        @method('PUT')

        <!-- Description perso. + Niveaux d'études-->
        <div class="row my-4">
            <div class="col-6">
                <textarea class="form-control" name="about_me" placeholder="Décriez-vous en quelques mots" maxlength="200">{{ $student->resume->about_me }}</textarea>
            </div>

            <div class="col-6 form-floating">
                <div class="form-floating">
                    <select class="form-select" name="study" id="floatingSelect">
                        <option selected>{{ $student->resume->study }}</option>
                        <option value="Aucun diplôme">Aucun diplôme</option>
                        <option value="CAP">CAP</option>
                        <option value="BAC">BAC</option>
                        <option value="BAC +2">BAC +2</option>
                        <option value="BAC +3">BAC +3</option>
                        <option value="BAC +5">BAC +5</option>
                    </select>
                    <label for="floatingSelect">Niveaux d'études</label>
                </div>
            </div>
        </div>

        <!-- Upload CV + Expérience professionnelle -->
        <div class="row my-4">

            <div class="col-6 form-floating">
                <input type="file" id="floatingFile" class="form-select" placeholder="Mon CV (.pdf)" value="">
                <label for="floatingFile">Mon CV (.pdf)</label>
            </div>

            <div class="col-6 form-floating">
                <div class="form-floating">
                    <select class="form-select" name="experience" id="floatingSelect">
                        <option selected>{{ $student->resume->experience }}</option>
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

        <!-- Centre d’intérêts + Compétences -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <select class="form-select" name="interests" id="floatingSelect">
                    <option selected>{{ $student->resume->interests }}</option>
                    <option value="Musique">Musique</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Lecture">Lecture</option>
                    <option value="Ecriture">Ecriture</option>
                    <option value="Photographie">Photographie</option>
                    <option value="Sports">Sports</option>
                    <option value="Jeux-vidéos">Jeux-vidéos</option>
                    <option value="Chasse">Chasse</option>
                    <option value="Pêche">Pêche</option>
                </select>
                <label for="floatingSelect">Centre d’intérêts</label>
            </div>

            <div class="col-6 form-floating">
                <select class="form-select" name="skills" id="floatingSelect">
                    <option selected>{{ $student->resume->skills }}</option>
                    <option value="Relationel">Relationel</option>
                    <option value="Communication">Communication</option>
                    <option value="Tourisme">Tourisme</option>
                    <option value="Informatique">Informatique</option>
                    <option value="Gestion">Gestion</option>
                    <option value="Mécanique">Mécanique</option>
                    <option value="Cuisine">Cuisine</option>
                </select>
                <label for="floatingSelect">Compétences</label>
            </div>
        </div>

        <!-- Permis + Véhicule -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <select class="form-select" name="driver_license" id="floatingSelect">
                    <option selected>{{ $student->resume->driver_license }}</option>
                    <option value="Aucun permis">Aucun</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
                <label for="floatingSelect">Permis</label>
            </div>

            <div class="col-6 form-floating">
                <select class="form-select" name="vehicule" id="floatingSelect">
                    <option selected>{{ $student->resume->vehicle }}</option>
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                </select>
                <label for="floatingSelect">Véhicule</label>
            </div>
        </div>

        <!-- Bouton "Valider" -->
        <div class="row my-4">
            <div class="col d-md-flex justify-content-md-end">
                <button type="submit" class="btn buttons button_save">Valider</button>
            </div>
        </div>
    </form>

</section>

<!-- Bloc "Modifier mon mot de passe" -->
<section id="monMdp" style="display:none;">
    <!-- Titre du bloc "Modifier mon mot de passe" -->
    <div class="row">
        <div class="col-12">
            <h1 class="title-h1">
                Mon mot de passe
            </h1>
        </div>
    </div>

        <!-- Input mot de passe actuel -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="password" name="password" id="floatingInput" class="form-control" placeholder="Entrer votre mot de passe actuel" value="{{ $student->user->password }}">
                <label for="floatingInput">Entrer votre mot de passe actuel</label>
            </div>
        </div>

        <!-- Input nouveau mot de passe -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="password" id="floatingInput" class="form-control" placeholder="Nouveau mot de passe" value="">
                <label for="floatingInput">Nouveau mot de passe</label>
            </div>
        </div>

        <!-- Input confirmer nouveau mot de passe -->
        <div class="row my-4">
            <div class="col-6 form-floating">
                <input type="password" id="floatingInput" class="form-control" placeholder="Confirmer votre nouveau mot de passe" value="">
                <label for="floatingInput">Confirmer votre nouveau mot de passe</label>
            </div>
        </div>

        <!-- Bouton "Valider" -->
        <div class="row my-4">
            <div class="col d-md-flex justify-content-md-end">
                <button type="submit" class="btn buttons button_save">Valider</button>
            </div>
        </div>

</section>

<script type="text/javascript">

    // Affiche le bloc "Mes informations personnelles" et cache les autres blocs
    $('#btnInfoPerso').click(function(){

        $('#infoPerso').show();
        $('#monCv , #monMdp').hide();

        $('#labelInfoPerso').addClass('btn-light');

        $('#labelCv, #labelMdp').removeClass('btn-light');

    });

    // Affiche le bloc "Mon CV" et cache les autres blocs
    $('#btnCv').click(function(){

        $('#monCv').show();
        $('#infoPerso , #monMdp').hide();

        $('#labelCv').addClass('btn-light');

        $('#labelInfoPerso , #labelMdp').removeClass('btn-light');

    });

</script>

@endsection
