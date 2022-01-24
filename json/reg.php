<?php
session_start();
if ($_SESSION['user']){
    header('Location: ./profile.php');
}
require __DIR__ . './func.php';

?>
<!DOCTYPE html>
<html lang="en" xmlns="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регестрация</title>
    <link rel="stylesheet" href="../css/main.css">

</head>
<body>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h4>Регестрация нового пользователя</h4>
            </div>
            <div class="card-body">
                <form>
                    <br class="form-group" >
                    <label>Имя</label>
                    <input type="text"   class="form-control"  name="full_name" value=""  placeholder="Введите ваше имя" required >
                    <div class="invalid-feedback">
                        Данное поле может содержать не более двух символов латинского алфавита
                    </div></br>
                    <label>Логин</label>
                    <input type="login"  class="form-control"  name="login" value=""   placeholder="Введите ваш логин"  required>
                    <div class="invalid-feedback">
                        Логин не должен быть меньше 6 символов
                    </div></br>
                     <label>Email</label>
                    <input type="email"  class="form-control"  name="email" value="" placeholder="Введите ваше Email" required >
                    <div class="invalid-feedback">
                        Данное поле заполнннен не корректно пример: wqe@gmail.com
                    </div></br>
                    <label>Пароль</label>
                    <input type="password"  class="form-control " name="password" placeholder="Введите ваш пароль" required>
                    <div class="invalid-feedback">
                        Введите пароль, он не должен быть больше 6 символов и не должен содержат в себе пробелы
                    </div></br>
                    <label>Потверждение пароля</label>
                    <input type="password"  class="form-control" name="password_confirm" value="" placeholder="Введите ваш пароль" required>
                    <div class="invalid-feedback">
                        Повторите пароль
                    </div>
                    <div class="text-center">
                        <button type="submit"  id="btn" class="btn btn-success mt-3">Зарегистрироваться</button><br>
                        У вас уже есть аккаунт ? <a href="./login.php"> Авторизируйтесь</a>
                        <p class=" alert alert-success  none"></p>
                        <p class="msg alert alert-danger none"></p>
                        </div> </form>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/reg.js"></script>

</body>
</html>
