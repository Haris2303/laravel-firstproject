<nav class="navbar navbar-expand-lg bg-success navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">FisPro <span class="text-black-50">Blog</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" aria-current="page"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'About' ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'Posts' ? 'active' : '' }}" href="/posts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'Category' ? 'active' : '' }}" href="/categories">Category</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}">
                        <i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a href="/register" class="nav-link {{ $active === 'register' ? 'active' : '' }}">
                        <i class="bi bi-box-arrow-in-right"></i> Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
