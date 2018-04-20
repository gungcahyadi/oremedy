-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 04:29 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btc`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `conten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_conten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `more_config` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `admin_config` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id',
  `equal_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`,`price`, `thumb_image`, `short_description`, `conten`, `additional_conten`, `meta_title`, `meta_keyword`, `meta_description`, `position`, `published`, `link`, `slug`, `parent_id`, `longitude`, `latitude`, `more_config`, `admin_config`, `lang`, `equal_id`, `created_at`, `updated_at`) VALUES
(1, 'Halaman Utama','', '', '', 'Halaman Utama', '', '', '', '', 'menu-utama', '1', '/', '', 0, '', '', '1', '1', 'id', 'ART5991336377b8d0.05748990', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(2, 'Home','', '', '', 'Home', '', '', '', '', 'menu-utama', '1', '/', '', 0, '', '', '1', '1', 'en', 'ART5991336377b8d0.05748990', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(3, 'Tentang Kami','', 'about-us.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante.</p>', '', 'Tentang Kami', 'Tentang Kami', 'Tentang Kami', 'menu-utama', '1', 'tentang-kami', '', 0, '', '', '0', '1', 'id', 'ART59913363a5c409.67018513', '2017-08-14 05:21:39', '2017-08-15 00:42:49'),
(4, 'About Us','', 'about-us.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante.', '', '', '', '', 'menu-utama', '1', 'about-us', '', 0, '', '', '0', '1', 'en', 'ART59913363a5c409.67018513', '2017-08-14 05:21:39', '2017-08-15 00:42:49'),
(7, 'Program','', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '', '', '', '', 'menu-utama', '1', 'program', '', 0, '', '', '1', '1', 'id', 'ART59913363c40f63.59504149', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(8, 'Program','', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '', '', '', '', 'menu-utama', '1', 'program', '', 0, '', '', '1', '1', 'en', 'ART59913363c40f63.59504149', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(9, 'Room Division','', '', '<p class="pricing_sentence">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis.</p>\n                            <ul class="pricing_list">\n                                <li>Support forum</li>\n                                <li>Free hosting</li>\n                                <li>40MB of storage space</li>\n                                <li>Social media integration</li>\n                                <li>1GB of storage space</li>\n                            </ul>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis. Etiam pulvinar dictum nisi, at porta sapien euismod non. Aenean sodales augue pharetra leo congue tristique. Etiam ultricies nibh lorem, vitae tempus est efficitur eu. Praesent nisl augue, auctor eget posuere eget, pellentesque vitae lectus. Praesent aliquet molestie lorem, vitae condimentum sapien iaculis sit amet. Aliquam sit amet dui non urna pulvinar hendrerit a a lorem. Ut mollis erat id erat convallis consectetur. Duis quam est, ultricies id faucibus viverra, faucibus quis libero. Ut lacinia viverra sapien et bibendum. Cras id quam tellus. Ut tristique eleifend eros id vulputate. Suspendisse sollicitudin lorem in ante vehicula fermentum. Sed justo nisi, sodales eleifend leo ut, finibus hendrerit purus. Sed egestas ex vel feugiat mollis. Fusce condimentum ipsum ut sem aliquam lacinia.', '', '', '', '', 'program', '1', 'program', 'room-division', 7, '', '', '0', '0', 'id', 'ART59913363cee0c9.09124496', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(10, 'Room Division','', '', '<p class="pricing_sentence">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis.</p>\n                            <ul class="pricing_list">\n                                <li>Support forum</li>\n                                <li>Free hosting</li>\n                                <li>40MB of storage space</li>\n                                <li>Social media integration</li>\n                                <li>1GB of storage space</li>\n                            </ul>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis. Etiam pulvinar dictum nisi, at porta sapien euismod non. Aenean sodales augue pharetra leo congue tristique. Etiam ultricies nibh lorem, vitae tempus est efficitur eu. Praesent nisl augue, auctor eget posuere eget, pellentesque vitae lectus. Praesent aliquet molestie lorem, vitae condimentum sapien iaculis sit amet. Aliquam sit amet dui non urna pulvinar hendrerit a a lorem. Ut mollis erat id erat convallis consectetur. Duis quam est, ultricies id faucibus viverra, faucibus quis libero. Ut lacinia viverra sapien et bibendum. Cras id quam tellus. Ut tristique eleifend eros id vulputate. Suspendisse sollicitudin lorem in ante vehicula fermentum. Sed justo nisi, sodales eleifend leo ut, finibus hendrerit purus. Sed egestas ex vel feugiat mollis. Fusce condimentum ipsum ut sem aliquam lacinia.', '', '', '', '', 'program', '1', 'program', 'room-division', 8, '', '', '0', '0', 'en', 'ART59913363cee0c9.09124496', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(11, 'Food and Bartender Division','', '', '<p class="pricing_sentence">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis.</p>\n                            <ul class="pricing_list">\n                                <li>Unlimited calls</li>\n                                <li>Free hosting</li>\n                                <li>10 hours of support</li>\n                                <li>Social media integration</li>\n                                <li>1GB of storage space</li>\n                            </ul>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis. Etiam pulvinar dictum nisi, at porta sapien euismod non. Aenean sodales augue pharetra leo congue tristique. Etiam ultricies nibh lorem, vitae tempus est efficitur eu. Praesent nisl augue, auctor eget posuere eget, pellentesque vitae lectus. Praesent aliquet molestie lorem, vitae condimentum sapien iaculis sit amet. Aliquam sit amet dui non urna pulvinar hendrerit a a lorem. Ut mollis erat id erat convallis consectetur. Duis quam est, ultricies id faucibus viverra, faucibus quis libero. Ut lacinia viverra sapien et bibendum. Cras id quam tellus. Ut tristique eleifend eros id vulputate. Suspendisse sollicitudin lorem in ante vehicula fermentum. Sed justo nisi, sodales eleifend leo ut, finibus hendrerit purus. Sed egestas ex vel feugiat mollis. Fusce condimentum ipsum ut sem aliquam lacinia.', '', '', '', '', 'program', '1', 'program', 'food-and-bartender-division', 7, '', '', '0', '0', 'id', 'ART5991336408aa31.11858726', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(12, 'Food and Bartender Division','', '', '<p class="pricing_sentence">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis.</p>\n                            <ul class="pricing_list">\n                                <li>Unlimited calls</li>\n                                <li>Free hosting</li>\n                                <li>10 hours of support</li>\n                                <li>Social media integration</li>\n                                <li>1GB of storage space</li>\n                            </ul>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales euismod justo, non elementum risus rutrum quis. Etiam pulvinar dictum nisi, at porta sapien euismod non. Aenean sodales augue pharetra leo congue tristique. Etiam ultricies nibh lorem, vitae tempus est efficitur eu. Praesent nisl augue, auctor eget posuere eget, pellentesque vitae lectus. Praesent aliquet molestie lorem, vitae condimentum sapien iaculis sit amet. Aliquam sit amet dui non urna pulvinar hendrerit a a lorem. Ut mollis erat id erat convallis consectetur. Duis quam est, ultricies id faucibus viverra, faucibus quis libero. Ut lacinia viverra sapien et bibendum. Cras id quam tellus. Ut tristique eleifend eros id vulputate. Suspendisse sollicitudin lorem in ante vehicula fermentum. Sed justo nisi, sodales eleifend leo ut, finibus hendrerit purus. Sed egestas ex vel feugiat mollis. Fusce condimentum ipsum ut sem aliquam lacinia.', '', '', '', '', 'program', '1', 'program', 'food-and-bartender-division', 8, '', '', '0', '0', 'en', 'ART5991336408aa31.11858726', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(13, 'Fasilitas','', '', '', 'Fasilitas', '', '', '', '', 'menu-utama', '1', 'fasilitas', '', 0, '', '', '1', '1', 'id', 'ART59913364163828.77315677', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(14, 'Facilities','', '', '', 'Facilities', '', '', '', '', 'menu-utama', '1', 'facilities', '', 0, '', '', '1', '1', 'en', 'ART59913364163828.77315677', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(15, 'Fasilitas 1','', 'courses1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'fasilitas', 'fasilitas-1', 13, '', '', '0', '0', 'id', 'ART59913364210e95.94720542', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(16, 'Facilities 1','', 'courses1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'facilities', 'facilities-1', 14, '', '', '0', '0', 'en', 'ART59913364210e95.94720542', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(17, 'Fasilitas 2','', 'courses2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'fasilitas', 'fasilitas-2', 13, '', '', '0', '0', 'id', 'ART599133643e7ed0.21068834', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(18, 'Facilities 2','', 'courses2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'facilities', 'facilities-2', 14, '', '', '0', '0', 'en', 'ART599133643e7ed0.21068834', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(19, 'Fasilitas 3','', 'courses3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'fasilitas', 'fasilitas-3', 13, '', '', '0', '0', 'id', 'ART599133644c0e39.10962437', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(20, 'Facilities 3','', 'courses3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'facilities', 'facilities-3', 14, '', '', '0', '0', 'en', 'ART599133644c0e39.10962437', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(21, 'Fasilitas 4','', 'courses4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'fasilitas', 'fasilitas-4', 13, '', '', '0', '0', 'id', 'ART599133645c4e86.40735103', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(22, 'Facilities 4','', 'courses4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'facilities', 'facilities-4', 14, '', '', '0', '0', 'en', 'ART599133645c4e86.40735103', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(23, 'Fasilitas 5','', 'courses5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'fasilitas', 'fasilitas-5', 13, '', '', '0', '0', 'id', 'ART599133646737f2.83201735', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(24, 'Facilities 5','', 'courses5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'facilities', 'facilities-5', 14, '', '', '0', '0', 'en', 'ART599133646737f2.83201735', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(25, 'Fasilitas 6','', 'courses6.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'fasilitas', 'fasilitas-6', 13, '', '', '0', '0', 'id', 'ART599133647d4799.19467617', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(26, 'Facilities 6','', 'courses6.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa. Aliquam ultricies tincidunt felis sed consequat. Praesent vitae eros sit amet lorem volutpat volutpat. Nunc quis ipsum vulputate mauris commodo auctor a id sem. Morbi suscipit libero augue, sed pharetra turpis posuere sed. Donec elementum tincidunt augue, sed tincidunt nulla fringilla sit amet. Donec vitae aliquet felis, quis cursus ligula. Sed euismod tincidunt tempus. Morbi eget lectus at ipsum pretium pretium. Duis lobortis, dolor id iaculis interdum, leo leo eleifend nisl, tempus semper erat nibh non nisi. Sed elit mi, fermentum nec commodo ac, viverra ut ante', '', '', '', '', 'fasilitas', '1', 'facilities', 'facilities-6', 14, '', '', '0', '0', 'en', 'ART599133647d4799.19467617', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(27, 'Aktivitas','', '', '', 'Aktivitas', '', '', '', '', 'menu-utama', '1', 'aktivitas', '', 0, '', '', '1', '1', 'id', 'ART599133648ad5c5.25299602', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(28, 'Activities','', '', '', 'Activities', '', '', '', '', 'menu-utama', '1', 'activities', '', 0, '', '', '1', '1', 'en', 'ART599133648ad5c5.25299602', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(29, 'Hubungi Kami','', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', '', '', '', '', 'menu-utama', '1', 'hubungi-kami', '', 0, '115.2282392', '-8.6403911', '1', '1', 'id', 'ART59913365d8a160.06196221', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(30, 'Contact Us','', '', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', '', '', '', '', 'menu-utama', '1', 'contact-us', '', 0, '115.2282392', '-8.6403911', '1', '1', 'en', 'ART59913365d8a160.06196221', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(31, 'Kantor Utama','', '', '', '<p>Jln. Ratna 68 H, Denpasar, Bali</p>', '', '', '', '', 'page', '1', '', 'kantor-utama', 29, '', '', '0', '0', 'id', 'ART59913365e37c05.03105549', '2017-08-14 05:21:41', '2017-08-15 01:12:32'),
(32, 'Head Office','', '', '', '<p>Jln. Ratna 68 H, Denpasar, Bali</p>', '', '', '', '', 'page', '1', '', 'head-office', 30, '', '', '0', '0', 'en', 'ART59913365e37c05.03105549', '2017-08-14 05:21:41', '2017-08-15 01:13:00'),
(33, 'Hubungi Kami','', '', '', '<p>+6236123456</p>', '', '', '', '', 'page', '1', '', 'hubungi-kami', 29, '', '', '0', '0', 'id', 'ART59913365ee4b19.27101367', '2017-08-14 05:21:41', '2017-08-15 01:12:32'),
(34, 'Call Us', '','', '', '<p>+6236123456</p>', '', '', '', '', 'page', '1', '', 'call-us', 30, '', '', '0', '0', 'en', 'ART59913365ee4b19.27101367', '2017-08-14 05:21:41', '2017-08-15 01:13:00'),
(35, 'Email Kami','', '', '', '<p>info@domain.com<br />\r\nsupport@domain.com</p>', '', '', '', '', 'page', '1', '', 'email-kami', 29, '', '', '0', '0', 'id', 'ART5991336604e480.04097307', '2017-08-14 05:21:42', '2017-08-15 01:12:32'),
(36, 'Email Us','', '', '', '<p>info@domain.com<br />\r\nsupport@domain.com</p>', '', '', '', '', 'page', '1', '', 'email-us', 30, '', '', '0', '0', 'en', 'ART5991336604e480.04097307', '2017-08-14 05:21:42', '2017-08-15 01:13:00'),
(37, 'Tentang Kami','', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', '', '', '', '', 'footer-about', '1', '', '', 0, '', '', '0', '0', 'id', 'ART599133660fd729.45627513', '2017-08-14 05:21:42', '2017-08-14 05:21:42'),
(38, 'About Us','', '', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia fermentum nisl, vel pharetra eros. Vestibulum eu orci in enim tincidunt tempus eget in massa.', '', '', '', '', 'footer-about', '1', '', '', 0, '', '', '0', '0', 'en', 'ART599133660fd729.45627513', '2017-08-14 05:21:42', '2017-08-14 05:21:42'),
(39, 'Hubungi Kami','', '', '', '<p class=" address"><i class="icon-map-pin"></i>198 West 21th Street Victoria 8007, Australia</p>\n                <p class=" address"><i class="icon-phone"></i>(654) 332-112-222</p>\n                <p class=" address"><i class="icon-mail"></i><a href="mailto:Edua@info.com">Edua@info.com</a></p>', '', '', '', '', 'footer-hubungikami', '1', '', '', 0, '', '', '0', '0', 'id', 'ART59913366200972.30369671', '2017-08-14 05:21:42', '2017-08-14 05:21:42'),
(40, 'Contact Us','', '', '', '<p class=" address"><i class="icon-map-pin"></i>198 West 21th Street Victoria 8007, Australia</p>\n                <p class=" address"><i class="icon-phone"></i>(654) 332-112-222</p>\n                <p class=" address"><i class="icon-mail"></i><a href="mailto:Edua@info.com">Edua@info.com</a></p>', '', '', '', '', 'footer-hubungikami', '1', '', '', 0, '', '', '0', '0', 'en', 'ART59913366200972.30369671', '2017-08-14 05:21:42', '2017-08-14 05:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id',
  `equal_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `type`, `slug`, `lang`, `equal_id`, `created_at`, `updated_at`) VALUES
(1, 'Wajah', 'produk', 'wajah', 'id', 'CAT5991336495a378.10283380', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(2, 'Face', 'produk', 'face', 'en', 'CAT5991336495a378.10283380', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(3, 'Tubuh', 'produk', 'tubuh', 'id', 'CAT59913364a07e85.37557265', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(4, 'Body', 'produk', 'body', 'en', 'CAT59913364a07e85.37557265', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(5, 'Rambut', 'produk', 'rambut', 'id', 'CAT59913364c0a204.65710785', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(6, 'Hair', 'produk', 'hair', 'en', 'CAT59913364c0a204.65710785', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(7, 'Tea', 'produk', 'tea', 'id', 'CAT59913364e15ef7.49886361', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(8, 'Tea', 'produk', 'tea', 'en', 'CAT59913364e15ef7.49886361', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(9, 'Minyak esensial','produk', 'minyak-esensial', 'id', 'CAT59913364ec35d5.84932866', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(10, 'Esensial Oil','produk', 'esensial-oil', 'en', 'CAT59913364ec35d5.84932866', '2017-08-14 05:21:40', '2017-08-14 05:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting-confirmation',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mariasa Gst2', 'gstmariasa2@gmail.com', '081234566789', 'Test', 'TEst contact', 'confirmed', '2017-08-15 09:40:06', '2017-08-15 09:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `name`, `email`, `receipt`, `created_at`, `updated_at`) VALUES
(1, 'Mariasa Gusti', 'gstmariasa@gmail.com', '1', '2017-08-14 05:21:39', '2017-08-14 10:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `with_link` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_conten` text COLLATE utf8mb4_unicode_ci,
  `article_id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'id',
  `equal_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image`, `link`, `with_link`, `type`, `slider_conten`, `article_id`, `lang`, `equal_id`, `created_at`, `updated_at`) VALUES
(1, 'Home Slider 1', 'text-rotator.jpg', '', '0', 'home-slider', '<h1>Best Online Learning</h1>\n                            <p>Your chance to be a trending expert in IT industries and make a successful <br/> career after completion of our courses.</p>\n                            <a href="#." class="btn_common white_border">our services</a>\n                            <a href="#." class="btn_common red">Get a quote</a>', 0, 'id', 'IMG59913363854660.60013233', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(2, 'Home Slider 1', 'text-rotator.jpg', '', '0', 'home-slider', '<h1>Best Online Learning</h1>\n                            <p>Your chance to be a trending expert in IT industries and make a successful <br/> career after completion of our courses.</p>\n                            <a href="#." class="border_radius btn_common white_border">our services</a>\n                            <a href="#." class="border_radius btn_common red">Get a quote</a>', 0, 'en', 'IMG59913363854660.60013233', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(3, 'Home Slider 2', 'text-rotator.jpg', '', '0', 'home-slider', '', 0, 'id', 'IMG599133639ad0c6.28244362', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(4, 'Home Slider 2', 'text-rotator.jpg', '', '0', 'home-slider', '', 0, 'en', 'IMG599133639ad0c6.28244362', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(5, 'Header Image Program 1_1', 'event-detail.jpg', '', '0', 'page-header', NULL, 9, 'id', 'IMG59913363e48e77.86912196', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(6, 'Header Image Program 1_1', 'event-detail.jpg', '', '0', 'page-header', NULL, 10, 'en', 'IMG59913363e48e77.86912196', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(7, 'Header Image Program 1_2', 'event-detail.jpg', '', '0', 'page-header', NULL, 9, 'id', 'IMG59913363ef63a9.28771938', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(8, 'Header Image Program 1_2', 'event-detail.jpg', '', '0', 'page-header', NULL, 10, 'en', 'IMG59913363ef63a9.28771938', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(9, 'Header Image Fasilitas 1_2', 'event-detail.jpg', '', '0', 'page-header', NULL, 15, 'id', 'IMG5991336430d913.24716948', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(10, 'Header Image Fasilitas 1_2', 'event-detail.jpg', '', '0', 'page-header', NULL, 16, 'en', 'IMG5991336430d913.24716948', '2017-08-14 05:21:40', '2017-08-14 05:21:40'),
(11, 'Aktivitas 1', 'gallery1.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG5991336505a005.91938517', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(12, 'Activities 1', 'gallery1.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG5991336505a005.91938517', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(13, 'Aktivitas 2', 'gallery2.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG59913365107504.78535753', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(14, 'Activities 2', 'gallery2.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG59913365107504.78535753', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(15, 'Aktivitas 3', 'gallery3.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG599133651b4be2.37783954', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(16, 'Activities 3', 'gallery3.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG599133651b4be2.37783954', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(17, 'Aktivitas 4', 'gallery4.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG59913365261c62.14622462', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(18, 'Activities 4', 'gallery4.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG59913365261c62.14622462', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(19, 'Aktivitas 5', 'gallery5.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG5991336530f285.51970213', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(20, 'Activities 5', 'gallery5.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG5991336530f285.51970213', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(21, 'Aktivitas 6', 'gallery6.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG599133653bc960.99516395', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(22, 'Activities 6', 'gallery6.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG599133653bc960.99516395', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(23, 'Aktivitas 7', 'gallery7.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG59913365467f58.72420383', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(24, 'Activities 7', 'gallery7.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG59913365467f58.72420383', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(25, 'Aktivitas 8', 'gallery8.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG59913365512e18.53690132', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(26, 'Activities 8', 'gallery8.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG59913365512e18.53690132', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(27, 'Aktivitas 9', 'gallery9.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG599133655c0552.83401835', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(28, 'Activities 9', 'gallery9.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG599133655c0552.83401835', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(29, 'Aktivitas 10', 'gallery10.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG5991336566dde1.15208930', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(30, 'Activities 10', 'gallery10.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG5991336566dde1.15208930', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(31, 'Aktivitas 11', 'gallery11.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG59913365746751.34938083', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(32, 'Activities 11', 'gallery11.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG59913365746751.34938083', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(33, 'Aktivitas 12', 'gallery12.jpg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG599133657f3f75.62635370', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(34, 'Activities 12', 'gallery12.jpg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG599133657f3f75.62635370', '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(42, 'Test Aktivitas', 'test-aktivitas-at-bali-tourism-college-cs8.jpeg', '', '0', 'aktivitas', NULL, 27, 'id', 'IMG5992a25cc5cf55.77615235', '2017-08-15 07:27:24', '2017-08-15 07:27:24'),
(43, 'Test Activity', 'test-aktivitas-at-bali-tourism-college-cs8.jpeg', '', '0', 'aktivitas', NULL, 28, 'en', 'IMG5992a25cc5cf55.77615235', '2017-08-15 07:27:25', '2017-08-15 07:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `images_category`
--

CREATE TABLE `images_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images_category`
--

INSERT INTO `images_category` (`id`, `image_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(2, 13, 1, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(3, 17, 1, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(4, 13, 3, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(5, 17, 3, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(6, 31, 3, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(7, 21, 5, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(8, 19, 5, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(9, 23, 5, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(10, 29, 5, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(11, 21, 7, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(12, 25, 7, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(13, 29, 7, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(14, 31, 7, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(15, 15, 9, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(16, 27, 9, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(17, 33, 9, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(18, 12, 2, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(19, 14, 2, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(20, 18, 2, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(21, 14, 4, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(22, 18, 4, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(23, 32, 4, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(24, 22, 6, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(25, 20, 6, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(26, 24, 6, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(27, 30, 6, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(28, 22, 8, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(29, 26, 8, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(30, 30, 8, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(31, 32, 8, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(32, 16, 10, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(33, 28, 10, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(34, 34, 10, '2017-08-14 05:21:41', '2017-08-14 05:21:41'),
(35, 37, 5, '2017-08-15 06:46:27', '2017-08-15 06:46:27'),
(36, 37, 7, '2017-08-15 06:46:27', '2017-08-15 06:46:27'),
(49, 42, 1, '2017-08-15 07:27:24', '2017-08-15 07:27:24'),
(50, 42, 3, '2017-08-15 07:27:24', '2017-08-15 07:27:24'),
(51, 43, 2, '2017-08-15 07:27:25', '2017-08-15 07:27:25'),
(52, 43, 4, '2017-08-15 07:27:25', '2017-08-15 07:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_03_133027_create_table_category', 1),
(4, '2017_08_03_133046_create_table_article', 1),
(5, '2017_08_03_133101_create_table_sociallinks', 1),
(6, '2017_08_03_133114_create_table_images', 1),
(7, '2017_08_03_133133_create_table_article_category', 1),
(8, '2017_08_03_133159_create_table_contact_message', 1),
(9, '2017_08_03_133215_create_table_emails', 1),
(10, '2017_08_03_133227_create_table_config', 1),
(11, '2017_08_14_085024_images_category', 1),
(12, '2017_08_14_125920_create_table_pendaftaran', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_asal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt_rw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_denpasar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_kelulusan` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_nilai_un` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_mapel_un` int(11) NOT NULL,
  `jumlah_nilai_sttb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_mapel` int(11) NOT NULL,
  `nama_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_ortu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_btc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting-confirmation',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jk`, `agama`, `alamat_asal`, `rt_rw`, `no_tlp`, `alamat_denpasar`, `asal_sekolah`, `tahun_kelulusan`, `nisn`, `jurusan`, `alamat_sekolah`, `jumlah_nilai_un`, `jumlah_mapel_un`, `jumlah_nilai_sttb`, `jumlah_mapel`, `nama_ortu`, `alamat_ortu`, `no_tlp_ortu`, `pekerjaan_ortu`, `penghasilan_ortu`, `info_btc`, `file_photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mariasa Test', 'Singaraja', '1994-05-29', 'L', 'hindu', 'Jln. test123', '123', '08123456', 'Jln. ratna', 'SMKN 3 Singaraja', '2012', '1234567890', 'lain-lain', 'Singaraja', '80', 7, '80', 9, 'Mariasa Parent', 'Singaraja', '0812345678', 'lain-lain', '1.5jt-3jt', ' Sekolah, Surat Kabar, Radio, Brosur, Teman/Saudara, Media Sosial', 'mariasa-test-20170814.jpeg', 'confirmed', '2017-08-14 09:49:40', '2017-08-15 09:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE `sociallinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `platform`, `link`, `published`, `created_at`, `updated_at`) VALUES
(1, 'twitter', 'https://twitter.com', '1', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(2, 'facebook', 'https://facebook.com', '1', '2017-08-14 05:21:39', '2017-08-14 05:21:39'),
(3, 'instagram', 'https://instagram.com', '1', '2017-08-14 05:21:39', '2017-08-14 05:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_admin` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `full_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$zWNLVStetOEWMp6qnx/0iO3vD/YI8unYZstKQPV7Odq0sDFNSO.CS', '1', NULL, '2017-08-14 05:21:39', '2017-08-14 05:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `web_config`
--

CREATE TABLE `web_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_config`
--

INSERT INTO `web_config` (`id`, `config_name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'fasilitas_pagination', '6', '2017-08-14 05:21:42', '2017-08-14 10:56:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_category`
--
ALTER TABLE `images_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sociallinks`
--
ALTER TABLE `sociallinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_config`
--
ALTER TABLE `web_config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `images_category`
--
ALTER TABLE `images_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sociallinks`
--
ALTER TABLE `sociallinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `web_config`
--
ALTER TABLE `web_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
