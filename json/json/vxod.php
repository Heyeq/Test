<?php
session_start();
require __DIR__ . '/func.php';
$login = $_POST['login'];
$password = $_POST['password'];
$errors = [];
if ($login === ''){
   $errors[] = 'login';
}
if ($password === ''){
    $errors[] = 'password';
}
if (!empty($errors)){
    $response = [
        "status"=>false,
        "type"=> 1,
        "message"=>"Вы ввели не все данные",
        "fields" => $errors
    ];
    echo json_encode($response);
    die();
}
$password = md5($password);
if (checkUser($login, $password) > 0) {
    $_SESSION['user'] = checkUser($login, $password);
    setcookie("login", $login, time() + 60);
    setcookie("password", $password, time() + 60);
    $response = [
        "status" => true
    ];
    echo json_encode($response);

}
else {
    setcookie("login", $login, time() - 60);
    setcookie("password", $password, time() - 60);
    $response = [
        "status" => false,
        "message" => "Не верный логин или пароль",
    ];
    echo json_encode($response);
}