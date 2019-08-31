-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 05:01 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sec_question` tinytext,
  `answer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `email`, `password`, `sec_question`, `answer`) VALUES
('admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'What is uiu?', 'United international university'),
('Tarek', 'tarek', 'tarek@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'What is your favorite person', 'Mother');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `company`, `status`) VALUES
(22, 'A4tech', 'A4tech', 1),
(17, 'Acer', 'Acer', 1),
(10, 'Apple', 'Apple inc.', 1),
(3, 'Bata', 'Bata Company', 1),
(13, 'HP', 'Hewlett-Packard', 1),
(14, 'Lenovo', 'Lenovo Inc.', 1),
(21, 'Logitech ', 'Logitech', 1),
(2, 'Mac', 'Apple', 1),
(20, 'Microlab', 'Microlab', 1),
(11, 'Nokia', 'Nokia Corporation', 1),
(12, 'OPPO', 'OPPO Electronics', 1),
(16, 'Philips ', 'Philips Bangladesh', 1),
(1, 'Samsung', 'Samsung', 1),
(18, 'Sony', 'Sony', 1),
(15, 'Transcend ', 'Transcend Information', 1),
(9, 'UIU', 'United international university', 1),
(19, 'Xiaomi', 'Xiaomi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(60) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `status`) VALUES
(5, 'External Hard Drive', 1),
(9, 'Headphone', 1),
(6, 'Keyboard and Mouse', 1),
(3, 'Laptop', 1),
(1, 'Mobile', 1),
(2, 'Monitor', 1),
(7, 'Speaker', 1),
(4, 'Tablet', 1),
(8, 'Television', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `shipping_location` varchar(200) DEFAULT NULL,
  `billing_method` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `username`, `email`, `password`, `mobile`, `shipping_location`, `billing_method`, `status`) VALUES
(7, 'Sorojit Boiragi', 'boiragi', 'boiragi@gmail.com', '6f300e9391a2d2477397261ec5a5ef32', '0178888666', 'Mohammodpur', 'ukash', 1),
(6, 'Jubayer Joy', 'joy', 'joy@gmail.com', 'c2c8e798aecbc26d86e4805114b03c51', '01745666666', 'Kolabagan', 'bkash', 1),
(2, 'Nasir khan', 'nasir', 'nasir@gmail.com', '78e96b7de2cfaa6d3743781169c32680', '01763433486', 'Dhanmondi', 'Bkash', 1),
(5, 'Tanvir Rahman', 'tanvir', 'tanvir@gmail.com', '5db85fe4d7c285f5b49749b7a411daf6', '01789666666', 'Dhanmondi 15', 'Hand to hand', 1),
(3, 'Tarek Mahmud', 'tarek', 'tarekmahmud@gmail.com', '175076f9a90d14a4823d64c7728610ae', '01722877840', 'Kolabagan', 'DBBL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `active_status` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `products_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `vat` decimal(7,2) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `discount` decimal(7,2) NOT NULL,
  `grand_total` decimal(12,2) NOT NULL,
  `order_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `products_id`, `price`, `quantity`, `subtotal`, `vat`, `total`, `discount`, `grand_total`, `order_status`) VALUES
(1, 'tarek', 16, '54000.00', 1, '54000.00', '8100.00', '62100.00', '0.00', '62100.00', 0),
(2, 'tarek', 16, '54000.00', 1, '54000.00', '8100.00', '62100.00', '0.00', '62100.00', 0),
(5, 'tarek', 19, '9000.00', 1, '9000.00', '1350.00', '10350.00', '0.00', '10350.00', 0),
(6, 'tarek', 18, '10200.00', 1, '10200.00', '1530.00', '11730.00', '0.00', '11730.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_cat` varchar(50) NOT NULL,
  `products_brand` varchar(50) NOT NULL,
  `products_title` varchar(100) NOT NULL,
  `products_price` decimal(10,2) NOT NULL,
  `products_quantity` int(11) NOT NULL,
  `products_desc` text NOT NULL,
  `products_image` varchar(100) NOT NULL,
  `products_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_cat`, `products_brand`, `products_title`, `products_price`, `products_quantity`, `products_desc`, `products_image`, `products_status`) VALUES
(9, 'Mobile', 'Samsung', 'Samsung Galaxy J7 Max', '25900.00', 7, 'Processor\r\nnumber of cores\r\n8 core\r\nSoC\r\nMediatek MT6757 Helio P20\r\nspeed\r\n2.4 GHz Cortex-A53\r\nGPU\r\nMali-T880MP2\r\nCamera\r\nprimary\r\n13 MP AF\r\nsecondary\r\n13 MP AF\r\nBattery\r\ncapacity\r\n3300mAh Li-Ion (non-removeable)\r\nConnectivity\r\nWi-Fi\r\n802.11 a/b/g/n, dual-band, WiFi Direct, hotspot\r\nUSB\r\nmicroUSB 2.0, USB On-The-Go\r\nbluetooth\r\n4.2, A2DP, LE\r\nAudio\r\nradio\r\nOthers\r\nsensors\r\nFingerprint (front-mounted), accelerometer, gyro, proximity, compass, GPS, A-GPS, GLONASS\r\ngeneral\r\n', 'image/2017-08-14-16-27-241R95.jpg', 1),
(10, 'Mobile', 'Apple', 'Apple iPhone 7 Plus 128GB', '79999.00', 23, 'Design\r\nscreen\r\n5.5 \"\r\nWeight\r\n188 gm\r\nMemory\r\nRAM\r\n3 GB\r\nROM\r\n128 GB\r\nProcessor\r\nGPU\r\nPowerVR Series7XT Plus (six-core graphics)\r\nSoC\r\nApple A10 Fusion\r\nspeed\r\n2.34 GHz (2x Hurricane + 2x Zephyr)\r\nnumber of cores\r\n4 core\r\nCamera\r\nprimary\r\nDual 12 MP AF OIS\r\nsecondary\r\n7 MP AF\r\nBattery\r\nTalk Time\r\n21 Hour(3G)\r\ncapacity\r\n2900mAh Li-Ion (non-removeable)\r\nStand By\r\n384 Hour(3G)\r\nConnectivity\r\nWi-Fi\r\n802.11 a/b/g/n/ac, dual-band, hotspot\r\nUSB\r\nv2.0, reversible connector\r\nbluetooth\r\nv4.2, A2DP, LE\r\nSound\r\naudio\r\nMP3, WAV, AAX+, AIFF, Apple Lossless\r\nradio\r\nOthers\r\nsensors\r\nFingerprint (front-mounted), accelerometer, gyro, proximity, compass, barometer, GPS, A-GPS, GLONASS', 'image/2017-08-14-18-16-3918sl.jpg', 1),
(11, 'Mobile', 'Samsung', 'Samsung Galaxy S8', '77900.00', 20, 'Hardware\r\nDesign\r\nscreen\r\n5.8\" super AMOLED 1440x2960 pixels (~570 ppi pixel density)\r\nweight\r\n155 gm\r\nMemory\r\nExpandable\r\n256 GB\r\nRAM\r\n4GB LPDDR4\r\nROM\r\n64 GB\r\nRAM-type\r\nLPDDR4\r\nProcessor\r\nGPU\r\nMali-G71 MP20\r\nSoC\r\nExynos 8895\r\nvariant\r\nUSA version- 2.35GHz Octa-core processor with Adreno 540 GPU on Qualcomm MSM8998 Snapdragon 835 chipset\r\nspeed\r\n42.5 GHz M2 Mongoose + 41.7 GHz Cortex-A53\r\nNumber of Cores\r\n8 core\r\nCamera\r\nprimary\r\n12 MP OIS AF\r\nsecondary\r\n8 MP AF\r\nBattery\r\ncapacity\r\n3000mAh Li-Ion (non-removeable)', 'image/2017-08-17-12-55-251AU9.jpg', 1),
(12, 'Mobile', 'Nokia', 'Nokia 6', '22500.00', 15, 'Software\r\nOS\r\nAndroid N OS 7.1.1\r\nHardware\r\nDesign\r\nscreen\r\n5.5\" IPS LCD 1080 x 1920 pixels (~403 ppi pixel density)\r\nweight\r\n169 gm\r\nMemory\r\nexpandable\r\n256 GB\r\nRAM\r\n3 GB\r\nROM\r\n32 GB\r\nProcessor\r\nGPU\r\nAdreno 505\r\nSoC\r\nQualcomm MSM8937 Snapdragon 430\r\nspeed\r\n1.4 GHz Cortex-A53\r\nnumber of cores\r\n8 core\r\nCamera\r\nprimary\r\n16 MP AF\r\nsecondary\r\n8 MP AF\r\nBattery\r\ncapacity\r\n3000mAh Li-Ion (non-removeable)\r\nConnectivity\r\nWi-Fi\r\n802.11 b/g/n\r\ninternet\r\nUSB\r\nmicroUSB 2.0, USB On-The-Go\r\nbluetooth\r\nYes\r\nAudio\r\nradio\r\nFM\r\nOthers\r\nsensors\r\nFingerprint (front-mounted), accelerometer, gyro, proximity, compass, GPS, A-GPS, GLONASS\r\ngeneral\r\nDolby Atmos sound enhancement, Active noise cancellation with dedicated mic', 'image/2017-08-17-12-57-441A-h.jpg', 1),
(13, 'Mobile', 'OPPO', 'OPPO F3 ', '25990.00', 12, 'Software\r\nOS\r\nAndroid M OS 6.0\r\nHardware\r\nDesign\r\nscreen\r\n5.5\" IPS LCD 1080x1920 pixels (~401 ppi pixel density)\r\nweight\r\n153 gm\r\nMemory\r\nexpandable\r\n256 GB\r\nRAM\r\n4 GB\r\nROM\r\n64 GB\r\nProcessor\r\nGPU\r\nMali-T860MP2\r\nSoC\r\nMediatek MT6750T\r\nspeed\r\n1.5 GHz Cortex-A53\r\nnumber of cores\r\n8 core\r\nCamera\r\nprimary\r\n13 MP AF\r\nsecondary\r\nDual 16 MP + 8 MP AF\r\nBattery\r\ncapacity\r\n3200mAh Li-Ion (non-removeable)\r\nConnectivity\r\nWi-Fi\r\n802.11 a/b/g/n\r\nUSB\r\nv2.0\r\nbluetooth\r\nv4.1\r\nOthers\r\nsensors\r\nFingerprint (front-mounted), accelerometer, proximity, compass', 'image/2017-08-17-12-59-421AY4.jpg', 1),
(16, 'Laptop', 'HP', 'HP 15-AY054TX', '54000.00', 13, 'Intel Core i7 6th Gen. 6500U (2.50-3.10GHz, 4GB DDR4 2133, 1TB) 2GB ATI Radeon R7 M440 , 15.6 Inch White Notebook', 'image/2017-08-17-13-14-202017-03-28.jpg', 1),
(17, 'Laptop', 'Apple', 'Apple Macbook Pro Retina (2015) I', '138000.00', 7, 'Model - Apple Macbook Pro Retina (MF840ZP/A) 2015\r\nProcessor - Intel Core i5\r\nProcessor Clock Speed - 2.70GHz\r\nDisplay Size - 13.3\"\r\nRAM - 8GB\r\nRAM Type - DDR3L\r\nHDD - 256GB SSD', 'image/2017-08-17-13-18-55385573-apple-macbook-pro-13-inch-retina-display-2015-lid.jpg', 1),
(18, 'Tablet', 'Lenovo', 'Lenovo TAB 3', '10200.00', 27, 'Lenovo TAB 3 7-Essential Quad Core (1.30GHz,1GB,16GB) 7\" Black Tablet', 'image/2017-08-17-13-22-09lenovo-tablet-tab3-7-essential-front.png', 1),
(19, 'External Hard Drive', 'Transcend ', 'Transcend TS2TSJ25C3N  ', '9000.00', 40, 'Brand - Transcend\r\nModel - Transcend TS2TSJ25C3N\r\nStorage - 2TB\r\nType - Ultra Slim External HDD\r\nRPM - 5400\r\nBuffer (MB) - 8\r\nFrom Factor (Inch) - 2.5\"\r\nInterface - USB 3.0/USB 2.0\r\nColor - Iron Gray', 'image/2017-08-17-13-27-59transcend_storejet_25c3_2tb_ts2tsj25c3n_images_2021926749.jpg', 1),
(20, 'Monitor', 'Samsung', 'Samsung S19F350 18.5\' LED MONITOR', '6200.00', 25, 'Model - Samsung S19F350 18.5 Inch Wide Screen LED Monitor, Display Size (Inch) - 18.5, Type - LED, Screen Type - Wide Screen, Screen Resolution - 1366 X 768, 60 Hz, Brightness (cd/m2) - 250, Contrast Ratio (TCR/DCR) - Mega DCR,1000:1 Static, Response Time (ms) - 14, TV Card (Built-in) - No, DVI Port - No, VGA Port - Yes, Warranty - 3 (Years).', 'image/2017-09-18-22-29-19Samsung-S19F350-18.5\'-LED-MONITOR-500x500.jpg', 1),
(21, 'Monitor', 'Samsung', 'Samsung S22E390H 21.5\' LED MONITOR', '9700.00', 42, 'Samsung S22E390H 21.5\' LED MONITOR\r\nPixel Pitch (HxV): 0.24825mm(H)x0.24825mm(V) Active Display Size (HxV): 476.64mm(H)x268.11mm(V)\r\nWarranty	3 Years', 'image/2017-09-18-22-31-51Samsung-S22E390H-1-500x500.jpg', 1),
(22, 'Monitor', 'Samsung', 'Samsung C22F390FHW 21.5\' CURVED LED MONITOR', '10200.00', 12, 'Samsung C22F390FHW 21.5\' CURVED LED MONITOR\r\n\r\nFlicker Free	Yes\r\nGame Mode	Yes\r\nImage Size	Yes\r\nWindows Certification	Windows 10\r\nFreeSync	Yes\r\nInterface	Wireless Display	No\r\nD-Sub	1 EA\r\nDVI	No\r\nDual Link DVI	No\r\nDisplay Port	No\r\nWarranty  - 3(Years).', 'image/2017-09-18-22-33-06C22F390FHW-Curved-500x500.jpg', 1),
(23, 'Monitor', 'Philips ', 'Philips 21.5\" Wide AH-IPS', '9600.00', 13, 'LCD panel type AH-IPS LCD\r\nBacklight type W-LED system Panel Size 21.5 inch / 54.6 cm\r\nEffective viewing area : 476.06 (H) x 267.79 (V)\r\nAspect ratio 16:9\r\nOptimum resolution 1920 x 1080 @ 60 Hz\r\nResponse time (typical) 5ms(GtG) \r\nBrightness 250  cd/mÂ² \r\nSmartContrast 20M:1\r\nContrast ratio (typical) 1000:1\r\nPixel pitch 0.248x 0.248 mm \r\nViewing angle 178Âº (H) / 178Âº (V) \r\nDisplay colors 16.7 M Signal Input VGA (Analog ), HDMI & HDMI-MHL', 'image/2017-09-18-22-37-13giant_57028.jpg', 1),
(24, 'Monitor', 'Philips ', 'Philips 19.5\" Wide 206V6QSB6', '10500.00', 16, 'LCD panel type AH-IPS LCD\r\nBacklight type W-LED system Panel Size 21.5 inch / 54.6 cm\r\nEffective viewing area : 476.06 (H) x 267.79 (V)\r\nAspect ratio 16:9\r\nOptimum resolution 1920 x 1080 @ 60 Hz\r\nResponse time (typical) 5ms(GtG) \r\nBrightness 250  cd/mÂ² \r\nSmartContrast 20M:1\r\nContrast ratio (typical) 1000:1\r\nPixel pitch 0.248x 0.248 mm \r\nViewing angle 178Âº (H) / 178Âº (V) \r\nDisplay colors 16.7 M Signal Input VGA (Analog ), HDMI & HDMI-MHL', 'image/2017-09-18-22-39-48227E7QDSB_71-RTP-global-001.jpg', 1),
(25, 'Monitor', 'Acer', 'Acer G226HQL 21.5-Inch Screen LED Monitor', '13400.00', 13, 'The G-Series 23-Inch LED is designed for High-Definition with a stunning 1920 x 1080 resolution.\r\nRapid 5ms response time reduces deviations in transition time to deliver high-quality moving images bringing immersive graphics to your movies and games\r\nACM 100,000,000:1 (600:1),D-Sub, DVI\r\nEnjoy widely available 16:9 HD digital content without image distortion on the expansive widescreen LCD\r\nThis monitor does not have the standard VESA mount screw holes on the back and cannot be mounted\r\nInterfaces /Ports DVI,VGA', 'image/2017-09-18-22-42-5961T8K1CfG7L._SX425_.jpg', 1),
(26, 'Monitor', 'Acer', 'Acer G256HSL 21.5-Inch Screen LED Monitor', '14630.00', 12, 'The G-Series 21.5\" LED is designed for High-Definition with a stunning 1920 x 1080 resolution.\r\nRapid 5ms response time reduces deviations in transition time to deliver high-quality moving images bringing immersive graphics to your movies and games\r\nThe DVI-D input with High-bandwidth Digital Content Protection (HDCP) allows for viewing of digital movies and copy-protected media.\r\nSignal Inputs: 1 x DVI w/HDCP & 1 X VGA.\r\nNo HDMI Ports. VESA mounts sold separately.', 'image/2017-09-18-22-45-3381CqEeikBRL._SL1500_.jpg', 1),
(27, 'Television', 'Samsung', 'Samsung UN65MU8000 65-Inch 4K Ultra HD ', '110000.00', 15, 'An extreme step up in color with a billion more shades than regular 4K UHD.\r\nSee extreme contrast between the darkest darks and the lightest lights, plus expanded color and depth.\r\nSee what youâ€™ve been missing, even in dark scenes.\r\nEnjoy smooth, crisp action, even in the fastest scenes, bringing sports and fast-moving content to life.', 'image/2017-09-18-22-48-0991YyKraZSJL._SL1500_.jpg', 1),
(28, 'Television', 'Samsung', 'Samsung UN65KS9500 Curved 65-Inch', '147000.00', 9, 'The Ultimate Curved 4K SUHD Picture powered by the Quantum Dot Color Drive. Fires off a billion more colors than HD TVs for a lifelike picture unlike anything else\r\nMore than just pitch black, get the best shades of black with Triple Black Technology. Never miss a detail in the dark.\r\nHDR 1000 mirrors the high contrast and vividness the way movie makers intended\r\nAdvanced contrast, color and sharpness for true-to-life image quality with Supreme UHD Dimming\r\nSmart 2016 - Use one universal remote to switch from Live TV to streaming seamlessly. Easily access everything you want to watch.', 'image/2017-09-18-22-51-0291f2b+oH3YL._SL1500_.jpg', 1),
(29, 'Television', 'Sony', 'Sony XBR-49X800E 49-Inch 4K Ultra', '153000.00', 14, 'Dimensions (W x H x D): TV without stand: 43 1/4 x 25 1/4 x 2 1/4 Inch, TV with stand: 43 1/4 x 27 1/4 x 10 Inch\r\nSmart functionality gives you access to your favorite apps and content using Sonyâ€™s Android TV\r\nPairs 4K Ultra HD picture clarity with the contrast, color, and detail of High Dynamic Range (HDR) for the most lifelike picture\r\nEdge-lit LED produces great picture quality with sleek slim design\r\n60Hz native refresh rate plus Motionflow XR gives you great motion for all types of content\r\nInputs: 4 â€“ HDMI, 2 - USB2.0, 1 â€“ USB3.0, 1 â€“ Component/Composite Hybrid, 1 â€“ Composite\r\nModel year: 2017; Screen Size (inch, measured diagonally): 49 (48.5) Inch', 'image/2017-09-18-22-53-0571kj3MtusQL._SL1500_.jpg', 1),
(30, 'Television', 'Sony', 'Sony XBR75Z9D 75-Inch 4K Ultra HD', '198000.00', 11, 'Dimensions (W x H x D): TV without stand: 66.4\" x 38.4\" x 3.1\", TV with stand: 66.4\" x 41.3\" x 11\"\r\nSmart functionality gives you access to your favorite apps and content using Sonyâ€™s Android TV.\r\nPairs 4K Ultra HD picture clarity with the contrast, color, and detail of High Dynamic Range (HDR) for the most lifelike picture.\r\nBacklight Master Drive (Individual LED controlled array) can display an unprecedented dynamic range with near perfect black levels and dazzling brightness.\r\n120Hz native refresh rate plus Motionflow XR gives you fast moving action scenes with virtually no motion blur\r\nInputs: 4 â€“ HDMI, 2 - USB2.0, 1 â€“ USB3.0, 1 â€“ Component/Composite Hybrid, 1 â€“ Composite', 'image/2017-09-18-22-55-1881336QZP62L._SL1500_.jpg', 1),
(31, 'Mobile', 'Samsung', 'Galaxy Note8 - 6.3\" - 6GB RAM', '94000.00', 22, '6.3\" PLS Display\r\nOcta-core (4x2.3 GHz & 4x1.7 GHz) - EMEA\r\n6GB RAM and 64GB ROM\r\nMicroSD Support Up to 256GB\r\n12MP Rear and 8MP Front Camera\r\nDual SIM', 'image/2017-09-18-23-00-201.jpg', 1),
(32, 'Mobile', 'Samsung', 'Samsung Galaxy S8 Plus 6.2\"', '83000.00', 13, '6.2\" Super AMOLED Display\r\nOcta-Core, Quad 2.35GHz + Quad 1.7GHz\r\n4GB RAM and 64GB ROM \r\nMicroSD support Up to 256GB\r\n12MP Rear and 8MP Front Camera\r\nDual Nano SIM', 'image/2017-09-18-23-02-303.jpg', 1),
(33, 'Mobile', 'Samsung', 'Samsung Galaxy C9 Pro 6â€ ', '41000.00', 14, '6.0\" Super AMOLED Display\r\nOcta-core 1.95GHz Processor\r\n6GB RAM and 64GB ROM \r\nMicroSD Support up to 256GB\r\n16MP Rear and 16MP Front Camera\r\nDual SIM\r\nAndroid OS, v6.0.1\r\n4000mAh Battery', 'image/2017-09-18-23-04-071-(1).jpg', 1),
(34, 'Mobile', 'Samsung', 'Samsung Galaxy S7 Edge 32GB - Black', '37500.00', 15, '2.3 Ghz x 4 + 1.6Ghz x 4 Octa Core (Global) Processor\r\n5.5â€ QHD Super AMOLED Display\r\nDual Pixel 12MP Main, 5MP Front Camera\r\nAndroid 6.0.1 (Marshmallow) Operating System\r\n4GB LPDDR4 RAM, 32GB ROM\r\nmicroSD Card support, up to 200GB\r\n3600mAh Battery Capacity', 'image/2017-09-18-23-06-476.jpg', 1),
(35, 'Headphone', 'Apple', 'Apple 7/7 plus Earbuds Headphone', '3500.00', 25, 'Sweat Proof\r\nMicrophone\r\nPlayback Controls\r\nWater Resistant\r\nVolume Control\r\nCalling Functions\r\nConnector(s): 3.5 mm Jack, Lightning Connector\r\nSKU :AP113EL13XREWNAFAMZ\r\nWeight (kg) 0.05\r\nColour White\r\nType Earphone/ Headset', 'image/2017-09-19-04-27-578_original_iphone_7_7pluse_headphone.jpg', 1),
(36, 'Headphone', 'Xiaomi', 'Xiaomi Piston 3 Youth Edition Headphones', '1200.00', 32, 'Mi Piston 3 Youth Edition\r\nStyle: In-Ear\r\nCompatible: xiaomi MI2 MI2S MI2A Mi1S M1 and most android device\r\nconnectors: 3.5 mm', 'image/2017-09-19-04-31-16xiaomi-piston-3-youth-edition-headphones.jpg', 1),
(37, 'Headphone', 'Xiaomi', 'Xiaomi Piston 2 Bass Headphone', '1300.00', 14, 'Style: In-Ear. \r\nConnectors: 3.5mm. \r\nPackage: Yes. \r\nUse: Portable Media Player. \r\nFunction: Microphone. \r\nCommunication: Wired.', 'image/2017-09-19-04-32-330024378_xiaomi-piston-2-bass-earphone-red-bs2038.jpeg', 1),
(38, 'Speaker', 'Microlab', 'Microlab M100 Speaker', '2800.00', 40, 'Warranty: 12 months (*Conditions apply)\r\nGreat sound solution for most of your needs, this 2:1 speaker system brings full audio range to your playback media\r\nOutput power: 10 Watt RMS\r\nPower distribution: 2.5 Watt x 2 + 5 Watt\r\nHarmonic distortion: < 0.5% 1 W 1 kHz\r\nFrequency response: 35 Hz - 20 kHz\r\nSignal/Noise ratio: > 75 dB\r\nSeparation: > 45 dB\r\nColor: Black\r\nQuality 2.1 speaker system with amplifier for producing sound effects in your own room or favorite couch\r\n10 Watt of pure acoustic power with 4\" woofer and 2 x 2.5\" satellites\r\nCompatible: xiaomi MI2 MI2S MI2A Mi1S M1 and most android device\r\nconnectors: 3.5 mm', 'image/2017-09-19-04-42-10m100_1._microlab-m100---2-1-computer-speaker.jpg', 1),
(39, 'Speaker', 'Microlab', 'Microlab M800 Speaker', '2900.00', 31, '2.1 Sound System with USB and Remote\r\nSD Card Port for Unlimited Music\r\n8W Woofer for high sound\r\nStylish design that fits into any space', 'image/2017-09-19-04-43-34m800_13_54fab40e9bcef._microlab-2-1-multimedia-speaker-system-m800-13-.jpg', 1),
(40, 'Speaker', 'Microlab', 'Microlab M800 Speaker', '2900.00', 31, '2.1 Sound System with USB and Remote\r\nSD Card Port for Unlimited Music\r\n8W Woofer for high sound\r\nStylish design that fits into any space', 'image/2017-09-19-04-48-48m800_13_54fab40e9bcef._microlab-2-1-multimedia-speaker-system-m800-13-.jpg', 1),
(41, 'Keyboard and Mouse', 'Logitech ', 'Logitech Keyboard K-120-02', '500.00', 13, 'Comfortable, quiet typing\r\nYouâ€™ll enjoy a comfortable and quiet typing experience thanks to the low-profile keys that barely make a sound and standard layout with full-size F-keys and number pad.\r\nSpill-resistant design*\r\nLiquid drains out of the keyboard, so you donâ€™t have to worry about ruining your investment with accidental spills.\r\nThin profile\r\nThe keyboard has a thin profile that adds a sleek look to your desk while keeping your hands in a more comfortable, neutral position.\r\nDurable keys\"\r\n ', 'image/2017-09-19-04-49-30SKLD0717061.jpg', 1),
(42, 'Keyboard and Mouse', 'Logitech ', 'Logitech Mouse and Keyboard Set X1800', '1500.00', 32, 'RAPOO X1800 Wireless Standard Mouse & Keyboard Set\r\nWireless optical mouse & keyboard\r\n1000 DPI high-definition tracking engine\r\nUp to 12 months battery life\r\nPlug-and-forget NANO receiver\r\nColor: Black\r\n2 Year Warranty', 'image/2017-09-19-04-51-35HTB1vWZUJVXXXXXPXpXXq6xXFXXXY.jpg', 1),
(43, 'Keyboard and Mouse', 'A4tech', 'A4tech G3-270N 2.4G Wireless  Mouse', '700.00', 45, 'Transport: 2.4 G Wireless mouse \r\n\r\nâ€¢ Effective transmission distance: 15 meters\r\n\r\nâ€¢ Ergonomics: Left and right sides is symmetrical design\r\n\r\nâ€¢ Work style: Infrared light needle\r\n\r\nâ€¢ Resolution: The default 1000 DPI (maximum 2000 DPI)\r\n\r\nâ€¢ The report rate: 125/250/500 Hz\r\n\r\nâ€¢ Mouse Weight: 65 g\r\n\r\nâ€¢ Mouse Size: 60 mm * 107 mm * 38 mm\r\n\r\nâ€¢ Suitable for the shape of the hand: Small medium-sized hands\r\n\r\nâ€¢ System supported: Windows XP/Vista / 7/8/10', 'image/2017-09-19-04-53-2761N3wRxg2OL._SX522_.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `ratings` varchar(50) DEFAULT NULL,
  `comments` text,
  `review_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `products_id`, `username`, `ratings`, `comments`, `review_date`) VALUES
(1, 9, 'nasir', '5', 'Wow. This is nice product', '2017-08-17'),
(2, 19, 'tarek', '0', 'Nice Hard drive', '2017-08-17'),
(3, 19, 'tarek', '3', 'This is a good component', '2017-08-17'),
(4, 19, 'tarek', '5', 'What a beautiful things', '2017-08-17'),
(5, 18, 'tarek', '3', 'Lenovo TAB 3 7-Essential Quad Core (1.30GHz,1GB,16GB) 7\" Black Tablet\r\n', '2017-08-17'),
(6, 19, 'tarek', '1', 'dfcsdfdsfcds', '2017-08-28'),
(7, 32, 'tarek', '5', 'Its a nice phone.', '2017-09-18'),
(8, 32, 'joy', '5', 'Wow, great phone.', '2017-09-18'),
(9, 32, 'tanvir', '4', 'Phone is excellent, but the price is too much.', '2017-09-18'),
(10, 32, 'tarek', '4', 'its not fit for me.', '2017-09-18'),
(11, 25, 'tarek', '5', 'Its a nice monitor.', '2017-09-18'),
(12, 41, 'tarek', '3', 'Wow, great .', '2017-09-18'),
(13, 25, 'tanvir', '4', 'the price is too much.', '2017-09-18'),
(14, 32, 'tarek', '3', 'the price is too much.', '2017-09-18'),
(15, 32, 'nasir', '5', 'Wow. This is nice product', '2017-08-17'),
(16, 32, 'joy', '5', 'Wow. This is nice product', '2017-08-17'),
(17, 20, 'tarek', '4', 'its not fit for me.', '2017-09-18'),
(18, 40, 'boiragi', '5', 'What a beautiful things', '2017-08-17'),
(19, 40, 'boiragi', '3', 'What a beautiful things', '2017-08-17'),
(20, 41, 'boiragi', '4', 'What a beautiful things', '2017-08-17'),
(21, 18, 'tarek', '3', 'Nice one', '2017-08-17'),
(22, 18, 'nasir', '5', 'Wow. This is nice product', '2017-08-17'),
(23, 41, 'joy', '4', 'Wow, great .', '2017-09-18'),
(24, 18, 'tarek', '4', 'love it.\r\n', '2017-08-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_name`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_name`),
  ADD UNIQUE KEY `cat_id` (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD UNIQUE KEY `products_id` (`products_id`),
  ADD KEY `products_cat` (`products_cat`),
  ADD KEY `products_brand` (`products_brand`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand` FOREIGN KEY (`products_brand`) REFERENCES `brand` (`brand_name`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_cat` FOREIGN KEY (`products_cat`) REFERENCES `category` (`cat_name`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
