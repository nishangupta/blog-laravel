<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
         {{_("Nepdesk")}}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Blog</a>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('blog.index')}}">Posts</a>
                  <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                {{-- <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}">

                  </li> --}}
              </div>
            </li>
            <li class="nav-item">
                <a href="{{route('cart.index')}}" class="nav-link">Cart</a>
            </li>
            <li class="nav-item">
                <a href="{{route('github.index')}}" class="nav-link">Github</a>
            </li>
            <li class="nav-item">
                <a href="{{ URL::to('/gallery')}}" class="nav-link">{{_('Gallery')}}</a>
            </li>
          </ul>
    

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-toggle="dropdown" id="notificationDropdown">
                    <span class="badge badge-dark p-1 mr-2">{{auth()->user()->unreadNotifications->count()}}</span> 
                    {{_('Notifications')}} 
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <a class="dropdown-item bg-primary text-light">{{$notification->data['msg'] }}</a>
                        @endforeach
                        @foreach (auth()->user()->readNotifications as $notification)
                            <a class="dropdown-item">{{$notification->data['msg'] }}</a>
                        @endforeach
                        <a href="{{route('markAsRead')}}" class="dropdown-item text-danger text-center" style="cursor: pointer">Mark as read</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>