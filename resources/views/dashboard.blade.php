@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    textarea {
        resize: none;
    }

    .card {
        width: 25em;
    }
</style>
@section('content')
<div class="container">
    <h1 class="title-h1">Toutes les formations</h1>

    <div class="d-flex justify-content-end my-2">
        <button type="button" class="buttons button_general" data-bs-toggle="modal" data-bs-target="#add-formation_modal">Créer une formation</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-formation_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('dashboard-post')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title mx-auto fs-3 fw-bold">Formulaire ajout d'une formation</h5>
                    </div>
                    <div class="modal-body m-3">
                        <div class="mb-3">
                            <label for="class_name" class="col-form-label">Nom de la Formation</label>
                            <input type="text" class="form-control" id="class_name" name="class_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="adviser_id" class="col-form-label">Nom du conseiller</label>
                            <select class="form-select" aria-label="Default select example" id="adviser_id" name="adviser_id" required>
                                @foreach($advisers as $adviser)
                                <option value="{{ $adviser->id }}">{{ $adviser->last_name }}
                                    {{ $adviser->first_name }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->first('adviser_id'))
                            <div class="alert-danger">{{$errors->first('adviser_id')}}</div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="job_id" class="col-form-label">Nom du domaine d'activité:</label>
                            <select class="form-select" aria-label="Default select example" id="job_id" name="job_id" required>
                                @foreach($jobs as $job)
                                <option value="{{ $job->id }}">{{ $job->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Description de la
                                classe:</label>
                            <textarea class="form-control " id="description" name="description" rows="3" required></textarea>
                            @if($errors->first('description'))
                            <div class="alert-danger">{{$errors->first('description')}}</div>
                            @endif
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="buttons button_cancel" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="buttons button_save">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="">
                <tr class="table-dark">
                    <th>Formation</th>
                    <th>Nombre d'apprenant</th>
                    <th>Nombre à avoir trouvé</th>
                    <th>En l'attente d'une réponse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($Sections->count()>0)
                @foreach($Sections as $Section)
                <tr>
                    <td class="text-capitalize">{{$Section->class_name }} </td>
                    <td class="text-capitalize">{{$Section->students->count() }}</td>
                    <td>{{$Section->students()->whereHas('followUps',function($query){$query->where('answer','sign');})->count() }}</td>
                    <td>{{$Section->students()->whereHas('followUps',function($query){$query->where('answer','waiting');})->count() }}</td>
                    <td>
                        <a class="buttons button_infos" href="{{ route('dashboard-formation', $Section->id)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="table-active text-center">Aucunes Formation disponible </td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{{ $Sections->links()}}</div>
    </div>
</div>

@endsection