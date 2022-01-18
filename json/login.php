<?php
session_start();
if ($_SESSION['user']){
    header('Location: ./profile.php');
}
require __DIR__ . '/func.php';
$login = trim($_POST['login']);
$password = ($_POST['password']);
$password = md5($password);


    if (checkUser($login, $password) > 0) {
        $_SESSION ['user'] = checkUser($login, $password);
        setcookie("login", $login, time() + 60);
        setcookie("password", $password, time() + 60);
    }
    else{
        setcookie("login", $login, time() - 60);
        setcookie("password", $password, time() - 60);
    }



$user = [
    'login' => "",
    'password' => "",

];

$errors = [
    'login' => "",
    'password' => "",

];
$isValid = true;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = array_merge($user,$_POST);
    if (!$user['login']) {
        $isValid = false;
        $errors ['login'] = 'Введите Логин';
    }


    if (!$user['password']) {
        $isValid = false;
        $errors ['password'] = 'Введите пароль';
    }


    if($isValid) {

        header("location:./profile.php");
    }
}




?>

<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Авторизация и регестрация</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body></body>
<form action="" method="POST" enctype="multipart/form-data">
    <label>Логин</label>
    <input type="text"  class="form-control  <?=$errors['login'] ? 'is-invalid':''?>" name="login" value="<?php if(isset($_COOKIE['login'])) echo $_COOKIE['login'];?>" placeholder="Введите ваш Логин" >
    <div class="invalid-feedback">
        <?=$errors['login']?>
    </div>
    <label>Пароль</label>
    <input type="password"  class="form-control <?=$errors['password'] ? 'is-invalid':''?>" name="password" value="" placeholder="Введите ваш пароль">
    <div class="invalid-feedback">
        <?=$errors['password']?>
    </div>
      <button type="submit" class="btn btn btn-success mb-3">Войти</button>
    <p> У вас нет аккаунта ? <a href="./reg.php"> Зарегистрируйтесь</a></p>
    <?php  if($_SESSION['message'] ){
        echo  '<p class="msg">'.$_SESSION['message'].'</p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
</html