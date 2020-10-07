-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Okt 2020 pada 14.33
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alibaba_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(128) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_phone` varchar(128) NOT NULL,
  `customer_email` varchar(128) NOT NULL,
  `customer_address` varchar(256) NOT NULL,
  `customer_type_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modifed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_type_id`, `date_created`, `date_modifed`) VALUES
('31ec0f6e-afde-11e9-82ee-80ce623effd6', 'susanto bijaksanan', '2197312', 'asd@mail.com', '', 1, 1564170433, 0),
('534f9b70-aacc-11e9-a155-80ce623effd6', 'PT. SENTOSA ABADI JAYA', '0912312', 'asd@mail.com', 'Jl. Jababeka', 1, 1563613015, 1563630934),
('5a70fe8e-b48e-11e9-9e17-80ce623effd6', 'Pelanggan Baru', '12937198', 'purchase@mana.com', '', 1, 1564685896, 0),
('6370cf0a-afda-11e9-82ee-80ce623effd6', 'Ibrahim', '08123187', 'taufikibrahim21@gmail.com', '', 1, 1564168798, 0),
('733062da-afe7-11e9-82ee-80ce623effd6', 'aslkdjaslkdjas', '0912312', 'asd@mail.com', '', 0, 1564174407, 0),
('8169769c-afe7-11e9-82ee-80ce623effd6', 'aku', '12312', 'asd@mail.com', '', 0, 1564174431, 0),
('906c364a-afe9-11e9-82ee-80ce623effd6', 'Entong Sofiansyah', '123', 'email.nginvite@gmail.com', '', 1, 1564175316, 0),
('9b6daa7f-afe9-11e9-82ee-80ce623effd6', 'Sofiansyah', '12312', 'email.nginvite@gmail.com', '', 1, 1564175334, 0),
('9e7c075e-afdf-11e9-82ee-80ce623effd6', 'Anjar Sulaiman', '01238129', 'emai@mail.com', '', 2, 1564171044, 0),
('ecad70e0-afe6-11e9-82ee-80ce623effd6', 'Selebrasi', '', '', '', 0, 1564174182, 0),
('ef774c98-afd9-11e9-82ee-80ce623effd6', 'Haerul Muttaqin', '0182312', 'haerul@pelitabangsa.act', 'cibber', 1, 1564168603, 0),
('fa7f5347-afde-11e9-82ee-80ce623effd6', 'entoiing', '12312', '123@mail.com', '', 1, 1564170769, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_type`
--

CREATE TABLE `customer_type` (
  `cust_type_id` int(11) NOT NULL,
  `cust_type_name` varchar(128) NOT NULL,
  `cust_type_note` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer_type`
--

INSERT INTO `customer_type` (`cust_type_id`, `cust_type_name`, `cust_type_note`) VALUES
(1, 'Perusahaan', ''),
(2, 'Umum', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_products`
--

CREATE TABLE `group_products` (
  `group_product_id` varchar(128) NOT NULL,
  `group_product_name` varchar(128) NOT NULL,
  `group_product_note` varchar(128) NOT NULL,
  `group_product_alias` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `group_products`
--

INSERT INTO `group_products` (`group_product_id`, `group_product_name`, `group_product_note`, `group_product_alias`) VALUES
('49aa0735-aafb-11e9-ae8c-80ce623effd6', 'Bordir', 'Bordir', 'Bahan'),
('4e4d7fb0-aafb-11e9-ae8c-80ce623effd6', 'ATK', 'Atk', 'Barang'),
('757d52c9-aafa-11e9-ae8c-80ce623effd6', 'Percetakan', 'Cetak', 'Bahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_master`
--

CREATE TABLE `menu_master` (
  `menu_id` varchar(128) NOT NULL,
  `menu_title` varchar(128) NOT NULL,
  `menu_url` varchar(128) NOT NULL,
  `menu_icon` varchar(128) NOT NULL,
  `menu_position` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_master`
--

INSERT INTO `menu_master` (`menu_id`, `menu_title`, `menu_url`, `menu_icon`, `menu_position`, `is_active`) VALUES
('d655755f-aa87-11e9-a155-80ce623effd6', 'Product', 'products', '', 3, 1),
('dc798888-aa87-11e9-a155-80ce623effd6', 'Transaksi', 'transaction', '', 9, 1),
('df1011f1-aa85-11e9-a155-80ce623effd6', 'Dashboard', 'dashboard', '', 0, 1),
('f56ea484-aa85-11e9-a155-80ce623effd6', 'Data Pelanggan', 'customer', '', 1, 1),
('f72cd155-aa87-11e9-a155-80ce623effd6', 'Pengaturan', 'settings', '', 10, 1),
('fdfca105-aa85-11e9-a155-80ce623effd6', 'Data Pengguna', 'user', '', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(128) NOT NULL,
  `order_cust_id` varchar(128) NOT NULL,
  `order_user_id` varchar(128) NOT NULL,
  `group_product_id` varchar(128) NOT NULL,
  `order_code` varchar(128) NOT NULL,
  `order_note` varchar(128) NOT NULL,
  `order_paid` int(128) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_date` int(128) NOT NULL,
  `order_finish` int(128) NOT NULL,
  `date_created` int(128) NOT NULL,
  `date_modifed` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `order_cust_id`, `order_user_id`, `group_product_id`, `order_code`, `order_note`, `order_paid`, `order_status`, `order_date`, `order_finish`, `date_created`, `date_modifed`) VALUES
('05a1c9d5-b7b7-11e9-a947-80ce623effd6', '9e7c075e-afdf-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000038', '', 0, 0, 0, 0, 1565033231, 1565033231),
('0d29750b-086a-11eb-a3a3-80e82c4b226a', '6370cf0a-afda-11e9-82ee-80ce623effd6', '37f6360b-b891-11e9-b92c-80ce623effd6', '4e4d7fb0-aafb-11e9-ae8c-80ce623effd6', 'INV-20201007/000054', '', 500000, 1, 1602053654, 1602053654, 1602053714, 1602053714),
('18bca3bd-b7b7-11e9-a947-80ce623effd6', '6370cf0a-afda-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000039', '', 0, 0, 2147483647, 2147483647, 1565033263, 1565033263),
('1bda58af-b885-11e9-b92c-80ce623effd6', 'ef774c98-afd9-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190807/000049', '', 500000, 1, 1565121684, 1565121684, 1565121744, 1565121744),
('27cac871-b7c1-11e9-a947-80ce623effd6', '31ec0f6e-afde-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000048', '', 500000, 1, 1565037583, 1565037583, 1565037583, 1565037583),
('2a6d2cd6-b7a7-11e9-a947-80ce623effd6', 'fa7f5347-afde-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000034', '', 1050000, 1, 2147483647, 2147483647, 1565026421, 1565026421),
('2ce4ad01-b7af-11e9-a947-80ce623effd6', 'fa7f5347-afde-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000036', '', 0, 0, 6, 0, 1565029861, 1565029861),
('485c37c4-b7b7-11e9-a947-80ce623effd6', 'fa7f5347-afde-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000040', '', 0, 0, 2147483647, 2147483647, 1565033343, 1565033343),
('4a5b8163-b7a8-11e9-a947-80ce623effd6', '9e7c075e-afdf-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000035', '', 300000, 0, 2147483647, 2147483647, 1565026904, 1565026904),
('4b2f7c74-b7bd-11e9-a947-80ce623effd6', 'fa7f5347-afde-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000043', '', 0, 0, 1565035920, 0, 1565035924, 1565035924),
('5e274409-b525-11e9-af80-80ce623effd6', '9e7c075e-afdf-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190802/000026', '', 0, 0, 2147483647, 2147483647, 1564750770, 1564750770),
('641f17a7-b885-11e9-b92c-80ce623effd6', 'ef774c98-afd9-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190807/000050', '', 0, 0, 1565121866, 1565121866, 1565121866, 1565121866),
('6b9499c0-b7b7-11e9-a947-80ce623effd6', '5a70fe8e-b48e-11e9-9e17-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000041', '', 0, 0, 2147483647, 2147483647, 1565033402, 1565033402),
('6f21509c-b890-11e9-b92c-80ce623effd6', '534f9b70-aacc-11e9-a155-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190807/000053', 'Pesanan dipercepat', 1750000, 1, 1565126549, 1565816429, 1565126609, 1565126609),
('7690bc16-b885-11e9-b92c-80ce623effd6', 'ef774c98-afd9-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190807/000051', '', 0, 0, 1565121897, 1565121897, 1565121897, 1565121897),
('7a83eb9c-b555-11e9-95d8-80ce623effd6', '5a70fe8e-b48e-11e9-9e17-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190803/000027', '', 0, 0, 2147483647, 2147483647, 1564771434, 1564771434),
('7cf36343-086a-11eb-a3a3-80e82c4b226a', 'ef774c98-afd9-11e9-82ee-80ce623effd6', '37f6360b-b891-11e9-b92c-80ce623effd6', '4e4d7fb0-aafb-11e9-ae8c-80ce623effd6', 'INV-20201007/000055', 'okokokok', 450000, 1, 1602053842, 1602053842, 1602053902, 1602053902),
('87361863-b885-11e9-b92c-80ce623effd6', 'ef774c98-afd9-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190807/000052', '', 400000, 1, 1565121864, 1565121864, 1565121925, 1565121925),
('8ae830f4-b7bf-11e9-a947-80ce623effd6', 'ef774c98-afd9-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000047', 'Catatan ', 1050000, 1, 1565726411, 1565726411, 1565036890, 1565121131),
('95cf65ee-b48e-11e9-9e17-80ce623effd6', 'Pelanggan Baru\\', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190802/000023', 'Catatan', 1000000, 0, 2147483647, 2147483647, 1564685995, 1564685995),
('96357f20-b7bd-11e9-a947-80ce623effd6', '9e7c075e-afdf-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000044', '', 500000, 1, 1565037000, 1567195200, 1565036050, 1565036050),
('98adba85-b7b7-11e9-a947-80ce623effd6', 'fa7f5347-afde-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000042', '', 0, 0, 2, 2, 1565033477, 1565033477),
('a1b4dcbb-b693-11e9-997b-80ce623effd6', '31ec0f6e-afde-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190804/000028', '', 0, 0, 2147483647, 2147483647, 1564908080, 1564908080),
('a698f19c-b693-11e9-997b-80ce623effd6', '6370cf0a-afda-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190804/000029', '', 0, 0, 2147483647, 2147483647, 1564908088, 1564908088),
('b770f5d5-b7bd-11e9-a947-80ce623effd6', 'fa7f5347-afde-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000045', '', 0, 0, 1565037000, 1565036093, 1565036106, 1565036106),
('c0b26e7d-b693-11e9-997b-80ce623effd6', '906c364a-afe9-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190804/000030', '', 0, 0, 2147483647, 2147483647, 1564908132, 1564908132),
('c0d89a41-086a-11eb-a3a3-80e82c4b226a', 'fa7f5347-afde-11e9-82ee-80ce623effd6', '37f6360b-b891-11e9-b92c-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20201007/000056', '', 250000, 0, 1602053955, 1602053955, 1602054015, 1602054015),
('cab21d08-b48d-11e9-9e17-80ce623effd6', '534f9b70-aacc-11e9-a155-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190802/000022', '300000', 5300000, 1, 2147483647, 2147483647, 1564685654, 1564685654),
('cdeb57c9-b693-11e9-997b-80ce623effd6', '534f9b70-aacc-11e9-a155-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190804/000031', '', 0, 0, 2147483647, 2147483647, 1564908154, 1564908154),
('d0e43ca7-b48e-11e9-9e17-80ce623effd6', 'fa7f5347-afde-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '4e4d7fb0-aafb-11e9-ae8c-80ce623effd6', 'INV-20190802/000024', '', 80000, 1, 2147483647, 2147483647, 1564686094, 1564686094),
('d3f33eaa-b693-11e9-997b-80ce623effd6', '9b6daa7f-afe9-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190804/000032', '', 0, 0, 2147483647, 2147483647, 1564908164, 1564908164),
('d61e2ed2-b7be-11e9-a947-80ce623effd6', '6370cf0a-afda-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000046', '', 0, 0, 1565036583, 1565036583, 1565036587, 1565036587),
('d97a4dd9-b7b6-11e9-a947-80ce623effd6', 'ef774c98-afd9-11e9-82ee-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190806/000037', '', 800000, 1, 2147483647, 2147483647, 1565033157, 1565033157),
('de600f31-b693-11e9-997b-80ce623effd6', '534f9b70-aacc-11e9-a155-80ce623effd6', '48e4b36b-aab1-11e9-a155-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 'INV-20190804/000033', '', 0, 0, 2147483647, 2147483647, 1564908181, 1564908181),
('e8a7c6ba-b492-11e9-9e17-80ce623effd6', '9e7c075e-afdf-11e9-82ee-80ce623effd6', '1c75622e-aab4-11e9-a155-80ce623effd6', '4e4d7fb0-aafb-11e9-ae8c-80ce623effd6', 'INV-20190802/000025', '', 0, 0, 2147483647, 2147483647, 1564687852, 1564687852);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` varchar(128) NOT NULL,
  `order_id` varchar(128) NOT NULL,
  `order_product_id` varchar(128) NOT NULL,
  `order_price_id` varchar(128) NOT NULL,
  `order_finishing_id` varchar(128) NOT NULL,
  `order_quantity` int(128) NOT NULL,
  `order_price` int(128) NOT NULL,
  `order_unit_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `order_product_id`, `order_price_id`, `order_finishing_id`, `order_quantity`, `order_price`, `order_unit_id`) VALUES
('0784160e-f1bb-4a76-9c8e-471991fb47ca', '7a83eb9c-b555-11e9-95d8-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('0a94e570-b704-40cf-b700-9972e53edc31', '7a83eb9c-b555-11e9-95d8-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 30, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('0d2ab8fa-c6ff-4024-b5e4-ae05f0055141', '95cf65ee-b48e-11e9-9e17-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 5, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('15d7ed50-f577-4ac2-97db-d83d6707b550', 'c0b26e7d-b693-11e9-997b-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'c7d1b997-a424-425a-8cf7-8787fcc03a47', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 45000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('1cbfe122-c69a-49d3-82e4-03f320180fc7', 'de600f31-b693-11e9-997b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 4, 350000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('1cd07740-ce36-42fa-add2-58b35a468559', '7cf36343-086a-11eb-a3a3-80e82c4b226a', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', '3bf1be9b-3ead-446f-883d-fa0ecca417eb', '', 2, 3500, 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6'),
('1ffd3257-4e43-48ba-b8c2-115b3e73a2ad', '18bca3bd-b7b7-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '', 20, 20000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('2bd07c12-e87c-4114-b83c-5b87889dfc36', '8ae830f4-b7bf-11e9-a947-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 30, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('30849da0-dbde-48c7-915f-bb88e2db8ce7', '87361863-b885-11e9-b92c-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '', 20, 20000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('35c6e5a3-904a-4ef8-b0d4-5ade969ca857', 'c0b26e7d-b693-11e9-997b-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'ffb91047-cd37-40ba-94af-b1a0663c6916', '', 20, 30000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('39fb5cb9-e483-4ead-842a-ac0269396691', 'e8a7c6ba-b492-11e9-9e17-80ce623effd6', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', '3bf1be9b-3ead-446f-883d-fa0ecca417eb', '', 1, 3500, 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6'),
('3b4ef8c5-f1d6-4028-ad61-2e12bf31b239', 'd3f33eaa-b693-11e9-997b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 2, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('3b5a6b53-23ed-4049-835a-c5b78ea4c66a', '0d29750b-086a-11eb-a3a3-80e82c4b226a', 'c7ee6b07-ae44-11e9-8c5b-80ce623effd6', '9739a302-51ae-400e-b6ad-25ba924ee24b', '', 12, 35000, 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6'),
('449c1af5-1c80-4523-8555-c7a8815a8ba9', '7690bc16-b885-11e9-b92c-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('4c9badfc-0973-4f21-a9c5-6700b143920b', 'b770f5d5-b7bd-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('5b267969-ab10-4994-abd9-bb96b120529b', 'd97a4dd9-b7b6-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'c7d1b997-a424-425a-8cf7-8787fcc03a47', '', 20, 40000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('5b6b2d1e-419f-48eb-a10d-079d3a6b9c31', '95cf65ee-b48e-11e9-9e17-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 5, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('69ee6731-e9be-4097-9f34-e5b935109871', '96357f20-b7bd-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('6e37c4d5-b0b5-463a-8832-8c6507e0f2c5', '6b9499c0-b7b7-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'c7d1b997-a424-425a-8cf7-8787fcc03a47', '', 20, 40000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('747e0d02-c555-4cc9-8dae-c8695c07233b', '641f17a7-b885-11e9-b92c-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '', 20, 20000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('782bc0c9-1ed9-4042-92a2-c70948ef9c2c', 'd0e43ca7-b48e-11e9-9e17-80ce623effd6', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', '3bf1be9b-3ead-446f-883d-fa0ecca417eb', '', 1, 3500, 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6'),
('7f77cccd-e5af-4c9e-ab83-c47ed1fbf2b1', '7cf36343-086a-11eb-a3a3-80e82c4b226a', 'c7ee6b07-ae44-11e9-8c5b-80ce623effd6', '9739a302-51ae-400e-b6ad-25ba924ee24b', '', 12, 35000, 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6'),
('8ccb14d4-592c-4382-888f-77bff322959c', 'd0e43ca7-b48e-11e9-9e17-80ce623effd6', 'c7ee6b07-ae44-11e9-8c5b-80ce623effd6', '9739a302-51ae-400e-b6ad-25ba924ee24b', '', 1, 35000, 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6'),
('8e6c70b6-abb0-4509-a13e-ae17b739b36f', 'cdeb57c9-b693-11e9-997b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 1, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('96377f79-f397-4898-ab3e-81013dd68bcc', 'cab21d08-b48d-11e9-9e17-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('97ad0131-856f-4b39-8237-95b948de1a80', 'c0b26e7d-b693-11e9-997b-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'bd573f5d-31b5-429e-a43c-fe0fb934025d', '9813f38d-dc26-41e3-8497-7d26cf147102', 12, 400300, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('9f3b401a-cfb2-464d-ba42-d040bd0436dc', 'a698f19c-b693-11e9-997b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 30, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('a58f7a8c-7b76-405b-8a7f-054e4819d70f', '4b2f7c74-b7bd-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '', 20, 20000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('a9eb4eba-6d70-479e-b0c1-f2b9022dc646', 'a1b4dcbb-b693-11e9-997b-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('b1716a6f-0cee-4d9f-a068-f60dc0b2bf2c', '0d29750b-086a-11eb-a3a3-80e82c4b226a', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', '3bf1be9b-3ead-446f-883d-fa0ecca417eb', '', 1, 3500, 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6'),
('c68cadc2-88be-47cc-9f6c-177430db7dfc', '7a83eb9c-b555-11e9-95d8-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'bd573f5d-31b5-429e-a43c-fe0fb934025d', '', 12, 400000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('d1e7cce3-bd94-4c20-af0b-63ed30420cf5', '485c37c4-b7b7-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '', 20, 20000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('d4887775-c7b1-4587-a2e4-06cbfacd60b2', '95cf65ee-b48e-11e9-9e17-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'bd573f5d-31b5-429e-a43c-fe0fb934025d', '', 5, 400000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('d5531e9d-c6f0-4c1d-bcaf-7ce115917caa', '2ce4ad01-b7af-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '', 20, 20000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('d56e776d-ef42-4b72-9297-2c06947d6753', '5e274409-b525-11e9-af80-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 30, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('d6c2e4de-036d-4dc8-8033-e0ee94d59c90', '6f21509c-b890-11e9-b92c-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 50, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('d951ca57-98df-4508-bea5-826fdde7c4f7', '27cac871-b7c1-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('da027ad1-ea3f-4268-b1e8-8f3c59cbd2df', 'c0d89a41-086a-11eb-a3a3-80e82c4b226a', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '', 20, 20000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('e4ff024b-5a99-47db-b8c6-0b1d4e0999de', '05a1c9d5-b7b7-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '', 20, 20000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('e9244e39-564f-494b-b379-467f42a416c2', 'd61e2ed2-b7be-11e9-a947-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 30, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('ef408ea0-93b1-4c4e-938e-44703e8ab8fd', 'c0b26e7d-b693-11e9-997b-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'bd573f5d-31b5-429e-a43c-fe0fb934025d', '9813f38d-dc26-41e3-8497-7d26cf147102', 12, 400300, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('f0ef5f08-e1ff-4c12-af7e-edc93abeeb0b', '2a6d2cd6-b7a7-11e9-a947-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '', 30, 35000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('f831be7d-b57d-47b2-b4f7-fd8aa6bef5ca', '98adba85-b7b7-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('fb44e3ea-009f-4af2-bfb6-1c26daf6e136', 'cab21d08-b48d-11e9-9e17-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'bd573f5d-31b5-429e-a43c-fe0fb934025d', '', 12, 400000, 'd7401288-ab0a-11e9-ae8c-80ce623effd6'),
('fc1fcc3c-1b89-4940-acd5-3d504077e331', '4a5b8163-b7a8-11e9-a947-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6'),
('fef4f438-a09e-4503-902c-409980807c40', '5e274409-b525-11e9-af80-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', '8aa2bf05-1647-4d3a-a2e8-308cf7124f35', '1a381b4d-4213-4772-820a-82c7e1f46517', 20, 25000, 'db054543-ab0a-11e9-ae8c-80ce623effd6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` varchar(128) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `product_min_order` int(128) NOT NULL,
  `product_min_order_unit_id` varchar(128) NOT NULL,
  `product_type_id` varchar(128) NOT NULL,
  `product_group_id` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modifed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_min_order`, `product_min_order_unit_id`, `product_type_id`, `product_group_id`, `date_created`, `date_modifed`) VALUES
('23df9a7b-ae45-11e9-8c5b-80ce623effd6', 'Pulpen', 1, 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', '1d66c6d3-abf0-11e9-ae8c-80ce623effd6', '4e4d7fb0-aafb-11e9-ae8c-80ce623effd6', 1563994758, 1563994758),
('875671b6-ae3f-11e9-8c5b-80ce623effd6', 'Brosur Type A', 40, 'd7401288-ab0a-11e9-ae8c-80ce623effd6', '0e5fcb75-ab21-11e9-ae8c-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 1563992348, 1565125473),
('b9859650-ae43-11e9-8c5b-80ce623effd6', 'Kop Surat', 12, 'db054543-ab0a-11e9-ae8c-80ce623effd6', '3f3dea91-ab21-11e9-ae8c-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 1563994151, 1563994334),
('c7ee6b07-ae44-11e9-8c5b-80ce623effd6', 'Buku Akutansi', 12, 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', '1d66c6d3-abf0-11e9-ae8c-80ce623effd6', '4e4d7fb0-aafb-11e9-ae8c-80ce623effd6', 1563994604, 1563994604),
('ddd352d0-af18-11e9-9d27-80ce623effd6', 'Sticker', 20, 'db054543-ab0a-11e9-ae8c-80ce623effd6', '4f6e9a0e-ab21-11e9-ae8c-80ce623effd6', '757d52c9-aafa-11e9-ae8c-80ce623effd6', 1564085697, 1564515413),
('e1898557-ae45-11e9-8c5b-80ce623effd6', 'Bahan A', 1, 'df33efc2-ab0a-11e9-ae8c-80ce623effd6', 'b2789d7d-abf2-11e9-ae8c-80ce623effd6', '49aa0735-aafb-11e9-ae8c-80ce623effd6', 1563995077, 1563995077);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_finishing`
--

CREATE TABLE `product_finishing` (
  `product_finishing_id` varchar(128) NOT NULL,
  `product_id` varchar(128) NOT NULL,
  `unit_id` varchar(128) NOT NULL,
  `product_finishing_name` varchar(128) NOT NULL,
  `product_finishing_price` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_finishing`
--

INSERT INTO `product_finishing` (`product_finishing_id`, `product_id`, `unit_id`, `product_finishing_name`, `product_finishing_price`) VALUES
('1a381b4d-4213-4772-820a-82c7e1f46517', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 'Doff', 5000),
('21e14dfd-c37e-47ef-a7be-b3aba04c58a9', 'dfde165b-abe6-11e9-ae8c-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 'Lipatan', 4000),
('9813f38d-dc26-41e3-8497-7d26cf147102', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 'Nomorator', 300),
('c4ec7c0a-da35-40ec-836c-9b38e2426bb4', '035a8585-ae2d-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 'Doff', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_price`
--

CREATE TABLE `product_price` (
  `product_price_id` varchar(128) NOT NULL,
  `product_id` varchar(128) NOT NULL,
  `unit_id` varchar(128) NOT NULL,
  `product_price_name` varchar(128) NOT NULL,
  `product_price_hm` int(11) NOT NULL,
  `product_price_hj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_price`
--

INSERT INTO `product_price` (`product_price_id`, `product_id`, `unit_id`, `product_price_name`, `product_price_hm`, `product_price_hj`) VALUES
('3bf1be9b-3ead-446f-883d-fa0ecca417eb', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 'Single Price', 3000, 3500),
('8aa2bf05-1647-4d3a-a2e8-308cf7124f35', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', '1 Warna', 20000, 20000),
('9739a302-51ae-400e-b6ad-25ba924ee24b', 'c7ee6b07-ae44-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 'Single Price', 30000, 35000),
('bd573f5d-31b5-429e-a43c-fe0fb934025d', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', '1 Warna', 30000, 400000),
('c51b16b5-bcbe-4cf8-b63f-29c76ca1a84e', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', '1 Warna', 30000, 35000),
('c7d1b997-a424-425a-8cf7-8787fcc03a47', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', '3 Warna', 40000, 40000),
('de5b6c1c-209e-4d5f-9753-96b9072ca2ae', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 'Full Warna', 1000000, 1000000),
('efc3e86b-9576-4349-966f-dc6687c5eed9', 'e1898557-ae45-11e9-8c5b-80ce623effd6', 'df33efc2-ab0a-11e9-ae8c-80ce623effd6', 'Single Price', 400000, 450000),
('ffb91047-cd37-40ba-94af-b1a0663c6916', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', '2 Warna', 30000, 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_stock`
--

CREATE TABLE `product_stock` (
  `product_stock_id` varchar(128) NOT NULL,
  `product_id` varchar(128) NOT NULL,
  `unit_id` varchar(128) NOT NULL,
  `product_stock_value` int(128) NOT NULL,
  `product_stock_note` varchar(128) NOT NULL,
  `stock_type` int(11) NOT NULL,
  `stock_date_created` int(11) NOT NULL,
  `stock_date_modifed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_stock`
--

INSERT INTO `product_stock` (`product_stock_id`, `product_id`, `unit_id`, `product_stock_value`, `product_stock_note`, `stock_type`, `stock_date_created`, `stock_date_modifed`) VALUES
('09eedc9f-ae44-11e9-8c5b-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 300, 'Menambahkan', 1, 1563994285, 1563994285),
('0d36fbad-086a-11eb-a3a3-80e82c4b226a', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 1, 'Transaction Order', 0, 1602053714, 1602053714),
('0d3be671-086a-11eb-a3a3-80e82c4b226a', 'c7ee6b07-ae44-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 12, 'Transaction Order', 0, 1602053714, 1602053714),
('10470fd6-ae44-11e9-8c5b-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 25, 'Hilang', 0, 1563994296, 1563994296),
('23f56d3f-ae45-11e9-8c5b-80ce623effd6', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 0, '', 1, 1563994758, 1563994758),
('25d2fec8-ae46-11e9-8c5b-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 40, 'Mengurangi (Rusak, Hilang, dll)', 0, 1563995191, 1563995191),
('27753f64-ae45-11e9-8c5b-80ce623effd6', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 30, 'Menambahkan', 1, 1563994764, 1563994764),
('2a4f159a-ae46-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 5, 'Mengurangi (Rusak, Hilang, dll)', 0, 1563995199, 1563995199),
('2e35b858-ae46-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 1, 'Menambahkan', 1, 1563995205, 1563995205),
('30ecd511-ae46-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 2, 'Menambahkan', 1, 1563995210, 1563995210),
('41620229-ae40-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 1, 'Mengurangi (Rusak, Hilang, dll)', 0, 1563992660, 1563992660),
('4ea00f64-d719-11e9-b583-80ce623effd6', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 50, 'Menambahkan', 1, 1568483930, 1568483930),
('56fb07d7-ae47-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 2, 'Menambahkan', 1, 1563995703, 1563995703),
('5c381923-ae41-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 2, 'Menambahkan', 1, 1563993135, 1563993135),
('5dbbb162-af18-11e9-9d27-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 30, 'Menambahkan', 1, 1564085482, 1564085482),
('5e8a66be-086a-11eb-a3a3-80e82c4b226a', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 1, 'Menambahkan satu aja', 1, 1602053851, 1602053851),
('62d8d95f-af18-11e9-9d27-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 0, 'Menambahkan', 1, 1564085490, 1564085490),
('6425e10c-b885-11e9-b92c-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 20, 'Transaction Order', 3, 1565121866, 1565121866),
('699a9a9c-af18-11e9-9d27-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 0, 'Menambahkan', 1, 1564085502, 1564085502),
('6f27309a-b890-11e9-b92c-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 50, 'Transaction Order', 0, 1565126609, 1565126609),
('76987f5a-b885-11e9-b92c-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 20, 'Transaction Order', 0, 1565121897, 1565121897),
('7beb603d-ae43-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 2, 'Mengurangi (Rusak, Hilang, dll)', 0, 1563994047, 1563994047),
('7bfc8e8c-b487-11e9-9e17-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 60, 'Mengurangi (Rusak, Hilang, dll)', 0, 1564682945, 1564682945),
('7d0854aa-086a-11eb-a3a3-80e82c4b226a', '23df9a7b-ae45-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 2, 'Transaction Order', 0, 1602053902, 1602053902),
('7d128f54-086a-11eb-a3a3-80e82c4b226a', 'c7ee6b07-ae44-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 12, 'Transaction Order', 0, 1602053902, 1602053902),
('80cd8adb-ae43-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 3, 'Menambahkan', 1, 1563994055, 1563994055),
('873d8636-b885-11e9-b92c-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 20, 'Transaction Order', 0, 1565121925, 1565121925),
('8767e18a-ae3f-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 0, '', 1, 1563992348, 1563992348),
('8c34feee-ae3f-11e9-8c5b-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 2, 'Menambahkan', 1, 1563992356, 1563992356),
('943b09ef-ae49-11e9-8c5b-80ce623effd6', '94305742-ae49-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 0, '', 1, 1563996665, 1563996665),
('97451b1c-ae49-11e9-8c5b-80ce623effd6', '94305742-ae49-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 1, 'Menambahkan', 1, 1563996670, 1563996670),
('9bd88d10-b885-11e9-b92c-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 10, 'Menambahkan', 1, 1565121959, 1565121959),
('a57ff70e-086a-11eb-a3a3-80e82c4b226a', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 20, 'Mengurangi (Rusak, Hilang, dll)', 0, 1602053970, 1602053970),
('b3119915-086a-11eb-a3a3-80e82c4b226a', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 20, 'Menambahkan', 1, 1602053992, 1602053992),
('b99e7a1b-ae43-11e9-8c5b-80ce623effd6', 'b9859650-ae43-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 0, '', 1, 1563994151, 1563994151),
('bf0864ce-b087-11e9-9d67-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'f7294757-ab0a-11e9-ae8c-80ce623effd6', 30, 'Menambahkan', 1, 1564243268, 1564243268),
('c0ee6950-086a-11eb-a3a3-80e82c4b226a', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 20, 'Transaction Order', 0, 1602054016, 1602054016),
('c7fe37ed-ae44-11e9-8c5b-80ce623effd6', 'c7ee6b07-ae44-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 0, '', 1, 1563994604, 1563994604),
('dd72e005-b88e-11e9-b92c-80ce623effd6', '875671b6-ae3f-11e9-8c5b-80ce623effd6', 'd7401288-ab0a-11e9-ae8c-80ce623effd6', 30, 'Menambahkan', 1, 1565125935, 1565125935),
('ddeef235-af18-11e9-9d27-80ce623effd6', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'f7294757-ab0a-11e9-ae8c-80ce623effd6', 0, '', 1, 1564085697, 1564085697),
('de803495-0869-11eb-a3a3-80e82c4b226a', 'ddd352d0-af18-11e9-9d27-80ce623effd6', 'db054543-ab0a-11e9-ae8c-80ce623effd6', 20, 'Menambahkan bahan sticker', 1, 1602053636, 1602053636),
('e19f545f-ae45-11e9-8c5b-80ce623effd6', 'e1898557-ae45-11e9-8c5b-80ce623effd6', 'df33efc2-ab0a-11e9-ae8c-80ce623effd6', 0, '', 1, 1563995077, 1563995077),
('e4ecdc2a-ae45-11e9-8c5b-80ce623effd6', 'e1898557-ae45-11e9-8c5b-80ce623effd6', 'df33efc2-ab0a-11e9-ae8c-80ce623effd6', 2, 'Menambahkan', 1, 1563995082, 1563995082),
('f6d1da96-ae44-11e9-8c5b-80ce623effd6', 'c7ee6b07-ae44-11e9-8c5b-80ce623effd6', 'e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 40, 'Menambahkan', 1, 1563994683, 1563994683);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` varchar(128) NOT NULL,
  `product_type_name` varchar(128) NOT NULL,
  `product_type_note` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`, `product_type_note`) VALUES
('0e5fcb75-ab21-11e9-ae8c-80ce623effd6', 'BROSUR / Form / Check Sheet', 'Brosur'),
('1d66c6d3-abf0-11e9-ae8c-80ce623effd6', 'ALAT TULIS KANTOR', ''),
('3f3dea91-ab21-11e9-ae8c-80ce623effd6', 'KOP SURAT', 'Kop Surat'),
('46345b59-ab21-11e9-ae8c-80ce623effd6', 'FAKTUR/ SURAT JALAN / INVOICE', 'Faktur'),
('4f6e9a0e-ab21-11e9-ae8c-80ce623effd6', 'MEMO 1/2 FOLIO', 'Memo'),
('88c6bdf8-ae49-11e9-8c5b-80ce623effd6', 'Sembako', 'sembako'),
('89323361-abd0-11e9-ae8c-80ce623effd6', 'SPANDUK', ''),
('b2789d7d-abf2-11e9-ae8c-80ce623effd6', 'BORDIR', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_unit`
--

CREATE TABLE `product_unit` (
  `unit_id` varchar(128) NOT NULL,
  `unit_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_unit`
--

INSERT INTO `product_unit` (`unit_id`, `unit_name`) VALUES
('d7401288-ab0a-11e9-ae8c-80ce623effd6', 'RIM'),
('db054543-ab0a-11e9-ae8c-80ce623effd6', 'Lembar'),
('df33efc2-ab0a-11e9-ae8c-80ce623effd6', 'Meter'),
('e34da4a8-ab0a-11e9-ae8c-80ce623effd6', 'PCS'),
('f7294757-ab0a-11e9-ae8c-80ce623effd6', 'BUKU'),
('f8d1608c-ab0a-11e9-ae8c-80ce623effd6', 'BOX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` varchar(128) NOT NULL,
  `user_fullname` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_phone` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_address` varchar(128) NOT NULL,
  `user_role_id` varchar(128) NOT NULL,
  `user_status` int(1) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modifed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_name`, `user_phone`, `user_email`, `user_address`, `user_role_id`, `user_status`, `user_password`, `date_created`, `date_modifed`) VALUES
('1c75622e-aab4-11e9-a155-80ce623effd6', 'Dadan Abdul Halim', 'dadans', '0812391320', 'dadan@gmail.com', 'Jl. Cobarusahs', '2', 1, '$2y$10$SocR3X7OYR1bUNApLREk..CORCsmiYpOLPxmv.AQt5t28DDtl4WAW', 0, 1564686419),
('37f6360b-b891-11e9-b92c-80ce623effd6', 'Admin', 'administrator', '000', 'admin@alibaba.com', '', '1', 1, '$2y$10$sIXZGSHZsrP0hIkO.vjReeAxdHmGefmpz/E1zXEo.aYG/fgKVxwMG', 1565126946, 0),
('48e4b36b-aab1-11e9-a155-80ce623effd6', 'Haerul Muttaqin', 'haerul', '0813128731', 'haerul.muttaqin@gmail.com', 'Jl. Lemah Abang', '1', 1, '$2y$10$7.8dLi9f9dF9a3//ek0dOeERyFnFkBUw5yh/YrN28TmrNqQMplPTK', 0, 1564681637),
('b6583128-aabd-11e9-a155-80ce623effd6', 'Taufik Ibrahim', 'taufik', '08123712631', 'taufikibrahim21@gmail.com', 'Cipalahlar', '3', 0, '$2y$10$ctRxdh9ZuWb5/vGyH1azTu04QeqLe3ZH/T4qgXc2g2fC7GxVBMH.O', 0, 1563902362);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Production');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`cust_type_id`);

--
-- Indeks untuk tabel `group_products`
--
ALTER TABLE `group_products`
  ADD PRIMARY KEY (`group_product_id`);

--
-- Indeks untuk tabel `menu_master`
--
ALTER TABLE `menu_master`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `product_finishing`
--
ALTER TABLE `product_finishing`
  ADD PRIMARY KEY (`product_finishing_id`);

--
-- Indeks untuk tabel `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`product_price_id`);

--
-- Indeks untuk tabel `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`product_stock_id`);

--
-- Indeks untuk tabel `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indeks untuk tabel `product_unit`
--
ALTER TABLE `product_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer_type`
--
ALTER TABLE `customer_type`
  MODIFY `cust_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
