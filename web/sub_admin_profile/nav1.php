<aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src=" ./dist/img/avatar04.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>
              <?php echo $_SESSION["name"] ?>
            </p>
            <a href="#"><i class="fa fa-circle text-success"></i>
              <?php
                if ($_SESSION['position'] == 1) {
                  echo 'Administrator';
                } else if ($_SESSION['position'] == 2) {
                  echo 'Faculty';
                } else {
                  echo 'Department';
                }
              ?>
              </a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li>
            <a href="./admin.php">
              <i class="fa fa-calendar"></i> <span>Table calendar</span>
            </a>
          </li>
          <li>
            <a href="./admin-approve.php">
              <i class="fa fa-calendar"></i> <span>Approve event</span>
            </a>
          </li>
          <li>
            <a href="./admin-setting.php">
              <i class="fa fa-cog"></i> <span>Setting</span>
            </a>
          </li>
          <li>
            <a href="./admin-user.php">
              <i class="fa fa-users"></i> <span>Manage users</span>
            </a>
          </li>
          <li  class="active">
            <a href="./admin-profile.php">
              <i class="fa fa-user"></i> <span>Profile</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>