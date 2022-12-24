create database yandex;

use yandex;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `has_subscr` int(1) NOT NULL DEFAULT 0,
  `user_card_no` int(12),
  `subscr_end_date` timestamp,
   PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
   PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `product` (
    `prod_id` int(11) NOT NULL AUTO_INCREMENT,
    `prod_name` varchar(100) NOT NULL,
    `prod_price` float NOT NULL,
    `category_id` int(11) NOT NULL,
    `prod_short_desc` varchar(1000) NOT NULL,
    `prod_long_desc` text NOT NULL,
    `prod_img` varchar(100) NOT NULL,
    `prod_update_date` timestamp NOT NULL,
    `prod_location` varchar(250) NOT NULL,
     PRIMARY KEY (`prod_id`),
     FOREIGN KEY (`category_id`) REFERENCES `categories`(`category_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `product_options` (
    `prod_option_id` int(11) NOT NULL AUTO_INCREMENT,
    `option_id` int(11) NOT NULL,
    `prod_id` int(11) NOT NULL,
    `prod_option_name` varchar(100) NOT NULL,
    PRIMARY KEY (`prod_option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `options` (
    `option_id` int(11) NOT NULL AUTO_INCREMENT,
    `option_name` varchar(50) NOT NULL,
    PRIMARY KEY (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cart_item` (
    `cart_id` int(11) NOT NULL AUTO_INCREMENT,
    `cart_user_id` int(11) NOT NULL,
    `cart_prod_id` int(11) NOT NULL,
    `cart_quantity` int(11) NOT NULL,
    `created_at` timestamp NOT NULL,
     PRIMARY KEY (`cart_id`),
     FOREIGN KEY (`cart_user_id`) REFERENCES `user`(`user_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE payments(
    `payment_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `payment_date` DATE NOT NULL,
    `price` int(15) NOT NULL,
    `payment_type` varchar(50) NOT NULL,
    `user_id` INT(11) NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON UPDATE CASCADE
);


CREATE TABLE `orders` (
    `order_id` int(11) NOT NULL AUTO_INCREMENT,
    `order_user_id` int(11) NOT NULL,
    `order_amount` float NOT NULL,
    `order_city` varchar(50) NOT NULL,
    `order_address` varchar(100) NOT NULL,
    `order_date` timestamp NOT NULL,
    `order_tracking_num` varchar(80) NOT NULL,
     PRIMARY KEY (`order_id`),
     FOREIGN KEY (`order_user_id`) REFERENCES `user`(`user_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `order_details` (
    `detail_id` int(11) NOT NULL AUTO_INCREMENT,
    `detail_order_id` int(11) NOT NULL,
    `detail_prod_id` int(11) NOT NULL,
    `detail_name` varchar(250) NOT NULL,
    `detail_price` float NOT NULL,
    `detail_quantity` int(11) NOT NULL,
    `detail_payment_id` int(11) NOT NULL,
     PRIMARY KEY (`detail_id`),
     FOREIGN KEY (`detail_order_id`) REFERENCES `orders`(`order_id`),
     FOREIGN KEY (`detail_prod_id`) REFERENCES `product`(`prod_id`),
     FOREIGN KEY (`detail_payment_id`) REFERENCES `payments`(`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `reviews` (
    `review_id` int(11) NOT NULL AUTO_INCREMENT,
    `review_user_id` int(11) NOT NULL,
    `review_prod_id` int(11) NOT NULL,
    `text` varchar(1000) NOT NULL,
    `rate` int(1) NOT NULL,
    PRIMARY KEY (`review_id`),
    FOREIGN KEY (`review_user_id`) REFERENCES `user`(`user_id`),
    FOREIGN KEY (`review_prod_id`) REFERENCES `product`(`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- таблицы для "Яндекс Путешествия"
CREATE TABLE jet(
    `jet_id` VARCHAR(20) PRIMARY KEY NOT NULL,
    `type` VARCHAR(30) NOT NULL,
    `total_capacity` VARCHAR(30) NOT NULL
);

CREATE TABLE flight_details(
    `flight_no` VARCHAR(20) NOT NULL PRIMARY KEY, 
    `from_city` VARCHAR(30) NOT NULL,
    `to_city` VARCHAR(30) NOT NULL,
    `departure_date` timestamp NOT NULL,
    `arrival_date` timestamp NOT NULL,
    `seats_economy` int(5) DEFAULT NULL,
    `seats_business` int(5) DEFAULT NULL,
    `price_economy` int(10) DEFAULT NULL,
    `price_business` int(10) DEFAULT NULL,
    `jet_id` VARCHAR(20),
    FOREIGN KEY (`jet_id`) REFERENCES `jet`(`jet_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ticket(
    `pnr` INT(8) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `rsrv_date` DATE NOT NULL,
    `class` VARCHAR(10) NOT NULL,
    `booking_status` VARCHAR(20),
    `passengers_num` int(5),
    `cust_id` INT(8),
    `flight_no` VARCHAR(20),
    `jet_id` VARCHAR(20),
    `payment_id` int(11) NOT NULL,
    FOREIGN KEY (`flight_no`) REFERENCES `flight_details`(`flight_no`) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (`cust_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`jet_id`) REFERENCES `jet`(`jet_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`payment_id`) REFERENCES `payments`(`payment_id`)
);


