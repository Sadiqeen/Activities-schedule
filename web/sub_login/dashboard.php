<li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="./dist/img/avatar04.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION["name"] ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="./dist/img/avatar04.png" class="img-circle" alt="User Image">
              <p>
                <?php echo $_SESSION["name"] ?>
                <small><?php echo $_SESSION["department"] ?></small>
              </p>
            </li>
            <li class="user-body">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <a href="./admin.php">Dashboard</a>
                </div>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="./admin-profile.php" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="./logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>