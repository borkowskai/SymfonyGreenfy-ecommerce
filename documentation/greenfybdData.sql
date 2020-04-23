-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 06:29 PM
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
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`id`, `quantity`, `actual_price_excl_vat`, `actual_price_vat`, `order_number_id`, `flower_id`) VALUES
(20, 1, '4.15', '5.02', NULL, 10),
(21, 1, '3.40', '4.11', NULL, 13),
(22, 1, '4.15', '5.02', NULL, 10),
(23, 1, '4.15', '5.02', NULL, 10),
(24, 1, '4.40', '5.32', NULL, 11),
(25, 1, '4.15', '5.02', NULL, 10),
(26, 1, '4.15', '5.02', NULL, 10),
(27, 1, '4.15', '5.02', NULL, 10),
(28, 1, '4.15', '5.02', NULL, 10),
(29, 1, '4.15', '5.02', NULL, 10);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
