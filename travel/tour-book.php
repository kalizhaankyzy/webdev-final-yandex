<?php
require('../connection.php');
session_start();

if(isset($_SESSION['start']) && isset($_SESSION['where']) && isset($_SESSION['date']) && isset($_SESSION['period']) && isset($_SESSION['count'])){
    $start = $_SESSION['start'];
    $where = $_SESSION['where'];
    $date = $_SESSION['date'];
    $period = $_SESSION['period'];
    $count = $_SESSION['count'];
}
$end_date = date('Y-m-d', strtotime($date. ' + '.$period.' days'));

$query = "SELECT * FROM `tour` WHERE `to` = '$where'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$rows = mysqli_num_rows($result);

if (isset($_POST['submit-btn'])) {
    if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
        $tour_price = ($_REQUEST['tour_price']);
        $hotel_name = ($_REQUEST['hotel_name']);
        
        $_SESSION['tour_price'] = $tour_price;
        $_SESSION['hotel_name'] = $hotel_name;
        $_SESSION['end_date'] = $end_date;
    
        header("Location: http://localhost/yandex/payment/user_cred.php");
    }
    else{
        header("Location: http://localhost/yandex/login/login.php");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tour-book.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="headerIMG">
            <img src="logo.png" alt="" width="200px">
        </div>

        <div id="tour">
           <i class='fa fa-camera-retro' style="color:white;"></i><p>Туры</p>
        </div>

        <div class="headerContent">
            <div class='header-right'>
               <i class="fa fa-envelope-o"></i> <p>Напишите нам</p> 
            </div>
            <div class='header-right'>
                <i class="fa fa-heart-o"></i> <p>Избранное</p>
            </div>
            <div class='header-right'>
                <?php if(isset($_SESSION['login']) && $_SESSION['login']==1){ ?>
                    <i class="fa fa-user-circle-o"></i> <a href="tour-book.php?logout=true" class="login" style="color:inherit; text-decoration:none; padding-left: 10px;"><span class="login-text">Выйти</span></a>
                <?php   } 
                if (isset($_GET['logout'])) {
                    $_SESSION['login']=0;
                }
                ?>
                <?php if(empty($_SESSION['login']) || $_SESSION['login']==0){ ?>
                    <i class="fa fa-user-circle-o"></i> <a href="http://localhost/yandex/login/login.php" class="login" style="color:inherit; text-decoration:none; padding-left: 10px;"><span class="login-text">Войти</span></a>
                <?php   } ?>
                 <!-- <a href="">Вход</a> -->
            </div>
        </div>
    </header>

    <div class="searchBar">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="search" >
                <select class="form-control" id="form-start" required style="padding: 0px 160px;">
                    <option value="<?php echo $where ?>" selected='selected'><?php echo $where ?></option>
                </select>
            </div>            
            <div class="search">
                <div class="control-date">
                    <input style="font-size: 16px;" class="form-control" type="date" required value="<?php echo $date; ?>">
                </div>
                <div class="control-date">
                    <input style="font-size: 16px;" class="form-control" type="date" required value="<?php echo $end_date; ?>">
                </div>
            </div>
            <div class="search" >
                <select class="form-control" required>
                    <option value="<?php echo $count ?>" selected hidden><?php echo $count ?></option>
                </select>
            </div>

            <div class="search">
                <select class="form-control" id="form-end" required>
                    <option value="<?php echo $start ?>" selected hidden><?php echo $start ?></option>
                </select>
            </div>
        </form>
    </div>

    <div class="filter">
        <div class="filter-info">
            <h3>Скорость подтверждения</h3>
            <div class="content-block">
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Моментальное подтверждение</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Быстрое подтверждение</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Все туры</label>
                </div>

            </div>
        </div>

        <div class="filter-info">
            <h3>Особенности путешествия</h3>
            <div class="content-block">
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Документы сразу</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Путешествие от Level.Travel</label>
                </div>

            </div>
        </div>

        <div class="filter-info">
            <h3>Тип размещения</h3>

            <div class="content-block">
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Отель</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Апартаменты</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Вилла</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Апарт-отель</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Гостевой дом</label>
                </div>

            </div>
        </div>

        <div class="filter-info">
            <h3>Поиск отеля по названию</h3>

            <div class="content-block">
                <div>
                    <input style="padding: 10px; border-radius: 3px;" type="text" id="content" placeholder="Введите название отеля">
                </div>

            </div>
        </div>

        <div class="filter-info">
            <h3>Питание</h3>

            <div class="content-block">
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Все включено</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Завтрак</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Завтрак и ужин</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Без питания</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Завтрак, обед и ужин</label>
                </div>

            </div>
        </div>

        <div class="filter-info">
            <h3>WI-FI</h3>

            <div class="content-block">
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Все отели</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Есть WI-FI</label>
                </div>
                <div>
                    <input type="checkbox" id="content">
                    <label for="content">Бесплатный WI-FI</label>
                </div>

            </div>
        </div>
    </div>

    <div class="egypt">
        <h1>Выберите тур в <?php  echo $where?> </h1>
        <?php
            if($rows >=1){
                while($row = $result->fetch_assoc()){
                    $q = "SELECT `options_t`.`option_name` FROM `tour_options` 
                    JOIN `options_t` ON `options_t`.`option_id` = `tour_options`.`option_id` 
                    INNER JOIN `tour` ON `tour`.`tour_id` = `tour_options`.`tour_id` 
                    WHERE `tour`.`tour_id`=$row[tour_id]";
                    $r = mysqli_query($conn, $q) or die(mysql_error());
                    $options = mysqli_num_rows($r);
        ?>     

        <div class="hotel">
            <div class="hotelImg">
                <img src="<?php  echo $row['img_src']?>" alt="" width="320px" height="300px">
            </div>

            <div class="hotel-info">
                <p><?php  echo $row['address']?></p>
                <h2><?php  echo $row['hotel_name']?></h2>
                <?php
                    while($option = $r->fetch_assoc()){
                ?>
                <p style="background: linear-gradient(to right, orange, pink);"><?php  echo $option['option_name']?></p>

                <?php
                    }
                ?>

                <form action="" method="POST" class="flex">
                    <h2><?php echo number_format($row['price'])?> ₽</h2>
                    <input type="text" value = <?php echo ($row['price'])?> hidden name="tour_price">
                    <textarea placeholder="<?php echo ($row['hotel_name'])?>" hidden name="hotel_name"><?php echo ($row['hotel_name'])?></textarea>
                    <button type="submit" name="submit-btn">Купить билеты</button>
                </form>
            </div>
            
        </div>
        <?php
                }
            }
        ?>
    </div>
</body>
</html>