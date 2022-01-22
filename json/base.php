<?php
session_start();
if ($_SESSION['user']) {
    header('Location:./login.php');
}
require_once 'func.php';
$users = getUsers();
if(!defined('MyConst')) {
    header("location:./login.php");
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
    <title>База данных</title>
</head>
<body>
</body>
<section>
    <div class="container mt-3">
        <a href="create.php" class="btn btn-sm btn-success mb-1" ><i class="fas fa-plus"></i></a>
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 5%;">id</th>
                        <th scope="col" class="text-center">full_name</th>
                        <th scope="col" class="text-center">login</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Password</th>
                        <th scope="col" class="text-center">&#9998</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user){

                        ?>
                        <tr>
                            <th scope="col" style="width: 5%;"><?= $user['id']?></th>
                            <td class="text-center"> <?= $user['full_name']?></td>
                            <td class="text-center"> <?= $user['login']?></td>
                            <td class="text-center"> <a target="_blank" href="http://<?= $user["email"]?>"> <?= $user["email"]?></a></td>
                            <td class="text-center"> <?= $user["password"]?></td>
                            <th class="text-center">
                                <a href="view.php?id=<?= $user['id']?>" class="btn btn-sm btn-outline-info mb-1" ><i class="fas fa-eye"></i></a>
                                <a href="update.php?id=<?= $user['id']?>" class="btn btn-sm btn-outline-success mb-1"><i class="fas fa-edit"></i></a>
                                <a href="delete.php?id=<?= $user['id']?>"class="btn btn-sm btn-outline-danger mb-1" ><i class="fas fa-trash"></i></a></th>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</html>