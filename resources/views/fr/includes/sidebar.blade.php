    <div class="sidebar" data-color="green" data-background-color="black" data-image="">

      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-normal">
          Faculty Researcher
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ route('fr.dashboard') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('fr.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">vertical_align_bottom</i>
              <p>Incoming Research</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">vertical_align_top</i>
              <p>Outgoing Research</p>
            </a>
          </li>
          <li class="nav-item {{ route('fr.forms') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('fr.forms') }}">
              <i class="material-icons">file_copy</i>
              <p>Forms</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">send</i>
              <p>Send Request/Form</p>
            </a>
          </li>

        </ul>
      </div>
    </div>