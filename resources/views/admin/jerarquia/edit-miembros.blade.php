@extends('layouts.horizontal-layout')

@section('links')
    <link rel="stylesheet" href="{{ mix('css/edit-miembros.css') }}">
@endsection

@section('content')
    <div class="row mx-4  mb-2 px-2 d-flex ">

        <div class="col-md-5 col-sm-12 d-flex my-3 mr-3">
            <div class="row mx-0 ">
                <div class="pl-5">
                    <h2 class="nunito-bold">Editar miembros</h2>
                </div>

                <div class="col-md-12 col-sm-12 ml-5 mt-3 ">
                    <label class="mr-5">Filtrar por:</label>
                    <input class="filterby mr-2 mb-3" type="text" class="form-control inner-shadow " id="filterby" name="filtrar" placeholder="Valor a buscar">
                    <button class="btn btn-primary btn-block shadow btn-green-moon" type="submit">Buscar</a>
                </div>
                <div class="col-md-12 col-sm-12  ml-5 mt-3">
                    <input class="ml-2" type="radio" id="identification" name="filter" value="identification">
                    <label for="identification">Identificación</label>
                    <input class="ml-3" type="radio" id="name" name="filter" value="name">
                    <label for="name">Nombre</label>
                </div>
            </div>
        </div>

        <div class="col-md-3 ml-5 line-left">
            <div class="row ">
                <div class="custom-control custom-checkbox">
                    <div class="col-md-12 ml-5 my-2 px-0">
                        <p class="nunito-bold" >Mostrar roles</p>
                        <div class="col-md-12 ml-5 my-2 px-0">
                            <input type="checkbox" class="custom-control-input " id="noAsignado">
                            <label class="custom-control-label" for="noAsignado">No asignado</label>
                        </div>
                        <div class="col-md-12 ml-5 my-2 px-0">
                            <input type="checkbox" class="custom-control-input" id="miembro">
                            <label class="custom-control-label" for="miembro">Miembro</label>
                        </div>
                        <div class="col-md-12 ml-5 my-2 px-0">
                            <input type="checkbox" class="custom-control-input" id="monitor">
                            <label class="custom-control-label" for="monitor">Monitor</label>
                        </div>
                        <div class="col-md-12 ml-5 my-2 px-0">
                            <input type="checkbox" class="custom-control-input" id="jefe">
                            <label class="custom-control-label" for="jefe">Jefe</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md mx-4">
            <div class="row d-flex justify-content-end ml-0 pl-0">
                <img src="{{ session('movimiento')->logo }}" alt="Logo {{ session('movimiento')->nombre }}" class="movement-logo">
                <span class="d-md-none d-sm-block space-separator"></span>
            </div>
        </div>
    </div>


    <h4 class="pl-5 pt-5">Lista de miembros</h4>
    <div class="box row mt-5 d-flex mx-2 my-custom-scrollbar">

        <table class="table table-hover tableFixHead">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Identificación</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
                <th scope="col"> </th>
              </tr>
            </thead>
            <tbody >
                @foreach ($miembros as $i => $miembro)
                    <tr>
                        <th scope="row">{{ $miembro->identificacion }}</th>
                        <td>{{ $miembro->nombreCompleto }}</td>
                        <td>{{ $miembro->enabled}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary ddbutton">Action</button>
                                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split ddbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Jefe</a>
                                    <a class="dropdown-item" href="#">Monitor</a>
                                    <a class="dropdown-item" href="#">Miembro</a>
                                </div>
                            </div>
                        </td>
                        <td><button class="btn btn-primary shadow btn-red" type="submit">Eliminar</a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <script>
        $(document).ready(function(){
            $(".editButton").click(function(){
                alert("Sirvo");
                $('#popup').modal('show');
            });
        });
    </script>
@endsection

