
<div id="reserveModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="posiciones-modal-content modal-content">
            <div class="modal-body">
                <h4 class="modal-title nunito-bold d-flex justify-content-center">Posiciones en Jerarquía </h4>
                <div class="row d-flex justify-content-center">
                    <div class="boxPosiciones mt-4 my-custom-scrollbarPosiciones">

                        <table class="table table-hove tableFixHead">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nivel</th>
                                <th scope="col">Rol</th>
                          
                            </tr>
                            </thead>
                            <tbody>
                                 {{-- @foreach () --}}
                                   <tr>
                                        <th scope="row">Nivel</th>
                                        <td>Rol</td>
                                    </tr>
                                 {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary btn-green-moon" data-dismiss="modal">Salir</button>
                </div>
                    
            </div>
        </div>
    </div>
</div>
