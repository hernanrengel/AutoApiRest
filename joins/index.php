<?php

include '../includes/get_tables.php';

$table_name = $_GET['table_name'];

$sql = "DESCRIBE " . $table_name;

$array = getArraySQL($sql);
$JSONarray = json_encode($array);

echo $JSONarray;




