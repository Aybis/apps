   <!-- ========== Left Sidebar Start ========== -->
   <div class="left-side-menu left-side-menu-detached" style="">

       <div class="leftbar-user">
           <a href="javascript: void(0);">
               <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
               <span class="leftbar-user-name">{{ Auth::user()->name }}</span>
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

           <li class="side-nav-item">
               <a href="javascript: void(0);" class="side-nav-link">
                   <i class="uil-copy-alt"></i>
                   <span>LPL</span>
                   <span class="menu-arrow"></span>
               </a>
               <ul class="side-nav-second-level" aria-expanded="false">
                   @can('manage-lpl')
                   <li>
                       <a href="{{ route('lpl.create') }}">Create</a>
                   </li>
                   @endcan('manage-lpl')
                   <li>
                       <a href="{{ route('lpl.value') }}">List</a>
                   </li>
                   @can('manage-user')
                   <li>
                       <a href="{{ route('lpl.performansi') }}">Performansi</a>
                   </li>
                   @endcan('manage-user')
               </ul>
           </li>

           @can('manage-user')
           <li class="side-nav-title side-nav-item">Custom</li>

           <!--Menu Pages -->
           <li class="side-nav-item">
               <a href="javascript: void(0);" class="side-nav-link">
                   <i class="uil-copy-alt"></i>
                   <span> Management Data </span>
                   <span class="menu-arrow"></span>
               </a>
               <ul class="side-nav-second-level" aria-expanded="false">
                   <li>
                       <a href="{{ url('user') }}">
                           <span class="badge badge-light float-right">New</span>
                           <span>Karyawan</span>
                       </a>
                   </li>

                   <li class="side-nav-item">
                       <a href="javascript: void(0);" aria-expanded="false">Privilleges
                           <span class="menu-arrow"></span>
                       </a>
                       <ul class="side-nav-third-level" aria-expanded="false">
                           <li>
                               <a href="pages-login.html">Roles</a>
                           </li>
                           <li>
                               <a href="pages-login-2.html">Permission</a>
                           </li>

                       </ul>
                   </li>
               </ul>
           </li>
           <!-- End Menu Pages -->
           @endcan('manage-user')

       </ul>

       <!-- End Sidebar -->

       <div class="clearfix"></div>
       <!-- Sidebar -left -->

   </div>
   <!-- Left Sidebar End -->