<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="product-details.css" />
    <link rel="stylesheet" href="stars.css" />
    <link href="../css/item.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../font/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=6Ld-WwAiAAAAAKfIZkOlY0Y-RF5obrjrEiWI1TwC"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200&display=swap"
      rel="stylesheet"/>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <?php 
    require('../../connection.php');
    // session_start();
    $prod_id = 4;
    $query = "SELECT * FROM `product` WHERE `prod_id` = '$prod_id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($result);

    if (isset($_POST['review_submit'])) {
        $user_id = $_SESSION['user_id'];
        // $prod_id = $_SESSION['prod_id'];
        $rate = $_REQUEST['rate'];
        $message = stripslashes($_REQUEST['message']);
        $message = mysqli_real_escape_string($conn, $message);
        $q = "INSERT INTO `reviews`(`review_user_id`, `review_prod_id`, `text`, `rate`) VALUES ($user_id, 1, '$message', $rate)";
        $r = mysqli_query($conn, $q) or die(mysqli_error($conn));
        $res = mysqli_num_rows($r);
        header("Location: http://localhost/yandex/index.php");
    }
    if(isset($_POST['cart_submit'])) {
        $user_id = $_SESSION['user_id'];
        $prod_quantity = $_REQUEST['prod_quantity'];
        $q = "INSERT INTO `cart_item`(`cart_user_id`, `cart_prod_id`, `cart_quantity`, `created_at`) VALUES ($user_id, $prod_id, $prod_quantity, NOW())";
        $r = mysqli_query($conn, $q) or die(mysqli_error($conn));
        $res = mysqli_num_rows($r);
        header("Location: http://localhost/yandex/index.php");
    }
    
    ?>
</head>
<body>
  
    <div class="small-container single-product">
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
        <h2 class="content_name"><?php echo $row['prod_name'];?></h2>
        <div class="row">     
            <div class="col-2">
                <img src="<?php echo $row['prod_img'];?>" width="100%" id="ProductImg" />
            </div>
            <div class="col-2">
                <h3 class="product_desc">Коротко о товаре:</h3>
                <?php
                    while($option = $r->fetch_assoc()){
                ?>
                <p style="display: flex;">
                <span class="option_name"> <?php echo $option['option_name'];?></span>
                <span class="prod_option_name"> <?php echo $option['prod_option_name'];?> </span><br>
                </p>
                <?php } ?>
                <a href="#" class="link">Подробнее</a>
                <a href="#" class="link">Задать вопрос о товаре</a>

                <h4 class="product_price"><?php echo number_format($row['prod_price']);?> KZT</h4>
                <form action="" method="POST" style="display: flex;align-items: center;">
                    <input type="number" value="1" name="prod_quantity" min="1"/>
                    <button class="btn" type="submit" name="cart_submit" <?php if(empty($_SESSION['login']) || $_SESSION['login']==0){ ?> disabled style="color: grey; background-color: #fc0;" <?php   } ?>>Добавить в корзину</button>   
                </form>              
            </div>
        </div>
        <div>
        <p class="content_name">Описание</p>
        <p><?php echo $row['prod_long_desc'];?></p>
        <p class="content_name">Оставить отзыв</p>
        <form id="feedback-form" action="" method="POST" enctype="multipart/form-data">
            <div class="field">
                <label class="label" for="message">Общая оценка</label>
                <div class="rate ">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
            </div>
            <input type="hidden" name="_gotcha">
            <div class="field">
                <label class="label" for="message">Расскажите подробнее</label>
                <div class="control field_data">
                    <textarea class="textarea is-medium" placeholder="Достоинства/Недостатки" name="message" minlength="20" rows="4" required autofocus <?php if((empty($_SESSION['login']) || $_SESSION['login']==0)){ ?> disabled <?php   } ?>></textarea>
                </div>
            </div>
            <br>
            <div class="field">
                <label class="label" for="message"></label>
                <div class="control field_data" style="margin-left: 25%;">
                    <input type="hidden" id="captchaResponse" name="g-recaptcha-response">
                    <button class="button is-medium is-primary is-info" type="submit" name="review_submit" <?php if(empty($_SESSION['login']) || $_SESSION['login']==0){ ?> disabled style="color: grey; background-color: #fc0;" <?php   } ?>>Отправить</button>
                </div>
            </div>
        </form>
        <p class="content_name">Отзывы</p>
        <!-- отзывы -->
        <?php 
        $query_rev = "SELECT user.user_name, product.prod_name, reviews.text, reviews.rate FROM `reviews` 
        JOIN user ON user.user_id = reviews.review_user_id JOIN product ON product.prod_id = reviews.review_prod_id
        WHERE product.prod_id=$prod_id;";
        $res_rev = mysqli_query($conn, $query_rev) or die(mysqli_error($conn));
        $rows_rev = mysqli_num_rows($res_rev);

        if($rows_rev >= 1){
            while($row = $res_rev->fetch_assoc()){               
        ?>
        <div class="review">
            <div class="left-side">
                <img src="https://avatars.mds.yandex.net/get-yapic/0/0-0/islands-retina-50" alt="avatar" style="max-width: 36px;">
            </div>
            <div class="right-side">
                <span class="username"><?php echo $row['user_name'] ?></span>
                <div class="stars">
                <?php 
                    for ($count = 1; $count <= 5; $count ++) {                    
                        if ($count <= $row['rate']) {echo'<span class="fa fa-star checked"></span>';} 
                        else {echo'<span class="fa fa-star" style="color:black"></span>';}
                    }
                ?>
                </div>
                <span class="text"><?php echo $row['text'] ?></span>
                
            </div>
        </div>
        <?php
                }
            } // endFor
            else{

            ?>
            <p>Будьте первым кто оставит отзыв</p>
    </div>
            </div>
    <?php
            }    
        }
    }
    ?>
    <?php
    include '../footer.php';
    ?> 
</body>

</html>