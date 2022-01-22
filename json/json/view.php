<?php
require __DIR__.'/func.php';

if (!isset($_GET['id'])){

}
$userId = $_GET['id'];
$user = getUsersById($userId );
if(!$user){

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
    <title>Document</title>
</head>
<body>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <div class="modal-body">
                    <h2>Просмотреть информацию: <?=$user['full_name']?><b></b></h2>
                </div>
                <div class="card-body">
                    <a href="update.php?id=<?= $user['id']?>" class="btn btn-sm btn-outline-success mb-1"><i class="fas fa-edit"></i></a>
                    <a href="delete.php?id=<?= $user['id']?>"class="btn btn-sm btn-outline-danger mb-1" ><i class="fas fa-trash"></i></a>
                    </th>
                </div>

                <table class="table" >
                    <tbody>
                    <tr>
                        <th>full_name:</th>
                        <td><?=$user['full_name']?></td>
                    </tr>
                    <tr>
                        <th>login:</th>
                        <td><?=$user['login']?></td>
                    </tr>
                    <tr>
                        <th>email:</th>
                        <td> <a target="_blank" href="http://<?= $user["email"]?>"> <?= $user["email"]?></a></td>
                    </tr>
                    <tr>
                        <th>password</th>
                        <td><?=$user['password']?></td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
</body>
</html>
