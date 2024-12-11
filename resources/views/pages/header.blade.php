<header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
        <img src="{{ asset('assets/img/my-profile-img.jpg') }}" alt="Profile Image" class="img-fluid rounded-circle">
    </div>

    <a href="{{ url('/') }}" class="logo d-flex align-items-center justify-content-center">
        <h1 class="sitename">Muhammad Hamid</h1>
    </a>

    <div class="social-links text-center">
        <a href="https://twitter.com/xihamid" class="twitter" target="_blank"><i class="bi bi-twitter-x"></i></a>
        <a href="https://facebook.com/xihamid" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://instagram.com/xihamid" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="https://linkedin.com/in/xihamid" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
        <ul>
            <!-- Home Navigation -->
            <li><a href="{{ url('/') }}#hero" class="{{ Request::is('/') ? 'active' : '' }}"><i class="bi bi-house navicon"></i> Home</a></li>

           <!-- Blog Section -->
           <li class="dropdown {{ Request::is('blog*') || Request::is('categories*') ? 'active' : '' }}">
            @auth
                <a href="#">
                    <i class="bi bi-menu-button navicon"></i> Blog
                    <i class="bi bi-chevron-down toggle-dropdown"></i>
                </a>
                <ul>
                    <li><a href="{{ route('blogs.create') }}">Create Blog</a></li> <!-- Link to Blog Creation -->
                    <li><a href="{{ route('blogs.index') }}">View Blogs</a></li> <!-- Link to Blog Listing -->
                    <li><a href="{{ route('categories.index') }}">Manage Categories</a></li> <!-- Link to Categories -->
                </ul>
            @else
                <a href="{{ route('blogs.index') }}">
                    <i class="bi bi-menu-button navicon"></i> Blog
                </a>
            @endauth
        </li>



            <!-- About Section -->
            <li><a href="{{ url('/') }}#about"><i class="bi bi-person navicon"></i> About</a></li>
            <li><a href="{{ url('/') }}#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
            <li><a href="{{ url('/') }}#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
            <li><a href="{{ url('/') }}#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        </ul>
    </nav>
</header>
