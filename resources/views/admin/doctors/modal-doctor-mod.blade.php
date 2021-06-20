<div class="modal fade" id="modal-doctor-mod-{{$doctor->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Modificar Información Doctor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            


            <form action="{{route('admin.doctors.update', $doctor->id)}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$doctor->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Especialidad</label>
                        <select class="form-control" name="specialty" id="specialty">
                            <option value="Ortodoncia" {{($doctor->specialty == "Ortodoncia") ? 'selected' : ''}}>Ortodoncia</option>
                            <option value="Ortodoncia Pediatrica" {{($doctor->specialty == "Ortodoncia Pediatrica") ? 'selected' : ''}}>Ortodoncia Pediátrica</option>
                            <option value="Maxilofacial" {{($doctor->specialty == "Maxilofacial") ? 'selected' : ''}}>Maxilofacial</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="weight">Descripción</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$doctor->description}}" required>
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