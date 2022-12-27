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

    if (isset($_POST['login-submit'])) {
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($conn, $username);
      $_SESSION['username'] = $username;
      header("Location: http://localhost/yandex/login/login-con.php");
    }
    ?>
</head>
<body class="align">
    <div class="grid align__item">
        <div class="register">
            <img src="data:image/svg+xml;charset=utf-8,%3Csvg width='64' height='64' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='32' cy='32' r='32' fill='%23FC3F1D'/%3E%3Cpath d='M37.02 52h6.977V12H33.842c-10.213 0-15.57 5.228-15.57 12.951 0 6.667 3.473 10.426 9.625 14.509l3.738 2.467-4.798-4.024L17.33 52h7.564L35.05 36.846l-3.532-2.35c-4.268-2.878-6.358-5.11-6.358-9.956 0-4.258 3.003-7.136 8.712-7.136h3.12V52h.03z' fill='%23fff'/%3E%3C/svg%3E"
                alt="logo" id="logo">
            <h1 class="title">
                <span>Войдите с Яндекс ID</span>
            </h1>

            <form action="" method="post" class="form">
                <div class="form__field btns">
                    <button class="active">Почта</button>
                    <button>Телефон</button>
                </div>

                <div class="form__field">
                    <input type="email" placeholder="Логин или email" name="username">
                </div>

                <div class="field-link">
                    <a href="https://passport.yandex.kz/restoration?retpath=https%3A%2F%2Fpassport.yandex.kz%2F&&process_uuid=67651b49-8e4e-48d6-81a6-057e55ae6b48" weight="medium" class="link">Не помню</a>
                </div>
                <div class="form__field">
                    <input type="submit" id="sign-in" value="Войти" name="login-submit">
                </div>
                <div class="form__field">
                    <input type="submit" id="sign-up" value="Создать ID">
                </div>
            </form>

            <p>Войти с помощью</p>
            <div class="social-icons">
                <div class="social-icon vk"><span class="icon"></span></div>
                <div class="social-icon facebook"><span class="icon"></span></div>
                <div class="social-icon google"><span class="icon"></span></div>
                <div class="social-icon qr" style="width: auto;">
                    <span class="icon"></span>
                    <span class="name">QR код</span></div>
                <div class="social-icon options"><span class="icon"></span></div>
            </div>
        </div>

    </div>

</body>

</html>