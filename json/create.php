<?php

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

];
$isValid = true;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = array_merge($user,$_POST);
    $isValid = validateUser($user, $errors);
    if ($isValid) {
        $user = CreateUser($_POST);
        header("location:./base.php");
    }

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить пользователя</title>
</head>
<body></body>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h2>Добавить пользователя </h2>
            </div>
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
                    <br class="form-group" >
                   <label>Имя</label><br>
                    <input type="text"  name="full_name" value="<?=$user['full_name']?>" placeholder="Введите ваш Логин"
                           class="form-control <?=$errors['full_name'] ? 'is-invalid':''?>">
                    <div class="invalid-feedback">
                        <?=$errors['full_name']?>
                        </div> </br>
                    <label>Логин</label><br>
                    <input type="text"  name="login" value="<?=$user['login']?>" placeholder="Введите ваш Логин"
                           class="form-control <?=$errors['login'] ? 'is-invalid':''?>">
                    <div class="invalid-feedback">
                        <?=$errors['login']?>
                    </div></br>
                        <label>Email</label>
                        <input type="email"  class="form-control <?=$errors['email'] ? 'is-invalid':''?>"  name="email" value="<?=$user['email']?>" placeholder="Введите ваше Email">
                    <div class="invalid-feedback">
                        <?=$errors['email']?>
                    </div></br>
                         <label>Пароль</label>
                        <input type="password"  class="form-control <?=$errors['password'] ? 'is-invalid':''?>" name="password" value="" placeholder="Введите ваш пароль">
                    <div class="invalid-feedback">
                        <?=$errors['password']?>
                    </div>
                    <label>Потверждение пароля</label>
                    <input type="password"  class="form-control <?=$errors['password_confirm'] ? 'is-invalid':''?>" name="password_confirm" value="<?=$user['password_confirm']?>" placeholder="Введите ваш пароль">
                    <div class="invalid-feedback">
                        <?=$errors['password_confirm']?>
                    </div>
                        <div class="text-center" style="padding: 30px;">
                            <button  type="submit"  class="btn btn-success">Добавить</button>
                </form></div>  </div> </div></div></div></div>

</html>
