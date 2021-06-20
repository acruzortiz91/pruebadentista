<div class="modal fade" id="modal-consulta-mod-{{$consultation->idcons}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Modificar Información de Consulta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            


            <form action="{{route('admin.consultations.update', $consultation->idcons)}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="doctor_id">Doctor</label>
                        <select class="form-control" name="doctor_id" id="doctor_id">
                            @foreach($doctors as $doctor)
                            <option value="{{$doctor->id}}" {{($doctor->id == $consultation->doctor_id) ? 'selected' : ''}} >{{$doctor->name}}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-group">
                        <label for="patient_id">Paciente</label>
                        <select class="form-control" name="patient_id" id="patient_id">
                            @foreach($patients as $patient)
                            <option value="{{$patient->id}}" {{($patient->id == $consultation->patient_id) ? 'selected' : ''}}>{{$patient->name}}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-group">
                        <label for="consultation_date">Fecha de Consulta</label>
                        <input type="date" class="form-control" name="consultation_date" id="consultation_date" value="{{$consultation->consultation_date}}" required>
                    </div>

                    <div class="form-group">
                        <label for="consultation_time">Hora de Consulta</label>
                        <input type="time" class="form-control" name="consultation_time" id="consultation_time" value="{{$consultation->consultation_time}}" required>
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