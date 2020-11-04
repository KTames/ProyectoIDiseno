<div class=" text-item row px-2 d-flex justify-content-center my-2  overflow-hidden  ">
    <div class="d-flex flex-column col-md-6 col-sm-12 mx-2">
        <h4 class="nunito-bold my-2">{{ $number }}</h4>
        <p>{{ $description }}</p>
    </div>
    <div class="d-flex col-md col-sm-12 my-2 mx-2">
        <img src="{{ asset("img/{$pngImage}.png") }}" height="50" width="50" alt="{{ $pngImage }}">
    </div>
</div>
