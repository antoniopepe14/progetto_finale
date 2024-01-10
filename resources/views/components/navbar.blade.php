<div class="d-flex justify-content-center align-items-center position-relative">
    <nav class="navbar navbar-expand-lg bg-b mt-2 rounded-5 nav-custom">
        <div class="container-fluid gap-2">

            <a class="navbar-brand" href="{{ route('home') }}"><img src="/media/LOGO.png" class="logo ms-3"
                    alt="Logo del sito"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars" style="color: #ffffff;"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">{{ __('ui.announcements') }}</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('auth.contact') }}">{{ __('ui.workWithUs') }}</a></li>


                    @auth
                        @if (Auth::user()->is_revisor)
                            <li class="nav-item">
                                <a class="nav-link position-relative "
                                    href="{{ route('revisor.index') }}">{{ __('ui.revisorMenù') }}
                                    <span
                                        class=" position-absolute top-1 start-100 translate-middle badge rounded-pill bg-o">{{ App\Models\Product::toBeRevisionedCount() }}
                                        <span class="visually-hidden">unread message</span>
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>
                {{-- Bandierine --}}
                <div class="dropdown mx-2">
                    <button class="dropdown-toggle nav-link" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-globe globo" style="color: #f5f5f5;"></i>
                    </button>
                    <ul class="dropdown-menu bg-b pb-0">
                        <li class="dropdown-item t-n"> <x-_locale lang="it" />IT</li>
                        <li class="dropdown-item t-n"> <x-_locale lang="en" />EN</li>
                        <li class="dropdown-item t-n"> <x-_locale lang="es" />ES</li>
                    </ul>
                </div>
                @guest
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('ui.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('ui.register') }}</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item dropdown dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::User()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end bg-b">
                                <li><a class="dropdown-item t-n"
                                        href="{{ route('auth.dashboard') }}">{{ __('ui.dashboard') }}</a></li>
                                <li><a class="dropdown-item t-n"
                                        href="{{ route('products.create') }}">{{ __('ui.newAnnouncement') }}</a>
                                </li>

                                <form class="ps-1" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn t-o">{{ __('ui.logout') }}</button>
                                </form>
                            </ul>
                        </li>
                    </ul>
                @endguest

            </div>
        </div>
    </nav>

</div>

<div class="container-fluid position-absolute mt-5 pt-3 overflow-hidden">
    <div class="row mt-4 w-100 justify-content-center">

        @if (session('message'))
            <div class="col-12 col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @elseif (session('error'))
            <div class="col-12 col-md-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

    </div>
</div>
