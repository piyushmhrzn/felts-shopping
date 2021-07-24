<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('admin/assets/img/sidebar-2.jpg') }}">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo"><a href="{{route('index')}}" class="simple-text logo-normal" target="_blank">
      Kasthamandap
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ (request()->routeIs('adminProfile*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('adminProfile') }}">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#productSection">
          <i class="material-icons">shopping_cart</i>
          <p>Products
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ Request::is('products*','sortProduct*') ? 'show' : '' }}" id="productSection">
          <ul class="nav ml-3">
            <li class="nav-item  {{ (request()->routeIs('products*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('products') }}">
                <i class="material-icons">home</i>
                <span class="sidebar-normal no-collapsable">Our Products</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->routeIs('sortProduct*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('sortProduct') }}">
                <i class="material-icons">sort</i>
                <span class="sidebar-normal no-collapsable">Products Sorting</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#aboutUsSection">
          <i class="material-icons">bubble_chart</i>
          <p> About Us
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse {{ Request::is('aboutUs*','team*','partners*') ? 'show' : '' }}" id="aboutUsSection">
          <ul class="nav ml-3">
            <li class="nav-item {{ (request()->routeIs('aboutUs*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('aboutUs') }}">
                <i class="material-icons">home</i>
                <span class="sidebar-normal no-collapsable">About Us</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->routeIs('team*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('team') }}">
                <i class="material-icons">groups</i>
                <span class="sidebar-normal no-collapsable">Our Team</span>
              </a>
            </li>
            <li class="nav-item {{ (request()->routeIs('partners*')) ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('partners') }}">
                <i class="material-icons">emoji_people</i>
                <span class="sidebar-normal no-collapsable">Our Partners</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ (request()->routeIs('contacts*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contacts') }}">
          <i class="material-icons">notifications</i>
          <p>Notifications</p>
        </a>
      </li>
      @if(Auth::user()->type==0)
        <li class="nav-item {{ (request()->routeIs('superAdmin*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('superAdmin') }}">
            <i class="material-icons">manage_accounts</i>
            <p>Super Admin</p>
          </a>
        </li>
      @endif
      <li class="nav-item {{ (request()->routeIs('settings*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('settings') }}">
          <i class="material-icons">settings</i>
          <p>Settings</p>
        </a>
      </li>
      <li class="nav-item {{ (request()->routeIs('logout')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('logout') }}">
          <i class="material-icons">power_settings_new</i>
          <p>Logout</p>
        </a>
      </li>
    </ul>
  </div>
</div>

<script>
 
</script>
