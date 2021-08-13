<div class="d-flex justify-content-end my-2">
    <button class="buttons button_general" data-bs-toggle="modal" data-bs-target="#studentModal">
        Ajouter un alternant
    </button>
</div>

<div class="modal fade" id="studentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('createStudentAccount') }}" method="POST">
                @csrf
                <input type="hidden" name="section_id" value="{{ $section->id }}">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto fs-3 fw-bold">Formulaire d'ajout d'un alternant</h5>
                </div>
                <div class="modal-body m-3">
                    <div class="mb-3">
                        <label for="first_name" class="col-form-label">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name">
                        @error('first_name', 'post')
                        <p class="form_error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="col-form-label">Nom</label>
                        <input type="text" class="form-control" id="last_name" name="last_name">
                        @error('last_name', 'post')
                        <p class="form_error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email', 'post')
                        <p class="form_error">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="col-form-label">Genre</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="man">Homme</option>
                            <option value="woman">Femme</option>
                            <option value="other">Autre</option>
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

@if($errors->post->isNotEmpty())
    <script>
        $(document).ready(function() {
            $('#studentModal').modal('show');
        });
    </script>
    @endif