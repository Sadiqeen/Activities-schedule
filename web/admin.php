<?php
  require './db-config.php'; //$conn pdo connect
  require './web-detail.php';
  require './ss.php';
  require './php/ogn.class.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Table event |
    <?php echo $title ?>
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="<?php echo $favicon;?>"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href=" ./bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" ./bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href=" ./bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href=" ./bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" ./dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href=" ./dist/css/skins/_all-skins.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="./bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="./index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>FTU</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>
            <?php echo $title_logo[0] ?></b>
          <?php echo $title_logo[1] ?></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src=" ./dist/img/avatar04.png" class="user-image" alt="User Image">
                <span class="hidden-xs">
                  <?php echo $_SESSION["name"] ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src=" ./dist/img/avatar04.png" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION["name"] ?>
                    <small>
                      <?php 
                        if ($_SESSION['position'] == 1) {
                          echo  $_SESSION["department"].'<br>';
                          echo '- Administrator -';
                        } else if ($_SESSION['position'] == 2) {
                          echo $_SESSION["faculty"].'<br>';
                          echo '- Faculty -';
                        } else {
                          echo $_SESSION["department"].'<br>';
                          echo '- Department -';
                        }
                      ?>
                    </small>
                  </p>
                </li>
                <!-- Menu Footer-->
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
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php 
      if ($_SESSION["position"] == 1) {
        require "./sub_admin/nav1.php";
      } else {
        require "./sub_admin/nav2.php";
      }
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <?php
              if ($_SESSION["position"] == 1) {
                require "./sub_admin/select_bar1.php";
              } else if (($_SESSION["position"] == 2)) {
                require "./sub_admin/select_bar2.php";
              } else {
                require "./sub_admin/select_bar3.php";
              }
               
            ?>

            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
              <?php 
                if ($_SESSION["position"] == 1) {
                  require "./sub_admin/tb1.php";
                } else {
                  require "./sub_admin/tb2.php";
                }
              ?>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <?php require "./sub_admin/modal_addevent.php" ?>
    <?php require "./sub_admin/modal_dlevent.php" ?>
    <?php require "./sub_admin/modal_edevent.php" ?>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <!-- <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab"></div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src=" ./bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src=" ./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src=" ./bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src=" ./bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src=" ./bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src=" ./bower_components/fastclick/lib/fastclick.js"></script>
  <!-- date-range-picker -->
  <script src="./bower_components/moment/min/moment.min.js"></script>
  <script src="./bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="./bower_components/bootstrap-notify-master/bootstrap-notify.min.js"></script>
  <!-- AdminLTE App -->
  <script src=" ./dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src=" ./dist/js/demo.js"></script>
  <!-- page script -->
  <?php
      if ($_SESSION["position"] == 1) {
        echo '<script src="./js/admin.js"></script>';
      } else if ($_SESSION["position"] == 2) {
        echo '<script src="./js/admin1.js"></script>';
      } else {
        echo '<script src="./js/admin2.js"></script>';
      }
  ?>
  
  <script>
    var today = new Date(); 
    $('#reservationtime').daterangepicker({
      minDate:today,
      timePicker: true,
      timePickerIncrement: 15,
      timePicker24Hour: true,
      timeZone:'Asia/Bangkok',
      locale: {
          format: 'DD/MM/YYYY H:mm'
      },
      drops:'up'
    })
    $('#reservationtime-edit').daterangepicker({
      timePicker: true,
      timePickerIncrement: 15,
      timePicker24Hour: true,
      timeZone:'Asia/Bangkok',
      locale: {
          format: 'DD/MM/YYYY H:mm'
      },
      drops:'up'
    })
  </script>
</body>

</html>