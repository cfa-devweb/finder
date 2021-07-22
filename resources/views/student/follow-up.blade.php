@extends('layouts.app')

@section('content')

<div class="row mx-0">
    <div class="col px-0 d-flex justify-content-end">
        <!-- Button show modal to create follow-up -->
        <button type="button" class="btn btn-primary text-white mb-3" onclick="openCreateModal()" data-bs-toggle="modal" data-bs-target="#editFollowUpModal">
            Ajouter une prise de contact
        </button>
    </div>
</div>

<!-- List of companies -->
<table class="table table-striped">
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
    @if($followUp)
        @foreach($followUp as $key)
        <tr>
            <td>{{ $key->date }}</td>
            <td>{{ $key->mode_contact }}</td>
            <td>{{ $key->nom_contact }}</td>
            <td>{{ $key->comment }}</td>
            <td>{{ $key->answer }}</td>
            <td>
                <button class="btn btn-info text-white" onclick="openConsultModal('{{ $key->id }}')" data-bs-toggle="modal" data-bs-target="#editFollowUpModal">
                    <i class="fas fa-eye"></i>
                </button>
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
            <form>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title mx-auto fs-3 fw-bold" id="exampleModalLabel">Ajout de prise de contact</h5>
                </div>
                <div class="modal-body mx-3">
                    <div class="row">
                        <div class="col-5">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required/>
                        </div>
                        <div class="col-7">
                            <label for="mode_contact" class="form-label">Action menée</label>
                            <input type="text" class="form-control" name="mode_contact" placeholder="Mail, téléphone, entretien,..." required/>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-7">
                            <label for="nom_contact" class="form-label">Personne contacté</label>
                            <input type="text" class="form-control" name="nom_contact" placeholder="R.H, Service comptabilité,..." required/>
                        </div>
                        <div class="col-5">
                            <label for="answer" class="form-label">Réponse</label>
                            <select class="form-select" id="answer" name="answer" required>
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
                            <textarea type="text" class="form-control" name="comment" placeholder="Commentaire" rows="4"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="enterprise_id" />
                    <input type="hidden" name="student_id" />
                    <input type="hidden" name="id" />
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-success ms-2" id="btnEditFollowUp">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $(document).ready(getAllFollowUp());

    /* Récupération des données de toute les prises de contact avec cette entreprise */
    function getAllFollowUp() {
        $.ajax({
            type: 'GET',
            url: '/api/follow-up',
            success: function (data) {
                $('input[name=enterprise_id]').val(data[0].enterprise_id);
                $('input[name=student_id]').val(data[0].student_id);
            }
        })
    }

    /* Récupération des données d'une prise de contact spécifique */
    function getFollowUp(id) {
        $.ajax({
            type: 'GET',
            url: '/api/follow-up/' + id,
            success: function (data) {
                $('input[name=date]').val(data.date);
                $('input[name=mode_contact]').val(data.mode_contact);
                $('input[name=nom_contact]').val(data.nom_contact);
                $('select[name=answer]').val(data.answer);
                $('textarea[name=comment]').val(data.comment);
                $('input[name=enterprise_id]').val(data.enterprise_id);
                $('input[name=student_id]').val(data.student_id);
            }
        })
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

        $.ajax({
            type: type,
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
                alert('ceb');
            }
        })
    }

    /* Comportement à chaque fermeture de la modal */
    $('#editFollowUpModal').on('hidden.bs.modal', function () {
        $('input, select, textarea, #editFollowUpModal .btn').prop('disabled', false).val("");
    })

    /* Comportement de la modal pour l'ajout de prise de contact */
    function openCreateModal() {
        $('#id').val("");
        $('#btnEditFollowUp').attr('onclick', 'editFollowUp()');
    }

    /* Comportement de la modal pour la modification de prise de contact */
    function openUpdateModal(id) {
        id = parseInt(id);
        $('#id').val(id);
        $('#date').attr('disabled', true);
        $('#btnEditFollowUp').attr('onclick', 'editFollowUp(' + id +')');
        getFollowUp(id);
    }

    /* Comportement de la modal lors de la consultation */
    function openConsultModal(id) {
        id = parseInt(id);
        $('#id').val(id);
        $('#btnEditFollowUp').attr('disabled', true);
        $('input, textarea, select').attr('disabled', true);
        getFollowUp(id);
    }
</script>
@endsection
