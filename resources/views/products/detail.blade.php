<x-layout>
    <main class="container d-flex p-0 align-items-center justify-content-center detail-container">
        <section class="row justify-content-center w-100">
            <div class="col-12 mt-3">
                <h2 class="text-center mt-5 pt-5 fs-1 t-b">{{ __('ui.articleInfo') }}</h2>
            </div>
            
            <div class="col-2 col-md-1"></div>
            <div class="col-12 col-md-5 p-0 d-flex mt-4 justify-content-center">
                <div id="carouselExample" class="carousel slide">
                    @if ($product->images)
                    <article class="carousel-inner">
                        @foreach ($product->images as $image)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img class="img-fluid rounded-5" src="{{ $image->getUrl(400, 300) }}"
                            alt="Dettaglio annuncio">
                        </div>
                        @endforeach
                    </article>
                    @else
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/media/prova.jpg" class="d-block w-100" alt="Immagine default dell'annuncio">
                        </div>
                        <div class="carousel-item">
                            <img src="/media/prova.jpg" class="d-block w-100" alt="immagine default dell'annuncio">
                        </div>
                        <div class="carousel-item">
                            <img src="/media/prova.jpg" class="d-block w-100" alt="Immagine default dell'annuncio">
                        </div>
                    </div>
                    @endif
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="col-12 col-md-2 d-flex flex-column mt-4 ms-5 ms-md-0 p-0 carousel-col justify-content-between">
    
    
        <p class="fs-4 text-uppercase t-b mb-0">{{ $product->category->name }}</p>
        <hr class="my-4 m-md-0">
        <div>
            <p class="t-b mb-1">{{ __('ui.createIn') }}: {{ $product->created_at->format('d/m/Y') }}</p>
            <p class="t-b">{{ __('ui.createBy') }}: {{ $product->user->name }}</p>
        </div>
        
        <h3 class="fw-semibold fs-2 t-b">{{ $product->name }}</h3>
        
        <div>
            <p class="fw-semibold fs-3 t-o mb-0">{{ $product->price }} €</p>
        </div>
    </div>
    
</section>
</main>



<div class="row justify-content-center w-100">
    <div class="col-2 col-md-3 ms-1"></div>
    <div class="col-12 mt-4 col-md-5 ms-5">
        <h2 class="mt-4 mb-2 t-b">{{ __('ui.mainData') }}</h2>
        <div class="d-flex gap-3">
            <p class="t-b">{{ __('ui.condition') }}:</p>
            <p>{{ $product->condition->name }}</p>
        </div>
        <hr class="my-2">
        <h2 class="mt-3 mb-2 t-b">{{ __('ui.description') }}</h2>
        <p>{{ $product->description }}</p>
    </div>
    <div class="col-12 col-md-2 ms-5"></div>
</div>




</x-layout>
