<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">QutuBuku</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Book") ? 'active' : '' }}" href="/books">Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href="/about">About Us</a>
          </li>
          @auth
          @if (Auth::user()->role->id === 1)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="/admin" role="button" aria-expanded="false"><ion-icon name="person-outline"></ion-icon> {{ Auth::user()->name }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/admin">Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </li>
          @endif
          @if (Auth::user()->role->id === 2)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($title === "Dashboard") ? 'active' : '' }}" data-bs-toggle="dropdown" href="/donatur/profile" role="button" aria-expanded="false">{{ Auth::user()->name }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/donatur/profile">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </li>
          @endif
          @if (Auth::user()->role->id === 3)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($title === "Dashboard") ? 'active' : '' }}" data-bs-toggle="dropdown" href="/users/profile" role="button" aria-expanded="false">{{ Auth::user()->name }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/users/profile">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </li>
          @endif
          @endauth
          @guest
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Login") ? 'active' : '' }}" href="/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>
          @endguest
        </ul>
      </div>
    </div>
</nav>
