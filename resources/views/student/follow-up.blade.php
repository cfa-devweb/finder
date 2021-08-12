@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Form to insert a company in the database -->
    <h2 class="title-h1">Mon suivi d'entreprise</h2>

    <div class="row mx-0 my-3">
        <div class="col px-0 d-flex justify-content-end">
            <button type="button" class="buttons button_general btn-modal-create" data-bs-toggle="modal" data-bs-target="#followUpModal">
                Ajouter une prise de contact
            </button>
        </div>
    </div>

    <!-- List of follow-ups  -->
    <div class="table-responsive">
        <table class="table table-striped table-follow-up">
            <thead>
            <tr class="table-dark">
                <th scope="col">Date</th>
                <th scope="col">Action menée</th>
                <th scope="col">Personne contacté</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Réponse</th>
                <th class="text-center" scope="col">Actions</th>
            </tr>
            </thead>
            <tbody id="tableBody">
            @if(!$followUps->isEmpty())
                @foreach($followUps as $key)
                    <tr>
                        <td class="id" hidden>{{ $key->id }}</td>
                        <td class="date">{{ $key->date }}</td>
                        <td class="mode-contact">{{ $key->mode_contact }}</td>
                        <td class="name-contact">{{ $key->name_contact }}</td>
                        <td class="comment">{{ $key->comment }}</td>
                        <td class="answer"><div class="tag tag-answer">{{ $key->answer }}</div></td>
                        <td class="d-flex justify-content-evenly">
                            <button class="buttons button_infos btn-modal-consult" data-id="{{ $key->id }}" data-bs-toggle="modal" data-bs-target="#followUpModal">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="buttons button_edit btn-modal-update" data-id="{{ $key->id }}" data-bs-toggle="modal" data-bs-target="#followUpModal">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">
                        <div class="my-4 text-secondary">Aucune prise de contact avec cette entreprise.</div>
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="followUpModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formFollowUp" class="needs-validation" novalidate>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title mx-auto fs-3 fw-bold"><span id="modalTitle">Ajout</span> de prise de contact</h5>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="row">
                            <div class="col-5">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" required/>
                            </div>
                            <div class="col-7">
                                <label for="mode_contact" class="form-label">Action menée</label>
                                <input type="text" class="form-control" id="mode_contact" name="mode_contact"
                                       placeholder="Mail, téléphone, entretien,..." maxlength="30" autocomplete="off"
                                       required/>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-7">
                                <label for="name_contact" class="form-label">Personne contacté</label>
                                <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="R.H, Service comptabilité,..." maxlength="255" autocomplete="off" required/>
                            </div>
                            <div class="col-5">
                                <label for="answer" class="form-label">Réponse</label>
                                <select class="form-select" id="answer" name="answer" autocomplete="off" required>
                                    <option value="">...</option>
                                    <option value="waiting">En attente</option>
                                    <option value="refusal">Refus</option>
                                    <option value="accepted">Accepté</option>
                                    <option value="sign">Signé</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="comment" class="form-label">Commentaires</label>
                                <textarea type="text" class="form-control" id="comment" name="comment" placeholder="Commentaire" rows="4" maxlength="255" autocomplete="off"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="enterprise_id" value="{{ $enterpriseId }}"/>
                        <input type="hidden" id="id" name="id"/>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="buttons button_cancel me-2" data-bs-dismiss="modal">Annuler</button>
                        <button type="button" class="buttons button_save ms-2" id="submitForm">
                            Valider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        setForm();
        initTagAnswer();
    });

    /* Initialisation des comportement du formulaire */
    function setForm() {

        // Comportement du formulaire pour création
        $('.btn-modal-create').click(function () {
            $('#modalTitle').text('Création');
            $('#formFollowUp')[0].reset();
            $('#formFollowUp').removeClass('was-validated');
            $('#formFollowUp input, #formFollowUp textarea, #formFollowUp select').attr('disabled', false);
            $('#submitForm').attr('disabled', false);
            $('#submitForm').attr('onclick', 'editFollowUp()');
        })

        // Comportement du formulaire pour consultation
        $('.btn-modal-consult').click(function () {
            let trParent = $(this).parents('tr');
            $('#modalTitle').text('Consultation');
            $('#formFollowUp input, #formFollowUp textarea, #formFollowUp select').attr('disabled', true);
            $('#submitForm').attr('disabled', true);
            $('#formFollowUp').removeClass('was-validated');
            completeForm(trParent);
        })

        // Comportement du formulaire pour modification
        $('.btn-modal-update').click(function () {
            let trParent = $(this).parents('tr');
            $('#modalTitle').text('Modification');
            $('#formFollowUp input, #formFollowUp textarea, #formFollowUp select').attr('disabled', false);
            $('#date').attr('disabled', true);
            $('#submitForm').attr('disabled', false);
            $('#formFollowUp').removeClass('was-validated');
            completeForm(trParent);
        })
    }

    /* Completion du formulaire pour consultation ou modification */
    function completeForm(parentElement) {
        $('#id').val(parentElement.find('.id').text());
        $('#date').val(parentElement.find('.date').text());
        $('#mode_contact').val(parentElement.find('.mode-contact').text());
        $('#name_contact').val(parentElement.find('.name-contact').text());
        $('#answer').val(parentElement.find('.answer').text());
        $('#comment').val(parentElement.find('.comment').text());

        $('#submitForm').attr('onclick', 'editFollowUp(' + $('#id').val() + ')');
    }

    /* Édition d'un prise de contact (création ou modification) */
    function editFollowUp(idFollowUp) {
        let url, type;
        let token = $('meta[name=api-token]').attr('content');

        let date = $('input[name=date]').val();
        let mode_contact = $('input[name=mode_contact]').val();
        let name_contact = $('input[name=name_contact]').val();
        let answer = $('select[name=answer]').val();
        let comment = $('textarea[name=comment]').val();
        let enterprise_id = $('input[name=enterprise_id]').val();

        if (idFollowUp) {
            url = '/api/follow-up/' + idFollowUp;
            type = 'PUT';
        } else {
            url = '/api/follow-up';
            type = 'POST';
        }

        if (!checkFormValidity('formFollowUp'))
            return false;

        $.ajax({
            url: url,
            headers: {'Authorization': 'Bearer ' + token},
            type: type,
            data: {
                date: date,
                mode_contact: mode_contact,
                name_contact: name_contact,
                answer: answer,
                comment: comment,
                enterprise_id: enterprise_id,
            },
            success: function () {
                location.reload();
            }
        })
    }

    /* Vérification de la validité du formulaire */
    function checkFormValidity(formId) {
        if (!$('#' + formId)[0].checkValidity()) {
            $('#' + formId).addClass('was-validated');
            return false;
        }

        $('#' + formId).addClass('was-validated')
        return true;
    }

    /* Initialisation des tags selon les réponses */
    function initTagAnswer() {
        $.each($('.tag-answer'), function () {
            let tagValue = $(this).text();
            console.log(tagValue);
            switch (tagValue) {
                case 'waiting':
                    $(this).addClass('tag-answer-waiting');
                    $(this).text('En attente');
                    break;
                case 'refusal':
                    $(this).addClass('tag-answer-refusal');
                    $(this).text('Refus');
                    break;
                case 'accepted':
                    $(this).addClass('tag-answer-accepted');
                    $(this).text('Accepté');
                    break;
                case 'sign':
                    $(this).addClass('tag-answer-sign');
                    $(this).text('Signé');
                    break;
            }
        })
    }
</script>
@endsection
