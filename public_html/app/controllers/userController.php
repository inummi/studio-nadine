<?php

require 'app/database/connect.php';

$login = '';
$password = '';
$passwordRepeat = '';
$msg = '';

function authorization(){
	global $link;

	$login = trim(htmlspecialchars($_POST['login']));
	$password = trim(htmlspecialchars($_POST['password']));
	$passwordRepeat = trim(htmlspecialchars($_POST['passwordRepeat']));


	if ($login === '' || $password === '' || $passwordRepeat === '') {
		$msg = 'Должны быть заполнены все поля';
	}

	$query = "SELECT * FROM users WHERE login= '" . $login . "'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$row = mysqli_fetch_assoc($result);
	//return $result;

}

echo'<pre>';
print_r(authorization());
echo '</pre>';



/*
$query = "SELECT * FROM users";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

$row = mysqli_fetch_assoc($result);
*/

