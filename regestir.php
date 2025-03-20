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
        $message = "Tizimga muvaffaqiyatli kirdingiz!";
        $alertType = "success";
    } else {
        $message = "Login yoki parol xato!";
        $alertType = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Ro'yxatdan o'tish va Tizimga Kirish</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php if(isset($message)): ?>
                    <div class="alert alert-<?= $alertType ?>"><?= $message ?></div>
                <?php endif; ?>

                <!-- Ro'yxatdan o'tish -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success text-white text-center">
                        <h3>Ro'yxatdan o'tish</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Foydalanuvchi nomi</label>
                                <input type="text" name="username" class="form-control" placeholder="Foydalanuvchi nomi" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Parol</label>
                                <input type="password" name="password" class="form-control" placeholder="Parol" required>
                            </div>
                            <button type="submit" name="register" class="btn btn-success w-100">Ro'yxatdan o'tish</button>
                        </form>
                    </div>
                </div>

                <!-- Tizimga Kirish -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Tizimga Kirish</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Foydalanuvchi nomi</label>
                                <input type="text" name="username" class="form-control" 
                                       value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"
                                       placeholder="Foydalanuvchi nomi" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Parol</label>
                                <input type="password" name="password" class="form-control" 
                                       value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>"
                                       placeholder="Parol" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100">Kirish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
