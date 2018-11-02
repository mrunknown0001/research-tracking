    <div class="sidebar" data-color="success" data-background-color="black" data-image="">

      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-normal">
          Faculty Researcher
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active {{ route('fr.dashboard') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('fr.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>


        </ul>
      </div>
    </div>