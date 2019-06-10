<?php

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

// DB table to use
$table = 'skor';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => '`s`.`id`', 'dt' => 0, 'field' => 'id' ),
	array( 'db' => '`s`.`nilai`',  'dt' => 1, 'field' => 'nilai' ),
	array( 'db' => '`s`.`kode`',   'dt' => 2, 'field' => 'kode' ),
	array( 'db' => '`s`.`unit`',     'dt' => 3, 'field' => 'unit'),
	array( 'db' => '`s`.`tgl`',     'dt' => 4, 'field' => 'tgl' ),
	array( 'db' => '`f`.`nama`',     'dt' => 5, 'field' => 'nama' )
	
);

// SQL server connection information
// require('config.php');
$sql_details = array(
	'user' => 'root',
	'pass' => '',
	'db'   => 'ppi',
	'host' => 'localhost'
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

// require( 'ssp.class.php' );
require('ssp.customized.class.php' );

$joinQuery = "FROM `skor` AS `s` JOIN `formula` AS `f` ON (`s`.`formula_id` = `f`.`id`)";
$extraWhere = "";
$groupBy = "";
$having = "";

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);
