<?php
    session_start();
  /*
   * DataTables example server-side processing script.
   *
   * Please note that this script is intentionally extremely simply to show how
   * server-side processing can be implemented, and probably shouldn't be used as
   * the basis for a large complex system. It is suitable for simple use cases as
   * for learning.
   *
   * See http://datatables.net/usage/server-side for full details on the server-
   * side processing requirements of DataTables.
   *
   * @license MIT - http://datatables.net/license_mit
   */
   
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * Easy set variables
   */
    // user define

    $fc = isset($_GET['fc']) ? $_GET['fc'] : "";
    $dp = isset($_GET['dp']) ? $_GET['dp'] : "";
    

  // DB table to use
  $table = 'activities';
   
  // Table's primary key
  $primaryKey = 'id';
   
  // Array of database columns which should be read and sent back to DataTables.
  // The `db` parameter represents the column name in the database, while the `dt`
  // parameter represents the DataTables column identifier. In this case simple
  // indexes
  $columns = array(
        array( 'db' => '`a`.`id`',                    'dt' => 0, 'field' => 'id'  ),
        array( 'db' => '`a`.`name`',                  'dt' => 1, 'field' => 'name'  ),
        array( 'db' => '`a`.`start_time`',            'dt' => 2,  'formatter' => function( $d, $row ) {
            return date("d/m/Y H:i", strtotime($d));},    'field' => 'start_time'  ),
        array( 'db' => '`a`.`end_time`',            'dt' => 3,  'formatter' => function( $d, $row ) {
            return date("d/m/Y H:i", strtotime($d));},    'field' => 'end_time'  ),
        array( 'db' => '`d`.`dname`',                  'dt' => 5, 'field' => 'dname'  ),
        array( 'db' => '`f`.`fname`',                  'dt' => 4, 'field' => 'fname'  ),
        array( 'db' => '`a`.`name`',            'dt' => 6, 'formatter' => function( $d, $row ) {
          return '
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary" id="ed" >Edit</button>
                <button type="button" class="btn btn-danger" id="del" >Delete</button>
            </div>
            ';},
            'field' => 'name' ),
  );
   
  // SQL server connection information
  require( '../db-config.php' );
  $sql_details = array(
      'user' => $dbInfo['user'],
      'pass' => $dbInfo['pass'],
      'db'   => $dbInfo['db'],
      'host' => $dbInfo['host']
  );
   
   
  /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   * If you just want to use the basic configuration for DataTables with PHP
   * server-side, there is no need to edit below this line.
   */
  $joinQuery = "FROM `{$table}` AS `a` LEFT JOIN `departments` AS `d` ON (`d`.`id` = `a`.`Department_id`)
                                        LEFT JOIN `faculties` AS `f` ON (`f`.`id` = `d`.`Faculties_id`)
                                        ";
//   $having = "(`b`.`status` = 2))";

    require( '../classTable/ssp.customized.class.php' );
    
    if ($fc == 1 && $dp == 1) {
        $having = "(`a`.`approve` = 1)";
        $query = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $having);
    } else if ($dp == 1 || $dp == 2 || $dp == 3 || $dp == 4 || $dp == 5 || $dp == 6) {
        $having = "(`f`.`id` = $fc) AND (`a`.`approve` = 1)";
        $query = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $having);
    } else {
        $having = "(`d`.`id` = $dp) AND (`a`.`approve` = 1)";
        $query = SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $having);
    }
   
  echo json_encode(
    $query
  );