<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Indalfood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
    }
  </style>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary py-4">
        <div class="container">
          @auth
            <a class="navbar-brand" href="/platos">Indalfood</a>
          @else
            <a class="navbar-brand" href="/">Indalfood</a>
          @endauth
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
              <li class="nav-item"><a class="nav-link" href="/contacto">Acerca de</a></li>
              @auth
                <li class="nav-item"><a class="nav-link" href="/restaurantes">Restaurantes</a></li>
                <li class="nav-item"><a class="nav-link" href="/profile">Perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="/carrito">Carrito</a></li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                    <li class="nav-item"><a class="nav-link" href="route('logout')"
                          onclick="event.preventDefault();
                          this.closest('form').submit();">Log out</a></li>
                </form>
              @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                  <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endif
              @endauth
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <!-- BUSCADOR DE CATEGORIAS -->
      <div class="container">
        <div class="row no-gutters my-5">
          <select class="form-select" aria-label="Buscador categorias">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      

      
        <div class="row no-gutters my-5">
          <div class="col-7">
            <div class="icon-box">
              <h1 class="title">@yield('titulo')</h1>
            </div>
          </div>
        </div>

          @yield('main')
          
      </div>
    </main>

    <!-- Footer -->
    <footer class="pt-2 text-center text-lg-start text-muted" style="background-color: rgba(0, 0, 0, 0.025);">
      
      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3 text-secondary"></i>Indalfood
              </h6>
              <p>
                Asociacion de restaurantes del levante almeriense que te llevan los mejores platos a tu domicilio.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
              <p><i class="fas fa-home me-3 text-secondary"></i> Cuevas del Almanzora, 04610, Almeria</p>
              <p>
                <i class="fas fa-envelope me-3 text-secondary"></i>
                info@indalfood.com
              </p>
              <p><i class="fas fa-phone me-3 text-secondary"></i> + 34 670 234 567</p>
              <p><i class="fas fa-print me-3 text-secondary"></i> + 34 620 234 567</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Indalfood</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    @yield('scripts')

  </body>
</html>
