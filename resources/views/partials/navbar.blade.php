<nav class="navbar navbar-expand-md navbar-light bg-white navigation">
    <div class="container">
        <a class="navbar-brand header-logo" href="{{ url('/') }}">
            {{ config('app.name', 'Finder') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Center Of Navbar -->
            @if (!Auth::guest())
            <ul class="navbar-nav mx-auto">
                <li class="nav-item header-items-center">
                    <a class="nav-link" href="/">Les Offres</a>
                </li>

                @if (Auth::user()->adviser)
                <li class="nav-item header-items-center">
                    <a class="nav-link" href="/dashboard">Les Formations</a>
                </li>
                @endif


                @if (Auth::user()->student)
                <li class="nav-item header-items-center">
                    <a class="nav-link" href="/enterprises">Mes recherches</a>
                </li>
                @endif
            </ul>
            @endif

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"></a>
                </li>
                @endif

                @else
                <li class="nav-item header-items-right dropdown">
                    @if (!Auth::guest() && Auth::user()->student)
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->student->name }}
                    </a>
                    @endif

                    @if (!Auth::guest() && Auth::user()->adviser)
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->adviser->name }}
                    </a>
                    @endif

                    <div class="dropdown-menu dropdown-menu-end header-items-right-dropdown" aria-labelledby="navbarDropdown">

                        @if (!Auth::guest() && Auth::user()->student)
                        <a class="dropdown-item" href="/student/profil">
                            <i class="fas fa-user"></i>
                            Mon profil
                        </a>
                        @endif

                        @if (!Auth::guest() && Auth::user()->adviser)
                        <a class="dropdown-item" href="/listingPosts">
                            <i class="fas fa-plus"></i>
                            Suivi des offres
                        </a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
