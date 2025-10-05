<div class="header_main">
    <!-- Mobile Menu -->
    <div class="mobile_menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="mobile-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('experience*') ? 'active' : '' }}"
                            href="{{ route('experience.index') }}">Favorite Places</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ url('/#about') }}" class="scroll-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#testimonial">Testimonial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll-link" href="#faq">FAQ</a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <x-app-layout></x-app-layout>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link signup-btn-mobile" href="{{ route('register') }}">Sign Up</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <!-- Desktop Menu -->
    <div class="container-fluid">
        <div class="modern_navbar flex justify-between items-center px-8 py-3">
            <!-- Logo -->
            <div class="navbar_logo flex-shrink-0">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="main-logo h-10 w-auto">
                </a>
            </div>

            <!-- Center Navigation -->
            <div class="navbar_center flex-1">
                <ul class="nav_menu flex justify-center space-x-8">
                    <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('experience.index') }}"
                            class="{{ request()->is('experience*') ? 'active' : '' }}">Favorite Place</a></li>
                    <li><a href="{{ url('/#about') }}" class="scroll-link">About</a></li>
                    <li><a href="{{ url('/#blog') }}" class="scroll-link">Testimonial</a></li>
                    <li><a href="{{ url('/#faq') }}" class="scroll-link">FAQ</a></li>
                </ul>
            </div>

            <!-- Right Side Auth -->
            <div class="navbar_auth flex-shrink-0 space-x-4">
                @if (Route::has('login'))
                    @auth
                        <x-app-layout></x-app-layout>
                    @else
                        <a href="{{ route('login') }}" class="login-btn text-gray-800 hover:text-orange-500 transition">Login</a>
                        <a href="{{ route('register') }}"
                            class="signup-btn bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">Sign Up</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Smooth Scroll Script -->
<script>
document.querySelectorAll('.scroll-link').forEach(link => {
  link.addEventListener('click', function(e) {
    const targetId = this.getAttribute('href');
    if (targetId.startsWith('#')) {
      e.preventDefault();
      const targetEl = document.querySelector(targetId);
      if (targetEl) {
        window.scrollTo({
          top: targetEl.offsetTop - 80, // atur sesuai tinggi navbar
          behavior: 'smooth'
        });
      }
    }
  });
});
</script>

<style>
/* Styling tambahan opsional */
.nav_menu a {
  color: #333;
  font-weight: 500;
  text-decoration: none;
  transition: color 0.3s ease;
}
.nav_menu a:hover {
  color: #f97316; /* orange */
}
.nav_menu a.active {
  color: #f97316;
  font-weight: 600;
}
.mobile-logo {
  height: 40px;
}
.main-logo {
  height: 50px;
}
.navbar-toggler {
  border: none;
}
.signup-btn-mobile {
  background-color: #f97316;
  color: #fff !important;
  border-radius: 9999px;
  padding: 6px 14px;
}
</style>
