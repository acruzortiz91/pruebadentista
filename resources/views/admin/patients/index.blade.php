@extends('adminlte::page')

@section('title', 'Paciente')

@section('content_header')
    <h1>Listado de pacientes</h1>
    <br>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-paciente">
        + Registrar Paciente
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
                            <th># Paciente</th>
                            <th>Nombre Completo</th>
                            <th>Sexo</th>
                            <th>Peso</th>
                            <th>Altura</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->id}}</td>
                            <td>{{$patient->name}}</td>
                            <td>{{$patient->gender}}</td>
                            <td>{{$patient->weight}}</td>
                            <td>{{$patient->height}}</td>
                            <td>{{$patient->date_of_birth}}</td>
                            <td>
                                <button class="btn btn-info" data-toggle="modal" data-target="#modal-paciente-mod-{{$patient->id}}">Editar</button>
                                <br><br>
                                <form action="{{route('admin.patients.delete', $patient->id)}}" method="post">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>

                        @include('admin.patients.modal-paciente-mod')
                        @endforeach  
                    </tbody>
                    
                </table>
            </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-paciente">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Añadir Paciente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.patients.store')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Sexo</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="weight">Peso</label>
                        <input type="text" class="form-control" name="weight" id="weight" required>
                    </div>
                    <div class="form-group">
                        <label for="height">Altura</label>
                        <input type="text" class="form-control" name="height" id="height" required>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required>
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

