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
        array( 'db' => '`a`.`name`',                  'dt' => 1, 'formatter' => function( $d, $row ) {
            return '<a id="info" href="#">'.$d.'</a>';
                },'field' => 'name' ),
        array( 'db' => '`a`.`name`',                  'dt' => 2, 'field' => 'name'  ),
        array( 'db' => '`a`.`detail`',                  'dt' => 3, 'field' => 'detail'  ),
        array( 'db' => '`a`.`start_time`',            'dt' => 4,  'formatter' => function( $d, $row ) {
            return date("d/m/Y H:i", strtotime($d));},    'field' => 'start_time'  ),
        array( 'db' => '`a`.`end_time`',            'dt' => 5,  'formatter' => function( $d, $row ) {
            return date("d/m/Y H:i", strtotime($d));},    'field' => 'end_time'  ),
        array( 'db' => '`f`.`fname`',                  'dt' => 6, 'field' => 'fname'  ),
        array( 'db' => '`d`.`dname`',                  'dt' => 7, 'field' => 'dname'  ),
        array( 'db' => '`u`.`name` as `uname`',                  'dt' => 8, 'field' => 'uname'  ),
        array( 'db' => '`a`.`url`',                  'dt' => 9,  'field' => 'url' ),
        array( 'db' => '`a`.`name`',                  'dt' => 10, 'formatter' => function( $d, $row ) {
          return '
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-success btn-sm" id="ap" >Approve</button>
                <button type="button" class="btn btn-danger btn-sm" id="rj" >Reject</button>
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
  $joinQuery = "FROM `{$table}` AS `a`  LEFT JOIN `departments` AS `d` ON (`d`.`id` = `a`.`Department_id`)
                                        LEFT JOIN `faculties` AS `f` ON (`f`.`id` = `d`.`Faculties_id`)
                                        LEFT JOIN `Users` AS `u` ON (`u`.`id` = `a`.`Users_id`)";
  $having = "(`a`.`approve` = 0)";

    require( '../classTable/ssp.customized.class.php' );

  echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $having)
  );