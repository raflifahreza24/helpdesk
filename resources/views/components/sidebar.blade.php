<!-- Sidenav Menu Start -->
<div class="sidenav-menu">
   <!-- Brand Logo -->
   <a href="index.html" class="logo">
      <span class="logo-light">
         <span class="logo-lg"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></span>
         <span class="logo-sm text-center"><img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo"></span>
      </span>

      <span class="logo-dark">
         <span class="logo-lg"><img src="{{ asset('assets/images/logo-dark.png') }}" alt="dark logo"></span>
         <span class="logo-sm text-center"><img src="{{ asset('assets/images/logo-sm.png') }}" alt="small logo"></span>
      </span>
   </a>
   
   <!-- Sidebar Hover Menu Toggle Button -->
   <button class="button-sm-hover">
      <i class="ti ti-circle align-middle"></i>
   </button>

   <!-- Full Sidebar Menu Close Button -->
   <button class="button-close-fullsidebar">
      <i class="ti ti-x align-middle"></i>
   </button>

   <div data-simplebar>
      <!--- Sidenav Menu -->
      <ul class="side-nav">
         <li class="side-nav-item">
            <a href="index.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-dashboard"></i></span>
               <span class="menu-text"> Dashboard </span>
               <span class="badge bg-success rounded-pill">5</span>
            </a>
         </li>

         <li class="side-nav-title mt-2">Ticket Management</li>

         <li class="side-nav-item">
            <a href="apps-chat.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-ticket"></i></span>
               <span class="menu-text"> All Tickets </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="apps-calendar.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-plus"></i></span>
               <span class="menu-text"> Create Ticket </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="apps-email.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-user-check"></i></span>
               <span class="menu-text"> Assigned Tickets </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="apps-email.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-user-question"></i></span>
               <span class="menu-text"> Ticket Categories </span>
            </a>
         </li>

         <li class="side-nav-title mt-2">Reports</li>
         
         <li class="side-nav-item">
            <a href="apps-chat.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-file-report"></i></span>
               <span class="menu-text"> Ticket Report </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="apps-calendar.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-chart-bar"></i></span>
               <span class="menu-text"> Agent Performance </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="apps-email.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-building-community"></i></span>
               <span class="menu-text"> Department Report </span>
            </a>
         </li>

         <li class="side-nav-title mt-2">User Management</li>
         
         <li class="side-nav-item">
            <a href="apps-chat.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-user"></i></span>
               <span class="menu-text"> Users </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="{{ route('admin.role.index') }}" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-shield"></i></span>
               <span class="menu-text"> Roles </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="apps-email.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-headset"></i></span>
               <span class="menu-text"> Agents </span>
            </a>
         </li>

         <li class="side-nav-title mt-2">Master Data</li>
         
         <li class="side-nav-item">
            <a href="apps-chat.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-building"></i></span>
               <span class="menu-text"> Departements </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="apps-calendar.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-category"></i></span>
               <span class="menu-text"> Categories </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="apps-email.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-flag"></i></span>
               <span class="menu-text"> Priorities </span>
            </a>
         </li>

         <li class="side-nav-item mt-2">
            <a href="apps-email.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-history"></i></span>
               <span class="menu-text"> Activity Logs </span>
            </a>
         </li>

         <li class="side-nav-item">
            <a href="apps-email.html" class="side-nav-link">
               <span class="menu-icon"><i class="ti ti-logout"></i></span>
               <span class="menu-text"> Logout </span>
            </a>
         </li>
      </ul>

      <div class="clearfix"></div>
   </div>
</div>
<!-- Sidenav Menu End -->