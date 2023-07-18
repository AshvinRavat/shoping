  <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link text-decoration-none">
            <img src="{{ asset('img/AdminLTELogo.png') }}" 
              alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
              <span class="brand-text font-weight-light">AdminLTE 3</span>
          </a>

         <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block text-decoration-none">
                        Welcome, {{ auth()->user()->name }}
                    </a>
                    <a href="{{ route('admin.logout') }}" class="d-block text-decoration-none">
                        Logout
                        <span class="fa fa-sign-out"></span>
                    </a>
                </div>
            </div>

            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column"  role="menu" data-accordion="false">
                  <li class="nav-item">
                    <li class="nav-item">
                        <a href="pages/mailbox/mailbox.html" class="nav-link">
                          <i class="fa-solid fa-user me-2"></i>
                          <p>Profile</p>
                        </a>
                    </li>

                  </li>
                </ul>
                <ul class="nav nav-pills nav-sidebar flex-column" 
                  data-widget="treeview" 
                  role="menu" 
                  data-accordion="false">
                  <li class="nav-header">
                    MULTI LEVEL EXAMPLE
                  </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon far fa-envelope"></i>
                      <p> Mailbox
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
              </ul>
            </li>
        </ul>
    </li>
   </ul>
  </nav>
</div>
</aside>