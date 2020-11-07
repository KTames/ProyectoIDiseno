@extends('layouts.horizontal-layout')

@section('links')
    <link rel="stylesheet" href="{{ mix('css/miembros.css') }}">
    <link rel="stylesheet" href="{{ mix('css/ippopup.css') }}">
@endsection

@section('content')
    <div class="row mx-4  mb-2 px-2 d-flex ">

        <div class="col-md-5 col-sm-12 d-flex my-3">
            <div class="row mx-0 d-flex justify-content-center">
                <div class="">
                    <h2 class="nunito-bold">Catalogo de miembros</h2>
                </div>

                <div class="col-11 mt-2">
                    <label class="mr-5">Filtrar por:</label>
                    <input class="input-shadow w-100 mr-2 mb-3" type="text" class="form-control inner-shadow " id="filterby" name="filtrar" placeholder="Valor a buscar">
                    <button class="btn btn-primary btn-block shadow btn-green-moon" type="submit">Buscar</button>
                </div>
                <div class="col-md-12 col-sm-12  ml-5 mt-3">
                    <input class="ml-2" type="radio" id="identification" name="filter" value="identification">
                    <label for="identification">Identificación</label>
                    <input class="ml-3" type="radio" id="name" name="filter" value="name">
                    <label for="name">Nombre</label>
                </div>
            </div>
        </div>

        <div class="col-md-3 ml-5 line-left ">
            <div class="row ">
                <div class="col-md-12 ml-5 my-2 px-0">
                    <p class="nunito-bold py-1" >Agregar miembro</p>
                    <button class="btn btn-primary shadow mx-9 btn-green-moon" type="submit">Agregar nueva persona</button>
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


    <h4 class="pt-5">Lista de miembros</h4>
    <div class="box mt-4 my-custom-scrollbar">

        <table class="table table-hove tableFixHead">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Identificación</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col">Información Personal</th>
                <th scope="col">Posiciones en jerarquía</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody >
              @foreach ($miembros as $miembro)
              {{-- @isset($miembro) --}}
              <tr>
                <th scope="row">{{ $miembro->identificacion }}</th>
                <td>{{ $miembro->nombreCompleto }}</td>
                <td>{{ $miembro->telefono }}</td>
                <td>{{ $miembro->email }}</td>
                <td>
                        <button class="btn btn-primary shadow btn-green-moon" class="editButton" type="submit" onclick="showModal({{ $miembro }})">Editar</button>
                </td>
                <td><button class="btn btn-primary shadow btn-green-moon mx-4" type="submit" onclick="showModalPrueba({{ $miembro }})">Ver</button></td>
                <td>
                  <form action="{{ route('miembros.destroy', $miembro) }}" method="post">
                      @method('delete')
                      @csrf
                      <button class="btn btn-primary shadow btn-red" type="submit">Eliminar</a>
                    </form>
                </td>
              </tr>

              {{-- @endisset --}}
              @endforeach
            </tbody>
          </table>
    </div>

    @include('partials.ippopup')

    <script type="text/javascript">
        function showModal(args) {
            $('#popup').modal('show');
        }
    </script>
    @include('partials.asignar-grupo')
    <script type="text/javascript">
        function showModalPrueba(args) {
            $('#asignarGrupoModal').modal('show');
        }
    </script>
    {{-- {{ dd($miembros) }} --}}
@endsection
