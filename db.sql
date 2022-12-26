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

insert into `categories` (`category_name`) values ('смартфоны'), ('умные часы и браслеты'), ('Наушники и Bluetooth-гарнитуры');

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

insert into 'product' ('prod_name', 'prod_price', 'category_id', 'prod_short_desc', 'prod_long_desc', 'prod_img', 'prod_update_date', 'prod_location') VALUES
('Смартфон Apple iPhone 14', 499990, 1, 'Тонкий и легкий смартфон из новой линейки Apple iPhone 14 с высоким разрешением OLED-экрана, хорошим объемом памяти и запасом автономности во влагостойком корпусе.',
'Тонкий и легкий смартфон из новой линейки Apple iPhone 14 с высоким разрешением OLED-экрана, хорошим объемом памяти и запасом автономности во влагостойком корпусе. Продвинутые камеры позволят снимать фото и видео в отличном качестве даже при слабом освещении. Функция экстренной помощи со связью через спутник выручит, когда нет возможности выйти в интернет. Мощный процессор откроет новые возможности для игр и развлечений.',
'https://avatars.mds.yandex.net/get-mpic/5256693/img_id4407641961569020799.jpeg/orig',
NOW(), 'Алматы');

INSERT INTO `product`(`prod_name`, `prod_price`, `category_id`, `prod_short_desc`, `prod_long_desc`, `prod_img`, `prod_update_date`, `prod_location`) VALUES ('Смартфон Apple iPhone 11', 319990, 1, 'Функциональный и стильный смартфон Apple iPhone 11 в металлическом корпусе способен обеспечить не только повседневное общение и развлечения, но и продуктивную работу.',
'Функциональный и стильный смартфон Apple iPhone 11 в металлическом корпусе способен обеспечить не только повседневное общение и развлечения, но и продуктивную работу. Для этого он оснащен мощным процессором Apple A13 Bionic из 6 ядер, поддерживающим слаженную работу всех комплектующих, а также модулем ОЗУ объемом в 4 ГБ, что предусматривает быстрое переключение между открытыми приложениями и возможность играть в игры. Основная (12;12 Мп) и фронтальная (12 Мп) камеры позволят создавать фотошедевры. Изображение на экране смартфона Apple iPhone 11 диагональю 6.1 дюйма обладает поразительной детализацией и цветопередачей. Олеофобное покрытие исключает сильное загрязнение экрана. Корпус смартфона имеет высокую степень пылевлагозащиты (IP68), благодаря чему обеспечивается эффективная и длительная работа устройства. Несъемный аккумулятор емкостью 3110 мА·ч поддерживает беспроводную зарядку, что сделает данный процесс более легким и быстрым.',
'https://avatars.mds.yandex.net/get-mpic/4397006/img_id3884474343356692179.jpeg/orig',
NOW(), 'Алматы');

INSERT INTO `product`(`prod_name`, `prod_price`, `category_id`, `prod_short_desc`, `prod_long_desc`, `prod_img`, `prod_update_date`, `prod_location`) VALUES ('Смартфон Apple iPhone 14 Pro', 699990, 1, 'Новый волшебный способ взаимодействия с iPhone.',
'Новый волшебный способ взаимодействия с iPhone.
Новаторские функции безопасности, призванные спасать жизни.
Инновационная 48-мегапиксельная камера для потрясающей детализации.
Все они оснащены новейшим чипом для смартфонов.
С керамическим экраном, более прочным, чем стекло любого смартфона. Водонепроницаемость. Нержавеющая сталь хирургического класса.
Представляем Dynamic Island, по-настоящему инновационную разработку Apple, состоящую из аппаратного и программного обеспечения. Он воспроизводит музыку, спортивные результаты, FaceTime и многое другое — и все это, не отвлекая вас от того, что вы делаете.',
'https://avatars.mds.yandex.net/get-mpic/1927699/img_id2340870575975482082.jpeg/orig',
NOW(), 'Алматы');

INSERT INTO `product`(`prod_name`, `prod_price`, `category_id`, `prod_short_desc`, `prod_long_desc`, `prod_img`, `prod_update_date`, `prod_location`) VALUES 
('Умные часы Apple Watch Ultra', 499900, 2, 'Чтобы создать идеальные спортивные часы, мы тщательно проработали каждый элемент с особым вниманием к деталям, обеспечивая непревзойденную производительность.', 'Чтобы создать идеальные спортивные часы, мы тщательно проработали каждый элемент с особым вниманием к деталям, обеспечивая непревзойденную производительность. Титан обеспечивает идеальный баланс между весом, прочностью и устойчивостью к коррозии. Новый дизайн корпуса поднимается вверх, окружая плоское сапфировое стекло и защищая его от ударов по краям. Цифровая заводная головка больше, а боковая кнопка выступает из корпуса, что упрощает использование часов в перчатках.
Специально для Apple Watch Ultra циферблат Wayfinder оснащен циферблатом времени, который можно переключать на компас в режиме реального времени, и имеет восемь дополнительных функций. В условиях низкой освещенности вы можете повернуть цифровую заводную головку, чтобы активировать ночной режим, и увидеть, как циферблат часов становится ярко-красным.', 'https://avatars.mds.yandex.net/get-mpic/7067087/img_id8862432385138098148.png/orig', NOW(), 'Алматы'),
('Умные часы Apple Watch Series 7', 244900, 2, 'Apple Watch изменились: Series 7 получила большой и удобный экран, теперь отображающий больше информации, чем раньше.', 'Apple Watch изменились: Series 7 получила большой и удобный экран, теперь отображающий больше информации, чем раньше. При этом сами часы не изменились в размерах — они остались легкими, удобными и компактными, но стали умнее и быстрее.
Apple Watch S7 - это на 20% больший экран, чем у Series 6, и на 50% по сравнению с моделями Series 3. Совместная работа инженеров и дизайнеров позволила уменьшить рамку по краям дисплея Retina, сделав область для отображения информации больше. При этом сам дисплей теперь ярче и не гаснет, когда вы опускаете руку - он постоянно включен и потребляет меньше энергии.
Прочность, которая всегда с вами.', 'https://avatars.mds.yandex.net/get-mpic/5307434/img_id6260675665002085278.jpeg/orig', NOW(), 'Алматы'),
('Умные часы Samsung Galaxy Watch 5', 169890, 2, 'Умное устройство для достижения ваших личных целей каждый день', 'Смарт-часы Samsung Galaxy Watch 5 – увлекательная новинка в мире смарт-часов. Лаконичный дизайн вместе с невероятными возможностями сделают часы незаменимым помощником в быту, на тренировке и в повседневной жизни.
Samsung Galaxy Watch 5 представлены в двух размерах: диаметром 40 мм и 44 мм. По три запоминающихся оттенка в каждом из размеров: цвета графит, дымчато-синий и серебро в корпусе 44 мм, и цвета графит, розовое золото и лаванда в корпусе 40 мм. Подберите ремешок под выбранный оттенок корпуса и получите уникальный дизайн под любой случай жизни. Меняйте ремешки, создавая классический офисный, удобный спортивный или озорной и веселый стиль для самой ожидаемой вечеринки.
Samsung Galaxy Watch 5 включают в себя 90 самых разнообразных тренировок, среди которых вы найдете свою. Кроме того, смарт-часы в режиме постоянного времени отслеживают вашу активность, количество сожженных калорий и пройденных шагов.', 'https://avatars.mds.yandex.net/get-mpic/6269810/img_id4113287537143675113.jpeg/orig', NOW(), 'Алматы');

INSERT INTO `product`(`prod_name`, `prod_price`, `category_id`, `prod_short_desc`, `prod_long_desc`, `prod_img`, `prod_update_date`, `prod_location`) VALUES 
('Наушники Sony MDR-ZX310AP, черный', 9600, 4, 'Производитель:Sony ;Микрофон:Да ;Регулятор громкости:Да ;Звук Surround:Нет ;Тип крепления:оголовье ;', 'Производитель:Sony ;Микрофон:Да ;Регулятор громкости:Да ;Звук Surround:Нет ;Тип крепления:оголовье ;Тип акустического оформления:закрытое ;Длина кабеля:1.2 м;Разъём:mini jack 3.5 mm ;Тип подключения:с проводом ;Микрофон с шумоподавлением:Да ;Чувствительность:98 дБ;Импеданс:24 Ом;Максимальная воспроизводимая частота:24000 Гц;Минимальная воспроизводимая частота:10 Гц;Цвет:черный ;Тип наушников:накладные ;Игровые наушники:Нет ;', 'https://avatars.mds.yandex.net/get-mpic/5324096/img_id1216860997055435187.jpeg/orig', NOW(), 'Алматы'),
('Беспроводные наушники JVC HA-S91N', 168760, 4, 'HA-S91N обладают активным шумоподавлением с большими 40-миллиметровыми драйверами для высококачественного звука. Удобная, легкая конструкция с мягкими амбушюрами позволяет пользоваться наушниками в течении длительного времени.', 'HA-S91N обладают активным шумоподавлением с большими 40-миллиметровыми драйверами для высококачественного звука. Удобная, легкая конструкция с мягкими амбушюрами позволяет пользоваться наушниками в течении длительного времени.', 'https://avatars.mds.yandex.net/get-mpic/5226473/img_id3544505030086075839.png/orig', NOW(), 'Алматы'),
('Наушники Reloop RH-2500', 33010, 4, ' ', ' ', 'https://avatars.mds.yandex.net/get-mpic/1767083/img_id5904822835665152217/orig', NOW(), 'Алматы');


CREATE TABLE `product_options` (
    `prod_option_id` int(11) NOT NULL AUTO_INCREMENT,
    `option_id` int(11) NOT NULL,
    `prod_id` int(11) NOT NULL,
    `prod_option_name` varchar(100) NOT NULL,
    PRIMARY KEY (`prod_option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `product_options` ADD FOREIGN KEY (`option_id`) REFERENCES `options`(`option_id`);
ALTER TABLE `product_options` ADD FOREIGN KEY (`prod_id`) REFERENCES `product`(`prod_id`);
ALTER TABLE `product_options`MODIFY `prod_option_name` varchar(1000) NOT NULL;

CREATE TABLE `options` (
    `option_id` int(11) NOT NULL AUTO_INCREMENT,
    `option_name` varchar(50) NOT NULL,
    PRIMARY KEY (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- опции для смартфонов
INSERT INTO `options`(`option_name`) VALUES ('Экран'), ('Память'), ('Фото'), ('Операционная система'), ('Стандарт связи'), ('Степень защиты'), ('Вес');
-- опции для смарт часов
INSERT INTO `options`(`option_name`) VALUES ('Защищенность'), ('Совместимость'), ('Мониторинг'), ('Версия'), ('Беспроводная связь');
-- опции для наушников
INSERT INTO `options`(`option_name`) VALUES ('Конструкция'), ('Тип излучателей'), ('Импеданс'), ('Диапазон воспроизводимых частот'), ('Чувствительность'), ('Разъем'), ('Длина кабеля'), ('Активное шумоподавление (ANC)'), ('Подключение'), ('Микрофон');


INSERT INTO `product_options`(`option_id`, `prod_id`, `prod_option_name`) VALUES 
(1, 1, '6.1" (2532x1170) OLED'),
(2, 1, 'встроенная 256 ГБ, 128 ГБ, 512 ГБ, оперативная 6 ГБ'),
(3, 1, 'двойная камера, основная 12 МП'),
(4, 1, 'iOS 16'),
(5, 1, '4G LTE, 5G'),
(6, 1, 'IP68'),
(7, 1, '172 г');

INSERT INTO `product_options`(`option_id`, `prod_id`, `prod_option_name`) VALUES 
(1, 2, '6.1" (1792x828) IPS'),
(2, 2, 'встроенная 64 ГБ, 256 ГБ, 128 ГБ, оперативная 4 ГБ'),
(3, 2, 'двойная камера, основная 12 МП'),
(4, 2, 'iOS 13'),
(5, 2, '4G LTE, 3G'),
(6, 2, 'IP68'),
(7, 2, '194 г');

INSERT INTO `product_options`(`option_id`, `prod_id`, `prod_option_name`) VALUES 
(1, 3, '6.1" (2556x1179) OLED 120 Гц'),
(2, 3, 'встроенная 256 ГБ, 128 ГБ, 512 ГБ, 1 ТБ, оперативная 6 ГБ'),
(3, 3, '3 камеры, основная 48 МП'),
(4, 3, 'iOS 16'),
(5, 3, '4G LTE, 5G'),
(6, 3, 'IP68'),
(7, 3, '206 г');

INSERT INTO `product_options`(`option_id`, `prod_id`, `prod_option_name`) VALUES 
(8, 6, 'влагозащита'),
(9, 6, 'Android'),
(10, 6, 'ЭКГ, постоянное измерение пульса, мониторинг сна, акселерометр, мониторинг калорий'),
(4, 6, 'Wear OS'),
(11, 6, 'для других стран'),
(8, 4, 'влагозащита, защита от ударов'),
(9, 4, 'iOS'),
(10, 4, 'измерение уровня кислорода в крови, ЭКГ, измерение температуры тела, мониторинг сна'),
(4, 4, 'Watch OS'),
(11, 4, 'для других стран'),
(8, 5, 'влагозащита'),
(9, 5, 'iOS'),
(12, 5, 'Wi-Fi, Bluetooth, GPS, ГЛОНАСC'),
(10, 5, 'измерение уровня кислорода в крови, ЭКГ, постоянное измерение пульса, мониторинг сна, мониторинг физической активности, акселерометр, мониторинг калорий'),
(4, 5, 'Watch OS'),
(11, 5, 'Ростест (EAC), для других стран');

INSERT INTO `product_options`(`option_id`, `prod_id`, `prod_option_name`) VALUES 
(13, 9, 'полноразмерные (закрытые)'),
(14, 9, 'динамические'),
(15, 9, '32 Ом'),
(16, 9, '20-20000 Гц'),
(17, 9, '118 дБ'),
(18, 9, 'mini jack 3.5 mm'),
(19, 9, '1.05 м'),
(7, 9, '307 г'),
(13, 8, 'накладные'),
(20, 8, 'есть'),
(15, 8, '32 Ом'),
(16, 8, '10-22000 Гц'),
(17, 8, '100 дБ'),
(18, 8, 'mini jack 3.5 mm'),
(19, 8, '1.2 м'),
(7, 8, '198 г'),
(21, 8, 'Bluetooth 5.0'),
(13, 7, 'накладные (закрытые)'),
(14, 7, 'динамические'),
(22, 7, 'да'),
(15, 7, '24 Ом'),
(16, 7, '10-24000 Гц'),
(17, 7, '98 дБ/мВт'),
(18, 7, 'mini jack 3.5 mm'),
(19, 7, '1.2 м'),
(7, 8, '125 г');

CREATE TABLE `cart_item` (
    `cart_id` int(11) NOT NULL AUTO_INCREMENT,
    `cart_user_id` int(11) NOT NULL,
    `cart_prod_id` int(11) NOT NULL,
    `cart_quantity` int(11) NOT NULL,
    `created_at` timestamp NOT NULL,
     PRIMARY KEY (`cart_id`),
     FOREIGN KEY (`cart_user_id`) REFERENCES `user`(`user_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `cart_item` ADD FOREIGN KEY (`cart_prod_id`) REFERENCES `product`(`prod_id`);

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


