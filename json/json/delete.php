<?php
require __DIR__.'/func.php';
$userId = $_GET['id'];
DeleteUsers($userId);
//$user = getUsersById($userId );
header("location:./base.php");