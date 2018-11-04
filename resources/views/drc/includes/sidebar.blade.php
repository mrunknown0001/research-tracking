    <div class="sidebar" data-color="azure" data-background-color="black" data-image="">

      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-normal">
          DRC
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ route('drc.dashboard') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('drc.dashboard') }}">
              <i class="material-icons">work</i>
              <p>Documents</p>
            </a>
          </li>
          <li class="nav-item">
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
          <li class="nav-item {{ route('drc.forms') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('drc.forms') }}">
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