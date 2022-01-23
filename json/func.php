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
    $pattern= '/^([a-z])+$/iu';
    $check_email ='/^.+@.+\..+$/im';
    $check_password = '/^[0-9a-zA-Z]{6,}/iu';
    $check_login= '/^([a-z0-9])+$/iu';

    if (preg_match($check_password, $user['password'])) {
    }
    else{
        $isValid = false;
        $errors ['password'] = 'Данное поле не  может содержать в себе пробелы и быть меньше 6 символов';
    }
    if (preg_match($check_password, $user['password_confirm'])) {
    }
    else{
        $isValid = false;
        $errors ['password_confirm'] = 'Данное поле не  может содержать в себе пробелы и быть меньше 6 символов';
    }

    if (preg_match($check_email, $user['email'])) {
    }
    else{
        $isValid = false;
        $errors ['email'] = 'Данное поле заполнннен не корректно пример: wqe@gmail.com';
    }
    if (preg_match($pattern, $user['full_name'])) {
    }
    else{
        $isValid = false;
        $errors ['full_name'] = 'Данное поле может содержать только буквы';
    }
    if (preg_match($check_login, $user['login'])) {
    }
    else{
        $isValid = false;
        $errors ['login'] = 'Данное поле не  может содержать в себе пробелы';
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
        $errors ['password'] = 'Введите пароль';
    }

    if ($user['password'] === !$user['password_confirm']) {
        $isValid = false;
        $errors ['password'] = "Пароли не совпадают";
    }

return $isValid;
}

function  upvalidateUser ($user, &$errors)
{

    $isValid = true;
    $pattern= '/^([a-z])+$/iu';
    $check_email ='/^.+@.+\..+$/im';
    $check_password = '/^[0-9a-zA-Z]{6,}/iu';
    $check_login= '/^([a-z0-9])+$/iu';

    if (preg_match($check_password, $user['password'])) {
    }
    else{
        $isValid = false;
        $errors ['password'] = 'Данное поле не  может содержать в себе пробелы и быть меньше 6 символов';
    }

    if (preg_match($check_email, $user['email'])) {
    }
    else{
        $isValid = false;
        $errors ['email'] = 'Данное поле заполнннен не корректно пример: wqe@gmail.com';
    }
    if (preg_match($pattern, $user['full_name'])) {
    }
    else{
        $isValid = false;
        $errors ['full_name'] = 'Данное поле может содержать только буквы не меньше 2 символов';
    }
    if (preg_match($check_login, $user['login'])) {
    }
    else{
        $isValid = false;
        $errors ['login'] = 'Данное поле не  может содержать в себе пробелы';
    }

        if (!$user['full_name'] || strlen($user['full_name']) < 2 || strlen($user['full_name']) > 2) {
            $isValid = false;
            $errors ['full_name'] = 'Данно поле может содержать не более двух символов латинского алфавита';
        }
        if (!$user['login'] || strlen($user['login']) < 6 || strlen($user['login']) > 6) {
            $isValid = false;
            $errors ['login'] = 'Логин не должен быть меньше 6 символов';
        }

        if (!$user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $errors ['email'] = 'Проврьте правельность ввода';
        }
        if (!$user['password'] || strlen($user['password']) < 6 || strlen($user['password']) > 6) {
            $isValid = false;
            $errors ['password'] = 'Введите пароль';
        }

        return $isValid;
    }



