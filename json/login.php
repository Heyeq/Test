<?php
session_start();
if ($_SESSION['user']){
    header('Location: ./profile.php');
}
require __DIR__ . '/func.php';
define('MyConst', true);
?>

<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Авторизация</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<form>
    <label id="log" >Логин</label>
    <input type="text"  class="form-control" name="login" id="log" value="<?php if(isset($_COOKIE['login'])) echo $_COOKIE['login'];?>" placeholder="Введите ваш Логин" >
    <div class="invalid-feedback">
            </div>
    <label id="pass" >Пароль</label>
    <input type="password"  class="form-control" name="password" id="pass" value="" placeholder="Введите ваш пароль">
    <div class="invalid-feedback">
            </div>
      <button type="submit" class=" btn btn btn-success mt-3">Войти</button>
    <p> У вас нет аккаунта ? <a href="./reg.php"> Зарегистрируйтесь</a></p>
    <p class="msg none"> Регестрация прошла успешна  </p>
    <?php  if($_SESSION['message'] ){
        echo  '<div  class="alert alert-success">'.$_SESSION['message'].'</div>';
    }
    unset($_SESSION['message']);
    ?>
   </form>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/min.js"></script>
</body>
</html>