-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2021 at 08:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `di_s370_j9`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tokens`
--

DROP TABLE IF EXISTS `access_tokens`;
CREATE TABLE IF NOT EXISTS `access_tokens` (
  `user_email` varchar(120) NOT NULL,
  `access_token` varchar(64) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `build_layout`
--

DROP TABLE IF EXISTS `build_layout`;
CREATE TABLE IF NOT EXISTS `build_layout` (
  `BLayout_ID` int(4) NOT NULL AUTO_INCREMENT,
  `BLayout_Name` varchar(40) DEFAULT NULL,
  `BLayout_Fields` int(1) NOT NULL DEFAULT 3,
  PRIMARY KEY (`BLayout_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `build_layout`
--

INSERT INTO `build_layout` (`BLayout_ID`, `BLayout_Name`, `BLayout_Fields`) VALUES
(9, 'Default', 3),
(36, 'Mobile', 3);

-- --------------------------------------------------------

--
-- Table structure for table `build_layout_rows`
--

DROP TABLE IF EXISTS `build_layout_rows`;
CREATE TABLE IF NOT EXISTS `build_layout_rows` (
  `BLR_ID` int(6) NOT NULL AUTO_INCREMENT,
  `BLR_Temp_ID` int(4) NOT NULL,
  `BLR_Rows` int(2) NOT NULL,
  `BLR_Cols` int(1) NOT NULL,
  `BLR_Cell` int(1) NOT NULL,
  `BLR_NumFields` int(1) NOT NULL,
  `BLR_Module` varchar(4) NOT NULL,
  `BLR_Style_ID` int(4) NOT NULL,
  `BLR_PaddBottom` varchar(7) NOT NULL DEFAULT '0',
  `BLR_Css` text DEFAULT NULL,
  `BLR_Page_ID` varchar(6) DEFAULT NULL,
  `BLR_Cell_Css` text NOT NULL,
  `BLR_Cell_Style_ID` int(4) DEFAULT NULL,
  `BLR_Cell_ClassItemID` varchar(255) DEFAULT NULL,
  `BLR_Row_Style_ID` int(4) DEFAULT NULL,
  `BLR_Inside_Row_Style_ID` int(4) DEFAULT NULL,
  `BLR_Row_SepDiv` varchar(7) DEFAULT NULL,
  `BLR_Row_PaddBottom` varchar(7) DEFAULT NULL,
  `BLR_Row_Css` text DEFAULT NULL,
  `BLR_Row_Active` int(1) DEFAULT 1,
  `BLR_Temp_Style_ID` int(4) DEFAULT NULL,
  `BLR_Temp_Css` text NOT NULL,
  `BLR_Preview` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`BLR_ID`),
  KEY `BLR_Temp_ID` (`BLR_Temp_ID`),
  KEY `BLR_Rows` (`BLR_Rows`),
  KEY `BLR_Cols` (`BLR_Cols`),
  KEY `BLR_Cell` (`BLR_Cell`)
) ENGINE=MyISAM AUTO_INCREMENT=346 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `build_layout_rows`
--

INSERT INTO `build_layout_rows` (`BLR_ID`, `BLR_Temp_ID`, `BLR_Rows`, `BLR_Cols`, `BLR_Cell`, `BLR_NumFields`, `BLR_Module`, `BLR_Style_ID`, `BLR_PaddBottom`, `BLR_Css`, `BLR_Page_ID`, `BLR_Cell_Css`, `BLR_Cell_Style_ID`, `BLR_Cell_ClassItemID`, `BLR_Row_Style_ID`, `BLR_Inside_Row_Style_ID`, `BLR_Row_SepDiv`, `BLR_Row_PaddBottom`, `BLR_Row_Css`, `BLR_Row_Active`, `BLR_Temp_Style_ID`, `BLR_Temp_Css`, `BLR_Preview`) VALUES
(339, 9, 1, 1, 1, 3, '', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', '', 1, 0, '', 0),
(338, 9, 1, 1, 1, 2, '207', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', '', 1, 0, '', 0),
(337, 9, 1, 1, 1, 1, 'D28', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', '', 1, 0, '', 0),
(229, 36, 1, 1, 1, 1, 'D25', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', 'margin:auto;', 1, 0, '', 0),
(230, 36, 1, 1, 1, 2, '207', 0, '15', '', '', '                                ', 0, '', 0, 0, '', '', 'margin:auto;', 1, 0, '', 0),
(231, 36, 1, 1, 1, 3, '', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', 'margin:auto;', 1, 0, '', 0),
(235, 36, 2, 1, 1, 1, '208', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', 'margin:auto;', 1, 0, '', 0),
(236, 36, 2, 1, 1, 2, 'D27', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', 'margin:auto;', 1, 0, '', 0),
(237, 36, 2, 1, 1, 3, '', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', 'margin:auto;', 1, 0, '', 0),
(340, 9, 2, 1, 1, 1, '208', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', '', 1, 0, '', 0),
(341, 9, 2, 1, 1, 2, '', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', '', 1, 0, '', 0),
(342, 9, 2, 1, 1, 3, '', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', '', 1, 0, '', 0),
(343, 9, 3, 1, 1, 1, 'D29', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', '', 1, 0, '', 0),
(344, 9, 3, 1, 1, 2, '', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', '', 1, 0, '', 0),
(345, 9, 3, 1, 1, 3, '', 0, '0', '', '', '                                ', 0, '', 0, 0, '', '', '', 1, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `checkfiles`
--

DROP TABLE IF EXISTS `checkfiles`;
CREATE TABLE IF NOT EXISTS `checkfiles` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `Date` varchar(40) NOT NULL,
  `Size` varchar(20) DEFAULT NULL,
  `FileName` varchar(80) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

DROP TABLE IF EXISTS `docs`;
CREATE TABLE IF NOT EXISTS `docs` (
  `Doc_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Parent_Doc_ID` int(7) NOT NULL DEFAULT 0,
  `Doc_Rec_ID` int(7) DEFAULT NULL,
  `Doc_Name` varchar(80) DEFAULT NULL,
  `Doc_Title` varchar(255) DEFAULT NULL,
  `Doc_Desc` text DEFAULT NULL,
  `Doc_URL` varchar(255) DEFAULT NULL,
  `Doc_Order` int(5) NOT NULL DEFAULT 999,
  `Doc_Field1` varchar(255) DEFAULT NULL,
  `Doc_Field2` varchar(255) DEFAULT NULL,
  `Doc_Enable` int(1) DEFAULT 1,
  `Doc_Date` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Doc_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 8192 kB; InnoDB free: 8192 kB; InnoDB free: 819';

-- --------------------------------------------------------

--
-- Table structure for table `docs2`
--

DROP TABLE IF EXISTS `docs2`;
CREATE TABLE IF NOT EXISTS `docs2` (
  `Doc_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Parent_Doc_ID` int(7) NOT NULL DEFAULT 0,
  `Doc_Rec_ID` int(7) DEFAULT NULL,
  `Doc_Name` varchar(80) DEFAULT NULL,
  `Doc_Title` varchar(255) DEFAULT NULL,
  `Doc_Desc` text DEFAULT NULL,
  `Doc_URL` varchar(255) DEFAULT NULL,
  `Doc_Order` int(5) NOT NULL DEFAULT 999,
  `Doc_Field1` varchar(255) DEFAULT NULL,
  `Doc_Field2` varchar(255) DEFAULT NULL,
  `Doc_Enable` int(1) DEFAULT 1,
  `Doc_Date` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`Doc_ID`),
  KEY `Parent_Doc_ID` (`Parent_Doc_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 8192 kB; InnoDB free: 8192 kB; InnoDB free: 819';

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_text_href`
--

DROP TABLE IF EXISTS `dynamic_text_href`;
CREATE TABLE IF NOT EXISTS `dynamic_text_href` (
  `DTHref_ID` int(4) NOT NULL AUTO_INCREMENT,
  `DTHref_Temp_Name` varchar(8) NOT NULL DEFAULT 'lists',
  `DTHref_TempID` int(4) NOT NULL,
  `DTHref_TempRecID` int(4) DEFAULT NULL,
  `DTHref_Position` varchar(8) NOT NULL,
  `DTHref_Lang` varchar(2) NOT NULL,
  `DTHref_Title` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`DTHref_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dynamic_text_href`
--

INSERT INTO `dynamic_text_href` (`DTHref_ID`, `DTHref_Temp_Name`, `DTHref_TempID`, `DTHref_TempRecID`, `DTHref_Position`, `DTHref_Lang`, `DTHref_Title`) VALUES
(15, 'lists', 51, 505, '1_2_2', 'en', 'view more'),
(16, 'lists', 54, 535, '3_1_2', 'en', 'view more'),
(17, 'lists', 53, 550, '1_2_2', 'en', 'view more'),
(18, 'lists', 55, 556, '1_2_2', 'en', 'view more'),
(19, 'lists', 57, 569, '1_1_3', 'en', 'view more'),
(20, 'lists', 58, 580, '2_2_2', 'en', 'view more'),
(21, 'lists', 60, 590, '1_2_3', 'en', 'view more'),
(22, 'lists', 61, 598, '1_2_2', 'en', 'view more'),
(23, 'lists', 64, 634, '3_1_2', 'en', 'view more'),
(24, 'lists', 65, 640, '1_2_2', 'en', 'view more');

-- --------------------------------------------------------

--
-- Table structure for table `eshop_availability`
--

DROP TABLE IF EXISTS `eshop_availability`;
CREATE TABLE IF NOT EXISTS `eshop_availability` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Value` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eshop_availability`
--

INSERT INTO `eshop_availability` (`ID`, `Value`) VALUES
(1, 'Άμεση'),
(2, 'Κατόπιν παραγγελίας');

-- --------------------------------------------------------

--
-- Table structure for table `eshop_brand`
--

DROP TABLE IF EXISTS `eshop_brand`;
CREATE TABLE IF NOT EXISTS `eshop_brand` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Value` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_carts`
--

DROP TABLE IF EXISTS `eshop_carts`;
CREATE TABLE IF NOT EXISTS `eshop_carts` (
  `Item_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Order_ID` bigint(20) NOT NULL,
  `Item_Link` varchar(100) NOT NULL,
  `Item_Title` varchar(100) NOT NULL,
  `Item_Price` decimal(10,2) NOT NULL,
  `Item_Doseis` int(3) NOT NULL DEFAULT 1,
  `Item_Amount` int(11) NOT NULL,
  UNIQUE KEY `Item_ID` (`Item_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_categories`
--

DROP TABLE IF EXISTS `eshop_categories`;
CREATE TABLE IF NOT EXISTS `eshop_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Value` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_countries`
--

DROP TABLE IF EXISTS `eshop_countries`;
CREATE TABLE IF NOT EXISTS `eshop_countries` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Region` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eshop_countries`
--

INSERT INTO `eshop_countries` (`ID`, `Region`, `Description`) VALUES
(1, 'Zone1', 'Ζώνη 1'),
(2, 'Zone2', 'Ζώνη 2'),
(3, 'Zone3', 'Ζώνη 3'),
(9, 'Zone4', 'Ζώνη 4'),
(10, 'Zone5', 'Ζώνη 5');

-- --------------------------------------------------------

--
-- Table structure for table `eshop_favourites`
--

DROP TABLE IF EXISTS `eshop_favourites`;
CREATE TABLE IF NOT EXISTS `eshop_favourites` (
  `ID` int(20) NOT NULL,
  `User_ID` bigint(100) NOT NULL,
  `Rec_ID` int(20) NOT NULL,
  `Rec_Link` varchar(200) NOT NULL,
  `Rec_Title` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_fpa`
--

DROP TABLE IF EXISTS `eshop_fpa`;
CREATE TABLE IF NOT EXISTS `eshop_fpa` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Category` varchar(50) NOT NULL,
  `Value` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_orders`
--

DROP TABLE IF EXISTS `eshop_orders`;
CREATE TABLE IF NOT EXISTS `eshop_orders` (
  `Order_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `User_ID` bigint(100) NOT NULL,
  `Order_Cost` decimal(10,2) NOT NULL,
  `Order_Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `Order_Status` varchar(20) NOT NULL DEFAULT 'Σε αναμονή',
  `Order_Voucher` varchar(15) NOT NULL,
  `Order_Comments` varchar(255) DEFAULT NULL,
  `Order_Payment` varchar(20) DEFAULT NULL,
  `Order_Tracking` varchar(50) DEFAULT NULL,
  UNIQUE KEY `Order_ID` (`Order_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_order_status`
--

DROP TABLE IF EXISTS `eshop_order_status`;
CREATE TABLE IF NOT EXISTS `eshop_order_status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eshop_order_status`
--

INSERT INTO `eshop_order_status` (`ID`, `Status`) VALUES
(4, 'Σε αναμονή'),
(5, 'Έχει πληρωθεί'),
(6, 'Έχει σταλεί'),
(7, 'Έχει ακυρωθεί');

-- --------------------------------------------------------

--
-- Table structure for table `eshop_settings`
--

DROP TABLE IF EXISTS `eshop_settings`;
CREATE TABLE IF NOT EXISTS `eshop_settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Discount` varchar(15) NOT NULL DEFAULT '0',
  `Paypal` varchar(50) DEFAULT NULL,
  `Shipment` int(11) DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL,
  `Record_Limit` int(5) NOT NULL DEFAULT 10,
  `Payment_URL` varchar(100) NOT NULL,
  `Contact_Email` varchar(100) NOT NULL,
  `Contact_Name` varchar(200) NOT NULL,
  `Company_Subject` varchar(200) NOT NULL,
  `Customer_Subject` varchar(200) NOT NULL,
  `Order_Message` varchar(255) DEFAULT NULL,
  `Payment` varchar(20) DEFAULT 'paypal',
  `Stock` varchar(10) DEFAULT 'no',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_stats_categories`
--

DROP TABLE IF EXISTS `eshop_stats_categories`;
CREATE TABLE IF NOT EXISTS `eshop_stats_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(50) NOT NULL,
  `Orders_Value` int(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Category` (`Category`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eshop_stats_categories`
--

INSERT INTO `eshop_stats_categories` (`ID`, `Category`, `Orders_Value`) VALUES
(4, '0', 249),
(5, 'Κατηγορία 1', 198),
(6, '', 1155);

-- --------------------------------------------------------

--
-- Table structure for table `eshop_stats_customers`
--

DROP TABLE IF EXISTS `eshop_stats_customers`;
CREATE TABLE IF NOT EXISTS `eshop_stats_customers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_ID` bigint(100) NOT NULL,
  `Orders_Value` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_stats_favourites`
--

DROP TABLE IF EXISTS `eshop_stats_favourites`;
CREATE TABLE IF NOT EXISTS `eshop_stats_favourites` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Rec_ID` varchar(10) NOT NULL,
  `Item_Link` varchar(50) NOT NULL,
  `Item_Title` varchar(50) NOT NULL,
  `Item_Amount` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_stats_items`
--

DROP TABLE IF EXISTS `eshop_stats_items`;
CREATE TABLE IF NOT EXISTS `eshop_stats_items` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Item_Link` varchar(100) NOT NULL,
  `Item_Title` varchar(50) NOT NULL,
  `Item_Amount` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_stats_locations`
--

DROP TABLE IF EXISTS `eshop_stats_locations`;
CREATE TABLE IF NOT EXISTS `eshop_stats_locations` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Location` varchar(10) NOT NULL,
  `Orders_Value` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Location` (`Location`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_stats_months`
--

DROP TABLE IF EXISTS `eshop_stats_months`;
CREATE TABLE IF NOT EXISTS `eshop_stats_months` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Month` varchar(10) NOT NULL,
  `Orders_Value` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Month` (`Month`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_stats_suppliers`
--

DROP TABLE IF EXISTS `eshop_stats_suppliers`;
CREATE TABLE IF NOT EXISTS `eshop_stats_suppliers` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Supplier` varchar(100) NOT NULL,
  `Orders_Value` bigint(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Supplier` (`Supplier`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_suppliers`
--

DROP TABLE IF EXISTS `eshop_suppliers`;
CREATE TABLE IF NOT EXISTS `eshop_suppliers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Value` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eshop_translation`
--

DROP TABLE IF EXISTS `eshop_translation`;
CREATE TABLE IF NOT EXISTS `eshop_translation` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Lang` varchar(5) NOT NULL,
  `Product` varchar(20) NOT NULL,
  `Amount` varchar(50) NOT NULL,
  `Unit_price` varchar(50) NOT NULL,
  `Remove` varchar(50) NOT NULL,
  `Cash` varchar(50) NOT NULL,
  `Installments` varchar(50) NOT NULL,
  `Installments_cost` varchar(50) NOT NULL,
  `Cost_sum` varchar(50) NOT NULL,
  `Submit_changes` varchar(50) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `AFM` varchar(50) NOT NULL,
  `DOY` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Town` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Postal_code` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Order_cost` varchar(50) NOT NULL,
  `Payment_terms` varchar(50) NOT NULL,
  `Comments` varchar(50) NOT NULL,
  `Products` varchar(50) NOT NULL,
  `Creditcard_pay` varchar(50) NOT NULL,
  `Transfer` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eshop_translation`
--

INSERT INTO `eshop_translation` (`ID`, `Lang`, `Product`, `Amount`, `Unit_price`, `Remove`, `Cash`, `Installments`, `Installments_cost`, `Cost_sum`, `Submit_changes`, `Company`, `AFM`, `DOY`, `Name`, `Address`, `Town`, `Area`, `Postal_code`, `Phone`, `Order_cost`, `Payment_terms`, `Comments`, `Products`, `Creditcard_pay`, `Transfer`) VALUES
(1, 'EL', 'Προϊόν', 'Ποσότητα', 'Τιμή μονάδας', 'Αφαίρεση', 'Τρόπος πληρωμής: Σε μία δόση των', 'Το προϊόν θα πληρωθεί σε ', 'δόσεις των', 'Κόστος προϊόντων', 'Ενημέρωση καλαθιού', 'Εταιρία: ', 'ΑΦΜ: ', 'ΔΟΥ: ', 'Όνομα: ', 'Διεύθυνση: ', 'Πόλη: ', 'Περιοχή: ', 'Ταχυδρομικός κώδικας: ', 'Τηλέφωνο: ', 'Κόστος παραγγελίας: ', 'Τρόπος πληρωμής: ', 'Σχόλια: ', 'Προϊόντα: ', 'Πληρωμή μέσω κάρτας', 'Μεταφορικά'),
(2, 'EN', 'Product', 'Amount', 'Unit Price', 'Remove', 'The product will be payied in cash', 'The product will be payied in ', 'installments of ', 'Products cost', 'Submit Changes', 'Company: ', 'AFM: ', 'Fiscall agency: ', 'Name: ', 'Address: ', 'Town: ', 'Area: ', 'Postal code: ', 'Phone: ', 'Order cost: ', 'Payment terms: ', 'Comments: ', 'Products: ', 'Pay through Credit Card: ', 'Transfer cost: ');

-- --------------------------------------------------------

--
-- Table structure for table `eshop_transport`
--

DROP TABLE IF EXISTS `eshop_transport`;
CREATE TABLE IF NOT EXISTS `eshop_transport` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Weight` decimal(4,2) NOT NULL,
  `Zone1` decimal(6,2) NOT NULL,
  `Zone2` decimal(6,2) NOT NULL,
  `Zone3` decimal(6,2) NOT NULL,
  `Zone4` decimal(6,2) NOT NULL,
  `Zone5` decimal(6,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

DROP TABLE IF EXISTS `fonts`;
CREATE TABLE IF NOT EXISTS `fonts` (
  `Font_ID` int(4) NOT NULL AUTO_INCREMENT,
  `Font_Title` varchar(35) DEFAULT NULL,
  `Font_Family` varchar(255) DEFAULT NULL,
  `Font_Name` varchar(100) DEFAULT NULL,
  `Font_Langs` varchar(80) DEFAULT NULL,
  `Font_Size` varchar(5) NOT NULL DEFAULT '12px',
  `Font_SizeMob` varchar(5) NOT NULL DEFAULT '12px',
  `Default_Font` int(1) NOT NULL DEFAULT 0,
  `Default_FontMob` int(1) NOT NULL DEFAULT 0,
  `Google_Font` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Font_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`Font_ID`, `Font_Title`, `Font_Family`, `Font_Name`, `Font_Langs`, `Font_Size`, `Font_SizeMob`, `Default_Font`, `Default_FontMob`, `Google_Font`) VALUES
(4, 'Verdana', 'Verdana', 'Verdana, Arial, Helvetica, sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(23, 'Ubuntu', 'Ubuntu:300,400,500', 'Ubuntu, sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(6, 'Trebuchet', 'Trebuchet MS', 'Trebuchet MS, Helvetica, sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(7, 'Tahoma', 'Tahoma', 'Tahoma,Verdana,Segoe,sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(8, 'Calibri', 'Calibri', 'Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;', 'el,en', '15px', '14px', 0, 0, 0),
(9, 'Roboto', 'Roboto:300,400,500', 'Roboto, sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(17, 'Roboto Condensed', 'Roboto+Condensed:300,400,700', 'Roboto Condensed, sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(18, 'OpenSans', 'Open+Sans:300,400,600,700', 'Open Sans, sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(24, 'Ubuntu Condensed', 'Ubuntu+Condensed', 'Ubuntu Condensed, sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(21, 'OpenSans Condensed', 'Open+Sans+Condensed:300,700', 'Open Sans Condensed, sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(26, 'Lato', 'Lato:300,400,700', 'Lato, sans-serif', 'el,en', '15px', '14px', 0, 0, 0),
(28, 'Raleway', 'Raleway:800', 'Raleway, sans-serif', 'en,el', '15px', '14px', 0, 0, 0),
(29, 'PT Sans', 'PT+Sans:400,700', 'PT Sans, sans-serif', 'el,en', '15px', '15px', 1, 1, 1),
(30, 'PT Sans Narrow', 'PT+Sans+Narrow:400,700', 'PT Sans Narrow, sans-serif', 'en,el', '15px', '15px', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `Img_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Img_Cat_ID` int(7) DEFAULT NULL,
  `Img_Num` int(7) DEFAULT NULL,
  `Img_Ext` varchar(52) DEFAULT NULL,
  `Img_FileName` varchar(40) DEFAULT NULL,
  `Img_Order` int(5) DEFAULT 999,
  `Img_Scroll` varchar(100) DEFAULT NULL,
  `Img_MarginTop` int(3) DEFAULT NULL,
  `Img_Enable` int(1) DEFAULT 1,
  PRIMARY KEY (`Img_ID`),
  KEY `Img_Cat_ID` (`Img_Cat_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`Img_ID`, `Img_Cat_ID`, `Img_Num`, `Img_Ext`, `Img_FileName`, `Img_Order`, `Img_Scroll`, `Img_MarginTop`, `Img_Enable`) VALUES
(73, 23, 0, '2021/03/john-fornander-gz-w1h-xfny-unsplash_8309.jpg', NULL, 1, NULL, NULL, 1),
(74, 23, 0, '2021/03/mak-gppdkecny7o-unsplash_9501.jpg', NULL, 2, NULL, NULL, 1),
(78, 23, 0, '2021/03/sf_5511.jpg', NULL, 6, NULL, NULL, 1),
(76, 23, 0, '2021/03/shutterstock_625789103_3535.jpg', NULL, 4, NULL, NULL, 1),
(77, 23, 0, '2021/03/sorin-popa-xaxvkp0tdwu-unsplash_2351.jpg', NULL, 5, NULL, NULL, 1),
(79, 24, 0, '2021/03/john-fornander-gz-w1h-xfny-unsplash_3521.jpg', NULL, 1, NULL, NULL, 1),
(80, 24, 0, '2021/03/mak-gppdkecny7o-unsplash_9969.jpg', NULL, 2, NULL, NULL, 1),
(81, 24, 0, '2021/03/sdf_3522.jpg', NULL, 3, NULL, NULL, 1),
(82, 24, 0, '2021/03/shutterstock_625789103_7137.jpg', NULL, 4, NULL, NULL, 1),
(83, 24, 0, '2021/03/sorin-popa-xaxvkp0tdwu-unsplash_9605.jpg', NULL, 5, NULL, NULL, 1),
(84, 25, 0, '2021/03/mak-gppdkecny7o-unsplash_5136.jpg', NULL, 1, NULL, NULL, 1),
(85, 25, 0, '2021/03/shutterstock_625789103_8072.jpg', NULL, 2, NULL, NULL, 1),
(86, 25, 0, '2021/03/sorin-popa-xaxvkp0tdwu-unsplash_6027.jpg', NULL, 3, NULL, NULL, 1),
(87, 25, 0, '2021/03/andres-medecigo-1346125-unsplash_9758.jpg', NULL, 4, NULL, NULL, 1),
(88, 25, 0, '2021/03/spinaloga_5986_5767.jpg', NULL, 5, NULL, NULL, 1),
(89, 26, 0, '2021/03/shutterstock_625789103_3122.jpg', NULL, 1, NULL, NULL, 1),
(90, 26, 0, '2021/03/dsc_0097_2580.jpg', NULL, 2, NULL, NULL, 1),
(91, 26, 0, '2021/03/shutterstock_404449798_8242.jpg', NULL, 3, NULL, NULL, 1),
(92, 26, 0, '2021/03/shutterstock_296585981_8152.jpg', NULL, 4, NULL, NULL, 1),
(94, 26, 0, '2021/03/dsc_0103_7290.jpg', NULL, 5, NULL, NULL, 1),
(95, 27, 0, '2021/03/shutterstock_404449798_7380.jpg', NULL, 1, NULL, NULL, 1),
(96, 27, 0, '2021/03/shutterstock_559914589_7874.jpg', NULL, 2, NULL, NULL, 1),
(97, 27, 0, '2021/03/shutterstock_1255583338_9462.jpg', NULL, 3, NULL, NULL, 1),
(98, 27, 0, '2021/03/staging-2816464_1920_3682.jpg', NULL, 4, NULL, NULL, 1),
(99, 27, 0, '2021/03/bigstock--217511356_4219.jpg', NULL, 5, NULL, NULL, 1),
(102, 27, 0, '2021/03/shutterstock_260354102_6945.jpg', NULL, 8, NULL, NULL, 1),
(101, 27, 0, '2021/03/asdf_5306.jpg', NULL, 7, NULL, NULL, 1),
(103, 27, 0, '2021/03/shutterstock_296585981_8676.jpg', NULL, 9, NULL, NULL, 1),
(104, 27, 0, '2021/03/shutterstock_319418540_9858.jpg', NULL, 10, NULL, NULL, 1),
(105, 28, 0, '2021/03/shutterstock_404449798_6210.jpg', NULL, 7, NULL, NULL, 1),
(106, 28, 0, '2021/03/shutterstock_559914589_9756.jpg', NULL, 8, NULL, NULL, 1),
(107, 28, 0, '2021/03/shutterstock_1255583338_7182.jpg', NULL, 9, NULL, NULL, 1),
(108, 28, 0, '2021/03/staging-2816464_1920_2003.jpg', NULL, 3, NULL, NULL, 1),
(109, 28, 0, '2021/03/asdf_6322.jpg', NULL, 2, NULL, NULL, 1),
(110, 28, 0, '2021/03/bigstock--217511356_9031.jpg', NULL, 10, NULL, NULL, 1),
(111, 28, 0, '2021/03/shutterstock_47822167_2096.jpg', NULL, 4, NULL, NULL, 1),
(112, 28, 0, '2021/03/shutterstock_260354102_1551.jpg', NULL, 1, NULL, NULL, 1),
(113, 28, 0, '2021/03/shutterstock_296585981_9904.jpg', NULL, 5, NULL, NULL, 1),
(114, 28, 0, '2021/03/shutterstock_319418540_2834.jpg', NULL, 6, NULL, NULL, 1),
(115, 29, 0, '2021/03/shutterstock_404449798_2659.jpg', NULL, 1, NULL, NULL, 1),
(116, 29, 0, '2021/03/shutterstock_559914589_8426.jpg', NULL, 2, NULL, NULL, 1),
(117, 29, 0, '2021/03/shutterstock_1255583338_3378.jpg', NULL, 3, NULL, NULL, 1),
(118, 29, 0, '2021/03/staging-2816464_1920_4746.jpg', NULL, 4, NULL, NULL, 1),
(119, 29, 0, '2021/03/asdf_1657.jpg', NULL, 5, NULL, NULL, 1),
(120, 29, 0, '2021/03/bigstock--217511356_7432.jpg', NULL, 6, NULL, NULL, 1),
(121, 29, 0, '2021/03/shutterstock_47822167_3614.jpg', NULL, 7, NULL, NULL, 1),
(122, 29, 0, '2021/03/shutterstock_260354102_9426.jpg', NULL, 8, NULL, NULL, 1),
(123, 29, 0, '2021/03/shutterstock_296585981_4562.jpg', NULL, 9, NULL, NULL, 1),
(124, 29, 0, '2021/03/shutterstock_319418540_1617.jpg', NULL, 10, NULL, NULL, 1),
(125, 30, 0, '2021/03/shutterstock_404449798_9522.jpg', NULL, 1, NULL, NULL, 1),
(126, 30, 0, '2021/03/shutterstock_559914589_3175.jpg', NULL, 7, NULL, NULL, 1),
(127, 30, 0, '2021/03/shutterstock_1255583338_7243.jpg', NULL, 3, NULL, NULL, 1),
(128, 30, 0, '2021/03/staging-2816464_1920_5680.jpg', NULL, 4, NULL, NULL, 1),
(129, 30, 0, '2021/03/asdf_8705.jpg', NULL, 5, NULL, NULL, 1),
(130, 30, 0, '2021/03/bigstock--217511356_8415.jpg', NULL, 6, NULL, NULL, 1),
(131, 30, 0, '2021/03/shutterstock_47822167_3955.jpg', NULL, 8, NULL, NULL, 1),
(132, 30, 0, '2021/03/shutterstock_260354102_8007.jpg', NULL, 9, NULL, NULL, 1),
(133, 30, 0, '2021/03/shutterstock_296585981_2925.jpg', NULL, 10, NULL, NULL, 1),
(134, 30, 0, '2021/03/shutterstock_319418540_8630.jpg', NULL, 2, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images_text`
--

DROP TABLE IF EXISTS `images_text`;
CREATE TABLE IF NOT EXISTS `images_text` (
  `ImgT_ID` int(7) NOT NULL AUTO_INCREMENT,
  `ImgT_ImgID` varchar(7) NOT NULL,
  `ImgT_Lang` varchar(2) NOT NULL,
  `ImgT_Name` varchar(120) DEFAULT NULL,
  `ImgT_Field1` varchar(255) DEFAULT NULL,
  `ImgT_Field2` varchar(255) DEFAULT NULL,
  `ImgT_Field3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ImgT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images_text`
--

INSERT INTO `images_text` (`ImgT_ID`, `ImgT_ImgID`, `ImgT_Lang`, `ImgT_Name`, `ImgT_Field1`, `ImgT_Field2`, `ImgT_Field3`) VALUES
(72, '73', 'en', NULL, NULL, NULL, NULL),
(73, '74', 'en', NULL, NULL, NULL, NULL),
(77, '78', 'en', NULL, NULL, NULL, NULL),
(75, '76', 'en', NULL, NULL, NULL, NULL),
(76, '77', 'en', NULL, NULL, NULL, NULL),
(78, '79', 'en', NULL, NULL, NULL, NULL),
(79, '80', 'en', NULL, NULL, NULL, NULL),
(80, '81', 'en', NULL, NULL, NULL, NULL),
(81, '82', 'en', NULL, NULL, NULL, NULL),
(82, '83', 'en', NULL, NULL, NULL, NULL),
(83, '84', 'en', NULL, NULL, NULL, NULL),
(84, '85', 'en', NULL, NULL, NULL, NULL),
(85, '86', 'en', NULL, NULL, NULL, NULL),
(86, '87', 'en', NULL, NULL, NULL, NULL),
(87, '88', 'en', NULL, NULL, NULL, NULL),
(88, '89', 'en', NULL, NULL, NULL, NULL),
(89, '90', 'en', NULL, NULL, NULL, NULL),
(90, '91', 'en', NULL, NULL, NULL, NULL),
(91, '92', 'en', NULL, NULL, NULL, NULL),
(93, '94', 'en', NULL, NULL, NULL, NULL),
(94, '95', 'en', NULL, NULL, NULL, NULL),
(95, '96', 'en', NULL, NULL, NULL, NULL),
(96, '97', 'en', NULL, NULL, NULL, NULL),
(97, '98', 'en', NULL, NULL, NULL, NULL),
(98, '99', 'en', NULL, NULL, NULL, NULL),
(101, '102', 'en', NULL, NULL, NULL, NULL),
(100, '101', 'en', NULL, NULL, NULL, NULL),
(102, '103', 'en', NULL, NULL, NULL, NULL),
(103, '104', 'en', NULL, NULL, NULL, NULL),
(104, '105', 'en', NULL, NULL, NULL, NULL),
(105, '106', 'en', NULL, NULL, NULL, NULL),
(106, '107', 'en', NULL, NULL, NULL, NULL),
(107, '108', 'en', NULL, NULL, NULL, NULL),
(108, '109', 'en', NULL, NULL, NULL, NULL),
(109, '110', 'en', NULL, NULL, NULL, NULL),
(110, '111', 'en', NULL, NULL, NULL, NULL),
(111, '112', 'en', NULL, NULL, NULL, NULL),
(112, '113', 'en', NULL, NULL, NULL, NULL),
(113, '114', 'en', NULL, NULL, NULL, NULL),
(114, '115', 'en', NULL, NULL, NULL, NULL),
(115, '116', 'en', NULL, NULL, NULL, NULL),
(116, '117', 'en', NULL, NULL, NULL, NULL),
(117, '118', 'en', NULL, NULL, NULL, NULL),
(118, '119', 'en', NULL, NULL, NULL, NULL),
(119, '120', 'en', NULL, NULL, NULL, NULL),
(120, '121', 'en', NULL, NULL, NULL, NULL),
(121, '122', 'en', NULL, NULL, NULL, NULL),
(122, '123', 'en', NULL, NULL, NULL, NULL),
(123, '124', 'en', NULL, NULL, NULL, NULL),
(124, '125', 'en', NULL, NULL, NULL, NULL),
(125, '126', 'en', NULL, NULL, NULL, NULL),
(126, '127', 'en', NULL, NULL, NULL, NULL),
(127, '128', 'en', NULL, NULL, NULL, NULL),
(128, '129', 'en', NULL, NULL, NULL, NULL),
(129, '130', 'en', NULL, NULL, NULL, NULL),
(130, '131', 'en', NULL, NULL, NULL, NULL),
(131, '132', 'en', NULL, NULL, NULL, NULL),
(132, '133', 'en', NULL, NULL, NULL, NULL),
(133, '134', 'en', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `img_category`
--

DROP TABLE IF EXISTS `img_category`;
CREATE TABLE IF NOT EXISTS `img_category` (
  `Img_Cat_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Img_Cat_Section` varchar(30) NOT NULL DEFAULT 'general',
  `Img_Cat_HeaderID` int(7) NOT NULL DEFAULT 0,
  `Img_Page_HeaderID` int(6) DEFAULT NULL,
  `Img_Rat_Table` int(1) NOT NULL DEFAULT 0,
  `Img_Cat_Title` varchar(80) NOT NULL DEFAULT '',
  `Img_Cat_Desc` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`Img_Cat_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `img_category`
--

INSERT INTO `img_category` (`Img_Cat_ID`, `Img_Cat_Section`, `Img_Cat_HeaderID`, `Img_Page_HeaderID`, `Img_Rat_Table`, `Img_Cat_Title`, `Img_Cat_Desc`) VALUES
(23, 'general', 0, 0, 0, 'Sea Side Restaurant', ''),
(24, 'general', 0, 0, 0, 'Blue Restaurant', ''),
(25, 'general', 0, 0, 0, 'Instagram', ''),
(26, 'general', 0, 0, 0, 'THE HOTEL', ''),
(27, 'general', 0, 180, 0, 'SUPERIOR DOUBLE ROOM', ''),
(28, 'general', 0, 180, 0, 'PREMIUM SUITE', ''),
(29, 'general', 0, 180, 0, 'EXCLUSIVE SUITE', ''),
(30, 'general', 0, 180, 0, 'FAMILY ROOM', '');

-- --------------------------------------------------------

--
-- Table structure for table `img_dimensions`
--

DROP TABLE IF EXISTS `img_dimensions`;
CREATE TABLE IF NOT EXISTS `img_dimensions` (
  `ImgDim_ID` int(7) NOT NULL AUTO_INCREMENT,
  `ImgDim_Name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ImgDim_Width` int(4) DEFAULT NULL,
  `ImgDim_Height` int(4) DEFAULT NULL,
  `ImgDim_Breakpoint` int(4) DEFAULT NULL,
  `ImgDim_Active` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ImgDim_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img_dimensions`
--

INSERT INTO `img_dimensions` (`ImgDim_ID`, `ImgDim_Name`, `ImgDim_Width`, `ImgDim_Height`, `ImgDim_Breakpoint`, `ImgDim_Active`) VALUES
(1, '2048', 2048, 1200, 1980, 1),
(2, '1920', 1920, 1080, 1780, 1),
(3, '1600', 1600, 1080, 1540, 1),
(4, '1440', 1440, 1080, 1400, 1),
(5, '1366', 1366, 1080, 1330, 1),
(6, '1280', 1280, 1080, 1160, 1),
(7, '1024', 1024, 1024, 940, 1),
(8, '835', 835, 835, 805, 1),
(9, '768', 768, 768, 690, 1),
(10, '600', 600, 600, 510, 1),
(11, '414', 414, 414, 395, 1),
(12, '375', 375, 375, 290, 1),
(13, '200', 200, 200, 175, 1),
(14, '150', 150, 150, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `incom_keys`
--

DROP TABLE IF EXISTS `incom_keys`;
CREATE TABLE IF NOT EXISTS `incom_keys` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Plugin_Name` varchar(50) DEFAULT NULL,
  `Plugin_Key` varchar(50) DEFAULT NULL,
  `RenameString` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `incom_keys`
--

INSERT INTO `incom_keys` (`ID`, `Plugin_Name`, `Plugin_Key`, `RenameString`) VALUES
(1, 'incom', '46977344a09255602e3ce4edf4ebfb89dbc7707e', '8dkYZG');

-- --------------------------------------------------------

--
-- Table structure for table `javascripts`
--

DROP TABLE IF EXISTS `javascripts`;
CREATE TABLE IF NOT EXISTS `javascripts` (
  `JS_ID` int(5) NOT NULL AUTO_INCREMENT,
  `JS_Title` varchar(40) NOT NULL,
  `JS_Desc` varchar(255) DEFAULT NULL,
  `JS_Src` text NOT NULL,
  `JS_Script` text NOT NULL,
  `JS_Active` varchar(20) NOT NULL DEFAULT 'NoActive',
  `JS_Mobile_Active` varchar(20) NOT NULL DEFAULT 'NoActive',
  `JS_Script_Position` varchar(20) NOT NULL,
  `JS_Script_Position_Mobile` varchar(20) NOT NULL,
  `JS_Minify_Exclude` int(1) NOT NULL DEFAULT 0,
  `JS_Order` int(2) NOT NULL DEFAULT 99,
  PRIMARY KEY (`JS_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `javascripts`
--

INSERT INTO `javascripts` (`JS_ID`, `JS_Title`, `JS_Desc`, `JS_Src`, `JS_Script`, `JS_Active`, `JS_Mobile_Active`, `JS_Script_Position`, `JS_Script_Position_Mobile`, `JS_Minify_Exclude`, `JS_Order`) VALUES
(73, 'Sticky Master', '', '', '<script type=\"text/javascript\">\r\n$(document).ready(function() {\r\n    var el = $(\'.menuCont\');\r\n    var el2 = $(\'.nav2\');\r\n    var stickyNavTop = el.first().offset().top;\r\n    var stickyNav = function(){\r\n        var scrollTop = $(window).scrollTop(); \r\n\r\n        if (scrollTop > stickyNavTop) {\r\n            el.first().addClass(\'sticky\');\r\n           el2.first().addClass(\'sticky2\');\r\n        } else {\r\n            el.first().removeClass(\'sticky\');\r\n            el2.first().removeClass(\'sticky2\');\r\n        }\r\n    }\r\n\r\n    stickyNav();\r\n\r\n    $(window).scroll(function() {\r\n        stickyNav();\r\n    })\r\n});\r\n</script>\r\n', 'Active', 'Active', 'BeforeBodyClose', 'BeforeBodyClose', 0, 99),
(74, 'Back to Top', '', '', '<script type=\"text/javascript\">\r\n $(window).load(function() {\r\n $(window).scroll(function() {\r\n if($(this).scrollTop() > 100) {\r\n $(\'#toTop\').stop().fadeIn(); \r\n } else {\r\n $(\'#toTop\').stop().fadeOut();\r\n }\r\n });\r\n \r\n $( \'<a href=\"#\" id=\"toTop\" class=\"toTopButton\" style=\"display:none\"><i class=\"fas fa-chevron-up\"></i></a>\' ).appendTo( \"body\" );\r\n\r\n $(\"#toTop\").click(function(e) {\r\n e.preventDefault();\r\n $(\'body,html\').animate({scrollTop:0},600);\r\n });\r\n });\r\n</script>\r\n', 'Active', 'Active', 'BeforeBodyClose', 'BeforeBodyClose', 0, 99),
(48, 'Optimize Code', 'On top of all scripts', '<link rel=\"preload\" href=\"elements/icons/fonts/Font-Awesome.ttf\" as=\"font\" crossorigin=\"anonymous\">\r\n', '', 'Active', 'Active', '', '', 1, 3),
(16, 'Googleapis 2.2.2', '', '<script type=\"text/javascript\" src=\"library/javascripts/jquery/jquery.2.2.2.js\"></script>', '', 'Active', 'Active', '', '', 1, 5),
(52, 'Favicon', '', '', '', 'Active', 'Active', '', '', 0, 2),
(32, 'Google Analytics', '', '', '<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXX-X\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'UA-ΧΧΧΧΧΧΧΧ-Χ\');\r\n</script>\r\n', 'NoActive', 'NoActive', 'BeforeBodyClose', 'BeforeBodyClose', 1, 998),
(76, 'Video On Header', '', '<script src=\"//cdnjs.cloudflare.com/ajax/libs/fitvids/1.2.0/jquery.fitvids.min.js\"></script>\r\n<script src=\"//www.youtube.com/iframe_api\"></script>\r\n', '<style>\r\n.video-background {background: #000;position: absolute;top: 0; right: 0; bottom: 0; left: 0;z-index: -99;height:100vh;} .video-foreground,.video-background iframe {position: absolute;top: 0;left: 0;width: 100%;height: 100%;pointer-events: none;}#vidtop-content {top: 0;color: #fff;}@media (min-aspect-ratio: 16/9) { .video-foreground { height: 300%; top: -100%; }}@media (max-aspect-ratio: 16/9) {.video-foreground { width: 300%; left: -100%; }}@media all and (max-width: 600px) {.vid-info { width: 50%; padding: .5rem; }.vid-info h1 { margin-bottom: .2rem; }}@media all and (max-width: 500px) {.vid-info .acronym { display: none; }}\r\n</style>\r\n', 'NoActive', 'NoActive', 'BeforeBodyClose', 'BeforeBodyClose', 0, 99),
(70, 'Font Awesome', 'font icons', '<link rel=\"stylesheet\" href=\"/elements/icons/style.css\"/>', '', 'Active', 'Active', '', '', 0, 99),
(71, 'BxSlider', '', '<link href=\"library/javascripts/bx-slider/jquery.bxslider.css\" rel=\"stylesheet\" />\r\n<script type=\"text/javascript\" src=\"library/javascripts/bx-slider/jquery.bxslider.js\"></script>\r\n', '', 'Active', 'Active', '', '', 0, 99),
(72, 'Photo Gallery', 'Fancybox', '<script type=\"text/javascript\" src=\"library/photos/fancybox3/dist/jquery.fancybox.min.js\"></script>\r\n<link rel=\"stylesheet\" href=\"library/photos/fancybox3/dist/jquery.fancybox.min.css\" type=\"text/css\" media=\"screen\" />', '<script type=\"text/javascript\">\r\n$(document).ready(function() {\r\n $(\".fancybox\").fancybox({\r\n toolbar : true,\r\n buttons : [\'share\', \'zoom\', \'slideShow\', \'thumbs\', \'close\'],\r\n thumbs: {\r\n autoStart: true,\r\n axis: \'x\'\r\n },\r\n });\r\n});\r\n</script>\r\n<style>\r\n .fancybox-thumbs {\r\n top: auto;\r\n width: auto;\r\n bottom: 0;\r\n left: 0;\r\n right : 0;\r\n height: 95px;\r\n padding: 10px 10px 5px 10px;\r\n box-sizing: border-box;\r\n background: rgba(0, 0, 0, 0.3);\r\n }\r\n \r\n .fancybox-show-thumbs .fancybox-inner {\r\n right: 0;\r\n bottom: 95px;\r\n }\r\n .fancybox-thumbs__list a:before{\r\n border: 3px solid #f9f9f9;\r\n }\r\n</style>\r\n', 'Active', 'Active', 'BeforeBodyClose', 'BeforeBodyClose', 0, 99),
(47, 'Adaptive Images', 'must be on top of all js', '', '<script>document.cookie=\'resolution=\'+Math.max(screen.width,screen.height)+\'; path=/\';</script>\r\n', 'NoActive', 'NoActive', 'BeforeBodyClose', 'BeforeBodyClose', 0, 4),
(75, 'Optimize Inline', '', '', '', 'NoActive', 'NoActive', '', '', 0, 1),
(77, 'LazyLoad', 'Lazysizes js', '<script type=\"text/javascript\" src=\"library/javascripts/lazyload/lazysizes.min.js\"></script>\r\n', '', 'Active', 'Active', '', '', 1, 999),
(78, 'Hotel Price Widget', '', '<link href=\"library/lists/hotel_price_widget/hotel_price_widget.css\" rel=\"stylesheet\" />\r\n<script type=\"text/javascript\" src=\"library/lists/hotel_price_widget/hotel_price_widget.js\"></script>\r\n', '', 'NoActive', 'NoActive', 'BeforeBodyClose', 'BeforeBodyClose', 0, 99),
(79, 'Cookies', '', '', '<link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css\" />\r\n<script src=\"//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js\"></script>\r\n<script>\r\nwindow.addEventListener(\"load\", function(){\r\nwindow.cookieconsent.initialise({\r\n  \"palette\": {\r\n    \"popup\": {\r\n      \"background\": \"#fafafa\",\r\n      \"text\": \"#000000\"\r\n    },\r\n    \"button\": {\r\n      \"background\": \"#818181\",\r\n      \"text\": \"#ffffff\"\r\n    }\r\n  },\r\n  \"theme\": \"classic\",\r\n  \"position\": \"bottom-left\",\r\n  \"content\": {\r\n    \"message\": \"We use cookies to ensure the best experience on our website. By continuing without changing your cookie settings, you agree to our privacy policy.\",\r\n    \"href\": \"//www./privacy-policy/\"\r\n  }\r\n})});\r\n</script>\r\n', 'NoActive', 'NoActive', 'BeforeBodyClose', 'BeforeBodyClose', 1, 999),
(80, 'Scroll Buttons Home', 'Anchor links', '', '<script type=\"text/javascript\">\r\n	$(document).ready(function(){\r\n	    $(\"a.scroll\").click(function(e){\r\n	    e.preventDefault();\r\n	    $(\"body, html\").animate({scrollTop:$(this).offset().top}, 500);\r\n	})\r\n	})\r\n</script>', 'NoActive', 'NoActive', 'BeforeBodyClose', 'BeforeBodyClose', 0, 99),
(81, 'Image Responsive Parallax', 'stellar js', '<script type=\"text/javascript\" src=\"library/photos/stellarjs/jquery.stellar.min.js\"></script>\r\n', '', 'NoActive', 'NoActive', 'BeforeBodyClose', 'BeforeBodyClose', 0, 99),
(82, 'WOW Animate Css', '', '<link href=\"library/javascripts/animate-css/animate.min.css\" rel=\"stylesheet\" /><script type=\"text/javascript\" src=\"library/javascripts/animate-css/wow.min.js\"></script>\r\n', '<script type=\"text/javascript\">\r\n				var wow = new WOW(\r\n  				{\r\n    				boxClass:     \'wow\',      // animated element css class (default is wow)\r\n    				animateClass: \'animated\', // animation css class (default is animated)\r\n   				 offset:       100,          // distance to the element when triggering the animation (default is 0)\r\n    				mobile:       false        // trigger animations on mobile devices (true is default)\r\n  				}\r\n				);\r\n				wow.init();\r\n		</script>', 'NoActive', 'NoActive', 'BeforeBodyClose', 'BeforeBodyClose', 0, 99);

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

DROP TABLE IF EXISTS `lang`;
CREATE TABLE IF NOT EXISTS `lang` (
  `Lang_ID` int(5) NOT NULL AUTO_INCREMENT,
  `Lang_Title` varchar(2) NOT NULL DEFAULT '',
  `Lang_Desc` varchar(25) DEFAULT NULL,
  `Lang_Order` int(2) DEFAULT NULL,
  `Lang_Pic` varchar(10) DEFAULT NULL,
  `Lang_Start` int(1) NOT NULL DEFAULT 0,
  `Lang_XML_Export` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Lang_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`Lang_ID`, `Lang_Title`, `Lang_Desc`, `Lang_Order`, `Lang_Pic`, `Lang_Start`, `Lang_XML_Export`) VALUES
(17, 'el', 'EL', 2, 'EL.gif', 0, 0),
(1, 'en', 'EN', 0, 'EN.gif', 1, 1),
(18, 'it', 'IT', 99, 'IT.gif', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `layout_styles`
--

DROP TABLE IF EXISTS `layout_styles`;
CREATE TABLE IF NOT EXISTS `layout_styles` (
  `Style_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Style_Global` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Style_Name` varchar(40) NOT NULL DEFAULT 'New Style Set',
  `Style_Order` int(2) DEFAULT 99,
  `Style_Media_Title` varchar(140) DEFAULT NULL,
  `Back_Color` varchar(6) DEFAULT NULL,
  `Global_Back_Color1` varchar(6) DEFAULT NULL,
  `Global_Back_Color2` varchar(6) DEFAULT NULL,
  `Global_Back_Color3` varchar(6) DEFAULT NULL,
  `Global_Back_Color4` varchar(6) DEFAULT NULL,
  `Global_Back_Color5` varchar(6) DEFAULT NULL,
  `Back_ColorMob` varchar(6) DEFAULT NULL,
  `Back_Image` varchar(20) DEFAULT NULL,
  `Fit_Screen` int(1) NOT NULL DEFAULT 0,
  `Back_css_Div` text DEFAULT NULL,
  `Back_Href` varchar(255) DEFAULT NULL,
  `Back_Repeat` varchar(20) NOT NULL,
  `Font_Style` int(4) NOT NULL DEFAULT 0,
  `Body_Text` varchar(6) NOT NULL DEFAULT '000',
  `Global_Text_Color1` varchar(6) DEFAULT NULL,
  `Global_Text_Color2` varchar(6) DEFAULT NULL,
  `Global_Text_Color3` varchar(6) DEFAULT NULL,
  `Global_Text_Color4` varchar(6) DEFAULT NULL,
  `Global_Text_Color5` varchar(6) DEFAULT NULL,
  `Body_TextMob` varchar(6) NOT NULL DEFAULT '000',
  `Body_Font_Weight` varchar(10) NOT NULL DEFAULT 'normal',
  `Body_Font_WeightMob` varchar(10) NOT NULL DEFAULT 'normal',
  `Body_Line_Height` int(2) DEFAULT NULL,
  `Body_Line_HeightMob` int(2) NOT NULL DEFAULT 26,
  `Menu_Type` int(4) DEFAULT NULL,
  `Style_DateStart` date DEFAULT NULL,
  `Style_DateStop` date DEFAULT NULL,
  PRIMARY KEY (`Style_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `layout_styles`
--

INSERT INTO `layout_styles` (`Style_ID`, `Style_Global`, `Style_Name`, `Style_Order`, `Style_Media_Title`, `Back_Color`, `Global_Back_Color1`, `Global_Back_Color2`, `Global_Back_Color3`, `Global_Back_Color4`, `Global_Back_Color5`, `Back_ColorMob`, `Back_Image`, `Fit_Screen`, `Back_css_Div`, `Back_Href`, `Back_Repeat`, `Font_Style`, `Body_Text`, `Global_Text_Color1`, `Global_Text_Color2`, `Global_Text_Color3`, `Global_Text_Color4`, `Global_Text_Color5`, `Body_TextMob`, `Body_Font_Weight`, `Body_Font_WeightMob`, `Body_Line_Height`, `Body_Line_HeightMob`, `Menu_Type`, `Style_DateStart`, `Style_DateStop`) VALUES
(1, 1, 'Default', 1, '', '', 'eeeeee', 'ffffff', '000000', '676767', '', '', '', 0, '', '', 'repeat-x', 0, '000000', '000000', '676767', '', '', '', '000000', '400', '400', 27, 27, 209, '0000-00-00', '0000-00-00'),
(10, 0, 'media 680', 95, '@media (max-width: 680px)', '', NULL, NULL, NULL, NULL, NULL, '', NULL, 0, '', '', 'repeat', 0, '000', NULL, NULL, NULL, NULL, NULL, '000', 'normal', 'normal', 13, 26, 132, '0000-00-00', '0000-00-00'),
(11, 0, 'media 768', 91, '@media (max-width: 768px)', '', '', '', '', '', '', '', NULL, 0, '', '', 'repeat', 0, '000', '', '', '', '', '', '000', '400', '400', 13, 26, 132, '0000-00-00', '0000-00-00'),
(13, 0, 'media 1280', 85, '@media (max-width: 1280px)', '', NULL, NULL, NULL, NULL, NULL, '', NULL, 0, '', '', 'repeat', 0, '000', NULL, NULL, NULL, NULL, NULL, '000', 'normal', 'normal', 13, 26, 132, '0000-00-00', '0000-00-00'),
(14, 0, 'media 1366', 70, '@media (max-width: 1366px)', '', '', '', '', '', '', '', NULL, 0, '', '', 'repeat', 0, '000000', '', '', '', '', '', '000000', 'normal', 'normal', 13, 26, 0, '0000-00-00', '0000-00-00'),
(15, 0, 'media 1024', 90, '@media (max-width: 1024px)', '', '', '', '', '', '', '', NULL, 0, NULL, NULL, '', 0, '000', '', '', '', '', '', '000', '400', '400', 13, 26, NULL, NULL, NULL),
(16, 0, 'media 1600', 60, '@media (max-width: 1600px)', '', '', '', '', '', '', '', NULL, 0, NULL, NULL, '', 0, '000', '', '', '', '', '', '000', '400', '400', 13, 26, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `link_ID` int(7) NOT NULL AUTO_INCREMENT,
  `link_HeaderCat` int(5) NOT NULL DEFAULT 1,
  `link_Name` varchar(150) NOT NULL DEFAULT 'New Link',
  `link_Font` int(4) DEFAULT NULL,
  `link_Font_Size` varchar(6) NOT NULL,
  `link_Font_LineHeight` varchar(6) DEFAULT NULL,
  `link_Color` varchar(6) DEFAULT NULL,
  `link_Global_Color` int(1) NOT NULL DEFAULT 0,
  `link_RColor` varchar(6) DEFAULT NULL,
  `hover_Global_Color` int(1) NOT NULL DEFAULT 0,
  `Link_Weight` varchar(7) NOT NULL DEFAULT 'normal',
  `Link_Style` varchar(100) NOT NULL DEFAULT 'normal',
  `link_RUnderline` varchar(12) NOT NULL DEFAULT 'none',
  `link_BackColor` varchar(6) DEFAULT NULL,
  `link_Global_Back` int(1) NOT NULL DEFAULT 0,
  `link_BackRColor` varchar(6) DEFAULT NULL,
  `link_GlobalR_Back` int(1) NOT NULL DEFAULT 0,
  `link_DIV` text DEFAULT NULL,
  `link_DIVRO` text DEFAULT NULL,
  `link_ButDIV` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `link_Hover` text DEFAULT NULL,
  `link_Before` text DEFAULT NULL,
  `link_After` text DEFAULT NULL,
  `link_Hover_Before` text DEFAULT NULL,
  `link_Hover_After` text DEFAULT NULL,
  `link_Image` varchar(30) DEFAULT NULL,
  `link_RImage` varchar(30) DEFAULT NULL,
  `link_BackRepeat` varchar(20) NOT NULL DEFAULT 'repeat',
  `link_Lang` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`link_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`link_ID`, `link_HeaderCat`, `link_Name`, `link_Font`, `link_Font_Size`, `link_Font_LineHeight`, `link_Color`, `link_Global_Color`, `link_RColor`, `hover_Global_Color`, `Link_Weight`, `Link_Style`, `link_RUnderline`, `link_BackColor`, `link_Global_Back`, `link_BackRColor`, `link_GlobalR_Back`, `link_DIV`, `link_DIVRO`, `link_ButDIV`, `link_Hover`, `link_Before`, `link_After`, `link_Hover_Before`, `link_Hover_After`, `link_Image`, `link_RImage`, `link_BackRepeat`, `link_Lang`) VALUES
(1, 1, 'bodylinks', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'color:inherit;', '', 0, NULL, '', '', '', '', '', '', 'repeat', '0'),
(4, 1, 'lang', 29, '14', '', '000000', 1, '676767', 2, '700', '', '', '', 0, '', 0, 'padding:0 7px;position:relative;', '', 0, NULL, '', 'content:\"\";height:1em;position:absolute;top:50%;right:-1px;transform:translate(0, -50%);border-right:1px solid [$C1];', '', '', '', '', 'repeat', '0'),
(5, 1, 'rootMenu', 0, '15', '', '000000', 1, '676767', 2, '400', '', '', '', 0, '', 0, 'display:inline-block;padding:5px 10px;position:relative;margin: 0 2px;width:100%;text-align:center;', '', 0, NULL, '', '', '', '', '', '', 'repeat', '0'),
(6, 1, 'subMenu', 0, '12', '', '0d333a', 0, 'fff', 0, '400', '', '', '', 0, '', 0, 'display:block;letter-spacing:0px;', '', 0, NULL, '', '', '', '', '', '', 'no-repeat', '0'),
(7, 1, 'rootMenuSel', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'font-weight:bold;', '', 0, NULL, '', '', '', '', '', '', 'repeat', '0'),
(8, 1, 'subMenuSel', 0, '12', '', '444444', 0, '', 0, '400', '', '', '', 0, '', 0, 'letter-spacing:0px;', '', 0, NULL, '', '', '', '', '', '', 'no-repeat', '0'),
(119, 1, '*', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, '}a{-webkit-transition: all .3s cubic-bezier(0,.5,3,1);\r\n    -moz-transition: all .3s cubic-bezier(0,.5,.3,1);\r\n    -o-transition: all .3s cubic-bezier(0,.5,.3,1);\r\n    transition: all .3s cubic-bezier(0,.5,.3,1);letter-spacing:0px;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(14, 1, 'footerLinks', 0, '16', '', '000000', 1, '676767', 2, '300', 'normal', 'none', '', 0, '', 0, '', '', 0, NULL, '', '', '', '', '', '', 'repeat', '0'),
(17, 1, 'toplinks', 0, '13', '', '000000', 1, '676767', 2, '400', '', '', '', 0, '', 0, '', '', 0, NULL, '', '', '', '', '', '', 'repeat', '0'),
(25, 1, 'usefulLinks', 0, '18', '', '000000', 1, '676767', 2, '300', 'normal', 'none', '', 0, '', 0, 'display:block;', '', 0, NULL, '', '', '', '', '', '', 'repeat', '0'),
(28, 1, 'langSel', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'color:[$C2];', '', 0, NULL, '', '', '', '', '', '', 'repeat', '0'),
(31, 1, 'botaddresslinks', 0, '12', NULL, '000', 0, 'fff', 0, 'normal', 'normal', 'none', NULL, 0, NULL, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(44, 1, 'intSubMenu', 0, '14px', NULL, '777777', 0, '7D4F4F', 0, 'normal', 'normal', 'none', '', 0, '', 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(45, 1, 'intSubMenuSel', 0, '14px', NULL, '7D4F4F', 0, '7D4F4F', 0, 'normal', 'normal', 'none', '', 0, '', 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, '', '', 'repeat', '0'),
(64, 1, 'toTopButton', 0, '20', '37', 'ffffff', 0, 'ffffff', 0, '400', '', '', '000000', 3, '676767', 4, 'display: block; width: 40px; height: 40px; position: fixed; z-index:99; bottom: 30px; right: 30px;border-radius:50%;text-align:center;', '', 0, NULL, '', '', '', '', NULL, NULL, 'no-repeat', '0'),
(49, 10, 'footerLinks', 0, '', '', '', 0, '', 0, 'normal', 'normal', 'none', '', 0, '', 0, '', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(59, 10, 'rootMenu', 0, '15px', '', '000', 0, '000', 0, 'normal', 'normal', 'none', '', 0, '', 0, 'display:block; padding-left:20px; line-height:38px; height:38px; width:100%;', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(60, 10, 'rootMenuSel', 0, '15px', '', '000000', 1, '676767', 2, '700', '', '', '', 0, '', 0, 'display:block; padding-left:20px; line-height:38px; height:38px; width:100%;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(66, 1, 'bookNow', 30, '21', '', '000000', 1, '676767', 2, '700', '', '', '', 0, '', 0, 'padding: 8px 20px;\r\ndisplay: inline-block;\r\nvertical-align: middle;text-align:center;', '', 0, NULL, '', 'content:\"backslashf073\";font-family:\'Font-Awesome\';font-size:0.8em;margin-left:7px;margin-top: -5px; display: inline-block;vertical-align: middle;', '', '', NULL, NULL, 'repeat', '0'),
(67, 1, 'bookNowMobile', 0, '16', '18', 'ffffff', 0, 'ffffff', 0, '700', '', '', '000000', 3, '676767', 4, 'padding:5px 10px; display:block;text-align:center;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(68, 1, 'offersbutton', 0, '24', '', 'ffffff', 0, 'ffffff', 0, 'bold', 'normal', 'none', 'ae8c33', 0, '656565', 0, 'padding:0px 20px;', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(70, 1, 'toplinksSel', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, '', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(71, 1, 'blogMenu', 0, '18', '', 'ffffff', 0, 'ffffff', 0, '300', 'normal', 'none', 'cccccc', 0, '2a9bce', 0, 'display: block;', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no-repeat', '0'),
(72, 1, 'blogMenuSel', 0, '18', '', 'ffffff', 0, 'ffffff', 0, '300', '', '', '2a9bce', 0, '2a9bce', 0, 'display: block;', '', 0, NULL, '', '', '', '', '', '', 'no-repeat', '0'),
(73, 1, 'blogLinkMenu', 0, '17', '', '000000', 1, '676767', 2, '400', '', '', '', 0, '', 0, '', '', 0, NULL, '', '', '', '', NULL, NULL, 'no-repeat', '0'),
(74, 1, 'blogLinkMenuSel', 0, '17', '', '676767', 2, '676767', 2, '400', '', 'underline', '', 0, '', 0, '', '', 0, NULL, '', '', '', '', '', '', 'no-repeat', '0'),
(75, 1, 'callNow', 0, '19', '32', '000000', 1, '676767', 2, '400', '', '', '', 0, '', 0, 'display:block;', '', 0, '', 'content:\"backslashf879\";\r\nfont-family: Font-Awesome;\r\ncolor: [$C1];\r\nfont-size: 20px;\r\nwidth: 36px;\r\ndisplay: block;\r\nmargin: auto;\r\nmargin-top: 6px;\r\ntext-align: center;\r\nline-height: 36px;\r\nborder-radius: 50%;\r\nborder: 2px solid [$C1];', '', '', '', NULL, NULL, 'repeat', '0'),
(77, 1, 'googlePin', 0, '30', '32', '000000', 1, '676767', 2, '400', '', '', '', 0, '', 0, 'display:block;', '', 0, NULL, 'content:\"backslashf3c5\";\r\nfont-family: \"Font-Awesome\";\r\ncolor: [$C1];\r\nfont-size: 34px;\r\nwidth: 36px;\r\ndisplay: block;\r\nmargin: auto;\r\nmargin-top: 6px;\r\ntext-align: center;\r\nline-height: 36px;', '', '', '', NULL, NULL, 'repeat', '0'),
(79, 1, 'header-next', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'text-decoration:none; position:absolute;margin:auto;top:35%;right:15px;z-index:53;opacity:0;width:30px;height:120px;display:block;', '', 0, NULL, '', '', '', '', '79.png', '79_rim.png', 'no-repeat', '0'),
(80, 1, 'header-prev', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'text-decoration:none; position:absolute;margin:auto;top:35%;left:15px;z-index:53;opacity:0;width:30px;height:120px;display:block;', '', 0, NULL, '', '', '', '', '80.png', '80_rim.png', 'no-repeat', '0'),
(81, 1, 'hpBookNow', 0, '20', '', 'ffffff', 0, 'cb5252', 0, '400', 'normal', 'none', 'cb5252', 0, 'ffffff', 0, 'text-align: center;border: 2px solid #cb5252;display:table;margin: auto;width: 100%;padding:6px 0px;', '', 0, '', '', '', '', '', NULL, NULL, 'repeat', '0'),
(82, 10, 'hotelPrice-buttonWrapper', 0, '12', '', 'ffffff', 0, 'ffffff', 0, 'normal', 'normal', 'none', '50b3f1', 0, '50b3f1', 0, 'line-height: normal;text-align:center;width:50px;border-radius: 50%;padding:18px 11px;display:table;position: fixed;cursor: pointer;bottom:80px;right: 5px;z-index: 999;-moz-box-shadow: 0 3px 10px 0 #3d3d3d;-webkit-box-shadow: 0 3px 10px 0 #3d3d3d;box-shadow: 0 3px 10px 0 #3d3d3d;', '', 0, '', '', '', '', '', NULL, NULL, 'repeat', '0'),
(83, 1, 'logo', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'display:block;line-height:0;max-width:200px;margin:auto;margin: 0 auto 0;\r\nposition: relative;\r\nz-index: 60;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(84, 1, 'lang:last-child', 0, '', '', '', 0, '', 0, 'normal', 'normal', 'none', '', 0, '', 0, '', '', 0, NULL, '', 'content:none;', '', '', NULL, NULL, 'repeat', '0'),
(85, 1, 'bookSmall', 0, '14', '', '000000', 0, '676767', 2, '500', '', '', 'ffffff', 2, '', 0, 'display:inline-block;padding-bottom:7px;border-bottom:1px solid;position:relative;margin:0 30px;text-align:center;', '', 0, NULL, 'content:\"\";position:absolute;bottom:0;right:0;left:0;background:[$BG1];height:0px;-webkit-transition: all .3s cubic-bezier(0,.5,3,1);\r\n    -moz-transition: all .3s cubic-bezier(0,.5,.3,1);\r\n    -o-transition: all .3s cubic-bezier(0,.5,.3,1);\r\n    transition: all .3s cubic-bezier(0,.5,.3,1);', 'content:\"backslashf073\";font-family:\'Font-Awesome\';font-size:0.9em;margin-left:7px;', 'height:4px;', '', NULL, NULL, 'repeat', '0'),
(86, 1, 'more', 0, '14', '', '000000', 1, '676767', 2, '500', '', '', '', 0, '', 0, 'display:inline-block;padding-left:80px;padding-bottom:7px;border-bottom:1px solid;position:relative;letter-spacing:1px;text-align:center;', '', 0, NULL, '', 'content:\"\";position:absolute;bottom:0;right:0;left:0;background:[$BG1];height:0px;-webkit-transition: all .3s cubic-bezier(0,.5,3,1);\r\n    -moz-transition: all .3s cubic-bezier(0,.5,.3,1);\r\n    -o-transition: all .3s cubic-bezier(0,.5,.3,1);\r\n    transition: all .3s cubic-bezier(0,.5,.3,1);', '', 'height:4px;', NULL, NULL, 'repeat', '0'),
(94, 1, 'social', 0, '30', '', '000000', 1, '676767', 2, '400', '', '', '', 0, '', 0, 'padding:0 5px;margin:0 5px;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(95, 1, 'subcats-prev', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position: absolute;\r\ntop: 50%;\r\ndisplay: block;\r\nleft: -45px;\r\ntransform: translate(0,-50%);\r\nwidth: 18px;\r\nheight: 52px;', '', 0, NULL, '', '', '', '', '95_R8298.png', NULL, 'no-repeat', '0'),
(96, 1, 'subcats-next', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position: absolute;\r\ntop: 50%;\r\ndisplay: block;\r\nright: -45px;\r\ntransform: translate(0,-50%);\r\nwidth: 18px;\r\nheight: 52px;', '', 0, NULL, '', '', '', '', '96_R7548.png', NULL, 'no-repeat', '0'),
(97, 1, 'simpleLink', 0, '', '', '', 0, '', 0, 'normal', 'normal', 'none', '', 0, '', 0, 'color:inherit;font:inherit;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(112, 10, 'bookSmall', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'font-size: 15px;margin:0 20px 0 0;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(113, 10, 'more', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'padding-left:60px;letter-spacing:0px;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(121, 1, 'acc-prev', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position:absolute;top:50%;display:block;left:-45px;transform:translate(0,-50%);width:18px;height:52px;', 'left:-50px;', 0, NULL, '', '', '', '', '121_R3206.png', NULL, 'repeat', '0'),
(122, 1, 'acc-next', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position:absolute;top:50%;display:block;right:-45px;transform:translate(0,-50%);width:18px;height:52px;', 'right:-50px;', 0, NULL, '', '', '', '', '122_R5919.png', NULL, 'repeat', '0'),
(123, 1, 'rest-next', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position:absolute;top:50%;display:block;right:-45px;transform:translate(0,-50%);width:18px;height:52px;', 'right:-50px;', 0, NULL, '', '', '', '', '123_R2266.png', NULL, 'repeat', '0'),
(124, 1, 'rest-prev', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position:absolute;top:50%;display:block;left:-45px;transform:translate(0,-50%);width:18px;height:52px;', 'left:-50px;', 0, NULL, '', '', '', '', '124_R1124.png', NULL, 'repeat', '0'),
(125, 1, 'explore-next', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position:absolute;top:50%;display:block;right:-45px;transform:translate(0,-50%);width:18px;height:52px;', 'right:-50px;', 0, NULL, '', '', '', '', '125_R2414.png', NULL, 'repeat', '0'),
(126, 1, 'explore-prev', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position:absolute;top:50%;display:block;left:-45px;transform:translate(0,-50%);width:18px;height:52px;', 'left:-50px;', 0, NULL, '', '', '', '', '126_R2077.png', NULL, 'repeat', '0'),
(127, 1, 'exp-prev', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position:absolute;top:50%;display:block;left:-45px;transform:translate(0,-50%);width:18px;height:52px;', 'left:-50px;', 0, NULL, '', '', '', '', '127_R5515.png', NULL, 'no-repeat', '0'),
(130, 16, 'blogLinkMenu', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'font-size: 15px;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(129, 1, 'exp-next', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'position:absolute;top:50%;display:block;right:-45px;transform:translate(0,-50%);width:18px;height:52px;', 'right:-50px;', 0, NULL, '', '', '', '', '129_R5169.png', NULL, 'repeat', '0'),
(131, 16, 'blogLinkMenuSel', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'font-size:15px;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(132, 10, 'social', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'font-size:24px;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(133, 10, 'logo', 0, '', '', '', 0, '', 0, '400', '', '', '', 0, '', 0, 'margin: 0 auto 0;', '', 0, NULL, '', '', '', '', NULL, NULL, 'repeat', '0'),
(134, 1, 'wow fadeIn social socialFooter  animated', NULL, '', NULL, NULL, 0, NULL, 0, 'normal', 'normal', 'none', NULL, 0, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(135, 1, 'download', 0, '42', '', '000000', 1, '676767', 2, '400', '', '', '', 0, '', 0, 'display:block;height:60px;background-position:center;text-align:center;', '', 0, NULL, '', '', '', '', '135_R3952.png', NULL, 'no-repeat', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists` (
  `List_ID` int(7) NOT NULL AUTO_INCREMENT,
  `List_Name` varchar(50) DEFAULT NULL,
  `List_Active` int(1) NOT NULL DEFAULT 1,
  `List_RecPage` varchar(30) DEFAULT NULL,
  `List_Title` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `List_Title_Order` int(4) NOT NULL DEFAULT 1,
  `List_Title_Meta` varchar(30) DEFAULT NULL,
  `List_Title_Meta_Order` int(4) NOT NULL DEFAULT 999,
  `List_Desc` varchar(30) DEFAULT NULL,
  `List_Desc_Order` int(4) NOT NULL DEFAULT 2,
  `List_Desc_Meta` varchar(30) DEFAULT NULL,
  `List_Desc_Meta_Order` int(4) NOT NULL DEFAULT 999,
  `List_ShowHome` varchar(30) DEFAULT NULL,
  `List_ShowHome_Order` int(4) NOT NULL DEFAULT 4,
  `List_HomeRotator` varchar(30) DEFAULT NULL,
  `List_HomeRotator_Order` int(4) NOT NULL DEFAULT 5,
  `List_Rec_ShowMore` varchar(30) DEFAULT NULL,
  `List_Rec_ShowMore_Order` int(4) NOT NULL DEFAULT 6,
  `List_Order` varchar(30) DEFAULT NULL,
  `List_Order_Order` int(4) NOT NULL DEFAULT 3,
  `List_TextArea1` varchar(30) DEFAULT NULL,
  `List_TextArea1_Order` int(4) NOT NULL DEFAULT 7,
  `List_TextArea2` varchar(30) DEFAULT NULL,
  `List_TextArea2_Order` int(4) NOT NULL DEFAULT 8,
  `List_TextArea3` varchar(30) DEFAULT NULL,
  `List_TextArea3_Order` int(4) NOT NULL DEFAULT 9,
  `List_TextArea4` varchar(30) DEFAULT NULL,
  `List_TextArea4_Order` int(4) NOT NULL DEFAULT 10,
  `List_Field1` varchar(30) DEFAULT NULL,
  `List_Field1_Order` int(4) NOT NULL DEFAULT 11,
  `List_Field2` varchar(30) DEFAULT NULL,
  `List_Field2_Order` int(4) NOT NULL DEFAULT 12,
  `List_Field3` varchar(30) DEFAULT NULL,
  `List_Field3_Order` int(4) NOT NULL DEFAULT 13,
  `List_Field4` varchar(30) DEFAULT NULL,
  `List_Field4_Order` int(4) NOT NULL DEFAULT 14,
  `List_Field5` varchar(30) DEFAULT NULL,
  `List_Field5_Order` int(4) NOT NULL DEFAULT 15,
  `List_Field6` varchar(30) DEFAULT NULL,
  `List_Field6_Order` int(4) NOT NULL DEFAULT 16,
  `List_Field7` varchar(30) DEFAULT NULL,
  `List_Field7_Order` int(4) NOT NULL DEFAULT 17,
  `List_Field8` varchar(30) DEFAULT NULL,
  `List_Field8_Order` int(4) NOT NULL DEFAULT 18,
  `List_Field9` varchar(30) DEFAULT NULL,
  `List_Field9_Order` int(4) NOT NULL DEFAULT 19,
  `List_Field10` varchar(30) DEFAULT NULL,
  `List_Field10_Order` int(4) NOT NULL DEFAULT 20,
  `List_Field11` varchar(30) DEFAULT NULL,
  `List_Field11_Order` int(4) NOT NULL DEFAULT 21,
  `List_Field12` varchar(30) DEFAULT NULL,
  `List_Field12_Order` int(4) NOT NULL DEFAULT 22,
  `List_Field13` varchar(30) DEFAULT NULL,
  `List_Field13_Order` int(4) NOT NULL DEFAULT 23,
  `List_Field14` varchar(30) DEFAULT NULL,
  `List_Field14_Order` int(4) NOT NULL DEFAULT 24,
  `List_Field15` varchar(30) DEFAULT NULL,
  `List_Field15_Order` int(4) NOT NULL DEFAULT 25,
  `List_Field16` varchar(30) DEFAULT NULL,
  `List_Field16_Order` int(4) NOT NULL DEFAULT 26,
  `List_Field17` varchar(30) DEFAULT NULL,
  `List_Field17_Order` int(4) NOT NULL DEFAULT 27,
  `List_Field18` varchar(30) DEFAULT NULL,
  `List_Field18_Order` int(4) NOT NULL DEFAULT 28,
  `List_Field19` varchar(30) DEFAULT NULL,
  `List_Field19_Order` int(4) NOT NULL DEFAULT 29,
  `List_Field20` varchar(30) DEFAULT NULL,
  `List_Field20_Order` int(4) NOT NULL DEFAULT 30,
  `List_Field21` varchar(30) DEFAULT NULL,
  `List_Field21_Order` int(4) NOT NULL DEFAULT 31,
  `List_Field22` varchar(30) DEFAULT NULL,
  `List_Field22_Order` int(4) NOT NULL DEFAULT 32,
  `List_Field23` varchar(30) DEFAULT NULL,
  `List_Field23_Order` int(4) NOT NULL DEFAULT 33,
  `List_Field24` varchar(30) DEFAULT NULL,
  `List_Field24_Order` int(4) NOT NULL DEFAULT 34,
  `List_Field25` varchar(30) DEFAULT NULL,
  `List_Field25_Order` int(4) NOT NULL DEFAULT 35,
  `List_Field26` varchar(30) DEFAULT NULL,
  `List_Field26_Order` int(4) NOT NULL DEFAULT 36,
  `List_Field27` varchar(30) DEFAULT NULL,
  `List_Field27_Order` int(4) NOT NULL DEFAULT 37,
  `List_Field28` varchar(30) DEFAULT NULL,
  `List_Field28_Order` int(4) NOT NULL DEFAULT 38,
  `List_Field29` varchar(30) DEFAULT NULL,
  `List_Field29_Order` int(4) NOT NULL DEFAULT 39,
  `List_Field30` varchar(30) DEFAULT NULL,
  `List_Field30_Order` int(4) NOT NULL DEFAULT 40,
  `List_Price` varchar(30) DEFAULT NULL,
  `List_Price_Order` int(4) NOT NULL DEFAULT 41,
  `List_Price2` varchar(30) DEFAULT NULL,
  `List_Price2_Order` int(4) NOT NULL DEFAULT 42,
  `List_Price3` varchar(30) DEFAULT NULL,
  `List_Price3_Order` int(4) NOT NULL DEFAULT 43,
  `List_Discount` varchar(30) DEFAULT NULL,
  `List_Discount_Order` int(4) NOT NULL DEFAULT 44,
  `List_Weight` varchar(30) DEFAULT NULL,
  `List_Weight_Order` int(4) NOT NULL DEFAULT 45,
  `List_Stock` varchar(30) DEFAULT NULL,
  `List_Stock_Order` int(4) NOT NULL DEFAULT 46,
  `List_Vat` varchar(30) DEFAULT NULL,
  `List_Vat_Order` int(4) NOT NULL DEFAULT 47,
  `List_Availability` varchar(30) DEFAULT NULL,
  `List_Availability_Order` int(4) NOT NULL DEFAULT 48,
  `List_Brand` varchar(30) DEFAULT NULL,
  `List_Brand_Order` int(4) NOT NULL DEFAULT 49,
  `List_Supplier` varchar(30) DEFAULT NULL,
  `List_Supplier_Order` int(4) NOT NULL DEFAULT 50,
  `List_CatProduct` varchar(30) DEFAULT NULL,
  `List_CatProduct_Order` int(4) NOT NULL DEFAULT 51,
  `List_HotPrice` varchar(30) DEFAULT NULL,
  `List_HotPrice_Order` int(4) NOT NULL DEFAULT 52,
  `List_BestSeller` varchar(30) DEFAULT NULL,
  `List_BestSeller_Order` int(4) NOT NULL DEFAULT 53,
  `List_BestPrice` varchar(30) DEFAULT NULL,
  `List_BestPrice_Order` int(4) NOT NULL DEFAULT 54,
  `List_BestChoice` varchar(30) DEFAULT NULL,
  `List_BestChoice_Order` int(4) NOT NULL DEFAULT 55,
  `List_Check1` varchar(30) DEFAULT NULL,
  `List_Check1_Order` int(4) NOT NULL DEFAULT 56,
  `List_Check2` varchar(30) DEFAULT NULL,
  `List_Check2_Order` int(4) NOT NULL DEFAULT 57,
  `List_Check3` varchar(30) DEFAULT NULL,
  `List_Check3_Order` int(4) NOT NULL DEFAULT 58,
  `List_Check4` varchar(30) DEFAULT NULL,
  `List_Check4_Order` int(4) NOT NULL DEFAULT 59,
  `List_Check5` varchar(30) DEFAULT NULL,
  `List_Check5_Order` int(4) NOT NULL DEFAULT 60,
  `List_Check6` varchar(30) DEFAULT NULL,
  `List_Check6_Order` int(4) NOT NULL DEFAULT 61,
  `List_Check7` varchar(30) DEFAULT NULL,
  `List_Check7_Order` int(4) NOT NULL DEFAULT 62,
  `List_Check8` varchar(30) DEFAULT NULL,
  `List_Check8_Order` int(4) NOT NULL DEFAULT 63,
  `List_Check9` varchar(30) DEFAULT NULL,
  `List_Check9_Order` int(4) NOT NULL DEFAULT 64,
  `List_Check10` varchar(30) DEFAULT NULL,
  `List_Check10_Order` int(4) NOT NULL DEFAULT 65,
  `List_Scroll1` varchar(30) DEFAULT NULL,
  `List_Scroll1_Order` int(4) NOT NULL DEFAULT 66,
  `List_Scroll1_Att` varchar(30) DEFAULT NULL,
  `List_Scroll1_Section` varchar(25) DEFAULT NULL,
  `List_Scroll2` varchar(30) DEFAULT NULL,
  `List_Scroll2_Order` int(4) NOT NULL DEFAULT 67,
  `List_Scroll2_Att` varchar(30) DEFAULT NULL,
  `List_Scroll2_Section` varchar(25) DEFAULT NULL,
  `List_Scroll3` varchar(30) DEFAULT NULL,
  `List_Scroll3_Order` int(4) NOT NULL DEFAULT 68,
  `List_Scroll3_Att` varchar(30) DEFAULT NULL,
  `List_Scroll3_Section` varchar(25) DEFAULT NULL,
  `List_Scroll4` varchar(30) DEFAULT NULL,
  `List_Scroll4_Order` int(4) NOT NULL DEFAULT 69,
  `List_Scroll4_Att` varchar(30) DEFAULT NULL,
  `List_Scroll4_Section` varchar(25) DEFAULT NULL,
  `List_Scroll5` varchar(30) DEFAULT NULL,
  `List_Scroll5_Order` int(4) NOT NULL DEFAULT 70,
  `List_Scroll5_Att` varchar(30) DEFAULT NULL,
  `List_Scroll5_Section` varchar(25) DEFAULT NULL,
  `List_Scroll6` varchar(30) DEFAULT NULL,
  `List_Scroll6_Order` int(4) NOT NULL DEFAULT 71,
  `List_Scroll6_Att` varchar(30) DEFAULT NULL,
  `List_Scroll6_Section` varchar(25) DEFAULT NULL,
  `List_Scroll7` varchar(30) DEFAULT NULL,
  `List_Scroll7_Order` int(4) NOT NULL DEFAULT 72,
  `List_Scroll7_Att` varchar(30) DEFAULT NULL,
  `List_Scroll7_Section` varchar(25) DEFAULT NULL,
  `List_Rec_View` varchar(30) DEFAULT NULL,
  `List_Rec_View_Mob` varchar(30) DEFAULT NULL,
  `List_Rec_Lists_View` varchar(30) DEFAULT NULL,
  `List_Rec_Lists_View_Mob` varchar(30) DEFAULT NULL,
  `List_Editor1` varchar(30) DEFAULT NULL,
  `List_Editor1_Order` int(4) NOT NULL DEFAULT 73,
  `List_Editor2` varchar(30) DEFAULT NULL,
  `List_Editor2_Order` int(4) NOT NULL DEFAULT 74,
  `List_EditorMob` varchar(30) DEFAULT NULL,
  `List_EditorMob_Order` int(4) NOT NULL DEFAULT 75,
  `List_Images` varchar(30) DEFAULT NULL,
  `List_Images_Order` int(4) NOT NULL DEFAULT 76,
  `List_NoRes_Images` varchar(30) DEFAULT NULL,
  `List_NoRes_Images_Order` int(4) NOT NULL DEFAULT 77,
  `List_Docs` varchar(30) DEFAULT NULL,
  `List_Docs_Order` int(4) NOT NULL DEFAULT 78,
  `List_Docs2` varchar(30) DEFAULT NULL,
  `List_Docs2_Order` int(4) NOT NULL DEFAULT 79,
  `List_RA1` varchar(30) DEFAULT NULL,
  `List_RA1_Order` int(4) NOT NULL DEFAULT 115,
  `List_RA2` varchar(30) DEFAULT NULL,
  `List_RA2_Order` int(4) NOT NULL DEFAULT 116,
  `List_Rat1` varchar(30) DEFAULT NULL,
  `List_Rat1_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 01,
  `List_Rat1_ID` int(7) DEFAULT NULL,
  `List_Rat2` varchar(30) DEFAULT NULL,
  `List_Rat2_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 02,
  `List_Rat2_ID` int(7) DEFAULT NULL,
  `List_Rat3` varchar(30) DEFAULT NULL,
  `List_Rat3_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 03,
  `List_Rat3_ID` int(7) DEFAULT NULL,
  `List_Rat4` varchar(30) DEFAULT NULL,
  `List_Rat4_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 04,
  `List_Rat4_ID` int(7) DEFAULT NULL,
  `List_Rat5` varchar(30) DEFAULT NULL,
  `List_Rat5_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 05,
  `List_Rat5_ID` int(7) DEFAULT NULL,
  `List_Rat6` varchar(30) DEFAULT NULL,
  `List_Rat6_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 06,
  `List_Rat6_ID` int(7) DEFAULT NULL,
  `List_MultTable1` varchar(30) DEFAULT NULL,
  `List_MultTable1_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 01,
  `List_MultTable1_Type` varchar(3) NOT NULL,
  `List_MultTable1_ID` int(4) DEFAULT NULL,
  `List_MultTable2` varchar(30) DEFAULT NULL,
  `List_MultTable2_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 02,
  `List_MultTable2_Type` varchar(3) NOT NULL,
  `List_MultTable2_ID` int(5) DEFAULT NULL,
  `List_MultTable3` varchar(30) DEFAULT NULL,
  `List_MultTable3_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 03,
  `List_MultTable3_Type` varchar(3) NOT NULL,
  `List_MultTable3_ID` int(5) DEFAULT NULL,
  `List_MultTable4` varchar(30) DEFAULT NULL,
  `List_MultTable4_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 04,
  `List_MultTable4_Type` varchar(3) NOT NULL,
  `List_MultTable4_ID` int(5) DEFAULT NULL,
  `List_MultTable5` varchar(30) DEFAULT NULL,
  `List_MultTable5_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 05,
  `List_MultTable5_Type` varchar(3) NOT NULL,
  `List_MultTable5_ID` int(5) DEFAULT NULL,
  `List_MultTable6` varchar(30) DEFAULT NULL,
  `List_MultTable6_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 06,
  `List_MultTable6_Type` varchar(3) NOT NULL,
  `List_MultTable6_ID` int(5) DEFAULT NULL,
  `List_MultTable7` varchar(30) DEFAULT NULL,
  `List_MultTable7_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 07,
  `List_MultTable7_Type` varchar(3) NOT NULL,
  `List_MultTable7_ID` int(5) DEFAULT NULL,
  `List_MultTable8` varchar(30) DEFAULT NULL,
  `List_MultTable8_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 08,
  `List_MultTable8_Type` varchar(3) NOT NULL,
  `List_MultTable8_ID` int(5) DEFAULT NULL,
  `List_MultTable9` varchar(30) DEFAULT NULL,
  `List_MultTable9_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 09,
  `List_MultTable9_Type` varchar(3) NOT NULL,
  `List_MultTable9_ID` int(5) DEFAULT NULL,
  `List_MultTable10` varchar(30) DEFAULT NULL,
  `List_MultTable10_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 10,
  `List_MultTable10_Type` varchar(3) NOT NULL,
  `List_MultTable10_ID` int(5) DEFAULT NULL,
  `List_MultTable11` varchar(30) DEFAULT NULL,
  `List_MultTable11_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 11,
  `List_MultTable11_Type` varchar(3) NOT NULL,
  `List_MultTable11_ID` int(5) DEFAULT NULL,
  `List_MultTable12` varchar(30) DEFAULT NULL,
  `List_MultTable12_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 12,
  `List_MultTable12_Type` varchar(3) NOT NULL,
  `List_MultTable12_ID` int(5) DEFAULT NULL,
  `List_MultTable13` varchar(30) DEFAULT NULL,
  `List_MultTable13_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 13,
  `List_MultTable13_Type` varchar(3) NOT NULL,
  `List_MultTable13_ID` int(5) DEFAULT NULL,
  `List_MultTable14` varchar(30) DEFAULT NULL,
  `List_MultTable14_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 14,
  `List_MultTable14_Type` varchar(3) NOT NULL,
  `List_MultTable14_ID` int(5) DEFAULT NULL,
  `List_MultTable15` varchar(30) DEFAULT NULL,
  `List_MultTable15_Order` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 15,
  `List_MultTable15_Type` varchar(3) NOT NULL,
  `List_MultTable15_ID` int(5) DEFAULT NULL,
  `List_GeoLocation` varchar(30) NOT NULL,
  `List_GeoLocation_Order` int(4) NOT NULL DEFAULT 132,
  `List_Image1` varchar(30) DEFAULT NULL,
  `List_Image1_Order` int(4) NOT NULL DEFAULT 80,
  `List_Image2` varchar(30) DEFAULT NULL,
  `List_Image2_Order` int(4) NOT NULL DEFAULT 81,
  `List_Image3` varchar(30) DEFAULT NULL,
  `List_Image3_Order` int(4) NOT NULL DEFAULT 82,
  `List_Image4` varchar(30) DEFAULT NULL,
  `List_Image4_Order` int(4) NOT NULL DEFAULT 83,
  `List_Image5` varchar(30) DEFAULT NULL,
  `List_Image5_Order` int(4) NOT NULL DEFAULT 84,
  `List_Image6` varchar(30) DEFAULT NULL,
  `List_Image6_Order` int(4) NOT NULL DEFAULT 999,
  `List_Logo` varchar(30) DEFAULT NULL,
  `List_Logo_Order` int(4) NOT NULL DEFAULT 85,
  `List_Logo_Bottom` varchar(30) DEFAULT NULL,
  `List_Logo_Bottom_Order` int(4) NOT NULL DEFAULT 86,
  `List_Image_Social` varchar(30) DEFAULT NULL,
  `List_Image_Social_Order` int(4) NOT NULL DEFAULT 87,
  `List_File1` varchar(30) DEFAULT NULL,
  `List_File1_Order` int(4) NOT NULL DEFAULT 88,
  `List_File2` varchar(30) DEFAULT NULL,
  `List_File2_Order` int(4) NOT NULL DEFAULT 89,
  `List_Keywords` varchar(30) DEFAULT NULL,
  `List_Keywords_Order` int(4) NOT NULL DEFAULT 133,
  `List_DateStart` varchar(30) DEFAULT NULL,
  `List_DateStart_Order` int(4) NOT NULL DEFAULT 130,
  `List_DateStop` varchar(30) DEFAULT NULL,
  `List_DateStop_Order` int(4) NOT NULL DEFAULT 131,
  `List_Active_Rec` varchar(30) DEFAULT NULL,
  `List_Active_Rec_Order` int(4) NOT NULL DEFAULT 134,
  PRIMARY KEY (`List_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 8192 kB; InnoDB free: 8192 kB; InnoDB free: 819';

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`List_ID`, `List_Name`, `List_Active`, `List_RecPage`, `List_Title`, `List_Title_Order`, `List_Title_Meta`, `List_Title_Meta_Order`, `List_Desc`, `List_Desc_Order`, `List_Desc_Meta`, `List_Desc_Meta_Order`, `List_ShowHome`, `List_ShowHome_Order`, `List_HomeRotator`, `List_HomeRotator_Order`, `List_Rec_ShowMore`, `List_Rec_ShowMore_Order`, `List_Order`, `List_Order_Order`, `List_TextArea1`, `List_TextArea1_Order`, `List_TextArea2`, `List_TextArea2_Order`, `List_TextArea3`, `List_TextArea3_Order`, `List_TextArea4`, `List_TextArea4_Order`, `List_Field1`, `List_Field1_Order`, `List_Field2`, `List_Field2_Order`, `List_Field3`, `List_Field3_Order`, `List_Field4`, `List_Field4_Order`, `List_Field5`, `List_Field5_Order`, `List_Field6`, `List_Field6_Order`, `List_Field7`, `List_Field7_Order`, `List_Field8`, `List_Field8_Order`, `List_Field9`, `List_Field9_Order`, `List_Field10`, `List_Field10_Order`, `List_Field11`, `List_Field11_Order`, `List_Field12`, `List_Field12_Order`, `List_Field13`, `List_Field13_Order`, `List_Field14`, `List_Field14_Order`, `List_Field15`, `List_Field15_Order`, `List_Field16`, `List_Field16_Order`, `List_Field17`, `List_Field17_Order`, `List_Field18`, `List_Field18_Order`, `List_Field19`, `List_Field19_Order`, `List_Field20`, `List_Field20_Order`, `List_Field21`, `List_Field21_Order`, `List_Field22`, `List_Field22_Order`, `List_Field23`, `List_Field23_Order`, `List_Field24`, `List_Field24_Order`, `List_Field25`, `List_Field25_Order`, `List_Field26`, `List_Field26_Order`, `List_Field27`, `List_Field27_Order`, `List_Field28`, `List_Field28_Order`, `List_Field29`, `List_Field29_Order`, `List_Field30`, `List_Field30_Order`, `List_Price`, `List_Price_Order`, `List_Price2`, `List_Price2_Order`, `List_Price3`, `List_Price3_Order`, `List_Discount`, `List_Discount_Order`, `List_Weight`, `List_Weight_Order`, `List_Stock`, `List_Stock_Order`, `List_Vat`, `List_Vat_Order`, `List_Availability`, `List_Availability_Order`, `List_Brand`, `List_Brand_Order`, `List_Supplier`, `List_Supplier_Order`, `List_CatProduct`, `List_CatProduct_Order`, `List_HotPrice`, `List_HotPrice_Order`, `List_BestSeller`, `List_BestSeller_Order`, `List_BestPrice`, `List_BestPrice_Order`, `List_BestChoice`, `List_BestChoice_Order`, `List_Check1`, `List_Check1_Order`, `List_Check2`, `List_Check2_Order`, `List_Check3`, `List_Check3_Order`, `List_Check4`, `List_Check4_Order`, `List_Check5`, `List_Check5_Order`, `List_Check6`, `List_Check6_Order`, `List_Check7`, `List_Check7_Order`, `List_Check8`, `List_Check8_Order`, `List_Check9`, `List_Check9_Order`, `List_Check10`, `List_Check10_Order`, `List_Scroll1`, `List_Scroll1_Order`, `List_Scroll1_Att`, `List_Scroll1_Section`, `List_Scroll2`, `List_Scroll2_Order`, `List_Scroll2_Att`, `List_Scroll2_Section`, `List_Scroll3`, `List_Scroll3_Order`, `List_Scroll3_Att`, `List_Scroll3_Section`, `List_Scroll4`, `List_Scroll4_Order`, `List_Scroll4_Att`, `List_Scroll4_Section`, `List_Scroll5`, `List_Scroll5_Order`, `List_Scroll5_Att`, `List_Scroll5_Section`, `List_Scroll6`, `List_Scroll6_Order`, `List_Scroll6_Att`, `List_Scroll6_Section`, `List_Scroll7`, `List_Scroll7_Order`, `List_Scroll7_Att`, `List_Scroll7_Section`, `List_Rec_View`, `List_Rec_View_Mob`, `List_Rec_Lists_View`, `List_Rec_Lists_View_Mob`, `List_Editor1`, `List_Editor1_Order`, `List_Editor2`, `List_Editor2_Order`, `List_EditorMob`, `List_EditorMob_Order`, `List_Images`, `List_Images_Order`, `List_NoRes_Images`, `List_NoRes_Images_Order`, `List_Docs`, `List_Docs_Order`, `List_Docs2`, `List_Docs2_Order`, `List_RA1`, `List_RA1_Order`, `List_RA2`, `List_RA2_Order`, `List_Rat1`, `List_Rat1_Order`, `List_Rat1_ID`, `List_Rat2`, `List_Rat2_Order`, `List_Rat2_ID`, `List_Rat3`, `List_Rat3_Order`, `List_Rat3_ID`, `List_Rat4`, `List_Rat4_Order`, `List_Rat4_ID`, `List_Rat5`, `List_Rat5_Order`, `List_Rat5_ID`, `List_Rat6`, `List_Rat6_Order`, `List_Rat6_ID`, `List_MultTable1`, `List_MultTable1_Order`, `List_MultTable1_Type`, `List_MultTable1_ID`, `List_MultTable2`, `List_MultTable2_Order`, `List_MultTable2_Type`, `List_MultTable2_ID`, `List_MultTable3`, `List_MultTable3_Order`, `List_MultTable3_Type`, `List_MultTable3_ID`, `List_MultTable4`, `List_MultTable4_Order`, `List_MultTable4_Type`, `List_MultTable4_ID`, `List_MultTable5`, `List_MultTable5_Order`, `List_MultTable5_Type`, `List_MultTable5_ID`, `List_MultTable6`, `List_MultTable6_Order`, `List_MultTable6_Type`, `List_MultTable6_ID`, `List_MultTable7`, `List_MultTable7_Order`, `List_MultTable7_Type`, `List_MultTable7_ID`, `List_MultTable8`, `List_MultTable8_Order`, `List_MultTable8_Type`, `List_MultTable8_ID`, `List_MultTable9`, `List_MultTable9_Order`, `List_MultTable9_Type`, `List_MultTable9_ID`, `List_MultTable10`, `List_MultTable10_Order`, `List_MultTable10_Type`, `List_MultTable10_ID`, `List_MultTable11`, `List_MultTable11_Order`, `List_MultTable11_Type`, `List_MultTable11_ID`, `List_MultTable12`, `List_MultTable12_Order`, `List_MultTable12_Type`, `List_MultTable12_ID`, `List_MultTable13`, `List_MultTable13_Order`, `List_MultTable13_Type`, `List_MultTable13_ID`, `List_MultTable14`, `List_MultTable14_Order`, `List_MultTable14_Type`, `List_MultTable14_ID`, `List_MultTable15`, `List_MultTable15_Order`, `List_MultTable15_Type`, `List_MultTable15_ID`, `List_GeoLocation`, `List_GeoLocation_Order`, `List_Image1`, `List_Image1_Order`, `List_Image2`, `List_Image2_Order`, `List_Image3`, `List_Image3_Order`, `List_Image4`, `List_Image4_Order`, `List_Image5`, `List_Image5_Order`, `List_Image6`, `List_Image6_Order`, `List_Logo`, `List_Logo_Order`, `List_Logo_Bottom`, `List_Logo_Bottom_Order`, `List_Image_Social`, `List_Image_Social_Order`, `List_File1`, `List_File1_Order`, `List_File2`, `List_File2_Order`, `List_Keywords`, `List_Keywords_Order`, `List_DateStart`, `List_DateStart_Order`, `List_DateStop`, `List_DateStop_Order`, `List_Active_Rec`, `List_Active_Rec_Order`) VALUES
(2, 'Text', 1, '', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, 'Order', 3, '', 7, '', 8, '', 9, '', 10, '', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', 'Record View', NULL, 'Lists View of Record', NULL, 'Text Editor', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, NULL, 116, '', 99, 14, '', 99, 1, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(3, 'Text + Photo Gallery', 1, '', 'Title', 1, '', 999, 'Description', 2, '', 999, '', 4, '', 5, '', 6, '', 3, '', 7, '', 8, '', 9, '', 10, 'Title 1', 11, 'Title 2', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', 'Record View', '', 'Lists View of Record ', 'Lists View of Record Mobile', 'Text Editor', 73, '', 74, '', 75, 'Photo Gallery', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 1, '', 99, 1, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Image 1', 80, 'Image 2', 81, '', 82, '', 83, '', 84, '', 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(5, 'News', 1, '', 'Title', 1, '', 999, 'Description', 2, '', 999, '', 4, '', 5, '', 6, '', 3, '', 7, '', 8, '', 9, '', 10, '', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', 'Record View ', NULL, 'Lists View of Record', NULL, 'Text Editor', 73, '', 74, '', 75, 'Photo Gallery', 76, '', 77, '', 78, '', 79, '', 115, NULL, 116, '', 99, 2, '', 99, 1, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, 'Date ', 130, '', 131, '', 134),
(6, 'Banners', 1, 'record_edit_banners.php', 'Title', 1, '', 999, 'Subtitle', 2, '', 999, '', 4, '', 5, '', 6, 'Order', 3, 'Description', 7, 'Script Code', 8, '', 9, '', 10, 'URL', 11, 'From Rec ID', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, 'Width', 39, 'Height', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, 'Pop Up Window', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, 'Link Target', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', NULL, '', NULL, '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, NULL, 116, '', 99, 1, '', 99, 1, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Add Banner', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, 'Start Date', 130, 'End Date', 131, '', 134),
(1, 'Home Page', 1, '', 'Title', 1, 'Meta Tag Title ', 999, '', 2, 'Meta Tag Description', 999, '', 4, '', 5, '', 6, '', 3, 'Logo SVG', 7, 'Google Map URL', 8, '', 9, 'Contact Info', 10, '', 11, 'Weather title', 12, 'Weather ID (accuweather.com)', 13, 'Time Title', 14, 'Timezone(Continent/City)', 15, 'Currency Title', 16, 'Follow Us', 17, '', 18, '', 19, 'Contact Title', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, 'MHTE', 28, '', 29, 'Logo Alt Tag', 30, 'Copyright', 31, '', 32, 'Book this Room', 33, 'Book this Room List', 34, 'Book Now Title', 35, 'Book Now URL', 36, 'Book Now Mobile Title', 37, 'Book Now Mobile URL', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 1, '', 99, 1, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, 'Image Map', 81, '', 82, '', 83, 'OG Square Image (Global)', 84, '', 999, 'Logo', 85, 'Logo Bottom', 86, 'Social Media Image', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(41, 'Text + Image', 1, '', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, 'Order ', 3, '', 7, '', 8, '', 9, '', 10, '', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', 'Record View ', NULL, 'Lists View of Record', NULL, 'Text', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, NULL, 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Image', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(4, 'Header Content', 1, '', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, '', 3, '', 7, '', 8, '', 9, '', 10, '', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, '', 74, '', 75, '', 76, 'Photo Gallery (NR) 1920x948', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 1, '', 99, 1, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, '', 81, '', 82, '', 83, '', 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(7, 'Links', 1, '', 'Title', 1, '', 999, 'Description', 2, '', 999, '', 4, '', 5, '', 6, 'Order', 3, '', 7, '', 8, '', 9, '', 10, 'URL', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', NULL, '', NULL, '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, NULL, 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(9, 'Products', 1, '', 'Title', 1, 'Meta Tag Title', 999, 'Description', 2, 'Meta Tag Description', 999, '', 4, '', 5, '', 6, '', 3, '', 7, '', 8, '', 9, '', 10, '', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, 'Price', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', 'Record View', NULL, '', NULL, 'Text Editor', 73, 'Text Editor 2', 74, '', 75, 'Photo Gallery', 76, '', 77, 'Αρχείο Εγγράφων', 78, '', 79, '', 115, NULL, 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, '', 85, '', 86, 'Social Image', 87, '', 88, '', 89, '', 133, 'Date ', 130, '', 131, 'Inactive', 134),
(14, 'Photojournalism', 1, 'rat_table_edit_blog.php', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, 'Order', 3, '', 7, '', 8, '', 9, '', 10, 'Image Alt', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, 'Show Title', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, 'Edit Text', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Image 1', 80, 'Image 2', 81, 'Image 3', 82, 'Image 4', 83, 'Image 5', 84, 'Image 6', 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(15, 'Contact Form', 1, '', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, '', 3, 'Thank you Message', 7, 'Auto Reply Message', 8, 'Contact Form Text', 9, '', 10, 'Contact Title', 11, 'e-mail', 12, 'Full Name', 13, 'Telephone', 14, '', 15, '', 16, '', 17, '', 18, '', 19, 'Recipient Subject', 20, 'Recipient Emails (e1, e2..)', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, 'Accept Privacy Policy', 32, 'Message', 33, 'Security Code', 34, '', 35, 'Submit Button', 36, '', 37, 'Required Fields', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, 'Autoresponse', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, '', 81, '', 82, '', 83, '', 84, '', 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(17, 'Reservation Form', 1, '', 'Title', 1, NULL, 999, '', 2, NULL, 999, '', 4, '', 5, NULL, 6, '', 3, 'Thank you Message', 7, 'Auto Replay Message', 8, 'Contact Form Text', 9, '', 10, 'Contact info Title', 11, 'e-mail', 12, 'Full Name', 13, 'Phone', 14, 'Fax', 15, 'Country', 16, '', 17, 'Reservation info Title', 18, 'Room Type Title', 19, 'Room Type 1', 20, 'Room Type 2', 21, 'Room Type 3', 22, 'Room Type 4', 23, 'Room Type 5', 24, 'Room Type 6', 25, 'Room Type 7', 26, 'Room Type 8', 27, 'Extra bed', 28, 'Arrival Date', 29, 'Departure Date', 30, 'Message', 31, 'Security Code', 32, 'Security Message', 33, 'Submit Button', 34, 'Required Fields', 35, 'Recipient Subject', 36, 'Recipient Email 1', 37, 'Recipient Email 2', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, 'Autoresponse', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', NULL, '', 67, '', NULL, '', 68, '', NULL, '', 69, '', NULL, '', 70, '', NULL, NULL, 71, NULL, NULL, NULL, 72, NULL, NULL, '', NULL, NULL, NULL, 'Text Editor', 73, '', 74, NULL, 75, '', 76, '', 77, '', 78, '', 79, '', 115, NULL, 116, '', 99, 2, '', 99, 2, NULL, 99, NULL, NULL, 99, NULL, NULL, 99, NULL, NULL, 99, NULL, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, NULL, 99, '', NULL, NULL, 99, '', NULL, NULL, 99, '', NULL, NULL, 99, '', NULL, NULL, 99, '', NULL, NULL, 99, '', NULL, NULL, 99, '', NULL, NULL, 99, '', NULL, NULL, 99, '', NULL, '', 132, '', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, NULL, 85, NULL, 86, NULL, 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(31, 'Settings', 1, 'record_edit_settings.php', 'Root Path', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, '', 3, '', 7, '', 8, '', 9, '', 10, 'Global Image Quality', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, 'GMT', 30, 'Css Cache Buster', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, 'Enable Footer Content', 56, 'Display Mysql Errors to admins', 57, 'Enable Popup', 58, 'e-Commerce Site', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, 'Start Language', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, '', 81, '', 82, '', 83, '', 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(33, 'Newsletter', 1, '', 'Title ', 1, '', 999, 'Description', 2, '', 999, '', 4, '', 5, '', 6, '', 3, 'Thank you Message', 7, 'Auto Reply Message', 8, '', 9, '', 10, 'Text if Email Exists', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, 'Recipient Subject', 20, 'Recipient Emails (e1, e2..)', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, 'Accept Privacy Policy', 32, '', 33, '', 34, '', 35, 'Submit Button', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, 'Autoresponse', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, 'Submit Button', 81, '', 82, '', 83, '', 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(34, 'Extranet', 1, '', 'Title', 1, NULL, 999, '', 2, NULL, 999, '', 4, '', 5, NULL, 6, 'Order', 3, '', 7, '', 8, '', 9, '', 10, '', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', NULL, NULL, NULL, '', 73, '', 74, NULL, 75, '', 76, '', 77, '', 78, '', 79, '', 115, NULL, 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, NULL, 85, NULL, 86, NULL, 87, 'Add File', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(35, 'Social Media', 1, 'record_edit_social.php', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, 'Order', 3, 'Script', 7, '', 8, '', 9, '', 10, 'URL', 11, 'Alt Tag', 12, 'Image Width', 13, 'Image Height', 14, 'Font Icon Color ID (with #)', 15, '', 16, 'Twitter ID (without @)', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, 'Target', 66, '', '', 'Font Icon (enable FontAwesome)', 67, '', '', 'Font Icons Size', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Social Icon', 80, '', 81, '', 82, '', 83, '', 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(36, 'Blog', 1, 'record_edit_blog.php', 'Title', 1, 'Meta Tag Title', 999, 'Description', 2, '', 999, 'Show on Home Page', 4, '', 5, '', 6, '', 3, '', 7, '', 8, '', 9, '', 10, '', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', 'Record View', 'Record View Mobile', '', '', '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, 'Edit Article', 99, 14, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'List Image 557x386', 80, '', 81, '', 82, '', 83, '', 84, '', 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(37, 'Accommodation', 1, '', 'Title', 1, '', 999, 'Description', 2, '', 999, '', 4, '', 5, '', 6, '', 3, '', 7, '', 8, '', 9, '', 10, 'Book URL', 11, 'Size', 12, 'Persons', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', 'Record View', '', '', '', 'Room Text', 73, 'Facilities', 74, '', 75, 'Photo Gallery', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Image List', 80, 'Image 1 Internal', 81, 'Image 2 Internal', 82, 'Floor Plan', 83, 'Floor Plan 2', 84, '', 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(38, 'Banners Home', 1, '', 'Title', 1, '', 999, 'Description', 2, '', 999, '', 4, '', 5, '', 6, 'Order', 3, '', 7, '', 8, '', 9, '', 10, 'Title 1', 11, 'Title 2', 12, 'Title 3', 13, 'Title 4', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, 'URL', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', 'Lists View ', 'Lists View of Record Mobile', 'Edit Text', 73, '', 74, '', 75, 'Photo Gallery', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Image', 80, 'Image 2', 81, 'Image 3', 82, 'Image 4', 83, '', 84, '', 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(39, 'Responsive Home', 1, '', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, 'Order', 3, '', 7, '', 8, '', 9, '', 10, 'Title 1', 11, 'Title 2', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, 'URL', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', NULL, 'Lists View', NULL, '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, NULL, 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Image', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(43, 'Popup', 1, '', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, '', 3, '', 7, '', 8, 'Main Text', 9, '', 10, 'Country ISO2 (countrycode.org)', 11, 'Activated after Hour', 12, 'Deactivated after Hour', 13, 'Active Days', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, 'URL', 36, 'Popup width', 37, 'Popup height', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, '', 56, '', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', 'Lists View of Record', NULL, '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, NULL, 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Popup Image (jpg)', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, 'Start Date', 130, 'End Date', 131, 'Active', 134),
(44, 'Offers', 1, '', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, 'Order', 3, '', 7, '', 8, 'Text', 9, '', 10, 'Button Title', 11, '', 12, 'Country ISO2 (countrycode.org)', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, 'Text URL', 37, 'URL', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, 'Book Button', 56, 'Also On Targeted Countries', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, 'Image', 80, '', 81, '', 82, NULL, 83, NULL, 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, 'Start Date', 130, 'End Date', 131, '', 134),
(45, 'Optimized', 1, 'core/optimized.php', 'Title', 1, '', 999, 'Critical Css', 1, '', 999, '', 4, '', 5, '', 6, '', 3, 'Prefetch DNS', 5, '', 8, '', 9, '', 10, '', 11, '', 12, '', 13, '', 14, '', 15, '', 16, '', 17, '', 18, '', 19, '', 20, '', 21, '', 22, '', 23, '', 24, '', 25, '', 26, '', 27, '', 28, '', 29, '', 30, '', 31, '', 32, '', 33, '', 34, '', 35, '', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, 'Lazy Load Enable for Images', 6, 'Enable for iframes and videos', 7, 'Uncompress Css', 2, '4', 59, 'Uncompress Js', 3, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 99, '', 2, '', 132, '', 80, '', 81, '', 82, '', 83, '', 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, '', 130, '', 131, '', 134),
(46, 'Hotel Price Widget', 1, '', 'Title', 1, '', 999, '', 2, '', 999, '', 4, '', 5, '', 6, 'Order', 3, '', 7, '', 8, '', 9, '', 10, 'Country ISO2 (countrycode.org)', 11, 'Activated after Hour', 12, 'Deactivated after Hour', 13, 'Active Days', 14, 'WebHotelier Property ID', 15, 'TripAdvisor ID', 16, 'Opening Date (dd-mm-yyyy)', 17, '', 18, '', 19, 'Period 1(dd-mm-yyyy)', 20, 'Period 1 Discount', 21, 'Period 2(dd-mm-yyyy)', 22, 'Period 2 Discount', 23, 'Period 3(dd-mm-yyyy)', 24, 'Period 3 Discount', 25, 'Period 4(dd-mm-yyyy)', 26, 'Period 4 Discount', 27, '', 28, '', 29, 'Widget Title', 30, 'Widget Subtitle(optional)', 31, '', 32, '', 33, '', 34, 'Book Button Text', 35, 'URL', 36, '', 37, '', 38, '', 39, '', 40, '', 41, '', 42, '', 43, '', 44, '', 45, '', 46, '', 47, '', 48, '', 49, '', 50, '', 51, '', 52, '', 53, '', 54, '', 55, 'Booking', 56, 'Expedia', 57, '', 58, '', 59, '', 60, '', 61, '', 62, '', 63, '', 64, '', 65, '', 66, '', '', '', 67, '', '', '', 68, '', '', '', 69, '', '', '', 70, '', '', '', 71, '', '', '', 72, '', '', '', '', '', '', '', 73, '', 74, '', 75, '', 76, '', 77, '', 78, '', 79, '', 115, '', 116, '', 117, 2, '', 118, 2, '', 119, 2, '', 120, 2, '', 121, 2, '', 122, 2, '', 100, '', 2, '', 101, '', 2, '', 102, '', 2, '', 103, '', 2, '', 104, '', 2, '', 105, '', 2, '', 106, '', 2, '', 107, '', 2, '', 108, '', 2, '', 109, '', 2, '', 110, '', 2, '', 111, '', 2, '', 112, '', 2, '', 113, '', 2, '', 114, '', 2, '', 132, '', 80, '', 81, '', 82, '', 83, '', 84, NULL, 999, '', 85, '', 86, '', 87, '', 88, '', 89, '', 133, 'Start Date', 130, 'End Date', 131, 'Active Record', 134);

-- --------------------------------------------------------

--
-- Table structure for table `listshead_templates`
--

DROP TABLE IF EXISTS `listshead_templates`;
CREATE TABLE IF NOT EXISTS `listshead_templates` (
  `LHTemp_ID` int(4) NOT NULL AUTO_INCREMENT,
  `LHTemp_Name` varchar(40) DEFAULT NULL,
  `LHTemp_ListID` int(5) NOT NULL,
  `LHTemp_Fields` int(1) NOT NULL DEFAULT 3,
  PRIMARY KEY (`LHTemp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listshead_templates`
--

INSERT INTO `listshead_templates` (`LHTemp_ID`, `LHTemp_Name`, `LHTemp_ListID`, `LHTemp_Fields`) VALUES
(7, 'Default', 4, 1),
(6, 'BxSlider Photos', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `listshead_templates_rows`
--

DROP TABLE IF EXISTS `listshead_templates_rows`;
CREATE TABLE IF NOT EXISTS `listshead_templates_rows` (
  `LHTR_ID` int(6) NOT NULL AUTO_INCREMENT,
  `LHTR_Temp_ID` int(4) NOT NULL,
  `LHTR_Rows` int(2) NOT NULL,
  `LHTR_Cols` int(1) NOT NULL,
  `LHTR_Cell` int(1) NOT NULL,
  `LHTR_NumFields` int(1) NOT NULL,
  `LHTR_Field` varchar(20) NOT NULL,
  `LHTR_Module` varchar(4) DEFAULT NULL,
  `LHTR_Style_ID` int(4) NOT NULL,
  `LHTR_Css` text DEFAULT NULL,
  `LHTR_ClassID` varchar(255) DEFAULT NULL,
  `LHTR_Link_ID` int(4) DEFAULT NULL,
  `LHTR_Href` varchar(255) DEFAULT NULL,
  `LHTR_Href_Target` varchar(10) NOT NULL DEFAULT '_self',
  `LHTR_PaddBottom` varchar(7) NOT NULL DEFAULT '0',
  `LHTR_Cell_Style_ID` int(4) DEFAULT NULL,
  `LHTR_Cell_ClassItemID` varchar(255) DEFAULT NULL,
  `LHTR_Row_Style_ID` int(4) DEFAULT NULL,
  `LHTR_Row_SepDiv` varchar(5) DEFAULT NULL,
  `LHTR_Row_PaddBottom` varchar(3) DEFAULT NULL,
  `LHTR_Row_Active` int(1) DEFAULT 1,
  `LHTR_Temp_Style_ID` int(4) DEFAULT NULL,
  `LHTR_Row_Css` text DEFAULT NULL,
  `LHTR_Temp_PaddBottom` varchar(7) DEFAULT NULL,
  `LHTR_Preview` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`LHTR_ID`),
  KEY `LHTR_Temp_ID` (`LHTR_Temp_ID`),
  KEY `LHTR_Rows` (`LHTR_Rows`),
  KEY `LHTR_Cols` (`LHTR_Cols`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listshead_templates_rows`
--

INSERT INTO `listshead_templates_rows` (`LHTR_ID`, `LHTR_Temp_ID`, `LHTR_Rows`, `LHTR_Cols`, `LHTR_Cell`, `LHTR_NumFields`, `LHTR_Field`, `LHTR_Module`, `LHTR_Style_ID`, `LHTR_Css`, `LHTR_ClassID`, `LHTR_Link_ID`, `LHTR_Href`, `LHTR_Href_Target`, `LHTR_PaddBottom`, `LHTR_Cell_Style_ID`, `LHTR_Cell_ClassItemID`, `LHTR_Row_Style_ID`, `LHTR_Row_SepDiv`, `LHTR_Row_PaddBottom`, `LHTR_Row_Active`, `LHTR_Temp_Style_ID`, `LHTR_Row_Css`, `LHTR_Temp_PaddBottom`, `LHTR_Preview`) VALUES
(85, 8, 1, 1, 1, 1, '', '29', 0, NULL, NULL, NULL, NULL, '_self', '0', NULL, NULL, 0, '', '', 1, 0, NULL, '', 0),
(72, 1, 1, 1, 1, 3, '', '0', 0, NULL, NULL, NULL, NULL, '_self', '0', NULL, NULL, 0, '', '', 1, 0, NULL, '', 0),
(71, 1, 1, 1, 1, 2, '', '0', 0, NULL, NULL, NULL, NULL, '_self', '0', NULL, NULL, 0, '', '', 1, 0, NULL, '', 0),
(33, 3, 1, 1, 1, 1, '', '0', 0, NULL, NULL, NULL, NULL, '_self', '0', NULL, NULL, 0, '', '', 1, 0, NULL, '', 0),
(64, 4, 2, 2, 2, 1, '', '0', 0, NULL, NULL, NULL, NULL, '_self', '0', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0),
(63, 4, 2, 2, 1, 1, '', '0', 0, NULL, NULL, NULL, NULL, '_self', '0', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0),
(56, 4, 1, 1, 1, 1, '', '0', 0, NULL, NULL, NULL, NULL, '_self', '0', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0),
(66, 5, 1, 1, 1, 1, '', '31', 0, NULL, NULL, NULL, NULL, '_self', '0', NULL, NULL, 0, '', '', 1, 0, NULL, '', 0),
(70, 1, 1, 1, 1, 1, 'List_Editor1', '0', 0, NULL, NULL, NULL, NULL, '_self', '0', NULL, NULL, 0, '', '', 1, 0, NULL, '', 0),
(84, 6, 1, 1, 1, 1, '', '231', 0, '', NULL, NULL, NULL, '_self', '0', 0, '', 0, '', '0', 1, 0, '', '', 0),
(86, 9, 1, 1, 1, 1, 'List_Title', '0', 0, NULL, NULL, NULL, NULL, '_self', '10', NULL, NULL, 0, '', '', 1, 0, NULL, '', 0),
(87, 9, 1, 1, 1, 2, 'List_Editor1', '0', 0, NULL, NULL, NULL, NULL, '_self', '30', NULL, NULL, 0, '', '', 1, 0, NULL, '', 0),
(88, 9, 1, 1, 1, 3, '', '27', 0, NULL, NULL, NULL, NULL, '_self', '50', NULL, NULL, 0, '', '', 1, 0, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lists_templates`
--

DROP TABLE IF EXISTS `lists_templates`;
CREATE TABLE IF NOT EXISTS `lists_templates` (
  `LTemp_ID` int(4) NOT NULL AUTO_INCREMENT,
  `LTemp_Category` varchar(20) NOT NULL DEFAULT 'Default',
  `LTemp_Name` varchar(60) DEFAULT NULL,
  `LTemp_ListID` int(5) NOT NULL,
  `LTemp_Fields` int(1) NOT NULL DEFAULT 3,
  PRIMARY KEY (`LTemp_ID`),
  KEY `LTemp_ID` (`LTemp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lists_templates`
--

INSERT INTO `lists_templates` (`LTemp_ID`, `LTemp_Category`, `LTemp_Name`, `LTemp_ListID`, `LTemp_Fields`) VALUES
(1, 'Lists', 'Default', 2, 3),
(30, 'Home', 'Popup Home', 43, 3),
(31, 'Home', 'Mobile Home Offer', 38, 3),
(51, 'Home', 'HOME - Welcome', 38, 3),
(52, 'Lists', 'Review', 2, 3),
(53, 'Home', 'HOME - Accommodation', 37, 3),
(54, 'Lists', 'Accommodation', 37, 3),
(55, 'Home', 'HOME - Beach', 38, 3),
(56, 'Home', 'HOME - Gastronomy', 38, 3),
(57, 'Lists', 'Restaurant Slider', 3, 3),
(58, 'Home', 'HOME - Pool', 3, 3),
(59, 'Home', 'HOME - Experiences', 38, 3),
(60, 'Lists', 'Experience Slide', 3, 3),
(61, 'Home', 'HOME - Gardens', 38, 3),
(62, 'Home', 'HOME - Instagram', 38, 3),
(63, 'Home', 'HOME - Explore', 38, 3),
(64, 'Lists', 'Explore Slide', 36, 3),
(65, 'Home', 'HOME - Location', 38, 3),
(66, 'Lists', 'HOME - Beach 2', 38, 3),
(67, 'Lists', 'HOME - Experiences 2', 38, 3),
(68, 'Lists', 'Experiences Left', 3, 3),
(69, 'Lists', 'Experiences Right', 3, 3),
(70, 'Lists', 'Doc', 52, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lists_templates_rows`
--

DROP TABLE IF EXISTS `lists_templates_rows`;
CREATE TABLE IF NOT EXISTS `lists_templates_rows` (
  `LTR_ID` int(6) NOT NULL AUTO_INCREMENT,
  `LTR_Temp_ID` int(4) NOT NULL,
  `LTR_Rows` int(2) NOT NULL,
  `LTR_Cols` int(1) NOT NULL,
  `LTR_Cell` int(1) NOT NULL,
  `LTR_NumFields` int(1) NOT NULL,
  `LTR_Field` varchar(20) NOT NULL,
  `LTR_Module` varchar(4) NOT NULL,
  `LTR_Style_ID` int(4) NOT NULL,
  `LTR_Link_ID` int(4) NOT NULL,
  `LTR_Href` varchar(255) NOT NULL,
  `LTR_Href_Target` varchar(10) NOT NULL DEFAULT '_self',
  `LTR_PaddBottom` varchar(7) DEFAULT NULL,
  `LTR_Css` text DEFAULT NULL,
  `LTR_ClassID` varchar(255) DEFAULT NULL,
  `LTR_Cell_Style_ID` int(4) DEFAULT NULL,
  `LTR_Cell_ClassItemID` varchar(255) DEFAULT NULL,
  `LTR_Cell_Css` text DEFAULT NULL,
  `LTR_Cell_ClassID` varchar(255) DEFAULT NULL,
  `LTR_Temp_Style2_ID` int(4) DEFAULT NULL,
  `LTR_Row_Style_ID` int(4) DEFAULT NULL,
  `LTR_Row_SepDiv` varchar(7) DEFAULT NULL,
  `LTR_Row_PaddBottom` varchar(7) DEFAULT NULL,
  `LTR_Row_Css` text DEFAULT NULL,
  `LTR_Row_ClassID` varchar(255) DEFAULT NULL,
  `LTR_Row_ClassID_Bottom` varchar(255) DEFAULT NULL,
  `LTR_Row_Html_Top` text DEFAULT NULL,
  `LTR_Row_Html_Bottom` text DEFAULT NULL,
  `LTR_Row_Active` int(1) DEFAULT 1,
  `LTR_Temp_Style_ID` int(4) DEFAULT NULL,
  `LTR_Temp_Href` varchar(255) DEFAULT NULL,
  `LTR_Temp_Href_Target` varchar(10) NOT NULL DEFAULT '_self',
  `LTR_Temp_Html_Top` text DEFAULT NULL,
  `LTR_Temp_Html_Bottom` text DEFAULT NULL,
  `LTR_Temp_Link_ID` int(4) DEFAULT NULL,
  `LTR_Temp_PaddBottom` varchar(7) DEFAULT NULL,
  `LTR_Temp_Css` text DEFAULT NULL,
  `LTR_Preview` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`LTR_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=681 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lists_templates_rows`
--

INSERT INTO `lists_templates_rows` (`LTR_ID`, `LTR_Temp_ID`, `LTR_Rows`, `LTR_Cols`, `LTR_Cell`, `LTR_NumFields`, `LTR_Field`, `LTR_Module`, `LTR_Style_ID`, `LTR_Link_ID`, `LTR_Href`, `LTR_Href_Target`, `LTR_PaddBottom`, `LTR_Css`, `LTR_ClassID`, `LTR_Cell_Style_ID`, `LTR_Cell_ClassItemID`, `LTR_Cell_Css`, `LTR_Cell_ClassID`, `LTR_Temp_Style2_ID`, `LTR_Row_Style_ID`, `LTR_Row_SepDiv`, `LTR_Row_PaddBottom`, `LTR_Row_Css`, `LTR_Row_ClassID`, `LTR_Row_ClassID_Bottom`, `LTR_Row_Html_Top`, `LTR_Row_Html_Bottom`, `LTR_Row_Active`, `LTR_Temp_Style_ID`, `LTR_Temp_Href`, `LTR_Temp_Href_Target`, `LTR_Temp_Html_Top`, `LTR_Temp_Html_Bottom`, `LTR_Temp_Link_ID`, `LTR_Temp_PaddBottom`, `LTR_Temp_Css`, `LTR_Preview`) VALUES
(638, 65, 1, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(637, 65, 1, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(636, 65, 1, 2, 1, 1, '', 'T3', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(254, 1, 1, 1, 1, 3, '', '', 0, 0, '', '', '0', '', '', 0, NULL, '', '', 0, 31, '', '', '', '', NULL, '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(253, 1, 1, 1, 1, 2, '', '', 0, 0, '', '', '0', '', '', 0, NULL, '', '', 0, 31, '', '', '', '', NULL, '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(252, 1, 1, 1, 1, 1, 'List_Title', '', 5, 0, '', '', '0', '', '', 0, NULL, '', '', 0, 31, '', '', '', '', NULL, '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(350, 30, 1, 1, 1, 1, 'List_TextArea3', '', 0, 0, '', '', '0', '', '', 0, '', '', '', 0, 0, '', '', 'position:absolute; top:23%; width:100%;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(351, 30, 1, 1, 1, 2, '', '', 0, 0, '', '', '0', '', '', 0, '', '', '', 0, 0, '', '', 'position:absolute; top:23%; width:100%;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(352, 30, 1, 1, 1, 3, '', '', 0, 0, '', '', '0', '', '', 0, '', '', '', 0, 0, '', '', 'position:absolute; top:23%; width:100%;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(353, 30, 2, 1, 1, 1, '', '219', 0, 0, '', '', '0', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(354, 30, 2, 1, 1, 2, '', '', 0, 0, '', '', '0', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(355, 30, 2, 1, 1, 3, '', '', 0, 0, '', '', '0', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(361, 31, 1, 2, 1, 3, '', '', 0, 0, '', '', '0', '', '', 239, '', '', '', 0, 244, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'Rec_Field28', '_blank', '', '', 1, '', '', 0),
(360, 31, 1, 2, 1, 2, '', '', 0, 0, '', '', '0', '', '', 239, '', '', '', 0, 244, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'Rec_Field28', '_blank', '', '', 1, '', '', 0),
(359, 31, 1, 2, 1, 1, 'List_Desc', '', 240, 0, '', '', '0', 'padding:10px;', '', 239, '', '', '', 0, 244, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'Rec_Field28', '_blank', '', '', 1, '', '', 0),
(362, 31, 1, 2, 2, 1, 'List_Field1', '', 241, 0, '', '', '0', '', '', 239, '', '', '', 0, 244, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'Rec_Field28', '_blank', '', '', 1, '', '', 0),
(363, 31, 1, 2, 2, 2, 'List_Field2', '', 243, 0, '', '', '0', '', '', 239, '', '', '', 0, 244, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'Rec_Field28', '_blank', '', '', 1, '', '', 0),
(364, 31, 1, 2, 2, 3, '', '', 0, 0, '', '', '0', '', '', 239, '', '', '', 0, 244, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'Rec_Field28', '_blank', '', '', 1, '', '', 0),
(501, 51, 1, 2, 1, 1, 'List_Field1', '', 298, 0, '', '', '', '', 'class=\"wow fadeInLeft\"', 508, '', '', '', 0, 511, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(502, 51, 1, 2, 1, 2, 'List_Field2', '', 507, 0, '', '', '50', '', 'class=\"wow fadeInRight\"', 508, '', '', '', 0, 511, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(503, 51, 1, 2, 1, 3, '', 'T2', 0, 0, '', '', '', '', '', 508, '', '', '', 0, 511, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(504, 51, 1, 2, 2, 1, 'List_Editor1', '', 256, 0, '', '', '30', '', 'class=\"wow fadeInUp\"', 509, '', '', '', 0, 511, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(505, 51, 1, 2, 2, 2, '', '', 302, 86, 'Rec_Field28', '_self', '50', '', '', 509, '', '', '', 0, 511, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(506, 51, 1, 2, 2, 3, '', '269', 156, 0, '', '', '', '', 'class=\"reviewCont\"', 509, '', '', '', 0, 511, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(512, 52, 1, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(511, 52, 1, 1, 1, 2, 'List_Editor1', '', 515, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(510, 52, 1, 1, 1, 1, 'List_Title', '', 514, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(513, 53, 1, 2, 1, 1, '', 'T3', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(514, 53, 1, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(515, 53, 1, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(549, 53, 1, 2, 2, 1, 'List_Desc', '', 532, 0, '', '', '20', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(546, 53, 2, 1, 1, 1, '', '267', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(547, 53, 2, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(548, 53, 2, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(525, 54, 1, 1, 1, 1, '', '219', 0, 97, 'vID/', '_self', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(526, 54, 1, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(527, 54, 1, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(528, 54, 2, 2, 1, 1, '', 'T6', 0, 0, '', '', '', '', '', 525, '', '', '', 0, 212, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(529, 54, 2, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 525, '', '', '', 0, 212, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(530, 54, 2, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 525, '', '', '', 0, 212, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(531, 54, 2, 2, 2, 1, '', '270', 302, 0, '', '', '7', '', '', 526, '', '', '', 0, 212, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(532, 54, 2, 2, 2, 2, 'List_Field2', '', 673, 0, '', '', '', '', 'class=\"textRtoC\"', 526, '', '', '', 0, 212, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(533, 54, 2, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 526, '', '', '', 0, 212, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(534, 54, 3, 1, 1, 1, '', '234', 0, 0, '', '', '', '', '', 302, '', '', '', 0, 213, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(535, 54, 3, 1, 1, 2, '', '', 0, 86, 'vID/', '_self', '', '', '', 302, '', '', '', 0, 213, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(536, 54, 3, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 302, '', '', '', 0, 213, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(550, 53, 1, 2, 2, 2, '', '', 302, 86, 'Rec_Field28', '_self', '', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(551, 53, 1, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(552, 55, 1, 2, 1, 1, '', 'T3', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(553, 55, 1, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(554, 55, 1, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(555, 55, 1, 2, 2, 1, 'List_Desc', '', 532, 0, '', '', '20', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(556, 55, 1, 2, 2, 2, '', '', 302, 86, 'Rec_Field28', '_self', '', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(557, 55, 1, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(558, 55, 2, 1, 1, 1, '', 'T7', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(559, 55, 2, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(560, 55, 2, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(561, 56, 1, 1, 1, 1, '', 'T3', 0, 0, '', '', '', '', '', 537, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(562, 56, 1, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 537, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(563, 56, 1, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 537, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(564, 56, 2, 1, 1, 1, '', '271', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(565, 56, 2, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(566, 56, 2, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(567, 57, 1, 2, 1, 1, 'List_Title', '', 541, 0, '', '', '20', '', '', 538, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(568, 57, 1, 2, 1, 2, 'List_Desc', '', 256, 0, '', '', '20', '', '', 538, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(569, 57, 1, 2, 1, 3, '', '', 302, 86, 'vID/', '_self', '', '', '', 538, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(570, 57, 1, 2, 2, 1, '', 'T8', 0, 0, '', '', '', '', '', 539, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(571, 57, 1, 2, 2, 2, '', '', 0, 0, '', '', '', '', '', 539, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(572, 57, 1, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 539, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(573, 58, 1, 1, 1, 1, '', 'T9', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(574, 58, 1, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(575, 58, 1, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(576, 58, 2, 2, 1, 1, '', 'T3', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(577, 58, 2, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(578, 58, 2, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(579, 58, 2, 2, 2, 1, 'List_Desc', '', 532, 0, '', '', '20', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(580, 58, 2, 2, 2, 2, '', '', 302, 86, 'Rec_Field28', '_self', '', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(581, 58, 2, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 519, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(582, 59, 1, 1, 1, 1, '', 'T11', 548, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(583, 59, 1, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(584, 59, 1, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(585, 59, 2, 1, 1, 1, '', '272', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '</div>', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(586, 59, 2, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '</div>', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(587, 59, 2, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '</div>', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(588, 60, 1, 2, 2, 1, 'List_Title', '', 541, 0, '', '', '20', '', '', 547, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(589, 60, 1, 2, 2, 2, 'List_Desc', '', 691, 0, '', '', '20', '', '', 547, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(590, 60, 1, 2, 2, 3, '', '', 302, 86, 'vID/', '_self', '', '', '', 547, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(591, 60, 1, 2, 1, 1, '', 'T10', 0, 0, '', '', '', '', '', 546, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(592, 60, 1, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 546, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(593, 60, 1, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 546, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(594, 61, 1, 2, 1, 1, '', 'T3', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(595, 61, 1, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(596, 61, 1, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(597, 61, 1, 2, 2, 1, 'List_Desc', '', 532, 0, '', '', '20', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(598, 61, 1, 2, 2, 2, '', '', 302, 86, 'Rec_Field28', '_self', '', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(599, 61, 1, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(600, 61, 2, 1, 1, 1, '', 'T12', 156, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(601, 61, 2, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(602, 61, 2, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(603, 62, 1, 2, 1, 1, '', 'T3', 0, 0, '', '', '', '', '', 562, '213', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(604, 62, 1, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 562, '213', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(605, 62, 1, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 562, '213', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(606, 62, 1, 2, 2, 1, '', '222', 0, 0, '', '', '', '', '', 563, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(607, 62, 1, 2, 2, 2, '', '', 0, 0, '', '', '', '', '', 563, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(608, 62, 1, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 563, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(609, 62, 2, 2, 1, 1, 'List_Desc', '', 565, 0, '', '', '', '', '', 386, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(610, 62, 2, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 386, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(611, 62, 2, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 386, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(612, 62, 2, 2, 2, 1, 'List_Field3', '', 541, 0, '', '', '', '', 'class=\"wow fadeInUp\"', 564, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(613, 62, 2, 2, 2, 2, '', '', 0, 0, '', '', '', '', '', 564, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(614, 62, 2, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 564, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 257, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(615, 63, 1, 2, 1, 1, '', 'T3', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(616, 63, 1, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(617, 63, 1, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(618, 63, 1, 2, 2, 1, 'List_Desc', '', 532, 0, '', '', '', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(619, 63, 1, 2, 2, 2, '', '', 0, 0, '', '', '', '', '', 519, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(620, 63, 1, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 519, '', '', '', 0, 0, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(621, 63, 2, 1, 1, 1, '', '273', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(622, 63, 2, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(623, 63, 2, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(624, 64, 1, 1, 1, 1, '', '219', 0, 97, 'vID/vRec/', '_self', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(625, 64, 1, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(626, 64, 1, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(627, 64, 2, 2, 1, 1, '', 'T6', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(628, 64, 2, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(629, 64, 2, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(630, 64, 2, 2, 2, 1, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(631, 64, 2, 2, 2, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(632, 64, 2, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(633, 64, 3, 1, 1, 1, '', '', 0, 0, '', '', '', '', '', 302, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(634, 64, 3, 1, 1, 2, '', '', 0, 86, 'vID/vRec/', '_self', '5', '', '', 302, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(635, 64, 3, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 302, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(639, 65, 1, 2, 2, 1, 'List_Desc', '', 532, 0, '', '', '20', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(640, 65, 1, 2, 2, 2, '', '', 302, 86, 'Rec_Field28', '_self', '', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(641, 65, 1, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 519, '', '', '', 0, 511, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(642, 65, 2, 2, 1, 1, '', '219', 0, 0, '', '', '', '', 'class=\"wow fadeIn\"', 566, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(643, 65, 2, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 566, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(644, 65, 2, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 566, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(645, 65, 2, 2, 2, 1, '', '246', 0, 0, '', '', '', '', 'class=\"wow fadeIn\"', 567, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(646, 65, 2, 2, 2, 2, '', '', 0, 0, '', '', '', '', '', 567, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(647, 65, 2, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 567, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(648, 66, 1, 1, 1, 1, '', 'T9', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(649, 66, 1, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(650, 66, 1, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 386, '', '20', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(651, 66, 2, 2, 1, 1, '', 'T3', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(652, 66, 2, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(653, 66, 2, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 518, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(654, 66, 2, 2, 2, 1, 'List_Desc', '', 532, 0, '', '', '20', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(655, 66, 2, 2, 2, 2, '', '', 0, 86, '', '_self', '', '', 'class=\"wow fadeInUp\"', 519, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(656, 66, 2, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 519, '', '', '', 0, 511, '', '0', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(657, 67, 2, 2, 2, 1, 'List_Field3', '', 541, 0, '', '', '20', '', '', 547, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(658, 67, 2, 2, 2, 2, 'List_Desc', '', 691, 0, '', '', '20', '', '', 547, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(659, 67, 2, 2, 2, 3, '', '', 302, 86, 'Rec_Field28', '_self', '', '', '', 547, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(660, 67, 2, 2, 1, 1, '', 'T10', 0, 0, '', '', '', '', '', 546, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(661, 67, 2, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 546, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(662, 67, 2, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 546, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(663, 67, 1, 1, 1, 1, '', 'T11', 548, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(664, 67, 1, 1, 1, 2, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(665, 67, 1, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(666, 68, 1, 2, 1, 1, '', '219', 0, 0, '', '', '', '', '', 727, '510', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 264, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(667, 68, 1, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 727, '510', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 264, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(668, 68, 1, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 727, '510', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 264, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(669, 68, 1, 2, 2, 1, 'List_Editor1', '', 0, 0, '', '', '', '', '', 488, '', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 264, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(670, 68, 1, 2, 2, 2, '', '', 0, 0, '', '', '', '', '', 488, '', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 264, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(671, 68, 1, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 488, '', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 264, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(672, 69, 1, 2, 2, 1, '', '219', 0, 0, '', '', '', '', '', 727, '510', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 219, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(673, 69, 1, 2, 2, 2, '', '', 0, 0, '', '', '', '', '', 727, '510', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 219, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(674, 69, 1, 2, 2, 3, '', '', 0, 0, '', '', '', '', '', 727, '510', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 219, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(675, 69, 1, 2, 1, 1, 'List_Editor1', '', 0, 0, '', '', '', '', '', 488, '', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 219, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(676, 69, 1, 2, 1, 2, '', '', 0, 0, '', '', '', '', '', 488, '', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 219, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(677, 69, 1, 2, 1, 3, '', '', 0, 0, '', '', '', '', '', 488, '', '', '', 0, 510, '5%', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 219, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(678, 70, 1, 1, 1, 1, 'List_Title', '', 732, 0, '', '', '5', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(679, 70, 1, 1, 1, 2, '', '289', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0),
(680, 70, 1, 1, 1, 3, '', '', 0, 0, '', '', '', '', '', 0, '', '', '', 0, 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, 'vID/vRec/', '_self', '', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mail_users`
--

DROP TABLE IF EXISTS `mail_users`;
CREATE TABLE IF NOT EXISTS `mail_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` varchar(10) NOT NULL DEFAULT '1',
  `email` varchar(150) NOT NULL DEFAULT '',
  `fname` varchar(70) NOT NULL DEFAULT '',
  `lname` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `Mem_ID` bigint(100) NOT NULL AUTO_INCREMENT,
  `Mem_Usn` varchar(200) DEFAULT NULL,
  `Mem_Psw` varchar(50) DEFAULT NULL,
  `Mem_Name` varchar(60) DEFAULT NULL,
  `Mem_Surname` varchar(60) DEFAULT NULL,
  `Mem_Company` varchar(60) DEFAULT NULL,
  `Mem_Sector` varchar(35) DEFAULT NULL,
  `Mem_Position` varchar(35) DEFAULT NULL,
  `Mem_AFM` varchar(12) DEFAULT NULL,
  `Mem_Doy` varchar(60) DEFAULT NULL,
  `Mem_Address` varchar(255) DEFAULT NULL,
  `Mem_Address_Num` varchar(10) DEFAULT NULL,
  `Mem_City` varchar(60) DEFAULT NULL,
  `Mem_Area` varchar(255) DEFAULT NULL,
  `Mem_TK` varchar(6) DEFAULT NULL,
  `Mem_Country` varchar(40) DEFAULT NULL,
  `Mem_Zone` varchar(20) DEFAULT NULL,
  `Mem_Tel` varchar(15) DEFAULT NULL,
  `Mem_Mobile` varchar(25) NOT NULL,
  `Mem_Fax` varchar(15) DEFAULT NULL,
  `Mem_Email` varchar(120) DEFAULT NULL,
  `Mem_Birthday` varchar(10) DEFAULT NULL,
  `Mem_Gender` int(1) NOT NULL,
  `Mem_Icon` varchar(7) NOT NULL,
  `Mem_Discount` int(3) NOT NULL DEFAULT 0,
  `Mem_Creation_Date` timestamp NULL DEFAULT current_timestamp(),
  `Mem_Level` int(2) NOT NULL DEFAULT 1,
  `Mem_FullAccess` int(1) NOT NULL DEFAULT 0,
  `Mem_Balance` bigint(100) DEFAULT 0,
  PRIMARY KEY (`Mem_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2147483647 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 8192 kB';

-- --------------------------------------------------------

--
-- Table structure for table `members_access`
--

DROP TABLE IF EXISTS `members_access`;
CREATE TABLE IF NOT EXISTS `members_access` (
  `MemAcc_ID` int(7) NOT NULL AUTO_INCREMENT,
  `MemAcc_Mem_ID` bigint(100) NOT NULL DEFAULT 0,
  `MemAcc_Page_ID` int(7) DEFAULT NULL,
  `MemAcc_Page_Section` varchar(20) NOT NULL DEFAULT 'general',
  `MemAcc_Page_Lang` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`MemAcc_ID`),
  KEY `MemAcc_Mem_ID` (`MemAcc_Mem_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `method_lists_templates`
--

DROP TABLE IF EXISTS `method_lists_templates`;
CREATE TABLE IF NOT EXISTS `method_lists_templates` (
  `MLTemp_ID` int(4) NOT NULL AUTO_INCREMENT,
  `MLTemp_Name` varchar(60) DEFAULT NULL,
  `MLTemp_Fields` int(1) NOT NULL DEFAULT 3,
  PRIMARY KEY (`MLTemp_ID`),
  KEY `LTemp_ID` (`MLTemp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `method_lists_templates`
--

INSERT INTO `method_lists_templates` (`MLTemp_ID`, `MLTemp_Name`, `MLTemp_Fields`) VALUES
(1, 'Default', 2),
(2, 'All Records in One Page', 2),
(3, 'Categories - Include All Parents', 2),
(4, 'Categories - Include All Parents Loop', 2),
(5, 'Categories - Tabs SubMenu', 2),
(6, 'Categories - Tabs SubMenu (Preload)', 2),
(7, 'Categories List', 2),
(8, 'Categories List (Head Content)', 2),
(9, 'Categories List Records (Menu)', 2),
(10, 'Categories List Recs Head (Menu)', 2),
(11, 'Categories SubMenu', 2),
(12, 'Extranet', 2),
(16, 'Records Accordition', 2),
(17, 'Records List', 2),
(18, 'Records List (Preload)', 2),
(19, 'Records SubMenu', 2),
(20, 'Records Tabs SubMenu Preload', 2),
(21, 'Records List Header', 2),
(23, 'Search Results', 2),
(24, 'Show First Sub Category', 2),
(25, 'Sitemap', 2),
(26, 'Useful Links', 2),
(27, 'Offers List', 3),
(28, 'Default no Title', 2);

-- --------------------------------------------------------

--
-- Table structure for table `method_lists_templates_rows`
--

DROP TABLE IF EXISTS `method_lists_templates_rows`;
CREATE TABLE IF NOT EXISTS `method_lists_templates_rows` (
  `MLR_ID` int(6) NOT NULL AUTO_INCREMENT,
  `MLR_Temp_ID` int(4) NOT NULL,
  `MLR_Rows` int(2) NOT NULL,
  `MLR_Cols` int(1) NOT NULL,
  `MLR_Cell` int(1) NOT NULL,
  `MLR_NumFields` int(1) NOT NULL,
  `MLR_Method_list` varchar(4) NOT NULL,
  `MLR_Module` varchar(4) NOT NULL,
  `MLR_Style_ID` int(4) NOT NULL,
  `MLR_PaddBottom` varchar(7) NOT NULL DEFAULT '0',
  `MLR_Css` text DEFAULT NULL,
  `MLR_ClassID` varchar(255) DEFAULT NULL,
  `MLR_Cell_ClassID` varchar(255) DEFAULT NULL,
  `MLR_Cell_Style_ID` int(4) DEFAULT NULL,
  `MLR_Cell_ClassItemID` varchar(255) DEFAULT NULL,
  `MLR_Cell_Css` text DEFAULT NULL,
  `MLR_Row_Style_ID` int(4) NOT NULL,
  `MLR_Inside_Row_Style_ID` int(4) DEFAULT NULL,
  `MLR_Row_SepDiv` varchar(7) DEFAULT NULL,
  `MLR_Row_PaddBottom` varchar(7) DEFAULT NULL,
  `MLR_Row_ClassID` varchar(255) DEFAULT NULL,
  `MLR_Row_ClassID_Bottom` varchar(255) DEFAULT NULL,
  `MLR_Row_Css` text DEFAULT NULL,
  `MLR_Row_Active` int(1) DEFAULT 1,
  `MLR_Preview` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`MLR_ID`),
  KEY `MLR_ID` (`MLR_ID`),
  KEY `MLR_Temp_ID` (`MLR_Temp_ID`),
  KEY `MLR_Rows` (`MLR_Rows`),
  KEY `MLR_Cols` (`MLR_Cols`),
  KEY `MLR_Cell` (`MLR_Cell`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `method_lists_templates_rows`
--

INSERT INTO `method_lists_templates_rows` (`MLR_ID`, `MLR_Temp_ID`, `MLR_Rows`, `MLR_Cols`, `MLR_Cell`, `MLR_NumFields`, `MLR_Method_list`, `MLR_Module`, `MLR_Style_ID`, `MLR_PaddBottom`, `MLR_Css`, `MLR_ClassID`, `MLR_Cell_ClassID`, `MLR_Cell_Style_ID`, `MLR_Cell_ClassItemID`, `MLR_Cell_Css`, `MLR_Row_Style_ID`, `MLR_Inside_Row_Style_ID`, `MLR_Row_SepDiv`, `MLR_Row_PaddBottom`, `MLR_Row_ClassID`, `MLR_Row_ClassID_Bottom`, `MLR_Row_Css`, `MLR_Row_Active`, `MLR_Preview`) VALUES
(1, 1, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle center\"', '', 0, '', '', 219, 0, '', '', '', '', 'display:block; margin:auto;', 1, 0),
(2, 1, 1, 1, 1, 2, '33', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', '', 'display:block; margin:auto;', 1, 0),
(3, 2, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle center\"', '', 0, '', '', 219, 0, '', '', '', '', 'display:block; max-width:1180px; margin:auto;', 1, 0),
(4, 2, 1, 1, 1, 2, '24', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', '', 'display:block; max-width:1180px; margin:auto;', 1, 0),
(5, 3, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(6, 3, 1, 1, 1, 2, '9', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(7, 4, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(8, 4, 1, 1, 1, 2, '10', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(9, 5, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(10, 5, 1, 1, 1, 2, '42', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(11, 6, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(12, 6, 1, 1, 1, 2, '12', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(13, 7, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(14, 7, 1, 1, 1, 2, '56', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(15, 8, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(16, 8, 1, 1, 1, 2, '63', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(17, 9, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle center\"', '', 386, '', '', 219, 0, '', '80', '', '', 'display:block; margin:auto;', 1, 0),
(18, 9, 1, 1, 1, 2, '60', '', 228, '0', '', '', '', 386, '', '', 219, 0, '', '80', '', '', 'display:block; margin:auto;', 1, 0),
(19, 10, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(20, 10, 1, 1, 1, 2, '61', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(21, 11, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(22, 11, 1, 1, 1, 2, '48', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(23, 12, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(24, 12, 1, 1, 1, 2, '54', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(31, 16, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(32, 16, 1, 1, 1, 2, '34', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(33, 17, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle center\"', '', 0, '', '', 264, 380, '', '80', '', '', 'display:block;  margin:auto;', 1, 0),
(34, 17, 1, 1, 1, 2, '19', '', 0, '0', '', '', '', 0, '', '', 264, 380, '', '80', '', '', 'display:block;  margin:auto;', 1, 0),
(35, 18, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(36, 18, 1, 1, 1, 2, '41', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(37, 19, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(38, 19, 1, 1, 1, 2, '43', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(39, 20, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(40, 20, 1, 1, 1, 2, '25', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(41, 21, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(42, 21, 1, 1, 1, 2, '55', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(45, 23, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(46, 23, 1, 1, 1, 2, '36', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(47, 24, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(48, 24, 1, 1, 1, 2, '28', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(49, 25, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(50, 25, 1, 1, 1, 2, '35', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(51, 26, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(52, 26, 1, 1, 1, 2, '50', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; max-width:1180px; margin:auto;', 1, 0),
(55, 27, 1, 1, 1, 1, '', '225', 5, '0', '', 'class=\"headerTitle\"', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; margin:auto;', 1, 0),
(56, 27, 1, 1, 1, 2, '64', '', 0, '0', '', '', '', 0, '', '', 219, 0, '', '', '', NULL, 'display:block; margin:auto;', 1, 0),
(57, 28, 1, 1, 1, 1, '', '', 0, '0', '', '', '', 0, '', '', 264, 0, '', '', '', '', 'display:block; margin:auto;', 1, 0),
(58, 28, 1, 1, 1, 2, '33', '', 0, '0', '', '', '', 0, '', '', 264, 0, '', '', '', '', 'display:block; margin:auto;', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `Mod_ID` int(5) NOT NULL AUTO_INCREMENT,
  `Mod_Category` varchar(40) NOT NULL,
  `Mod_Page` varchar(30) NOT NULL,
  `Mod_Title` varchar(40) NOT NULL,
  `Mod_Version` varchar(10) NOT NULL DEFAULT '1.0',
  `Mod_DynamicList` int(1) NOT NULL DEFAULT 0,
  `Mod_Desc` varchar(255) NOT NULL,
  `Mod_GetFromSection` varchar(15) NOT NULL DEFAULT 'general',
  `Mod_GetPageID` varchar(100) DEFAULT NULL,
  `Mod_HeaderCont` int(1) NOT NULL DEFAULT 0,
  `Mod_StartRec` int(3) NOT NULL DEFAULT 0,
  `Mod_LimitRecs` int(4) NOT NULL DEFAULT 9999,
  `Mod_StepRec` int(3) NOT NULL DEFAULT 2,
  `Mod_DivClass` int(7) DEFAULT NULL,
  `Mod_ItemDivClass` int(7) DEFAULT NULL,
  `Mod_Paging` int(1) NOT NULL DEFAULT 0,
  `Mod_Lists_Temp` int(4) DEFAULT NULL,
  `Mod_Lists_Temp2` int(4) DEFAULT NULL,
  `Mod_ShowMenu` int(1) NOT NULL DEFAULT 0,
  `Mod_ShowPageTitle` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Mod_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=279 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`Mod_ID`, `Mod_Category`, `Mod_Page`, `Mod_Title`, `Mod_Version`, `Mod_DynamicList`, `Mod_Desc`, `Mod_GetFromSection`, `Mod_GetPageID`, `Mod_HeaderCont`, `Mod_StartRec`, `Mod_LimitRecs`, `Mod_StepRec`, `Mod_DivClass`, `Mod_ItemDivClass`, `Mod_Paging`, `Mod_Lists_Temp`, `Mod_Lists_Temp2`, `Mod_ShowMenu`, `Mod_ShowPageTitle`) VALUES
(207, 'basic', 'head_content', 'Header Content', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(208, 'basic', 'mainscript', 'Main Page', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(209, 'menu', 'menu', 'Menu', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(210, 'basic', 'logo', 'Logo', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(211, 'basic', 'translations', 'Translations', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(212, 'lists', 'booknow', 'Book Now', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(213, 'footer', 'address', 'Address', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(214, 'footer', 'copyright', 'Copyright', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(215, 'footer', 'signature', 'Signature', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(261, 'forms', 'contact_send', 'Contact Send', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(263, 'lists', 'attached_records', 'Attached Records', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(218, 'menu', 'top_links', 'Top Links', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(219, 'photos', 'image1', 'Image 1', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(220, 'photos', 'image2', 'Image 2', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(222, 'photos', 'responsive_fancybox', 'Photo Gallery', '2.2', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(262, 'forms', 'contact', 'Contact Form', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(223, 'javascripts', 'jquery-scrolltofixed-min.js', 'Sticky Master', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(224, 'javascripts', 'dummy', 'Back to Top', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(225, 'basic', 'category_name', 'Category Name', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(226, 'footer', 'social', 'Social Media Footer', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(227, 'social', 'social_media', 'Social Media', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(230, 'lists', 'show_offer_button', 'Offer Button', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(231, 'photos', 'bxslider_header', 'BxSlider Header', '1.0', 0, '', 'general', '', 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(232, 'javascripts', 'lazysizes.min.js', 'LazyLoad', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(233, 'lists', 'hotel_price_widget', 'Hotel Price Widget', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(234, 'lists', 'book_this_room', 'Book This Room', '1.0', 0, '', 'general', '', 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(235, 'lists', 'home_rec_if_statement', 'Home Rec If Statement', '1.0', 0, '', 'general', '', 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(236, 'lists', 'blog_menu', 'Blog Menu', '1.1', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(237, 'lists', 'photojournalism', 'Photojournalism', '1.2', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(239, 'javascripts', 'dummy', 'Scroll Buttons Home', '1.1', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(267, 'lists', 'slider_accommodation', 'Slider Accommodation', '1.0', 1, '', 'general', 'en180', 0, 0, 9999, 2, 0, 0, 0, 54, 54, 0, 0),
(241, 'photos', 'image_as_bg', 'Image as Bg', '1.0', 0, '', 'general', '', 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(242, 'photos', 'image2_as_bg', 'Image 2 as Background', '1.0', 0, '', 'general', '', 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(243, 'photos', 'image_responsive_parallax', 'Image Responsive Parallax', '0.6.2', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(245, 'lists', 'gmap_iframe', 'Google Map Iframe', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(246, 'lists', 'gmap', 'Google Map Popup', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(247, 'footer', 'logo_footer', 'Logo Footer', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(248, 'footer', 'useful_links', 'Useful Links Footer', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(250, 'attached_records', 'image1', 'Image 1 (Attached)', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(251, 'attached_records', 'image2', 'Image 2 (Attached)', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(252, 'attached_records', 'image3', 'Image 3 (Attached)', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(253, 'attached_records', 'image4', 'Image 4 (Attached)', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(254, 'attached_records', 'image5', 'Image 5 (Attached)', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(255, 'attached_records', 'file1', 'File 1 (Attached)', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(256, 'attached_records', 'image6', 'Image 6 (Attached)', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(257, 'photos', 'image3', 'Image 3', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(258, 'photos', 'image4', 'Image 4', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(259, 'photos', 'image5', 'Image 5', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(260, 'photos', 'image6', 'Image 6', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(265, 'basic', 'langs', 'Languages', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(268, 'menu', 'menu_styles', 'Menu Styles', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(269, 'lists', 'slider_reviews', 'Slider Reviews', '1.0', 1, '', 'general', 'en179', 0, 0, 9999, 2, 0, 0, 0, 52, 52, 0, 0),
(270, 'lists', 'acc_persons', 'Acc Persons', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(271, 'lists', 'restaurants_slider', 'Restaurants Slider', '1.0', 1, '', 'general', 'en185', 0, 0, 9999, 2, 0, 0, 0, 57, 57, 0, 0),
(272, 'lists', 'slider_experiences', 'Slider Experiences', '1.0', 1, '', 'general', 'en188', 0, 0, 9999, 2, 0, 0, 0, 60, 60, 0, 0),
(273, 'lists', 'slider_explore', 'Slider Explore', '1.0', 1, '', 'general', 'en191', 0, 0, 9999, 2, 0, 0, 0, 64, 64, 0, 0),
(274, 'lists', 'bannersH', 'Banners Horizontal', '1.0', 0, '', 'general', 'en146', 0, 0, 9999, 2, 0, 0, 0, 0, 0, 0, 0),
(275, 'lists', 'acc_info_btns', 'acc_info_btns', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(276, 'photos', 'photo_gallery_acc', 'Photo Gallery Accommodation', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0),
(277, 'lists', 'imternal_subcats_dynamic', 'Internal Subcats Dynamic', '1.0', 1, '', 'general', 'en180', 0, 0, 9999, 2, 0, 0, 0, 54, 54, 0, 0),
(278, 'lists', 'parent_title', 'Parent Title', '1.0', 0, '', 'general', NULL, 0, 0, 9999, 2, NULL, NULL, 0, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_att_templates`
--

DROP TABLE IF EXISTS `module_att_templates`;
CREATE TABLE IF NOT EXISTS `module_att_templates` (
  `MTemp_ID` int(4) NOT NULL AUTO_INCREMENT,
  `MTemp_Category` varchar(20) NOT NULL DEFAULT 'Default',
  `MTemp_Name` varchar(60) DEFAULT NULL,
  `MTemp_ListID` int(5) NOT NULL,
  `MTemp_Fields` int(1) NOT NULL DEFAULT 3,
  PRIMARY KEY (`MTemp_ID`),
  KEY `LTemp_ID` (`MTemp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_att_templates`
--

INSERT INTO `module_att_templates` (`MTemp_ID`, `MTemp_Category`, `MTemp_Name`, `MTemp_ListID`, `MTemp_Fields`) VALUES
(25, 'Pages', 'Top Page Mobile', 2, 1),
(27, 'Pages', 'Footer Page Mobile', 1, 3),
(28, 'Pages', 'Top Page', 1, 3),
(29, 'Pages', 'Footer Page', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `module_att_templates_rows`
--

DROP TABLE IF EXISTS `module_att_templates_rows`;
CREATE TABLE IF NOT EXISTS `module_att_templates_rows` (
  `MTR_ID` int(6) NOT NULL AUTO_INCREMENT,
  `MTR_Temp_ID` int(4) NOT NULL,
  `MTR_Lang` varchar(2) DEFAULT NULL,
  `MTR_Rows` int(2) NOT NULL,
  `MTR_Cols` int(1) NOT NULL,
  `MTR_Cell` int(1) NOT NULL,
  `MTR_NumFields` int(1) NOT NULL,
  `MTR_Field` varchar(20) NOT NULL,
  `MTR_FieldText` text DEFAULT NULL,
  `MTR_Module` varchar(5) NOT NULL,
  `MTR_Style_ID` int(4) NOT NULL,
  `MTR_Link_ID` int(4) NOT NULL,
  `MTR_Href` varchar(255) NOT NULL,
  `MTR_Href_Target` varchar(8) NOT NULL DEFAULT '_self',
  `MTR_PaddBottom` varchar(7) NOT NULL DEFAULT '0',
  `MTR_Css` text DEFAULT NULL,
  `MTR_ClassID` varchar(255) DEFAULT NULL,
  `MTR_Cell_Style_ID` int(4) DEFAULT NULL,
  `MTR_Cell_ClassItemID` varchar(255) DEFAULT NULL,
  `MTR_Cell_Css` text DEFAULT NULL,
  `MTR_Cell_ClassID` text DEFAULT NULL,
  `MTR_Row_Style_ID` int(4) DEFAULT NULL,
  `MTR_Row_SepDiv` varchar(7) DEFAULT NULL,
  `MTR_Row_PaddBottom` varchar(7) DEFAULT NULL,
  `MTR_Row_Css` text DEFAULT NULL,
  `MTR_Row_ClassID` varchar(255) DEFAULT NULL,
  `MTR_Row_ClassID_Bottom` varchar(255) DEFAULT NULL,
  `MTR_Row_Html_Top` text DEFAULT NULL,
  `MTR_Row_Html_Bottom` text DEFAULT NULL,
  `MTR_Row_Active` int(1) DEFAULT 1,
  `MTR_Temp_Style_ID` int(4) DEFAULT NULL,
  `MTR_Temp_PaddBottom` varchar(7) DEFAULT NULL,
  `MTR_Temp_EShop` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `MTR_Temp_Css` text DEFAULT NULL,
  `MTR_Temp_ClassID` varchar(255) DEFAULT NULL,
  `MTR_Preview` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`MTR_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=509 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_att_templates_rows`
--

INSERT INTO `module_att_templates_rows` (`MTR_ID`, `MTR_Temp_ID`, `MTR_Lang`, `MTR_Rows`, `MTR_Cols`, `MTR_Cell`, `MTR_NumFields`, `MTR_Field`, `MTR_FieldText`, `MTR_Module`, `MTR_Style_ID`, `MTR_Link_ID`, `MTR_Href`, `MTR_Href_Target`, `MTR_PaddBottom`, `MTR_Css`, `MTR_ClassID`, `MTR_Cell_Style_ID`, `MTR_Cell_ClassItemID`, `MTR_Cell_Css`, `MTR_Cell_ClassID`, `MTR_Row_Style_ID`, `MTR_Row_SepDiv`, `MTR_Row_PaddBottom`, `MTR_Row_Css`, `MTR_Row_ClassID`, `MTR_Row_ClassID_Bottom`, `MTR_Row_Html_Top`, `MTR_Row_Html_Bottom`, `MTR_Row_Active`, `MTR_Temp_Style_ID`, `MTR_Temp_PaddBottom`, `MTR_Temp_EShop`, `MTR_Temp_Css`, `MTR_Temp_ClassID`, `MTR_Preview`) VALUES
(401, 25, 'en', 2, 4, 4, 1, '', '', '212', 0, 0, '', '', '0', '', '', 161, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(400, 25, 'en', 2, 4, 3, 1, '', '', '', 0, 77, 'vID/vRec/', '_blank', '0', '', '', 161, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(398, 25, 'en', 2, 4, 1, 1, '', '', '209', 0, 0, '', '', '0', 'padding:0 5px;', '', 161, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(399, 25, 'en', 2, 4, 2, 1, '', '', '', 0, 75, 'tel:', '_self', '0', '', '', 161, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(396, 27, 'en', 1, 1, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 206, '', '', '', 0, '', '', 'margin:auto; padding-top:30px; padding-bottom:40px;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(395, 27, 'en', 1, 1, 1, 2, '', '', '213', 0, 0, '', '', '0', '', '', 206, '', '', '', 0, '', '', 'margin:auto; padding-top:30px; padding-bottom:40px;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(394, 27, 'en', 1, 1, 1, 1, '', '', '247', 0, 0, '', '', '25', 'padding:0 20px;max-width:250px;margin:auto;', '', 206, '', '', '', 0, '', '', 'margin:auto; padding-top:30px; padding-bottom:40px;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(426, 25, 'en', 1, 2, 1, 1, '', '', '210', 0, 0, '', '', '0', 'padding:5px;', '', 183, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(402, 28, 'en', 1, 3, 2, 1, '', '', '210', 0, 0, '', '', '0', 'padding:5px;', '', 260, '206', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(403, 28, 'en', 1, 3, 2, 2, '', '', '', 0, 0, '', '', '0', '', '', 260, '206', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(404, 28, 'en', 1, 3, 2, 3, '', '', '', 0, 0, '', '', '0', '', '', 260, '206', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(405, 28, 'en', 1, 3, 1, 1, '', '', '209', 0, 0, '', '', '0', '', '', 261, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(406, 28, 'en', 1, 3, 1, 2, '', '', '', 0, 0, '', '', '0', '', '', 261, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(407, 28, 'en', 1, 3, 1, 3, '', '', '', 295, 0, '', '', '0', '', '', 261, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(408, 28, 'en', 1, 3, 3, 1, '', '', '265', 504, 0, '', '', '0', '', '', 262, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(409, 28, 'en', 1, 3, 3, 2, '', '', '212', 0, 0, '', '', '0', '', '', 262, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(410, 28, 'en', 1, 3, 3, 3, '', '', '', 0, 0, '', '', '0', '', '', 262, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(411, 29, 'en', 1, 4, 1, 1, '', '', '210', 0, 0, '', '', '10', 'display:table;', '', 568, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(412, 29, 'en', 1, 4, 1, 2, '', '', '', 0, 0, '', '', '0', '', '', 568, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(413, 29, 'en', 1, 4, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 568, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(414, 29, 'en', 1, 4, 2, 1, '', '', '213', 0, 0, '', '', '10', '', '', 569, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(415, 29, 'en', 1, 4, 2, 2, '', '', '', 0, 0, '', '', '0', '', '', 569, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(416, 29, 'en', 1, 4, 2, 3, '', '', '', 0, 0, '', '', '0', '', '', 569, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(417, 29, 'en', 1, 4, 3, 1, '', '', '274', 206, 0, '', '', '0', '', '', 570, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(418, 29, 'en', 1, 4, 3, 2, '', '', '', 0, 0, '', '', '0', '', '', 570, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(419, 29, 'en', 1, 4, 3, 3, '', '', '', 0, 0, '', '', '0', '', '', 570, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(420, 29, 'en', 2, 2, 1, 1, '', '', '214', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(421, 29, 'en', 2, 2, 1, 2, '', '', '', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(422, 29, 'en', 2, 2, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(423, 29, 'en', 2, 2, 2, 1, '', '', '215', 302, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(424, 29, 'en', 2, 2, 2, 2, '', '', '', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(425, 29, 'en', 2, 2, 2, 3, '', '', '', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(427, 25, 'en', 1, 2, 2, 1, '', '', '265', 211, 0, '', '', '0', '', '', 182, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(428, 27, 'en', 2, 1, 1, 1, '', '', '214', 0, 0, '', '', '5', '', '', 206, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(429, 27, 'en', 2, 1, 1, 2, '', '', '215', 0, 0, '', '', '20', '', '', 206, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(430, 27, 'en', 2, 1, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 206, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(431, 25, 'el', 2, 4, 4, 1, '', '', '212', 0, 0, '', '', '0', '', '', 161, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(432, 25, 'el', 2, 4, 3, 1, '', '', '', 0, 77, 'vID/vRec/', '_blank', '0', '', '', 161, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(433, 25, 'el', 2, 4, 1, 1, '', '', '209', 0, 0, '', '', '0', '', '', 161, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(434, 25, 'el', 2, 4, 2, 1, '', '', '', 0, 75, 'tel:', '_self', '0', '', '', 161, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(435, 25, 'el', 1, 2, 1, 1, '', '', '210', 0, 0, '', '', '0', 'padding:5px;', '', 183, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(436, 25, 'el', 1, 2, 2, 1, '', '', '265', 211, 0, '', '', '0', '', '', 182, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(437, 27, 'el', 1, 1, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 206, '', '', '', 0, '', '', 'margin:auto; padding-top:30px; padding-bottom:40px;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(438, 27, 'el', 1, 1, 1, 2, '', '', '213', 0, 0, '', '', '0', '', '', 206, '', '', '', 0, '', '', 'margin:auto; padding-top:30px; padding-bottom:40px;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(439, 27, 'el', 1, 1, 1, 1, '', '', '247', 0, 0, '', '', '25', 'padding:0 20px;max-width:250px;margin:auto;', '', 206, '', '', '', 0, '', '', 'margin:auto; padding-top:30px; padding-bottom:40px;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(440, 27, 'el', 2, 1, 1, 1, '', '', '214', 0, 0, '', '', '5', '', '', 206, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(441, 27, 'el', 2, 1, 1, 2, '', '', '215', 0, 0, '', '', '20', '', '', 206, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(442, 27, 'el', 2, 1, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 206, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(443, 28, 'el', 1, 3, 2, 1, '', '', '210', 0, 0, '', '', '0', '', '', 260, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(444, 28, 'el', 1, 3, 2, 2, '', '', '', 0, 0, '', '', '0', '', '', 260, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(445, 28, 'el', 1, 3, 2, 3, '', '', '', 0, 0, '', '', '0', '', '', 260, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(446, 28, 'el', 1, 3, 1, 1, '', '', '209', 293, 0, '', '', '0', '', '', 261, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(447, 28, 'el', 1, 3, 1, 2, '', '', '', 0, 0, '', '', '0', '', '', 261, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(448, 28, 'el', 1, 3, 1, 3, '', '', '', 295, 0, '', '', '0', '', '', 261, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(449, 28, 'el', 1, 3, 3, 1, '', '', '', 0, 0, '', '', '0', '', '', 262, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(450, 28, 'el', 1, 3, 3, 2, '', '', '', 0, 0, '', '', '0', '', '', 262, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(451, 28, 'el', 1, 3, 3, 3, '', '', '', 0, 0, '', '', '0', '', '', 262, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(452, 29, 'el', 1, 4, 1, 1, '', 'USEFUL LINKS', '248', 0, 0, '', '', '0', '', '', 190, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;padding-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(453, 29, 'el', 1, 4, 1, 2, '', '', '', 0, 0, '', '', '0', '', '', 190, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;padding-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(454, 29, 'el', 1, 4, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 190, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;padding-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(455, 29, 'el', 1, 4, 2, 1, '', '', '247', 0, 0, '', '', '20', 'max-width:305px;margin:auto;', '', 190, '206', '', '', 0, '', '', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;padding-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(456, 29, 'el', 1, 4, 2, 2, '', '', '213', 0, 0, '', '', '0', '', '', 190, '206', '', '', 0, '', '', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;padding-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(457, 29, 'el', 1, 4, 2, 3, '', '', '', 0, 0, '', '', '0', '', '', 190, '206', '', '', 0, '', '', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;padding-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(458, 29, 'el', 1, 4, 3, 1, '', 'FOLLOW US', '227', 0, 0, '', '', '0', '', '', 190, '300', '', '', 0, '', '', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;padding-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(459, 29, 'el', 1, 4, 3, 2, '', '', '', 0, 0, '', '', '0', '', '', 190, '300', '', '', 0, '', '', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;padding-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(460, 29, 'el', 1, 4, 3, 3, '', '', '', 0, 0, '', '', '0', '', '', 190, '300', '', '', 0, '', '', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;padding-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(461, 29, 'el', 2, 2, 1, 1, '', '', '214', 213, 0, '', '', '0', '', '', 165, '300', 'padding:0 10px;', '', 0, '', '20', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;margin-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(462, 29, 'el', 2, 2, 1, 2, '', '', '', 0, 0, '', '', '0', '', '', 165, '300', 'padding:0 10px;', '', 0, '', '20', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;margin-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(463, 29, 'el', 2, 2, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 165, '300', 'padding:0 10px;', '', 0, '', '20', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;margin-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(464, 29, 'el', 2, 2, 2, 1, '', '', '215', 213, 0, '', '', '0', '', '', 165, '', 'padding:0 10px;', '', 0, '', '20', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;margin-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(465, 29, 'el', 2, 2, 2, 2, '', '', '', 0, 0, '', '', '0', '', '', 165, '', 'padding:0 10px;', '', 0, '', '20', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;margin-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(466, 29, 'el', 2, 2, 2, 3, '', '', '', 0, 0, '', '', '0', '', '', 165, '', 'padding:0 10px;', '', 0, '', '20', 'display:block; width:100%; margin:auto;border-top:1px solid #646363;margin-top:50px;', '', 'class=\"widthLarge\"', '', '', 1, 323, '', 0, '', '', 0),
(467, 29, 'en', 1, 4, 4, 1, '', 'Share your memories', '226', 0, 0, '', '', '0', '', '', 571, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(468, 29, 'en', 1, 4, 4, 2, '', '', '', 0, 0, '', '', '0', '', '', 571, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(469, 29, 'en', 1, 4, 4, 3, '', '', '', 0, 0, '', '', '0', '', '', 571, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(470, 25, 'it', 2, 4, 4, 1, '', '', '212', 0, 0, '', '', '0', '', '', 161, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(471, 25, 'it', 2, 4, 3, 1, '', '', '', 0, 77, 'vID/vRec/', '_blank', '0', '', '', 161, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(472, 25, 'it', 2, 4, 1, 1, '', '', '209', 0, 0, '', '', '0', '', '', 161, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(473, 25, 'it', 2, 4, 2, 1, '', '', '', 0, 75, 'tel:', '_self', '0', '', '', 161, '', '', '', 297, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(474, 25, 'it', 1, 2, 1, 1, '', '', '210', 0, 0, '', '', '0', 'padding:5px;', '', 183, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(475, 25, 'it', 1, 2, 2, 1, '', '', '265', 211, 0, '', '', '0', '', '', 182, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(476, 27, 'it', 1, 1, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 206, '', '', '', 0, '', '', 'margin:auto; padding-top:30px; padding-bottom:40px;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(477, 27, 'it', 1, 1, 1, 2, '', '', '213', 0, 0, '', '', '0', '', '', 206, '', '', '', 0, '', '', 'margin:auto; padding-top:30px; padding-bottom:40px;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(478, 27, 'it', 1, 1, 1, 1, '', '', '247', 0, 0, '', '', '25', 'padding:0 20px;max-width:250px;margin:auto;', '', 206, '', '', '', 0, '', '', 'margin:auto; padding-top:30px; padding-bottom:40px;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(479, 27, 'it', 2, 1, 1, 1, '', '', '214', 0, 0, '', '', '5', '', '', 206, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(480, 27, 'it', 2, 1, 1, 2, '', '', '215', 0, 0, '', '', '20', '', '', 206, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(481, 27, 'it', 2, 1, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 206, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(482, 28, 'it', 1, 3, 2, 1, '', '', '210', 0, 0, '', '', '0', 'padding:5px;', '', 260, '206', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(483, 28, 'it', 1, 3, 2, 2, '', '', '', 0, 0, '', '', '0', '', '', 260, '206', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(484, 28, 'it', 1, 3, 2, 3, '', '', '', 0, 0, '', '', '0', '', '', 260, '206', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(485, 28, 'it', 1, 3, 1, 1, '', '', '209', 0, 0, '', '', '0', '', '', 261, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(486, 28, 'it', 1, 3, 1, 2, '', '', '', 0, 0, '', '', '0', '', '', 261, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(487, 28, 'it', 1, 3, 1, 3, '', '', '', 295, 0, '', '', '0', '', '', 261, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(488, 28, 'it', 1, 3, 3, 1, '', '', '265', 504, 0, '', '', '0', '', '', 262, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(489, 28, 'it', 1, 3, 3, 2, '', '', '212', 0, 0, '', '', '0', '', '', 262, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(490, 28, 'it', 1, 3, 3, 3, '', '', '', 0, 0, '', '', '0', '', '', 262, '', '', '', 294, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(491, 29, 'it', 1, 4, 1, 1, '', '', '210', 0, 0, '', '', '10', 'display:table;', '', 568, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(492, 29, 'it', 1, 4, 1, 2, '', '', '', 0, 0, '', '', '0', '', '', 568, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(493, 29, 'it', 1, 4, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 568, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(494, 29, 'it', 1, 4, 2, 1, '', '', '213', 0, 0, '', '', '10', '', '', 569, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(495, 29, 'it', 1, 4, 2, 2, '', '', '', 0, 0, '', '', '0', '', '', 569, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(496, 29, 'it', 1, 4, 2, 3, '', '', '', 0, 0, '', '', '0', '', '', 569, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(497, 29, 'it', 1, 4, 3, 1, '', '', '274', 206, 0, '', '', '0', '', '', 570, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(498, 29, 'it', 1, 4, 3, 2, '', '', '', 0, 0, '', '', '0', '', '', 570, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(499, 29, 'it', 1, 4, 3, 3, '', '', '', 0, 0, '', '', '0', '', '', 570, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(500, 29, 'it', 2, 2, 1, 1, '', '', '214', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(501, 29, 'it', 2, 2, 1, 2, '', '', '', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(502, 29, 'it', 2, 2, 1, 3, '', '', '', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(503, 29, 'it', 2, 2, 2, 1, '', '', '215', 302, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(504, 29, 'it', 2, 2, 2, 2, '', '', '', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(505, 29, 'it', 2, 2, 2, 3, '', '', '', 0, 0, '', '', '0', '', '', 361, '', 'padding:0 10px;', '', 0, '', '50', '', '', '', '', '', 1, 386, '', 0, '', '', 0),
(506, 29, 'it', 1, 4, 4, 1, '', 'Share your memories', '226', 0, 0, '', '', '0', '', '', 571, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(507, 29, 'it', 1, 4, 4, 2, '', '', '', 0, 0, '', '', '0', '', '', 571, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0),
(508, 29, 'it', 1, 4, 4, 3, '', '', '', 0, 0, '', '', '0', '', '', 571, '', '', '', 0, '', '30', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 386, '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_dyn_templates`
--

DROP TABLE IF EXISTS `module_dyn_templates`;
CREATE TABLE IF NOT EXISTS `module_dyn_templates` (
  `DMTemp_ID` int(4) NOT NULL AUTO_INCREMENT,
  `DMTemp_Category` varchar(20) NOT NULL DEFAULT 'Default',
  `DMTemp_Name` varchar(60) DEFAULT NULL,
  `DMTemp_ListID` int(5) NOT NULL,
  `DMTemp_Fields` int(1) NOT NULL DEFAULT 3,
  PRIMARY KEY (`DMTemp_ID`),
  KEY `LTemp_ID` (`DMTemp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_dyn_templates`
--

INSERT INTO `module_dyn_templates` (`DMTemp_ID`, `DMTemp_Category`, `DMTemp_Name`, `DMTemp_ListID`, `DMTemp_Fields`) VALUES
(2, 'Premade', '1+1 image', 38, 1),
(3, 'Premade', 'Home Title + Subtitle', 38, 3),
(4, 'Premade', 'Home Description + more', 38, 3),
(5, 'Templates', 'Home Titles & Description + more', 37, 3),
(6, 'Templates', 'Accommodation Title + Description', 37, 3),
(7, 'Premade', '20% image + 80% image', 38, 1),
(8, 'Premade', '1+1 image restuarant', 3, 3),
(9, 'Premade', '1 Img Left + 2 Imgs Right', 38, 3),
(10, 'Premade', '1+1 image experience', 3, 3),
(11, 'Premade', 'Home Title + Subtitle Right', 38, 3),
(12, 'Premade', '1+2+1 images', 38, 3),
(13, 'Premade', '1+1 image accommodation', 37, 3),
(15, 'Templates', 'Accommodation Internal Title', 37, 3),
(16, 'Premade', '2 Imgs Left + 1 Img Right', 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `module_dyn_templates_rows`
--

DROP TABLE IF EXISTS `module_dyn_templates_rows`;
CREATE TABLE IF NOT EXISTS `module_dyn_templates_rows` (
  `DMT_ID` int(6) NOT NULL AUTO_INCREMENT,
  `DMT_Temp_ID` int(4) NOT NULL,
  `DMT_Rows` int(2) NOT NULL,
  `DMT_Cols` int(1) NOT NULL,
  `DMT_Cell` int(1) NOT NULL,
  `DMT_NumFields` int(1) NOT NULL,
  `DMT_Field` varchar(20) NOT NULL,
  `DMT_Module` varchar(6) NOT NULL,
  `DMT_Style_ID` int(4) NOT NULL,
  `DMT_Link_ID` int(4) NOT NULL,
  `DMT_Href` varchar(255) NOT NULL,
  `DMT_Href_Target` varchar(8) NOT NULL DEFAULT '_self',
  `DMT_PaddBottom` varchar(7) NOT NULL DEFAULT '0',
  `DMT_Css` text DEFAULT NULL,
  `DMT_ClassID` varchar(255) DEFAULT NULL,
  `DMT_Cell_Style_ID` int(4) DEFAULT NULL,
  `DMT_Cell_ClassItemID` varchar(255) DEFAULT NULL,
  `DMT_Cell_Css` text DEFAULT NULL,
  `DMT_Cell_ClassID` text DEFAULT NULL,
  `DMT_Row_Style_ID` int(4) DEFAULT NULL,
  `DMT_Row_SepDiv` varchar(7) DEFAULT NULL,
  `DMT_Row_PaddBottom` varchar(7) DEFAULT NULL,
  `DMT_Row_Css` text DEFAULT NULL,
  `DMT_Row_ClassID` varchar(255) DEFAULT NULL,
  `DMT_Row_ClassID_Bottom` varchar(255) DEFAULT NULL,
  `DMT_Row_Html_Top` text DEFAULT NULL,
  `DMT_Row_Html_Bottom` text DEFAULT NULL,
  `DMT_Row_Active` int(1) DEFAULT 1,
  `DMT_Temp_Style_ID` int(4) DEFAULT NULL,
  `DMT_Temp_PaddBottom` varchar(7) DEFAULT NULL,
  `DMT_Temp_EShop` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `DMT_Temp_Css` text DEFAULT NULL,
  `DMT_Temp_ClassID` varchar(255) DEFAULT NULL,
  `DMT_Preview` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`DMT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_dyn_templates_rows`
--

INSERT INTO `module_dyn_templates_rows` (`DMT_ID`, `DMT_Temp_ID`, `DMT_Rows`, `DMT_Cols`, `DMT_Cell`, `DMT_NumFields`, `DMT_Field`, `DMT_Module`, `DMT_Style_ID`, `DMT_Link_ID`, `DMT_Href`, `DMT_Href_Target`, `DMT_PaddBottom`, `DMT_Css`, `DMT_ClassID`, `DMT_Cell_Style_ID`, `DMT_Cell_ClassItemID`, `DMT_Cell_Css`, `DMT_Cell_ClassID`, `DMT_Row_Style_ID`, `DMT_Row_SepDiv`, `DMT_Row_PaddBottom`, `DMT_Row_Css`, `DMT_Row_ClassID`, `DMT_Row_ClassID_Bottom`, `DMT_Row_Html_Top`, `DMT_Row_Html_Bottom`, `DMT_Row_Active`, `DMT_Temp_Style_ID`, `DMT_Temp_PaddBottom`, `DMT_Temp_EShop`, `DMT_Temp_Css`, `DMT_Temp_ClassID`, `DMT_Preview`) VALUES
(17, 4, 1, 1, 1, 3, '', '', 0, 0, '', '', '0', '', '', 302, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(16, 4, 1, 1, 1, 2, '', '', 0, 86, '', '_self', '0', '', '', 302, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(15, 4, 1, 1, 1, 1, 'List_Desc', '', 0, 0, '', '', '20', '', '', 302, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(11, 2, 1, 2, 2, 1, '', '220', 0, 0, '', '', '0', '', 'class=\"wow fadeInDown\"', 513, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(12, 3, 1, 1, 1, 1, 'List_Field1', '', 298, 0, '', '', '0', '', 'class=\"wow fadeInLeft\"', 517, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(13, 3, 1, 1, 1, 2, 'List_Field2', '', 507, 0, '', '', '0', '', 'class=\"wow fadeInRight\"', 517, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(14, 3, 1, 1, 1, 3, '', '', 0, 0, '', '', '0', '', '', 517, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(10, 2, 1, 2, 1, 1, '', '219', 0, 0, '', '', '0', '', 'class=\"wow fadeInUp\"', 512, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(18, 5, 1, 2, 1, 1, '', 'T3', 0, 0, '', '', '0', '', '', 518, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(19, 5, 1, 2, 1, 2, '', '', 0, 0, '', '', '0', '', '', 518, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(20, 5, 1, 2, 1, 3, '', '', 0, 0, '', '', '0', '', '', 518, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(21, 5, 1, 2, 2, 1, '', 'T4', 0, 0, '', '', '0', '', '', 519, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(22, 5, 1, 2, 2, 2, 'List_Desc', '', 0, 0, '', '', '0', '', '', 519, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(23, 5, 1, 2, 2, 3, '', '', 0, 0, '', '', '0', '', '', 519, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(24, 6, 1, 1, 1, 1, 'List_Title', '', 521, 0, '', '', '0', '', '', 520, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(25, 6, 1, 1, 1, 2, 'List_Desc', '', 522, 0, '', '', '0', '', '', 520, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(26, 6, 1, 1, 1, 3, '', '', 0, 0, '', '', '0', '', '', 520, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(27, 7, 1, 2, 1, 1, '', '219', 0, 0, '', '', '0', '', 'class=\"wow fadeIn\"', 533, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(28, 7, 1, 2, 2, 1, '', '220', 0, 0, '', '', '0', '', 'class=\"wow fadeIn\"', 534, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(29, 8, 1, 2, 2, 1, '', '220', 0, 0, '', '', '0', '', 'class=\"wow fadeInDown\"', 536, '', '', '', 540, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(30, 8, 1, 2, 1, 1, '', '219', 0, 0, '', '', '0', '', 'class=\"wow fadeInUp\"', 535, '', '', '', 540, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(31, 9, 1, 2, 1, 1, '', '219', 0, 0, '', '', '0', '', 'class=\"wow fadeIn\"', 542, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(32, 9, 1, 2, 1, 2, '', '', 0, 0, '', '', '0', '', '', 542, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(33, 9, 1, 2, 1, 3, '', '', 0, 0, '', '', '0', '', '', 542, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(34, 9, 1, 2, 2, 1, '', '220', 544, 0, '', '', '0', '', 'class=\"wow fadeIn\"', 543, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(35, 9, 1, 2, 2, 2, '', '257', 545, 0, '', '', '0', '', 'class=\"wow fadeIn\"', 543, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(36, 9, 1, 2, 2, 3, '', '', 0, 0, '', '', '0', '', '', 543, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(37, 10, 1, 2, 1, 1, '', '220', 0, 0, '', '', '0', '', 'class=\"wow fadeInDown\"', 550, '', '', '', 552, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(38, 10, 1, 2, 2, 1, '', '219', 0, 0, '', '', '0', '', 'class=\"wow fadeInUp\"', 551, '', '', '', 552, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(39, 11, 1, 1, 1, 1, 'List_Field1', '', 298, 0, '', '', '0', '', 'class=\"wow fadeInRight\"', 549, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(40, 11, 1, 1, 1, 2, 'List_Field2', '', 507, 0, '', '', '0', '', 'class=\"wow fadeInLeft\"', 549, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(41, 11, 1, 1, 1, 3, '', '', 0, 0, '', '', '0', '', '', 549, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(42, 12, 1, 3, 1, 1, '', '219', 0, 0, '', '', '0', '', '', 557, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(43, 12, 1, 3, 1, 2, '', '', 0, 0, '', '', '0', '', '', 557, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(44, 12, 1, 3, 1, 3, '', '', 0, 0, '', '', '0', '', '', 557, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(45, 12, 1, 3, 2, 1, '', '220', 558, 0, '', '', '0', '', '', 561, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(46, 12, 1, 3, 2, 2, '', '257', 559, 0, '', '', '0', '', '', 561, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(47, 12, 1, 3, 2, 3, '', '', 0, 0, '', '', '0', '', '', 561, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(48, 12, 1, 3, 3, 1, '', '258', 0, 0, '', '', '0', '', '', 560, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(49, 12, 1, 3, 3, 2, '', '', 0, 0, '', '', '0', '', '', 560, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(50, 12, 1, 3, 3, 3, '', '', 0, 0, '', '', '0', '', '', 560, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(51, 13, 1, 2, 2, 1, '', '257', 0, 0, '', '', '0', '', '', 536, '', '', '', 540, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(52, 13, 1, 2, 1, 1, '', '220', 0, 0, '', '', '0', '', '', 535, '', '', '', 540, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(56, 15, 1, 1, 1, 1, '', '278', 298, 0, '', '', '0', '', '', 517, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(57, 15, 1, 1, 1, 2, 'List_Title', '', 679, 0, '', '', '0', '', '', 517, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(58, 15, 1, 1, 1, 3, '', '', 0, 0, '', '', '0', '', '', 517, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(59, 16, 1, 2, 2, 1, '', '219', 0, 0, '', '', '0', '', 'class=\"wow fadeIn\"', 542, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(60, 16, 1, 2, 2, 2, '', '', 0, 0, '', '', '0', '', '', 542, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(61, 16, 1, 2, 2, 3, '', '', 0, 0, '', '', '0', '', '', 542, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(62, 16, 1, 2, 1, 1, '', '220', 544, 0, '', '', '0', '', 'class=\"wow fadeIn\"', 543, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(63, 16, 1, 2, 1, 2, '', '243', 545, 0, '', '', '0', '', 'class=\"wow fadeIn\"', 543, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(64, 16, 1, 2, 1, 3, '', '', 0, 0, '', '', '0', '', '', 543, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_rat_templates`
--

DROP TABLE IF EXISTS `module_rat_templates`;
CREATE TABLE IF NOT EXISTS `module_rat_templates` (
  `RATemp_ID` int(4) NOT NULL AUTO_INCREMENT,
  `RATemp_Category` varchar(20) NOT NULL DEFAULT 'Default',
  `RATemp_Name` varchar(60) DEFAULT NULL,
  `RATemp_ListID` int(5) NOT NULL,
  `RATemp_Fields` int(1) NOT NULL DEFAULT 3,
  PRIMARY KEY (`RATemp_ID`),
  KEY `LTemp_ID` (`RATemp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_rat_templates`
--

INSERT INTO `module_rat_templates` (`RATemp_ID`, `RATemp_Category`, `RATemp_Name`, `RATemp_ListID`, `RATemp_Fields`) VALUES
(1, 'Default', 'Image Top + Text below', 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `module_rat_templates_rows`
--

DROP TABLE IF EXISTS `module_rat_templates_rows`;
CREATE TABLE IF NOT EXISTS `module_rat_templates_rows` (
  `RAT_ID` int(6) NOT NULL AUTO_INCREMENT,
  `RAT_Temp_ID` int(4) NOT NULL,
  `RAT_Rows` int(2) NOT NULL,
  `RAT_Cols` int(1) NOT NULL,
  `RAT_Cell` int(1) NOT NULL,
  `RAT_NumFields` int(1) NOT NULL,
  `RAT_Field` varchar(20) NOT NULL,
  `RAT_Module` varchar(6) NOT NULL,
  `RAT_Style_ID` int(4) NOT NULL,
  `RAT_Link_ID` int(4) NOT NULL,
  `RAT_Href` varchar(255) NOT NULL,
  `RAT_Href_Target` varchar(8) NOT NULL DEFAULT '_self',
  `RAT_PaddBottom` varchar(7) NOT NULL DEFAULT '0',
  `RAT_Css` text DEFAULT NULL,
  `RAT_ClassID` varchar(255) DEFAULT NULL,
  `RAT_Cell_Style_ID` int(4) DEFAULT NULL,
  `RAT_Cell_ClassItemID` varchar(255) DEFAULT NULL,
  `RAT_Cell_Css` text DEFAULT NULL,
  `RAT_Cell_ClassID` text DEFAULT NULL,
  `RAT_Row_Style_ID` int(4) DEFAULT NULL,
  `RAT_Row_SepDiv` varchar(7) DEFAULT NULL,
  `RAT_Row_PaddBottom` varchar(7) DEFAULT NULL,
  `RAT_Row_Css` text DEFAULT NULL,
  `RAT_Row_ClassID` varchar(255) DEFAULT NULL,
  `RAT_Row_ClassID_Bottom` varchar(255) DEFAULT NULL,
  `RAT_Row_Html_Top` text DEFAULT NULL,
  `RAT_Row_Html_Bottom` text DEFAULT NULL,
  `RAT_Row_Active` int(1) DEFAULT 1,
  `RAT_Temp_Style_ID` int(4) DEFAULT NULL,
  `RAT_Temp_PaddBottom` varchar(7) DEFAULT NULL,
  `RAT_Temp_EShop` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `RAT_Temp_Css` text DEFAULT NULL,
  `RAT_Temp_ClassID` varchar(255) DEFAULT NULL,
  `RAT_Preview` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`RAT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_rat_templates_rows`
--

INSERT INTO `module_rat_templates_rows` (`RAT_ID`, `RAT_Temp_ID`, `RAT_Rows`, `RAT_Cols`, `RAT_Cell`, `RAT_NumFields`, `RAT_Field`, `RAT_Module`, `RAT_Style_ID`, `RAT_Link_ID`, `RAT_Href`, `RAT_Href_Target`, `RAT_PaddBottom`, `RAT_Css`, `RAT_ClassID`, `RAT_Cell_Style_ID`, `RAT_Cell_ClassItemID`, `RAT_Cell_Css`, `RAT_Cell_ClassID`, `RAT_Row_Style_ID`, `RAT_Row_SepDiv`, `RAT_Row_PaddBottom`, `RAT_Row_Css`, `RAT_Row_ClassID`, `RAT_Row_ClassID_Bottom`, `RAT_Row_Html_Top`, `RAT_Row_Html_Bottom`, `RAT_Row_Active`, `RAT_Temp_Style_ID`, `RAT_Temp_PaddBottom`, `RAT_Temp_EShop`, `RAT_Temp_Css`, `RAT_Temp_ClassID`, `RAT_Preview`) VALUES
(1, 1, 1, 1, 1, 1, '', '250', 0, 0, '', '', '30', 'max-width:500px;margin:auto;', '', 0, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(2, 1, 1, 1, 1, 2, 'List_Editor2', '', 256, 0, '', '', '0', '', '', 0, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0),
(3, 1, 1, 1, 1, 3, '', '', 0, 0, '', '', '0', '', '', 0, '', '', '', 0, '', '', 'display:block; width:100%; margin:auto;', '', '', '', '', 1, 0, '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_recs_display_templates`
--

DROP TABLE IF EXISTS `module_recs_display_templates`;
CREATE TABLE IF NOT EXISTS `module_recs_display_templates` (
  `MRDTemp_ID` int(4) NOT NULL AUTO_INCREMENT,
  `MRDTemp_Category` varchar(20) NOT NULL DEFAULT 'Default',
  `MRDTemp_Name` varchar(60) DEFAULT NULL,
  `MRDTemp_Fields` int(1) NOT NULL DEFAULT 3,
  PRIMARY KEY (`MRDTemp_ID`),
  KEY `MRDTemp_ID` (`MRDTemp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_recs_display_templates`
--

INSERT INTO `module_recs_display_templates` (`MRDTemp_ID`, `MRDTemp_Category`, `MRDTemp_Name`, `MRDTemp_Fields`) VALUES
(11, '', 'Responsive Home Records', 1),
(12, '', 'Responsive Home Mobile', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_recs_display_templates_rows`
--

DROP TABLE IF EXISTS `module_recs_display_templates_rows`;
CREATE TABLE IF NOT EXISTS `module_recs_display_templates_rows` (
  `MRDR_ID` int(6) NOT NULL AUTO_INCREMENT,
  `MRDR_Temp_ID` int(4) NOT NULL,
  `MRDR_Rows` int(2) NOT NULL,
  `MRDR_Cols` int(1) NOT NULL,
  `MRDR_Cell` int(1) NOT NULL,
  `MRDR_RecID` varchar(80) DEFAULT NULL,
  `MRDR_NumFields` int(1) NOT NULL,
  `MRDR_Module` int(4) NOT NULL,
  `MRDR_Module_Close` int(4) DEFAULT NULL,
  `MRDR_Style_ID` int(4) NOT NULL,
  `MRDR_PaddBottom` varchar(7) NOT NULL DEFAULT '0',
  `MRDR_Css` text DEFAULT NULL,
  `MRDR_ClassID` varchar(255) DEFAULT NULL,
  `MRDR_Cell_Css` text DEFAULT NULL,
  `MRDR_Cell_ClassID` varchar(255) DEFAULT NULL,
  `MRDR_Cell_Style_ID` int(4) DEFAULT NULL,
  `MRDR_Row_Style_ID` int(4) DEFAULT NULL,
  `MRDR_Row_SepDiv` varchar(5) DEFAULT NULL,
  `MRDR_Row_PaddBottom` varchar(7) DEFAULT NULL,
  `MRDR_Row_Width` varchar(6) DEFAULT NULL,
  `MRDR_Row_Css` text DEFAULT NULL,
  `MRDR_Row_ClassID` varchar(255) DEFAULT NULL,
  `MRDR_Row_Html_Top` text DEFAULT NULL,
  `MRDR_Row_Html_Bottom` text DEFAULT NULL,
  `MRDR_Row_Active` int(1) DEFAULT 1,
  `MRDR_Temp_Style_ID` int(4) DEFAULT NULL,
  `MRDR_Temp_Style_ID_Absolute` int(4) DEFAULT NULL,
  `MRDR_Temp_PageID` varchar(50) DEFAULT NULL,
  `MRDR_Temp_PaddBottom` varchar(7) DEFAULT NULL,
  `MRDR_Temp_Css` text DEFAULT NULL,
  `MRDR_Temp_ClassID` varchar(255) DEFAULT NULL,
  `MRDR_Preview` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`MRDR_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_recs_display_templates_rows`
--

INSERT INTO `module_recs_display_templates_rows` (`MRDR_ID`, `MRDR_Temp_ID`, `MRDR_Rows`, `MRDR_Cols`, `MRDR_Cell`, `MRDR_RecID`, `MRDR_NumFields`, `MRDR_Module`, `MRDR_Module_Close`, `MRDR_Style_ID`, `MRDR_PaddBottom`, `MRDR_Css`, `MRDR_ClassID`, `MRDR_Cell_Css`, `MRDR_Cell_ClassID`, `MRDR_Cell_Style_ID`, `MRDR_Row_Style_ID`, `MRDR_Row_SepDiv`, `MRDR_Row_PaddBottom`, `MRDR_Row_Width`, `MRDR_Row_Css`, `MRDR_Row_ClassID`, `MRDR_Row_Html_Top`, `MRDR_Row_Html_Bottom`, `MRDR_Row_Active`, `MRDR_Temp_Style_ID`, `MRDR_Temp_Style_ID_Absolute`, `MRDR_Temp_PageID`, `MRDR_Temp_PaddBottom`, `MRDR_Temp_Css`, `MRDR_Temp_ClassID`, `MRDR_Preview`) VALUES
(81, 11, 1, 1, 1, ',en354,', 1, 0, 0, 0, '0', '', '', '', '', 0, 264, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(82, 12, 1, 1, 1, ',en354,', 1, 0, 0, 0, '0', '', '', '', '', 0, 218, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(83, 14, 1, 1, 1, NULL, 1, 0, NULL, 0, '0', '', '', '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0, 'EL94,EN81,', '', '', '', 0),
(84, 11, 2, 1, 1, ',en357,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(85, 11, 3, 1, 1, ',en362,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(86, 11, 4, 1, 1, ',en364,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(87, 11, 5, 1, 1, ',en369,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(91, 12, 2, 1, 1, ',en357,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(92, 12, 3, 1, 1, ',en362,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(93, 12, 4, 1, 1, ',en364,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(94, 12, 5, 1, 1, ',en369,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(98, 11, 6, 1, 1, ',en370,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(99, 11, 7, 1, 1, ',en371,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(100, 11, 8, 1, 1, ',en374,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(101, 11, 9, 1, 1, ',en378,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(102, 11, 10, 1, 1, ',en379,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '80', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(103, 12, 6, 1, 1, ',en370,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(104, 12, 7, 1, 1, ',en371,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(105, 12, 8, 1, 1, ',en374,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(106, 12, 9, 1, 1, ',en378,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0),
(107, 12, 10, 1, 1, ',en379,', 1, 0, 0, 0, '0', '', '', '', '', 0, 0, '', '50', '', '', '', '', '', 1, 0, 0, 'en149,', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `noresize_images`
--

DROP TABLE IF EXISTS `noresize_images`;
CREATE TABLE IF NOT EXISTS `noresize_images` (
  `Nri_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Nri_Cat_ID` int(7) DEFAULT NULL,
  `Nri_Order` int(3) NOT NULL DEFAULT 999,
  `Nri_Scroll` varchar(100) DEFAULT NULL,
  `Nri_FileName` varchar(40) DEFAULT NULL,
  `Nri_ImageZoom` varchar(52) DEFAULT NULL,
  PRIMARY KEY (`Nri_ID`),
  KEY `Nri_Cat_ID` (`Nri_Cat_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noresize_images`
--

INSERT INTO `noresize_images` (`Nri_ID`, `Nri_Cat_ID`, `Nri_Order`, `Nri_Scroll`, `Nri_FileName`, `Nri_ImageZoom`) VALUES
(51, 10, 999, NULL, NULL, 'home2_9124.jpg'),
(50, 10, 999, NULL, NULL, 'home_8149.jpg'),
(55, 24, 999, NULL, NULL, 'john-fornander-gz-w1h-xfny-unsplash_3008_1889.jpg'),
(54, 24, 999, NULL, NULL, 'shutterstock_625789103_1560_2115.jpg'),
(56, 25, 2, NULL, NULL, 'john-fornander-gz-w1h-xfny-unsplash_3008_8970.jpg'),
(57, 25, 1, NULL, NULL, 'shutterstock_625789103_1560_5006.jpg'),
(58, 26, 999, NULL, NULL, 'dsc_0103_2963_5436.jpg'),
(59, 26, 999, NULL, NULL, 'dsc_0248_3137_5343.jpg'),
(60, 26, 999, NULL, NULL, 'dsc_0363_2237_3607.jpg'),
(61, 27, 999, NULL, NULL, 'shutterstock_296585981_3397_8530.jpg'),
(62, 27, 999, NULL, NULL, 'bigstock--217511356_1281_9971.jpg'),
(63, 27, 999, NULL, NULL, 'shutterstock_260354102_2031_7771.jpg'),
(64, 28, 999, NULL, NULL, 'shutterstock_559914589_2893_3988.jpg'),
(65, 28, 999, NULL, NULL, 'bigstock--217511356_1281_3399.jpg'),
(66, 28, 999, NULL, NULL, 'shutterstock_260354102_2031_7384.jpg'),
(67, 29, 999, NULL, NULL, 'shutterstock_47822167_8535_5948.jpg'),
(68, 29, 999, NULL, NULL, 'shutterstock_260354102_2031_9330.jpg'),
(69, 29, 999, NULL, NULL, 'bigstock--217511356_1281_1934.jpg'),
(70, 30, 999, NULL, NULL, 'shutterstock_1255583338_4850_8766.jpg'),
(71, 30, 999, NULL, NULL, 'bigstock--217511356_1281_4589.jpg'),
(73, 30, 999, NULL, NULL, 'sdsdf_8553.jpg'),
(74, 31, 999, NULL, NULL, 'voulisma-beach-agios-nikolaos,_1945_5432.jpg'),
(75, 32, 999, NULL, NULL, 'dsc_0097_3277_8144.jpg'),
(76, 33, 999, NULL, NULL, 'shutterstock_1017840097_5389_2444.jpg'),
(77, 33, 999, NULL, NULL, 'bigstock-spa-64669738_9743_3256.jpg'),
(78, 33, 999, NULL, NULL, 'shutterstock_392000527_2939_8096.jpg'),
(79, 34, 2, NULL, NULL, 'preveli-beach_6327_2404.jpg'),
(80, 34, 3, NULL, NULL, 'spinaloga_9113_8063.jpg'),
(81, 34, 4, NULL, NULL, 'voulisma-beach-agios-nikolaos,_1945_8446.jpg'),
(82, 34, 1, NULL, NULL, 'lambros-lyrarakis-ppcxvqu4ko4-unsplash_6184_3285.jpg'),
(83, 35, 999, NULL, NULL, 'dsc_0248_3137_2010.jpg'),
(84, 35, 999, NULL, NULL, 'dsc_0363_2237_9568.jpg'),
(85, 36, 999, NULL, NULL, 'dsc_0103_2963_5028.jpg'),
(86, 36, 999, NULL, NULL, 'preveli-beach_6327_1376.jpg'),
(87, 36, 999, NULL, NULL, 'spinaloga_9113_1152.jpg'),
(88, 36, 999, NULL, NULL, 'voulisma-beach-agios-nikolaos,_1945_5546.jpg'),
(89, 37, 999, NULL, NULL, 'dsc_0248_3137_6489.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `noresize_images_cat`
--

DROP TABLE IF EXISTS `noresize_images_cat`;
CREATE TABLE IF NOT EXISTS `noresize_images_cat` (
  `Nric_Cat_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Nric_Cat_Section` varchar(30) NOT NULL DEFAULT 'general',
  `Nric_Cat_HeaderID` int(7) NOT NULL DEFAULT 0,
  `Nric_Cat_Title` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`Nric_Cat_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noresize_images_cat`
--

INSERT INTO `noresize_images_cat` (`Nric_Cat_ID`, `Nric_Cat_Section`, `Nric_Cat_HeaderID`, `Nric_Cat_Title`) VALUES
(10, 'general', 0, 'Home Page'),
(24, 'general', 0, 'SEA SIDE RESTAURANT'),
(25, 'general', 0, 'BLUE RESTAURANT'),
(26, 'general', 0, 'THE HOTEL'),
(27, 'general', 0, 'SUPERIOR DOUBLE ROOM'),
(28, 'general', 0, 'PREMIUM SUITE'),
(29, 'general', 0, 'EXCLUSIVE SUITE'),
(30, 'general', 0, 'FAMILY ROOM'),
(31, 'general', 0, 'THE BEACH'),
(32, 'general', 0, 'POOL AREA'),
(33, 'general', 0, 'WELLNESS AND SPA'),
(34, 'general', 0, 'TOURS'),
(35, 'general', 0, 'THE GARDENS'),
(36, 'general', 0, 'LOCATION'),
(37, 'general', 0, 'CONTACT US');

-- --------------------------------------------------------

--
-- Table structure for table `noresize_images_text`
--

DROP TABLE IF EXISTS `noresize_images_text`;
CREATE TABLE IF NOT EXISTS `noresize_images_text` (
  `NRImgT_ID` int(7) NOT NULL AUTO_INCREMENT,
  `NRImgT_ImgID` varchar(7) NOT NULL,
  `NRImgT_Lang` varchar(2) NOT NULL,
  `NRImgT_Name` varchar(120) DEFAULT NULL,
  `NRImgT_Desc` varchar(255) DEFAULT NULL,
  `NRImgT_URL` varchar(255) DEFAULT NULL,
  `NRImgT_Field1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NRImgT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noresize_images_text`
--

INSERT INTO `noresize_images_text` (`NRImgT_ID`, `NRImgT_ImgID`, `NRImgT_Lang`, `NRImgT_Name`, `NRImgT_Desc`, `NRImgT_URL`, `NRImgT_Field1`) VALUES
(50, '51', '', NULL, NULL, NULL, NULL),
(49, '50', '', NULL, NULL, NULL, NULL),
(54, '55', 'en', NULL, NULL, NULL, NULL),
(53, '54', 'en', NULL, NULL, NULL, NULL),
(55, '56', 'en', NULL, NULL, NULL, NULL),
(56, '57', 'en', NULL, NULL, NULL, NULL),
(57, '58', 'en', NULL, NULL, NULL, NULL),
(58, '59', 'en', NULL, NULL, NULL, NULL),
(59, '60', 'en', NULL, NULL, NULL, NULL),
(60, '61', '', NULL, NULL, NULL, NULL),
(61, '62', '', NULL, NULL, NULL, NULL),
(62, '63', '', NULL, NULL, NULL, NULL),
(63, '64', 'en', NULL, NULL, NULL, NULL),
(64, '65', 'en', NULL, NULL, NULL, NULL),
(65, '66', 'en', NULL, NULL, NULL, NULL),
(66, '67', 'en', NULL, NULL, NULL, NULL),
(67, '68', 'en', NULL, NULL, NULL, NULL),
(68, '69', 'en', NULL, NULL, NULL, NULL),
(69, '70', 'en', NULL, NULL, NULL, NULL),
(70, '71', 'en', NULL, NULL, NULL, NULL),
(72, '73', 'en', NULL, NULL, NULL, NULL),
(73, '74', 'en', NULL, NULL, NULL, NULL),
(74, '75', 'en', NULL, NULL, NULL, NULL),
(75, '76', 'en', NULL, NULL, NULL, NULL),
(76, '77', 'en', NULL, NULL, NULL, NULL),
(77, '78', 'en', NULL, NULL, NULL, NULL),
(78, '79', 'en', NULL, NULL, NULL, NULL),
(79, '80', 'en', NULL, NULL, NULL, NULL),
(80, '81', 'en', NULL, NULL, NULL, NULL),
(81, '82', 'en', NULL, NULL, NULL, NULL),
(82, '83', 'en', NULL, NULL, NULL, NULL),
(83, '84', 'en', NULL, NULL, NULL, NULL),
(84, '85', 'en', NULL, NULL, NULL, NULL),
(85, '86', 'en', NULL, NULL, NULL, NULL),
(86, '87', 'en', NULL, NULL, NULL, NULL),
(87, '88', 'en', NULL, NULL, NULL, NULL),
(88, '89', 'en', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `Page_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Parent_Page_ID` int(7) NOT NULL DEFAULT 0,
  `Page_Section` varchar(20) DEFAULT 'general',
  `Page_Lang` varchar(2) NOT NULL DEFAULT '0',
  `Page_Lang_ID` int(7) NOT NULL DEFAULT 0,
  `Page_Name` varchar(255) NOT NULL DEFAULT '',
  `Page_Name_Print` varchar(255) DEFAULT NULL,
  `Page_List_ID` int(7) NOT NULL DEFAULT 0,
  `Page_View` varchar(70) NOT NULL DEFAULT '0',
  `Page_Canonical_URL` varchar(255) DEFAULT NULL,
  `Page_No_Index` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Page_No_Follow` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Page_Order` int(8) NOT NULL DEFAULT 0,
  `Page_Num_Recs` int(7) DEFAULT 999,
  `Page_Content` int(7) NOT NULL DEFAULT 0,
  `Page_Type` varchar(60) NOT NULL DEFAULT 'lists/default',
  `Page_HeadLists_Temp` int(4) NOT NULL DEFAULT 1,
  `Page_HeadLists_Flag` int(1) NOT NULL DEFAULT 1,
  `Page_Lists_Temp` int(4) NOT NULL DEFAULT 1,
  `Page_Lists_Temp2` int(4) NOT NULL DEFAULT 1,
  `Page_Rec_Temp` int(4) NOT NULL DEFAULT 1,
  `Page_Html` varchar(255) NOT NULL,
  `Page_Enable` int(1) NOT NULL DEFAULT 1,
  `Page_Show_SubMenu` int(1) NOT NULL DEFAULT 1,
  `Page_Show_TopLinks` int(1) NOT NULL DEFAULT 0,
  `Page_Show_Bottom` int(1) NOT NULL DEFAULT 1,
  `Page_Active` int(1) NOT NULL DEFAULT 1,
  `Page_Meta_Title` varchar(160) NOT NULL DEFAULT '',
  `Page_Meta_Desc` varchar(300) NOT NULL DEFAULT '',
  `Page_Meta_Keywords` varchar(255) NOT NULL DEFAULT '',
  `Page_Meta_SocialDesc` varchar(255) DEFAULT NULL,
  `Page_XMLSiteMap` int(1) NOT NULL DEFAULT 1,
  `Page_SMPriority` decimal(10,2) NOT NULL DEFAULT 0.50,
  `Page_Header_Flag` int(1) NOT NULL DEFAULT 0,
  `Page_Header` varchar(10) NOT NULL DEFAULT 'default',
  `Page_ImgCat_Hid` int(7) DEFAULT NULL,
  `Page_Style_ID` int(7) NOT NULL DEFAULT 0,
  `Page_Styles_Links` int(6) NOT NULL DEFAULT 0,
  `Page_Temp_ID` int(5) NOT NULL DEFAULT 1,
  `Page_RecTemp_ID` int(5) NOT NULL DEFAULT 1,
  `Page_RecStyle_ID` int(7) NOT NULL DEFAULT 0,
  `Page_GenVar` varchar(255) NOT NULL DEFAULT '',
  `Page_GenVar2` varchar(255) DEFAULT NULL,
  `Page_GenVar3` varchar(255) DEFAULT NULL,
  `Page_Special_Group` int(1) NOT NULL DEFAULT 0,
  `Page_StartLangID` varchar(15) NOT NULL DEFAULT '',
  `Page_GetFromSection` varchar(15) NOT NULL DEFAULT 'general',
  `Page_OrderBy` varchar(15) DEFAULT NULL,
  `Page_SortBy` varchar(4) NOT NULL DEFAULT 'Asc',
  `Page_MenuLines` int(1) NOT NULL DEFAULT 0,
  `Page_Type_Mob` varchar(60) NOT NULL DEFAULT '1',
  `Page_Order_Mob` int(2) NOT NULL DEFAULT 0,
  `Page_Lists_Mob` int(4) NOT NULL DEFAULT 1,
  `Page_Lists_Mob2` int(4) NOT NULL DEFAULT 1,
  `Page_HeadLists_Mob` int(4) NOT NULL DEFAULT 1,
  `Page_Rec_Mob` int(4) NOT NULL DEFAULT 1,
  `Page_Style_ID_Mob` int(5) NOT NULL DEFAULT 0,
  `Page_Styles_Links_Mob` int(5) NOT NULL DEFAULT 0,
  `Page_Temp_ID_Mob` int(5) NOT NULL DEFAULT 1,
  `Page_Mob_Enable` int(1) NOT NULL DEFAULT 0,
  `Page_Authorized` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Page_MemAccess` int(1) NOT NULL DEFAULT 0,
  `Page_Synchronize` int(1) NOT NULL,
  `Page_BanArea1` int(4) DEFAULT NULL,
  `Page_BanArea2` int(4) DEFAULT NULL,
  `Page_BanArea3` int(4) DEFAULT NULL,
  `Page_BanArea4` int(4) DEFAULT NULL,
  `Page_BanArea5` int(4) DEFAULT NULL,
  PRIMARY KEY (`Page_ID`),
  KEY `Page_Section` (`Page_Section`),
  KEY `Parent_Page_ID` (`Parent_Page_ID`),
  KEY `Page_Lang` (`Page_Lang`),
  KEY `Page_Order` (`Page_Order`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 8192 kB';

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`Page_ID`, `Parent_Page_ID`, `Page_Section`, `Page_Lang`, `Page_Lang_ID`, `Page_Name`, `Page_Name_Print`, `Page_List_ID`, `Page_View`, `Page_Canonical_URL`, `Page_No_Index`, `Page_No_Follow`, `Page_Order`, `Page_Num_Recs`, `Page_Content`, `Page_Type`, `Page_HeadLists_Temp`, `Page_HeadLists_Flag`, `Page_Lists_Temp`, `Page_Lists_Temp2`, `Page_Rec_Temp`, `Page_Html`, `Page_Enable`, `Page_Show_SubMenu`, `Page_Show_TopLinks`, `Page_Show_Bottom`, `Page_Active`, `Page_Meta_Title`, `Page_Meta_Desc`, `Page_Meta_Keywords`, `Page_Meta_SocialDesc`, `Page_XMLSiteMap`, `Page_SMPriority`, `Page_Header_Flag`, `Page_Header`, `Page_ImgCat_Hid`, `Page_Style_ID`, `Page_Styles_Links`, `Page_Temp_ID`, `Page_RecTemp_ID`, `Page_RecStyle_ID`, `Page_GenVar`, `Page_GenVar2`, `Page_GenVar3`, `Page_Special_Group`, `Page_StartLangID`, `Page_GetFromSection`, `Page_OrderBy`, `Page_SortBy`, `Page_MenuLines`, `Page_Type_Mob`, `Page_Order_Mob`, `Page_Lists_Mob`, `Page_Lists_Mob2`, `Page_HeadLists_Mob`, `Page_Rec_Mob`, `Page_Style_ID_Mob`, `Page_Styles_Links_Mob`, `Page_Temp_ID_Mob`, `Page_Mob_Enable`, `Page_Authorized`, `Page_MemAccess`, `Page_Synchronize`, `Page_BanArea1`, `Page_BanArea2`, `Page_BanArea3`, `Page_BanArea4`, `Page_BanArea5`) VALUES
(1, 0, 'general', 'en', 0, 'HOME', '', 1, '', '', 0, 0, 1, 0, 4, '1', 6, 1, 1, 0, 26, '', 1, 0, 0, 1, 1, 'Kamperi Grand Hotel', '', '', '', 0, '0.50', 1, 'default', 0, 1, 1, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 31, 0, 6, 68, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 0, 'hidden', 'en', 0, 'Sitemap', '', 0, 'sitemap_EN', '', 0, 0, 3, 9999, 0, '1', 1, 0, 1, 1, 1, '', 0, 1, 0, 1, 1, 'Sitemap', '', '', '', 0, '0.00', 1, 'default', 0, 1, 1, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 'hidden', 'en', 0, 'Register Newsletter', '', 33, 'newsletter_EN', '', 0, 0, 1, 1, 0, '1', 1, 0, 1, 1, 1, '', 0, 1, 0, 1, 0, 'Register Newsletter', '', '', '', 0, '0.00', 1, 'default', 0, 1, 1, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 'hidden', 'en', 0, 'Search Results', '', 0, 'search_results_EN', '', 0, 0, 2, 1, 0, '1', 1, 0, 1, 1, 1, '', 0, 1, 0, 1, 0, 'Search Results', '', '', '', 0, '0.00', 1, 'default', 0, 1, 1, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 49, 'hidden', 'en', 0, 'Edit Profile', '', 2, 'edit_profile_EN', '', 0, 0, 2, 1, 0, '1', 1, 0, 1, 1, 53, '', 0, 1, 0, 1, 1, 'Edit Profile', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 0, 'settings', 'en', 0, 'Settings', '', 31, '8cnXy9WKN5aKR3CS', NULL, 0, 0, 1, 1, 0, 'lists/default', 1, 0, 1, 1, 1, '', 0, 1, 0, 1, 1, 'Settings', '', '', '', 0, '0.00', 1, 'default', 0, 1, 1, 9, 9, 0, '', '', NULL, 0, '', 'general', '', 'Asc', 0, 'lists/recs_allrecords_inonepage', 0, 1, 1, 1, 1, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(44, 0, 'hidden', 'en', 0, 'Useful Links', '', 7, 'travel-links', '', 0, 0, 4, 9999, 0, '1', 1, 0, 1, 1, 1, '', 0, 1, 0, 1, 1, 'Useful Links', '', '', '', 0, '0.50', 1, 'default', 0, 1, 1, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 0, 'hidden', 'en', 0, 'Error Page', '', 2, 'errorpage-en', '', 1, 0, 5, 1, 0, '1', 1, 0, 1, 1, 63, '', 0, 1, 0, 1, 1, '404 Error - Page Not Found', '', '', '', 0, '0.00', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 49, 'hidden', 'en', 0, 'Become a member', '', 2, 'new_member_EN', '', 0, 0, 1, 1, 0, '1', 1, 0, 1, 1, 58, '', 0, 1, 0, 1, 1, 'Become a member', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 0, 'hidden', 'en', 0, 'Extranet Login', '', 0, 'RxD8TtUOHsMuC0AN', '', 0, 0, 19, 9999, 0, '1', 1, 0, 1, 1, 1, '', 0, 1, 0, 1, 0, 'Extranet Login', '', '', '', 0, '0.00', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 49, 'hidden', 'en', 0, 'Waiting for Activation', '', 2, 'waiting_activation_EN', '', 0, 0, 4, 1, 0, '1', 1, 0, 1, 1, 1, '', 0, 1, 0, 1, 1, 'Waiting for Activation', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 0, 'socialmedia', 'en', 0, 'Social Media', '', 35, 'social-media', '', 0, 0, 1, 999, 0, '1', 1, 0, 1, 1, 1, '', 0, 0, 0, 0, 0, 'Social Media', '', '', '', 0, '0.00', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'socialmedia', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 49, 'hidden', 'en', 0, 'Extranet Login', '', 2, 'login_EN', '', 0, 0, 5, 1, 0, '1', 1, 0, 1, 1, 65, '', 0, 1, 0, 1, 1, 'Extranet Login', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(146, 0, 'banners', 'en', 0, 'Banners ', '', 6, 'Zi8tptJeRDfYng58', NULL, 0, 0, 2, 9999, 0, 'lists/default', 1, 0, 1, 1, 1, '', 0, 0, 0, 0, 1, '', '', '', '', 0, '0.00', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', NULL, 0, '', 'banners', '', 'Asc', 0, 'lists/mobile_cat_list', 0, 1, 1, 1, 1, 8, 8, 36, 1, 0, 0, 0, 0, 0, 0, 0, NULL),
(149, 1, 'general', 'en', 0, 'Home Records', '', 38, 'home-responsive', '', 1, 1, 1, 999, 0, '1', 6, 0, 1, 1, 1, '', 0, 0, 0, 0, 1, 'Home Responsive', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(150, 0, 'socialmedia', 'en', 0, 'Badges', '', 42, 'badges', NULL, 0, 0, 2, 9999, 0, 'lists/default', 1, 0, 1, 1, 1, '', 0, 0, 0, 0, 0, 'Badges', '', '', '', 0, '0.00', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', NULL, 0, '', 'socialmedia', '', 'Asc', 0, 'lists/mobile_cat_list', 0, 1, 1, 1, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, NULL),
(151, 0, 'offerspopup', 'en', 0, 'Offers', '', 43, 'offers_popup', NULL, 0, 0, 1, 9999, 0, 'lists/default', 1, 0, 1, 1, 1, '', 0, 0, 0, 0, 1, 'Offers', '', '', '', 0, '0.00', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', NULL, 0, '', 'offerspopup', '', 'Asc', 0, 'lists/mobile_cat_list', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(178, 0, 'offerspopup', 'en', 0, 'Best Rate', '', 43, 'targeted', '', 0, 0, 3, 999, 0, '1', 1, 0, 31, 0, 1, '', 1, 1, 0, 1, 1, 'New Category', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'offerspopup', '', 'Asc', 0, '1', 0, 31, 0, 1, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(161, 0, 'optimized', 'en', 0, 'Optimized', NULL, 45, 'optimized', NULL, 0, 0, 0, 999, 0, 'lists/default', 1, 1, 1, 1, 1, '', 1, 1, 0, 1, 1, '', '', '', NULL, 0, '0.00', 1, 'default', NULL, 0, 0, 1, 1, 0, '', NULL, NULL, 0, '', 'optimized', NULL, 'Asc', 0, 'lists/mobile_cat_list', 0, 1, 1, 1, 1, 8, 8, 36, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(162, 0, 'offerspopup', 'en', 0, 'Hotel Price Widget', '', 46, 'hotel-price-widget', '', 0, 0, 4, 999, 0, '1', 1, 0, 1, 1, 1, '', 1, 1, 0, 1, 1, '', '', '', '', 1, '0.00', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'offerspopup', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(179, 1, 'general', 'en', 0, 'Reviews', '', 2, 'gk1SMvIbrfojxubL', '', 1, 1, 2, 999, 0, '1', 6, 0, 1, 1, 1, '', 0, 0, 0, 0, 1, 'Home Responsive', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 0, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(180, 0, 'general', 'en', 0, 'ACCOMMODATION', '', 3, 'accommodation', '', 0, 0, 3, 0, 4, '9', 6, 0, 54, 54, 1, '', 1, 0, 0, 1, 1, 'Accommodation', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '9', 0, 54, 54, 6, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(181, 180, 'general', 'en', 0, 'SUPERIOR DOUBLE ROOM', '', 37, 'superior-double-room', '', 0, 0, 1, 0, 4, '28', 6, 1, 1, 1, 77, '', 1, 1, 0, 0, 1, 'Superior Double Room', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '28', 0, 1, 1, 6, 77, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(182, 180, 'general', 'en', 0, 'PREMIUM SUITE', '', 37, 'premium-suite', '', 0, 0, 2, 0, 4, '28', 6, 1, 1, 1, 77, '', 1, 1, 0, 0, 1, 'Premium Suite', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '28', 0, 1, 1, 6, 77, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(183, 180, 'general', 'en', 0, 'EXCLUSIVE SUITE', '', 37, 'exclusive-suite', '', 0, 0, 3, 0, 4, '28', 6, 1, 1, 1, 77, '', 1, 1, 0, 0, 1, 'Exclusive Suite', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '28', 0, 1, 1, 6, 77, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(184, 180, 'general', 'en', 0, 'FAMILY ROOM', '', 37, 'family-room', '', 0, 0, 4, 0, 4, '28', 6, 1, 1, 1, 77, '', 1, 1, 0, 0, 1, 'Family Room', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '28', 0, 1, 1, 6, 77, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(185, 0, 'general', 'en', 0, 'GASTRONOMY', '', 0, 'gastronomy', '', 0, 0, 4, 0, 0, '9', 1, 0, 57, 60, 1, '', 1, 0, 0, 1, 1, 'Gastronomy', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '9', 0, 57, 57, 1, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(186, 185, 'general', 'en', 0, 'SEA SIDE RESTAURANT', '', 3, 'sea-side-restaurant', '', 0, 0, 1, 0, 4, '1', 6, 0, 1, 1, 1, '', 1, 1, 0, 0, 1, 'Sea Side Restaurant', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(187, 185, 'general', 'en', 0, 'BLUE RESTAURANT', '', 3, 'blue-restaurant', '', 0, 0, 2, 0, 4, '1', 6, 0, 1, 1, 1, '', 1, 1, 0, 0, 1, 'Blue Restaurant', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(188, 0, 'general', 'en', 0, 'EXPERIENCES', '', 0, 'experiences', '', 0, 0, 7, 0, 0, '9', 1, 0, 57, 60, 1, '', 1, 0, 0, 1, 1, 'Experiences', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', 'Page_Order', 'Asc', 0, '9', 0, 57, 57, 1, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(189, 188, 'general', 'en', 0, 'WELLNESS & SPA', '', 3, 'wellness-and-spa', '', 0, 0, 1, 0, 4, '1', 6, 1, 1, 1, 1, '', 1, 1, 0, 0, 1, 'Wellness & Spa', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(190, 188, 'general', 'en', 0, 'TOURS', '', 3, 'tours', '', 0, 0, 2, 0, 4, '1', 6, 1, 1, 1, 1, '', 1, 1, 0, 0, 1, 'Tours', '', '', '', 0, '0.00', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(191, 0, 'general', 'en', 0, 'EXPLORE RHODES', '', 36, 'explore-rhodes', '', 0, 0, 9, 999, 0, '17', 1, 0, 64, 64, 76, '', 1, 1, 0, 1, 1, 'Explore Rhodes', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '17', 0, 64, 64, 1, 81, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(192, 0, 'general', 'en', 0, 'THE HOTEL', '', 3, 'the-hotel', '', 0, 0, 2, 0, 4, '1', 6, 1, 1, 1, 1, '', 1, 1, 0, 1, 1, 'The Hotel', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(193, 0, 'general', 'en', 0, 'THE BEACH', '', 3, 'the-beach', '', 0, 0, 5, 0, 4, '1', 6, 1, 1, 1, 1, '', 1, 1, 0, 1, 1, 'The Beach', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(194, 0, 'general', 'en', 0, 'POOL AREA', '', 3, 'pool-area', '', 0, 0, 6, 0, 4, '1', 6, 1, 1, 1, 1, '', 1, 1, 0, 1, 1, 'Pool Area', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(195, 0, 'general', 'en', 0, 'THE GARDENS', '', 3, 'the-gardens', '', 0, 0, 8, 0, 4, '1', 6, 1, 1, 1, 1, '', 1, 1, 0, 1, 1, 'The Gardens', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 1, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(196, 0, 'general', 'en', 0, 'LOCATION', '', 3, 'location', '', 0, 0, 10, 0, 4, '1', 6, 1, 1, 1, 64, '', 1, 1, 0, 1, 1, 'Location', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 64, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(197, 0, 'general', 'en', 0, 'PRIVACY POLICY', '', 3, 'privacy-policy-en', '', 0, 0, 12, 0, 0, '1', 1, 0, 1, 1, 1, '', 0, 1, 0, 1, 1, 'Privacy Policy', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 1, 1, 0, 0, 36, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(198, 0, 'general', 'en', 0, 'PHOTO GALLERY', '', 3, 'photo-gallery', '', 0, 0, 11, 999, 0, '2', 1, 0, 1, 1, 80, '', 1, 0, 0, 1, 1, 'Photo Gallery', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '2', 0, 1, 1, 1, 80, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(199, 0, 'general', 'en', 0, 'CONTACT US', '', 15, 'contact-us', '', 0, 0, 999, 0, 4, '1', 6, 0, 1, 1, 44, '', 1, 1, 0, 1, 1, 'Contact Us', '', '', '', 1, '0.50', 1, 'default', 0, 0, 0, 9, 9, 0, '', '', '', 0, '', 'general', '', 'Asc', 0, '1', 0, 1, 1, 6, 44, 0, 0, 36, 1, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages_settings`
--

DROP TABLE IF EXISTS `pages_settings`;
CREATE TABLE IF NOT EXISTS `pages_settings` (
  `PS_ID` int(5) NOT NULL AUTO_INCREMENT,
  `Set_Page_ID` int(7) NOT NULL DEFAULT 0,
  `Set_Site_Name` varchar(40) NOT NULL DEFAULT 'INCOM',
  `Set_List_DivClass` int(7) DEFAULT NULL,
  `Set_Item_DivClass` int(7) DEFAULT NULL,
  `Set_List_NumRecs` int(4) NOT NULL DEFAULT 999,
  `Set_Div_GridGallery` int(7) DEFAULT NULL,
  `Set_Div_GridGalleryItem` int(7) DEFAULT NULL,
  `Set_MaxPhotos` int(2) NOT NULL DEFAULT 6,
  `Set_MobMaxPhotos` int(3) NOT NULL DEFAULT 14,
  PRIMARY KEY (`PS_ID`),
  KEY `Set_Page_ID` (`Set_Page_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_settings`
--

INSERT INTO `pages_settings` (`PS_ID`, `Set_Page_ID`, `Set_Site_Name`, `Set_List_DivClass`, `Set_Item_DivClass`, `Set_List_NumRecs`, `Set_Div_GridGallery`, `Set_Div_GridGalleryItem`, `Set_MaxPhotos`, `Set_MobMaxPhotos`) VALUES
(1, 0, 'INCOM', 0, 0, 10, 0, 0, 5, 4),
(5, 81, '', NULL, NULL, 15, NULL, NULL, 6, 14),
(11, 191, '', 599, 0, 999, 0, 0, 5, 4),
(12, 180, '', 365, 0, 999, 0, 0, 5, 4),
(13, 181, '', 0, 0, 10, 0, 0, 6, 5),
(14, 182, '', 0, 0, 10, 0, 0, 6, 5),
(15, 183, '', 0, 0, 10, 0, 0, 6, 5),
(16, 184, '', 0, 0, 10, 0, 0, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages_view`
--

DROP TABLE IF EXISTS `pages_view`;
CREATE TABLE IF NOT EXISTS `pages_view` (
  `Pview_ID` int(5) NOT NULL AUTO_INCREMENT,
  `Cat_Code` varchar(15) NOT NULL DEFAULT 'lists',
  `Cat_Header` varchar(10) NOT NULL DEFAULT 'default',
  `Page_Code` varchar(30) NOT NULL DEFAULT '',
  `Page_Desc` varchar(120) NOT NULL DEFAULT '',
  `Active_View` int(1) NOT NULL DEFAULT 1,
  `Order` int(3) NOT NULL DEFAULT 999,
  PRIMARY KEY (`Pview_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_view`
--

INSERT INTO `pages_view` (`Pview_ID`, `Cat_Code`, `Cat_Header`, `Page_Code`, `Page_Desc`, `Active_View`, `Order`) VALUES
(33, 'lists', 'default', 'default', 'Default', 1, 999),
(9, 'lists', 'default', 'cat_inc_allparents', 'Categories - Include All Parents', 1, 999),
(10, 'lists', 'default', 'cat_inc_allparents_loop', 'Categories - Include All Parents Loop', 1, 999),
(12, 'lists', 'default', 'cat_tabs_submenu_preload', 'Categories - Tabs SubMenu (Preload)', 1, 999),
(19, 'lists', 'default', 'recs_list', 'Records List', 1, 999),
(24, 'lists', 'default', 'recs_allrecords_inonepage', 'All Records in One Page', 1, 999),
(25, 'lists', 'default', 'recs_tabs_submenu_preload', 'Records Tabs SubMenu Preload', 1, 999),
(28, 'lists', 'default', 'show_first_parent', 'Show First Sub Category', 1, 999),
(34, 'lists', 'default', 'recs_accordition', 'Records Accordition', 1, 999),
(35, 'lists', 'default', 'sitemap', 'Sitemap', 1, 999),
(36, 'lists', 'default', 'search', 'Search results', 1, 999),
(41, 'lists', 'default', 'recs_list_preload', 'Records List (Preload)', 1, 999),
(42, 'lists', 'default', 'cat_tabs_submenu', 'Categories - Tabs SubMenu', 1, 999),
(43, 'lists', 'default', 'recs_submenu', 'Records SubMenu', 1, 999),
(48, 'lists', 'default', 'cat_submenu', 'Categories SubMenu', 1, 999),
(49, 'lists', 'default', 'recs_tabs_submenuScrollText', 'Records Tabs ScrollText', 1, 999),
(50, 'lists', 'default', 'useful_links', 'Useful Links', 1, 999),
(53, 'lists', 'default', 'recs_list_ajax', 'Records List (Ajax)', 1, 999),
(54, 'lists', 'default', 'extranet', 'Extranet', 1, 999),
(55, 'lists', 'default', 'recs_list_header', 'Records List Header', 1, 999),
(56, 'lists', 'default', 'cats_list', 'Categories List', 1, 999),
(63, 'lists', 'default', 'cats_recs_menu_head', 'Categories List (Head Content)', 1, 999),
(60, 'lists', 'default', 'cats_recs_menu', 'Categories List Records (Menu)', 1, 999),
(61, 'lists', 'default', 'cats_recs_menu_head', 'Categories List Recs Head (Menu)', 1, 999),
(64, 'lists', 'default', 'offers', 'Offers Page', 1, 999);

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

DROP TABLE IF EXISTS `passwords`;
CREATE TABLE IF NOT EXISTS `passwords` (
  `Pas_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Pas_Usn` varchar(20) DEFAULT '',
  `Pas_Psw` varchar(50) DEFAULT NULL,
  `Pas_Name` varchar(100) DEFAULT '',
  `Pas_Email` varchar(120) DEFAULT NULL,
  `Pas_Level` int(2) NOT NULL DEFAULT 1,
  `Pas_FullAccess` int(1) NOT NULL DEFAULT 1,
  `Pas_Section` varchar(30) DEFAULT NULL,
  `Acc_FieldLists` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_DynFields` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_AttTables` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_Categories` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_TempWebSite` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_TempCat` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_TempList` varchar(1) NOT NULL DEFAULT '0',
  `Acc_TempRec` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_TempHead` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_Modules` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_LiveEdit` varchar(1) NOT NULL DEFAULT '0',
  `Acc_LiveEditTemplates` varchar(1) NOT NULL DEFAULT '0',
  `Acc_PageEditSettings` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_Activate` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_Javascript` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_AddAdminUser` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_Members` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_CSS` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_SettingsVars` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_Settings` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Acc_Eshop` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Eshop_OrdRep` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_Discounts` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_Stats` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_Settings` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_Customers` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_ShipCost` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_Zones` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_VAT` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_Suppliers` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_Statements` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_Brands` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_ProdCats` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Eshop_Availability` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 1,
  `Pas_Fails` int(2) NOT NULL,
  PRIMARY KEY (`Pas_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 8192 kB';

--
-- Dumping data for table `passwords`
--

INSERT INTO `passwords` (`Pas_ID`, `Pas_Usn`, `Pas_Psw`, `Pas_Name`, `Pas_Email`, `Pas_Level`, `Pas_FullAccess`, `Pas_Section`, `Acc_FieldLists`, `Acc_DynFields`, `Acc_AttTables`, `Acc_Categories`, `Acc_TempWebSite`, `Acc_TempCat`, `Acc_TempList`, `Acc_TempRec`, `Acc_TempHead`, `Acc_Modules`, `Acc_LiveEdit`, `Acc_LiveEditTemplates`, `Acc_PageEditSettings`, `Acc_Activate`, `Acc_Javascript`, `Acc_AddAdminUser`, `Acc_Members`, `Acc_CSS`, `Acc_SettingsVars`, `Acc_Settings`, `Acc_Eshop`, `Eshop_OrdRep`, `Eshop_Discounts`, `Eshop_Stats`, `Eshop_Settings`, `Eshop_Customers`, `Eshop_ShipCost`, `Eshop_Zones`, `Eshop_VAT`, `Eshop_Suppliers`, `Eshop_Statements`, `Eshop_Brands`, `Eshop_ProdCats`, `Eshop_Availability`, `Pas_Fails`) VALUES
(9, 'logadm7&', '7376dbdeff2bb73a52b27bd6ebbbcd1a', '', '', 0, 1, NULL, 0, 0, 0, 0, 0, 0, '0', 0, 0, 0, '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `Rec_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Rec_Page_ID` int(7) DEFAULT NULL,
  `Rec_Page_View` varchar(70) DEFAULT NULL,
  `Rec_Page_Content` int(1) NOT NULL DEFAULT 0,
  `Rec_Rel_LangID` int(7) DEFAULT NULL,
  `Rec_Title` varchar(255) DEFAULT NULL,
  `Rec_Title_Meta` varchar(120) DEFAULT NULL,
  `Rec_Desc` text DEFAULT NULL,
  `Rec_Desc_Meta` varchar(255) DEFAULT NULL,
  `Rec_Canonical_URL` varchar(255) DEFAULT NULL,
  `Rec_Order` int(4) DEFAULT 999,
  `Rec_ShowHome` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Rec_HomeRotator` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Rec_ShowMore` int(1) NOT NULL DEFAULT 1,
  `Rec_TextArea1` text DEFAULT NULL,
  `Rec_TextArea2` text DEFAULT NULL,
  `Rec_TextArea3` text DEFAULT NULL,
  `Rec_TextArea4` text DEFAULT NULL,
  `Rec_Field1` varchar(255) DEFAULT NULL,
  `Rec_Field2` varchar(255) DEFAULT NULL,
  `Rec_Field3` varchar(255) DEFAULT NULL,
  `Rec_Field4` varchar(255) DEFAULT NULL,
  `Rec_Field5` varchar(255) DEFAULT NULL,
  `Rec_Field6` varchar(255) DEFAULT NULL,
  `Rec_Field7` varchar(255) DEFAULT NULL,
  `Rec_Field8` varchar(255) DEFAULT NULL,
  `Rec_Field9` varchar(255) DEFAULT NULL,
  `Rec_Field10` varchar(255) DEFAULT NULL,
  `Rec_Field11` varchar(255) DEFAULT NULL,
  `Rec_Field12` varchar(255) DEFAULT NULL,
  `Rec_Field13` varchar(255) DEFAULT NULL,
  `Rec_Field14` varchar(255) DEFAULT NULL,
  `Rec_Field15` varchar(255) DEFAULT NULL,
  `Rec_Field16` varchar(255) DEFAULT NULL,
  `Rec_Field17` varchar(255) DEFAULT NULL,
  `Rec_Field18` varchar(255) DEFAULT NULL,
  `Rec_Field19` varchar(255) DEFAULT NULL,
  `Rec_Field20` varchar(255) DEFAULT NULL,
  `Rec_Field21` varchar(255) DEFAULT NULL,
  `Rec_Field22` varchar(255) DEFAULT NULL,
  `Rec_Field23` varchar(255) DEFAULT NULL,
  `Rec_Field24` varchar(255) DEFAULT NULL,
  `Rec_Field25` varchar(255) DEFAULT NULL,
  `Rec_Field26` varchar(255) DEFAULT NULL,
  `Rec_Field27` varchar(255) DEFAULT NULL,
  `Rec_Field28` varchar(255) DEFAULT NULL,
  `Rec_Field29` varchar(255) DEFAULT NULL,
  `Rec_Field30` varchar(255) DEFAULT NULL,
  `Rec_Price` decimal(10,2) DEFAULT NULL,
  `Rec_Price2` decimal(10,2) DEFAULT NULL,
  `Rec_Price3` decimal(10,2) DEFAULT NULL,
  `Rec_Discount` int(5) NOT NULL DEFAULT 0,
  `Rec_Weight` int(6) NOT NULL DEFAULT 0,
  `Rec_Stock` bigint(6) DEFAULT NULL,
  `Rec_Vat` varchar(35) DEFAULT NULL,
  `Rec_Availability` varchar(35) DEFAULT NULL,
  `Rec_Brand` varchar(35) DEFAULT NULL,
  `Rec_Supplier` varchar(35) DEFAULT NULL,
  `Rec_CatProduct` varchar(35) DEFAULT NULL,
  `Rec_HotPrice` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Rec_BestSeller` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Rec_BestPrice` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Rec_BestChoice` int(1) UNSIGNED ZEROFILL NOT NULL DEFAULT 0,
  `Rec_Check1` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Check2` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Check3` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Check4` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Check5` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Check6` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Check7` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Check8` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Check9` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Check10` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rec_Scroll1` varchar(60) DEFAULT '0',
  `Rec_Scroll2` varchar(60) DEFAULT '0',
  `Rec_Scroll3` varchar(60) DEFAULT '0',
  `Rec_Scroll4` varchar(60) DEFAULT '0',
  `Rec_Scroll5` varchar(60) DEFAULT '0',
  `Rec_Scroll6` varchar(60) NOT NULL DEFAULT '0',
  `Rec_Scroll7` varchar(60) NOT NULL DEFAULT '0',
  `Rec_Form` int(3) DEFAULT NULL,
  `Num_HPhotos` int(3) DEFAULT NULL,
  `StartAt_Photos` int(2) NOT NULL DEFAULT 0,
  `RepeatRow_Photos` int(2) DEFAULT NULL,
  `Rec_View` int(4) NOT NULL DEFAULT 1,
  `Rec_View_Mob` int(4) NOT NULL DEFAULT 1,
  `Rec_Lists_View` int(4) NOT NULL DEFAULT 0,
  `Rec_Lists_View_Mob` int(4) NOT NULL DEFAULT 0,
  `Rec_Image1` varchar(255) DEFAULT NULL,
  `Rec_Image1_Alt` varchar(70) DEFAULT NULL,
  `Rec_Image2` varchar(255) DEFAULT NULL,
  `Rec_Image2_Alt` varchar(70) DEFAULT NULL,
  `Rec_Image3` varchar(255) DEFAULT NULL,
  `Rec_Image3_Alt` varchar(70) DEFAULT NULL,
  `Rec_Image4` varchar(255) DEFAULT NULL,
  `Rec_Image4_Alt` varchar(70) DEFAULT NULL,
  `Rec_Image5` varchar(255) DEFAULT NULL,
  `Rec_Image5_Alt` varchar(70) DEFAULT NULL,
  `Rec_Image6` varchar(255) DEFAULT NULL,
  `Rec_Image6_Alt` varchar(70) DEFAULT NULL,
  `Rec_Logo` varchar(255) DEFAULT NULL,
  `Rec_Logo_Alt` varchar(70) DEFAULT NULL,
  `Rec_Logo_Bottom` varchar(255) DEFAULT NULL,
  `Rec_Logo_Bottom_Alt` varchar(70) DEFAULT NULL,
  `Rec_Image_Social` varchar(255) DEFAULT NULL,
  `Rec_Image_Social_Alt` varchar(70) DEFAULT NULL,
  `Rec_Text1` varchar(20) DEFAULT NULL,
  `Rec_Text2` varchar(20) DEFAULT NULL,
  `Rec_TextMob` varchar(20) DEFAULT NULL,
  `Rec_File1` varchar(80) DEFAULT NULL,
  `Rec_File2` varchar(80) DEFAULT NULL,
  `Rec_DateStart` varchar(14) DEFAULT NULL,
  `Rec_DateStop` varchar(14) DEFAULT NULL,
  `Rec_Active` int(1) NOT NULL DEFAULT 0,
  `Rec_Preview` int(1) NOT NULL DEFAULT 0,
  `Rec_Img_Cat_ID` int(7) DEFAULT 0,
  `Rec_NoResImg_Cat_ID` int(7) NOT NULL DEFAULT 0,
  `Docs_Group_ID` int(7) DEFAULT NULL,
  `Rat_MultipleSel1` text DEFAULT NULL,
  `Rat_MultipleSel2` text DEFAULT NULL,
  `Rat_MultipleSel3` text DEFAULT NULL,
  `Rat_MultipleSel4` text DEFAULT NULL,
  `Rat_MultipleSel5` text DEFAULT NULL,
  `Rat_MultipleSel6` text DEFAULT NULL,
  `Rat_MultipleSel7` text DEFAULT NULL,
  `Rat_MultipleSel8` text DEFAULT NULL,
  `Rat_MultipleSel9` text DEFAULT NULL,
  `Rat_MultipleSel10` text DEFAULT NULL,
  `Rat_MultipleSel11` text DEFAULT NULL,
  `Rat_MultipleSel12` text DEFAULT NULL,
  `Rat_MultipleSel13` text DEFAULT NULL,
  `Rat_MultipleSel14` text DEFAULT NULL,
  `Rat_MultipleSel15` text DEFAULT NULL,
  `Rec_GeoLocation` varchar(255) NOT NULL,
  `Rec_Keywords` text DEFAULT NULL,
  `Creation_Date` varchar(30) NOT NULL DEFAULT '',
  `Modify_Date` varchar(30) NOT NULL DEFAULT '',
  `Member_ID` int(5) DEFAULT NULL,
  `AdminUser_ID` int(3) DEFAULT NULL,
  PRIMARY KEY (`Rec_ID`),
  KEY `Rec_Page_ID` (`Rec_Page_ID`),
  KEY `Rec_DateStart` (`Rec_DateStart`),
  KEY `Rec_Order` (`Rec_Order`),
  KEY `Rec_Scroll1` (`Rec_Scroll1`)
) ENGINE=MyISAM AUTO_INCREMENT=407 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 8192 kB; InnoDB free: 8192 kB; InnoDB free: 819';

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`Rec_ID`, `Rec_Page_ID`, `Rec_Page_View`, `Rec_Page_Content`, `Rec_Rel_LangID`, `Rec_Title`, `Rec_Title_Meta`, `Rec_Desc`, `Rec_Desc_Meta`, `Rec_Canonical_URL`, `Rec_Order`, `Rec_ShowHome`, `Rec_HomeRotator`, `Rec_ShowMore`, `Rec_TextArea1`, `Rec_TextArea2`, `Rec_TextArea3`, `Rec_TextArea4`, `Rec_Field1`, `Rec_Field2`, `Rec_Field3`, `Rec_Field4`, `Rec_Field5`, `Rec_Field6`, `Rec_Field7`, `Rec_Field8`, `Rec_Field9`, `Rec_Field10`, `Rec_Field11`, `Rec_Field12`, `Rec_Field13`, `Rec_Field14`, `Rec_Field15`, `Rec_Field16`, `Rec_Field17`, `Rec_Field18`, `Rec_Field19`, `Rec_Field20`, `Rec_Field21`, `Rec_Field22`, `Rec_Field23`, `Rec_Field24`, `Rec_Field25`, `Rec_Field26`, `Rec_Field27`, `Rec_Field28`, `Rec_Field29`, `Rec_Field30`, `Rec_Price`, `Rec_Price2`, `Rec_Price3`, `Rec_Discount`, `Rec_Weight`, `Rec_Stock`, `Rec_Vat`, `Rec_Availability`, `Rec_Brand`, `Rec_Supplier`, `Rec_CatProduct`, `Rec_HotPrice`, `Rec_BestSeller`, `Rec_BestPrice`, `Rec_BestChoice`, `Rec_Check1`, `Rec_Check2`, `Rec_Check3`, `Rec_Check4`, `Rec_Check5`, `Rec_Check6`, `Rec_Check7`, `Rec_Check8`, `Rec_Check9`, `Rec_Check10`, `Rec_Scroll1`, `Rec_Scroll2`, `Rec_Scroll3`, `Rec_Scroll4`, `Rec_Scroll5`, `Rec_Scroll6`, `Rec_Scroll7`, `Rec_Form`, `Num_HPhotos`, `StartAt_Photos`, `RepeatRow_Photos`, `Rec_View`, `Rec_View_Mob`, `Rec_Lists_View`, `Rec_Lists_View_Mob`, `Rec_Image1`, `Rec_Image1_Alt`, `Rec_Image2`, `Rec_Image2_Alt`, `Rec_Image3`, `Rec_Image3_Alt`, `Rec_Image4`, `Rec_Image4_Alt`, `Rec_Image5`, `Rec_Image5_Alt`, `Rec_Image6`, `Rec_Image6_Alt`, `Rec_Logo`, `Rec_Logo_Alt`, `Rec_Logo_Bottom`, `Rec_Logo_Bottom_Alt`, `Rec_Image_Social`, `Rec_Image_Social_Alt`, `Rec_Text1`, `Rec_Text2`, `Rec_TextMob`, `Rec_File1`, `Rec_File2`, `Rec_DateStart`, `Rec_DateStop`, `Rec_Active`, `Rec_Preview`, `Rec_Img_Cat_ID`, `Rec_NoResImg_Cat_ID`, `Docs_Group_ID`, `Rat_MultipleSel1`, `Rat_MultipleSel2`, `Rat_MultipleSel3`, `Rat_MultipleSel4`, `Rat_MultipleSel5`, `Rat_MultipleSel6`, `Rat_MultipleSel7`, `Rat_MultipleSel8`, `Rat_MultipleSel9`, `Rat_MultipleSel10`, `Rat_MultipleSel11`, `Rat_MultipleSel12`, `Rat_MultipleSel13`, `Rat_MultipleSel14`, `Rat_MultipleSel15`, `Rec_GeoLocation`, `Rec_Keywords`, `Creation_Date`, `Modify_Date`, `Member_ID`, `AdminUser_ID`) VALUES
(30, 43, '8cnXy9WKN5aKR3CS', 0, NULL, 'di_s370_j9/', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '80', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '3', 'irq0', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'en', '', '', '', '', '', '', 0, 0, 0, 1, 62, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2011-12-08,00:38', '2021-03-24,17:17', NULL, 11),
(40, 53, 'waiting_activation_EN', 0, NULL, '', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '0', '0', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012/10/40_1', '', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2012-07-17,16:58', '2012-10-15,11:17', NULL, 0),
(43, 51, 'edit_profile_EN', 0, NULL, 'Edit Profile', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '0', '0', NULL, 0, 0, 1, 53, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2012-07-18,09:23', '2012-07-18,09:23', NULL, 1),
(42, 50, 'new_member_EN', 0, NULL, 'Become a member', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 58, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013/01/42_1', '', NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2012-07-17,17:55', '2013-01-25,09:23', NULL, 0),
(18, 5, 'newsletter_EN', 0, NULL, 'Subscribe to our Newsletter', '', 'Submit your e-mail to receive our news.', '', NULL, 0, 0, 0, 1, 'The submission was successful!<br>\r\nThank you for your registration.<br /><br />\r\nThe e-mail you used is:<br>\r\n', 'This is an automated message. <br /><br />Your registration request has been received.<br /><br />Thank you for submiting in our Newsletter.', '', '', '.: You have already registered in our newsletter :.', '', '', '', '', '', '', '', '', 'Newsletter Subscription', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'OK', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 51, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2011-08-28,17:48', '2015-01-07,00:21', NULL, 0),
(39, 48, 'errorpage-en', 0, NULL, 'This Page does not exist', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '0', '0', NULL, 0, 0, 1, 63, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2012/10/39_1', '', NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2012-03-09,15:34', '2012-10-14,13:08', NULL, 0),
(56, 66, 'social-media', 0, NULL, 'Facebook', '', '', '', '', 1, 0, 0, 1, '', '', '', '', 'http://www.facebook.com/', 'Follow us on Facebook', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '_blank', 'fab fa-facebook-f', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2013-11-12,10:22', '2017-12-29,16:26', NULL, 0),
(55, 65, 'login_EN', 0, NULL, 'Extranet Login', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 65, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2013/01/55_1', '', NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2013-01-25,09:23', '2013-01-25,09:24', NULL, 0),
(280, 66, 'social-media', 0, NULL, 'Pinterest', '', '', '', '', 3, 0, 0, 1, '', '', '', '', 'https://www.pinterest.com/', 'Find us on Pinterest', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '_blank', 'fab fa-pinterest-p', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2015-08-20,10:19', '2017-12-29,16:32', NULL, 0),
(281, 66, 'social-media', 0, NULL, 'Youtube', '', '', '', '', 4, 0, 0, 1, '', '', '', '', 'https://www.youtube.com/', 'Find us on Youtube', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '_blank', 'fab fa-youtube', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2015-08-20,10:20', '2017-12-29,16:33', NULL, 0),
(282, 66, 'social-media', 0, NULL, 'Twitter', '', '', '', '', 5, 0, 0, 1, '', '', '', '', 'https://twitter.com/', 'Follow us on Twitter', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '_blank', 'fab fa-twitter', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2015-08-20,10:20', '2017-12-29,16:34', NULL, 0),
(284, 66, 'social-media', 0, NULL, 'Instagram', '', '', '', '', 2, 0, 0, 1, '', '', '', '', 'https://instagram.com/', 'Follow us on instagram', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '_blank', 'fab fa-instagram', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2015-08-20,10:22', '2017-12-29,16:36', NULL, 0),
(286, 1, '', 0, NULL, 'Home Page', '', '', '', '', 0, 0, 0, 0, '', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d206500.35894761496!2d27.9069869!3d36.0308387!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x149507df41446ccb%3A0x64c0aebfaaed6c82!2zzprOuc6_z4TOrM-Bzrk!5e0!3m2!1sel!2sgr!4v1606294576633!5m2!1sel!2sgr', '', 'Kamperi Grand Hotel 22021 Lindos, Rhodes<br />\r\nTel: +30 235 427 7097<br />\r\nEmail: <a href=\"mailto:info@kamperigrandhotel.com\">info@kamperigrandhotel.com</a>', '', 'Weather', '', 'Local Time', 'Europe/Athens', 'Currency Converter', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Kamperi Grand Hotel', 'Kamperi Grand Hotel', '', 'check availability', 'check availability', 'BOOK NOW', '#', 'BOOK<br>NOW', '#', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 26, 1, 0, 0, NULL, '', '286_R3917_2.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', '286_R6444_logo.png', '', '286_logofooter.jpg_286_R2555_logofooter.png_286_R8286_logofooter.png', '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2016-06-16,16:51', '2021-03-29,11:02', NULL, 11),
(294, 151, 'offers_popup', 0, NULL, 'Global', '', '', '', '', 0, 0, 0, 1, '', '', '', '', 'US,GB,AU,CA,DE,FR,IT,CH,AT,CZ,DK,FI,SE,SP,BR,AE,RU', '', '', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '800', '510', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 30, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '201609051013', '203609051013', 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2016-09-05,08:13', '2016-09-19,07:57', NULL, 0),
(295, 151, 'offers_popup', 0, NULL, 'Targeted', '', '', '', '', 0, 0, 0, 1, '', '', '<div class=\"popupTitle\">SPECIAL OFFER</div><div style=\"padding-top:15px;margin:auto;\"><div class=\"left popupOfferBack\" style=\"margin-left:70px;\"><div class=\"popupOfferText\">10%</div></div><div class=\"left20 popupSubTitle\" style=\"padding-top:32px;\">OFF Discount especially for you!</div><div style=\"clear:both;\"> </div></div><div class=\"popupText top10\"><strong>Book through our hotel website</strong> to get this special discount.<br />Check our prices through our website first...<br />before you book from everywhere else!</div>', '', 'US,GB,AU,CA,FR,DE,IT,CH,IN,BE,MT,TR,IL,AE,KR,RU,BR,SE,ES,DK,FI,CZ,AT,QA,SA', '', '', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '800', '510', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 30, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '201609191901', '203609191901', 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2016-09-19,17:01', '2017-01-22,23:04', NULL, 0),
(353, 178, 'targeted', 0, NULL, 'Global', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'all', '', '', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '202102081733', '204102081733', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-02-08,15:33', '2021-02-08,15:33', NULL, 11),
(304, 161, 'optimized', 0, NULL, 'Optimized', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2018-01-23,15:56', '2018-12-03,15:09', NULL, 11),
(305, 162, 'hotel-price-widget', 0, NULL, 'Global', '', '', '', '', 9999, 0, 0, 1, '', '', '', '', '', '', '', 'Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Best Price Guarantee', '', '', '', '', 'BOOK NOW', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '201804241839', '203804241839', 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2018-04-24,16:39', '2018-04-24,16:40', NULL, 12),
(307, 1, '', 1, NULL, 'Home Page', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2018-11-27,11:57', NULL, 11),
(354, 149, 'home-responsive', 0, NULL, 'Welcome', '', '', '', '', 1, 0, 0, 0, '', '', '', '', 'EXCEPTIONAL', 'ART & ELEGANCE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'the-hotel/', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 51, 51, '354_R5041.jpg', '', '354_R4922_2.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/354_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,13:51', '2021-03-28,15:34', NULL, 11),
(355, 179, 'gk1SMvIbrfojxubL', 0, NULL, 'GREAT STAFF AND EXCELLENT FOOD', '', '', '', '', 9999, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/355_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,14:05', '2021-03-28,14:07', NULL, 11),
(356, 179, 'gk1SMvIbrfojxubL', 0, NULL, 'APTENT. IPSUM PURUS VITAE NISI', '', '', '', '', 9999, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/356_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,14:06', '2021-03-28,21:58', NULL, 11),
(357, 149, 'home-responsive', 0, NULL, 'Accommodation', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida dictum magna vel iaculissapien dictum, aliquet odio. Sed id purus accumsan massa vehicula laciniaelementum.', '', '', 9999, 0, 0, 0, '', '', '', '', 'STAY', 'IN STYLE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'accommodation/', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 53, 53, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,15:34', '2021-03-28,15:59', NULL, 11),
(358, 181, 'superior-double-room', 0, NULL, 'SUPERIOR DOUBLE ROOM', '', 'WITH INDOOR HEATED JACUZZI & SEA VIEW', '', '', 0, 0, 0, 0, '', '', '', '', '', '38m<sup>2</sup>', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, '358_R6448.jpg', '', '358_R4881_2.jpg', '', '358_R3491_3.jpg', '', '358_R1772_4.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/358_1', '2021/03/358_2', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 27, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,15:37', '2021-03-29,11:23', NULL, 11),
(359, 182, 'premium-suite', 0, NULL, 'PREMIUM SUITE', '', 'WITH INDOOR HEATED JACUZZI & SEA VIEW', '', '', 0, 0, 0, 0, '', '', '', '', '', '38m<sup>2</sup>', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, '359_R4851.jpg', '', '359_R1427_2.jpg', '', '359_R2845_3.jpg', '', '359_R9273_4.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/359_1', '2021/03/359_2', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 28, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,15:40', '2021-03-29,11:23', NULL, 11),
(360, 183, 'exclusive-suite', 0, NULL, 'EXCLUSIVE SUITE', '', 'WITH INDOOR HEATED JACUZZI & SEA VIEW', '', '', 0, 0, 0, 0, '', '', '', '', '', '38m<sup>2</sup>', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, '360_R2823.jpg', '', '360_R1662_2.jpg', '', '360_R8339_3.jpg', '', '360_R3973_4.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/360_1', '2021/03/360_2', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 29, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,15:40', '2021-03-29,11:24', NULL, 11),
(361, 184, 'family-room', 0, NULL, 'FAMILY ROOM', '', 'WITH INDOOR HEATED JACUZZI & SEA VIEW', '', '', 0, 0, 0, 0, '', '', '', '', '', '38m<sup>2</sup>', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, '361_R3213.jpg', '', '361_R5479_2.jpg', '', '361_R6371_3.jpg', '', '361_R8016_4.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/361_1', '2021/03/361_2', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 30, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,15:40', '2021-03-29,11:24', NULL, 11),
(362, 149, 'home-responsive', 0, NULL, 'Beach', '', 'Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci.', '', '', 9999, 0, 0, 0, '', '', '', '', 'BAREFOOT MEMORIES', 'ON THE BEACH', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'the-beach/', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 55, 55, '362_R8733.jpg', '', '362_R3304_2.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,21:06', '2021-03-28,21:10', NULL, 11),
(363, 186, 'sea-side-restaurant', 0, NULL, 'Sea Side Restaurant', '', 'Mauris venenatis, mauris at con[gue pretium, libero nisl placerat justo, vel viverra dui lacus quis elit. Vivamus malesuada gravida nibh, sed consectetur dolor posuere non. Cras tincidunt felis eget diam scelerisque sodales.', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, '363_R7322.jpg', '', '363_R4459_2.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/363_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 23, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,21:29', '2021-03-28,21:36', NULL, 11),
(364, 149, 'home-responsive', 0, NULL, 'Gastronomy', '', '', '', '', 9999, 0, 0, 0, '', '', '', '', 'OUT OF THE BOX', 'GASTRONOMY', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 56, 56, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,21:32', '2021-03-28,21:33', NULL, 11),
(365, 187, 'blue-restaurant', 0, NULL, 'Blue Restaurant', '', 'Mauris venenatis, mauris at con[gue pretium, libero nisl placerat justo, vel viverra dui lacus quis elit. Vivamus malesuada gravida nibh, sed consectetur dolor posuere non. Cras tincidunt felis eget diam scelerisque sodales.', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, '365_R4272.jpg', '', '365_R9259_2.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/365_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 24, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,21:36', '2021-03-28,21:56', NULL, 11),
(366, 186, NULL, 1, NULL, 'SEA SIDE RESTAURANT', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 24, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-28,21:46', NULL, 11),
(367, 187, NULL, 1, NULL, 'BLUE RESTAURANT', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 25, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-28,21:55', NULL, 11),
(368, 179, 'gk1SMvIbrfojxubL', 0, NULL, 'PRAESENT VELIT NOSTRA LUCTUS EU PRIMIS.', '', '', '', '', 9999, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/368_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,21:58', '2021-03-28,21:58', NULL, 11),
(369, 149, 'home-responsive', 0, NULL, 'Pool Area', '', 'Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci.', '', '', 9999, 0, 0, 0, '', '', '', '', 'TIME TO RELAX', 'POOL AREA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'pool-area/', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 58, 58, '369_R5287.jpg', '', '369_R1084_2.jpg', '', '369_R3926_3.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,21:59', '2021-03-29,11:17', NULL, 11),
(370, 149, 'home-responsive', 0, NULL, 'Experiences', '', '', '', '', 9999, 0, 0, 0, '', '', '', '', 'LIVE MORE', 'EXPERIENCES', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 59, 59, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:09', '2021-03-28,22:24', NULL, 11),
(371, 149, 'home-responsive', 0, NULL, 'Gardens', '', 'Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci .', '', '', 9999, 0, 0, 0, '', '', '', '', 'FABULOUS GARDENS', 'WALK BY THE RIVER', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'the-gardens/', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 61, 61, '371_R7796.jpg', '', '371_R3331_2.jpg', '', '371_R4524_3.jpg', '', '371_R2303_4.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:12', '2021-03-28,22:20', NULL, 11),
(372, 189, 'wellness-and-spa', 0, NULL, 'Wellness & Spa', '', 'Mauris venenatis, mauris at congue pretium, libero nisl placerat justo, vel viverra dui lacus quis elit. Vivamus malesuada gravida nibh, sed consectetur dolor posuere non. Cras tincidunt felis eget diam scelerisque sodales.', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, '372_R6930.jpg', '', '372_R2439_2.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/372_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:16', '2021-03-28,22:17', NULL, 11),
(373, 190, 'tours', 0, NULL, 'TOURS', '', 'Curabitur non justo ut id ipsum in adipiscing porttitor volutpat in mauris nec orci dui bibendum. Non quis molestie vel ipsum sed posuere faucibus volutpat elementum ornare', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, '373_R5915.jpg', '', '373_R6544_2.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/373_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:17', '2021-03-28,22:18', NULL, 11),
(374, 149, 'home-responsive', 0, NULL, 'Instagram', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '', 9999, 0, 0, 0, '', '', '', '', 'SHARING UNIQUE', 'MOMENTS', 'Live instagram', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 62, 62, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 25, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:24', '2021-03-28,22:27', NULL, 11),
(375, 191, 'explore-rhodes', 0, NULL, 'CASTLES IN RHODES', '', '2000 YEARS OLD EXPERIENCE', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 76, 1, 0, 0, '375_R8730.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:32', '2021-03-28,22:36', NULL, 11),
(376, 191, 'explore-rhodes', 0, NULL, 'LINDOS BEACHES & ACROPOLIS', '', '4,000-YEAR-OLD ACROPOLIS OF LINDOS', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 76, 1, 0, 0, '376_R1333.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:36', '2021-03-28,22:37', NULL, 11),
(377, 191, 'explore-rhodes', 0, NULL, 'THE BEACHES', '', 'DE LA MASTRA MARKIES CONTE SENTRA MONTE', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 76, 1, 0, 0, '377_R1349.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:37', '2021-03-28,22:37', NULL, 11),
(378, 149, 'home-responsive', 0, NULL, 'Explore', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida dictum magna vel iaculissapien dictum, aliquet odio. Sed id purus accumsan massa vehicula laciniaelementum.', '', '', 9999, 0, 0, 0, '', '', '', '', 'EXPLORE UNIQUE', 'RHODES', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 63, 63, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:38', '2021-03-28,22:40', NULL, 11),
(379, 149, 'home-responsive', 0, NULL, 'Location', '', 'Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci .', '', '', 9999, 0, 0, 0, '', '', '', '', 'CENTRAL LOCATION', 'EASY ACCESS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'location/', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 65, 65, '379_R2400.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:41', '2021-03-28,22:44', NULL, 11),
(380, 146, 'Zi8tptJeRDfYng58', 0, NULL, 'TripAdvisor', '', '', '', '', 9999, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '120', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '_blank', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, '380_R2985.jpg', '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '202103282248', '204103282248', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-28,22:48', '2021-03-28,22:51', NULL, 11),
(381, 192, 'the-hotel', 0, NULL, 'THE HOTEL', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/381_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 26, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,09:16', '2021-03-29,09:24', NULL, 11),
(382, 192, NULL, 1, NULL, 'THE HOTEL', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 26, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,09:25', NULL, 11),
(383, 197, 'privacy-policy-en', 0, NULL, 'Privacy Policy', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/383_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,09:36', '2021-03-29,09:36', NULL, 11),
(384, 181, NULL, 1, NULL, 'SUPERIOR DOUBLE ROOM', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 27, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,09:37', NULL, 11),
(385, 182, NULL, 1, NULL, 'PREMIUM SUITE', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 28, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,09:41', NULL, 11),
(386, 183, NULL, 1, NULL, 'EXCLUSIVE SUITE', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 29, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,09:41', NULL, 11),
(387, 184, NULL, 1, NULL, 'FAMILY ROOM', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 30, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,09:43', NULL, 11),
(388, 193, NULL, 1, NULL, 'THE BEACH', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 31, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,10:21', NULL, 11),
(389, 193, 'the-beach', 0, NULL, 'THE BEACH', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/389_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:22', '2021-03-29,10:22', NULL, 11),
(390, 194, NULL, 1, NULL, 'POOL AREA', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 32, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,10:22', NULL, 11),
(391, 194, 'pool-area', 0, NULL, 'THE BEACH', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/391_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:23', '2021-03-29,10:23', NULL, 11),
(392, 189, NULL, 1, NULL, 'WELLNESS AND SPA', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 33, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,10:24', NULL, 11),
(393, 190, NULL, 1, NULL, 'TOURS', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 34, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,10:25', NULL, 11),
(394, 195, NULL, 1, NULL, 'THE GARDENS', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 35, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,10:27', NULL, 11),
(395, 195, 'the-gardens', 0, NULL, 'THE GARDENS', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 1, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/395_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:27', '2021-03-29,10:27', NULL, 11);
INSERT INTO `records` (`Rec_ID`, `Rec_Page_ID`, `Rec_Page_View`, `Rec_Page_Content`, `Rec_Rel_LangID`, `Rec_Title`, `Rec_Title_Meta`, `Rec_Desc`, `Rec_Desc_Meta`, `Rec_Canonical_URL`, `Rec_Order`, `Rec_ShowHome`, `Rec_HomeRotator`, `Rec_ShowMore`, `Rec_TextArea1`, `Rec_TextArea2`, `Rec_TextArea3`, `Rec_TextArea4`, `Rec_Field1`, `Rec_Field2`, `Rec_Field3`, `Rec_Field4`, `Rec_Field5`, `Rec_Field6`, `Rec_Field7`, `Rec_Field8`, `Rec_Field9`, `Rec_Field10`, `Rec_Field11`, `Rec_Field12`, `Rec_Field13`, `Rec_Field14`, `Rec_Field15`, `Rec_Field16`, `Rec_Field17`, `Rec_Field18`, `Rec_Field19`, `Rec_Field20`, `Rec_Field21`, `Rec_Field22`, `Rec_Field23`, `Rec_Field24`, `Rec_Field25`, `Rec_Field26`, `Rec_Field27`, `Rec_Field28`, `Rec_Field29`, `Rec_Field30`, `Rec_Price`, `Rec_Price2`, `Rec_Price3`, `Rec_Discount`, `Rec_Weight`, `Rec_Stock`, `Rec_Vat`, `Rec_Availability`, `Rec_Brand`, `Rec_Supplier`, `Rec_CatProduct`, `Rec_HotPrice`, `Rec_BestSeller`, `Rec_BestPrice`, `Rec_BestChoice`, `Rec_Check1`, `Rec_Check2`, `Rec_Check3`, `Rec_Check4`, `Rec_Check5`, `Rec_Check6`, `Rec_Check7`, `Rec_Check8`, `Rec_Check9`, `Rec_Check10`, `Rec_Scroll1`, `Rec_Scroll2`, `Rec_Scroll3`, `Rec_Scroll4`, `Rec_Scroll5`, `Rec_Scroll6`, `Rec_Scroll7`, `Rec_Form`, `Num_HPhotos`, `StartAt_Photos`, `RepeatRow_Photos`, `Rec_View`, `Rec_View_Mob`, `Rec_Lists_View`, `Rec_Lists_View_Mob`, `Rec_Image1`, `Rec_Image1_Alt`, `Rec_Image2`, `Rec_Image2_Alt`, `Rec_Image3`, `Rec_Image3_Alt`, `Rec_Image4`, `Rec_Image4_Alt`, `Rec_Image5`, `Rec_Image5_Alt`, `Rec_Image6`, `Rec_Image6_Alt`, `Rec_Logo`, `Rec_Logo_Alt`, `Rec_Logo_Bottom`, `Rec_Logo_Bottom_Alt`, `Rec_Image_Social`, `Rec_Image_Social_Alt`, `Rec_Text1`, `Rec_Text2`, `Rec_TextMob`, `Rec_File1`, `Rec_File2`, `Rec_DateStart`, `Rec_DateStop`, `Rec_Active`, `Rec_Preview`, `Rec_Img_Cat_ID`, `Rec_NoResImg_Cat_ID`, `Docs_Group_ID`, `Rat_MultipleSel1`, `Rat_MultipleSel2`, `Rat_MultipleSel3`, `Rat_MultipleSel4`, `Rat_MultipleSel5`, `Rat_MultipleSel6`, `Rat_MultipleSel7`, `Rat_MultipleSel8`, `Rat_MultipleSel9`, `Rat_MultipleSel10`, `Rat_MultipleSel11`, `Rat_MultipleSel12`, `Rat_MultipleSel13`, `Rat_MultipleSel14`, `Rat_MultipleSel15`, `Rec_GeoLocation`, `Rec_Keywords`, `Creation_Date`, `Modify_Date`, `Member_ID`, `AdminUser_ID`) VALUES
(396, 196, 'location', 0, NULL, 'LOCATION', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 64, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '2021/03/396_1', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:33', '2021-03-29,10:33', NULL, 11),
(397, 196, NULL, 1, NULL, 'LOCATION', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 36, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,10:34', NULL, 11),
(398, 198, 'photo-gallery', 0, NULL, 'THE HOTEL', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'THE HOTEL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 80, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 26, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:36', '2021-03-29,10:36', NULL, 11),
(399, 198, 'photo-gallery', 0, NULL, 'SUPERIOR DOUBLE ROOM', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'SUPERIOR DOUBLE ROOM', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 80, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 27, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:36', '2021-03-29,10:36', NULL, 11),
(400, 198, 'photo-gallery', 0, NULL, 'PREMIUM SUITE', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'PREMIUM SUITE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 80, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 28, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:36', '2021-03-29,10:39', NULL, 11),
(401, 198, 'photo-gallery', 0, NULL, 'EXCLUSIVE SUITE', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'EXCLUSIVE SUITE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 80, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 28, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:36', '2021-03-29,10:39', NULL, 11),
(406, 199, 'contact-us', 0, NULL, 'CONTACT', '', '', '', '', 0, 0, 0, 0, '<strong>Your submission was succesfull!</strong>\r\n<br /><br />\r\n<strong>Thank you for your contact.</strong><br />\r\nThe information you sent us is below:', 'This is an automatic message.<br>\r\nThank you for your contact.<br>\r\nWe will reply to you as soon as possible.<br>', 'If you wish to contact us you may kindly fill in the following form with your message.  We will be happy to assist you with your inquires.<br />\r\nWe take your privacy seriously and will only use your personal information to assist you and/or provide you the services/products you have requested from us. View our <a href=\"/privacy-policy/\">privacy policy</a> for details. However, from time to time we would like to contact you with details of other offers / services / competitions we provide.<br />\r\n ', '', 'Contact Form', 'e-mail', 'Fullname', 'Telephone', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'I consent the use of the information I hereby provide to you, according to your privacy policy which I have read and understood.', 'Message', 'Security Code', '', 'Send', '', '(*required fields)', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 44, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:41', '2021-03-29,10:42', NULL, 11),
(405, 199, NULL, 1, NULL, 'CONTACT US', NULL, '', NULL, NULL, 0, 0, 0, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', NULL, 0, 0, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '0000-00-00', '0000-00-00', 0, 0, 0, 37, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '2021-03-29,10:41', NULL, 11),
(403, 198, 'photo-gallery', 0, NULL, 'FAMILY SUITE', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'FAMILY SUITE', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 80, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 30, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:37', '2021-03-29,10:40', NULL, 11),
(404, 198, 'photo-gallery', 0, NULL, 'SEA SIDE RESTAURANT', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'SEA SIDE RESTAURANT', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '0.00', '0.00', 0, 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 0, 0, 1, 80, 1, 0, 0, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '', NULL, NULL, '000000000000', '000000000000', 0, 0, 23, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-03-29,10:37', '2021-03-29,10:37', NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `recs_att_tables`
--

DROP TABLE IF EXISTS `recs_att_tables`;
CREATE TABLE IF NOT EXISTS `recs_att_tables` (
  `Rat_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Rat_Rec_ID` int(7) DEFAULT NULL,
  `Rat_Page_ID` varchar(10) NOT NULL,
  `Rat_List_ID` int(3) DEFAULT NULL,
  `Rat_Lang` varchar(2) DEFAULT 'EN',
  `Rat_Page_Content` varchar(100) NOT NULL,
  `Rat_SubCat` varchar(30) NOT NULL DEFAULT '0',
  `Rat_Title` varchar(255) DEFAULT NULL,
  `Rat_Desc` text DEFAULT NULL,
  `Rat_Order` int(4) DEFAULT NULL,
  `Rat_TextArea1` text DEFAULT NULL,
  `Rat_TextArea2` text DEFAULT NULL,
  `Rat_TextArea3` text DEFAULT NULL,
  `Rat_TextArea4` text DEFAULT NULL,
  `Rat_Field1` varchar(255) DEFAULT NULL,
  `Rat_Field2` varchar(255) DEFAULT NULL,
  `Rat_Field3` varchar(255) DEFAULT NULL,
  `Rat_Field4` varchar(255) DEFAULT NULL,
  `Rat_Field5` varchar(255) DEFAULT NULL,
  `Rat_Field6` varchar(255) DEFAULT NULL,
  `Rat_Field7` varchar(255) DEFAULT NULL,
  `Rat_Field8` varchar(255) DEFAULT NULL,
  `Rat_Field9` varchar(255) DEFAULT NULL,
  `Rat_Field10` varchar(255) DEFAULT NULL,
  `Rat_Field11` varchar(255) DEFAULT NULL,
  `Rat_Field12` varchar(255) DEFAULT NULL,
  `Rat_Field13` varchar(255) DEFAULT NULL,
  `Rat_Field14` varchar(255) DEFAULT NULL,
  `Rat_Field15` varchar(255) DEFAULT NULL,
  `Rat_Field16` varchar(255) DEFAULT NULL,
  `Rat_Field17` varchar(255) DEFAULT NULL,
  `Rat_Field18` varchar(255) DEFAULT NULL,
  `Rat_Field19` varchar(255) DEFAULT NULL,
  `Rat_Field20` varchar(255) DEFAULT NULL,
  `Rat_Field21` varchar(255) DEFAULT NULL,
  `Rat_Field22` varchar(255) DEFAULT NULL,
  `Rat_Field23` varchar(255) DEFAULT NULL,
  `Rat_Field24` varchar(255) DEFAULT NULL,
  `Rat_Field25` varchar(255) DEFAULT NULL,
  `Rat_Field26` varchar(255) DEFAULT NULL,
  `Rat_Field27` varchar(255) DEFAULT NULL,
  `Rat_Field28` varchar(255) DEFAULT NULL,
  `Rat_Field29` varchar(255) DEFAULT NULL,
  `Rat_Field30` varchar(255) DEFAULT NULL,
  `Rat_Price` decimal(10,2) DEFAULT NULL,
  `Rat_Discount` int(5) NOT NULL DEFAULT 0,
  `Rat_Weight` int(6) NOT NULL DEFAULT 0,
  `Rat_Stock` bigint(6) DEFAULT NULL,
  `Rat_Availability` varchar(35) DEFAULT NULL,
  `Rat_Check1` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check2` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check3` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check4` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check5` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check6` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check7` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check8` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check9` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check10` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check11` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check12` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check13` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check14` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check15` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check16` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check17` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check18` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check19` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check20` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check21` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check22` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check23` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check24` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check25` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check26` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check27` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check28` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check29` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check30` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check31` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check32` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check33` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check34` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check35` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check36` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check37` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check38` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check39` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check40` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check41` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check42` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check43` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check44` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check45` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check46` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check47` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check48` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check49` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Check50` int(1) UNSIGNED ZEROFILL DEFAULT 0,
  `Rat_Scroll1` varchar(60) DEFAULT '0',
  `Rat_Scroll2` varchar(60) DEFAULT '0',
  `Rat_Scroll3` varchar(60) DEFAULT '0',
  `Rat_Scroll4` varchar(60) DEFAULT '0',
  `Rat_Scroll5` varchar(60) DEFAULT '0',
  `Rat_Text1` varchar(20) DEFAULT NULL,
  `Rat_Text2` varchar(20) DEFAULT NULL,
  `Rat_View` int(4) DEFAULT NULL,
  `Rat_Image1` varchar(15) DEFAULT NULL,
  `Rat_File1` varchar(150) DEFAULT NULL,
  `Rat_File2` varchar(150) DEFAULT NULL,
  `Rat_Image_Resize1` varchar(52) DEFAULT NULL,
  `Rat_Image_Resize2` varchar(52) DEFAULT NULL,
  `Rat_Image_Resize3` varchar(52) DEFAULT NULL,
  `Rat_Image_Resize4` varchar(52) DEFAULT NULL,
  `Rat_Image_Resize5` varchar(52) DEFAULT NULL,
  `Rat_Image_Resize6` varchar(52) DEFAULT NULL,
  `Modify_Date` varchar(30) DEFAULT NULL,
  `Rat_DateStart` date DEFAULT NULL,
  `Rat_DateStop` date DEFAULT NULL,
  `Rat_Img_Cat_ID` int(7) DEFAULT 0,
  `Docs_Group_ID` int(7) DEFAULT NULL,
  PRIMARY KEY (`Rat_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 8192 kB; InnoDB free: 8192 kB; InnoDB free: 819';

--
-- Dumping data for table `recs_att_tables`
--

INSERT INTO `recs_att_tables` (`Rat_ID`, `Rat_Rec_ID`, `Rat_Page_ID`, `Rat_List_ID`, `Rat_Lang`, `Rat_Page_Content`, `Rat_SubCat`, `Rat_Title`, `Rat_Desc`, `Rat_Order`, `Rat_TextArea1`, `Rat_TextArea2`, `Rat_TextArea3`, `Rat_TextArea4`, `Rat_Field1`, `Rat_Field2`, `Rat_Field3`, `Rat_Field4`, `Rat_Field5`, `Rat_Field6`, `Rat_Field7`, `Rat_Field8`, `Rat_Field9`, `Rat_Field10`, `Rat_Field11`, `Rat_Field12`, `Rat_Field13`, `Rat_Field14`, `Rat_Field15`, `Rat_Field16`, `Rat_Field17`, `Rat_Field18`, `Rat_Field19`, `Rat_Field20`, `Rat_Field21`, `Rat_Field22`, `Rat_Field23`, `Rat_Field24`, `Rat_Field25`, `Rat_Field26`, `Rat_Field27`, `Rat_Field28`, `Rat_Field29`, `Rat_Field30`, `Rat_Price`, `Rat_Discount`, `Rat_Weight`, `Rat_Stock`, `Rat_Availability`, `Rat_Check1`, `Rat_Check2`, `Rat_Check3`, `Rat_Check4`, `Rat_Check5`, `Rat_Check6`, `Rat_Check7`, `Rat_Check8`, `Rat_Check9`, `Rat_Check10`, `Rat_Check11`, `Rat_Check12`, `Rat_Check13`, `Rat_Check14`, `Rat_Check15`, `Rat_Check16`, `Rat_Check17`, `Rat_Check18`, `Rat_Check19`, `Rat_Check20`, `Rat_Check21`, `Rat_Check22`, `Rat_Check23`, `Rat_Check24`, `Rat_Check25`, `Rat_Check26`, `Rat_Check27`, `Rat_Check28`, `Rat_Check29`, `Rat_Check30`, `Rat_Check31`, `Rat_Check32`, `Rat_Check33`, `Rat_Check34`, `Rat_Check35`, `Rat_Check36`, `Rat_Check37`, `Rat_Check38`, `Rat_Check39`, `Rat_Check40`, `Rat_Check41`, `Rat_Check42`, `Rat_Check43`, `Rat_Check44`, `Rat_Check45`, `Rat_Check46`, `Rat_Check47`, `Rat_Check48`, `Rat_Check49`, `Rat_Check50`, `Rat_Scroll1`, `Rat_Scroll2`, `Rat_Scroll3`, `Rat_Scroll4`, `Rat_Scroll5`, `Rat_Text1`, `Rat_Text2`, `Rat_View`, `Rat_Image1`, `Rat_File1`, `Rat_File2`, `Rat_Image_Resize1`, `Rat_Image_Resize2`, `Rat_Image_Resize3`, `Rat_Image_Resize4`, `Rat_Image_Resize5`, `Rat_Image_Resize6`, `Modify_Date`, `Rat_DateStart`, `Rat_DateStop`, `Rat_Img_Cat_ID`, `Docs_Group_ID`) VALUES
(20, 375, '', 14, 'EN', '0', 'List_Rat1', '1', '', 9999, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '2021/03/20_rat2', 1, NULL, NULL, NULL, '2021/03/20_R6281.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL),
(21, 376, '', 14, 'EN', '0', 'List_Rat1', '1', '', 9999, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '2021/03/21_rat2', 1, NULL, NULL, NULL, '2021/03/21_R5336.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL),
(22, 377, '', 14, 'EN', '0', 'List_Rat1', '1', '', 9999, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '2021/03/22_rat2', 1, NULL, NULL, NULL, '2021/03/22_R3628.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', '0000-00-00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rec_templates`
--

DROP TABLE IF EXISTS `rec_templates`;
CREATE TABLE IF NOT EXISTS `rec_templates` (
  `RTemp_ID` int(4) NOT NULL AUTO_INCREMENT,
  `RTemp_Category` varchar(20) NOT NULL DEFAULT 'Default',
  `RTemp_Name` varchar(50) DEFAULT NULL,
  `RTemp_ListID` int(5) NOT NULL,
  `RTemp_Fields` int(1) NOT NULL DEFAULT 3,
  PRIMARY KEY (`RTemp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rec_templates`
--

INSERT INTO `rec_templates` (`RTemp_ID`, `RTemp_Category`, `RTemp_Name`, `RTemp_ListID`, `RTemp_Fields`) VALUES
(1, 'Default', 'Default', 3, 3),
(26, 'Default', 'Home Page', 1, 3),
(44, 'Default', 'Contact Form', 15, 3),
(63, 'Default', 'Error Page', 2, 3),
(64, 'Default', 'Location', 3, 3),
(68, 'Default', 'Home Page Mobile', 1, 3),
(76, '', 'Blog Photojournalism', 36, 3),
(77, '', 'Accommodation', 37, 5),
(80, '', 'Gallery', 3, 3),
(81, '', 'Blog Photojournalism Mob', 36, 3),
(82, 'Default', 'All Records', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rec_templates_rows`
--

DROP TABLE IF EXISTS `rec_templates_rows`;
CREATE TABLE IF NOT EXISTS `rec_templates_rows` (
  `RTR_ID` int(6) NOT NULL AUTO_INCREMENT,
  `RTR_Temp_ID` int(4) NOT NULL,
  `RTR_Rows` int(2) NOT NULL,
  `RTR_Cols` int(1) NOT NULL,
  `RTR_Cell` int(1) NOT NULL,
  `RTR_NumFields` int(1) NOT NULL,
  `RTR_Field` varchar(20) NOT NULL,
  `RTR_Module` varchar(4) NOT NULL,
  `RTR_Style_ID` int(4) NOT NULL,
  `RTR_PaddBottom` varchar(7) NOT NULL DEFAULT '0',
  `RTR_Css` text DEFAULT NULL,
  `RTR_ClassID` varchar(255) DEFAULT NULL,
  `RTR_Link_ID` int(4) DEFAULT NULL,
  `RTR_Href` varchar(255) DEFAULT NULL,
  `RTR_Href_Target` varchar(10) NOT NULL DEFAULT '_self',
  `RTR_Cell_ClassID` varchar(255) DEFAULT NULL,
  `RTR_Cell_Style_ID` int(4) DEFAULT NULL,
  `RTR_Cell_ClassItemID` varchar(255) DEFAULT NULL,
  `RTR_Cell_Css` text DEFAULT NULL,
  `RTR_Row_Style_ID` int(4) NOT NULL,
  `RTR_Inside_Row_Style_ID` int(4) DEFAULT NULL,
  `RTR_Row_SepDiv` varchar(7) DEFAULT NULL,
  `RTR_Row_PaddBottom` varchar(7) DEFAULT NULL,
  `RTR_Row_ClassID` varchar(255) DEFAULT NULL,
  `RTR_Row_ClassID_Bottom` varchar(255) DEFAULT NULL,
  `RTR_Row_Css` text DEFAULT NULL,
  `RTR_Row_Active` int(1) DEFAULT 1,
  `RTR_Temp_Style_ID` int(4) DEFAULT NULL,
  `RTR_Temp_Style2_ID` int(4) DEFAULT NULL,
  `RTR_Temp_PaddBottom` varchar(5) DEFAULT NULL,
  `RTR_Temp_Css` text DEFAULT NULL,
  `RTR_Temp_Href` varchar(255) DEFAULT NULL,
  `RTR_Temp_Href_Target` varchar(10) NOT NULL DEFAULT '_self',
  `RTR_Temp_Link_ID` int(4) DEFAULT NULL,
  `RTR_Temp_Html_Top` text DEFAULT NULL,
  `RTR_Temp_Html_Bottom` text DEFAULT NULL,
  `RTR_Preview` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`RTR_ID`),
  KEY `RTR_ID` (`RTR_ID`),
  KEY `RTR_Temp_ID` (`RTR_Temp_ID`),
  KEY `RTR_Rows` (`RTR_Rows`),
  KEY `RTR_Cols` (`RTR_Cols`),
  KEY `RTR_Cell` (`RTR_Cell`)
) ENGINE=MyISAM AUTO_INCREMENT=625 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rec_templates_rows`
--

INSERT INTO `rec_templates_rows` (`RTR_ID`, `RTR_Temp_ID`, `RTR_Rows`, `RTR_Cols`, `RTR_Cell`, `RTR_NumFields`, `RTR_Field`, `RTR_Module`, `RTR_Style_ID`, `RTR_PaddBottom`, `RTR_Css`, `RTR_ClassID`, `RTR_Link_ID`, `RTR_Href`, `RTR_Href_Target`, `RTR_Cell_ClassID`, `RTR_Cell_Style_ID`, `RTR_Cell_ClassItemID`, `RTR_Cell_Css`, `RTR_Row_Style_ID`, `RTR_Inside_Row_Style_ID`, `RTR_Row_SepDiv`, `RTR_Row_PaddBottom`, `RTR_Row_ClassID`, `RTR_Row_ClassID_Bottom`, `RTR_Row_Css`, `RTR_Row_Active`, `RTR_Temp_Style_ID`, `RTR_Temp_Style2_ID`, `RTR_Temp_PaddBottom`, `RTR_Temp_Css`, `RTR_Temp_Href`, `RTR_Temp_Href_Target`, `RTR_Temp_Link_ID`, `RTR_Temp_Html_Top`, `RTR_Temp_Html_Bottom`, `RTR_Preview`) VALUES
(320, 36, 1, 1, 1, 2, 'List_Editor1', '0', 0, '10', '', NULL, NULL, NULL, '_self', NULL, 28, NULL, NULL, 8, NULL, '', '', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(321, 36, 1, 1, 1, 3, '', '0', 0, '20', '', NULL, NULL, NULL, '_self', NULL, 28, NULL, NULL, 8, NULL, '', '', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(319, 36, 1, 1, 1, 1, 'List_Title', '0', 24, '10', '', NULL, NULL, NULL, '_self', NULL, 28, NULL, NULL, 8, NULL, '', '', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(549, 44, 1, 2, 2, 1, '', '210', 0, '100', '', '', 0, '', '', '', 476, '206', '', 0, 225, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(547, 44, 1, 2, 1, 2, '', '262', 0, '0', '', '', 0, '', '', '', 479, '', '', 0, 225, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(548, 44, 1, 2, 1, 3, '', '', 0, '0', '', '', 0, '', '', '', 479, '', '', 0, 225, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(546, 44, 1, 2, 1, 1, 'List_TextArea3', '', 256, '20', '', '', 0, '', '', '', 479, '', '', 0, 225, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(446, 62, 1, 1, 1, 3, '', '0', 0, '0', '', NULL, NULL, NULL, '_self', NULL, 0, NULL, NULL, 0, NULL, '', '', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(445, 62, 1, 1, 1, 2, 'List_Editor1', '0', 0, '0', '', NULL, NULL, NULL, '_self', NULL, 0, NULL, NULL, 0, NULL, '', '', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(444, 62, 1, 1, 1, 1, 'List_Title', '0', 3, '10', '', NULL, NULL, NULL, '_self', NULL, 0, NULL, NULL, 0, NULL, '', '', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(491, 26, 1, 1, 1, 3, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '0', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(490, 26, 1, 1, 1, 2, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '0', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(489, 26, 1, 1, 1, 1, '', 'R11', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '0', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(450, 63, 1, 1, 1, 3, '', '', 0, '0', '', '', 0, '', '', '', 206, '', '', 264, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(451, 63, 1, 1, 1, 1, 'List_Title', '', 3, '20', '', '', 0, '', '', '', 206, '', '', 264, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(452, 63, 1, 1, 1, 2, 'List_Editor1', '', 0, '0', '', '', 0, '', '', '', 206, '', '', 264, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(515, 64, 1, 1, 1, 3, '', '', 0, '0', '', '', 0, '', '', '', 225, '', '', 0, 0, '', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(514, 64, 1, 1, 1, 2, '', '245', 264, '0', '', '', 0, '', '', '', 225, '', '', 0, 0, '', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(513, 64, 1, 1, 1, 1, 'List_Editor1', '', 0, '50', '', '', 0, '', '', '', 225, '', '', 0, 0, '', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(556, 76, 1, 2, 2, 1, 'List_Title', '', 5, '20', '', 'class=\"headerTitle\"', 0, '', '', '', 171, '', '', 225, 228, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 264, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(555, 76, 1, 2, 2, 2, '', '263', 0, '0', '', '', 0, '', '', '', 171, '', '', 225, 228, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 264, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(554, 76, 1, 2, 1, 3, '', '', 0, '0', '', '', 0, '', '', '', 161, '', '', 225, 228, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 264, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(497, 1, 1, 1, 1, 3, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 225, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(495, 1, 1, 1, 1, 2, '', '222', 0, '0', '', '', 0, '', '', '', 0, '', '', 225, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(496, 1, 1, 1, 1, 1, 'List_Editor1', '', 0, '50', '', '', 0, '', '', '', 0, '', '', 225, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(543, 68, 1, 1, 1, 3, '', '', 0, '0', '', '', NULL, NULL, '_self', '', 0, NULL, NULL, 0, 0, '', '', '', NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(542, 68, 1, 1, 1, 2, '', '', 0, '0', '', '', NULL, NULL, '_self', '', 0, NULL, NULL, 0, 0, '', '', '', NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(541, 68, 1, 1, 1, 1, '', 'R12', 0, '0', '', '', NULL, NULL, '_self', '', 0, NULL, NULL, 0, 0, '', '', '', NULL, '', 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(553, 76, 1, 2, 1, 2, '', '', 0, '0', '', '', 0, '', '', '', 161, '', '', 225, 228, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 264, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(552, 76, 1, 2, 1, 1, '', '236', 0, '0', '', '', 0, '', '', '', 161, '', '', 225, 228, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 264, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(550, 44, 1, 2, 2, 2, '', '213', 258, '0', '', '', 0, '', '', '', 476, '206', '', 0, 225, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(551, 44, 1, 2, 2, 3, '', '', 0, '0', '', '', 0, '', '', '', 476, '206', '', 0, 225, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(557, 76, 1, 2, 2, 3, '', '', 0, '0', '', '', 0, '', '', '', 171, '', '', 225, 228, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 264, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(558, 77, 1, 2, 1, 1, '', 'T15', 0, '40', '', '', 0, '', '', '', 579, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(559, 77, 1, 2, 1, 2, 'List_Desc', '', 593, '40', '', 'class=\"accTextMargin\"', 0, '', '', '', 579, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(560, 77, 1, 2, 1, 3, '', '275', 0, '10%', '', 'class=\"accTextMargin\"', 0, '', '', '', 579, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(561, 77, 1, 2, 1, 4, 'List_Editor1', '', 0, '30', '', 'class=\"accTextMargin\"', 0, '', '', '', 579, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(596, 80, 1, 1, 1, 1, '', 'T3', 0, '20', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(597, 80, 1, 1, 1, 2, '', '222', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(598, 80, 1, 1, 1, 3, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(599, 81, 1, 2, 1, 1, 'List_Title', '', 5, '0', '', 'class=\"headerTitle\"', 0, '', '', '', 0, '', '', 225, 0, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 219, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(600, 81, 1, 2, 1, 2, '', '263', 0, '0', '', '', 0, '', '', '', 0, '', '', 225, 0, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 219, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(601, 81, 1, 2, 2, 3, '', '', 0, '0', '', '', 0, '', '', '', 264, '', '', 225, 0, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 219, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(602, 81, 1, 2, 2, 2, '', '', 0, '0', '', '', 0, '', '', '', 264, '', '', 225, 0, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 219, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(603, 81, 1, 2, 2, 1, '', '236', 0, '0', '', '', 0, '', '', '', 264, '', '', 225, 0, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 219, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(604, 81, 1, 2, 1, 3, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 225, 0, '5%', '80', '', '', 'display:block; width:100%; margin:auto;', 1, 219, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(605, 77, 1, 2, 2, 1, '', 'T13', 0, '0', '', '', 0, '', '', '', 580, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(606, 77, 1, 2, 2, 2, '', '', 0, '0', '', '', 0, '', '', '', 580, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(607, 77, 1, 2, 2, 3, '', '', 0, '0', '', '', 0, '', '', '', 580, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(608, 77, 1, 2, 2, 4, '', '', 0, '0', '', '', 0, '', '', '', 580, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(609, 77, 2, 1, 1, 2, 'List_Editor2', '', 576, '50', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(610, 77, 2, 1, 1, 3, '', '276', 511, '50', '', 'class=\"accGalleryCont\"', 0, '', '', '', 0, '', '', 0, 0, '', '', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(611, 77, 2, 1, 1, 1, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(612, 77, 2, 1, 1, 4, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(613, 77, 3, 1, 1, 1, '', '277', 592, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(614, 77, 3, 1, 1, 2, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(615, 77, 3, 1, 1, 3, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(616, 77, 3, 1, 1, 4, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(617, 82, 1, 1, 1, 3, '', '222', 0, '0', '', '', 0, '', '', '', 0, '', '', 225, 0, '', '30', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(618, 82, 1, 1, 1, 2, 'List_Editor1', '', 0, '50', '', '', 0, '', '', '', 0, '', '', 225, 0, '', '30', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(619, 82, 1, 1, 1, 1, 'List_Title', '', 3, '35', '', '', 0, '', '', '', 0, '', '', 225, 0, '', '30', '', '', 'display:block; width:100%; margin:auto;', 1, 0, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(620, 82, 1, 1, 1, 4, '', '', 0, '0', NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '_self', NULL, NULL, NULL, 0),
(621, 77, 1, 2, 1, 5, '', '234', 691, '0', '', '', 0, '', '', '', 579, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(622, 77, 1, 2, 2, 5, '', '', 0, '0', '', '', 0, '', '', '', 580, '', '', 0, 257, '', '40', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(623, 77, 2, 1, 1, 5, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0),
(624, 77, 3, 1, 1, 5, '', '', 0, '0', '', '', 0, '', '', '', 0, '', '', 0, 0, '', '50', '', '', 'display:block; width:100%; margin:auto;', 1, 386, 0, '', '', 'vID/vRec/', '_self', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `related_categories`
--

DROP TABLE IF EXISTS `related_categories`;
CREATE TABLE IF NOT EXISTS `related_categories` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Page_ID` int(10) NOT NULL,
  `Related_Page_ID` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `related_pages`
--

DROP TABLE IF EXISTS `related_pages`;
CREATE TABLE IF NOT EXISTS `related_pages` (
  `ID` bigint(10) NOT NULL AUTO_INCREMENT,
  `Related_Rec_ID` varchar(10) NOT NULL,
  `Related_Page_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `related_records`
--

DROP TABLE IF EXISTS `related_records`;
CREATE TABLE IF NOT EXISTS `related_records` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Rec_Table` int(1) NOT NULL DEFAULT 1,
  `Rec_ID` int(10) NOT NULL,
  `Related_Rec_ID` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `searchtext`
--

DROP TABLE IF EXISTS `searchtext`;
CREATE TABLE IF NOT EXISTS `searchtext` (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `SRec_ID` int(8) DEFAULT NULL,
  `SPage_ID` int(8) DEFAULT NULL,
  `SPage_Lang` varchar(2) NOT NULL,
  `STitle` varchar(255) DEFAULT NULL,
  `SDesc` text DEFAULT NULL,
  `SText1` text DEFAULT NULL,
  `SText2` text DEFAULT NULL,
  `STextAttTable` text DEFAULT NULL,
  `SDate` varchar(8) DEFAULT NULL,
  `SActive` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`SID`)
) ENGINE=MyISAM AUTO_INCREMENT=213 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `searchtext`
--

INSERT INTO `searchtext` (`SID`, `SRec_ID`, `SPage_ID`, `SPage_Lang`, `STitle`, `SDesc`, `SText1`, `SText2`, `STextAttTable`, `SDate`, `SActive`) VALUES
(101, 56, 66, 'en', 'Facebook', '', ' FACEBOOK    ', NULL, NULL, NULL, 0),
(102, 280, 66, 'en', 'Pinterest', '', ' PINTEREST    ', NULL, NULL, NULL, 0),
(103, 281, 66, 'en', 'Youtube', '', ' YOUTUBE    ', NULL, NULL, NULL, 0),
(104, 282, 66, 'en', 'Twitter', '', ' TWITTER    ', NULL, NULL, NULL, 0),
(160, 353, 178, 'en', 'Global', '', ' Global     ', NULL, NULL, NULL, 0),
(106, 284, 66, 'en', 'Instagram', '', ' INSTAGRAM    ', NULL, NULL, NULL, 0),
(113, 304, 161, 'en', 'Optimized', '', ' OPTIMIZED    ', NULL, NULL, NULL, 0),
(114, 305, 162, 'en', 'Global', '', ' GLOBAL    ', NULL, NULL, NULL, 0),
(115, 307, 1, 'en', 'Home Page', '', ' HOME PAGE    ', NULL, NULL, NULL, 0),
(116, 286, 1, 'en', 'Home Page', '', ' Home Page     ', NULL, NULL, NULL, 0),
(161, 354, 149, 'en', 'Welcome', '', ' Welcome    Aliquam aptent Molestie gravida eleifend Bibendum sociosqu amet cubilia curae phasellus libero Amet sapien aenean Semper pellentesque primis Fringilla eget tortor consectetur tristique urna turpis ornare maecenas blandit semper purus dapibus mattis ipsum  hendrerit vitae finibus posuere nisi dolor bibendum Vestibulum diam orci finibus eleifend Accumsan ultricies feugiat suscipit integer   ', NULL, NULL, NULL, 0),
(162, 355, 179, 'en', 'GREAT STAFF AND EXCELLENT FOOD', '', ' GREAT STAFF AND EXCELLENT FOOD    staff with smile anytimefrom reception cleaning bars beach restaurant Please buffet dinner  ', NULL, NULL, NULL, 0),
(163, 356, 179, 'en', 'APTENT. IPSUM PURUS VITAE NISI', '', ' APTENT. IPSUM PURUS VITAE NISI    Lobortis hendrerit eleifend dictum pretium urna inceptos class libero bibendum metus luctus eros aenean>Tripa  ', NULL, NULL, NULL, 0),
(164, 357, 149, 'en', 'Accommodation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida dictum magna vel iaculissapien dictum, aliquet odio. Sed id purus accumsan massa vehicula laciniaelementum.', ' Accommodation Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida dictum magna vel iaculissapien dictum, aliquet odio. Sed id purus accumsan massa vehicula laciniaelementum.    ', NULL, NULL, NULL, 0),
(165, 358, 181, 'en', 'SUPERIOR DOUBLE ROOM', 'WITH INDOOR HEATED JACUZZI & SEA VIEW', ' SUPERIOR DOUBLE ROOM WITH INDOOR HEATED JACUZZI & SEA VIEW   scelerisque augue sociosqu Ornare primis torquent orci elementum justo eget justo placerat cursus laoreet posuere lorem ipsum dolor amet sapien blandit placerat faucibus metus mattis malesuada lectus ornare pharetra aptent tortor nibh blandit nunc quisque pellentesque ornare tincidunt cursus justo feugiat praesent nisl Ligula  ', NULL, NULL, NULL, 0),
(166, 361, 184, 'en', 'FAMILY ROOM', 'WITH INDOOR HEATED JACUZZI & SEA VIEW', ' FAMILY ROOM WITH INDOOR HEATED JACUZZI & SEA VIEW   scelerisque augue sociosqu Ornare primis torquent orci elementum justo eget justo placerat cursus laoreet posuere lorem ipsum dolor amet sapien blandit placerat faucibus metus mattis malesuada lectus ornare pharetra aptent tortor nibh blandit nunc quisque pellentesque ornare tincidunt cursus justo feugiat praesent nisl Ligula  ', NULL, NULL, NULL, 0),
(167, 360, 183, 'en', 'EXCLUSIVE SUITE', 'WITH INDOOR HEATED JACUZZI & SEA VIEW', ' EXCLUSIVE SUITE WITH INDOOR HEATED JACUZZI & SEA VIEW   scelerisque augue sociosqu Ornare primis torquent orci elementum justo eget justo placerat cursus laoreet posuere lorem ipsum dolor amet sapien blandit placerat faucibus metus mattis malesuada lectus ornare pharetra aptent tortor nibh blandit nunc quisque pellentesque ornare tincidunt cursus justo feugiat praesent nisl Ligula  ', NULL, NULL, NULL, 0),
(168, 359, 182, 'en', 'PREMIUM SUITE', 'WITH INDOOR HEATED JACUZZI & SEA VIEW', ' PREMIUM SUITE WITH INDOOR HEATED JACUZZI & SEA VIEW   scelerisque augue sociosqu Ornare primis torquent orci elementum justo eget justo placerat cursus laoreet posuere lorem ipsum dolor amet sapien blandit placerat faucibus metus mattis malesuada lectus ornare pharetra aptent tortor nibh blandit nunc quisque pellentesque ornare tincidunt cursus justo feugiat praesent nisl Ligula  ', NULL, NULL, NULL, 0),
(169, 362, 149, 'en', 'Beach', 'Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci.', ' Beach Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci.    ', NULL, NULL, NULL, 0),
(170, 363, 186, 'en', 'Sea Side Restaurant', 'Mauris venenatis, mauris at con[gue pretium, libero nisl placerat justo, vel viverra dui lacus quis elit. Vivamus malesuada gravida nibh, sed consectetur dolor posuere non. Cras tincidunt felis eget diam scelerisque sodales.', ' Sea Side Restaurant Mauris venenatis, mauris at con[gue pretium, libero nisl placerat justo, vel viverra dui lacus quis elit. Vivamus malesuada gravida nibh, sed consectetur dolor posuere non. Cras tincidunt felis eget diam scelerisque sodales.   amet vitae pretium integer Nostra Aliquam tortor nulla semper tortor elementum Torquent urna elementum Blandit curae litora Luctus amet aptent Elit fusce orci lobortis dapibus primis donec maecenas bibendum neque venenatis vestibulum  ultrices nisl dapibus nibh lorem vivamus eros finibus mollis feugiat sollicitudin ante pharetra posuere dolor bibendum Ipsum mauris nibh lectus inceptos quisque interdum Dolor lacinia purus pretium nibh curabitur blanditPhasellus semper nisi faucibus velit litora Rutrum semper purus semper ornare vitae eget vestibulum velit eget Augue amet nunc lectus turpis nunc eros phasellus morbi adipiscing ante elit lorem eget accumsan pellentesque vulputate maximus Orci vitae quam sapien ipsum faucibus orci dolor donec tincidunt conubia nibh laoreet eget litora Nulla nunc orci orci justo nulla vitae sociosqu diam eget nunc nisi nisi nulla vestibulum ornare rhoncus donec rhoncus elementum ipsum dictum elementum curabitur ultricies vulputate  ', NULL, NULL, NULL, 0),
(171, 364, 149, 'en', 'Gastronomy', '', ' Gastronomy     ', NULL, NULL, NULL, 0),
(172, 365, 187, 'en', 'Blue Restaurant', 'Mauris venenatis, mauris at con[gue pretium, libero nisl placerat justo, vel viverra dui lacus quis elit. Vivamus malesuada gravida nibh, sed consectetur dolor posuere non. Cras tincidunt felis eget diam scelerisque sodales.', ' Blue Restaurant Mauris venenatis, mauris at con[gue pretium, libero nisl placerat justo, vel viverra dui lacus quis elit. Vivamus malesuada gravida nibh, sed consectetur dolor posuere non. Cras tincidunt felis eget diam scelerisque sodales.   amet vitae pretium integer Nostra Aliquam tortor nulla semper tortor elementum Torquent urna elementum Blandit curae litora Luctus amet aptent Elit fusce orci lobortis dapibus primis donec maecenas bibendum neque venenatis vestibulum  ultrices nisl dapibus nibh lorem vivamus eros finibus mollis feugiat sollicitudin ante pharetra posuere dolor bibendum Ipsum mauris nibh lectus inceptos quisque interdum Dolor lacinia purus pretium nibh curabitur blanditPhasellus semper nisi faucibus velit litora Rutrum semper purus semper ornare vitae eget vestibulum velit eget Augue amet nunc lectus turpis nunc eros phasellus morbi adipiscing ante elit lorem eget accumsan pellentesque vulputate maximus Orci vitae quam sapien ipsum faucibus orci dolor donec tincidunt conubia nibh laoreet eget litora Nulla nunc orci orci justo nulla vitae sociosqu diam eget nunc nisi nisi nulla vestibulum ornare rhoncus donec rhoncus elementum ipsum dictum elementum curabitur ultricies vulputate  ', NULL, NULL, NULL, 0),
(173, 366, 186, 'en', 'SEA SIDE RESTAURANT', '', ' SEA SIDE RESTAURANT    ', NULL, NULL, NULL, 0),
(174, 367, 187, 'en', 'BLUE RESTAURANT', '', ' BLUE RESTAURANT    ', NULL, NULL, NULL, 0),
(175, 368, 179, 'en', 'PRAESENT VELIT NOSTRA LUCTUS EU PRIMIS.', '', ' PRAESENT VELIT NOSTRA LUCTUS EU PRIMIS.    Lobortis hendrerit eleifend dictum pretium urna inceptos class libero bibendum metus luctus eros aenean>Tripa  ', NULL, NULL, NULL, 0),
(176, 369, 149, 'en', 'Pool Area', 'Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci.', ' Pool Area Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci.    ', NULL, NULL, NULL, 0),
(177, 370, 149, 'en', 'Experiences', '', ' Experiences     ', NULL, NULL, NULL, 0),
(178, 371, 149, 'en', 'Gardens', 'Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci .', ' Gardens Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci .    ', NULL, NULL, NULL, 0),
(179, 372, 189, 'en', 'Wellness & Spa', 'Mauris venenatis, mauris at congue pretium, libero nisl placerat justo, vel viverra dui lacus quis elit. Vivamus malesuada gravida nibh, sed consectetur dolor posuere non. Cras tincidunt felis eget diam scelerisque sodales.', ' Wellness & Spa Mauris venenatis, mauris at congue pretium, libero nisl placerat justo, vel viverra dui lacus quis elit. Vivamus malesuada gravida nibh, sed consectetur dolor posuere non. Cras tincidunt felis eget diam scelerisque sodales.   Lorem condimentum quisque consectetur euismod dapibus eleifend dolor mattis volutpat amet facilisis lacinia malesuada urna felis curabitur mauris orci diam hendrerit aenean Urna accumsan posuere orci orci sagittis bibendum Pellentesque pellentesque varius pretium erat vivamus scelerisque fermentum ultrices ornare fermentum posuere maecenas erat quam phasellus ipsum taciti iaculis vulputate venenatis lectus donec elit amet viverra odio interdum Imperdiet vivamus primis maximus mauris rutrum facilisis amet nisl accumsan feugiat feugiat donec himenaeos semper  ', NULL, NULL, NULL, 0),
(180, 373, 190, 'en', 'TOURS', 'Curabitur non justo ut id ipsum in adipiscing porttitor volutpat in mauris nec orci dui bibendum. Non quis molestie vel ipsum sed posuere faucibus volutpat elementum ornare', ' TOURS Curabitur non justo ut id ipsum in adipiscing porttitor volutpat in mauris nec orci dui bibendum. Non quis molestie vel ipsum sed posuere faucibus volutpat elementum ornare   Maecenas vitae neque dolor mollis dolor semper volutpat eget semper feugiat feugiat dapibus blandit elit nulla phasellus eleifend augue sollicitudin nunc aliquam purus dolor justo curabitur donec orci cursus maecenas amet mattis cursus feugiat ultrices vestibulum Facilisi turpis amet dapibus amet imperdiet pretium sociosqu donec erat cursus posuere faucibus porttitor mollis feugiat velit luctus nunc  ', NULL, NULL, NULL, 0),
(181, 374, 149, 'en', 'Instagram', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', ' Instagram Lorem ipsum dolor sit amet, consectetur adipiscing elit.    ', NULL, NULL, NULL, 0),
(182, 375, 191, 'en', 'CASTLES IN RHODES', '2000 YEARS OLD EXPERIENCE', ' CASTLES IN RHODES 2000 YEARS OLD EXPERIENCE    ', NULL, NULL, NULL, 0),
(183, 376, 191, 'en', 'LINDOS BEACHES & ACROPOLIS', '4,000-YEAR-OLD ACROPOLIS OF LINDOS', ' LINDOS BEACHES & ACROPOLIS 4,000-YEAR-OLD ACROPOLIS OF LINDOS    ', NULL, NULL, NULL, 0),
(184, 377, 191, 'en', 'THE BEACHES', 'DE LA MASTRA MARKIES CONTE SENTRA MONTE', ' THE BEACHES DE LA MASTRA MARKIES CONTE SENTRA MONTE    ', NULL, NULL, NULL, 0),
(185, 378, 149, 'en', 'Explore', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida dictum magna vel iaculissapien dictum, aliquet odio. Sed id purus accumsan massa vehicula laciniaelementum.', ' Explore Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida dictum magna vel iaculissapien dictum, aliquet odio. Sed id purus accumsan massa vehicula laciniaelementum.    ', NULL, NULL, NULL, 0),
(186, 379, 149, 'en', 'Location', 'Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci .', ' Location Sed gravida dictum magna vel iaculissapien . Lorem ipsum dolor sit amet, consectetur adipiscing elit. dictum, aliquet odio ed id purus accumsan massa vehicula laci .    ', NULL, NULL, NULL, 0),
(187, 381, 192, 'en', 'THE HOTEL', '', ' THE HOTEL    Quam semper semper proin accumsan tincidunt tellus tellus augue sapien orci volutpat dictum praesent neque sociosqu Purus Aliquam conubia ligula Mattis semper litora Velit eleifend Semper amet rutrum vestibulum eros ante velit mattis mollis accumsan eget amet gravida lacinia aliquam justo auctor orci turpis lacinia eget vitae eleifend Conubia mauris conubia blandit ultrices bibendum Vitae congue tortor quisque facilisis vivamusTortor purus Etiam feugiat magna nulla dapibus ultrices vitae eleifend Placerat pretium fusce himenaeos amet adipiscing elit eleifend Lacinia donec nunc orci nunc nulla posuere dignissim ultricies facilisi augue maecenas porta tellus elementum erat mauris condimentum justo donec sollicitudin ultrices elit fermentum metus Vestibulum congue dapibus eleifend Cubilia taciti Dictum taciti Elit quis ultricies eleifend aliquam Vivamus mauris luctus nibh ipsu  ', NULL, NULL, NULL, 0),
(188, 382, 192, 'en', 'THE HOTEL', '', ' THE HOTEL    ', NULL, NULL, NULL, 0),
(189, 383, 197, 'en', 'Privacy Policy', '', ' Privacy Policy    Sapien nisi posuere nulla pellentesque quam dictum elementum proin eleifend Gravida posuere orci convallis Tincidunt nulla rutrum scelerisque lacinia class adipiscing purus Faucibus blandit gravida elit placerat ipsum semper accumsan dapibus amet dictum ornare lorem erat eleifend elementum semper dictum ipsum curae accumsan turpis bibendum Tincidunt eget quam posuere placerat dictum nibh sapien ultricies euismod adipiscing placerat aliquam laoreet molestie dolor augue curae tellus maecenas erat pellentesque elit nunc blandit vestibulum Bacon lobortis nunc  ', NULL, NULL, NULL, 0),
(190, 384, 181, 'en', 'SUPERIOR DOUBLE ROOM', '', ' SUPERIOR DOUBLE ROOM    ', NULL, NULL, NULL, 0),
(191, 385, 182, 'en', 'PREMIUM SUITE', '', ' PREMIUM SUITE    ', NULL, NULL, NULL, 0),
(192, 386, 183, 'en', 'EXCLUSIVE SUITE', '', ' EXCLUSIVE SUITE    ', NULL, NULL, NULL, 0),
(193, 387, 184, 'en', 'FAMILY ROOM', '', ' FAMILY ROOM    ', NULL, NULL, NULL, 0),
(194, 388, 193, 'en', 'THE BEACH', '', ' THE BEACH    ', NULL, NULL, NULL, 0),
(195, 389, 193, 'en', 'THE BEACH', '', ' THE BEACH    Nulla velit viverra diam taciti nunc elit vitae nostra  vestibulum mauris quis ultricies dapibus  euismod primis auctor bibendum vivamus elit eget molestie nunc dolor augue pellentesque elementum vitae lectus ultrices facilisi tellus lobortis quisque elit pretium ante elit himenaeos maecenas class conubia ipsum orci curae elementum Dolor ipsum nulla elit tellus lobortis eros nisi nequeEros duis cubilia imperdiet feugiat vestibulum augue vitae dapibus lobortis aliquam maecenas purus vestibulum convallis donec eleifend imperdiet tellus nibh dolor pellentesque pharetra tincidunt rutrum consectetur luctus dapibus neque ligula Hendrerit vitae pharetra augue nunc pretium diam laoreet neque lectus elementum Ipsum dapibus duis tellus Eleifend Erat vestibulum molestie inceptos hendrerit ornare fusce eleifend Aliquam tincidunt tortor cubilia conubia hendrerit elementum Tincidunt inceptos libe  ', NULL, NULL, NULL, 0),
(196, 390, 194, 'en', 'POOL AREA', '', ' POOL AREA    ', NULL, NULL, NULL, 0),
(197, 391, 194, 'en', 'THE BEACH', '', ' THE BEACH    Nulla velit viverra diam taciti nunc elit vitae nostra  vestibulum mauris quis ultricies dapibus  euismod primis auctor bibendum vivamus elit eget molestie nunc dolor augue pellentesque elementum vitae lectus ultrices facilisi tellus lobortis quisque elit pretium ante elit himenaeos maecenas class conubia ipsum orci curae elementum Dolor ipsum nulla elit tellus lobortis eros nisi nequeEros duis cubilia imperdiet feugiat vestibulum augue vitae dapibus lobortis aliquam maecenas purus vestibulum convallis donec eleifend imperdiet tellus nibh dolor pellentesque pharetra tincidunt rutrum consectetur luctus dapibus neque ligula Hendrerit vitae pharetra augue nunc pretium diam laoreet neque lectus elementum Ipsum dapibus duis tellus Eleifend Erat vestibulum molestie inceptos hendrerit ornare fusce eleifend Aliquam tincidunt tortor cubilia conubia hendrerit elementum Tincidunt inceptos libe  ', NULL, NULL, NULL, 0),
(198, 392, 189, 'en', 'WELLNESS AND SPA', '', ' WELLNESS AND SPA    ', NULL, NULL, NULL, 0),
(199, 393, 190, 'en', 'TOURS', '', ' TOURS    ', NULL, NULL, NULL, 0),
(200, 394, 195, 'en', 'THE GARDENS', '', ' THE GARDENS    ', NULL, NULL, NULL, 0),
(201, 395, 195, 'en', 'THE GARDENS', '', ' THE GARDENS    quis rutrum orci erat morbi torquent amet quisque eleifend curabitur cursus dolor accumsan aptent blandit molestie nisi nisl lobortis dolor pellentesque nunc augue turpis cubilia condimentum Dapibus donec nibh tortor varius feugiat donec aliquam Ultrices primis ipsum conubia himenaeos ornare cursus volutpat consectetur quisque rutrum accumsan convallis Vestibulum aliquam ultricies dolor bibendum Augue vulputate nisl amet faucibus vestibulum tellus augue odio posuere vivamus eros venenatis justo augue varius orci  ', NULL, NULL, NULL, 0),
(202, 396, 196, 'en', 'LOCATION', '', ' LOCATION    ultrices accumsan metus Tortor litora consectetur urna aenean nibh bibendum nunc tincidunt euismod Accumsan curae elit nibh  volutpat mattis class turpis semper nulla elit nunc orci quam ornare conubia maximus nisl pretium mattis ultrices elit facilisis dolor mattis donec nulla libero tellus posuere torquent primis neque semper facilisi vestibulum eros dapibus aptent elementum Cursus congue  ', NULL, NULL, NULL, 0),
(203, 397, 196, 'en', 'LOCATION', '', ' LOCATION    ', NULL, NULL, NULL, 0),
(204, 398, 198, 'en', 'THE HOTEL', '', ' THE HOTEL     ', NULL, NULL, NULL, 0),
(205, 399, 198, 'en', 'SUPERIOR DOUBLE ROOM', '', ' SUPERIOR DOUBLE ROOM     ', NULL, NULL, NULL, 0),
(206, 400, 198, 'en', 'PREMIUM SUITE', '', ' PREMIUM SUITE     ', NULL, NULL, NULL, 0),
(207, 401, 198, 'en', 'EXCLUSIVE SUITE', '', ' EXCLUSIVE SUITE     ', NULL, NULL, NULL, 0),
(211, 405, 199, 'en', 'CONTACT US', '', ' CONTACT US    ', NULL, NULL, NULL, 0),
(209, 403, 198, 'en', 'FAMILY SUITE', '', ' FAMILY SUITE     ', NULL, NULL, NULL, 0),
(210, 404, 198, 'en', 'SEA SIDE RESTAURANT', '', ' SEA SIDE RESTAURANT     ', NULL, NULL, NULL, 0),
(212, 406, 199, 'en', 'CONTACT', '', ' CONTACT     ', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `Section_ID` int(5) NOT NULL AUTO_INCREMENT,
  `Parent_Section_ID` int(5) NOT NULL DEFAULT 0,
  `Section_Title` varchar(50) NOT NULL DEFAULT '',
  `Section_Name` varchar(30) NOT NULL DEFAULT 'general',
  `Section_Order` int(2) NOT NULL DEFAULT 99,
  `Section_DB` int(1) NOT NULL DEFAULT 0,
  `Section_Thumb_SW` int(3) DEFAULT 0,
  `Section_Thumb_SH` int(3) NOT NULL DEFAULT 0,
  `Section_XML` int(1) NOT NULL DEFAULT 1,
  `Section_Active` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Section_ID`),
  KEY `Parent_Section_ID` (`Parent_Section_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`Section_ID`, `Parent_Section_ID`, `Section_Title`, `Section_Name`, `Section_Order`, `Section_DB`, `Section_Thumb_SW`, `Section_Thumb_SH`, `Section_XML`, `Section_Active`) VALUES
(1, 0, 'General', 'general', 99, 0, 0, 0, 1, 1),
(2, 0, 'Hidden', 'hidden', 99, 0, 0, 0, 0, 1),
(6, 0, 'Settings', 'settings', 99, 0, 0, 0, 0, 1),
(7, 0, 'Banners', 'banners', 99, 0, 0, 0, 0, 1),
(9, 0, 'Social Media', 'socialmedia', 99, 0, 0, 0, 0, 1),
(11, 0, 'Offers Popup', 'offerspopup', 99, 0, 0, 0, 0, 1),
(14, 0, 'Optimized', 'optimized', 99, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections_headers`
--

DROP TABLE IF EXISTS `sections_headers`;
CREATE TABLE IF NOT EXISTS `sections_headers` (
  `SecHead_ID` int(3) NOT NULL AUTO_INCREMENT,
  `Section_Name` varchar(20) NOT NULL DEFAULT 'general',
  `SecHead_Lang` varchar(2) NOT NULL DEFAULT 'EN',
  `SecHead_Title` varchar(255) DEFAULT NULL,
  `SecHead_Desc` text DEFAULT NULL,
  `SecHead_Image` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`SecHead_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
CREATE TABLE IF NOT EXISTS `statistics` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `session_ID` varchar(50) NOT NULL,
  `landing_page` varchar(50) DEFAULT NULL,
  `last_page` varchar(50) DEFAULT NULL,
  `pages_number` int(10) NOT NULL,
  `referer` varchar(250) DEFAULT NULL,
  `keywords` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `styles`
--

DROP TABLE IF EXISTS `styles`;
CREATE TABLE IF NOT EXISTS `styles` (
  `css_ID` int(7) NOT NULL AUTO_INCREMENT,
  `css_HeaderCat` int(5) NOT NULL DEFAULT 1,
  `css_Type` int(1) NOT NULL DEFAULT 0,
  `css_Name` varchar(150) NOT NULL DEFAULT 'New CSS',
  `css_Font` int(4) DEFAULT NULL,
  `css_Font_Size` varchar(5) NOT NULL,
  `css_Font_Color` varchar(6) DEFAULT NULL,
  `css_Global_Color` int(1) NOT NULL DEFAULT 0,
  `css_Font_LineHeight` varchar(6) DEFAULT NULL,
  `css_Font_Weight` varchar(10) NOT NULL DEFAULT 'normal',
  `css_Font_Style` varchar(100) NOT NULL DEFAULT 'Normal',
  `css_Back_Color` varchar(6) DEFAULT NULL,
  `css_Global_Back` int(1) NOT NULL DEFAULT 0,
  `css_Div` text DEFAULT NULL,
  `css_Hover` text DEFAULT NULL,
  `css_Before` text DEFAULT NULL,
  `css_After` text DEFAULT NULL,
  `css_Back_Image` varchar(30) DEFAULT NULL,
  `css_Back_Repeat` varchar(20) NOT NULL DEFAULT 'repeat',
  `css_Lang` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`css_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=738 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `styles`
--

INSERT INTO `styles` (`css_ID`, `css_HeaderCat`, `css_Type`, `css_Name`, `css_Font`, `css_Font_Size`, `css_Font_Color`, `css_Global_Color`, `css_Font_LineHeight`, `css_Font_Weight`, `css_Font_Style`, `css_Back_Color`, `css_Global_Back`, `css_Div`, `css_Hover`, `css_Before`, `css_After`, `css_Back_Image`, `css_Back_Repeat`, `css_Lang`) VALUES
(3, 1, 0, 'h2', 0, '22', '1d1d1b', 0, '', '400', '', '', 0, 'letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(90, 1, 0, 'headerTitle', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-bottom:30px;', NULL, NULL, NULL, '', 'repeat', '0'),
(5, 1, 0, 'h1', 0, '24', '000000', 1, '', '300', 'normal', '', 0, 'letter-spacing:0.2em;', '', '', '', '', 'repeat', '0'),
(7, 1, 0, 'formsearch', NULL, '10', '000000', 0, NULL, 'normal', 'Normal', '', 0, 'background-color: #d6f3c8; border: 1px solid #000000;', NULL, NULL, NULL, '', '', '0'),
(92, 1, 0, 'formrequired', 0, '', '', 0, '', 'normal', 'italic', '', 0, 'display: table;margin: auto;', NULL, NULL, NULL, '', 'repeat', '0'),
(16, 1, 0, 'formsubmit', 0, '16', 'ffffff', 0, '', '400', '', '000000', 3, 'border:none;\r\ncursor: pointer;\r\nmargin-top: 10px;\r\npadding: 10px 30px;\r\ndisplay: table;\r\nmargin: auto;', '', '', '', '', 'repeat', '0'),
(64, 1, 0, 'formtitle', NULL, '14', '000', 0, NULL, 'bold', 'Normal', '', 0, 'padding-bottom:7px; padding-top:12px;', NULL, NULL, NULL, '', '', '0'),
(25, 1, 0, 'cartText', 0, '11', 'DA2424', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, '', 'repeat', '0'),
(26, 1, 0, 'cartTitles', NULL, '11', 'fff', 0, NULL, 'normal', 'Normal', '484848', 0, 'border-right:1px solid #fff;  padding:3px;', NULL, NULL, NULL, NULL, '', '0'),
(27, 1, 0, 'cartSubmit', NULL, '11', 'fff', 0, NULL, 'normal', 'normal', '', 0, 'width:129px; height:30px; border:0px; cursor: pointer;', NULL, NULL, NULL, '27.png', 'no-repeat', '0'),
(28, 1, 0, 'cartDelete', 7, '12', 'FFFFFF', 0, NULL, 'bold', 'italic', 'ff7d00', 0, 'border:1px solid #bfb446; cursor: pointer;', NULL, NULL, NULL, '', 'repeat', '0'),
(66, 1, 0, 'formtext', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'width: 100%;display: block;', NULL, NULL, NULL, '', 'repeat', '0'),
(68, 1, 0, 'formerror', 0, '12', '9d2d2d', 0, NULL, 'normal', 'normal', '', 0, 'padding:3px; ', NULL, NULL, NULL, '', 'repeat', '0'),
(71, 1, 0, 'formfields', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'border: 1px solid #333333;\r\npadding: 4px 6px;\r\nwidth: 100%;', '', '', '', '', 'repeat', '0'),
(391, 1, 0, 'gridBlog', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left;width:33.33%;padding:10px;', '', '', '', NULL, 'repeat', '0'),
(74, 1, 0, 'newsletTitle', 0, '12', '000', 0, NULL, 'normal', 'normal', '', 0, 'margin-bottom:7px;', NULL, NULL, NULL, '', 'repeat', '0'),
(75, 1, 0, 'newsletField', 0, '12', '000', 0, NULL, 'normal', 'normal', '', 0, 'border:1px solid #4c4c4c; height:23px; line-height:23px; padding:0px 5px;', NULL, NULL, NULL, '', 'repeat', '0'),
(100, 1, 0, 'cartDiscount', NULL, '14', 'FF0000', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, '', 'repeat', '0'),
(480, 1, 0, 'grid10to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:10%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(91, 1, 0, 'newsletSubmit', 0, '12', 'fff', 0, NULL, 'normal', 'normal', '333333', 0, 'border:1px solid #4c4c4c; cursor: pointer; height:25px; line-height:25px; padding:0px 10px;', NULL, NULL, NULL, '', 'repeat', '0'),
(221, 1, 0, 'sticky .topmenu', 0, '', '', 0, '', 'normal', 'normal', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(222, 1, 0, 'sticky2', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'width: 20%;\r\n  height: 40px;\r\n  top:44px;\r\nright:2%;\r\n  display: block;\r\n  position: fixed;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(88, 1, 0, 'sitemap', NULL, '11', '000', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, '', '', '0'),
(94, 1, 0, 'newsletError', 0, '11', 'cc0000', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, '', 'repeat', '0'),
(98, 1, 0, 'cartOldPrice', NULL, '12', '813E3E', 0, NULL, 'normal', 'normal', '', 0, 'text-decoration:line-through;', NULL, NULL, NULL, '', 'repeat', '0'),
(99, 1, 0, 'cartPrice', 0, '13', '000', 0, '', '400', '', '', 0, '', '', '', '', '', 'repeat', '0'),
(102, 1, 0, 'addresstext', 0, '', '', 0, '', '400', '', '', 0, 'display:block;', '', '', '', '', 'repeat', '0'),
(103, 1, 0, 'addresstitle', 0, '14', '000', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, '', 'repeat', '0'),
(106, 1, 0, 'botaddresstext', 0, '12', '000', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(107, 1, 0, 'botaddressTitle', 0, '13', '000', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(108, 1, 0, 'h3', 0, '16', '000000', 1, '', '400', '', '', 0, 'line-height:normal;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(204, 1, 0, 'widthSmall', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'max-width:980px; width:100%; margin:auto;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(143, 1, 0, 'photoshover', 0, '', '', 0, '', '400', '', '', 0, 'position:absolute;background-color:rgba(0,0,0, .6);background-size:100px;\r\ntop:0;left:0;right:0;bottom:0;\r\nz-index: 10;\r\nopacity: 0;\r\n-webkit-transition: all 0.5s ease;\r\n-moz-transition: all 0.5s ease;\r\n-o-transition: all 0.5s ease;\r\ntransition: all 0.5s ease;\r\nbackground-position:50%;', 'opacity:1;', '', '', '143.png', 'no-repeat', '0'),
(152, 1, 0, 'wow fadeInLeft', 0, '', '', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(153, 1, 0, 'wow fadeInUp', 0, '', '', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(154, 1, 0, 'wow fadeInRight', 0, '', '', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(155, 1, 0, 'wow zoomIn', 0, '', '', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(156, 1, 0, 'wow fadeIn', 0, '', '', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(157, 1, 0, 'sink', 0, '', '', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(158, 1, 0, 'skew', 0, '', '', 0, NULL, 'normal', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(220, 1, 0, 'sticky', 0, '', '', 0, '', '400', '', '', 0, 'position:fixed;top:0;left:0;right:0;z-index:65;box-shadow: 0 0 5px rgba(0,0,0,.2);letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(161, 1, 0, 'grid25', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left; width:25%; margin:0;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(170, 1, 0, 'grid30', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left; width:30%; margin:0;', NULL, NULL, NULL, '', 'repeat', '0'),
(165, 1, 0, 'grid50', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left; width:50%; margin:0;', NULL, NULL, NULL, '', 'repeat', '0'),
(171, 1, 0, 'grid70', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left; width:70%; margin:0;', NULL, NULL, NULL, '', 'repeat', '0'),
(173, 1, 0, 'grid20', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left; width:20%; margin:0;', NULL, NULL, NULL, '', 'repeat', '0'),
(174, 1, 0, 'grid80', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left; width:80%; margin:0;', NULL, NULL, NULL, '', 'repeat', '0'),
(182, 1, 0, 'grid40', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left; width:40%; margin:0px;', NULL, NULL, NULL, '', 'repeat', '0'),
(183, 1, 0, 'grid60', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left; width:60%; margin:0;', NULL, NULL, NULL, '', 'repeat', '0'),
(185, 1, 0, 'menuIcon', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'display:block;  width:34px; height:34px; ', NULL, NULL, NULL, '185.png', 'repeat', '0'),
(186, 1, 0, 'menuIconHide', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'display:block;  width:34px; height:34px; ', NULL, NULL, NULL, '186.png', 'repeat', '0'),
(190, 1, 0, 'grid33', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left; width:33.33%; margin:0px;', NULL, NULL, NULL, '', 'repeat', '0'),
(206, 1, 0, 'center', 0, '', '', 0, '', '400', '', '', 0, 'text-align:center;text-align:center;', '', '', '', NULL, 'repeat', '0'),
(209, 1, 0, 'gridItem98', 0, '', '', 0, '', '400', '', '', 0, 'width:98%; margin:auto;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(210, 1, 0, 'gridItem96', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'width:96%; margin:auto;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(211, 1, 0, 'top10', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:10px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(212, 1, 0, 'top15', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:15px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(213, 1, 0, 'top20', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:20px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(214, 1, 0, 'top25', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:25px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(218, 1, 0, 'top30', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:30px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(219, 1, 0, 'top40', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:40px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(225, 1, 0, 'widthLarge', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'max-width:1280px; margin:auto; padding:0 10px;', '', '', '', NULL, 'repeat', '0'),
(228, 1, 0, 'flexBox', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'display: -webkit-flex;\r\ndisplay: flex;\r\n -webkit-flex-direction: row;\r\n flex-direction: row;\r\n -webkit-flex-wrap: wrap;\r\n flex-wrap: wrap;\r\n-webkit-align-items: stretch;\r\n align-items: stretch;\r\n-webkit-justify-content: center;\r\njustify-content: center;\r\nwidth:100%; margin:auto;', '', '', '', NULL, 'repeat', '0'),
(230, 1, 0, 'marquee', 0, '15', '000000', 0, '', 'normal', 'normal', '', 0, 'margin: 0 auto;\r\noverflow: hidden;\r\nwhite-space: nowrap;\r\nbox-sizing: border-box;\r\ndisplay: block;\r\nanimation: marquee 20s linear infinite;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(231, 1, 0, 'imageArea', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'position:relative;padding-bottom:80%;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(232, 1, 0, 'subCatsFlex', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'display: -webkit-flex;\r\n   display: flex;\r\n   -webkit-align-items: center;\r\n   align-items: center;\r\n   -webkit-justify-content: center;\r\n   justify-content: center;\r\n -webkit-flex-direction: row;\r\n   flex-direction: row;\r\n   -webkit-flex-wrap: wrap;\r\n   flex-wrap: wrap;\r\n   -webkit-align-content: center;\r\n   align-content: center;', '', '', '', NULL, 'repeat', '0'),
(234, 1, 0, 'popupTitle', 0, '34px', '2E2E2E', 0, '', '700', 'normal', '', 0, 'text-align:center;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(235, 1, 0, 'popupText', 0, '18px', '3A3A3A', 0, '', 'normal', 'normal', '', 0, 'text-align:center; line-height:28px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(236, 1, 0, 'popupSubTitle', 0, '27px', '2c2c2c', 0, '', '700', 'normal', '', 0, '', NULL, NULL, NULL, NULL, 'repeat', '0'),
(237, 1, 0, 'popupOfferBack', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'width: 100px;\r\nheight: 100px;\r\nbackground: #eb2120;\r\n-moz-border-radius: 50px;\r\n-webkit-border-radius: 50px;\r\nborder-radius: 50px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(238, 1, 0, 'popupOfferText', 0, '42px', 'fff', 0, '', '700', 'normal', '', 0, 'padding-top:21px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(240, 10, 0, 'popupTitle', 0, '26px', 'f0b536', 0, '30', '700', 'normal', '', 0, 'text-align:center;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(241, 10, 0, 'popupText', 0, '22px', 'fff', 0, '', 'normal', 'normal', '', 0, 'text-align:center;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(244, 10, 0, 'popupOfferBack', 0, '', '', 0, '', 'normal', 'normal', '3c3c3c', 0, '', NULL, NULL, NULL, '', 'repeat', '0'),
(245, 1, 0, 'formRow', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'display: block;\r\nmargin-bottom: 15px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(246, 1, 0, 'gridFormLabel', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float: left;width: 40%;margin: 0;display: table;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(247, 1, 0, 'gridFormLabelItem', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'width: 95%;margin: auto;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(248, 1, 0, 'gridFormField', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float: left;width: 60%;margin: 0;display: table;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(249, 1, 0, 'gridFormFieldItem', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'width: 95%;margin: auto;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(250, 10, 0, 'gridFormLabel', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float: left;width: 100%;margin: 0;display: table;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(251, 10, 0, 'gridFormField', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float: left;width: 100%;margin: 0;display: table;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(252, 1, 0, 'gridOffers', 0, '', '', 0, '', '400', '', '', 0, 'float:left; width:33.33%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(254, 1, 0, 'OfferTitle', 0, '30', '363636', 0, '', '300', 'normal', '', 0, 'margin-bottom:20px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(256, 1, 0, 'justify', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'text-align:justify;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(257, 1, 0, 'relative', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'position:relative;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(258, 1, 0, 'tableAuto', 0, '', '', 0, '', '400', '', '', 0, 'display:table;margin:auto;', '', '', '', NULL, 'repeat', '0'),
(259, 1, 0, 'topmenu', 0, '', '', 0, '', 'normal', 'normal', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(260, 1, 0, 'gridLogo', 0, '', '', 0, '', '400', '', '', 0, 'float:left; width:20%; margin:0;', '', '', '', NULL, 'repeat', '0'),
(261, 1, 0, 'gridMenu', 0, '', '', 0, '', '400', '', '', 0, 'float:left; width:40%; margin:0;padding: 0 20px;letter-spacing:0px;text-align:right;', '', '', '', NULL, 'repeat', '0'),
(262, 1, 0, 'gridBook', 0, '', '', 0, '', '400', '', '', 0, 'float:left; width:40%; margin:0;text-align:right;', '', '', '', NULL, 'repeat', '0'),
(496, 1, 0, 'grid33to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:33.33%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(264, 1, 0, 'top50', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:50px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(265, 1, 0, 'top100', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:100px;', NULL, NULL, NULL, NULL, 'repeat', '0'),
(271, 1, 0, 'headerArrows', 0, '', '', 0, '', 'normal', 'normal', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(272, 1, 0, 'headerArrows:hover a.header-next', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'opacity:1;', '', '', '', NULL, 'repeat', '0'),
(273, 1, 0, 'headerArrows:hover a.header-prev', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'opacity:1;', '', '', '', NULL, 'repeat', '0'),
(275, 1, 0, 'lazyload', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'opacity:0;', '', '', '', NULL, 'repeat', '0'),
(276, 1, 0, 'lazyloading', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'opacity:0;', '', '', '', NULL, 'repeat', '0'),
(277, 1, 0, 'lazyloaded', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'opacity: 1;transition: opacity 500ms;', '', '', '', NULL, 'repeat', '0'),
(278, 1, 0, 'hotelPrice-wrapper', 0, '', '', 0, '', 'normal', 'normal', 'ffffff', 0, 'width:230px !important;max-width: 230px !important;position: fixed;overflow: hidden;bottom:0;right: -300px;z-index: 999;-moz-box-shadow: 0 3px 10px 0 #3d3d3d;-webkit-box-shadow: 0 3px 10px 0 #3d3d3d;box-shadow: 0 3px 10px 0 #3d3d3d;', '', '', '', NULL, 'repeat', '0'),
(279, 1, 0, 'hotelPrice-top', 0, '', '', 0, '', 'normal', 'normal', '50b3f1', 0, 'padding:5px 0px;', '', '', '', NULL, 'repeat', '0'),
(280, 1, 0, 'hPTopTitle', 0, '15', 'ffffff', 0, '', '400', 'normal', '', 0, 'padding:5px 10px 0px 10px;cursor:default;', '', '', '', NULL, 'repeat', '0'),
(281, 1, 0, 'hPTopSubTitle', 0, '10', 'ffffff', 0, '10', '400', 'normal', '', 0, 'padding:0px 10px 5px 10px;cursor:default;', '', '', '', NULL, 'repeat', '0'),
(282, 1, 0, 'hPClose', 0, '15', 'ffffff', 0, '', 'bold', 'normal', '', 0, 'padding:5px 10px;float:right;cursor:pointer;', '', '', '', NULL, 'repeat', '0'),
(283, 1, 0, 'hotelPrice-content', 0, '', '', 0, '', 'nomal', 'normal', 'ffffff', 0, '', '', '', '', NULL, 'repeat', '0'),
(284, 1, 0, 'hpBorder', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'border-bottom: 1px solid #c5c5c5;padding-bottom:5px;margin:5px 0px;', '', '', '', NULL, 'repeat', '0'),
(285, 1, 0, 'hPWebsiteTitle', 0, '20', '222221', 0, '', '400', 'normal', '', 0, 'padding:5px 8px;float:left;cursor:default;', '', '', '', NULL, 'repeat', '0'),
(286, 1, 0, 'hpWebsitePrice', 0, '18', '5cbc63', 0, '', 'bold', 'normal', '', 0, 'padding:5px 10px;float: right;', '', '', '', NULL, 'repeat', '0'),
(287, 1, 0, 'hPExtTitle', 0, '15', '222221', 0, '', '400', 'normal', '', 0, 'float:left;cursor:default;padding:0px 10px;', '', '', '', NULL, 'repeat', '0'),
(288, 1, 0, 'hpExtPrice', 0, '14', '222221', 0, '', '600', 'normal', '', 0, 'float:right;padding:0px 10px;', '', '', '', NULL, 'repeat', '0'),
(289, 1, 0, 'hPTripadvisorTitle', 0, '15', '222221', 0, '', '400', 'normal', '', 0, 'float:left;cursor:default;padding:7px 10px 0px 10px;', '', '', '', NULL, 'repeat', '0'),
(290, 1, 0, 'hpTripadvisor-wrapper', 0, '', '', 0, '', 'normal', 'normal', 'ececec', 0, 'width: initial !important;padding: 5px 0px;margin: 5px 0px;height: 45px;overflow: hidden;', '', '', '', NULL, 'repeat', '0'),
(291, 1, 0, 'hotelPrice-book', 0, '', '', 0, '', 'normal', 'normal', 'ffffff', 0, 'width: 92%;margin:auto;padding:10px 0px;', '', '', '', NULL, 'repeat', '0'),
(292, 1, 0, 'hotelPrice-buttonWrapper', 0, '15', 'ffffff', 0, '', '600', 'normal', '50b3f1', 0, 'text-align:center;width:50px;border-radius: 50%;padding:25px 20px;display:table;position: fixed;cursor: pointer;bottom:65px;right: -150px;z-index: 999;-moz-box-shadow: 0 3px 10px 0 #3d3d3d;-webkit-box-shadow: 0 3px 10px 0 #3d3d3d;box-shadow: 0 3px 10px 0 #3d3d3d;', '', '', '', NULL, 'repeat', '0'),
(294, 1, 0, 'menuCont', 0, '', '', 0, '', '400', '', 'ffffff', 2, 'padding:10px;', '', '', '', NULL, 'repeat', '0'),
(504, 1, 0, 'gridLangs', 0, '', '', 0, '', '400', '', '', 0, 'display:inline-block;vertical-align:middle;', '', '', '', NULL, 'repeat', '0'),
(295, 1, 0, '*', 0, '', '', 0, '', '400', '', '', 0, '}*{box-sizing:border-box;', '', '', '', NULL, 'repeat', '0'),
(298, 1, 0, 'homeTitle', 30, '30', '000000', 1, '', '700', '', '', 0, 'letter-spacing:0.1em;', '', '', '', NULL, 'repeat', '0'),
(302, 1, 0, 'textRtoC', 0, '', '', 0, '', '400', '', '', 0, 'text-align:right;', '', '', '', NULL, 'repeat', '0'),
(305, 1, 0, 'showLessButton', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:30px;', '', '', '', NULL, 'repeat', '0'),
(348, 1, 0, 'gridActivities', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left;width:33.33%;padding:1%;', '', '', '', NULL, 'repeat', '0'),
(351, 1, 0, 'gridGallery', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:20%;padding: 4px;', '', '', '', NULL, 'repeat', '0'),
(353, 1, 0, 'grid40to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:40%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(486, 10, 0, 'grid40to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(355, 1, 0, 'gridGalleryInsta', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'float:left;width:50%;', '', '', '', NULL, 'repeat', '0'),
(357, 1, 0, 'gridGalleryInsta .imageArea', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-bottom: 100%;', '', '', '', NULL, 'repeat', '0'),
(361, 1, 0, 'grid50to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:50%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(487, 10, 0, 'grid50to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(363, 1, 0, 'footerTitle', 0, '20', '000000', 1, '', 'normal', 'normal', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(392, 1, 0, 'mainBlogTitle', 30, '32', '000000', 1, '', '700', '', '', 0, 'margin-bottom:20px;', '', '', '', NULL, 'repeat', '0'),
(364, 1, 0, 'addresstext a', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'color:[$C2];', 'color:[$C1];', '', '', NULL, 'repeat', '0'),
(365, 1, 0, 'gridAcc', 0, '', '', 0, '', '400', '', '', 0, 'width:33.33%;padding:15px 15px 40px;display: inline-block;float: left;', '', '', '', NULL, 'repeat', '0'),
(366, 1, 0, 'topNoHeader', 0, '', '', 0, '', '400', '', '', 0, 'padding-top:50px;', '', '', '', NULL, 'repeat', '0'),
(367, 1, 0, 'headerTitle h1', 0, '30', '000000', 1, '', 'normal', 'normal', '', 0, 'text-align:center;', '', '', '', NULL, 'repeat', '0'),
(499, 10, 0, 'grid25to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(491, 10, 0, 'grid80to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(492, 1, 0, 'grid90to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:90%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(493, 10, 0, 'grid90to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(494, 1, 0, 'grid10', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:10%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(495, 1, 0, 'grid90', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:90%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(497, 10, 0, 'grid33to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(498, 1, 0, 'grid25to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:25%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(501, 1, 0, 'textLtoC', 0, '', '', 0, '', '400', '', '', 0, 'letter-spacing:0px;text-align:left;', '', '', '', NULL, 'repeat', '0'),
(502, 10, 0, 'textLtoC', 0, '', '', 0, '', '400', '', '', 0, 'text-align:center;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(503, 1, 0, 'top5', 0, '', '', 0, '', '400', '', '', 0, 'padding-top:5px;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(386, 1, 0, 'marginLR', 0, '', '', 0, '', '400', '', '', 0, 'margin:0 80px;position:relative;', '', '', '', NULL, 'repeat', '0'),
(483, 10, 0, 'grid20to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(484, 1, 0, 'grid30to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:30%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(485, 10, 0, 'grid30to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(488, 1, 0, 'grid60to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:60%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(489, 10, 0, 'grid60to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(490, 1, 0, 'grid80to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:80%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(394, 1, 0, 'langWrapper', 0, '', '', 0, '', '400', '', '', 0, 'padding-top:3px;', '', '', '', NULL, 'repeat', '0'),
(482, 1, 0, 'grid20to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:20%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(481, 10, 0, 'grid10to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(424, 10, 0, 'menu_ul', 0, '', '', 0, '', 'normal', 'normal', '000000', 3, '', '', '', '', NULL, 'repeat', '0'),
(429, 10, 0, 'homeTitle', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'font-size: 20px;', '', '', '', NULL, 'repeat', '0'),
(441, 10, 0, 'gridActivities', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'width: 100%;', '', '', '', NULL, 'repeat', '0'),
(442, 10, 0, 'gridGalleryInsta', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'width: 100%;', '', '', '', NULL, 'repeat', '0'),
(443, 10, 0, 'gridGalleryInsta .imageArea', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-bottom: 100%;', '', '', '', NULL, 'repeat', '0'),
(446, 10, 0, 'menuCont', 0, '', '', 0, '', '400', '', '', 0, 'padding:5px 10px;', '', '', '', NULL, 'repeat', '0'),
(447, 10, 0, 'textRtoC', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'text-align:center;', '', '', '', NULL, 'repeat', '0'),
(453, 10, 0, 'topNoHeader', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'padding-top:0;', '', '', '', NULL, 'repeat', '0'),
(454, 10, 0, 'gridAcc', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'min-width:initial;width:100%;', '', '', '', NULL, 'repeat', '0'),
(464, 10, 0, 'photoshover', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'background-size: 50%;', '', '', '', NULL, 'repeat', '0'),
(471, 10, 0, 'gridBlog', 0, '', '', 0, '', 'normal', 'normal', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(476, 1, 0, 'gridContact', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:30%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(477, 10, 0, 'gridContact', 0, '', '', 0, '', '400', '', '', 0, 'display:none;letter-spacing:0px;', '', '', '', '', 'repeat', '0'),
(478, 10, 0, 'grid70to100', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(479, 1, 0, 'grid70to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:70%;letter-spacing:0px;', '', '', '', NULL, 'repeat', '0'),
(505, 1, 0, 'logoPaddMenu', 0, '', '', 0, '', '400', '', '', 0, 'padding:20px;margin-bottom:80px;', '', '', '', NULL, 'repeat', '0'),
(506, 1, 0, 'menu_icon', 0, '', '000000', 1, '', '400', '', '', 0, 'position:relative;', '', '', 'content:\"menu\";font-size:12px;position:absolute;top:47%;left:40px;transform:translate(0,-50%);color:[$C1];', NULL, 'repeat', '0'),
(507, 1, 0, 'homeSubtitle', 30, '60', '676767', 2, '', '700', '', '', 0, 'letter-spacing:0.1em;', '', '', '', NULL, 'repeat', '0'),
(508, 1, 0, 'gridWelcomeL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:45%;padding-right: 7%;', '', '', '', NULL, 'repeat', '0'),
(509, 1, 0, 'gridWelcomeR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:55%;padding-top:50px;', '', '', '', NULL, 'repeat', '0'),
(510, 1, 0, 'gridItem90', 0, '', '', 0, '', '400', '', '', 0, 'width:90%;margin:0 auto;', '', '', '', NULL, 'repeat', '0'),
(511, 1, 0, 'widthLarger', 0, '', '', 0, '', '400', '', '', 0, 'max-width:1600px;padding:0 20px;margin:0 auto;', '', '', '', NULL, 'repeat', '0'),
(512, 1, 0, 'welcomeImgL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:60%;', '', '', '', NULL, 'repeat', '0'),
(513, 1, 0, 'welcomeImgR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:40%;padding-left: 10px;padding-top: 20px;', '', '', '', NULL, 'repeat', '0'),
(514, 1, 0, 'reviewTitle', 0, '15', '000000', 1, '', '700', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(515, 1, 0, 'reviewText', 0, '13', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(516, 1, 0, 'reviewCont', 0, '', '', 0, '', '400', '', '', 0, 'width:70%;padding:40px 10% 50px 0;position: relative;', '', 'content:\"\";position:absolute;top:0;right:0;bottom:0;left:-20%;background:[$BG1];z-index:-1;', '', NULL, 'repeat', '0'),
(517, 1, 0, 'homeTitlesCont', 0, '', '', 0, '', '400', '', '', 0, 'position:relative;padding:20px 20px 40px 20px;', '', 'content:\"\";position:absolute;top:0;bottom:0;left:0;width:140px;background:[$BG1];z-index:-1;', '', NULL, 'repeat', '0'),
(518, 1, 0, 'homeGridTitlesL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:50%;', '', '', '', NULL, 'repeat', '0'),
(519, 1, 0, 'homeGridTitlesR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:50%;', '', '', '', NULL, 'repeat', '0'),
(520, 1, 0, 'accTitlesCont', 0, '', '', 0, '', '400', '', '', 0, 'position:relative;padding:20px 20px 40px 20px;', '', 'content:\"\";position:absolute;top:0;bottom:0;left:0;width:100px;background:[$BG1];z-index:-1;', '', NULL, 'repeat', '0'),
(521, 1, 0, 'accTitle', 30, '24', '000000', 1, '', '700', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(522, 1, 0, 'accSubtitle', 30, '18', '676767', 2, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(523, 1, 0, 'capacity', 0, '', '', 0, '', '400', '', '', 0, 'height:27px;display:inline-block;background-size:contain;background-repeat:no-repeat !important;vertical-align:middle;', '', '', '', NULL, 'repeat', '0'),
(524, 1, 0, 'capacity2_1', 0, '', '', 0, '', '400', '', '', 0, 'width:51px;', '', '', '', '524_R1722.png', 'repeat', '0'),
(525, 1, 0, 'accInfoL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:70%;', '', '', '', NULL, 'repeat', '0'),
(526, 1, 0, 'accInfoR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:30%;padding-top:30px;', '', '', '', NULL, 'repeat', '0'),
(527, 1, 0, 'capacity2_2', 0, '', '', 0, '', '400', '', '', 0, 'width:64px;', '', '', '', '527_R5984.png', 'repeat', '0'),
(528, 1, 0, 'capacity2', 0, '', '', 0, '', '400', '', '', 0, 'width:27px;', '', '', '', '528_R6839.png', 'repeat', '0'),
(529, 1, 0, 'capacity1', 0, '', '', 0, '', '400', '', '', 0, 'width:10px;', '', '', '', '529_R5817.png', 'repeat', '0'),
(530, 1, 0, 'capacity3', 0, '', '', 0, '', '400', '', '', 0, 'width:45px;', '', '', '', '530_R1067.png', 'repeat', '0'),
(531, 1, 0, 'capacity4', 0, '', '', 0, '', '400', '', '', 0, 'width:63px;', '', '', '', '531_R8176.png', 'repeat', '0'),
(532, 1, 0, 'homeDescription', 0, '', '', 0, '', '400', '', '', 0, 'padding-top:40px;text-align:right;', '', '', '', NULL, 'repeat', '0'),
(533, 1, 0, 'homeGridImgL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:24.4%;', '', '', '', NULL, 'repeat', '0'),
(534, 1, 0, 'homeGridImgR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:75.6%;padding-left:1%;', '', '', '', NULL, 'repeat', '0'),
(535, 1, 0, 'restImgL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:37%;padding:30px 1% 0 8%;', '', '', '', NULL, 'repeat', '0'),
(536, 1, 0, 'restImgR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:63%;', '', '', '', NULL, 'repeat', '0'),
(537, 1, 0, 'restTitlesPos', 0, '', '', 0, '', '400', '', '', 0, 'z-index: 1;position:absolute;top:30px;left:0;z-index: 1;', '', '', '', NULL, 'repeat', '0'),
(538, 1, 0, 'restGridL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:45%;padding-top: 16%;padding-right:5%;', '', '', '', NULL, 'repeat', '0'),
(539, 1, 0, 'restGridR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:55%;', '', '', '', NULL, 'repeat', '0'),
(540, 1, 0, 'restImagesCont', 0, '', '', 0, '', '400', '', '', 0, 'position:relative;padding-bottom:30px;', '', '', 'content:\"\";position:absolute;left:0;bottom:0;width:60%;height:200px;background:[$BG1];z-index: -1;', NULL, 'repeat', '0'),
(541, 1, 0, 'homeTitleSmaller', 30, '40', '000000', 1, '', '700', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(542, 1, 0, 'temp1ImgL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:75%;', '', '', '', NULL, 'repeat', '0'),
(543, 1, 0, 'temp1ImgRCont', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:25%;padding-left:0.5%;', '', '', '', NULL, 'repeat', '0'),
(544, 1, 0, 'temp1ImgR1', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(545, 1, 0, 'temp1ImgR2', 0, '', '', 0, '', '400', '', '', 0, 'padding-top:1.5%;', '', '', '', NULL, 'repeat', '0'),
(546, 1, 0, 'expGridL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:55%;', '', '', '', '', 'repeat', '0'),
(547, 1, 0, 'expGridR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:45%;padding-top: 16%;padding-left:5%;text-align:right;', '', '', '', '', 'repeat', '0'),
(548, 1, 0, 'expTitlePos', 0, '', '', 0, '', '400', '', '', 0, 'z-index: 1;position:absolute;top:30px;right:0;z-index: 1;', '', '', '', '', 'repeat', '0'),
(549, 1, 0, 'homeTitlesContR', 0, '', '', 0, '', '400', '', '', 0, 'position:relative;padding:20px 20px 40px 20px;text-align:right;text-align:right;', '', 'content:\"\";position:absolute;top:0;bottom:0;right:0;width:140px;background:[$BG1];z-index:-1;', '', '', 'repeat', '0'),
(550, 1, 0, 'expImgL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:63%;', '', '', '', '', 'repeat', '0'),
(551, 1, 0, 'expImgR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:37%;padding:30px 8% 0 1%;', '', '', '', '', 'repeat', '0'),
(552, 1, 0, 'expImagesCont', 0, '', '', 0, '', '400', '', '', 0, 'position:relative;padding-bottom:30px;', '', '', 'content:\"\";position:absolute;right:0;bottom:0;width:60%;height:200px;background:[$BG1];z-index: -1;', '', 'repeat', '0'),
(553, 1, 0, 'flex1', 0, '', '', 0, '', '400', '', '', 0, 'flex:1;', '', '', '', NULL, 'repeat', '0'),
(554, 1, 0, 'flex2', 0, '', '', 0, '', '400', '', '', 0, 'flex:2;', '', '', '', NULL, 'repeat', '0'),
(555, 1, 0, 'flex3', 0, '', '', 0, '', '400', '', '', 0, 'flex:3;', '', '', '', NULL, 'repeat', '0'),
(556, 1, 0, 'flex4', 0, '', '', 0, '', '400', '', '', 0, 'flex:4;', '', '', '', NULL, 'repeat', '0'),
(557, 1, 0, 'temp2Img1', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:16.55%;', '', '', '', NULL, 'repeat', '0'),
(558, 1, 0, 'temp2Img2', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(559, 1, 0, 'temp2Img3', 0, '', '', 0, '', '400', '', '', 0, 'padding-top:3%;', '', '', '', NULL, 'repeat', '0'),
(560, 1, 0, 'temp2Img4', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:65.8%;', '', '', '', NULL, 'repeat', '0'),
(561, 1, 0, 'temp2Col2', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:17.5%;padding:0 .5%;', '', '', '', NULL, 'repeat', '0'),
(562, 1, 0, 'homeInstaGridL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:25%;', '', '', '', NULL, 'repeat', '0'),
(563, 1, 0, 'homeInstaGridR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:75%;position:relative;', '', '', '', NULL, 'repeat', '0'),
(564, 1, 0, 'instagramTitle', 0, '', '', 0, '', '400', '', '', 0, 'position:absolute;right:0;bottom:0;height:200px;background:[$BG1];width: 30%;\r\nz-index: -1;\r\npadding-top: 120px;\r\ntext-align: right;\r\npadding-right: 4%;', '', '', '', NULL, 'repeat', '0'),
(565, 1, 0, 'instagramDesc', 0, '', '', 0, '', '400', '', '', 0, 'background-position:0 50%;padding-left:90px;line-height:60px;letter-spacing:1px;', '', '', '', '565_R3840.png', 'no-repeat', '0'),
(566, 1, 0, 'locationGridL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:17%;padding-right:0.5%;', '', '', '', NULL, 'repeat', '0'),
(567, 1, 0, 'locationGridR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:83%;', '', '', '', NULL, 'repeat', '0'),
(568, 1, 0, 'gridFooter1', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:15%;padding-top:15px;', '', '', '', NULL, 'repeat', '0'),
(569, 1, 0, 'gridFooter2', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:15%;', '', '', '', NULL, 'repeat', '0'),
(570, 1, 0, 'gridFooter3', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:40%;', '', '', '', NULL, 'repeat', '0'),
(571, 1, 0, 'gridFooter4', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:30%;', '', '', '', NULL, 'repeat', '0'),
(572, 1, 0, 'socialCont', 0, '', '', 0, '', '400', '', 'eeeeee', 1, 'padding: 30px 50px;\r\nwidth: 130%;\r\npadding-right: 30%;', '', '', '', NULL, 'repeat', '0'),
(573, 1, 0, 'followUs', 0, '', '', 0, '', '400', '', '', 0, 'padding-top:10%;text-align:right;', '', '', '', NULL, 'repeat', '0'),
(574, 1, 0, 'footerBanner', 0, '', '', 0, '', '400', '', '', 0, 'max-width:120px;', '', '', '', NULL, 'repeat', '0'),
(611, 14, 0, 'gridAccL', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;padding-top: 0px;', '', '', '', NULL, 'repeat', '0'),
(576, 1, 0, 'facilities', 30, '26', '000000', 1, '', '700', '', '', 0, 'padding:50px 15%;border:1px solid;position:relative;margin-top: 80px;', '', 'content:\"Facilities & Services\";position:absolute;width:108px;height:127px;background:[$BG1];white-space:nowrap;top:-90px;left:30px;display:block;padding: 20px;box-sizing: border-box;', '', NULL, 'repeat', '0'),
(577, 1, 0, 'facilities li', 29, '15', '000000', 1, '', '400', '', '', 0, 'list-style-type:none;padding:5px 0;position:relative;', '', 'content:\"-\";position:absolute;display:inline-block;top:4px;left:-20px;', '', NULL, 'repeat', '0'),
(578, 1, 0, 'facilities ul', 0, '', '', 0, '', '400', '', '', 0, '-webkit-columns: 270px;\r\n-moz-columns: 270px;\r\ncolumns: 270px;\r\n-webkit-column-gap: 2em;\r\n-moz-column-gap: 2em;\r\ncolumn-gap: 2em;\r\nlist-style-type: none;', '', '', '', NULL, 'repeat', '0'),
(579, 1, 0, 'gridAccL', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:45%;padding-right:6%;padding-top:40px;', '', '', '', NULL, 'repeat', '0'),
(580, 1, 0, 'gridAccR', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:55%;', '', '', '', NULL, 'repeat', '0'),
(581, 1, 0, 'gridGal4', 0, '', '', 0, '', '400', '', '', 0, 'float: left;\r\nwidth: 70%;\r\nmargin: 0;', '', '', '', NULL, 'repeat', '0'),
(582, 10, 0, 'gridGal4', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', '', 'repeat', '0'),
(583, 10, 0, 'gridGalleryLarge', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(584, 1, 0, 'gridGalleryLarge', 0, '', '', 0, '', '400', '', '', 0, 'float: left;\r\nwidth: 66.66%;\r\nmargin: 0;', '', '', '', NULL, 'repeat', '0'),
(585, 10, 0, 'gridGallerySmall', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;', '', '', '', NULL, 'repeat', '0'),
(586, 1, 0, 'gridGallerySmall', 0, '', '', 0, '', '400', '', '', 0, 'float: left;\r\nwidth: 33.33%;\r\nmargin: 0;', '', '', '', NULL, 'repeat', '0'),
(587, 1, 0, 'gridGal5', 0, '', '', 0, '', '400', '', '', 0, 'float: left;\r\nwidth: 30%;\r\nmargin: 0;', '', '', '', NULL, 'repeat', '0'),
(588, 10, 0, 'gridGal5', 0, '', '', 0, '', '400', '', '', 0, 'display:none;', '', '', '', '', 'repeat', '0'),
(589, 1, 0, 'imageAreaHor', 0, '', '', 0, '', '400', '', '', 0, 'position: relative;padding-bottom: 46.8%;\r\nbackground-position: 50%;', '', '', '', NULL, 'repeat', '0'),
(590, 1, 0, 'imageAreaVert', 0, '', '', 0, '', '400', '', '', 0, 'position: relative;\r\npadding-bottom: 93.5%;\r\nbackground-position: 50%;', '', '', '', NULL, 'repeat', '0'),
(591, 1, 0, 'imageAreaGal5', 0, '', '', 0, '', '400', '', '', 0, 'position: relative;\r\npadding-bottom: 145.5%;\r\nbackground-position: 50%;', '', '', '', NULL, 'repeat', '0'),
(592, 1, 0, 'subcategoriesCont', 30, '26', '000000', 1, '', '700', '', '', 0, 'position:relative;margin-top: 80px;', '', 'content:\"ALL SUITES\";position:absolute;width:108px;height:127px;background:[$BG1];white-space:nowrap;top: -60px;z-index: 9;left:30px;display:block;padding: 20px;box-sizing: border-box;', '', '', 'repeat', '0'),
(593, 1, 0, 'accInternalDescription', 0, '15', '', 0, '', '400', '', '', 0, '', '', 'content:\"\";display:inline-block;width:10px;height:12px;background:[$BG4];margin-right:10px;', '', NULL, 'repeat', '0'),
(594, 1, 0, 'accTextMargin', 0, '', '', 0, '', '400', '', '', 0, 'margin-left:30px;', '', '', '', NULL, 'repeat', '0'),
(595, 1, 0, 'floorPlanIcon', 0, '', '', 0, '', '400', '', '', 0, 'width:50px;height:32px;display: inline-block;vertical-align:middle;', '', '', '', '595_R8971.png', 'no-repeat', '0'),
(596, 1, 0, 'accInfoItem', 0, '17', '', 0, '', '400', '', '', 0, 'padding-right:20px;display:inline-block;width:30%;', '', '', '', NULL, 'repeat', '0'),
(597, 1, 0, 'accGalleryCont', 0, '', '', 0, '', '400', '', '', 0, 'position:relative;padding-bottom:35px;', '', 'content:\"\";display:block;position:absolute;bottom:0;height:200px;right:-80px;background:[$BG1];width:40%;', '', NULL, 'repeat', '0'),
(598, 1, 0, 'recListMargin', 0, '', '', 0, '', '400', '', '', 0, 'margin-bottom:40px;', '', '', '', NULL, 'repeat', '0'),
(599, 1, 0, 'gridExplore', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:33.33%;padding:15px;', '', '', '', NULL, 'repeat', '0'),
(600, 14, 0, 'homeSubtitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:46px;', '', '', '', NULL, 'repeat', '0'),
(601, 14, 0, 'homeTitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:26px;', '', '', '', NULL, 'repeat', '0'),
(602, 17, 0, 'widthLarger', 0, '', '', 0, '', '400', '', '', 0, 'margin:0 50px;', '', '', '', NULL, 'repeat', '0'),
(603, 17, 0, 'marginLR', 0, '', '', 0, '', '400', '', '', 0, 'margin:0 50px;', '', '', '', NULL, 'repeat', '0'),
(604, 14, 0, 'accSubtitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:16px;', '', '', '', NULL, 'repeat', '0'),
(605, 14, 0, 'homeTitleSmaller', 0, '', '', 0, '', '400', '', '', 0, 'font-size:30px;', '', '', '', NULL, 'repeat', '0'),
(606, 14, 0, 'restGridL', 0, '', '', 0, '', '400', '', '', 0, 'padding-top: 18%;', '', '', '', NULL, 'repeat', '0'),
(607, 14, 0, 'restTitlesPos', 0, '', '', 0, '', '400', '', '', 0, 'top: 10px;', '', '', '', NULL, 'repeat', '0'),
(608, 14, 0, 'instagramTitle', 0, '', '', 0, '', '400', '', '', 0, 'padding-top: 75px;height: 150px;bottom: 10px;', '', '', '', NULL, 'repeat', '0'),
(609, 14, 0, 'instagramDesc', 0, '', '', 0, '', '400', '', '', 0, 'background-size: contain;line-height: 40px;', '', '', '', NULL, 'repeat', '0'),
(610, 14, 0, 'gridFooter1', 0, '', '', 0, '', '400', '', '', 0, 'padding-right: 20px;\r\npadding-top: 8px;', '', '', '', NULL, 'repeat', '0'),
(612, 14, 0, 'gridAccR', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;', '', '', '', NULL, 'repeat', '0'),
(613, 14, 0, 'capacity', 0, '', '', 0, '', '400', '', '', 0, 'height:24px;', '', '', '', NULL, 'repeat', '0'),
(614, 14, 0, 'expGridR', 0, '', '', 0, '', '400', '', '', 0, 'padding-top:18%;', '', '', '', NULL, 'repeat', '0'),
(615, 14, 0, 'mainBlogTitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:26px;', '', '', '', NULL, 'repeat', '0'),
(616, 11, 0, 'widthLarger', 0, '', '', 0, '', '400', '', '', 0, 'margin: 0 30px;', '', '', '', NULL, 'repeat', '0'),
(617, 11, 0, 'reviewCont', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(618, 11, 0, 'homeSubtitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:36px;', '', '', '', NULL, 'repeat', '0'),
(619, 11, 0, 'homeTitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:20px;', '', '', '', NULL, 'repeat', '0'),
(620, 14, 0, 'expTitlePos', 0, '', '', 0, '', '400', '', '', 0, 'top:10px;', '', '', '', NULL, 'repeat', '0'),
(621, 11, 0, 'homeTitleSmaller', 0, '', '', 0, '', '400', '', '', 0, 'font-size:26px;', '', '', '', NULL, 'repeat', '0'),
(622, 11, 0, 'gridFooter1', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;', '', '', '', NULL, 'repeat', '0'),
(623, 11, 0, 'gridFooter2', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;', '', '', '', NULL, 'repeat', '0'),
(624, 11, 0, 'gridFooter3', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;', '', '', '', NULL, 'repeat', '0'),
(625, 11, 0, 'gridFooter4', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;', '', '', '', NULL, 'repeat', '0'),
(626, 11, 0, 'socialCont', 0, '', '', 0, '', '400', '', '', 0, 'width: 100%;padding-right: 10%;', '', '', '', NULL, 'repeat', '0'),
(627, 11, 0, 'gridAcc', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;', '', '', '', NULL, 'repeat', '0'),
(628, 11, 0, 'gridAccL', 0, '', '', 0, '', '400', '', '', 0, 'width: 100%;padding-right:0;\r\nfloat: none;', '', '', '', NULL, 'repeat', '0'),
(629, 11, 0, 'gridAccR', 0, '', '', 0, '', '400', '', '', 0, 'width: 70%;\r\nfloat: none;\r\nmargin: 50px auto;', '', '', '', NULL, 'repeat', '0'),
(630, 11, 0, 'gridExplore', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;', '', '', '', NULL, 'repeat', '0'),
(631, 11, 0, 'widthLarge', 0, '', '', 0, '', '400', '', '', 0, 'padding:0 20px;', '', '', '', NULL, 'repeat', '0'),
(632, 11, 0, 'homeTitlesCont', 0, '', '', 0, '', '400', '', '', 0, '', '', 'width: 100px;', '', NULL, 'repeat', '0'),
(633, 16, 0, 'homeDescription', 0, '', '', 0, '', '400', '', '', 0, 'padding-top: 20px;', '', '', '', NULL, 'repeat', '0'),
(634, 16, 0, 'restTitlesPos', 0, '', '', 0, '', '400', '', '', 0, 'top: -30px;', '', '', '', NULL, 'repeat', '0'),
(635, 16, 0, 'expTitlePos', 0, '', '', 0, '', '400', '', '', 0, 'top:-30px;', '', '', '', NULL, 'repeat', '0'),
(636, 16, 0, 'gridAcc', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(637, 16, 0, 'gridExplore', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(638, 16, 0, 'top100', 0, '', '', 0, '', '400', '', '', 0, 'padding-top:70px;', '', '', '', NULL, 'repeat', '0'),
(639, 10, 0, 'gridWelcomeL', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(640, 10, 0, 'gridWelcomeR', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(641, 10, 0, 'widthLarger', 0, '', '', 0, '', '400', '', '', 0, 'margin:0;', '', '', '', NULL, 'repeat', '0'),
(642, 10, 0, 'homeGridTitlesL', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;float:none;', '', '', '', NULL, 'repeat', '0'),
(643, 10, 0, 'homeGridTitlesR', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;float:none;margin-top:10px;', '', '', '', NULL, 'repeat', '0'),
(644, 10, 0, 'marginLR', 0, '', '', 0, '', '400', '', '', 0, 'margin:0 20px;', '', '', '', NULL, 'repeat', '0'),
(645, 10, 0, 'accSubtitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:14px;', '', '', '', NULL, 'repeat', '0'),
(646, 10, 0, 'accTitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:20px;', '', '', '', NULL, 'repeat', '0'),
(647, 10, 0, 'customPager', 0, '', '', 0, '', '400', '', '', 0, 'padding-bottom:30px;}\r\n.customPager .bx-wrapper{padding-bottom:20px;', '', '', '', NULL, 'repeat', '0'),
(648, 10, 0, 'restTitlesPos', 0, '', '', 0, '', '400', '', '', 0, 'position:static;width:100%;', '', '', '', NULL, 'repeat', '0'),
(649, 10, 0, 'restGridL', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;padding-top:20px;', '', '', '', NULL, 'repeat', '0'),
(650, 10, 0, 'restGridR', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;padding-top:20px;', '', '', '', NULL, 'repeat', '0'),
(651, 10, 0, 'expTitlePos', 0, '', '', 0, '', '400', '', '', 0, 'position:static;width:100%;', '', '', '', NULL, 'repeat', '0'),
(652, 10, 0, 'expGridL', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;padding-top:20px;float:none;', '', '', '', NULL, 'repeat', '0'),
(653, 10, 0, 'expGridR', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;padding-top:20px;float:none;', '', '', '', NULL, 'repeat', '0'),
(654, 10, 0, 'homeSubtitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:32px;', '', '', '', NULL, 'repeat', '0'),
(655, 10, 0, 'temp2Img1', 0, '', '', 0, '', '400', '', '', 0, 'width: 49%;\r\npadding-bottom: 10px;', '', '', '', NULL, 'repeat', '0'),
(656, 10, 0, 'temp2Col2', 0, '', '', 0, '', '400', '', '', 0, 'width: 51%;padding: 0 0 10px 10px;', '', '', '', NULL, 'repeat', '0'),
(657, 10, 0, 'temp2Img4', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(658, 10, 0, 'temp2Img3', 0, '', '', 0, '', '400', '', '', 0, 'padding-top: 10px;', '', '', '', NULL, 'repeat', '0'),
(659, 10, 0, 'homeInstaGridL', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(660, 10, 0, 'homeInstaGridR', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;padding-top:20px;', '', '', '', NULL, 'repeat', '0'),
(661, 10, 0, 'gridGallery', 0, '', '', 0, '', '400', '', '', 0, 'width:50%;', '', '', '', NULL, 'repeat', '0'),
(662, 10, 0, 'instagramDesc', 0, '', '', 0, '', '400', '', '', 0, 'line-height:20px;', '', '', '', NULL, 'repeat', '0'),
(663, 10, 0, 'instagramTitle', 0, '', '', 0, '', '400', '', '', 0, 'display:none;', '', '', '', NULL, 'repeat', '0'),
(664, 10, 0, 'locationGridL', 0, '', '', 0, '', '400', '', '', 0, 'display:none;', '', '', '', NULL, 'repeat', '0'),
(665, 10, 0, 'locationGridR', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(666, 10, 0, 'accTextMargin', 0, '', '', 0, '', '400', '', '', 0, 'margin-left:0;', '', '', '', NULL, 'repeat', '0'),
(667, 10, 0, 'accInfoItem', 0, '', '', 0, '', '400', '', '', 0, 'width: 49%;margin: 10px 0;', '', '', '', NULL, 'repeat', '0'),
(668, 10, 0, 'gridAccR', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(669, 10, 0, 'restImagesCont', 0, '', '', 0, '', '400', '', '', 0, '', '', '', 'height:150px;', NULL, 'repeat', '0'),
(670, 10, 0, 'accGalleryCont', 0, '', '', 0, '', '400', '', '', 0, '', '', 'width: 70%;right: -20px;', '', NULL, 'repeat', '0'),
(671, 1, 0, 'customPager a.active', 0, '', '', 0, '', '400', '', '', 0, 'background:[$BG4] !important;', '', '', '', NULL, 'repeat', '0'),
(672, 1, 0, 'imageAreaGal3', 0, '', '', 0, '', '400', '', '', 0, 'position: relative;\r\npadding-bottom: 72.7%;\r\nbackground-position: 50%;', '', '', '', '', 'repeat', '0'),
(673, 1, 0, 'accSize', 0, '14', '676767', 2, '', '400', '', '', 0, 'padding-left:30px;background-position:0 100%;display:inline-block;margin:0 0 0 auto;text-align:right;', '', '', '', '673_R7014.png', 'no-repeat', '0'),
(674, 1, 0, 'temp1ImgRCont:first-child', 0, '', '', 0, '', '400', '', '', 0, 'padding-right: .5%;padding-left:0;', '', '', '', NULL, 'repeat', '0'),
(675, 1, 0, 'image1_365', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(676, 1, 0, 'textEditor_365', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(677, 1, 0, 'footerInfoText', 0, '12', '676767', 2, '', '400', '', '', 0, 'display:block;', '', '', '', '', 'repeat', '0'),
(678, 10, 0, 'logoPaddMenu', 0, '', '', 0, '', '400', '', '', 0, 'margin-bottom: 0px;', '', '', '', NULL, 'repeat', '0'),
(679, 1, 0, 'accIntTitle', 30, '40', '676767', 2, '', '700', '', '', 0, 'letter-spacing:0.1em;', '', '', '', '', 'repeat', '0'),
(680, 14, 0, 'accIntTitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:34px;', '', '', '', '', 'repeat', '0'),
(683, 1, 0, 'textEditor_366', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(682, 10, 0, 'accIntTitle', 0, '', '', 0, '', '400', '', '', 0, 'font-size:24px;', '', '', '', '', 'repeat', '0'),
(689, 1, 0, 'image1_378', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(684, 1, 0, 'image1_376', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(685, 1, 0, 'image2_376', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(686, 1, 0, 'image2_374', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0');
INSERT INTO `styles` (`css_ID`, `css_HeaderCat`, `css_Type`, `css_Name`, `css_Font`, `css_Font_Size`, `css_Font_Color`, `css_Global_Color`, `css_Font_LineHeight`, `css_Font_Weight`, `css_Font_Style`, `css_Back_Color`, `css_Global_Back`, `css_Div`, `css_Hover`, `css_Before`, `css_After`, `css_Back_Image`, `css_Back_Repeat`, `css_Lang`) VALUES
(687, 1, 0, 'image1_386', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(688, 1, 0, 'image1_388', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(690, 1, 0, 'image2_378', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(691, 1, 0, 'textR', 0, '', '', 0, '', '400', '', '', 0, 'text-align:right;', '', '', '', NULL, 'repeat', '0'),
(692, 1, 0, 'image2_370', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(693, 1, 0, 'image3_370', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(694, 1, 0, 'textEditor_370', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(695, 1, 0, 'accInfoSize', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(696, 1, 0, 'image1_377', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(697, 1, 0, 'textEditor_376', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(698, 1, 0, 'image1_384', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(699, 1, 0, 'image1_385', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(700, 1, 0, 'image1_370', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(701, 11, 0, 'image1_370', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(702, 11, 0, 'image1_371', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(703, 14, 0, 'image1_371', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(704, 14, 0, 'image1_372', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(705, 14, 0, 'image1_370', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(706, 13, 0, 'image1_371', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(707, 13, 0, 'image1_370', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(708, 13, 0, 'textRtoC', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(709, 13, 0, 'accSize', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(710, 11, 0, 'accSize', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(711, 13, 0, 'accTitle', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(714, 17, 0, 'accSize', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(715, 17, 0, 'textRtoC', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(716, 1, 0, 'textEditor2_370', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(717, 1, 0, 'textEditor1_370', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(718, 1, 0, 'image_rat1_47', 0, '', '', 0, '', '400', '', '', 0, 'padding:0px 0px 0px 0px;margin:0px 0px 0px 0px;', '', '', '', NULL, 'repeat', '0'),
(719, 11, 0, 'image_rat1_47', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(720, 17, 0, 'image_rat1_47', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(721, 17, 0, 'image1_365', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(722, 1, 0, 'textEditor1_47', 0, '', '', 0, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(723, 1, 0, 'image2_365', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(724, 1, 0, 'textEditor1_366', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(725, 1, 0, 'textEditor1_365', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(726, 1, 0, 'image2_379', NULL, '', NULL, 0, NULL, 'normal', 'Normal', NULL, 0, NULL, NULL, NULL, NULL, NULL, 'repeat', '0'),
(727, 1, 0, 'grid35to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left; width:35%; margin:0;', '', '', '', '', 'repeat', '0'),
(728, 16, 0, 'grid35to100', 0, '', '', 0, '', '400', '', '', 0, 'float:left; width:100%; margin:0;', '', '', '', '', 'repeat', '0'),
(729, 1, 0, 'gridBlogLeftRight', 0, '', '', 0, '', '400', '', '', 0, 'float:left;width:47%;', '', '', '', NULL, 'repeat', '0'),
(730, 1, 0, 'sampleText', 0, '17', '676767', 2, '', '400', '', '', 0, 'padding:8px;width:100%;text-align:center;', '', '', '', NULL, 'repeat', '0'),
(731, 1, 0, 'bx-loading', 0, '', '', 0, '', '400', '', '', 0, 'display:none;', '', '', '', NULL, 'repeat', '0'),
(732, 1, 0, 'downloadTitle', 30, '21', '676767', 2, '', '400', '', '', 0, '', '', '', '', NULL, 'repeat', '0'),
(733, 1, 0, 'minHeight', 0, '', '', 0, '', '400', '', '', 0, 'min-height:60vh;', '', '', '', NULL, 'repeat', '0'),
(734, 16, 0, 'marginLR', 0, '', '', 0, '', '400', '', '', 0, 'margin: 0 50px;', '', '', '', NULL, 'repeat', '0'),
(735, 16, 0, 'widthLarger', 0, '', '', 0, '', '400', '', '', 0, 'margin: 0 50px;', '', '', '', NULL, 'repeat', '0'),
(736, 1, 0, 'img, img', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0'),
(737, 10, 0, 'gridExplore', 0, '', '', 0, '', '400', '', '', 0, 'width:100%;', '', '', '', NULL, 'repeat', '0');

-- --------------------------------------------------------

--
-- Table structure for table `translate`
--

DROP TABLE IF EXISTS `translate`;
CREATE TABLE IF NOT EXISTS `translate` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Lang` varchar(3) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `translate`
--

INSERT INTO `translate` (`ID`, `Lang`) VALUES
(2, 'EL'),
(3, 'EN');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Users_ID` int(7) NOT NULL AUTO_INCREMENT,
  `Users_Pas_ID` int(7) NOT NULL DEFAULT 0,
  `Users_Page_ID` int(7) DEFAULT NULL,
  `Users_Page_Section` varchar(20) NOT NULL DEFAULT 'general',
  `Users_Page_Lang` varchar(2) NOT NULL DEFAULT '',
  PRIMARY KEY (`Users_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `searchtext`
--
ALTER TABLE `searchtext` ADD FULLTEXT KEY `SText1` (`SText1`);
ALTER TABLE `searchtext` ADD FULLTEXT KEY `SText2` (`SText2`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
