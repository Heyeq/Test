<?php
session_start();
if (!$_SESSION['user']) {
    header('Location:./login.php');
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Авторизация и регестрация</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<form class="profile">
    <h1 class="">Hellow</h1>
    <h2 style="margin: 10px 0; color: orangered"><?= $_SESSION['user']['full_name'] ?></h2>
    <a href="./exit.php" class="logout">Выйти</a>
</form>

</body>
</html>
