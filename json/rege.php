<?php
session_start();
require __DIR__ . './func.php';
$full_name = $_POST['full_name'] ;
$login = $_POST['login'] ;
$email= $_POST['email'] ;
$password= $_POST['password'] ;
$password_confirm= $_POST['password_confirm'];
$pattern= '/^([a-z])+$/iu';
$check_email ='/^.+@.+\..+$/im';
$check_password = '/^[0-9a-zA-Z]{6,}/iu';
$check_login= '/^([a-z0-9])+$/iu';
$error_fields = [

];

if (preg_match($check_password, $password )) {
}
else{

    $error_fields [] = 'password';
}
if (preg_match($check_password, $password_confirm)) {
}
else{

    $error_fields [] = 'password_confirm';
}

if (preg_match($check_email, $email)) {
}
else{
     $error_fields  [] = 'email';
}
if (preg_match($pattern, $full_name)) {
}
else{

    $error_fields  [] = 'full_name';
}
if (preg_match($check_login, $login)) {
}
else{

    $error_fields [] = 'login';
}
if (loginUser($login ) > 0 ) {
    $error_fields [] = 'login';
  }

if (emailUser($email) > 0) {
   $error_fields  [] = 'email';
}

if (!$full_name || strlen($full_name) < 2 || strlen($full_name) > 2 ) {
    $error_fields  [] = 'full_name';
}
if (!$login || strlen($login) < 6 || strlen($login) > 6 ) {

    $error_fields  [] = 'login';
}

if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $error_fields  [] = 'email';
}
if (!$password_confirm) {

    $error_fields  [] = 'password_confirm';
}
if (!$password || strlen($password) < 6 || strlen($password) > 6) {

    $error_fields  [] = 'password';
}
if ($password === !$password_confirm) {
    $error_fields  [] = 'password';
}

if (!empty($error_fields)){
    $response = [
        "status"=>false,
        "type"=> 1,
        "message"=>"Заполните все поля коректно",
        "fields" => $error_fields
    ];
    echo json_encode($response);
    die();
}
if($password === $password_confirm) {
    $password = md5($password);
    $user = CreateUser($_POST);

    $response = [
        "status"=>true,
         "message"=>"Регестрация прошла успешно",
          ];
    echo json_encode($response);

} else{
    $response = [
        "status" =>false,
        "message"=>"Не все поля заполнены",
    ];
    echo json_encode($response);
}


