<header class="main-header">
<!-- Logo -->
<a href="<?php echo site_url(); ?>" class="logo">
  <span class="logo-mini"><b>BS</b>T</span>
  <span class="logo-lg"><b>BST </b>System </span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  
  <div class="navbar-custom-menu">
  
    <ul class="nav navbar-nav">
      
      <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span><?php $userSession = $this->session->userdata('userSession'); echo $userSession['fullName']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><b>Setting</b></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="<?php echo site_url('/setting/users_group'); ?>">
                        <h3>
                            <i class="fa  fa-users"></i>
                            Group Users
                        </h3>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url('/setting/users'); ?>">
                        <h3>
                            <i class="fa fa-wrench"></i>
                            Users Management
                        </h3>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url('/setting/menu_management'); ?>">
                        <h3>
                            <i class="fa fa-gear"></i>
                            Menu Management 
                        </h3>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo site_url('/site/logout'); ?>">
                        <h3>
                            <i class="fa fa-power-off"></i>
                            Logout
                        </h3>
                    </a>
                  </li>
                  
                </ul>
              </li>
            </ul>
          </li>
    </ul>
  </div>
</nav>
</header>