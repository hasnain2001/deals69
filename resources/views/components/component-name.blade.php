<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
        <a class="navbar-brand" href="/">Deals 69</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form id="searchForm" action="" method="GET" class="d-lg-none"> <!-- Show on small devices only -->
            <input type="text" id="searchInput" name="query" class="form-control me-2" placeholder="Search...">
            <button class="btn btn-outline-secondary text-dark " type="submit">Search</button>
        </form>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="coupons">Coupons</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('stores') }}">Stores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('categories') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('blog') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
            <form id="searchFormDesktop" action="{{ route('searchResults') }}" method="GET" class="d-none d-lg-flex"> <!-- Show on desktop devices only -->
                <input type="text" id="searchInputDesktop" name="query" class="form-control me-2" placeholder="Search...">
                <button class="btn btn-outline-secondary text-dark" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
