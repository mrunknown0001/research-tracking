    <div class="sidebar" data-color="orange" data-background-color="black" data-image="">

      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-normal">
          College Clerk
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ route('cc.dashboard') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('cc.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ route('cc.add.account') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('cc.add.account') }}">
              <i class="material-icons">person_add</i>
              <p>Add Account</p>
            </a>
          </li>


        </ul>
      </div>
    </div>