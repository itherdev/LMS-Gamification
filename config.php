<?php
$online_version = 1;
if ($_SERVER['SERVER_NAME'] == "localhost") $online_version = 0;


if ($online_version) {
	$db_server = "localhost";
	$db_user = "";
	$db_pass = "";
	$db_name = "";
} else {
	$db_server = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "db_siakad3";
}

$cn = new mysqli($db_server, $db_user, $db_pass, $db_name);
if ($cn->connect_errno) {
	echo "Error Config# Failed to connect to MySQL";
	exit();
}

date_default_timezone_set("Asia/Jakarta");
