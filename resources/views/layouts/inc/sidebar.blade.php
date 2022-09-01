
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="{{ url('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @can('create-ads')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Properties</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('ads.myads') }}">
                    <i class="bi bi-circle"></i><span>My Properties</span>
                </a>
            </li>
            @can('manage-ads')
            <li>
                <a href="{{ route('ads.index') }}">
                <i class="bi bi-circle"></i><span>All Properties</span>
                </a>
            </li>
            @endcan
            <li>
                <a href="{{ route('ads.create') }}">
                <i class="bi bi-circle"></i><span>Create Property</span>
                </a>
            </li>
        </ul>
      </li>
      @endcan
      <!-- End Properties Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('categories') }}">
              <i class="bi bi-circle"></i><span>All Categories</span>
            </a>
          </li>
          @can('manage-categories')
          <li>
            <a href="{{ url('categories/create') }}">
              <i class="bi bi-circle"></i><span>Create Category</span>
            </a>
          </li>
          @endcan
        </ul>
      </li><!-- End Categories Nav -->


      @can('manage-users')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>User Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('users.index') }}">
              <i class="bi bi-circle"></i><span>Manage Users</span>
            </a>
          </li>
        </ul>
      </li><!-- End Users Nav -->
      @endcan

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-in-right"></i>
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li><!-- End Login Page Nav -->
    </ul>
</aside><!-- End Sidebar-->
