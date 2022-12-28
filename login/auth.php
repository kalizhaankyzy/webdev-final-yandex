<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php 
    require('../connection.php');
    session_start();

    if (isset($_POST['auth-submit'])) {
        $username = stripslashes($_REQUEST['user_name']);
        $username = mysqli_real_escape_string($conn, $username);
        $email = stripslashes($_REQUEST['user_email']);
        $email = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "INSERT INTO `user`(`user_name`, `user_email`, `user_password`, `user_card_no`) VALUES ('$username','$email','$password', '')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($result) {
            header("Location: http://localhost/yandex/login/login.php");
        }
    }
    ?>
</head>
<body class="align">
    <div class="grid align__item">
        <div class="register" style="height: 450px">
            <img src="data:image/svg+xml;charset=utf-8,%3Csvg width='64' height='64' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='32' cy='32' r='32' fill='%23FC3F1D'/%3E%3Cpath d='M37.02 52h6.977V12H33.842c-10.213 0-15.57 5.228-15.57 12.951 0 6.667 3.473 10.426 9.625 14.509l3.738 2.467-4.798-4.024L17.33 52h7.564L35.05 36.846l-3.532-2.35c-4.268-2.878-6.358-5.11-6.358-9.956 0-4.258 3.003-7.136 8.712-7.136h3.12V52h.03z' fill='%23fff'/%3E%3C/svg%3E"
                alt="logo" id="logo">
            <h1 class="title">
                <span>Регистрация на Яндекс</span>
            </h1>

            <form action="" method="post" class="form">
                <div class="form__field">
                    <input type="text" placeholder="Имя" name="user_name" required>
                </div>
                <div class="form__field">
                    <input type="email" placeholder="Логин или email" name="user_email" required>
                </div>
                <div class="form__field">
                    <input type="password" placeholder="Пароль" name="password" required>
                </div>

                <div class="form__field">
                    <input type="submit" id="sign-in" value="Зарегистрироваться" name="auth-submit">
                </div>
            </form>
        </div>

    </div>

</body>

</html>