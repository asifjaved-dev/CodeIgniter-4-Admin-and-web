-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 02:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_description`, `publication_status`) VALUES
(1, 'Redmi', 'Redmi Desc', 1),
(2, 'Samsung', 'Samsung desc', 1),
(3, 'Apple', 'IPhone Desc', 1),
(4, 'Bonanza', 'Bonanza Desc', 1),
(5, 'Adidas', 'Adidas Desc', 1),
(6, 'Razer', 'Razer Desc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL COMMENT 'Published=1,Unpublished=0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `publication_status`) VALUES
(1, 'Computer', 'Computer Desc                                ', 1),
(2, 'Laptop', 'Laptop Desc', 1),
(3, 'Smartphone', 'Smartphone Desc', 1),
(4, 'Smart TV', 'SmartTV Desc', 1),
(5, 'Clothing', 'Clothing Desc  ', 1),
(6, 'Shoes & Sneakers', 'Shoes &amp; Sneakers Desc', 1),
(7, 'Accessories', 'Accessories Desc.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `created_on`) VALUES
(1, 'ASIF JAVED', 'asifgulu88@gmail.com', '03345622698', 'Hello test', '2021-06-21 18:11:49'),
(2, 'ASIF JAVED khan', 'asifjaved.2019@gmail.com', '12345678901', 'check', '2021-06-21 18:15:23'),
(3, 'azeem', 'azessssem@gmail.com', '0334562269822', 'hello', '2021-06-21 18:36:26'),
(5, 'ASIF JAVED', 'asifgulu88@gmail.com', '03345622698', 'test test', '2021-06-21 23:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_city` varchar(50) NOT NULL,
  `customer_zipcode` varchar(20) NOT NULL,
  `customer_country` varchar(100) NOT NULL,
  `customer_active` tinyint(4) NOT NULL COMMENT 'Active=1,Unactive=0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_city`, `customer_zipcode`, `customer_country`, `customer_active`) VALUES
(1, 'ASIF JAVED', '03345622698', 'example@gmail.com', 'Newcity Phase 1', 'Wah Cantt', '47040', 'Pakistan', 1),
(2, 'Azeem Tahir', '03360999999', 'ati@gmail.com', 'F-22 park', 'Islamabad', '4044', 'null', 0),
(3, 'asif', '02235622698', 'example@gmail.com', 'Newcity', 'wah', '2222', 'Pakistan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `grand_total`, `created`, `modified`) VALUES
(1, 1, 71, '2021-08-16 23:59:23', '2021-08-16 23:59:23'),
(2, 2, 86, '2021-08-17 00:19:01', '2021-08-17 00:19:01'),
(3, 3, 42, '2021-08-17 17:57:20', '2021-08-17 17:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `Qty`, `sub_total`) VALUES
(1, 1, 9, 30, 2, 60),
(2, 1, 10, 11, 1, 11),
(3, 2, 7, 29, 1, 29),
(4, 2, 8, 19, 1, 19),
(5, 2, 1, 19, 2, 38),
(6, 3, 11, 21, 2, 42);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `customer_id`, `order_id`, `txn_id`, `payment_gross`, `currency_code`, `payer_email`, `created_at`, `payment_status`) VALUES
(1, 1, 1, 'tok_1JPB1oK8djdciuxnLhdhinT5', 71.00, 'usd', 'example@gmail.com', '2021-08-16 00:00:00', 'succeeded'),
(2, 2, 2, 'tok_1JPBKoK8djdciuxnhUkTJUU0', 86.00, 'usd', 'azeem@gmail.com', '2021-08-17 00:00:00', 'succeeded'),
(3, 3, 3, 'tok_1JPRqyK8djdciuxnPfHUzzye', 42.00, 'usd', 'ati@gmail.com', '2021-08-17 00:00:00', 'succeeded');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `body` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `body`, `slug`, `status`, `created_on`) VALUES
(1, 'Lorem ipsum', '1624479633_4fda1627227fe9ebd2d1.jpg', 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.\r\nThe passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.\r\nThe passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.\r\nThe purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph,', 'Lorem-ipsum', 1, '2021-06-23 20:27:21'),
(2, 'De Finibus Bonorum', '1624480171_740b50ae44d00abc0e7c.jpg', 'Until recently, the prevailing view assumed lorem ipsum was born as a nonsense text. “It\'s not Latin, though it looks like it, and it actually says nothing,” Before & After magazine answered a curious reader, “Its ‘words’ loosely approximate the frequency with which letters occur in English, which is why at a glance it looks pretty real.”\r\n\r\nAs Cicero would put it, “Um, not so fast.”\r\n\r\nThe placeholder text, beginning with the line “Lorem ipsum dolor sit amet, consectetur adipiscing elit”, looks like Latin because in its youth, centuries ago, it was Latin.\r\n\r\nRichard McClintock, a Latin scholar from Hampden-Sydney College, is credited with discovering the source behind the ubiquitous filler text. In seeing a sample of lorem ipsum, his interest was piqued by consectetur—a genuine, albeit rare, Latin word. Consulting a Latin dictionary led McClintock to a passage from De Finibus Bonorum et Malorum (“On the Extremes of Good and Evil”), a first-century B.C. text from the Roman philosopher Cicero.', 'De-Finibus-Bonorum', 1, '2021-06-23 20:43:15'),
(3, 'Creation timelines', '1624481207_5324b2653ddda03e6567.jpg', 'So how did the classical Latin become so incoherent? According to McClintock, a 15th century typesetter likely scrambled part of Cicero\'s De Finibus in order to provide placeholder text to mockup various fonts for a type specimen book.\r\n\r\nIt\'s difficult to find examples of lorem ipsum in use before Letraset made it popular as a dummy text in the 1960s, although McClintock says he remembers coming across the lorem ipsum passage in a book of old metal type samples. So far he hasn\'t relocated where he once saw the passage, but the popularity of Cicero in the 15th century supports the theory that the filler text has been used for centuries.', 'Creation-timelines', 1, '2021-06-24 01:46:47');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_feature` tinyint(4) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_author` int(11) NOT NULL,
  `product_view` int(11) NOT NULL DEFAULT 0,
  `published_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_short_description`, `product_long_description`, `product_image`, `product_price`, `product_quantity`, `product_feature`, `product_category`, `product_brand`, `product_author`, `product_view`, `published_date`, `product_status`) VALUES
(1, 'Ultraboost DNA Black Python Shoes', 'Responsive shoes snakeskin acc.', 'Black pythons are sleek, cool and a little bit dangerous. Channel the exotic beauty of the Australian snake and make it yours in these adidas Ultraboost DNA Black Python Shoes. The stretchy knit upper features snakeskin-inspired details. Energy-returning cushioning keeps you comfortable when you\'re on the move.', 'feature-pic1.jpg', 19, 50, 1, 6, 5, 1, 0, '2017-11-30 09:24:41', 1),
(2, 'Face Covers 3-Pack', 'Two 3-packs for $30 with code MASKUP. Size M/L is recommended for most adults. This product is not eligible for returns or exchanges.', 'Made with soft, breathable fabric the adidas Face Cover is comfortable, washable and reusable for practicing healthy habits every day. This cover is not a medically-graded mask nor personal protective equipment.', 'feature-pic2.jpg', 13, 50, 0, 5, 4, 1, 0, '2017-11-30 09:29:04', 1),
(3, 'Slim Fit Linen Blazer', 'Single-breasted blazer in woven linen fabric. Narrow, notched lapels with decorative buttonhole. Chest pocket, front pockets with flap, and two inner pockets.', 'Single-breasted blazer in woven linen fabric. Narrow, notched lapels with decorative buttonhole. Chest pocket, front pockets with flap, and two inner pockets. Two buttons at front, decorative buttons at cuffs, and vent at back. Lined. Slim Fit – tapered at chest and waist with slightly narrower sleeves for a tailored silhouette.\n\n', 'feature-pic3.jpg', 12, 35, 0, 5, 4, 1, 0, '2017-11-30 09:38:25', 1),
(4, 'AUE60 Crystal 4K UHD', '4K UHD TV goes beyond regular FHD with 4x more pixels, offering your eyes the sharp and crisp images they deserve. Now you can see even the small details in the scene.', 'A sleek and elegant design that draws you to the purest picture. Crafted with an effortless minimalistic style from every angle and a boundless design that sets new standards. Keep your cables tidy and conceal them, reducing clutter and keeping a seamless look for your TV. Choose your favorite voice assistant; Bixby, Amazon Alexa or Google Assistant. For the first time, all are built into your Samsung TV to provide the optimal entertainment experience and advanced control in your connected home.\n\n', 'pic3.jpg', 695, 100, 1, 4, 2, 1, 0, '2017-11-30 09:38:57', 1),
(5, 'Razer 15.6', 'Designed for gaming, the Razer 15.6\" Blade 15 Gaming Laptop combines mobility with performance. Graphics are handled by the dedicated NVIDIA GeForce GTX 1660 Ti graphics card with VRAM.     ', 'Designed for gaming, the Razer 15.6\" Blade 15 Gaming Laptop combines mobility with performance. Graphics are handled by the dedicated NVIDIA GeForce GTX 1660 Ti graphics card with VRAM. It also features a 10th Gen 2.6 GHz Intel Core i7-10750H six-core processor and 16GB of 2933 MHz of DDR4 RAM. Its 256GB NVME PCIe M.2 SSD allows for fast boot times. For online multiplayer features, the Razer Blade 15 can utilize Wi-Fi 6 (802.11ax) or a wired Gigabit Ethernet connection. It also supports wireless accessories via Bluetooth 5.1 technology. The Razer Blade 15 features a precision-crafted aluminum chassis.\n\nThe 15.6\" display features a FHD 1920 x 1080 resolution and are individually factory calibrated, providing 100% of the sRGB color space. The bezels are thin, measuring in at about 4.9mm. The screen also has a matte finish to reduce glare in brightly-lit environments. The keyboard is backlit and supports Razer Chroma single-zone RGB lighting. Other features included Thunderbolt 3, USB Type-C, USB Type-A, and a 3.5mm audio jack. Windows 10 Home is the installed operating system.', 'preview-img.jpg', 230, 56, 1, 1, 6, 1, 0, '2017-11-30 09:40:34', 1),
(6, 'Samsung Galaxy S21 Ultra', 'The highest resolution photos and video on a smartphone', 'Samsung Electronics Co., Ltd. unveiled the Galaxy S21 Ultra, a flagship that pushes the boundaries of what a smartphone can do. The S21 Ultra pulls out all the stops for those who want Samsung’s best-of-the-best with our most advanced pro-grade camera system and our brightest, most intelligent display. It takes productivity and creativity up a notch by bringing the popular S Pen experience to the Galaxy S series for the first time.</span>', 'sm21u.jpg', 155, 12, 1, 3, 2, 1, 0, '2021-05-12 04:20:39', 1),
(7, 'Galaxy Buds Pro', 'Introducing the New Galaxy Buds Pro', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Our most immersive buds yet deliver powerful studio sound and crystal-clear call quality. Use Intelligent Active Noise Cancellation1 to escape into your music at a moment’s notice. Answer calls with just your voice and let in the sounds that matter most with adjustable ambient sound. Escape and tune in to your own moment of Zen—all with a single tap. Intelligent Active Noise Cancellation gives you the power to adjust your settings based on the world around you, so you always hear what you want to hear.1 Turn it to High on a noisy bus or to Low in a quiet library—no need to change the volume.</span></font>', 'budspro.jpg', 29, 21, 1, 7, 2, 1, 0, '2021-05-12 11:31:50', 1),
(8, 'samsung 29', 'samsung mobile  Short Description', 'samsung mobile Product Long Description', '1624825455_a36f8090a267a90191db.png', 19, 10, 1, 3, 2, 0, 0, '2021-06-27 15:24:15', 1),
(9, 'Redmi note 10', 'new branded mobile', 'Remi note 8 mobile ', '1624913861_4db7dccd166493afd68c.png', 30, 5, 1, 3, 1, 0, 0, '2021-06-28 15:57:41', 1),
(10, 'samsung 200', 'Product Short Description', 'Product Long Description', '1624943322_f3aeb7e52b99340b9d12.png', 11, 5, 1, 3, 2, 0, 0, '2021-06-29 00:08:42', 1),
(11, 'Apple iphone ', 'Product Short Description', 'Product Long Description', '1624943799_22c66c933163b2b85b97.png', 21, 10, 1, 3, 3, 0, 0, '2021-06-29 00:16:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `personal_information` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `salary` int(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `designation`, `location`, `personal_information`, `image`, `salary`, `facebook`, `twitter`, `instagram`, `organization`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Azeem', 'Tahir', 'azeem@gmail.com', '$2y$10$mYqwBEDesCpZhEmnr6ekS.acQnvIGtEeB4KLre8S1Ue1sCeIWWzxa', 3345622698, 'SQA Engineer', 'Islamabad NSTP', 'have 4 year experience of QA and Web Development', '', 70000, 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'Airomob', 0, '2021-05-18 00:31:38', '2021-06-21 02:57:24'),
(2, 'ASIF', 'JAVED', 'example@gmail.com', '$2y$10$Z66BFQ.xYUxrcIOXdpNoeuouIZgWTOf7Hj2yRgvtAtHnXOVFZYNM6', 3345622698, 'Web Developer', 'NSTP, ISLAMABAD, PAKISTAN', 'Fit and Healthy', 'public\\assets\\img\\team-2.jpg', 50000, 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', '', 1, '2021-06-16 16:29:48', '2021-06-20 13:34:52'),
(3, 'Mohsin', 'khan', 'pexample@gmail.com', '$2y$10$5nUo1YwY0YlcXMBV0F6bRu.Hs2ZPLUzLb7h1m3ym5k2xosB52MAy2', 0, 'Software Engineer', 'Islamabad NSTP', '', '', 60000, '', '', '', '', 0, '2021-06-17 16:31:36', '2021-06-19 02:31:36'),
(4, 'ali', 'azeem', 'asifgulu88@gmail.com', '$2y$10$dW67MENejPPxnsiQJydrLOLZsmfIgzrogi9vQXQRvSMe13D4D2XeW', 0, '', '', '', '', 0, '', '', '', '', 0, '2021-07-28 06:20:09', '2021-07-28 16:20:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_ibfk_1` (`product_brand`),
  ADD KEY `product_ibfk_2` (`product_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_brand`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`product_category`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
