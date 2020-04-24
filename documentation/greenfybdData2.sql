-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 09:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenfybd`
--

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `similar_color`) VALUES
(1, 'red', 'pink'),
(2, 'white', 'cream'),
(3, 'pink', 'red'),
(4, 'blue', 'purple'),
(5, 'purple', 'violet'),
(6, 'green', NULL),
(7, 'yellow', 'cream'),
(8, 'burgundy', 'red'),
(9, 'beige', 'cream'),
(10, 'cream', 'white'),
(11, 'Peach', 'yellow');

--
-- Dumping data for table `company_address`
--

INSERT INTO `company_address` (`id`, `company_name`, `street`, `street_number`, `appart_number`, `city`, `zipcode`, `country`, `phone`, `client_id`) VALUES
(1, 'aaa', 'aaa', 2, '1', 'bru', '1200', 'bel', '0405050505', NULL),
(5, 'testInsertion', 'testInsertion', 5, '4', 'testInsertion', '1244', 'testInsertion', '0909090090', NULL),
(6, 'testInsertionOrders3', 'testInsertionOrders3', 3, '3', 'testInsertionOrders3', '4343', 'testInsertionOrders3', '656565656', NULL),
(7, 'testInsertionOrders4', 'testInsertionOrders4', 5, '5', 'testInsertionOrders4', '5555', 'testInsertionOrders4', '7868686868', NULL),
(8, 'test2', 'test2', 4, 'test2', 'test2', 'test2', 'test2', 'test2', NULL),
(9, 'sasa', 'sasa', 4, '4', 'sasa', '43434', 'sasa', '767676767', NULL),
(10, 'aaaaa', 'aaaaa', 4, '4', 'freeeee', '1222', 'freee', '5656565', NULL),
(11, 'testafterremove', 'testafterremove', 6, '5', 'testafterremove', '3232', 'testafterremove', '0798989898', NULL);

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `client_id`, `delivery_customer_address_id`, `payment_type_id`, `num_order`, `date_order`) VALUES
(7, NULL, 6, 5, 'b28f941fbe3905177b00a5d032933cc4', '2020-04-23'),
(8, NULL, 7, 6, 'ee75996261abcdb20acb5a3e91aa095c', '2020-04-23'),
(9, NULL, 8, 7, '58c0c083b02849a4b94aae15dc034b59', '2020-04-23'),
(10, NULL, 9, 8, 'f7c3c04429fe113abe08336ac261c5c4', '2020-04-23'),
(11, NULL, 10, 9, '75fab0f0c0ac74e1bec8ce7d34af2144', '2020-04-23'),
(12, NULL, 11, 10, 'dd824435bbb8f61b94c4175a2f8daf7e', '2020-04-23');

--
-- Dumping data for table `flower`
--

INSERT INTO `flower` (`id`, `name`, `photo`, `price_excl_vat`, `price_vat`, `reorder_quantity`, `reorder_level`, `color_id`, `size_id`, `plant_type_id`, `description`) VALUES
(10, 'Tipton\'s Weed', 'ea9fa92cf689d2cd05a684189f02a6b7.jpeg', '4.15', NULL, 10, 10, 8, 2, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(11, 'Lady\'s Slipper Orchid', 'c872636d46ecc2d04e2bd2f46e737077.jpeg', '4.40', NULL, 10, 10, 2, 2, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(12, 'Milkweed Orchid', '97e6ed47548994e53ef18d7e10f2d8f0.jpeg', '3.70', NULL, 10, 10, 2, 2, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(13, 'Cattleya Orchid', '2e22ef3f5c88bdadc56eae7a015ca826.jpeg', '3.40', NULL, 10, 10, 11, 1, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(14, 'Mimosa Orchidea', 'aab7faa2e6c43724d65f07aef3a4fe55.jpeg', '4.40', NULL, 10, 10, 7, 1, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(15, 'Agapanthus Orchid', '64b2a354bd30381a88793fd0b778f12c.jpeg', '3.96', NULL, 10, 10, 3, 1, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(16, 'Polynesian Miracle Orchid', '4a0f8b7f6170be3814319f0c8cc7f822.jpeg', '4.70', NULL, 10, 10, 5, 2, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(17, 'Marigold Orchid', '36f327acd730c3cc5fa5476146909d5d.jpeg', '4.30', NULL, 10, 10, 7, 1, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(18, 'Sanseveria Orchid', '291f37923325ea2149899b3845d17996.jpeg', '4.10', '4.96', 10, 10, 5, 2, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(20, 'Acuarius Orchid', 'da29c32abf34d5a8be112b8eb34e96c9.jpeg', '3.80', NULL, 10, 10, 4, 1, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(21, 'Acuamarina Orchid', 'b5e02398ebc9939ebe108c3f3bc117c9.jpeg', '4.97', NULL, 10, 10, 4, 3, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(22, 'Nelly Orchid', '3cd66abfd20e1ca2d5c8c1147d4e723e.jpeg', '4.75', NULL, 10, 10, 5, 3, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(23, 'California Beach Orchid', '480b099c6c724e1fb6feff953dd865af.jpeg', '4.60', NULL, 10, 10, 9, 3, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(24, 'PepperBerry Orchid', '267ea3ed80f7f81065a8c2d3d12312dd.jpeg', '3.60', NULL, 10, 10, 2, 1, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(25, 'Reincarnation Orchid', '97e6268009a6ad1497cb558b6233aa50.jpeg', '4.15', NULL, 10, 10, 7, 2, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(26, 'Carthagena Memory', 'be4196448cc48afbb589bcb70029218c.jpeg', '4.50', NULL, 10, 10, 3, 3, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(27, 'Lily Orchid', 'cc56d5c21780a11daaa48e9a57e3d519.jpeg', '3.20', NULL, 10, 10, 7, 1, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(28, 'Daffodils Orchidea', '995bd97715e4e7aad9d49d4c69145f28.jpeg', '3.60', NULL, 10, 10, 4, 2, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(29, 'Hexagon Orchidea', '0e3a7a6b22c13b74a938b9b403b1efb1.jpeg', '3.90', NULL, 10, 10, 3, 2, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(31, 'Muscati Orchid', 'b7cdb75a369114fc365a5d1e27686373.jpeg', '4.10', '4.96', 10, 10, 9, 3, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
(35, 'Queen Elisabeth Orchid', '02ce927e354959f99281af3aa51ffdcf.jpeg', '5.10', '6.17', 10, 10, 1, 3, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya');

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200401134143', '2020-04-01 13:42:20'),
('20200404214840', '2020-04-04 21:49:01'),
('20200404222002', '2020-04-04 22:20:17'),
('20200406095025', '2020-04-06 09:50:37'),
('20200406095518', '2020-04-06 09:58:06'),
('20200407113113', '2020-04-07 11:31:36'),
('20200407113735', '2020-04-07 11:38:00'),
('20200410134938', '2020-04-10 13:50:56'),
('20200410135429', '2020-04-10 13:54:46'),
('20200422075946', '2020-04-22 08:00:06'),
('20200423092012', '2020-04-23 09:21:32'),
('20200423181118', '2020-04-23 18:13:31'),
('20200423184427', '2020-04-23 18:44:43'),
('20200423190440', '2020-04-23 19:04:54');

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`id`, `quantity`, `actual_price_excl_vat`, `actual_price_vat`, `flower_id`, `customer_order_id`) VALUES
(56, 1, '4.40', '5.32', 11, 7),
(57, 3, '3.70', '4.48', 12, 7),
(58, 1, '4.40', '5.32', 11, 8),
(59, 3, '3.70', '4.48', 12, 8),
(60, 2, '4.40', '5.32', 11, 9),
(61, 2, '3.96', '4.79', 15, 9),
(62, 1, '4.10', '4.96', 18, 9),
(63, 1, '4.40', '5.32', 11, 10),
(64, 2, '3.80', '4.60', 20, 10),
(65, 3, '5.10', '6.17', 35, 10),
(66, 2, '4.40', '5.32', 14, 10),
(67, 1, '3.96', '4.79', 15, 10),
(68, 1, '4.75', '5.75', 22, 10),
(69, 1, '4.97', '6.01', 21, 10),
(70, 2, '4.40', '5.32', 11, 11),
(71, 2, '3.70', '4.48', 12, 11),
(72, 2, '3.96', '4.79', 15, 11),
(73, 1, '4.40', '5.32', 14, 11),
(74, 1, '3.40', '4.11', 13, 11),
(75, 1, '4.70', '5.69', 16, 11),
(76, 1, '4.40', '5.32', 11, 12),
(77, 5, '4.15', '5.02', 10, 12),
(78, 1, '4.70', '5.69', 16, 12);

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `payment_type`, `payment_limit`) VALUES
(3, 'paypal', NULL),
(4, 'paypal', NULL),
(5, 'paypal', NULL),
(6, 'paypal', NULL),
(7, 'paypal', NULL),
(8, 'paypal', NULL),
(9, 'paypal', NULL),
(10, 'paypal', NULL);

--
-- Dumping data for table `plant_type`
--

INSERT INTO `plant_type` (`id`, `name`, `plant_family`) VALUES
(1, 'orchid', 'Orchidaceae\r\n');

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 'small'),
(2, 'middle'),
(3, 'bigger'),
(4, 'complet');

--
-- Dumping data for table `tva`
--

INSERT INTO `tva` (`id`, `tvavalue`) VALUES
(1, '21.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
