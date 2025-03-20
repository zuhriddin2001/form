<?php
session_start();

if(isset($_POST['register'])) {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    header("Location: login.php");
    exit();
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == $_SESSION['username'] && $password == $_SESSION['password']) {
        echo "Tizimga muvaffaqiyatli kirdingiz!";
    } else {
        echo "Login yoki parol xato!";
    }
}
?>
