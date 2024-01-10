<x-layout>

    <section class="container sfondoLavora min-vh-100">
        <article class="row pt-5 mt-5">
            <h1 class="mt-3 t-b">{{ __('ui.workWithUs') }}!</h1>
            <div class="col-12 p-4 bg-transparent pb-5 shadow-lg form rounded-5 mt-4 col-md-7 mt-3">


                <form action="{{ route('auth.sendEmail') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fs-5">{{ __('ui.username') }}</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ Auth::user()->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fs-5">{{ __('ui.emailAddress') }}</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ Auth::user()->email }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fs-5">{{ __('ui.whyYouChooseUs') }}</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="text-end">
                        <button type="submit"
                        class="btn bg-o text-white rounded-5 mt-2 btnOrange">{{ __('ui.sendApplication') }}</button>
                    </div>
                    
                </form>
            </div>
        </article>
    </section>


</x-layout>
