<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
    require('connection.php');
    session_start();
    $query = "SELECT * FROM `product` WHERE 1";
    $result = mysqli_query($conn, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);

    ?>
</head>
<body>
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
    <p><?php echo $row['prod_name'];?></p>
    <p><?php echo $row['prod_price'];?></p>
    <p><?php echo $row['prod_short_desc'];?></p>
    <p><?php echo $row['prod_long_desc'];?></p>
    <img src="<?php echo $row['prod_img'];?>" width="200px">

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
    <?php
        }
        }
    }
    ?>
</body>
</html>