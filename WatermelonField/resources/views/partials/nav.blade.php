<header id="header" class="header header-hide">
        <div class="container">
    
          <div id="logo" class="pull-left">
            <h1><a href="{{ route('index') }}/#body" class="scrollto"><span>Melon</span>Analysis</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#body"><img src="assets/img/logo.png" alt="" title="" /></a>-->
          </div>
    
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="{{ route('index') }}/#hero">Home</a></li>
              <li><a href="{{ route('index') }}/#about-us">About</a></li>
              <li><a href="{{ route('index') }}/#video">Demo</a></li>
              <li><a href="{{ route('index') }}/#team">Team</a></li>
             <!-- Authentication Links -->
             @guest
                            @if (Route::has('register'))
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Hello, {{ Auth::user()->name }} <span class="caret"></span>
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
          </nav><!-- #nav-menu-container -->
        </div>
      </header>