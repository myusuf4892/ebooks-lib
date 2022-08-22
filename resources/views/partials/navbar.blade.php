<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/">QutuBuku</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Catalog</a></li>
          @auth()
            @if (Auth::user()->role->id == 1)
            <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <ion-icon name="chevron-down-outline"></ion-icon></a>
              <ul>
                <li><a href="/admin">Dashboard</a></li>
                <li><a href="/logout">Logout</a></li>
              </ul>
            </li>
            @endif
            @if (Auth::user()->role->id == 2)
            <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <ion-icon name="chevron-down-outline"></ion-icon></a>
              <ul>
                <li><a href="/donatur">Dashboard</a></li>
                <li><a href="/logout">Logout</a></li>
              </ul>
            </li>
            @endif
            @if (Auth::user()->role->id == 3)
            <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <ion-icon name="chevron-down-outline"></ion-icon></a>
              <ul>
                <li><a href="/profile">Profile</a></li>
                <li><a href="/logout">Logout</a></li>
              </ul>
            </li>
            @endif
          @endauth
          @guest()
          <li class="dropdown"><a href="#"><span>Menu</span> <ion-icon name="chevron-down-outline"></ion-icon></a>
            <ul>
              <li><a href="/login">Login</a></li>
              <li><a href="/register">Register</a></li>
            </ul>
          </li>
          @endguest
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
        </ul>
        <ion-icon name="apps-outline" class="mobile-nav-toggle apps-outline"></ion-icon>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a href="#" class="twitter"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#" class="facebook"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#" class="linkedin"><ion-icon name="logo-linkedin"></ion-icon></i></a>
        <a href="#" class="instagram"><ion-icon name="logo-instagram"></ion-icon></a>
      </div>

    </div>
</header><!-- End Header -->
