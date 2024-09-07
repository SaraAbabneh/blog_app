<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('front.dashboard')}}" class="brand-link">
          <img src="{{ auth()->user()->adminSetting && auth()->user()->adminSetting->photo !== null 
          ? asset('storage/app/public/' . auth()->user()->adminSetting->photo) 
          : asset('assets/admin/dist/img/user2-160x160.jpg') }}
          "  alt="AdminLTE Logo" class="brand-image img-circle elevation-3"

         style="opacity: .8">
    <span class="brand-text font-weight-light">My Profile</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ auth()->user()->adminSetting && auth()->user()->adminSetting->photo !== null 
        ? asset('storage/app/public/' . auth()->user()->adminSetting->photo) 
        : asset('assets/admin/dist/img/user2-160x160.jpg') }}
        " class="img-circle elevation-2" class="img-circle elevation-2" alt="User Image">

      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
      
       
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.showalluser')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Users</p>
              </a>
            </li>
           

          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              POST
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.showallpost')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Post</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-header">Contact</li>
      
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Message
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/mailbox/mailbox.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inbox</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/compose.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Compose</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/read-mail.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Read</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">Settings</li>
        <li class="nav-item">
          <a href="{{route('admin.showinfo')}}" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Add Info</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.logasuser') }}" class="nav-link">
            <i class="nav-icon far fa-circle text-success"></i>
            <p class="text">log as user</p>
          </a>
        </li>

     
       
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>