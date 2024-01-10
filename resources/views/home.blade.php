<x-layout>
    <header
        class="container-fluid headerHome mt-0 vh-100 sfondoHeader bg-white d-flex align-items-center justify-content-center bgHeader shadow-lg">

        <article class="row w-100">
            <div class="col-12 col-md-6 col-lg-6  text-center ms-md-5 ps-md-5">
                <h1 class="t-b m-0 h1-home ms-md-5 ">PRESTO</h1>
                <div class="text-center">
                    <div class="content d-flex justify-content-center ps-md-5 ">
                        <div class="content__container">
                            <p class="content__container__text t-b">
                                {{ __('ui.hello') }}
                            </p>
                            <ul class="content__container__list">
                                <li class="content__container__list__item t-b">{{ __('ui.word') }}!</li>
                                <li class="content__container__list__item t-b">
                                    @if (Auth::user())
                                        {{ Auth::User()->name }}
                                    @else
                                        {{ __('ui.user') }}!
                                    @endif
                                </li>
                                <li class="content__container__list__item t-b">{{ __('ui.everyone') }}!</li>
                                <li class="content__container__list__item t-b">
                                    @if (Auth::user())
                                        {{ Auth::User()->name }}
                                    @else
                                        {{ __('ui.user') }}!
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a class="btn fs-5 text-white btnOrange rounded-5 bg-o mt-3 ms-4"
                    href="{{ route('products.create') }}">{{ __('ui.insertAnnouncement') }}</a>
            </div>
        </article>
    </header>




    <section class="container-fluid sfondoUltimAnn">
        <div class="row">
            <div class="col">
                <h2 class="text-center mb-5 pt-3 mt-5 t-b">{{ __('ui.latestAnnouncements') }}</h2>
            </div>
        </div>
    </section>
    <section class="container">
        <article class="row justify-content-center mb-5 gap-4">
            @foreach ($products as $product)
                <x-card :product='$product' :category='$product->category' />
            @endforeach
        </article>
    </section>



</x-layout>
