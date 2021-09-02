{{ $segments = '' }}

<nav class="Breadcrumb mb-0">
<div class="container">
    <ol class=" bg-transparent m-0 px-0 d-flex mb-3" style="list-style:none; font-size:20px;">
        <li>
            <a href="/" class="active text-decoration-none text-secondary">ACCUEIL</a>
        </li>
    @foreach(request()->segments() as $segment)
        <li class="text-uppercase"> &nbsp;/
        @if($segment !== last(request()->segments()))
            <a href="{{ url($segments .= '/' . $segment) }}" class="text-decoration-none text-secondary">{{ ucfirst(strtr($segment, '-', ' ')) }}</a>
        @else
            <span class="text-dark">{{ ucfirst(strtr($segment, '-', ' ')) }} </span>
        @endif
        </li>
    @endforeach
    </ol>
</div>
</nav>

