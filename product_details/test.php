<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="product-details.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=6Ld-WwAiAAAAAKfIZkOlY0Y-RF5obrjrEiWI1TwC"></script>
    <script defer src="product-details.js"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
      rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <?php 
    require('../connection.php');
    session_start();
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM `product` WHERE `prod_id` = 1";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    ?>
</head>
<body>
    <div class="small-container single-product">
      <div class="row">
        <div class="col-2">
            <?php
            if($rows >=1){
                while($row = $result->fetch_assoc()){
                    $q = "SELECT `options`.`option_name`, `product_options`.`prod_option_name` FROM `product_options` 
                    JOIN `options` ON `options`.`option_id` = `product_options`.`option_id` 
                    INNER JOIN `product` ON `product`.`prod_id` = `product_options`.`prod_id` 
                    WHERE `product`.`prod_id`=$row[prod_id]";
                    $r = mysqli_query($conn, $q) or die(mysql_error());
                    $options = mysqli_num_rows($r);
            ?>
            
            <img src="<?php echo $row['prod_img'];?>" width="100%" id="ProductImg" />
            
            <div class="small-img-row">
                <div class="small-img-col">
                <img src="images/gallery-1.jpg" class="small-img" />
                </div>
                <div class="small-img-col">
                <img src="images/gallery-2.jpg" class="small-img" />
                </div>
                <div class="small-img-col">
                <img src="images/gallery-3.jpg" class="small-img" />
                </div>
                <div class="small-img-col">
                <img src="images/gallery-4.jpg" class="small-img" />
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>Смартфоны и гаджеты</p>
            <h2><?php echo $row['prod_name'];?></h2>
            <h4><?php echo number_format($row['prod_price']);?> тг</h4>
            <select name="" id="">
                <option value="">Цвет</option>
                <option value="">Черный</option>
                <option value="">Серебристый</option>
                <option value="">Золотой</option>
                <option value="">Фиолетовый</option>
            </select>
            <input type="number" value="1" />
            <a href="" class="btn">Добавить в корзину</a>
            <h3>Коротко о товаре:<i class="fa fa-indent"></i></h3>
            <br />
            <?php
                while($option = $r->fetch_assoc()){
            ?>
            <p>
                <?php echo $option['option_name'];?> : <?php echo $option['prod_option_name'];?> <br>
            </p>
            <?php } ?>
            </div>
        </div>
        <div>
            <p>Описание</p>
            <p><?php echo $row['prod_long_desc'];?></p>
            <p>Отзывы</p>
            <!-- отзывы -->
        </div>
        <?php    
            }
        }
        ?>
    </div>
</body>
</html>