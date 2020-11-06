
<link rel="stylesheet" href="{{ mix('css/asignar-grupo.css') }}">

<div id="asignarGrupoModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md" role="content">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title nunito-bold">Asignar grupo</Table> </h3>
                <button type="button" class="close" data-dismiss="modal" >&times;</button>
            </div>
            <div class="modal-body">
                <form class="d-flex justify-content-center px-0">
                    <div>
                        <div class="form-group row align-items-center">
                        <label for="monitor1" class="col-md-12 col-form-label">Monitor 1</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control innerShadow" id="monitor1" name="monitor1" placeholder="Número de cédula">
                        </div>
                        </div>
                        <div class="form-group row align-items-center">
                        <label for="monitor2" class="col-md-12 col-form-label">Monitor 2</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control innerShadow" id="monitor2" name="monitor2" placeholder="Número de cédula">
                        </div>
                        </div>
                        <div class="form-group row align-items-center">
                        <label for="nombre" class="col-md-12 col-form-label">Nombre del grupo</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control innerShadow" id="nombre" name="nombre" placeholder="Nombre del grupo">
                        </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="offset-md-2 col-md-5">
                                <div class="form-row align-items-center">
                                    <button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-green-moon btn-sm ml-1">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
