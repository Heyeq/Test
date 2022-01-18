<?php
function getUsers()
{
    return json_decode(file_get_contents(__DIR__.'/users.json'), true);
}
function getUsersById($id){ // определение ID
    $users = getUsers();
       foreach ($users as $user){
        if($user['id']== $id){
            return $user;
        }
    }
    return  null;
}
function CreateUser($data){ // создание данных
$users = getUsers();
$data['id'] = rand(1000000,2000000);
$data['full_name'] = htmlspecialchars($_POST['full_name']);
$data['password'] = md5($_POST['password']);
$data['password_confirm'] = md5($_POST['password_confirm']);
$users[] = $data;
file_put_contents(__DIR__.'/users.json', json_encode($users));
return $data;
}
function updateUser($data, $id){ //обновление данных
$users = getUsers();
$data['password'] = md5($_POST['password']);
foreach ($users as $i => $user) {
    if ($user['id'] == $id){
        $users[$i] = array_merge($user,$data);
}
}
file_put_contents(__DIR__.'/users.json', json_encode($users));


}

function DeleteUsers($id){ // удаление данных
$users = getUsers();
foreach ($users as $i => $user){
    if ($user['id'] == $id){
    array_splice($users, $i, 1);

    }
}
    file_put_contents(__DIR__.'/users.json', json_encode($users));
}

function checkUser($login,$password){
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['login'] === $login && $user['password'] === $password) {
            return $user;

        }
    }

    return null;

}
function loginUser($login){
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['login'] === $login) {
            return $user;

        }
    }

    return null;

}
function emailUser($email){
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return $user;

        }
    }

    return null;

}

function validateUser ($user, &$errors){

    $isValid = true;
    $pattern= '/^([a-z]{2,2})+$/iu';
    if (preg_match($pattern, $user['full_name'])) {
    }
    else{
        $isValid = false;
        $errors ['full_name'] = 'Данное поле может содержать только буквы';
    }       if (empty($user['login'])  ) {
        $isValid = false;
        $errors ['login'] = 'Данный логин не может быть пустым';
    }

    if (loginUser($user['login'] ) > 0 ) {
        $isValid = false;
        $errors ['login'] = 'Данный логин уже используется';
    }

    if (emailUser($user['email']) > 0) {
        $isValid = false;
        $errors ['email'] = 'Пользователь с таким email существует выберите другое имя';
    }


    if (!$user['full_name'] || strlen($user['full_name']) < 2 || strlen($user['full_name'] ) > 2 ) {
        $isValid = false;
        $errors ['full_name'] = 'Данно поле может содержать не более двух символов латинского алфавита';
    }
    if (!$user['login'] || strlen($user['login']) < 6 || strlen($user['login']) > 6 ) {
        $isValid = false;
        $errors ['login'] = 'Логин не должен быть меньше 6 символов';
    }

    if (!$user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors ['email'] = 'Проврьте правельность ввода';
    }
    if (!$user['password_confirm']) {
        $isValid = false;
        $errors ['password_confirm'] = 'Заполните данное поле корректно';
    }
    if (!$user['password'] || strlen($user['password']) < 6 || strlen($user['password']) > 6) {
        $isValid = false;
        $errors ['password'] = 'Заполните пустое поле';
    }

    if ($user['password'] === $user['password_confirm']) {
        $user['password'] = md5($user['password']);
    } else {
        $isValid = false;
        $errors ['password'] = "Пароли не совпадают";
    }
return $isValid;
}