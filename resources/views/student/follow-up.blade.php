@extends('layouts.app')

@section('content')

<!-- Form to insert a company in the database -->
<h1 class="title-h1">Mon suivi d'entreprise</h1>

<div class="row mx-0 my-3">
    <div class="col px-0 d-flex justify-content-end">
        <!-- Button show modal to create follow-up -->
        <button type="button" class="btn btn-primary text-white" onclick="openCreateModal()" data-bs-toggle="modal" data-bs-target="#editFollowUpModal">
            Ajouter une prise de contact
        </button>
    </div>
</div>

<!-- List of companies -->
<table class="table table-striped text-center">
    <thead>
    <tr class="table-dark">
        <th scope="col">Date</th>
        <th scope="col">Action menée</th>
        <th scope="col">Personne contacté</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Réponse</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody id="tableBody">
    @if(!$followUps->isEmpty())
        @foreach($followUps as $key)
        <tr>
            <td>{{ $key->date }}</td>
            <td>{{ $key->mode_contact }}</td>
            <td>{{ $key->nom_contact }}</td>
            <td>{{ $key->comment }}</td>
            <td>{{ $key->answer }}</td>
            <td>
                <a class="btn btn-info text-white" onclick="openConsultModal('{{ $key->id }}')" data-bs-toggle="modal" data-bs-target="#editFollowUpModal">
                    <i class="fas fa-eye"></i>
                </a>
                <button  class="btn btn-warning text-white" onclick="openUpdateModal('{{ $key->id }}')" data-bs-toggle="modal" data-bs-target="#editFollowUpModal">
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

<!-- Modal -->
<div class="modal fade" id="editFollowUpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="needs-validation" novalidate>
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
                            <input type="text" class="form-control" name="mode_contact" placeholder="Mail, téléphone, entretien,..." maxlength="30" autocomplete="off" required/>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-7">
                            <label for="nom_contact" class="form-label">Personne contacté</label>
                            <input type="text" class="form-control" name="nom_contact" placeholder="R.H, Service comptabilité,..." maxlength="255" autocomplete="off" required/>
                        </div>
                        <div class="col-5">
                            <label for="answer" class="form-label">Réponse</label>
                            <select class="form-select" id="answer" name="answer" autocomplete="off" required>
                                <option value="">...</option>
                                <option value="en attente">En attente</option>
                                <option value="refus">Refus</option>
                                <option value="accepté">Accepté</option>
                                <option value="signé">Signé</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="comment" class="form-label">Commentaires</label>
                            <textarea type="text" class="form-control" name="comment" placeholder="Commentaire" rows="4" maxlength="255" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="enterprise_id" value="{{ $enterpriseId }}"/>
                    <input type="hidden" name="student_id" />
                    <input type="hidden" name="id" />
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success ms-2" id="btnEditFollowUp">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        /* Comportement à chaque fermeture de la modal */
        $('#editFollowUpModal').on('hidden.bs.modal', function () {
            $('input, select, textarea, #editFollowUpModal .btn').prop('disabled', false).val("");
        })

    });

    /* Récupération des données d'une prise de contact spécifique */
    function getFollowUp(id) {
        let data = @json($followUps);
        for (let i = 0; i < data.length; i++) {
            if (data[i].id == id) {
                $('input[name=date]').val(data[i].date);
                $('input[name=mode_contact]').val(data[i].mode_contact);
                $('input[name=nom_contact]').val(data[i].nom_contact);
                $('select[name=answer]').val(data[i].answer);
                $('textarea[name=comment]').val(data[i].comment);
            }
        }

    }

    /* Édition d'un prise de contact (création ou modification) */
    function editFollowUp(idFollowUp) {
        let url, type;
        let date = $('input[name=date]').val();
        let mode_contact = $('input[name=mode_contact]').val();
        let nom_contact = $('input[name=nom_contact]').val();
        let answer = $('select[name=answer]').val();
        let comment = $('textarea[name=comment]').val();
        let enterprise_id = $('input[name=enterprise_id]').val();
        let student_id = $('input[name=student_id]').val();

        if(idFollowUp){
            url = '/api/follow-up/' + idFollowUp;
            type = 'PUT';
        } else {
            url = '/api/follow-up';
            type = 'POST'
        }

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = $('.needs-validation')
        var token = document.querySelector('meta[name=api-token]');

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        form.classList.add('was-validated');
                        return false;
                    }

                    form.classList.add('was-validated');

                    $.ajax({
                        type: type,
                        headers: {'Authorization': 'Bearer ' + token.content},
                        url: url,
                        data: {
                            date: date,
                            mode_contact: mode_contact,
                            nom_contact: nom_contact,
                            answer: answer,
                            comment: comment,
                            enterprise_id: enterprise_id,
                            student_id: student_id
                        },
                        success: function () {
                            //location.reload();
                        }
                    })

                }, false)
            })
    }

    /* Comportement de la modal pour l'ajout de prise de contact */
    function openCreateModal() {
        $('#id').val("");
        $('#modalTitle').html('Ajout');
        $('#btnEditFollowUp').attr('onclick', 'editFollowUp()');
    }

    /* Comportement de la modal pour la modification de prise de contact */
    function openUpdateModal(id) {
        $('#id').val(id);
        $('#modalTitle').html('Modification');
        $('#date').attr('disabled', true);
        $('#btnEditFollowUp').attr('onclick', 'editFollowUp(' + id +')');
        getFollowUp(id);
    }

    /* Comportement de la modal lors de la consultation */
    function openConsultModal(id) {
        $('#id').val(id);
        $('#modalTitle').html('Consultation');
        $('#btnEditFollowUp').attr('disabled', true);
        $('input, textarea, select').attr('disabled', true);
        getFollowUp(id);
    }
</script>
@endsection
