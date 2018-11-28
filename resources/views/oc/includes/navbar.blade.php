      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">
              @if(Auth::user()->user_type == 2)
                CREC
              @elseif(Auth::user()->user_type == 3)
                UREC
              @elseif(Auth::user()->user_type == 4)
                RERC
              @elseif(Auth::user()->user_type == 5)
                OUP
              @else
                Office Clerk
              @endif
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <div id="notificationbadge"></div>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div id="notification" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  @include('includes.notification-area')
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:void(0)" id="navbarDropdownUserLink"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownUserLink">
                  <a class="dropdown-item" href="{{ route('oc.profile') }}">Profile</a>
                  <a class="dropdown-item" href="{{ route('oc.logout') }}">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->