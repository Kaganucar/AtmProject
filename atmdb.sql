-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Oca 2024, 04:13:01
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `atmdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kasetler`
--

CREATE TABLE `kasetler` (
  `id` int(11) NOT NULL,
  `paralar` varchar(50) NOT NULL,
  `miktar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kasetler`
--

INSERT INTO `kasetler` (`id`, `paralar`, `miktar`) VALUES
(1, '5TL', 0),
(2, '10TL', 0),
(3, '20TL', 0),
(4, '50TL', 0),
(5, '100TL', 0),
(6, '200TL', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `loglar`
--

CREATE TABLE `loglar` (
  `id` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `para` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kasetler`
--
ALTER TABLE `kasetler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `loglar`
--
ALTER TABLE `loglar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kasetler`
--
ALTER TABLE `kasetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `loglar`
--
ALTER TABLE `loglar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
