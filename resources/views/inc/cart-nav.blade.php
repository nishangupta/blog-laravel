<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <a href="{{route('cart.index')}}" class="navbar-brand">Cart</a>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href="{{ route('cart.myCart') }}" class="nav-link">
        <button class="btn btn-light btn-sm">
          <span class="badge badge-danger">{{ $userCartCount }}</span>
          <i class="fas fa-shopping-cart"></i>
        </button>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <button class="btn btn-light btn-sm">
          <i class="fas fa-user"></i>
        </button>
      </a>
    </li>
  </ul>
</nav>