@section('links')
<link rel="stylesheet" href="{{ mix('css/ippopup.css') }}">
@endsection

<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popup" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <input class="personalInfo  mr-2 mb-3" type="text" class="form-control inner-shadow " id="name" name="nombre" placeholder="nombre">
                        <input class="personalInfo  mr-2 mb-3" type="text" class="form-control inner-shadow " id="lastname" name="apellido" placeholder="lastname">
                        <input class="personalInfo mr-2 mb-3" type="text" class="form-control inner-shadow " id="phone" name="telefono" placeholder="telefono">
                        <input class="personalInfo mr-2 mb-3" type="text" class="form-control inner-shadow " id="email" name="email" placeholder="email">
                        <input class="personalInfo mr-2 mb-3" type="text" class="form-control inner-shadow " id="province" name="provinica" placeholder="provincia">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
