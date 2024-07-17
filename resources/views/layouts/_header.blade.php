<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
        <a href="{{ url('/') }}" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
            <i class="flaticon-043-teddy-bear"></i>
            <span class="text-primary fw-bold">Blog</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            @php
                $getCategoryHeader = App\Models\Category::getCategoryMenu();
            @endphp
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="{{ url('/') }}" class="nav-item nav-link @if (Request::segment(1) == '') active @endif">Home</a>
                @foreach ($getCategoryHeader as $categoryHeader)
                    @if(is_string($categoryHeader->slug) && is_string($categoryHeader->name))
                        <a href="{{ url($categoryHeader->slug) }}" class="nav-item nav-link @if (Request::segment(1) == $categoryHeader->slug) active @endif">{{ $categoryHeader->name }}</a>
                    @endif
                @endforeach
                {{-- Uncomment below lines to add more static menu items --}}
                {{-- 
                <a href="{{ url('about') }}" class="nav-item nav-link">About</a>
                <a href="{{ url('teams') }}" class="nav-item nav-link">Teams</a>
                <a href="{{ url('gallery') }}" class="nav-item nav-link">Gallery</a>
                <a href="{{ url('blog') }}" class="nav-item nav-link">Blog</a>
                <a href="{{ url('contact') }}" class="nav-item nav-link">Contact</a>
                --}}
            </div>
            <a href="{{ url('login') }}" class="btn btn-primary px-4">Login</a>
            <a href="{{ url('register') }}" class="btn btn-primary px-4" style="margin-left: 10px">Register</a>
        </div>
    </nav>
</div>
<!-- Navbar End -->
