<?php
        require('../connection.php');
        session_start();
        include 'catalog.php';
        $_SESSION['orderby']="";
        if(isset($_GET['sort'])){
                if ($_GET['sort'] == "priceasc") {
                        $_SESSION['orderby']="ORDER BY `product`.`prod_price`";
                } elseif ($_GET['sort'] == "pricedesc") {
                        $_SESSION['orderby']="ORDER BY `product`.`prod_price` DESC";
                } elseif ($_GET['sort'] == "nameasc") {
                        $_SESSION['orderby']="ORDER BY `product`.`prod_name` ASC";
                } elseif ($_GET['sort'] == "namedesc") {
                        $_SESSION['orderby']="ORDER BY `product`.`prod_name` DESC";
                } elseif ($_GET['sort'] == "dateasc") {
                        $_SESSION['orderby']="ORDER BY `product`.`prod_update_date` ASC";
                } elseif ($_GET['sort'] == "datedesc") {
                        $_SESSION['orderby']="ORDER BY `product`.`prod_update_date` DESC";
                }
        }       
        $query = "SELECT * FROM `product` $_SESSION[orderby]";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/category.css">
    <title>Category</title>
</head>
<body>


        <div class="category">
                 <h1>
                        Наушники и гарнитуры Алматы
                </h1>  
                <form action="category_headphones.php" method="get">
                
                <div>
                        <h1>By Price</h1>
                        <input type="radio" name="sort" id="priceasc" value="priceasc"><label for="priceasc">Low</label>
                        <input type="radio" name="sort" id="pricedesc" value="pricedesc"><label for="pricedesc">High</label>
                </div>
                <div>
                        <h1>By Name</h1>
                        <input type="radio" name="sort" id="nameasc" value="nameasc"><label for="nameasc">A-Z</label>
                        <input type="radio" name="sort" id="namedesc" value="namedesc"><label for="namedesc">Z-A</label>
                </div>
                <div>
                        <h1>By Date</h1>
                        <input type="radio" name="sort" id="dateasc" value="dateasc"><label for="dateasc">Newer</label>
                        <input type="radio" name="sort" id="datedesc" value="datedesc"><label for="datedesc">Older</label>
                </div>
                <div>
                        <input type="submit" value="Sort">
                </div>
                
                </form>
                <?php

                ?>         
                <br>
                <br>
                <?php 
                if($rows >=1){
                        while($row = $result->fetch_assoc()){
                        $q = "SELECT `options`.`option_name`, `product_options`.`prod_option_name` FROM `product_options` 
                        JOIN `options` ON `options`.`option_id` = `product_options`.`option_id` 
                        INNER JOIN `product` ON `product`.`prod_id` = `product_options`.`prod_id` 
                        WHERE `product`.`prod_id`=$row[prod_id]" ;
                        $r = mysqli_query($conn, $q) or die(mysql_error());
                        $options = mysqli_num_rows($r);
                        if($row['prod_id']==7||$row['prod_id']==8||$row['prod_id']==9){
                ?>
                <div class="category-object">
                        <div class="category-object-1">
                                <a href="">
                                        <img src="images/products/phones/iphone-14.PNG" alt="">
                                </a>
                                
                        </div>
                        <div class="category-object-2">
                                <a href="">
                                <h3><?php echo $row['prod_name'];?></h3>
                                </a>
                                <span id="otziv">393 отзыва <br></span>
                                
                                <span>
                                <?php
                                while($option = $r->fetch_assoc()){
                                ?>
                                <table>
                                        <tbody>
                                        <tr>
                                                <th><?php echo $option['option_name'];?></th>
                                                <td><?php echo $option['prod_option_name'];?></td>
                                        </tr>
                                        </tbody>
                                </table>
                                </span>
                                <?php
                                }
                                ?>
                                <span>
                                        качество фотографий, мощный процессор
                                </span>
                        </div>
                        <div class="category-object-3">
                                <h1>
                                        <?php echo $row['prod_price']." Тенге";?>
                                </h1>
                                <a href="">
                                <div class="like_product">
                                        <span>Похожие</span>
                                </div>
                                </a>
                                
                        </div>
                        <div>

                        </div>
                </div>
                <?php
                        }
                        }
                }
                ?>
                
        </div>

</body>
</html>
<?php
        include 'footer.php'
?>