<div class=" text-item  row px-2 justify-content-center my-2  overflow-hidden  ">
    <div class="d-flex flex-column col-md-6 col-sm-12 mx-2">
        <span class="nunito-bold my-2">{{ $number }}</span>
        <p>{{ $description }}</p>
    </div>
    <div class="d-flex flex-column col-md col-sm-12 my-2 mx-2">
        <img src="{{ asset("img/{$pngImage}.png") }}" height="50" width="50"alt="{{ $pngImage }}">
    </div>
</div>
