<?php
/*
 * set var
 */
$cfHost = "localhost";
$cfUser = "webtech62_g40";
$cfPassword = "132075";
$cfDatabase = "webtech62_g40";
 
/*
 * connection mysql
 */
$meConnect = mysql_connect($cfHost, $cfUser, $cfPassword) or die("Error conncetion mysql...");
$meDatabase = mysql_select_db($cfDatabase);
mysql_query("SET NAMES UTF8");
?>