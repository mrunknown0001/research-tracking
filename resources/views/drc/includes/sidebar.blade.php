    <div class="sidebar" data-color="danger" data-background-color="black" data-image="">

      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-normal">
          DRC
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ route('drc.dashboard') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('drc.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>


        </ul>
      </div>
    </div>