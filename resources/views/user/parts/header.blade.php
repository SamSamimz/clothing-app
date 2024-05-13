   <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{route('home')}}"><h2>Clothing <em>Shop</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <x-nav-item url="home">Home</x-nav-item>
              <x-nav-item url="products">Our Products</x-nav-item>
              <x-nav-item url="about">About Us</x-nav-item>
              <x-nav-item url="contact">Contact Us</x-nav-item>
              @auth
              @if (auth()->user()->is_admin)
              <x-nav-item url="dashboard">Dashboard</x-nav-item>
                @else
                <li class="nav-item">
                  <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="nav-link text-white" type="submit">Logout</button>
                  </form>
                </li>
              @endif
              @else
              <x-nav-item url="login">Login</x-nav-item>
              <x-nav-item url="register">Register</x-nav-item>
              @endauth
            </ul>
            <a href="{{route('carts.index')}}" class="btn text-white"><ion-icon size="large" name="cart-outline"></ion-icon><span class="bg-danger rounded px-1 position-absolute">{{@$cart}}</span></a>
          </div>
        </div>
      </nav>
    </header>