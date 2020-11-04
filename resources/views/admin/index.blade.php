@extends('layouts.horizontal-layout')

@section('links')
    <link rel="stylesheet" href="{ ('css/admin.index.css') }">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="row ml-4">
        <div class="col-md-5 col-sm-12 ">
            <div class="row ">
                <div class="col-12 col-md-4">
                    <img src="{{ asset('img/logoTreeGarden.png') }}" height="190" width="140" alt="Logo">
                </div>
                <div class="col-12 col-md">
                    @include('admin.__text-item', [
                        'title' => 'Movimiento: ',
                        'text' => 'Tree Garden'
                    ])
                    @include('admin.__text-item', [
                        'title' => 'Cedula juridica: ',
                        'text' => '3-TTT-CCCCCC'
                    ])
                    @include('admin.__text-item', [
                        'title' => 'Raiz: ',
                        'text' => 'Coordinación CR'
                    ])
                    @include('admin.__text-item', [
                        'title' => 'www-treegarden.org',
                        'text' => ' '
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-1 my-2 ">
            <img src="{{ asset('img/indexVerticalLine.png') }}" height="120" alt="Line">
        </div>
        <div class="col-md-5 col-sm-12 mx-0 my-0">
            <div class="row ">
                <div class="col-12 col-md-6">
                    @include('admin.__text-item', [
                        'title' => 'País: ',
                        'text' => 'Costa Rica'
                    ])
                    @include('admin.__text-item', [
                        'title' => 'Provincia: ',
                        'text' => 'Cartago'
                    ])
                    @include('admin.__text-item', [
                        'title' => 'Señas:',
                        'text' => ' San blas'
                    ])
               </div>
                <div class="col-12 col-md">
                    @include('admin.__text-item', [
                        'title' => 'Cantón: ',
                        'text' => 'Paraíso'
                    ])
                    @include('admin.__text-item', [
                        'title' => 'Distrito: ',
                        'text' => 'Orosi'
                    ])
                </div>
            </div>

        </div>
    </div>

    <div class="row ml-3">
        <div class="col-md-3 col-sm-12 my-2 shadow rounded">
            @include('admin.__info-item', [
                'number' => '85 ',
                'description' => 'Miembros Activos ',
                'pngImage' => 'indexMember'
            ])

        </div>
        <div class="col-md-1 my-2 ">
        </div>
        <div class="col-md-3 col-sm-12 my-2 shadow rounded">
            @include('admin.__info-item', [
                'number' => '57',
                'description' => 'Nodos creados',
                'pngImage' => 'indexCreatedNodes'
            ])

        </div>
        <div class="col-md-1 my-2 ">
        </div>
        <div class="col-md-3 col-sm-12 my-2   shadow rounded">
            @include('admin.__info-item', [
                'number' => '35',
                'description' => 'Nodos finales',
                'pngImage' => 'indexFinalNodes'
            ])
        </div>
        <div class="col-md-1 my-2 ">
        </div>

    </div>

    <div class="row ml-3 my-5">
        <div class="col-md-12 justify-content-center">
            <img src="{{ asset('img/indexHorizontalLine.png') }}"  width="1000" alt="">
        </div>
    </div>

    <div class="row row-content ml-3">
        <div class="col-12">
            <h6 class="nunito-bold">Editar datos del movimiento</h6>
        </div>
        <div class="col-12 col-md-12">
            <form>
                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">Nombre</label>
                    <label for="country" class="col-md-3 col-form-label">Pais</label>
                    <label for="canton" class="col-md-3 col-form-label">Canton</label>
                    <label for="signals" class="col-md-3 col-form-label">Señas</label>
                    <div class="col-md-3 ">
                        <input type="text" class="form-control inner-shadow " id="name" name="name" >
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control inner-shadow " id="country" name="country" >
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control inner-shadow " id="canton" name="canton" >
                    </div>
                    <div class="col-md-3">
                        <textarea class="form-control inner-shadow " id="signals" name="signals" rows="2"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="web" class="col-md-3 col-form-label">Sitio web</label>
                    <label for="state" class="col-md-3 col-form-label">Provincia</label>
                    <label for="district" class="col-md-6 col-form-label">Distrito</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control inner-shadow " id="web" name="web" >
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control inner-shadow " id="state" name="state" >
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control inner-shadow " id="district" name="district" >
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin') }}" class="btn btn-primary shadow mx-9">Actualizar</a>
                    </div>
                </div>
            </form>

        </div>
            <div class="col-12 col-md">
        </div>
       </div>

    </div>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
@endsection
