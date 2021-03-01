<?php
    session_start();

    $users = array(
        array('id' => 1, 'email' => 'antoniosfj21@gmail.com', 'password' => '321', 'profile_id' => 2),
        array('id' => 2, 'email' => 'antonio_sfj@outlook.com', 'password' => '123', 'profile_id' => 1),
    );

    $profiles = array(
        1 => 'admin',
        2 => 'user',
    );

    $email = $_POST['email'];
    $password = $_POST['password'];

    $logado = false;
    foreach($users as $user){
        if($email == $user['email'] && $password == $user['password']){
            $logado = true;
            break;
        }
    }
    if($logado){
        $_SESSION['authenticated'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['profile_id'] = $user['profile_id'];
        echo 'Logado com sucesso.<br/>';
    } else {
        $_SESSION['error'] = 'login_error';
    }
    header('Location: index.php');
?>