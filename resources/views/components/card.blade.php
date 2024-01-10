<div class="card card-custom shadow p-3" style="width: 18rem;">
    <img src="{{ !$product->images()->get()->isEmpty()? $product->images()->first()->getUrl(400, 300) : '/media/default.png' }}"
        class="card-img-top" alt="Immagine Annuncio">

    <div class="card-body p-0">
        <div>
            <h5 class="card-title mt-3 t-o fw-bolder text-truncate">{{ $product->name }}</h5>
        </div>
        <p class="text-body"><a class="text-decoration-none cardLink t-b fs-5"
                href="{{ route('products.filterByCategory', ['category'=> $product->category]) }}">{{ __('ui.' . $product->category->name) }}</a>
        </p>
        <p class="text-title fs-6">€{{ $product->price }}</p>
        <div class="text-end">

            <a href="{{ route('products.show', compact('product')) }}"
                class="btn btnBlu bg-b rounded-5 t-n">{{ __('ui.detailButton') }}</a>
        </div>
    </div>
</div>
