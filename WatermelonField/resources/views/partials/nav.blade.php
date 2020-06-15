<header id="header" class="header header-hide">
        <div class="container">
    
          <div id="logo" class="pull-left">
            <h1><a href="#body" class="scrollto"><span>Melon</span>Analysis</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#body"><img src="assets/img/logo.png" alt="" title="" /></a>-->
          </div>
    
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="#hero">Home</a></li>
              <li><a href="#about-us">About</a></li>
              <li><a href="#screenshots">Screenshots</a></li>
              <li><a href="#team">Team</a></li>
              <li class="menu-has-children"><a href="">Drop Down</a>
                <ul>
                  <li><a href="#">Drop Down 1</a></li>
                  <li><a href="#">Drop Down 3</a></li>
                  <li><a href="#">Drop Down 4</a></li>
                  <li><a href="#">Drop Down 5</a></li>
                </ul>
              </li>

              @if (Route::has('login'))
                  @auth
                  @else
<li><a href="{{ route('login') }}">Login</a></li>
                      @if (Route::has('register'))
<li><a href="{{ route('register') }}">Register</a></li>
                      @endif
                  @endauth
              @endif


            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </header>