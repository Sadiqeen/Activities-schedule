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
  $table = 'users';
   
  // Table's primary key
  $primaryKey = 'id';
   
  // Array of database columns which should be read and sent back to DataTables.
  // The `db` parameter represents the column name in the database, while the `dt`
  // parameter represents the DataTables column identifier. In this case simple
  // indexes
  $columns = array(
        array( 'db' => '`u`.`id`',                    'dt' => 0, 'field' => 'id'  ),
        array( 'db' => '`u`.`name`',                  'dt' => 1, 'field' => 'name'  ),
        array( 'db' => '`u`.`email`',                  'dt' => 2, 'field' => 'email'  ),
        array( 'db' => '`u`.`position`',              'dt' => 3, 'formatter' => function( $d, $row ) {
                if ($d == 2) {
                    return 'Faculty';
                } else {
                    return 'Department';
                }
            },
            'field' => 'position' ),
        array( 'db' => '`f`.`fname`',                  'dt' => 4, 'field' => 'fname'  ),
        array( 'db' => '`d`.`dname`',                  'dt' => 5, 'field' => 'dname'  ),
        array( 'db' => '`u`.`name`',                  'dt' => 6, 'formatter' => function( $d, $row ) {
          return '
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary btn-sm" id="cp" >Change password</button>
                <button type="button" class="btn btn-danger btn-sm" id="del" >Delete</button>
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
  $joinQuery = "FROM `{$table}` AS `u`  LEFT JOIN `departments` AS `d` ON (`d`.`id` = `u`.`departments_id`)
                                        LEFT JOIN `faculties` AS `f` ON (`f`.`id` = `d`.`Faculties_id`)";
  $having = "(`u`.`position` != 1)";

    require( '../classTable/ssp.customized.class.php' );

  echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $having)
  );