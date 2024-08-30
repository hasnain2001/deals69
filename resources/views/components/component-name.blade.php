<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Deals 69 logo" class="rounded float-start" style="width:100%; height:50px; "></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"  style="margin:15px;">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active d-flex align-items-center text-dark" aria-current="page" href="/"><i class="fas fa-home me-2"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-dark" href="{{ url('/coupons') }}"><i class="fas fa-tags me-2"></i>Coupons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-dark" href="{{ route('stores') }}"><i class="fas fa-store me-2"></i>Stores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-dark" href="{{ route('categories') }}"><i class="fas fa-th-list me-2"></i>Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-dark" href="{{ route('blog') }}"><i class="fas fa-blog me-2"></i>Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center text-dark" href="{{ route('contact') }}"><i class="fas fa-envelope me-2"></i>Contact</a>
                </li>
            </ul>
            <form action="{{ route('searchResults') }}" method="GET" class="d-flex ms-auto" role="search" style="height:40px">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput" name="query" style="max-width: 250px;">
                <button class="btn btn-outline-success text-dark" type="submit"><i class="fas fa-search me-1"></i></button>
            </form>
        </div>
    </div>
</nav>
