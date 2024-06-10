-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: May 01, 2024 at 11:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urbanedenbaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `biljke`
--

CREATE TABLE `biljke` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `latIme` varchar(100) NOT NULL,
  `razina` varchar(50) NOT NULL,
  `otrovno` varchar(50) NOT NULL,
  `sjetva` varchar(50) NOT NULL,
  `mjesto` varchar(50) NOT NULL,
  `razmakUredu` varchar(50) NOT NULL,
  `razmakIzredova` varchar(50) NOT NULL,
  `zalijevanje` varchar(50) NOT NULL,
  `gnojenje` varchar(50) NOT NULL,
  `okapanje` varchar(50) NOT NULL,
  `rezanje` varchar(50) NOT NULL,
  `dobriSusjedi` varchar(255) NOT NULL,
  `losiSusjedi` varchar(255) NOT NULL,
  `svjetlo` varchar(50) NOT NULL,
  `berba` varchar(50) NOT NULL,
  `slika` varchar(64) NOT NULL,
  `slika2` varchar(64) NOT NULL,
  `opisTekst` varchar(1000) NOT NULL,
  `zdravljeTekst` varchar(2000) NOT NULL,
  `berbaTekst` varchar(2000) NOT NULL,
  `uvjetiTekst` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biljke`
--

INSERT INTO `biljke` (`id`, `ime`, `latIme`, `razina`, `otrovno`, `sjetva`, `mjesto`, `razmakUredu`, `razmakIzredova`, `zalijevanje`, `gnojenje`, `okapanje`, `rezanje`, `dobriSusjedi`, `losiSusjedi`, `svjetlo`, `berba`, `slika`, `slika2`, `opisTekst`, `zdravljeTekst`, `berbaTekst`, `uvjetiTekst`) VALUES
(1, 'Blitva', 'Beta vulgaris', 'početnička razina', 'neotrovno', 'svibanj, srpanj-rujan', 'balkon, dvorište, polje', '20 cm', '40 cm', '2 puta tjedno', 'svakih 14 dana', 'svakih 14 dana', 'nema rezanja', 'rajčica, cvjetača, grah - niski, mrkva, zelena salata', 'špinat', '2-4 sata, 6+ sati', '30-60 dana ', '', '', 'Blitva je dvogodišnja biljka. U prvoj godini razvije dubok i razgranat korijen, koji je u gornjem dijelu zadebljan, skraćenu stabljiku i rozetu lišća. U drugoj godini razvije se razgranata cvjetna stabljika visine do 1,2 m. Uzgaja se radi lišća, a koristi se i plojka i peteljka.', 'Blitvu često napadaju lisne uši. Kao atraktant se koriste ljepljive žute trake ili ploče, a korisno je u blizini uzgajati repelentne biljke poput anisa, češnjaka, čubra, dragoljuba, korijandara, lavande ili vlasca. Preventivno se mogu koristiti i biljni ekstrakti za prskanje od pelina, koprive, čubra ili vratića. Od prirodnih neprijatelja, izuzetno su korisne božje ovčice (bubamare), ose najeznice, uholaže i grabežljive stjenice. Općenito, poželjno je malčirati usjev.', 'Blitva se može brati oko 60 dana nakon sjetve odnosno 30 dana nakon sadnje. Ako se ne čupaju cijele mlade biljke u svrhu prorjeđivanja, obiru se vanjski, zdravi, razvijeni listovi što omogućava višekratnu berbu (3 do 5 tijekom uzgoja). S obzirom da blitva brzo gubi vlagu i svježinu, poželjno ju je odmah nakon berbe smjestiti na hladno uz visoku vlagu zraka.', 'Temperatura\r\nBlitva ima veliku mogućnost prilagodbe tlu i klimi. Minimalna je temperatura klijanja 5 °C, a optimalna 16 - 24 °C. Pri nižim temperaturama 5 - 10 °C biljka sporo raste, a optimalna temperatura rasta je 16 - 20 °C. I mlada i potpuno razvijena biljka može podnijeti blage mrazove.\r\n\r\nVoda\r\nTijekom uzgoja potrebno je osigurati dovoljnu količinu vode, posebno u područjima gdje se javlja manjak vode ili je ona neravnomjerno raspoređena. Smatra se da je tijekom uzgoja potrebno 4 - 6 navodnjavanja da bi se postigli optimalni prinosi. Tijekom sušnih perioda biljkama treba 9 - 13 l vode tjedno, ali su i iznenađujuće otporne na sušu. S obzirom na kvalitetu vode blitva pripada jednoj od rijetkih kultura koje su tolerantne na slanu vodu. Izbjegavati prekomjerno zalijevanje i pustiti da se tlo osuši kako bi se izbjegle infekcije.\r\n\r\nTlo\r\nBlitva nema velike zahtjeve prema tlu, ali najbolje uspijeva na dubokim strukturnim tlima dobre propusnosti za vodu i dobrog kapaciteta za zrak uz pH 6 do 8. Podnosi blago zaslanjena tla. U vegetativnoj fazi dobro uspijeva pri različitim klimatskim uvjetima, od mediteranskih, kontinentalnih do planinskih, pri različitim rokovima sjetve. U priobalnom području može prezimiti.\r\n\r\n\r\nPlodored\r\nBlitva ne podnosi monokulturu. Na istom tlu ne smije se uzgajati najmanje 3 godine, a isto tako niti jedna kultura iz roda Beta. Preporučuje se uzgoj nakon kulture gnojene organskim gnojivima. Dobro uspijeva uz sve vrste graha, osim trešnjevca, te uz kupusnjače, crveni luk i salatu. Godi joj i začinsko bilje poput žalfije, majčine dušice, metvice, kopra i sipana.\r\n\r\nOkapanje\r\nBudući da blitva ima dubok korijen i može koristiti vodu iz dubljih slojeva, duboka obrada tla obavlja se na 30 - 40 cm, a predsjetvena priprema mora omogućiti jednoličnu dubinu sjetve. Za ranu proljetnu sjetvu prikladne su uzdignute gredice.\r\n\r\nGnojidba\r\nPrije sjetve ili sadnje u mineralnoj gnojidbi dodaje se 80 - 100 kg/ha fosfora i 50 do 100 kg kalija. Dušična prihrana sa 100 - 150 kg/ha KAN-a provodi se u 3 - 4 navrata nakon berbe listova.\r\n\r\nSjetva/sadnja\r\nBlitva se obično sije izravno, ali za ranu proizvodnju može se uzgojiti i iz presadnica proizvedenih u grijanim zaštićenim prostorima. U kontinentalnim područjima sije se na otvoreno od kraja ožujka do kraja svibnja. Za presadnice iz zaštićenih prostora uz zagrijavanje na temperaturu višu od 15 °C potrebno je oko 5 tjedana. Presadnice sa 3 - 5 pravih listova presađuju se u prvoj polovici travnja.\r\nNa otvoreno se sije 30 - 50 cm red od reda, a prorjeđuje se na razmak 20 - 30 cm u redu. Presadnice se obično sade na razmak u redu 30 - 40 cm, odnosno 5 - 9 biljaka po četvornom metru. Za 1 ha potrebno je 15 - 20 kg sjemena, a za proizvodnju presadnica golog korijena na gredici 5 - 10 g po metru četvornom. U mediteranskom području može se sijati na isti način od veljače do kraja travnja, a za jesensku i zimsku berbu od kolovoza do početka rujna.\r\n\r\nNjega\r\nBlitva se ne reže, ali ju je potrebno prorjeđivati. S prorjeđivanjem se započinje kada biljka naraste nekoliko centimetara, ostavljaju se samo zdravi listovi i pazi se da su biljke međusobno udaljene 20-25  cm.\r\n\r\nOtrovnost\r\nBlitva nije otrovna za životinje.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `email`, `password`) VALUES
(1, 'Marko', 'faletar.marko@gmail.com', '$2y$10$UKBnH4edEtC2k8LBJo86sOIY30ZM4RLB4Dewtt6nHNUWdhkvdjy0O'),
(2, 'Marko', 'faletar.marko@gmail.com', '$2y$10$YeufszDv8SQJ6.jk.fhjjeGZ4PpDATbpJaUUhkeinbg9P4M9Sjzq6'),
(3, 'mark', 'mark@gmail.com', '$2y$10$wz95JrdShipUHyg3ucpVvu2btIHpVtdNy6tLjy.exWXt3.rt4zVfe'),
(4, 'mark2', 'mark2@gmail.com', '$2y$10$G1Fl2R8MPhaUUBEqvcJ9OOjj62nrVQs9BVdyz31VVs1kA5HvbA5Ja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biljke`
--
ALTER TABLE `biljke`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biljke`
--
ALTER TABLE `biljke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
