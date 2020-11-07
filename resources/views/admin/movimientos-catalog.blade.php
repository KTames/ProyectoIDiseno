@extends('layouts.general-layout')

@section('hlinks')
    <link rel="stylesheet" href="{{ mix('css/movimientos-catalog.css') }}">
@endsection

@section('hcontent')
    <form method="POST" action="{{ route('movimiento.create') }}" >
        @csrf
        @method('POST')
        <div class="row mx-4  mb-2 px-2 d-flex">

            <div class="col-md-3 col-sm-12 d-flex my-3">
                <h2 class="nunito-bold">Catalogo de movimientos</h2>
            </div>
            <div class="col-md-6 col-sm-12 d-flex my-3 line-left">
                <div class="row mx-0 d-flex justify-content-center">
                    <div class="col-md-6 mt-2">
                        <label class="mr-5">Cédula Jurídica</label>
                        <input class="innerShadow w-100 mr-2 mb-3" type="text" class="form-control" id="cedulaJuridica"
                               name="cedulaJuridica" placeholder="0123456789...">
    
                        <label class="mr-5">Nombre</label>
                        <input class="innerShadow w-100 mr-2 mb-3" type="text" class="form-control" id="nombre"
                               name="nombre" placeholder="Fulanito Menganito...">
    
                        <label class="mr-5">Pais</label>
                        <input class="innerShadow w-100 mr-2 mb-3" type="text" class="form-control" id="country"
                                name="country" placeholder="Costa Rica">
    
                        <label class="mr-5">Provincia</label>
                        <input class="innerShadow w-100 mr-2 mb-3" type="text" class="form-control" id="provincia"
                                name="provincia" placeholder="Cartago">
                    </div>
                    <div class="col-md-6 mt-2">
                        <label class="mr-5">Canton</label>
                        <input class="innerShadow w-100 mr-2 mb-3" type="text" class="form-control" id="canton"
                                name="canton" placeholder="Oreamuno">
                        <label class="mr-5">Distrito</label>
                        <input class="innerShadow w-100 mr-2 mb-3" type="text" class="form-control" id="distrito"
                                name="distrito" placeholder="San Rafael">
                        <label class="mr-5">Dirección Web</label>
                        <input class="innerShadow w-100 mr-2 mb-3" type="text" class="form-control" id="dirWeb"
                               name="dirWeb" placeholder="www.movimiento.com">
                        <label class="mr-5">Dirección geográfica</label>
                        <input class="innerShadow w-100 mr-2 mb-3" type="text" class="form-control" id="dirFisica"
                               name="dirFisica" placeholder="100 metros sur de la supermercado X">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 d-flex my-3">
                <div class="mx-0">
                    <div id="telefonos">
                        <div id="template" class="d-none">
                            <div class="position-relative">
                                <button class="eliminar"></button>
                                <input type="text" class="telefono position-relative innerShadow mt-1">
                            </div>
                        </div>
                        <label>Telefonos</label>
                        <button class="btn btn-primary btn-green-moon ml-3 " onclick="nuevoTelefono()">Agregar</button>
                        <div class="horizontal-scroll">
                        </div>
                        <label class="mr-5">Logo</label>
                        <input class="innerShadow w-100 mr-2 mb-3" type="text" class="form-control" id="logo" name="logo"
                               placeholder="nombreLogo.jpg">
                        <button class="btn btn-primary btn-green-moon mt-5">Agregar movimiento</button>
                    </div>
    
                </div>
            </div>
        </div>
    </form>
    

        <div>
            <div class="box d-flex mx-5 mt-5 justify-content-center my-custom-scrollbar">
                <table class="table table-hove tableFixHead  ">

                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Cedula Juridica</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion web</th>
                        <th scope="col">Direccion geográfica</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Logo</th>
                        <th scope="col"> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach  ($movimientos as $movimiento)
                        <tr>
                            <th scope="row">{{ $movimiento->cedulaJuridica }}</th>
                            <td>{{ $movimiento->nombre }}</td>
                            <td>{{ $movimiento->direccionWeb }}</td>
                            <td>{{ $movimiento->sennas }}</td>
                            <td>8888 8888</td>
                            <td><img src="{{ $movimiento->logo }}" alt="logo" width="50" height="50"></td>
                            <td> <a href="{{ route('admin', compact('movimiento')) }}" class="btn btn-primary shadow">Administrar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection

@section('hscripts')
    <script>
        let cantChilden = 0;

        function nuevoTelefono() {
            const template = $("#template").clone();
            console.log(template);

            template.removeClass('d-none');
            const btnEliminar = $(template).find('.eliminar')[0];

            const ref = cantChilden.valueOf();

            $(btnEliminar).click(function () {
                eliminarTelefono(ref);
            });

            const telefono = $(template).find('.telefono')[0];
            $(telefono).attr('name', 'telefonos[]');

            $(template).attr('id', "telefono" + cantChilden.valueOf());

            $(".horizontal-scroll").append(template);

            cantChilden++;
        }

        function eliminarTelefono(id) {
            console.log(id);
            $("#telefono" + id).remove();
        }
    </script>
@endsection
