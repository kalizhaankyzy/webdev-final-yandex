<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="my-trips.css">

    <?php
    require('../connection.php');
    session_start();
    $user_id = $_SESSION['user_id'];
    $query = "SELECT `ticket`.*, `tour`.`to`, `tour`.`hotel_name` FROM `ticket` JOIN `tour` ON `tour`.`tour_id` = `ticket`.`tour_id` WHERE `user_id`=$user_id;";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($result);
    
    ?>
    
</head>
<body>
    <header>
        <h1 class="headerIMG"><a href="http://localhost/yandex/travel/hotel.php"> <img src="https://avatars.mds.yandex.net/get-lpc/1220100/f643a86a-8a48-4474-8bbf-8c7437b54326/orig" alt="" width="250px"></a></h1>
        <div class="headerInfo">
            <p>Отели</p>
            <p>Авиабилеты</p>
            <p>Ж/д билеты</p>
            <p>Автобусы</p>
            <p>Туры</p>
        </div>
        
        <div class="headerContent">
            <i class="fa fa-percent"></i> <p></p>
            <i class="fa fa-comment"></i> <p></p>
            <i class="fa fa-heart"></i> <p></p>
            <i class="fa fa-sticky-note"></i> <p></p>
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
    
    <div class="chose">
        <a href="#div-1" id="trip">Мои поездки</a>
        <a href="#div-2" id="passanger">Пассажиры</a>
    </div>
    <?php
    if($rows >= 1){
        while($row = $result->fetch_assoc()){
    ?>
    <div class="searchBar-trip" id="div-1">
        <form>      
            <div class="search-trip">
                <div>
                    <label for="search" style="display:block; color: white;">Откуда</label>
                    <input class="form-control-trip" id="form-start-trip" type="text" value = " <?php echo $row['from']?>" disabled>
                </div>
            </div>

            <div class="search-trip">
                <div>
                    <label for="search" style="display:block; color: white;">Куда</label>
                    <input class="form-control-trip" type="text" value = " <?php echo $row['to']?>" disabled>
                </div>
            </div>
            
            <div class="search-trip">
                <div>
                        <label for="search" style="display:block; color: white;">Дата вылета</label>
                        <input class="form-control-trip" type="text" value = " <?php echo $row['start_date']?>" disabled>
                    </div>
            </div>
            
            <div class="search-trip">
                <div>
                    <label for="search" style="display:block; color: white;">Дата возвращения</label>
                    <input class="form-control-trip" type="text" value = " <?php echo $row['end_date']?>" disabled>
                </div>
            </div>


            <div class="search-trip">
                <div>
                    <label for="search" style="display:block; color: white;">Отель</label>
                    <input class="form-control-trip"  type="text" name="" id="" value = " <?php echo $row['hotel_name']?>" disabled>
                </div>
            </div>

            <div class="search-trip">
                <div>
                    <label for="search" style="display:block; color: white;">Цена</label>
                    <input class="form-control-trip"   type="text" name="" id="form-end-trip" value = " <?php echo $row['total_price']?> KZT" disabled>
                </div>
            </div>
        </form>
    </div>
    <?php
        }
    }
    ?>


    <p style="width: 80%;padding-left: 120px;font-size: 20px;margin: 3% 0;" id="div-2">Пассажиры</p>
    <?php
        $query = "SELECT * FROM `passenger` WHERE `user_id`=$user_id;";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $rows = mysqli_num_rows($result);
        if($rows >= 1){
            while($row = $result->fetch_assoc()){
    ?>

    <div class="fill-info" style="width: 80%; padding-left: 120px;">
        <div class="adult-ticket">
            <p style="padding-right: 30px;">Взрослый</p>
            <h3>Загранпаспорт</h3>
        </div>

        <div class="searchBar">
            <form>
                <div class="search" >
                    <div>
                        <label for="search" style="display:block; color: white;">Фамилия</label>
                        <input class="form-control" type="text" name="search" id="form-start" value = " <?php echo $row['pass_surname']?>" disabled>
                    </div>
                    
                    <div>
                        <label for="search" style="display:block; color: white;">Имя</label>
                        <input class="form-control" type="text" name=""  placeholder="Имя(лат.)" value = " <?php echo $row['pass_name']?>" disabled>
                    </div>
                </div>

                <div class="search" >
                    <div>
                        <label for="search" style="display:block; color: white;">Пол</label>
                        <input class="form-control" type="text" name=""  placeholder="Пол" value = " <?php echo $row['pass_gender']?>" disabled>

                    </div>
                </div>
                
                <div class="search">
                    <div>
                        <label for="search" style="display:block; color: white;">Дата рождения</label>
                        <input class="form-control" type="text" required placeholder="Дата рождения" value = " <?php echo $row['pass_birth_date']?>" disabled>

                    </div>
                </div>
            
    
                <div class="search" >
                    <div>
                        <label for="search" style="display:block; color: white;">Гражданство</label>
                        <input type="text" placeholder="Гражданство" class="form-control" value = " <?php echo $row['pass_nationality']?>" disabled>

                    </div>
                </div>
    
                <div class="search">
                    <div>
                        <label for="search" style="display:block; color: white; ">Номер документа</label>
                        <input type="text" class="form-control" name="" id="" placeholder="Номер документа" value = " <?php echo $row['pass_id_no']?>" disabled>

                    </div>
                </div>
    
                <div class="search">
                    <div class="control-date">
                        <div>
                            <label for="search" style="display:block; color: white; ">Истекает</label>
                            <input class="form-control" type="text" required id="form-end" placeholder="Истекает" value = " <?php echo $row['passport_end_date']?>" disabled>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <?php
        }
    }
    ?>
</div>

<script src="my-trip.js"></script>
<script src="my-trip1.js"></script>
</body>
</html>