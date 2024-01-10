<x-layout>

    <main class="container vh-100 sfondoRegister">
        <section class="row pt-5 my-5 justify-content-center">
            <div class="col-11 form card p-4 col-md-5 pb-4 rounded-5 mt-4 bg-transparent shadow-lg">
                <h1 class=" mb-4 t-b ">{{ __('ui.register') }}</h1>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fs-5">{{ __('ui.username') }}</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fs-5">{{ __('ui.emailAddress') }}</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fs-5">{{ __('ui.password') }}</label>
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation"
                            class="form-label fs-5">{{ __('ui.passwordConfirmation') }}</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation">
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="t-b">{{ __('ui.doYouHaveAnAccount') }} , <a class="t-o"
                            href="{{ route('login') }}">{{ __('ui.login') }}</a>
                    </p>
                    <div class="text-end">
                        <button type="submit"
                            class="btn bg-o text-white rounded-5 mt-2 btnOrange">{{ __('ui.submitSignIn') }}</button>
                    </div>

                </form>
            </div>
        </section>
    </main>



</x-layout>
