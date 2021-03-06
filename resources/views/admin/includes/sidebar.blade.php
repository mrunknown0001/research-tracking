    <div class="sidebar" data-color="purple" data-background-color="black" data-image="">

      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-normal">
          Admin
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ route('admin.dashboard') == url()->current() ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ route('admin.incoming.research') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.incoming.research') }}">
              <i class="material-icons">vertical_align_bottom</i>
              <p>Incoming Research</p>
            </a>
          </li>
          <li class="nav-item {{ route('admin.outgoing.research') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.outgoing.research') }}">
              <i class="material-icons">vertical_align_top</i>
              <p>Outgoing Research</p>
            </a>
          </li>
          <li class="nav-item {{ route('admin.forms') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.forms') }}">
              <i class="material-icons">file_copy</i>
              <p>Forms</p>
            </a>
          </li>
          <li class="nav-item {{ route('admin.research') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.research') }}">
              <i class="material-icons">description</i>
              <p>Research</p>
            </a>
          </li>
          <li class="nav-item {{ route('admin.accounts') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.accounts') }}">
              <i class="material-icons">account_box</i>
              <p>Accounts</p>
            </a>
          </li>
          <li class="nav-item {{ route('admin.settings') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.settings') }}">
              <i class="material-icons">settings_applications</i>
              <p>Settings</p>
            </a>
          </li>
        </ul>
      </div>
    </div>