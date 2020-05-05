SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `brand` (
  `ID` int(11) NOT NULL,
  `BrandName` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `brand` (`ID`, `BrandName`) VALUES
(1, 'Acer\r\n'),
(2, 'SteelSeries'),
(3, 'Asus'),
(4, 'BenQ'),
(5, 'Dell'),
(6, 'Fujitsu'),
(7, 'HP'),
(8, 'Huawei'),
(9, 'Lenovo'),
(10, 'LG'),
(11, 'NEC'),
(12, 'Panasonic'),
(13, 'Philips\r\n'),
(14, 'Pioneer'),
(15, 'Razer'),
(16, 'Samsung'),
(17, 'Sony'),
(18, 'Toshiba\r\n'),
(19, 'Intel'),
(20, 'AMD'),
(21, 'Gigabyte'),
(22, 'Kingston'),
(23, 'Western digital'),
(24, 'MSI'),
(25, 'Nvidia'),
(26, 'Apple'),
(27, 'Redragon'),
(28, 'Antec'),
(29, 'Evga'),
(30, 'Corsair'),
(31, 'Asrock'),
(32, 'Crucial'),
(33, 'Zotac'),
(34, 'Seagate'),
(35, 'COOLER MASTER'),
(36, 'NZXT'),
(37, 'BE QUIET!'),
(38, 'Phanteks'),
(39, 'Thermaltake'),
(40, 'Seasonic'),
(41, 'Logitech'),
(42, 'IcyBox'),
(43, 'Microsoft');

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `CategoryName` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `category` (`ID`, `CategoryName`) VALUES
(1, 'Motherboards'),
(2, 'Processor'),
(3, 'RAM'),
(4, 'Graphics card'),
(5, 'Expansion cards'),
(6, 'Hard drives'),
(7, 'Solid state drives'),
(8, 'Optical units'),
(9, 'PC cases'),
(10, 'Power supplies'),
(11, 'Monitors'),
(12, 'Monitor accessories'),
(13, 'Smartphones'),
(14, 'Projectors'),
(15, 'Software'),
(16, 'Laptops'),
(17, 'Mouses'),
(18, 'Keyboards'),
(19, 'Mouse pads'),
(20, 'Speakers'),
(21, 'Headphones'),
(22, 'Microphones');

CREATE TABLE `produkti` (
  `ID` int(11) NOT NULL,
  `Name` text COLLATE utf8_slovenian_ci NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `BrandID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `produkti` (`ID`, `Name`, `CategoryID`, `BrandID`, `Price`, `Rate`, `Stock`) VALUES
(1, 'ASROCK X399 Phantom Gaming 6 TR4 ATX DDR4 RGB', 1, 31, 130, 5, 0),
(2, 'GIGABYTE B450 AORUS ELITE, DDR4, SATA3, USB3.1Gen1, DP, M.2, AM4 ATX', 1, 21, 102, 4, 55),
(3, 'MSI MPG X570 GAMING PLUS, DDR4, SATA3, USB3.2Gen2, AM4 ATX', 1, 24, 190, 5, 56),
(4, 'Intel Core i7 9700K BOX procesor, Coffee Lake', 2, 19, 443, 5, 49),
(5, 'AMD CPU Desktop Ryzen 5 6C/12T 3600 (4.2GHz,36MB,65W,AM4) box with Wraith Stealth cooler', 2, 20, 230, 5, 40),
(6, 'AMD CPU Desktop Ryzen 7 8C/16T 3700X (4.4GHz,36MB,65W,AM4) box with Wraith Prism cooler', 2, 20, 382, 5, 321),
(7, 'Corsair D4 8GB 2400-16 Vengeance LPX rd, pomnilnik', 3, 30, 45, 5, 46),
(8, 'HyperX DIMM 16 GB DDR4-3000 Kit, pomnilnik', 3, 22, 104, 4, 146),
(9, 'RAM DDR3L 2GB PC3-12800 1600MT/s CL11 SR 1.35V Crucial', 3, 32, 17, 3, 360),
(10, 'ASUS Dual Radeon RX 580 OC 8GB GDDR5 (DUAL-RX580-O8G) gaming grafična kartica', 4, 3, 200, 5, 4),
(11, 'ASUS GeForce RTX 2080 Ti DUAL OC 11GB GDDR6 (DUAL-RTX2080TI-O11G) grafična kartica', 4, 3, 1345, 5, 31),
(12, 'GIGABYTE GeForce GTX1650 OC 4GB GDDR5 (GV-N1650OC-4GD) grafična kartica', 4, 21, 183, 4, 4),
(13, 'Asus STRIX SOAR 7.1 zvočna kartica, PCI-E', 5, 3, 80, 3, 4),
(14, 'KINGSTON Data Center DC500 Enterprise (Read-Centric) 960GB 2,5\"\" SATA3 NAND 3D TLC (SEDC500R/960G) SSD', 7, 22, 214, 5, 241),
(15, 'WD Black 1TB 3,5\" SATA3 64MB 7200rpm (WD1003FZEX) trdi disk', 6, 23, 85, 5, 213),
(16, 'WD Blue 6TB 3,5\" SATA3 64MB 5400rpm (WD60EZRZ) trdi disk\r\n', 6, 23, 204, 4, 3),
(17, 'SAMSUNG 860 PRO 2TB 2,5\" SATA3 (MZ-76P2T0B/EU) SSD', 7, 16, 550, 4, 123),
(18, 'Crucial SSD MX500 1TB, 6,35cm, 64-layer 3D NAND, R: 560 MB/s, W: 510 MB/s', 7, 32, 132, 5, 122),
(19, 'Kingston SSD 480GB A400 SATA3 2.5 SSD (7mm height), TBW 160TB, EAN: 740617263442', 7, 22, 75, 5, 412),
(20, 'ASUS DRW-24D5MT 24x DVD-RW zapisovalnik, SATA, črn', 8, 3, 15, 3, 45),
(21, 'LG GH24NSD1 DVD-RW zapisovalnik, SATA, črn', 8, 10, 15, 3, 6),
(22, 'Corsair Obsidian Series 450D Mid Tower Case', 9, 30, 120, 4, 3),
(23, 'BE QUIET! DARK BASE 900 (BG010) midiATX črno/oranžno ohišje', 9, 37, 180, 5, 85),
(24, 'PHANTEKS ECLIPSE P300 TEMPERED GLASS USB3 ATX črno/belo ohišje', 9, 38, 64, 5, 23),
(25, 'Be Quiet! DARK POWER PRO 11 1200W - 80 Plus Platinum, Silent Wings, Cable Management, 5 Years Warranty', 10, 37, 255, 5, 12),
(26, 'CORSAIR AX Series AX1000', 10, 30, 217, 3, 12),
(27, 'BE QUIET! STRAIGHT POWER 11 650W (BN282) 80Plus Gold modularni ATX napajalnik', 10, 37, 117, 4, 123),
(28, 'Apple iPhone 11 (128 GB) - (PRODUCT)RED', 13, 26, 800, 5, 412),
(29, 'Apple iPhone X 64GB Space Gray', 13, 26, 460, 4, 132),
(30, 'Samsung Galaxy M30s Smartphone 64GB 6.4 \"FHD + Android 9 Pie - German Version - Black', 13, 16, 250, 4, 324),
(31, 'Samsung Galaxy S10e smartphone (128 GB internal storage) black', 13, 16, 525, 5, 234),
(32, 'Monitor Philips 272B8QJEB', 11, 13, 230, 4, 31),
(33, 'Philips 243S7EHMB 23,8\" IPS monitor', 11, 13, 150, 5, 132),
(34, 'BENQ BL2780 68,6cm (27\") IPS LCD monitor', 11, 4, 182, 5, 862),
(35, 'BENQ GW2480E 60,45 cm (23,8\") IPS FHD zvočniki LED LCD monitor', 11, 4, 123, 4, 233),
(36, 'IcyBox dvojni namizni nosilec za monitorja do diagonale 27\"\"', 12, 42, 53, 4, 54),
(37, 'IcyBox enojni namizni nosilec za monitor do diagonale 27\"\"', 12, 42, 33, 4, 23),
(38, 'MICROSOFT Windows 10 Home 32/64bit FPP multilanguage slovenski', 15, 43, 130, 4, 423),
(39, 'Microsoft Windows Pro 10 DSP/OEM angleški (FQC-08929) - DVD', 15, 43, 155, 5, 142),
(40, 'Podloga za miško Razer Goliathus Extended Chroma Quartz', 19, 15, 58, 4, 23),
(41, 'HYPERX FURY S PRO Small Gaming HX-MPFS-SM podloga za miško', 19, 22, 10, 5, 123),
(42, 'Podloga za miško ASUS ROG Sheath', 19, 3, 29, 5, 21),
(43, 'Miška Razer Viper Mini', 17, 15, 49, 4, 78),
(44, 'REDRAGON USB gaming miška PEGASUS', 17, 27, 16, 4, 87),
(45, 'Logitech Cordless Laser MX Master Laser Unifying polnilna miška', 17, 41, 78, 5, 67),
(46, 'HYPERX Alloy FPS Pro (HX-KB4BL1-US/WW MX Blue) žična osvetljena črna slo tisk mehanska tipkovnica', 18, 22, 60, 4, 32),
(47, 'Logitech brezžična tipkovnica K350 Wave, Unifying, SLO gravura', 18, 41, 68, 3, 45),
(48, 'LOGITECH G613 brezžična slo tisk mehanska gaming tipkovnica', 18, 41, 134, 4, 65),
(49, 'Intel procesor Core i9 9900K BOX, Coffee Lake', 2, 19, 610, 4, 3);

CREATE TABLE `receipt` (
  `ID` int(11) NOT NULL,
  `BuyerID` int(11) NOT NULL,
  `CrDate` datetime NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `receipt` (`ID`, `BuyerID`, `CrDate`, `price`) VALUES
(155, 7, '2020-04-30 18:32:02', 676),
(156, 7, '2020-04-30 18:33:35', 676),
(157, 7, '2020-04-30 18:52:21', 2021),
(158, 7, '2020-05-02 17:41:05', 313),
(159, 7, '2020-05-02 17:42:24', 102),
(160, 7, '2020-05-02 17:45:01', 102),
(161, 7, '2020-05-02 17:47:48', 102);

CREATE TABLE `receiptproducts` (
  `ID` int(11) NOT NULL,
  `ReceiptID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `PricePerProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `receiptproducts` (`ID`, `ReceiptID`, `ProductID`, `Quantity`, `PricePerProduct`) VALUES
(51, 155, 3, 1, 190),
(52, 155, 6, 1, 382),
(53, 155, 8, 1, 104),
(54, 156, 3, 1, 190),
(55, 156, 6, 1, 382),
(56, 156, 8, 1, 104),
(57, 157, 3, 1, 190),
(58, 157, 6, 1, 382),
(59, 157, 8, 1, 104),
(60, 157, 11, 1, 1345),
(61, 158, 1, 1, 130),
(62, 158, 12, 1, 183),
(63, 159, 2, 1, 102),
(64, 160, 2, 1, 102),
(65, 161, 2, 1, 102);

CREATE TABLE `sessions` (
  `userID` int(11) NOT NULL,
  `sessionID` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `CrDate` datetime NOT NULL,
  `ExDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `sessions` (`userID`, `sessionID`, `CrDate`, `ExDate`) VALUES
(7, '5ead948ea6b9a', '2020-05-02 17:41:02', '2020-05-03 17:41:02');

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_slovenian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

INSERT INTO `users` (`ID`, `username`, `password`, `mail`) VALUES
(7, 'zanoxlr', '$2y$10$lvRj2qen6n5VEzcJB3qFA.NBtqT3iZ4gxZoPfYBwRxVXy5ObP6YuO', 'zanoxlr@gmail.com');


ALTER TABLE `brand`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `produkti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BrandID` (`BrandID`),
  ADD KEY `CategoryID` (`CategoryID`);

ALTER TABLE `receipt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BuyerID` (`BuyerID`);

ALTER TABLE `receiptproducts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ReceiptID` (`ReceiptID`),
  ADD KEY `ProductID` (`ProductID`);

ALTER TABLE `sessions`
  ADD UNIQUE KEY `userID` (`userID`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `receipt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

ALTER TABLE `receiptproducts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `produkti`
  ADD CONSTRAINT `BrandID` FOREIGN KEY (`BrandID`) REFERENCES `brand` (`ID`),
  ADD CONSTRAINT `CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`ID`);

ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`BuyerID`) REFERENCES `users` (`ID`);

ALTER TABLE `receiptproducts`
  ADD CONSTRAINT `receiptproducts_ibfk_1` FOREIGN KEY (`ReceiptID`) REFERENCES `receipt` (`ID`),
  ADD CONSTRAINT `receiptproducts_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `produkti` (`ID`);

ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
