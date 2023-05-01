<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Rental <span>Motor</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{ ($active === "Home") ? 'active' : '' }}"><a href="/" class="nav-link ">Home</a></li>
          <li class="nav-item {{ ($active === "About") ? 'active' : '' }}"><a href="/about" class="nav-link">About</a></li>
          <li class="nav-item {{ ($active === "Motors") ? 'active' : '' }}"><a href="/motor" class="nav-link">Motorcyle</a></li>
          <li class="nav-item {{ ($active === "Contact") ? 'active' : '' }}"><a href="/contak" class="nav-link">Contact</a></li>
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin<i class="fas fa-user fa-fw"></i></a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li>
                      {{-- <form>
                          <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><center>Login</center></a>
                      </form> --}}
                  </li>
              </ul>
          </a>
        </ul>
      </div>
    </div>
</nav>