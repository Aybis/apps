   <!-- ========== Left Sidebar Start ========== -->
   <div class="left-side-menu left-side-menu-detached" style="">
    
    <div class="leftbar-user">
      <a href="javascript: void(0);">
        <img src="https://ui-avatars.com/api/?name=Muchtar" alt="user-image" height="42"
        class="rounded-circle shadow-sm">
        <span class="leftbar-user-name">Abdul Muchtar</span>
      </a>
    </div>
    
    <!--- Sidemenu -->
    <ul class="metismenu side-nav">
      
      <li class="side-nav-title side-nav-item">Navigation</li>
      
      <li class="side-nav-item">
        <a href="/" class="side-nav-link">
          <i class="uil-home-alt"></i>
          <span> Dashboard </span>
        </a>
      </li>
      <li class="side-nav-title side-nav-item">Apps</li>
      
      @foreach ($list as $item => $key)
      <!--Menu Pages -->
      <li class="side-nav-item">
        
        <a href="javascript: void(0);" class="side-nav-link">
          <i class="uil-copy-alt"></i>
          <span> {{ $item }} </span>
          <span class="menu-arrow"></span>
        </a>

        <ul class="side-nav-second-level" aria-expanded="false">
          @for ($i = 0; $i < count($key); $i++)
          <li>
            <a href="{{ route($key[$i]['route']) }}">
              <span class="badge badge-light float-right">New</span>
              <span>{{ $key[$i]['display'] }}</span>
            </a>
          </li>

          @endfor

        </ul>
      </li>
      <!-- End Menu Pages -->
      @endforeach
    </ul>
    
    <!-- End Sidebar -->
    
    <div class="clearfix"></div>
    <!-- Sidebar -left -->
    
  </div>
  <!-- Left Sidebar End -->
  