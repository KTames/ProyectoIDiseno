{{-- <link rel="stylesheet" href="{{ mix('css/ippopup.css') }}"> --}}

<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popup" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered "style="max-width: 30%; max-heigth:30%" role="content">
        <div class="ippopup-modal-content modal-content ">
            <div class="modal-body">
                <form >
                    <div class="form-group row">
                        <input class="personalInfo  mr-2 mb-3" type="text" class="form-control inner-shadow " id="name" name="nombre" placeholder="nombre">

                        <input class="personalInfo  mr-2 mb-3" type="text" class="form-control inner-shadow " id="lastname" name="apellido" placeholder="lastname">
                        <input class="personalInfo mr-2 mb-3" type="text" class="form-control inner-shadow " id="phone" name="telefono" placeholder="telefono">
                        <input class="personalInfo mr-2 mb-3" type="text" class="form-control inner-shadow " id="email" name="email" placeholder="email">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <input class="personalInfo mr-2 mb-3" type="text" class="form-control inner-shadow " id="province" name="provinica" placeholder="provincia">
                            </div>
                            <div class="col-md-4">
                                <input class="personalInfo mr-2 mb-3" type="text" class="form-control inner-shadow " id="canton" name="canton" placeholder="canton">
                            </div>
                            <div class="col-md-4">
                                <input class="personalInfo mr-2 mb-3" type="text" class="form-control inner-shadow " id="district" name="distrito" placeholder="distrito">
                            </div>
                        </div>
                        <input class="personalInfo mr-2 " type="text" class="form-control inner-shadow " id="senias" name="senias" placeholder="señas">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
