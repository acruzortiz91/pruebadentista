@extends('adminlte::page')

@section('title', 'Doctor')

@section('content_header')
    <h1>Listado de doctores</h1>
    <br>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-doctor">
        + Registrar Doctor
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
                            <th># Doctor</th>
                            <th>Nombre Completo</th>
                            <th>Especialidad</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doctor)
                        <tr>
                            <td>{{$doctor->id}}</td>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->specialty}}</td>
                            <td>{{$doctor->description}}</td>
                            <td>
                                <button class="btn btn-info" data-toggle="modal" data-target="#modal-doctor-mod-{{$doctor->id}}">Editar</button>
                                <br><br>
                                <form action="{{route('admin.doctors.delete', $doctor->id)}}" method="post">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                                
                            </td>
                        </tr>

                        @include('admin.doctors.modal-doctor-mod')
                        @endforeach  
                    </tbody>
                    
                </table>
            </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-doctor">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Añadir Doctor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admin.doctors.store')}}" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Especialidad</label>
                        <select class="form-control" name="specialty" id="specialty">
                            <option value="Ortodoncia">Ortodoncia</option>
                            <option value="Ortodoncia Pediatrica">Ortodoncia Pediátrica</option>
                            <option value="Maxilofacial">Maxilofacial</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label for="weight">Descripción</label>
                        <input type="text" class="form-control" name="description" id="description" required>
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

