<x-layout>
    <section class="container-fluid sfondoAnnunci">
        <article class="row justify-content-center pt-5">
            <div class="col col-12 mt-5 text-center">
                <h2 class="text-center  mt-5 pt-3 t-o fs-1 ">{{ __('ui.allAnnouncements') }}</h2>
            </div>
            {{-- SEARCH --}}
            <div class="col-12 col-md-6 mt-4 text-center">
                <form class="w-100 d-flex" method="GET" action="{{ route('products.search') }}">
                    <input aria-label="search" placeholder="{{ __('ui.search') }}" class="form-control" name="searched"
                        type="search">
                    <button class="btn bg-o rounded-5 ms-3 text-white btnOrange"
                        type="submit">{{ __('ui.search') }}</button>
                </form>
            </div>
        </article>

    </section>

    {{-- CATEGORIE   --}}
    <section class="container-fluid min-wh-100 ">

        <article class="row justify-content-center mb-5">
            <h2 class="text-center t-b mb-5">{{ __('ui.categories') }}</h2>
            {{-- <div class="col-12 d-flex justify-content-center mb-5 mt-4 gap-3"> --}}
            @foreach ($categories as $category)
                <div class="col-3 p-0 ms-3  gap-md-3 gap-2 flex-wrap d-flex col-md-1 rounded-5 justify-content-center">
                    <div class="m-0">
                        <i class="fa-solid icone t-o fs-2 mt-md-0 mt-3 fa-{{ __("ui.$category->id") }}"></i>
                    </div>
                    <a class="box_categories btn btn-custom rounded-5 d-flex justify-content-center align-items-center"
                        href="{{ route('products.filterByCategory', compact('category')) }}">{{ __("ui.$category->name") }}</a>
                </div>
            @endforeach
            {{-- </div> --}}
        </article>

        {{-- PRODOTTI --}}
        <article class="row mt-3">
            <div class="col-12 flex-wrap d-flex gap-4 justify-content-center">
                @forelse ($products as $product)
                    <x-card :product='$product' :category='$product->category' />
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning py-5">
                            <p class="lead">{{ __('ui.thereAreNoAds') }}</p>
                        </div>
                    </div>
                @endforelse

            </div>
        </article>


        <article class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </article>
    </section>





</x-layout>
