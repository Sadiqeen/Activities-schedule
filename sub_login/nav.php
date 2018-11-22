    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <?php
          isset($_SESSION['id'])?  require './sub_login/dashboard.php' : require './sub_login/login.php' ;
        ?>

        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#modal-ab">
            <i class="fa fa-lg  fa-info-circle"></i>
            <span class="hidden-xs">About Us</span>
          </a>
        </li>

      </ul>
    </div>