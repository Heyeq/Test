<?php
session_start();
if ($_SESSION['user']){
    header('Location: ./profile.php');
}
require __DIR__ . '/func.php';

$user = [
    'full_name' => "",
    'login' => "",
    'email' => "",
    'password' => "",
    'password_confirm' => "",
];

$errors = [
    'full_name' => "",
    'login' => "",
    'email' => "",
    'password' => "",
    'password_confirm' => "",

];
$isValid = true;
if($_SERVER['REQUEST_METHOD']=== 'POST') {
    $user = array_merge($user, $_POST);
    $isValid = validateUser($user, $errors);


        if ($isValid) {
        $user = CreateUser($_POST);
        $_SESSION['message'] ='Регестрация прошла успешна';
        header("location:./login.php");
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регестрация</title>
</head>
<body></body>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h2>Регестрация нового пользователя</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST" id="form" enctype="multipart/form-data" class="needs-validation" novalidate>
                    <br class="form-group" >
                    <label>Имя</label><br>
                    <input type="text"   class="form-control <?=$errors['full_name'] ? 'is-invalid':''?>" name="full_name" value="<?= $user['full_name']?>"  placeholder="Введите ваше имя" required >
                    <div class="invalid-feedback">
                        <?=$errors['full_name']?>
                    </div></br>
                    <label>Логин</label><br>
                    <input type="login"  class="form-control <?=$errors['login'] ? 'is-invalid':''?>"  name="login" value="<?=$user['login']?>"   placeholder="Введите ваш логин">
                    <div class="invalid-feedback">
                        <?=$errors['login']?>
                    </div></br>
                    <label>Email</label>
                    <input type="email"  class="form-control <?=$errors['email'] ? 'is-invalid':''?>"  name="email" value="<?=$user['email']?>" placeholder="Введите ваше Email" required>
                    <div class="invalid-feedback">
                        <?=$errors['email']?>
                    </div></br>
                    <label>Пароль</label>
                    <input type="password"  class="form-control <?=$errors['password'] ? 'is-invalid':''?>" name="password" placeholder="Введите ваш пароль" required>
                    <div class="invalid-feedback">
                        <?=$errors['password']?>
                    </div></br>
                    <label>Потверждение пароля</label>
                    <input type="password"  class="form-control <?=$errors['password_confirm'] ? 'is-invalid':''?>" name="password_confirm" value="" placeholder="Введите ваш пароль"required>
                    <div class="invalid-feedback">
                        <?=$errors['password_confirm']?>
                    </div>
                    <div class="text-center">
                        <button type="submit"  id="btn" class="btn btn-success mt-3">Зарегистрироваться</button><br>
                        У вас уже есть аккаунт ? <a href="./login.php"> Авторизируйтесь</a>
                        </form></div>  </div> </div></div></div></div>
<script src="../js/jquery-3.5.1.min.js"></script>
</html>
