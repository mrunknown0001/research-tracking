    <div class="sidebar" data-color="orange" data-background-color="black" data-image="">

      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-normal">
          Office Clerk
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{ route('oc.dashboard') == url()->current() ? 'active' : '' }} ">
            <a class="nav-link" href="">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>


        </ul>
      </div>
    </div>