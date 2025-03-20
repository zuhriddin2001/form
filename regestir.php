<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $data = "Foydalanuvchi nomi: $username | Parol: $password\n";

    file_put_contents("users.txt", $data, FILE_APPEND);

    echo "Ro'yxatdan muvaffaqiyatli o'tdingiz!";
}
?>
