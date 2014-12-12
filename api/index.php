<?php
include '../includes/get_tables.php';

$table_name = $_GET['t'];

$sql = "SELECT * FROM $table_name";

$array = getArraySQL($sql);
$JSONarray = json_encode($array);

echo $JSONarray;