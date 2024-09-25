<nav class="container navbar navbar-expand-lg bg-primary mt-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('frontend.index') }}">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Loop through parent menus -->
                @foreach(getMenuTree() as $menu)
                    @if ($menu->children->isNotEmpty())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ $menu->url }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $menu->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- Loop through child menus -->
                                @foreach($menu->children as $child)
                                    <li><a class="dropdown-item" href="{{ $child->url }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <!-- Single-level parent menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{$menu->url }}">{{ $menu->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
