<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="payment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    require('../connection.php');
    session_start();

    if(isset($_SESSION['tour_price']) && isset($_SESSION['hotel_name']) && isset($_SESSION['count'])){
        $tour_price = $_SESSION['tour_price'];
        $hotel_name = $_SESSION['hotel_name'];
        $count = $_SESSION['count'];
    }

    if(isset($_POST['submit-btn'])) {
        $user_id = $_SESSION['user_id'];

        $surname = stripslashes($_REQUEST['surname']);
        $surname = mysqli_real_escape_string($conn, $surname);
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($conn, $name);
        $gender = stripslashes($_REQUEST['gender']);
        $gender = mysqli_real_escape_string($conn, $gender);
                
        $birthdate = date($_REQUEST['birth-date']);
        $nationality = stripslashes($_REQUEST['nationality']);
        $nationality = mysqli_real_escape_string($conn, $nationality);
        $id_no = stripslashes($_REQUEST['id-no']);
        $id_no = mysqli_real_escape_string($conn, $id_no);
        $end_date = date($_REQUEST['end-date']);
        
        $query = "INSERT INTO `passenger`(`user_id`, `pass_surname`, `pass_name`, `pass_gender`, `pass_birth_date`, `pass_nationality`, `pass_id_no`, `passport_end_date`) 
        VALUES ($user_id, '$surname', '$name', '$gender', '$birthdate', '$nationality', $id_no, '$end_date')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($result){
            $_SESSION['pass_id_no'] = $id_no;
            header("Location: http://localhost/yandex/payment/payment.php");
        }
    }
    ?>
</head>
<body>
  <header>
    <div class="headerIMG">
        <img src="logo.png" alt="" width="200px">
    </div>
  </header>
<h1>Заполните данные туристов</h1>

<div class="container">
    <div class="info">
        <h2><?php echo $tour_price; ?> ₽</h2>
        <p style="font-style: italic; font-size: 13px;">Цена тура</p>

        <hr>
        <p><?php echo $hotel_name; ?></p>
    </div>
    
    <div class="fill-info">
        <h2>Стандартный номер</h2>

        <div class="adult-ticket">
            <p style="padding-right: 30px;"> <?php echo $count?></p>
            <h3>Загранпаспорт</h3>
        </div>

        <div class="searchBar">
            <form method="POST" action="">
              <div class="form">
                <div class="search" >
                    <div>
                        <label for="search" style="display:block; color: white;">Фамилия</label>
                        <input class="form-control" type="text" name="surname" id="form-start" placeholder="Фамилия(лат.)" required>
                    </div>
                    
                    <div>
                        <label for="search" style="display:block; color: white;">Имя</label>
                        <input class="form-control" type="text" name="name"  placeholder="Имя(лат.)" required>
                    </div>
                </div>

                <div class="search" >
                    <div>
                        <label for="search" style="display:block; color: white;">Пол</label>
                        <select class="form-control" name="gender" required>
                            <option value="" selected hidden>Пол</option>
                            <option>Ж</i></option>
                            <option>М</option>
                        </select>

                    </div>
                </div>
                
                <div class="search">
                    <div>
                        <label for="search" style="display:block; color: white;">Дата рождения</label>
                        <div class="control-date">
                            <input style="padding: 13px 0;" class="form-control" name="birth-date" type="date" required>
                        </div>

                    </div>
                </div>

                <div class="search" >
                    <div>
                        <label for="search" style="display:block; color: white;">Гражданство</label>
                        <select class="form-control" name="nationality" required>
                            <option value="" selected hidden>Гражданство</option>
                            <option>Казахстан</option>
                            <option>Россия</option>
                        </select>

                    </div>
                </div>
    
                <div class="search">
                    <div>
                        <label for="search" style="display:block; color: white; ">Номер документа</label>
                        <input type="text" class="form-control" name="id-no" id="" placeholder="Номер документа" required>

                    </div>
                </div>
    
                <div class="search">
                    <div class="control-date">
                        <div>
                            <label for="search" style="display:block; color: white; ">Истекает</label>
                            <input style="padding: 13px 0;" class="form-control" type="date" name="end-date" required id="form-end">
                        </div>
                    </div>
                </div>
              </div>
                <div >
                  <button class="btn" name="submit-btn">Дальше</button>
                </div>
            </form>
        </div>

    </div>
</div>

</body>
</html>