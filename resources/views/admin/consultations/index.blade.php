@extends('adminlte::page')

@section('title', 'Consultas')

@section('content_header')
    <h1>Consultas registradas</h1>
    <br>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-consulta">
        + Registrar Consulta
    </button>
@stop


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-body">
            


            @if($errors->any())
            <div class="alert alert-warning" role="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif </br>



                <table id="patientTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th># Consulta</th>
                            <th>Nombre Doctor</th>
                            <th>Nombre Paciente</th>
                            <th>Fecha Consulta</th>
                            <th>Hora de Consulta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultations as $consultation)
                        <tr>
                            <td>{{$consultation->idcons}}</td>
                            <td>{{$consultation->dname}}</td>
                            <td>{{$consultation->pname}}</td>
                            <td>{{$consultation->consultation_date}}</td>
                            <td>{{$consultation->consultation_time}}</td>
                            <td>
                                <button class="btn btn-info" data-toggle="modal" data-target="#modal-consulta-mod-{{$consultation->idcons}}">Editar</button>
                                <br><br>
                                <form action="{{route('admin.consultations.delete', $consultation->idcons)}}" method="post">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>

                        @include('admin.consultations.modal-consulta-mod')
                        @endforeach  
                    </tbody>
                    
                </table>
            </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-consulta">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Consulta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.consultations.store')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                   
                    <div class="form-group">
                        <label for="doctor_id">Doctor</label>
                        <select class="form-control" name="doctor_id" id="doctor_id">
                            @foreach($doctors as $doctor)
                            <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-group">
                        <label for="patient_id">Paciente</label>
                        <select class="form-control" name="patient_id" id="patient_id">
                            @foreach($patients as $patient)
                            <option value="{{$patient->id}}">{{$patient->name}}</option>
                            @endforeach
                        </select> 
                    </div>

                    <div class="form-group">
                        <label for="consultation_date">Fecha de Consulta</label>
                        <input type="date" class="form-control" name="consultation_date" id="consultation_date" required>
                    </div>

                    <div class="form-group">
                        <label for="consultation_time">Hora de Consulta</label>
                        <input type="time" class="form-control" name="consultation_time" id="consultation_time" required>
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




@stop

@section('js')
<script src="{{ asset('js/admin/patient/main.js')}}"></script>
@stop

