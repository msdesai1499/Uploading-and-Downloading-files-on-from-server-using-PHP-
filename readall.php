<?php
// include_once "config.php";
// include "core/Database.php";
// include "core/Faculty.php";

require 'config.php';
require 'core/filehandler.php';
require 'core/Database.php';
require 'core/Faculty.php';
	
header('Content-type: application/json');

$db=new Database();
$faculty=new Faculty($db->connect());

echo $faculty->getRecords();


?>