<li class="nav-item {{request()->routeIs($url) ? 'active' : null}}">
    <a class="nav-link" href="{{route($url)}}">{{$slot}}
    </a>
</li>