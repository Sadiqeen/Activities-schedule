<?php
    echo "test1";
    require './db-config.php'; //$conn pdo connect
    echo "test2";
    require './web-detail.php';
    echo "test3";
    require './php/ogn.class.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?>
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/png" href="<?php echo $favicon;?>"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./bower_components/Ionicons/css/ionicons.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="./bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="./bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="./dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper" style="background-color: #ecf0f5;">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="./index.php" class="navbar-brand">
              <b>
                <?php echo $title_logo[0] ?></b>
              <?php echo $title_logo[1] ?>
            </a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <?php require "./sub_login/nav.php" ?>

          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper" style="min-height: 214px;margin-top:20px">
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <!-- Calendar -->
            <div class="box box-denger">
              <div class="box-body px-2">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <select class="form-control" name="" id="fc" onchange="get_department();">
                      <?php DBrender::get_faculties($conn) ?>
                    </select>
                  </div>
                  <div class="col-md-6 form-group">
                    <select class="form-control" name="" id="dp">
                    <option value='1' selected>All</option>
                    </select>
                  </div>
                  <div class="col-md-12  form-group">
                    <?php DBrender::fc_color($conn) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <!-- Calendar -->
            <div class="box box-primary">
              <div class="box-body px-2">
                <div id="calendar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>

    <div class="modal fade" id="modal-info">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
          <table class="table  table-hover">
              <thead>
                <tr>
                  <th scope="col" style="width:30%"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="text-center">Title</th>
                  <td class="text-primary"><p id="tt"></parse_ini_string></td>
                </tr>
                <tr>
                  <th scope="row" class="text-center">Detail</th>
                  <td class="text-primary"><p id="dt"></p></td>
                </tr>
                <tr>
                  <th scope="row" class="text-center">Start</th>
                  <td class="text-primary"><p id="st"></p></td>
                </tr>
                <tr>
                  <th scope="row" class="text-center">End</th>
                  <td class="text-primary"><p id="et"></p></td>
                </tr>
                <tr>
                  <th scope="row" class="text-center">URL</th>
                  <td class="text-primary"><a id="url"></a></td>
                </tr>
                <tr>
                  <th scope="row" class="text-center">Faculty</th>
                  <td class="text-primary"><p id="fname"></p></td>
                </tr>
                <tr>
                  <th scope="row" class="text-center">Department</th>
                  <td class="text-primary"><p id="dname"></p></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
      </div>
      <!-- /.container -->
    </footer>
  </div>

  <?php require "./sub_login/modal_login.php"; ?>
  <?php require "./sub_login/Aboutus.php"; ?>
  <!-- ./wrapper -->
  <!-- jQuery 3 -->
  <script src="./bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="./bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- SlimScroll -->
  <script src="./bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="./bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./dist/js/demo.js"></script>
  <!-- fullCalendar -->
  <script src="./bower_components/moment/moment.js"></script>
  <script src="./bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="./js/login.js"></script>
  <script>
    $(function () {
      get_department()
      $('#calendar').fullCalendar({
        timeFormat : 'HH:mm',
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        defaultView: 'month',
        events: {
          url: './php/calendar_con.php',
            data: function () { // a function that returns an object
                return {
                    fc : $('#fc option:selected').val(),
                    dp : $('#dp option:selected').val(),
                };

            }
        },
        eventClick: function (event) {
          $('#tt').text(event.title);
          $('#dt').text(event.detail);
          $('#st').text(moment(event.start).format("dddd DD/MM/YYYY HH:mm"));
          $('#et').text(moment(event.end).format("dddd DD/MM/YYYY HH:mm"));
          $('#fname').text(event.fname);
          $('#dname').text(event.dname);
          $('#url').text(event.url);
          $("#url").attr("href", event.url)
          $('#modal-info').modal('show')
          if (event.url) {
            return false;
          }   
        }
      });

      $('#dp').on('change', function() {
        $('#calendar').fullCalendar('refetchEvents');
      });
    })

    function get_department() {
    $.ajax({
        method: 'POST',
        url: './php/get_department.php',
        dataType: "json",
        data: {
            id :  $('#fc option:selected').val(),
        },
    }).done(function (data) {
        res_get_department(data)
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log(jqXHR + ajaxOptions + thrownError);
    });
    }

    function res_get_department(data) {
        $("#dp").empty();
        for (let index = 0; index < data.length; index++) {
            if (index == 0) {
                $("#dp").append('<option value="'+data[index]['id']+'" selected>'+data[index]['dname']+'</option>');
            } else {
                $("#dp").append('<option value="'+data[index]['id']+'">'+data[index]['dname']+'</option>');
            }
        }
        $('#calendar').fullCalendar('refetchEvents');
    }
  </script>
</body>

</html>