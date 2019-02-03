    <div class="sidebar" data-color="orange" data-background-color="black" data-image="">

      <div class="logo">
        <a href="javascript:void(0)" class="simple-text logo-normal">
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
      <div class="sidebar-wrapper">
        <ul class="nav">
          {{-- <li class="nav-item {{ route('oc.dashboard') == url()->current() ? 'active' : '' }} ">
            <a class="nav-link" href="{{ route('oc.dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li> --}}
          <li class="nav-item {{ route('oc.incoming.research') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('oc.incoming.research') }}">
              <i class="material-icons">vertical_align_bottom</i>
              <p>Incoming Research</p>
            </a>
          </li>
          <li class="nav-item {{ route('oc.outgoing.research') == url()->current() ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('oc.outgoing.research') }}">
              <i class="material-icons">vertical_align_top</i>
              <p>Outgoing Research</p>
            </a>
          </li>


        </ul>
      </div>
    </div>