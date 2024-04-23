  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  SET AUTOCOMMIT = 0;
  START TRANSACTION;

  CREATE TABLE `admin_info` (
    `admin_id` int(10) NOT NULL,
    `admin_name` varchar(100) NOT NULL,
    `admin_email` varchar(300) NOT NULL,
    `admin_password` varchar(300) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
  (0, 'admin', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b');

  CREATE TABLE `brands` (
    `brand_id` int(100) NOT NULL,
    `brand_title` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
  (1, 'HP'),
  (2, 'DELL'),
  (3, 'APPLE'),
  (4, 'LENOVO'),
  (5, 'LG'),
  (6, 'ASUS'),
  (7, 'ACER'),
  (8, 'Logitech'),
  (9, 'Rapoo'),
  (10, 'Zadez'),
  (11, 'Samsung'),
  (12, 'Xiaomi');


  CREATE TABLE `cart` (
    `id` int(10) NOT NULL,
    `p_id` int(10) NOT NULL,
    `user_id` int(10) DEFAULT NULL,
    `qty` int(10) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  CREATE TABLE `categories` (
    `cat_id` int(100) NOT NULL,
    `cat_title` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
  (1, 'Laptop'),
  (2, 'Chuột'),
  (3, 'Bàn phím'),
  (4, 'Màn hình'),
  (5, 'PC'),
  (6, 'Điện thoại');

  CREATE TABLE `products` (
    `product_id` int(100) NOT NULL,
    `product_cat` int(100) NOT NULL,
    `product_brand` int(100) NOT NULL,
    `product_title` varchar(255) NOT NULL,
    `product_price` int(100) NOT NULL,
    `product_image` text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_image`) VALUES
  (1, 1, 1, 'Laptop HP 245 G10 R5', 1000, 'https://cdn.tgdd.vn/Products/Images/44/312871/hp-245-g10-r5-8f155pa-glr-thumb-600x600.jpg'),
  (2, 1, 1, 'Laptop HP Pavilion 14', 1100, 'https://cdn.tgdd.vn/Products/Images/44/322223/hp-pavilion-14-dv2073tu-i5-7c0p2pa-thumb-1-600x600.jpg'),
  (3, 1, 1, 'Laptop HP Gaming VICTUS 16 ', 2000, 'https://cdn.tgdd.vn/Products/Images/44/323584/hp-victus-16-s0138ax-r7-9q985pa-thumb-600x600.jpg'),
  (4, 1, 2, 'Laptop Dell Inspiron 15 3520', 900, 'https://cdn.tgdd.vn/Products/Images/44/321192/dell-inspiron-15-3520-i5-25p231-600x600.jpg'),
  (58, 1, 2, 'Laptop Dell Gaming G15 5530', 2000, 'https://cdn.tgdd.vn/Products/Images/44/309304/dell-gaming-g15-5530-i7-i7h165w11gr4060-thumb-600x600.jpg'),
  (6, 1, 2, 'Laptop Dell Inspiron 14 7430 2-in-1', 35000, 'https://cdn.tgdd.vn/Products/Images/44/314840/dell-inspiron-14-7430-i5-n7430i58w1-221023-102403-600x600.png'),
  (7, 1, 3, 'Laptop Apple MacBook Air 13 inch M1 2020', 1000, 'https://cdn.tgdd.vn/Products/Images/44/231244/macbook-air-m1-2020-gray-600x600.jpg'),
  (57, 1, 3, 'Laptop Apple MacBook Pro 14', 4000, 'https://cdn.tgdd.vn/Products/Images/44/318232/apple-macbook-pro-14-inch-m3-max-2023-14-core-311023-105433-600x600.jpg'),
  (9, 1, 3, 'Laptop Apple MacBook Air 15 inch', 3500, 'https://cdn.tgdd.vn/Products/Images/44/322635/macbook-air-15-inch-m3-2024-512gb-060324-095622-600x600.jpg'),
  (10, 1, 4, 'Laptop Lenovo IdeaPad 1', 500, 'https://cdn.tgdd.vn/Products/Images/44/303562/lenovo-ideapad-1-15amn7-r5-82vg0061vn-thumb-laptop-1-600x600.jpg'),
  (11, 1, 4, 'Laptop Lenovo LOQ Gaming', 3000, 'https://cdn.tgdd.vn/Products/Images/44/313613/lenovo-loq-gaming-15irh8-i7-82xv00qxvn-thumb-600x600.jpg'),
  (12, 1, 4, 'Laptop Lenovo Yoga 7', 1500, 'https://cdn.tgdd.vn/Products/Images/44/313619/lenovo-yoga-7-14irl8-i7-82yl006bvn-thumb-600x600.jpg'),
  (13, 1, 5, 'Laptop LG gram 2023 i7', 4000, 'https://cdn.tgdd.vn/Products/Images/44/306795/lg-gram-2023-i7-17z90rgah78a5-thumb-600x600.jpg'),
  (14, 1, 5, 'Laptop LG gram Style 2023', 3000, 'https://cdn.tgdd.vn/Products/Images/44/306798/lg-gram-style-2023-i5-16z90rsgah54a5-thumb-600x600.jpg'),
  (15, 1, 3, 'Laptop Apple MacBook Air 13 inch', 2000, 'https://cdn.tgdd.vn/Products/Images/44/282827/apple-macbook-air-m2-2022-vang-600x600.jpg'),
  (16, 1, 6, 'Laptop Asus Vivobook Go 15', 700, 'https://cdn.tgdd.vn/Products/Images/44/311178/asus-vivobook-go-15-e1504fa-r5-nj776w-thumb-600x600.jpg'),
  (17, 1, 6, 'Laptop Asus Gaming ROG Strix SCAR 18', 7000, 'https://cdn.tgdd.vn/Products/Images/44/321376/asus-gaming-rog-strix-scar-18-g834jyr-i9-r6011w-thumb-600x600.jpg'),
  (19, 1, 6, 'Laptop Asus Zenbook 14 Duo', 4000, 'https://cdn.tgdd.vn/Products/Images/44/324818/asus-zenbook-14-duo-oled-ux8406ma-ultra-7-pz307w-thumb-600x600.jpg'),
  (20, 1, 7, 'Laptop Acer Aspire Lite', 800, 'https://cdn.tgdd.vn/Products/Images/44/314630/acer-aspire-5-a515-58gm-51lb-i5-nxkq4sv002-170923-015941-600x600.jpg'),
  (21, 1, 7, 'Laptop Acer Gaming Predator Helios 16', 4000, 'https://cdn.tgdd.vn/Products/Images/44/320255/acer-predator-helios-16-ph16-71-72bv-i7-nhqjrsv001-thumb-600x600.jpg'),
  (22, 1, 7, 'Laptop Acer Gaming Nitro V', 1300, 'https://cdn.tgdd.vn/Products/Images/44/319657/acer-nitro-v-anv15-51-53ne-i5-nhqnasv002-thumb-600x600.jpg'),
  (23, 2, 8, 'Chuột Không dây Logitech M185', 20, 'https://cdn.tgdd.vn/Products/Images/86/223821/chuot-khong-day-logitech-m185-thumb2-1-600x600.jpeg'),
  (24, 2, 8, 'Chuột Không dây Bluetooth Logitech MX Anywhere', 100, 'https://cdn.tgdd.vn/Products/Images/86/211272/chuot-bluetooth-logitech-mx-anywhere-2s-den-01-600x600.jpg'),
  (25, 2, 8, 'Chuột Có dây Gaming Logitech', 30, 'https://cdn.tgdd.vn/Products/Images/86/234490/chuot-gaming-logitech-g102-gen2-lightsync-01-600x600.jpg'),
  (27, 2, 9, 'Chuột Không Dây Silent Rapoo ', 30, 'https://cdn.tgdd.vn/Products/Images/86/314637/chuot-khong-day-silent-rapoo-b2s-thumb-2-600x600.jpg'),
  (32, 2, 9, 'Chuột Không dây Bluetooth Silent Rapoo', 35, 'https://cdn.tgdd.vn/Products/Images/86/293989/chuot-vi-tinh-quang-khong-day-rapoo-m650silent-eng-english-thumb4-600x600.jpeg'),
  (33, 2, 10, 'Chuột Sạc Bluetooth Silent Zadez', 35, 'https://cdn.tgdd.vn/Products/Images/86/310095/chuot-sac-bluetooth-zadez-m382z-thumb-600x600.jpg'),
  (34, 2, 10, 'Chuột Có Dây Gaming Zadez', 24, 'https://cdn.tgdd.vn/Products/Images/86/322595/chuot-co-day-gaming-zadez-g-611m-thumb-600x600.jpg'),
  (35, 3, 9, 'Bàn Phím Cơ Có Dây Gaming Rapoo', 40, 'https://cdn.tgdd.vn/Products/Images/4547/246137/co-co-day-gaming-rapoo-v500alloy-den-thumb-600x600.jpeg'),
  (36, 3, 10, 'Bàn Phím Cơ Có Dây Gaming Razer', 120, 'https://cdn.tgdd.vn/Products/Images/4547/243200/co-day-gaming-razer-huntsman-tournament-edition-thumb-600x600.jpeg'),
  (37, 3, 8, 'Bộ Bàn Phím Chuột Không Dây Logitech MK240', 50, 'https://cdn.tgdd.vn/Products/Images/4547/323006/bo-ban-phim-chuot-khong-day-logitech-mk240-thumb-2-600x600.jpg'),
  (38, 3, 8, 'Bàn phím Bluetooth Logitech K380s ', 3500, 'https://cdn.tgdd.vn/Products/Images/4547/323008/ban-phim-bluetooth-logitech-k380s-hong-thumb-600x600.jpg'),
  (39, 4, 1, 'Màn hình HP M22f ', 200,'https://cdn.tgdd.vn/Products/Images/5697/317535/hp-m22f-21-5-inch-fhd-thumb-600x600.jpg'),
  (40, 4, 1, 'Màn hình HP M27f', 250, 'https://cdn.tgdd.vn/Products/Images/5697/317538/hp-m27f-27-inch-fhd-thumb-600x600.jpg'),
  (45, 4, 3, 'Apple Studio Display', 4000, 'https://cdn.tgdd.vn/Products/Images/5697/320627/apple-studio-display-27-5k-mmyw3sa-thumb-600x600.jpg'),
  (46, 4, 2, 'Màn hình Dell Ultrasharp', 1000, 'https://cdn.tgdd.vn/Products/Images/5697/308042/dell-ultrasharp-u2723qe-27-inch-4k-thumb-600x600.jpg'),
  (47, 5, 1, 'HP Pavilion', 650, 'https://cdn.tgdd.vn/Products/Images/5698/324061/hp-tp014018d-i3-8x3r4pa-thumb-600x600.jpg'),
  (48, 5, 3, 'iMac 24 inch', 3000, 'https://cdn.tgdd.vn/Products/Images/5698/318238/imac-24-inch-2023-4-5k-m3-8-core-gpu-311023-040444-600x600.jpg'),
  (49, 5, 3, 'Mac mini M2 2023', 250, 'https://cdn.tgdd.vn/Products/Images/5698/321443/mac-mini-m2-z16k-thumb-600x600.jpg'),
  (56, 6, 3, 'iPhone 15 Pro Max', 1500, 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg'),
  (51, 6, 3, 'iPhone 15 Plus', 1300, 'https://cdn.tgdd.vn/Products/Images/42/303891/iphone-15-plus-xanh-la-128gb-thumb-600x600.jpg'),
  (52, 6, 3, 'iphone 15', 1000, 'https://cdn.tgdd.vn/Products/Images/42/281570/iphone-15-hong-thumb-1-600x600.jpg'),
  (53, 6, 3, 'iPhone 13', 900, 'https://cdn.tgdd.vn/Products/Images/42/223602/iphone-13-midnight-2-600x600.jpg'),
  (54, 6, 11, 'Điện thoại Samsung Galaxy S24 5G', 900, 'https://cdn.tgdd.vn/Products/Images/42/319665/samsung-galaxy-s24-yellow-thumb-600x600.png'),
  (55, 6, 11, 'Samsung Galaxy S24 Ultra 5G', 1500, 'https://cdn.tgdd.vn/Products/Images/42/307174/samsung-galaxy-s24-ultra-grey-thumb-600x600.jpg'),
  (50, 6, 11, 'Samsung Galaxy S23 Ultra 5G', 1000, 'https://cdn.tgdd.vn/Products/Images/42/249948/samsung-galaxy-s23-ultra-green-thumbnew-600x600.jpg'),
  (59, 6, 12, 'Xiaomi 14 5G', 1000, 'https://cdn.tgdd.vn/Products/Images/42/298538/xiaomi-14-green-thumbnew-600x600.jpg'),
  (5, 6, 12, 'Xiaomi 13T Pro 5G', 900, 'https://cdn.tgdd.vn/Products/Images/42/309816/xiaomi-13-t-pro-xanh-duong-thumb-600x600.jpg'),
  (8, 6, 12, 'Xiaomi Redmi Note 13 Pro 5G', 600, 'https://cdn.tgdd.vn/Products/Images/42/319670/xiaomi-redmi-note-13-pro-5g-violet-thumb-600x600.jpg');

  CREATE TABLE `user_info` (
    `user_id` int(10) NOT NULL,
    `first_name` varchar(100) NOT NULL,
    `last_name` varchar(100) NOT NULL,
    `email` varchar(300) NOT NULL,
    `password` varchar(300) NOT NULL,
    `mobile` varchar(10) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`) VALUES
  (1, 'User', 'User', 'user@gmail.com', '1234567890', '1234567890');

  ALTER TABLE `admin_info`
    ADD PRIMARY KEY (`admin_id`);

  ALTER TABLE `brands`
    ADD PRIMARY KEY (`brand_id`);

  ALTER TABLE `cart`
    ADD PRIMARY KEY (`id`);

  ALTER TABLE `categories`
    ADD PRIMARY KEY (`cat_id`);

  ALTER TABLE `products`
    ADD PRIMARY KEY (`product_id`);

  ALTER TABLE `user_info`
    ADD PRIMARY KEY (`user_id`);

  ALTER TABLE `brands`
    MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

  ALTER TABLE `cart`
    MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

  ALTER TABLE `categories`
    MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

  ALTER TABLE `products`
    MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

  ALTER TABLE `user_info`
    MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
