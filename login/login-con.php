<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php 
    require('../connection.php');
    session_start();
    $error=0;
    if (isset($_POST['login-submit'])) {
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $username = $_SESSION['username'];

        $query = "SELECT * FROM `user` WHERE `user_email`='$username' AND `user_password`='$password'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $error = 0;
            $_SESSION['login'] = 1;
            while($row = $result->fetch_assoc()){
                $_SESSION['user_id'] = $row['user_id'];
            }
            header("Location: http://localhost/yandex/all_services/all_services.html");
        } 
        else {
            $error = 1;
        } 
    }
    ?>
</head>
<body class="align">
    <div class="grid align__item">
        <div class="register" style="height: auto; max-height: 497px;">
            <img src="data:image/svg+xml;charset=utf-8,%3Csvg width='64' height='64' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='32' cy='32' r='32' fill='%23FC3F1D'/%3E%3Cpath d='M37.02 52h6.977V12H33.842c-10.213 0-15.57 5.228-15.57 12.951 0 6.667 3.473 10.426 9.625 14.509l3.738 2.467-4.798-4.024L17.33 52h7.564L35.05 36.846l-3.532-2.35c-4.268-2.878-6.358-5.11-6.358-9.956 0-4.258 3.003-7.136 8.712-7.136h3.12V52h.03z' fill='%23fff'/%3E%3C/svg%3E"
                alt="logo" id="logo">
            <h1 class="title">
                <span>Войдите, чтобы продолжить</span>
            </h1>

            <form action="" method="post" class="form">
                <div class="form__field account">
                    <span class="avatar"></span>
                    <span class="account-name">
                        <?php echo $_SESSION['username']?>
                    </span>
                </div>

                <div class="form__field ">
                    <input class="<?php if($error ==1){echo 'error-div';}?>" type="password" placeholder="Введите пароль" name="password" required>
                </div>
                <?php if($error ==1){ ?>
                <div class="field-link" style="margin-bottom: 15px;">
                    <a class="link error">Неверный пароль</a>
                </div>
                <?php }?>
                <div class="field-link">
                    <a href="https://passport.yandex.kz/restoration?retpath=https%3A%2F%2Fpassport.yandex.kz%2F&&process_uuid=67651b49-8e4e-48d6-81a6-057e55ae6b48" weight="medium" class="link">Не помню пароль</a>
                </div>
               
                <div class="form__field">
                    <input type="submit" id="sign-in" value="Войти" name="login-submit">
                </div>
                <div class="social-icon qr qr-form" style="width: auto;">
                    <span class="icon"></span>
                    <span class="name"> Войти по QR-коду</span></div>
            </form>
        </div>

    </div>

</body>

</html>