@extends('layouts.app')

@section('content')

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-10 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2 class="title-h1"><strong>Création du profil</strong></h2>
                <p>C'est simple !</p>
                <div class="row">
                    <div class="col-md-12 ">
                        <form method="POST" action="/saveprofil" id="msform">
                        @csrf
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li id="study" class="active"><i class="fas fa-user-graduate"></i><strong> Etude</strong></li>
                                <li id="experience"><i class="fas fa-user-tie"></i><strong> Experience</strong></li>
                                <li id="skills" ><i class="fas fa-user-check"></i><strong> Competence</strong></li>
                                <li id="driver" ><i class="fas fa-car-side"></i><strong> Transport</strong></li>
                                <li id="interest"><i  class="fas fa-hiking"></i><strong> Interet</strong></li>
                                <li id="comment" ><i class="far fa-comment"></i><strong> Commentaire</strong></li>
                            </ul>
                            <!--Study Area-->
                            <fieldset>
                                <div class="form-card">
                                    <div class="form-check row">
                                        <div class="row">
                                            <div class="col-md-5"></div>
                                            <h2 class="fs-title col-md-3">Niveau d'étude</h2>
                                            <div class="col-md-4"></div>
                                        </div>
                                        <div class="row pt-5">
                                            <div class="col-md-4 text-left">
                                                <input  type="radio" id="checkbox1" name="checkboxStudy" value="Aucun Diplome" checked />
                                                <label class="form-check-label " for="checkbox1">Aucun Diplome</label>
                                            </div>
                                            <div class="col-md-4 text-left">
                                                <input  type="radio" id="checkbox2" name="checkboxStudy" value="CAP" />
                                                <label class="form-check-label" for="checkbox2">CAP</label>
                                            </div>
                                            <div class="col-md-4 text-left">
                                                <input  type="radio" id="checkbox3" name="checkboxStudy" value="BAC" />
                                                <label class="form-check-label" for="checkbox3">BAC</label>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row ">
                                            <div class="col-md-4 text-left">
                                                <input type="radio" id="checkbox4" name="checkboxStudy" value="BAC +2" />
                                                <label class="form-check-label" for="checkbox4">BAC +2</label>
                                            </div>
                                            <div class="col-md-4 text-left">
                                                <input type="radio" id="checkbox5" name="checkboxStudy" value="Bac +3" />
                                                <label class="form-check-label" for="checkbox5">BAC +3</label>
                                            </div>
                                            <div class="col-md-4 text-left">
                                                <input type="radio" id="checkbox6" name="checkboxStudy" value="Bac +5 ou plus" />
                                                <label class="form-check-label" for="checkbox6">BAC +5</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <!--end Study Area-->

                            <!--Experience Area-->
                            <fieldset>
                                <div class="form-card">

                                    <div class="form-check row">
                                        <div class="row">
                                            <h2 class="fs-title col-md-12 text-center">Avez-vous déja travaillé ? Si oui, combien de temps ?</h2>
                                        </div>
                                        <div class="row pt-5">
                                            <div class="col-md-4 text-center">
                                                <input type="radio" id="checkbox7" name="checkboxExperience" value="Jamais" checked/>
                                                <label class="form-check-label" for="checkbox7">Jamais</label>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="radio" id="checkbox8" name="checkboxExperience" value="6 mois"/>
                                                <label class="form-check-label" for="checkbox8">6 mois</label>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="radio" id="checkbox9" name="checkboxExperience" value="1 an"/>
                                                <label class="form-check-label" for="checkbox9">1 an</label>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <input type="radio" id="checkbox10" name="checkboxExperience" value="2 ans" />
                                                <label class="form-check-label" for="checkbox10">2 ans</label>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="radio" id="checkbox11" name="checkboxExperience" value="3 ans" />
                                                <label class="form-check-label" for="checkbox11">3 ans</label>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                <input type="radio" id="checkbox12" name="checkboxExperience" value="3 ans et +" />
                                                <label class="form-check-label" for="checkbox12">3 ans et +</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <!--end Experience Area-->

                            <!--Skills Area-->
                            <fieldset>

                                <div class="form-card">
                                    <h2 class="fs-title text-center">Quel sont vos domaines de compétences </h2>
                                    <div class="container pt-5">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select class="mdb-select md-form" aria-label="Default select example" name="skills1">
                                                    <option selected value="">Compétence 1</option>
                                                    <option value="mécanique">mécanique</option>
                                                    <option value="relationel">relationel</option>
                                                    <option value="voiture">voiture</option>
                                                    <option value="client">client</option>
                                                    <option value="commercial">commercial</option>
                                                    <option value="cuisine">cuisine</option>
                                                    <option value="tourisme">tourisme</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="mdb-select md-form" aria-label="Default select example" name="skills2">
                                                    <option selected  value="">Compétence 2</option>
                                                    <option value="mécanique">mécanique</option>
                                                    <option value="relationel">relationel</option>
                                                    <option value="voiture">voiture</option>
                                                    <option value="client">client</option>
                                                    <option value="commercial">commercial</option>
                                                    <option value="cuisine">cuisine</option>
                                                    <option value="tourisme">tourisme</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="mdb-select md-form" aria-label="Default select example" name="skills3">
                                                    <option selected  value="">Compétence 3</option>
                                                    <option value="mécanique">mécanique</option>
                                                    <option value="relationel">relationel</option>
                                                    <option value="voiture">voiture</option>
                                                    <option value="client">client</option>
                                                    <option value="commercial">commercial</option>
                                                    <option value="cuisine">cuisine</option>
                                                    <option value="tourisme">tourisme</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="mdb-select md-form" aria-label="Default select example" name="skills4">
                                                    <option selected  value="">Compétence 4</option>
                                                    <option value="mécanique">mécanique</option>
                                                    <option value="relationel">relationel</option>
                                                    <option value="voiture">voiture</option>
                                                    <option value="client">client</option>
                                                    <option value="commercial">commercial</option>
                                                    <option value="cuisine">cuisine</option>
                                                    <option value="tourisme">tourisme</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div> <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <!--end Skills Area-->

                            <!--DriverLicense Area-->
                            <fieldset>
                                <div class="form-card ">
                                    <h2 class="fs-title">Permis </h2>
                                    <div class="row  pt-5">
                                        <div class="col-md-4 text-center">
                                            <input type="radio" id="checkbox13" name="checkboxDriverLicense" value="Aucun permis" checked />
                                            <label class="form-check-label" for="checkbox13">Aucun permis</label>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <input type="radio" id="checkbox14" name="checkboxDriverLicense" value="B" />
                                            <label class="form-check-label" for="checkbox14">B</label>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <input type="radio" id="checkbox15" name="checkboxDriverLicense" value="A" />
                                            <label class="form-check-label" for="checkbox15">A</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-card ">

                                    <h2 class="fs-title">Véhicule</h2>
                                    <div class="row  pt-5">
                                        <div class="col-md-6 text-center">
                                            <input type="radio" id="checkbox16" name="checkboxDriverVehicle" value="1" />
                                            <label class="form-check-label" for="checkbox16">Oui</label>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <input type="radio" id="checkbox17" name="checkboxDriverVehicle" value="0" checked/>
                                            <label class="form-check-label" for="checkbox17">Non</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <!--end DriverLicense Area-->

                            <!--Interest Area-->
                            <fieldset>
                                <div class="form-card pt-3">
                                    <h2 class="fs-title text-center">Quels sont vos principaux centre d'interet</h2>
                                    <div class="row pt-4">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox18" name="interest1" value="Musique" />
                                            <label class="form-check-label" for="checkbox18">Musique</label>
                                            <i class="fas fa-music"></i>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox19" name="interest2" value="informatique" />
                                            <label class="form-check-label" for="checkbox19">informatique</label>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox20"   name="interest3"value="Lecture" />
                                            <label class="form-check-label" for="checkbox20">Lecture</label>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox21"  name="interest4"value="Ecriture" />
                                            <label class="form-check-label" for="checkbox21">Ecriture</label>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox22"   name="interest5"value="Photographie" />
                                            <label class="form-check-label" for="checkbox22">Photographie</label>
                                        </div>
                                        <div class="col-md-1"></div>

                                    </div>
                                    </br>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox22" name="interest6" value="Voyage" />
                                            <label class="form-check-label" for="checkbox22">Voyage</label>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox23"  name="interest7"value="Sports" />
                                            <label class="form-check-label" for="checkbox23">Sports</label>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox24" name="interest8" value="Jeux videos" />
                                            <label class="form-check-label" for="checkbox24">Jeux videos</label>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox25"  name="interest9"value="Chasse" />
                                            <label class="form-check-label" for="checkbox25">Chasse</label>
                                        </div>
                                        <div class="col-md-2 text-left">
                                            <input type="checkbox" id="checkbox26" name="interest10" value="Peche" />
                                            <label class="form-check-label" for="checkbox26">Peche</label>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                <input type="button" name="next" class="next action-button" value="Next Step" />
                            </fieldset>
                            <!--end Interest Area-->  

                            <!--Commentary Area-->
                            <fieldset>

                                <div class="form-card">
                                    <h2 class="fs-title">Commentaire</h2>

                                    <textarea class="col-md-12" maxlength="200" name="aboutMe" placeholder="Décrivez vous (200 lettres max)" value=" "></textarea>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                                 <input type="submit" name="submit" class="next action-button button_save_profil" value="Sauvegarder votre profil" />
                            </fieldset>
                            <!--end Commentary Area-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function() {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $('.radio-group .radio').click(function() {
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });

        $(".submit").click(function() {
            return false;
        })

    });
</script>
@endsection