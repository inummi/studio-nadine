<?php

require SITE_ROOT . '/app/database/connect.php';

$login = '';
$password = '';
$passwordRepeat = '';
$msg = '';

//Запись в сессию
function authorization_session($array){
    $_SESSION['id'] = $array['id'];
    $_SESSION['login'] = $array['login'];
    $_SESSION['status'] = $array['status'];
                
    if ($_SESSION['status'] == 1){
        header('location: ' . BASE_URL);
    }    
}

//Авторизация пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['btn-auth']){
    
    $login = trim(htmlspecialchars($_POST['login']));
    $password = trim(htmlspecialchars($_POST['password']));
    $passwordRepeat = trim(htmlspecialchars($_POST['passwordRepeat']));

    if ($login === '' || $password === '' || $passwordRepeat === '') {
        $msg = 'Должны быть заполнены все поля';
    }elseif ($password !== $passwordRepeat){
        $msg = 'Пароли не совпадают';
    }else{
        $query = "SELECT * FROM users WHERE login= '" . $login . "'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['password']){
           authorization_session($row); 
        }else{
            $msg = 'Данные введены неверно';
        }
    }
}
