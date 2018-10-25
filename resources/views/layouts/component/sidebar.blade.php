<div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}"><i class="icon-speedometer"></i> Dashboard <!-- <span class="badge badge-primary">NEW</span> --></a>
          </li>

          <li class="nav-title">
            Manage
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('room') }}"><i class="icon-grid"></i> Room </a>
          </li>

          <li class="divider"></li>

          <li class="nav-title">
            Extras
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-logout"></i> Logout </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>


        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>