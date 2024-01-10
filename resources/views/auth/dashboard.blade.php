<x-layout>
    <div class="container-fluid sfondoDashboard">
        <div class="row justify-content-center pt-5">
            <div class="col col-12 mt-5 text-center">
                <h1 class="mt-5 pt-4 text-center h1-boardDashboard t-o">{{ __('ui.yourDashboard') }}</h1>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row ">
            <h2 class="text-center t-b">{{ __('ui.yourAds') }}</h2>
            <div class="col-12 mt-5 flex-wrap d-flex gap-4 justify-content-center">

                @foreach ($products as $product)
                    <x-card :product='$product' />
                @endforeach
            </div>

        </div>
    </div>



</x-layout>
