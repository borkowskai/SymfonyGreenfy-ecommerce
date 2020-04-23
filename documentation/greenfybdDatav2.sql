-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 11:21 AM
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
(7, 'yellow', 'cream\r\n'),
(8, 'burgundy', 'red\r\n'),
(9, 'beige', 'cream\r\n'),
(10, 'cream', 'white\r\n'),
(11, 'Peach', 'yellow');

--
-- Dumping data for table `company_address`
--

INSERT INTO `company_address` (`id`, `company_name`, `street`, `street_number`, `appart_number`, `city`, `zipcode`, `country`, `phone`, `is_delivery`, `client_id`) VALUES
(1, 'aaa', 'aaa', 2, '1', 'bru', '1200', 'bel', '0405050505', NULL, NULL);

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
('20200422075946', '2020-04-22 08:00:06');

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`id`, `quantity`, `actual_price_excl_vat`, `actual_price_vat`, `order_number_id`, `flower_id`) VALUES
(37, 2, '4.97', NULL, NULL, 21),
(38, 3, '4.40', NULL, NULL, 11),
(39, 2, '4.97', NULL, NULL, 21),
(40, 3, '4.40', NULL, NULL, 11),
(41, 5, '4.40', NULL, NULL, 11),
(42, 5, '4.15', NULL, NULL, 10),
(43, 1, '3.70', NULL, NULL, 12),
(44, 5, '4.40', NULL, NULL, 11),
(45, 5, '4.15', NULL, NULL, 10),
(46, 1, '3.70', NULL, NULL, 12),
(47, 9, '4.40', '5.32', NULL, 11),
(48, 5, '4.15', '5.02', NULL, 10),
(49, 1, '3.70', '4.48', NULL, 12),
(50, 4, '4.40', '5.32', NULL, 11),
(51, 1, '3.40', '4.11', NULL, 13),
(52, 4, '4.40', '5.32', NULL, 11),
(53, 1, '3.40', '4.11', NULL, 13),
(54, 4, '4.40', '5.32', NULL, 11),
(55, 1, '3.40', '4.11', NULL, 13);

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `roles`, `password`, `first_name`, `last_name`) VALUES
(1, 'iza@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$a3ZDU0xQVGhGdTdlY1ozbQ$hVmS6HQysIi8geoIkUDwJbRcy36FVZcsj/f+kFZ69oU', 'iza', 'test'),
(2, 'diego@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$M3MxQVZYbmhzaEMyZ3BVdw$FNplx+OG1+CwiQXdd6V+eAg11ckPcO2A+yXrb4g9p+g', 'diego', 'test'),
(3, 'leal@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$bkJJLjJCQ1h2dnI1MjMyWg$MVfpa0bTkrVxvJVNE05FeE8l6b9VVcxBj5n6OdZ+0m8', 'leal', 'test'),
(4, 'ab@g.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$blZlOVJoNU96ZWZPcmN5Tw$cAJ5/z61b30QVyNRI/0XpwYV4iI3QT/uweKA8fi5OD8', 'af', 'bv'),
(5, 'abc@g.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$aDVCNW5GMzlZRjVubWguSw$2ga0vW6M8/RNk9TFkmB1v62J77hK1uQqlrDXpIPiwqA', 'aaa', 'vvv'),
(6, 'a@g.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$ZXZSLjNzUW5nQlBPY0VhNA$FIxPwHY0KqDbWWYtVqCAnjd375x+pdSvntE866a19GY', 'a', 'aa'),
(7, 'aaaa@g.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$ZzlaUm5CejJ1aGJLTG9hZg$P5+ewQus61zXuJDccieafQ2yGHdLz7rZm8i3iglGuCA', 'a', 'aa'),
(8, 'abcd@g.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$ZUpHRWgxZ2hFVW53SjNXTA$NjvqP5/SrIiL/kp1aA2rvGGARseJ/OCxh41bTfF85co', 'a', 'b'),
(9, 'abcg@g.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$dnFDV0V0ZnM0VWRzbzhxWg$LIFa6NG4pSUXg7pxlOelaO5knM2S90/yaqswTSIMEas', 'a', 'b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
