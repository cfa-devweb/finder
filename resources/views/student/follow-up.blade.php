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
            <td>{{ $key->contact_mode }}</td>
            <td>{{ $key->person_contacted }}</td>
            <td>{{ $key->comment }}</td>
            <td>{{ $key->answer }}</td>
            <td>
                <button class="btn btn-info text-white" onclick="openConsultModal('{{ $key->id }}')" data-bs-toggle="modal" data-bs-target="#editFollowUpModal">
                    Détails
                    <i class="fas fa-eye"></i>
                </button>
                <button  class="btn btn-warning text-white" onclick="openUpdateModal('{{ $key->id }}')" data-bs-toggle="modal" data-bs-target="#editFollowUpModal">
                    Modifier
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
                            <label for="contact_mode" class="form-label">Action menée</label>
                            <input type="text" class="form-control" name="contact_mode" placeholder="Mail, téléphone, entretien,..." required/>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-7">
                            <label for="person_contacted" class="form-label">Personne contacté</label>
                            <input type="text" class="form-control" name="person_contacted" placeholder="R.H, Service comptabilité,..." required/>
                        </div>
                        <div class="col-5">
                            <label for="answer" class="form-label">Réponse</label>
                            <select class="form-select" id="answer" name="answer" required>
                                <option value="">...</option>
                                <option value="En attente">En attente</option>
                                <option value="Refus">Refus</option>
                                <option value="Accepté">Accepté</option>
                                <option value="Signé">Signé</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="comment" class="form-label">Commentaires</label>
                            <textarea type="text" class="form-control" name="comment" placeholder="Commentaire" rows="4"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="enterprise_id" value="{{ $enterpriseId }}" />
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
    $('#editFollowUpModal').on('hidden.bs.modal', function () {
        $('input, select, textarea, #editFollowUpModal .btn').prop('disabled', false);
    })

    function openCreateModal() {
        $('#id').val("");
        $('#btnEditFollowUp').attr('onclick', 'editFollowUp()');
    }
    function openUpdateModal(id) {
        id = parseInt(id);
        $('#id').val(id);
        $('#date').attr('disabled', true);
        $('#btnEditFollowUp').attr('onclick', 'editFollowUp(' + id +')');
        getFollowUp(id);
    }
    function openConsultModal(id) {
        id = parseInt(id);
        $('#id').val(id);
        $('#btnEditFollowUp').attr('disabled', true);
        $('input, textarea, select').attr('disabled', true);
        getFollowUp(id);
    }

    function getFollowUp(id) {
        $.ajax({
            type: 'GET',
            url: '/api/follow-up/' + id,
            success: function (data) {
                $('input[name=date]').val(data.date);
                $('input[name=contact_mode]').val(data.contact_mode);
                $('input[name=person_contacted]').val(data.person_contacted);
                $('select[name=answer]').val(data.answer);
                $('textarea[name=comment]').val(data.comment);
                $('input[name=enterprise_id]').val(data.enterprise_id);
            }
        })
    }
    function editFollowUp(idFollowUp) {
        let url, type;
        let date = $('input[name=date]').val();
        let contact_mode = $('input[name=contact_mode]').val();
        let person_contacted = $('input[name=person_contacted]').val();
        let answer = $('select[name=answer]').val();
        let comment = $('textarea[name=comment]').val();
        let enterprise_id = $('input[name=enterprise_id]').val();

        if(idFollowUp){
            url = '/api/follow-up/' + idFollowUp;
            type = 'PUT';
        }

        else {
            url = '/api/follow-up';
            type = 'POST'
        }

        $.ajax({
            type: type,
            url: url,
            data: {
                date: date,
                contact_mode: contact_mode,
                person_contacted: person_contacted,
                answer: answer,
                comment: comment,
                enterprise_id: enterprise_id
            },
            success: function () {
                alert('ceb');
            }
        })
    }
</script>
@endsection
