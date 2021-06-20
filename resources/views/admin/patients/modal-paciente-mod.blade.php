<div class="modal fade" id="modal-paciente-mod-{{$patient->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Modificar Información Paciente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            


            <form action="{{route('admin.patients.update', $patient->id)}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$patient->name}}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="gender">Sexo</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="Femenino" {{($patient->gender == "Femenino") ? 'selected' : ''}}>Femenino</option>
                            <option value="Masculino" {{($patient->gender == "Masculino") ? 'selected' : ''}}>Masculino</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="weight">Peso</label>
                        <input type="text" class="form-control" name="weight" id="weight" value="{{$patient->weight}}" required>
                    </div>
                    <div class="form-group">
                        <label for="height">Altura</label>
                        <input type="text" class="form-control" name="height" id="height" value="{{$patient->height}}" required>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" value="{{$patient->date_of_birth}}" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>