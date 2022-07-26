<header class="main-header">
  <!-- Logo -->
  <a href="{{url('/dashboard')}}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">Admin</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg" style="font-size: 18px;">
      <img src="{{asset('commonarea/dist/img/APP-LOGO.png')}}" alt="logo">
    </span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    {{-- {{ $profile = (!empty(Session::get('profile_path')) ? URL::to(Session::get('profile_path')) : URL::to(asset('commonarea/dist/img/user2-160x160.jpg'))) }} --}}
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('commonarea/dist/img/avatar5.png')}}" class="user-image" alt="User Image">
            <span class="hidden-xs">Admin</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{asset('commonarea/dist/img/avatar5.png')}}" class="img-circle" alt="User Image">

              <p>
                {{auth()->guard('admin')->user()->email;}}
                <small>Member since <?= date('M Y', strtotime(Session::get('created_on'))) ?></small>
              </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
              <div class="pull-right">
                <a href="{{URL::to('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>