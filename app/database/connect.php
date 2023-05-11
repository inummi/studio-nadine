<?php

session_start();
require 'config.php';


$link = mysqli_connect($host, $db_user, $password, $db_name);

mysqli_query($link, "SET NAMES 'utf8'");


/*
echo '<pre>';
print_r($row);
echo '</pre>';
*/