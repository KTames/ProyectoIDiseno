@extends('layouts.horizontal-layout')

@section('links')
    <link rel="stylesheet" href="{{ mix('css/miembros.css') }}">
@endsection

@section('content')
    <div class="row mx-4  mb-2 px-2 d-flex ">

        <div class="col-lg-5 d-flex my-3">
            <div class="row mx-0 ">
                <div class="pl-5">
                    <h2 class="nunito-bold">Catalogo de miembros</h2>
                </div>

                <div class="col-md-12 ml-5 mt-3 px-0">
                    <label class="mr-5 ">Filtrar por:</label>
                    <input class="filterby mr-2 mb-3" type="text" class="form-control inner-shadow " id="filterby" name="filtrar" placeholder="Valor a buscar">
                    <button class="btn btn-primary btn-block shadow btn-green-moon" type="submit">Buscar</a>
                </div>
                <div class="col-md-12  ml-5 px-0 mt-3">
                    <input class="ml-2" type="radio" id="identification" name="filter" value="identification">
                    <label for="identification">Identificación</label>
                    <input class="ml-3" type="radio" id="name" name="filter" value="name">
                    <label for="name">Nombre</label>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-12 line-left px-lg-5 py-3">
            <div class="row ">
                <div class="col-md-12 my-2 px-0">
                    <p class="nunito-bold py-1" >Agregar miembro</p>
                    <button class="btn btn-primary shadow mx-9 btn-green-moon" type="submit">Agregar nueva persona</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mx-0">
            <div class="row d-flex justify-content-end ml-0 pl-0">
                <img src="{{ session('movimiento')->logo }}" alt="Logo {{ session('movimiento')->nombre }}" class="movement-logo">
                <span class="d-md-none d-sm-block space-separator"></span>
            </div>
        </div>
    </div>
    <h4 class="pl-5 pt-5">Lista de miembros</h4>
    <div class="box row mt-5 d-flex mx-5 my-custom-scrollbar">
        
        <table class="table table-hove tableFixHead">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Identificación</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo Electrónico</th>
                <th scope="col">información Personal</th>
                <th scope="col">Posiciones en jerarquía</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>Eliminar</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>Eliminar</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Eliminar</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Eliminar</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Eliminar</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Eliminar</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Eliminar</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Eliminar</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Eliminar</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>Larry</td>
                <td>the Bird</td>
                <td>Eliminar</td>
              </tr>
            </tbody>
          </table>
    </div>

    {{-- {{ dd($miembros) }} --}}
@endsection
