<x-layout>

    <div class="board d-flex align-items-center">
        <h1 class="ms-md-5 ps-md-5 board-text t-o ms-5">{{ __("ui.$category->name") }}</h1>
    </div>
    <section class="container-fluid d-flex">
        <div class="row justify-content-center  my-4 w-100">
            <h2 class="text-center fs-1 t-b mb-2">{{ __('ui.explore') }}</h2>
            <article class="col-12 flex-wrap d-flex gap-4 justify-content-center mt-5">
                @forelse ($category->products->where('is_accepted', true) as $product)
                    <x-card :product='$product' />
                @empty
                    <h3 class="text-center fs-4 mt-2 t-b">{{ __('ui.NoAnnouncements') }}<span
                            class="fw-semibold t-o">{{ __("ui.$category->name") }}</span>, <a
                            href="{{ route('products.create') }}">{{ __('ui.createOne') }}</a> </h3>
                @endforelse

            </article>

        </div>
    </section>



</x-layout>
