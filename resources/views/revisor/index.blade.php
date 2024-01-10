<x-layout>

    <main class="container-fluid mb-5 pb-5 ">

        <section class="row">
            @if (session('success'))
                <div class="col-12 alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="col-12 mt-5">
                <h1 class="mt-5 pt-3 t-b text-center fw-semibold">{{ __('ui.revisorArea') }}</h1>
                <h2 class="t-o text-center my-3">
                    {{ $announcementToCheck ? __('ui.hereAreTheAdsToReview') : __('ui.thereAreNoAdsToReview') }}
                </h2>

            </div>
        </section>

        @if ($announcementToCheck)
            <section class="row justify-content-center">
                <article class="col-12 col-md-6 d-flex justify-content-center">
                    @if ($announcementToCheck->images->isNotEmpty())
                        <div id="carouselExample" class="carousel slide d-flex">
                            <div class="carousel-inner">
                                @foreach ($announcementToCheck->images as $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <div class=" d-flex justify-content-center">
                                            <img class="img-fluid p-3 rounded-5" src="{{ $image->getUrl(400, 300) }}"
                                                alt="Immagine annuncio">
                                        </div>

                                        <h5 class="tc-accent text-center mt-3 t-b">{{ __('ui.imagesRevision') }}</h5>
                                        <div class=" d-flex">

                                            <div
                                                class="card-body d-flex align-items-center justify-content-center gap-md-3 gap-2">
                                                <p>{{ __('ui.adult') }}: <span class="{{ $image->adult }}"></span></p>
                                                <p>{{ __('ui.spoof') }}: <span class="{{ $image->spoof }}"></span></p>
                                                <p>{{ __('ui.medical') }}: <span class="{{ $image->medical }}"></span>
                                                </p>
                                                <p>{{ __('ui.violence') }}: <span
                                                        class="{{ $image->violence }}"></span></p>
                                                <p>{{ __('ui.racy') }}: <span class="{{ $image->racy }}"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev mb-md-3 mb-5" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon ms-4  mb-5" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next mb-md-3 mb-5" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="next">
                                <span class="carousel-control-next-icon me-4  mb-5" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @else
                        <img src="/media/default.png" class="img-fluid w-75 p-3 rounded"
                            alt="Immagine default dell'annuncio">
                    @endif
                </article>
            </section>
            <div class="row justify-content-center ">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title mt-3 t-b">{{ __('ui.name') }} : {{ $announcementToCheck->name }}</h5>
                    <p class="card-text my-2 t-b text-wrap description-box w-50 text-center">
                        {{ __('ui.description') }}:
                        {{ $announcementToCheck->description }}</p>
                    <p class="card-footer t-b">{{ __('ui.createIn') }}:
                        {{ $announcementToCheck->created_at->format('d/m/Y') }} {{ __('ui.from') }}:
                        {{ Auth::User()->name }} </p>
                </div>

                <div class="col-12 col-md-5 col-lg-5 text-center">
                    <form action="{{ route('revisor.rejectAnnouncement', ['announcement' => $announcementToCheck]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="btn rounded-5 btn-outline-danger w-25 shadow">{{ __('ui.refuseButton') }}</button>
                    </form>
                </div>
                <div class="col-12 div col-md-5 col-lg-5 text-center">
                    <form action="{{ route('revisor.acceptAnnouncement', ['announcement' => $announcementToCheck]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="btn rounded-5 mb-2 btn-outline-success w-25 shadow">{{ __('ui.acceptButton') }}</button>
                    </form>
                </div>
            </div>
        @endif
    </main>




    <section class="container">
        <div class="row justify-content-center ">
            <div class="col-12 my-5 pt-5 ">
                <h2 class="text-center t-b fw-semibold fs-1">{{ __('ui.history') }}</h2>
            </div>
            @foreach ($announcementsChecked as $product)
                <article class="col-8 col-md-6 col-lg-4 justify-content-center my-3 gap-4">
                    <div class="card card-custom shadow p-3">
                        <img src="{{ !$product->images()->get()->isEmpty()? $product->images()->first()->getUrl(400, 300): '/media/default.png' }}"
                            class="card-img-top" alt="Immagine default dell'annuncio">

                        <div class="card-body p-0">
                            <div>
                                <h5 class="card-title mt-3 t-o fw-bolder text-truncate">{{ $product->name }}</h5>
                            </div>
                            <p class="text-body"><a class="text-decoration-none cardLink t-b fs-5"
                                    href="{{ route('products.filterByCategory', ['category' => $product->category]) }}">{{ __('ui.' . $product->category->name) }}</a>
                            </p>
                            <p class="text-title fs-6 card-div text-truncate"><span
                                    class="t-b">{{ __('ui.description') }}:</span>
                                <br>{{ $product->description }}
                            </p>

                            @if ($product->is_accepted)
                                <div class="d-flex justify-content-center align-items-end">
                                    <form action="{{ route('products.destroy', compact('product')) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn rounded-5 btn-outline-danger shadow ">{{ __('ui.cancelButton') }}</button>
                                    </form>
                                </div>
                            @else
                                <div class="d-flex justify-content-around">
                                    <form action="{{ route('products.destroy', compact('product')) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="btn rounded-5 btn-outline-danger shadow">{{ __('ui.cancelButton') }}</button>
                                    </form>
                                    <form
                                        action="{{ route('revisor.acceptAnnouncement', ['announcement' => $product]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="btn rounded-5 btn-outline-success shadow">{{ __('ui.acceptButton') }}</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center">
                    {{ $announcementsChecked->links() }}
                </div>
            </div>
        </div>
    </section>


</x-layout>
