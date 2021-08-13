{{ $segments = '' }}

<nav class="Breadcrumb">
<div class="container">
    <ol class=" bg-transparent m-0 px-0 d-flex" style="list-style:none;">
    <li class="text-uppercase">
        <a href="/">{{ __('pages.home') }}</a>
    </li>
    @foreach(request()->segments() as $segment)
        <li class="text-uppercase"> &nbsp;/
        @if($segment !== last(request()->segments()))
            <a href="{{ url($segments .= '/' . $segment) }}" >{{ ucfirst(strtr($segment, '-', ' ')) }}</a>
        @else
            {{ ucfirst(strtr($segment, '-', ' ')) }}
        @endif
        </li>
    @endforeach
    </ol>
</div>
</nav>

