<x-layout>

    <section class="container-fluid vh-100  sfondoLogin">
        <article class="row pt-5 justify-content-center mt-5">
            <div class="col-11 col-md-5 card p-4 bg-transparent pb-5 shadow-lg form rounded-5 mt-4 mt-5">
                <h1 class="pb-3 t-b fw-">{{ __('ui.login') }}</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label t-b fs-5">{{ __('ui.emailAddress') }}</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label form-label t-b fs-5 ">{{ __('ui.password') }}</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="t-b">{{ __('ui.youAreNotYetRegistered') }} , <a class="t-o"
                            href="{{ route('register') }}">{{ __('ui.register') }}</a>
                    </p>
                    <div class="text-end">
                        <button type="submit" class="btn mt-2 bg-o rounded-5 text-white btnOrange"
                            id="btnSubmit">{{ __('ui.submitLogin') }}</button>
                    </div>

                </form>
            </div>

        </article>
    </section>

</x-layout>
