<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hotel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <?php
    session_start();
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
            <i style="color: red;" class="fa fa-hotel"></i> <p style="text-decoration: underline; color: red;">Отели</p>
            <i class="fa fa-plane"></i> <p>Авия</p>
            <i class="fa fa-train"></i> <p>Ж/д</p>
            <i class="fa fa-bus"></i> <p>Автобусы</p>
            <i class='fa fa-camera-retro'></i> <a href="http://localhost/yandex/travel/tour.php"><p>Туры</p></a> 

        </div>
    </div>

    <div class="options">
        <p><span style="font-weight: 800;">10 миллионов</span> путешественников ежегодно бронируют у нас отели, билеты и туры</p>
    </div>
    
    <div class="parent">
        <div class="child">
            <img src="https://yastatic.net/s3/travel/static/_/98864be574bbd36cd00a.png" alt="img" width="220px">

            <p>Цены напрямую от отелей и кешбэк баллами Плюса</p>
        </div>

        <div class="child">
            <img src="https://yastatic.net/s3/travel/static/_/8efcdd37eb8f974ee025.png" alt="img" width="220px">

            <p>Больше миллиона номеров в отелях, санаториях и апартаментах России и мира</p>
        </div>

        <div class="child">
            <img src="https://yastatic.net/s3/travel/static/_/7b286ec070057c4dd561.png" alt="img" width="220px">
            
            <p>Сотни тысяч отзывов, фото и видео от реальных постояльцев</p>
        </div>

        <div class="child">
            <img src="https://yastatic.net/s3/travel/static/_/67c830bc937273ac2498.png" alt="img" width="220px">
            
            <p>Поддержка 24/7 по телефону и в чате. Даже в выходные. И в Новый год</p>
        </div>
    </div>


    <div class="options">
        <p><span style="font-weight: 800;">Поиск отелей</span> и других вариантов размещения <span style="font-weight: 800;">по выгодным ценам</span></p>
    </div>
    
    <div class="parentSecond">
        <div class="childSecond">
            <img src="https://irecommend.ru/sites/default/files/product-images/10297/0b2Kub3tWLSOSBIF8l8GA.jpeg" alt="img" width="260px" height="260px">
            
            <div class="contain">
                <div class="text">
                    <h3>Мосвка</h3>
                    <p>От 1514р</p>
                </div>
            </div>
        </div>

        <div class="childSecond">
            <img src="https://avatars.mds.yandex.net/get-rasp/1647984/45953651-941f-47f8-9e83-b815dc61d71c/offer-travel-desktop" alt="img" width="260px" height="260px">
            <div class="contain">
                <div class="text">
                <h3>Санкт-Петербург</h3>
                <p>От 1170р</p>
                </div>
            </div>
        </div>

        <div class="childSecond">
            <img src="https://www.advantour.com/russia/images/sochi/sochi7.jpg" alt="img" width="260px" height="260px">            
            <div class="contain">
                <div class="text">
                <h3>Сочи</h3>
                <p>От 1040р</p>
                </div>
            </div>
        </div>

        <div class="childSecond">
            <img src="https://kuda-kazan.ru/uploads/972c66592e784dbd45b7c8200c3c8b49.jpg" alt="img" width="260px" height="260px">            
            <div class="contain">
                <div class="text">
                <h3>Казань</h3>
                <p>От 1280р</p>
                </div>
            </div>
        </div>
    </div>

    <div class="parentSecond">
        <div class="childSecond">
            <img src="https://sochigram.com/sites/sochigram.com/files/styles/adaptive/public/images/places/7102/estosadok_1739ac6e.jpg" alt="img" width="260px" height="260px">
            
            <div class="contain">
                <div class="text">
                    <h3>Эсто-Садок</h3>
                    <p>От 2815р</p>
                </div>
            </div>
        </div>

        <div class="childSecond">
            <img src="https://assets.vogue.ru/photos/610a4893b27dd8b564625561/master/w_1600%2Cc_limit/DJI_0718.jpg" alt="img" width="260px" height="260px">
            <div class="contain">
                <div class="text">
                <h3>Нижний Новгород</h3>
                <p>От 1200р</p>
                </div>
            </div>
        </div>

        <div class="childSecond">
            <img src="https://assets.gq.ru/photos/61152aeaf92c2f56181279f6/16:9/w_1280,c_limit/2021-08-12%2017.06.22.jpg" alt="img" width="260px" height="260px">            
            <div class="contain">
                <div class="text">
                <h3>Ростов-на-Дону</h3>
                <p>От 1200р</p>
                </div>
            </div>
        </div>

        <div class="childSecond">
            <img src="https://cdn2.tu-tu.ru/image/pagetree_node_data/1/e7bc381619af4dd182ff59e7daa87f9b/" alt="img" width="260px" height="260px">            
            <div class="contain">
                <div class="text">
                <h3>Екатеринбург</h3>
                <p>От 1180р</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <img src="https://yastatic.net/s3/travel/static/_/74d528ace860393e4f4f.png" alt="" width="300">

        <div>
            <h3>Как забронировать отель?</h3>
            <p>С помощью сервиса бронирования гостиниц Яндекс Путешествия вы можете найти подходящий номер и выгодно забронировать его без комиссии и без переплаты. Это можно сделать с любого устройства буквально в два-три клика.</p>
            <p>Поиск гостиниц идёт по огромной базе партнёров. Широкий выбор отелей и вариантов оплаты, проверенная информация, скидки и кешбэк, реальные отзывы и круглосуточная поддержка — наши главные преимущества и сильные стороны. Ещё один важный момент — вы точно попадёте в номер, то есть мы даём гарантию заселения.</p>
            <p>Бронируйте отели на сайте Яндекс Путешествий и отправляйтесь в другие города и страны.</p>
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