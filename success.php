<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>

    <?php
    require("connection.php");
    session_start();
    $payment_query = "SELECT `payment_id`, `price` FROM `payments` WHERE `payment_type` like 'avia' ORDER BY `payment_id` DESC LIMIT 1;";
    $payment_result = mysqli_query($conn, $payment_query) or die(mysqli_error($conn));
    $paym_rows = mysqli_num_rows($payment_result);
    if($paym_rows == 1){
        while($row = $payment_result->fetch_assoc()){
            $payment_id = $row['payment_id'];
            $total_price = $row['price'];
        }
    }

    $id_no = $_SESSION['pass_id_no'];

    $passenger_query = "SELECT * FROM `passenger` WHERE `pass_id_no` = $id_no ORDER BY `pass_id` DESC LIMIT 1;";
    $pass_result = mysqli_query($conn, $passenger_query) or die(mysqli_error($conn));
    $pass_rows = mysqli_num_rows($pass_result);
    if($pass_rows == 1){
        while($row = $pass_result->fetch_assoc()){
            $pass_id = $row['pass_id'];
        }
    }
    $pass_num = (int)filter_var($_SESSION['count'], FILTER_SANITIZE_NUMBER_INT);
    $user_id = $_SESSION['user_id'];

    $hotel_name = $_SESSION['hotel_name'];
    $tour_query = "SELECT `tour_id` FROM `tour` WHERE `hotel_name` = '$hotel_name'";
    $tour_result = mysqli_query($conn, $tour_query) or die(mysqli_error($conn));
    $tour_rows = mysqli_num_rows($tour_result);
    if($tour_rows == 1){
        while($row = $tour_result->fetch_assoc()){
            $tour_id = $row['tour_id'];
        }
    }
    $from = $_SESSION['start'];
    $end_date = $_SESSION['end_date'];
    $start_date = $_SESSION['date'];

    $cash = bcmul($total_price,0.05);
    $plus_query = "UPDATE `user` SET `balance` = $cash WHERE `user_id` = $user_id";
    $plus_result = mysqli_query($conn, $plus_query) or die(mysqli_error($conn));

    $query = "INSERT INTO `ticket`(`date`, `user_id`, `pass_id`, `passengers_num`, `tour_id`, `from`, `total_price`, `payment_id`, `start_date`, `end_date`) 
    VALUES (NOW(), $user_id, $pass_id, $pass_num, $tour_id, '$from', $total_price, $payment_id, '$start_date', '$end_date')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if($result){
        echo "<p style='color:green;'>Успешно! Вы будете перенаправлены на личную страницу через 5 секунд </p>";
        header("refresh:5, url= http://localhost/yandex/travel/my-trips.php");
    }
    ?>
</head>
<body>
</body>
</html>