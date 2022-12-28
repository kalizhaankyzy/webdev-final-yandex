<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tour.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    require('../connection.php');
    session_start();
    if(isset($_POST['submit-btn'])){
        if (!empty($_REQUEST['form-start']) && !empty($_REQUEST['where']) && !empty($_REQUEST['date']) && !empty($_REQUEST['period']) && !empty($_REQUEST['form-end'])) {
            $start = stripslashes($_REQUEST['form-start']);
            $start = mysqli_real_escape_string($conn, $start);
            $where = stripslashes($_REQUEST['where']);
            $where = mysqli_real_escape_string($conn, $where);

            $date = stripslashes($_REQUEST['date']);
            $date = mysqli_real_escape_string($conn, $date);
            $period = stripslashes($_REQUEST['period']);
            $period = mysqli_real_escape_string($conn, $period);
            $count = stripslashes($_REQUEST['form-end']);
            $count = mysqli_real_escape_string($conn, $count);

            $_SESSION['start']=$start;
            $_SESSION['where']=$where;
            $_SESSION['date']=$date;
            $_SESSION['period']=$period;
            $_SESSION['count']=$count;
            header("Location: http://localhost/yandex/travel/tour-book.php");
        }
    }
    ?>
</head>
<body>
    <header>
        <h1 class="headerIMG"><a href="http://localhost/yandex/travel/hotel.php"> <img src="https://avatars.mds.yandex.net/get-lpc/1220100/f643a86a-8a48-4474-8bbf-8c7437b54326/orig" alt="" width="250px"></a></h1>
        <div class="headerContent">
            <i class="fa fa-percent"></i> <p>Акции и скидки</p>
            <i class="fa fa-comment"></i> <p>Поддержка</p>
            <i class="fa fa-heart"></i> <p>Избранное</p>
            <i class="fa fa-suitcase"></i> <p><a href="http://localhost/yandex/travel/my-trips.php" style="text-decoration: none; color: inherit;">Мои поездки</a></p>
            <i class="fa fa-sticky-note"></i> <p>Журнал</p>
        </div>
        <div>
            <button type="button" class="plus"><a href="http://localhost/yandex/plus/plus.php" style="color:inherit; text-decoration:none;"> плюс</a></button>
            <button type="button" class="signup">
                <?php if(isset($_SESSION['login']) && $_SESSION['login']==1){ ?>
                    <a href="plus.php?logout=true" class="login" style="color:inherit; text-decoration:none;"><span class="login-text">Выйти</span></a>
                <?php   } 
                if (isset($_GET['logout'])) {
                    $_SESSION['login']=0;
                }
                ?>
                <?php if(empty($_SESSION['login']) || $_SESSION['login']==0){ ?>
                    <a href="http://localhost/yandex/login/login.php" class="login" style="color:inherit; text-decoration:none;"><span class="login-text">Войти</span></a>
                <?php   } ?>
            </button>
        </div>
    </header>

    <div class="sub-header-container">
    
        <div class="sub-header-buttons-container">
            <i class="fa fa-hotel"></i> <a href="..\final\hotel.html"><p>Отели</p></a> 
            <i class="fa fa-plane"></i> <p>Авия</p>
            <i class="fa fa-train"></i> <p>Ж/д</p>
            <i class="fa fa-bus"></i> <p>Автобусы</p>
            <i style="color: red;" class='fa fa-camera-retro'></i> <p style="text-decoration: underline; color: red;">Туры</p>

        </div>
    </div>
    <div class="optionHeader">
        <p><span style="font-weight: 800;">Бронируйте</span> любой тур, оплачивайте его и <span style="font-weight: 800;">получайте кешбэк</span></p>
    </div>

    <div class="searchBar">
        <form action="" method="POST">
            <div class="search">
                <select class="form-control" name="form-start" required>
                    <option value="" selected hidden>Откуда</option>
                    <option value="Алматы">Алматы</option>
                    <option value="Астана">Астана</option>
                </select>
            </div>

            <div class="search">
                <select class="form-control" name="where" required>
                    <option value="" selected hidden>Куда</option>
                    <option value="Египет">Египет</option>
                    <option value="Турция">Турция</option>
                    <option value="Мальдивы">Мальдивы</option>
                </select>
            </div>
            
            <div class="search">
                <div class="control-date">
                    <input style="font-size: 16px;" class="form-control" name="date" type="date" required>
                </div>
            </div>
            
            <div class="search">
                <select class="form-control" required name="period">
                    <option value="" selected hidden>Период</option>
                    <option value="2">2 ночи</option>
                    <option value="3">3 ночи</option>
                    <option value="4">4 ночи</option>
                </select>
            </div>

            <div class="search" >
                <select class="form-control" name="form-end" required>
                    <option value="" selected hidden>Кол-во билетов</option>
                    <option value="1 взрослый">1 взрослый</option>
                    <option value="2 взрослыx">2 взрослых</option>
                    <option value="3 взрослых">3 взрослых</option>
                </select>
            </div>

            <div class="form-btn" >
                <button class="submit-btn" type="submit" name="submit-btn">Найти</button>

            </div>
        </form>
    </div>


    <div class="options">
        <p><span style="font-weight: 800;">10 миллионов</span> путешественников ежегодно бронируют у нас отели, проживание и билеты</p>
    </div>
    
    <div class="parent">
        <div class="child">
            <img src="https://yastatic.net/s3/travel/static/_/98864be574bbd36cd00a.png" alt="img" width="220px">

            <p>Войдите в аккаунт Яндекса с подключённым Плюсом и получите 5% за бронирование тура</p>
        </div>

        <div class="child">
            <img src="https://yastatic.net/s3/travel/static/_/dfd3d6f273c4f2e8b648.png" alt="img" width="220px">

            <p>Цены как у туроператоров, без наценок, комиссий и скрытых услуг</p>
        </div>

        <div class="child">
            <img src="https://yastatic.net/s3/travel/static/_/f2852c9a9547a042239a.png" alt="img" width="220px">
            
            <p>Россия, Турция, Египет и другие страны. Туры от надёжных операторов</p>
        </div>

        <div class="child">
            <img src="https://yastatic.net/s3/travel/static/_/67c830bc937273ac2498.png" alt="img" width="220px">
            
            <p>Поддержка 24/7 по телефону и в чате. Даже в выходные. И в Новый год</p>
        </div>
    </div>



    <hr>
    <footer>
        <div class="footer">
            <div>
            <h3>Сервисы</h3>
            <div class="foot">
                <a href="https://www.w3schools.com" class="footer-link">Расписание транспорта</a><br>
                <a href="https://www.w3schools.com" class="footer-link">Журнал путешествий</a><br>
            </div>
            </div>
            <div>
                <h3>Пользователям</h3>
                <div  class="foot">
                    <a href="" class="footer-link">О Сервисе</a><br>
                    <a href="" class="footer-link">Служба поддержки</a><br>
                    <a href="" class="footer-link">Пользовательское соглашение</a><br>
                    <a href="https://www.w3schools.com" class="footer-link">Правила программы лояльности Яндекс Плюс</a><br>
                </div>
            </div>
            <div>
                <h3>Партнёрам</h3>
                <div  class="foot">
                    <a href="https://www.w3schools.com" class="footer-link">Яндекс Путешествия для партнеров</a><br>
                    <a href="https://www.w3schools.com" class="footer-link">Программа для веб-мастеров и блогеров</a><br>
                    <a href="https://www.w3schools.com" class="footer-link">Подключить отель</a><br>
                    <a href="https://www.w3schools.com" class="footer-link">Личный кабинет отельера</a><br>
                </div>
            </div>

            <div>
                <div>
                    <h3 class="footerTxt">Мы в социальных сетях</h3>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/VK.com-logo.svg" alt="" width="30px">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Telegram_logo.svg/2048px-Telegram_logo.svg.png" alt="" width="30px">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Yandex_Zen_logo_icon.svg/2048px-Yandex_Zen_logo_icon.svg.png" alt="" width="30px">
                </div>
                <div>
                    <h3 class="footerTxt">Подбор авиабилетов</h3>
                    <img src="https://ru.enervent.com/wp-content/uploads/2018/11/google-play-badge-logo-png-transparent.png" alt="" width="120px">
                    <img src="https://logos-download.com/wp-content/uploads/2016/06/Download_on_the_App_Store_logo.png" alt="" width="120px">
                </div>
            </div>
        </div>
        

        <div class="foot-end">
            <p>© 2009–2022 OOO «Яндекс.Вертикали» </p>
            <p>Проект компании Яндекс</p>
        </div>
    </footer>
</body>
</html>