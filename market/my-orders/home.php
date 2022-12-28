<?php
include 'catalog.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/itc-slider.css">
    <link rel="stylesheet" href="css/itsslider.css">
    <link rel="stylesheet" href="css/content-main.css">
    <script src="js/itc-slider.js"></script>
    <?php
    require('../../connection.php');
    $user_id = $_SESSION['user_id'];
    $query = "SELECT `orders`.*,`product`.`prod_name`, `product`.`prod_price`, `order_details`.`detail_quantity`, `user_name`, `product`.`prod_img` 
    FROM `orders` JOIN `order_details` ON `order_details`.`detail_order_id`=`orders`.`order_id` 
    JOIN `product` ON `product`.`prod_id` = `order_details`.`detail_prod_id` 
    JOIN `user` ON `user`.`user_id` = `orders`.`order_user_id` 
    WHERE `order_user_id` = $user_id";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($result);
    ?>
</head>
<body>
    
    <div>
        <h1 style="color: black; padding-left: 140px; padding-top: 50px;">Мои заказы</h1>
    </div>
    
    <?php
    if($rows >= 1){
        while($row = $result->fetch_assoc()){
        
    ?>
    <div>
        <div style="color: black; padding-left: 350px;">
            <h3>Заказ № <?php echo $row['order_id']?></h3>
        </div>
        <div class="about-order" style="display: flex; justify-content: space-between; padding: 50px 50px; border: 3px solid black; border-radius: 10px; margin: 20px 300px;">
            <div style="display: flex;">
                <div>
                    <img style="margin-right: 50px;" src="<?php echo $row['prod_img']?>" alt="" width="50px">
                </div>
                <div style="color: black">
                    <p><?php echo $row['prod_name']?></p>
                    <h3><?php echo $row['prod_price']?></h3>
                </div>
            </div>
    
            <div style="padding-left: 150px;">
                <p>Дата оформления</p>
                <p style="padding-bottom: 20px;">(При получений может потребоваться паспорт)</p>
    
                <h4 style="color: black;">Способ получения</h4>
                <p>Город</p>
                <p>Получатель</p>
                <p>Количество</p>
            </div>
            <div style="padding-right: 200px; color: black;">
                <p style="color: black;"><?php echo $row['order_date']?></p>
                <p style="padding-top: 90px;"></p>
                <p><?php echo $row['order_city']?></p>
                <p><?php echo $row['user_name']?></p>
                <p><?php echo $row['detail_quantity']?></p>
            </div>
        </div>

    </div>
    <?php 
        }
    }
    ?>
    <?php
    include 'footer.php';
    ?>
</body>
</html>