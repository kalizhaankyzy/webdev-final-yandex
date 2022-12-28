
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome js -->
    <script src="https://kit.fontawesome.com/bce767efab.js" crossorigin="anonymous"></script>
    <?php
    require('../../connection.php');
    session_start();
    $total_price=0;
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM `cart_item` JOIN `product` ON `product`.`prod_id` = `cart_item`.`cart_prod_id` WHERE `cart_user_id` = $user_id";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $rows = mysqli_num_rows($result);

    // remove item
    if (isset($_POST['remove-item'])){
        $cart_id = $_REQUEST['cart_id'];

        $query = "DELETE FROM `cart_item` WHERE `cart_id` = $cart_id";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($result) {
            header("Location: http://localhost/yandex/market/cart/");
        } 
    }
    // payment
    if (isset($_POST['payment-click'])){
        $order_city = stripslashes($_REQUEST['order-city']);
        $order_city = mysqli_real_escape_string($conn, $order_city);
        $order_add = stripslashes($_REQUEST['order-address']);
        $order_add = mysqli_real_escape_string($conn, $order_add);

        $_SESSION['order_city'] = $order_city;
        $_SESSION['order_add'] = $order_add;
        // $_SESSION['prod_total_price'] = $total_price;

        header("Location: http://localhost/yandex/market/cart/payment.php");
    }
    ?>
</head>
<body>
    <header>
        <div class="container py-2">
            <div class="row py-2">
                <div class="col-12">
                    <h1 class="fw-bold text-center mt-2  p-4">Корзина </h1>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <div class="cart rounded shadow">
                        <?php
                        if($rows >= 1){
                            
                            while($row = $result->fetch_assoc()){
                                $total_price += $row['prod_price'] * $row['cart_quantity'];
                        ?>
                        <div class="first">
                            <div class="row">
                                <div class="d-flex flex-wrap justify-content-center rounded p-3 bg-white">
                                    <div class="col-md-7">
                                        <div class="d-flex justify-content-start align-items-center">
                                            <img class="img-small" src="<?php echo $row['prod_img']?>" alt="iphone">
                                            <h5 class="ps-2"><?php echo $row['prod_name']?></h5>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex align-items-center mt-2 pt-4">
                                            <div class="col-md-6 col-6 d-flex justify-content-center align-items-center">
                                                <button class="border-0 bg-transparent" id="iphone-decrease"><i class="fas fa-minus me-3"></i></button>
                                                <input type="number" style="width: 4rem;" class="from-control fw-bold text-center rounded border-0 bg-light p-2" min="0" value="<?php echo $row['cart_quantity']?>" id="iphone-quantity">
                                                <button class=" border-0 bg-transparent" id="iphone-increase"><i class="fas fa-plus ms-3"></i></button>
                                            </div>
                                            <div class="col-md-3 col-3 mx-3 mt-2">
                                                <h5 class="fw-bold"><span id="iphone-price"><?php echo number_format($row['prod_price'])?></span> KZT</h5>
                                            </div>
                                            <form action="" method="POST">
                                                <button type="submit" name="remove-item" style="background: transparent;border: none;">
                                                    <img class="cancel-img mb-2" src="images/remove.png" alt="cencel">
                                                </button>
                                                <input type="text" hidden name="cart_id" value="<?php echo $row['cart_id']?>">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                            $_SESSION['prod_total_price'] = $total_price;
                        }
                        ?>
                        
                        <div class="calculation">
                            <div class="row">
                                <div class="d-flex justify-content-center align-items-center  p-5 rounded bg-white mt-4">
                                    <div class="col-md-6 text-start ms-5">
                                        <h5 class="me-5">Итог: </h5>
                                        <h5>Налог:</h5>
                                        <h5>Итого:</h5>
                                    </div>
                                    <div class="col-md-6 text-end me-5 pe-4">
                                        <h5><span id="subtotal"><?php echo number_format($total_price);?></span> KZT</h5>
                                        <h5><span id="tax">0</span> KZT</h5>
                                        <h5><span id="total"><?php echo number_format($total_price);?></span> KZT</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="d-flex justify-content-center align-items-center  p-5 rounded bg-white mt-4">
                                    <!-- <div class="col-md-5"> -->
                                        <!-- <div class="d-flex align-items-center mt-2 pt-4"> -->
                                            <div class="col-md-6 text-start ms-5 ">
                                                <h5 class="me-5">Город: </h5>
                                                <h5 for="order-city">Адрес: </h5>

                                            </div>     
                                            <div class="col-md-6 text-end me-5 pe-4">
                                                <input type="text"  class="from-control fw-bold text-center rounded border-0 bg-light p-2" 
                                                required name="order-city" id="order-city" style="margin-bottom: 5px;"
                                                placeholder="Город доставки">
                                                <br>
                                                <input type="text" class="from-control fw-bold text-center rounded border-0 bg-light p-2" 
                                                required name="order-address" id="order-address" placeholder="Адрес доставки">
                                            </div>        
                                        <!-- </div> -->
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-success fw-bold px-5 shadow-lg rounded-pill mt-5" id="check-out" name="payment-click">Оплатить</button>
                            </div>
                        </form>
                        <style>
                            .btn-success {
                                color: #222;
                                background-color: #fc0;
                                border-color: #fc0;
                            }
                        </style>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="js/main.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>