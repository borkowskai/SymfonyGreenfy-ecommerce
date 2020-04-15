-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 08:52 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `similar_color` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 'yellow', 'cream\r\n'),
(8, 'burgundy', 'red\r\n'),
(9, 'beige', 'cream\r\n'),
(10, 'cream', 'white\r\n'),
(11, 'Peach', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `company_address`
--

CREATE TABLE `company_address` (
  `id` int(11) NOT NULL,
  `company_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_number` int(11) NOT NULL,
  `appart_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delivery` tinyint(1) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_inventory`
--

CREATE TABLE `daily_inventory` (
  `id` int(11) NOT NULL,
  `daily_level` int(11) DEFAULT NULL,
  `date_of_inventory` date DEFAULT NULL,
  `flower_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flower`
--

CREATE TABLE `flower` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_excl_vat` decimal(10,2) DEFAULT NULL,
  `price_vat` decimal(10,2) DEFAULT NULL,
  `reorder_quantity` int(11) DEFAULT NULL,
  `reorder_level` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `plant_type_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, 'Sanseveria Orchid', '291f37923325ea2149899b3845d17996.jpeg', '4.10', NULL, 10, 10, 5, 2, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya'),
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
(31, 'Muscati Orchid', 'b7cdb75a369114fc365a5d1e27686373.jpeg', '4.10', NULL, 10, 10, 9, 3, 1, 'The largest genera are Bulbophyllum (2,000 species), Epidendrum (1,500 species), Dendrobium (1,400 species) and Pleurothallis (1,000 species). It also includes Vanilla (the genus of the vanilla plant), the type genus Orchis, and many commonly cultivated plants such as Phalaenopsis and Cattleya');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('20200410135429', '2020-04-10 13:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `num_order` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `delivery_address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `actual_price_excl_vat` decimal(10,2) DEFAULT NULL,
  `actual_price_vat` decimal(10,2) DEFAULT NULL,
  `order_number_id` int(11) DEFAULT NULL,
  `flower_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`id`, `quantity`, `actual_price_excl_vat`, `actual_price_vat`, `order_number_id`, `flower_id`) VALUES
(2, 1, NULL, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL, NULL),
(4, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_limit` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plant_type`
--

CREATE TABLE `plant_type` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plant_family` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plant_type`
--

INSERT INTO `plant_type` (`id`, `name`, `plant_family`) VALUES
(1, 'orchid', 'Orchidaceae\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 'small'),
(2, 'middle'),
(3, 'bigger'),
(4, 'complet');

-- --------------------------------------------------------

--
-- Table structure for table `tva`
--

CREATE TABLE `tva` (
  `id` int(11) NOT NULL,
  `tvavalue` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tva`
--

INSERT INTO `tva` (`id`, `tvavalue`) VALUES
(1, '21.00');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `flower_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_address`
--
ALTER TABLE `company_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2D1C755619EB6921` (`client_id`);

--
-- Indexes for table `daily_inventory`
--
ALTER TABLE `daily_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3029532C2C09D409` (`flower_id`);

--
-- Indexes for table `flower`
--
ALTER TABLE `flower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A7D7C1DA7ADA1FB5` (`color_id`),
  ADD KEY `IDX_A7D7C1DA498DA827` (`size_id`),
  ADD KEY `IDX_A7D7C1DABFC546EA` (`plant_type_id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F529939819EB6921` (`client_id`),
  ADD KEY `IDX_F52993984C3A3BB` (`payment_id`),
  ADD KEY `IDX_F5299398EBF23851` (`delivery_address_id`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9CE58EE18C26A5E8` (`order_number_id`),
  ADD KEY `IDX_9CE58EE12C09D409` (`flower_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plant_type`
--
ALTER TABLE `plant_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D7D174C919EB6921` (`client_id`),
  ADD KEY `IDX_D7D174C92C09D409` (`flower_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `company_address`
--
ALTER TABLE `company_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_inventory`
--
ALTER TABLE `daily_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flower`
--
ALTER TABLE `flower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plant_type`
--
ALTER TABLE `plant_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tva`
--
ALTER TABLE `tva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_address`
--
ALTER TABLE `company_address`
  ADD CONSTRAINT `FK_2D1C755619EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `daily_inventory`
--
ALTER TABLE `daily_inventory`
  ADD CONSTRAINT `FK_3029532C2C09D409` FOREIGN KEY (`flower_id`) REFERENCES `flower` (`id`);

--
-- Constraints for table `flower`
--
ALTER TABLE `flower`
  ADD CONSTRAINT `FK_A7D7C1DA498DA827` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `FK_A7D7C1DA7ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `FK_A7D7C1DABFC546EA` FOREIGN KEY (`plant_type_id`) REFERENCES `plant_type` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F529939819EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_F52993984C3A3BB` FOREIGN KEY (`payment_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `FK_F5299398EBF23851` FOREIGN KEY (`delivery_address_id`) REFERENCES `company_address` (`id`);

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `FK_9CE58EE12C09D409` FOREIGN KEY (`flower_id`) REFERENCES `flower` (`id`),
  ADD CONSTRAINT `FK_9CE58EE18C26A5E8` FOREIGN KEY (`order_number_id`) REFERENCES `order` (`id`);

--
-- Constraints for table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `FK_D7D174C919EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_D7D174C92C09D409` FOREIGN KEY (`flower_id`) REFERENCES `flower` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
