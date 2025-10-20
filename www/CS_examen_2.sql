-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Xerado en: 05 de Dec de 2022 ás 14:07
-- Versión do servidor: 10.3.37-MariaDB-0ubuntu0.20.04.1
-- Versión do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CS_examen_2`
--

-- --------------------------------------------------------

--
-- Estrutura da táboa `aux_continente`
--

CREATE TABLE `aux_continente` (
  `id_continente` int(11) NOT NULL,
  `nombre_continente` varchar(100) NOT NULL,
  `continente_avisar` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A extraer os datos da táboa `aux_continente`
--

INSERT INTO `aux_continente` (`id_continente`, `nombre_continente`, `continente_avisar`) VALUES
(1, 'Europa', b'0'),
(2, 'Asia', b'1'),
(3, 'América', b'1');

-- --------------------------------------------------------

--
-- Estrutura da táboa `aux_tipo_proveedor`
--

CREATE TABLE `aux_tipo_proveedor` (
  `id_tipo_proveedor` int(11) NOT NULL,
  `nombre_tipo_proveedor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A extraer os datos da táboa `aux_tipo_proveedor`
--

INSERT INTO `aux_tipo_proveedor` (`id_tipo_proveedor`, `nombre_tipo_proveedor`) VALUES
(1, 'Paquetería'),
(2, 'Construcciones'),
(3, 'Componentes móviles'),
(4, 'Componentes PC'),
(5, 'Hosting'),
(6, 'Papelería'),
(7, 'Embalajes');

-- --------------------------------------------------------

--
-- Estrutura da táboa `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `cif` char(9) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `id_tipo_proveedor` int(11) DEFAULT NULL,
  `id_continente` int(11) NOT NULL,
  `anho_fundacion` int(11) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A extraer os datos da táboa `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `cif`, `alias`, `nombre_completo`, `id_tipo_proveedor`, `id_continente`, `anho_fundacion`, `website`, `email`, `telefono`) VALUES
(1, 'A00000001', 'ExCaMí', 'Experienced Cartones Míguez', 7, 2, 1871, NULL, 'info@excamí.net', '957730280'),
(2, 'A00000002', 'BePCNa', 'Best PC Parts Navarrete', 4, 2, 1907, 'http://bepcna.net', 'info@bepcna.net', '909221882'),
(3, 'A00000003', 'MaEnRo', 'Maximized Envíos Rodríguez', 1, 1, 1891, 'http://maenro.net', 'info@maenro.net', '955886912'),
(4, 'A00000004', 'MaPaTr', 'Maximized Papelería Troncoso', 6, 1, 1887, 'http://mapatr.net', 'info@mapatr.net', '969885446'),
(5, 'A00000005', 'NuPaNa', 'Nuevo Papelería Navarrete', 6, 1, 1861, 'http://nupana.net', 'info@nupana.net', '937067311'),
(6, 'A00000006', 'VaWePa', 'Valuable Web Paz', 5, 1, 1906, NULL, 'info@vawepa.net', '914532997'),
(7, 'A00000007', 'VaObMa', 'Valuable Obras Martínez', 2, 1, 1955, 'http://vaobma.net', 'info@vaobma.net', '976904722'),
(8, 'A00000008', 'MaCaFe', 'Maximized Cartones Fernández', 7, 3, 1975, 'http://macafe.net', 'info@macafe.net', '994558224'),
(9, 'A00000009', 'MaPCAr', 'Maximized PC Parts Areal', 4, 1, 2008, 'http://mapcar.net', 'info@mapcar.net', '968946570'),
(10, 'A00000010', 'ImObJu', 'Improved Obras Juncal', 2, 1, 1965, 'http://imobju.net', 'info@imobju.net', '994486789'),
(11, 'A00000011', 'ImPCPa', 'Improved PC Parts Paz', 4, 2, 1968, NULL, 'info@impcpa.net', '934025762'),
(12, 'A00000012', 'UlObJu', 'Ultra Obras Juncal', 2, 3, 1912, 'http://ulobju.net', 'info@ulobju.net', '947104662'),
(13, 'A00000013', 'OpPCMa', 'Optimized PC Parts Martínez', 4, 1, 1936, 'http://oppcma.net', 'info@oppcma.net', '984279310'),
(14, 'A00000014', 'VaObTr', 'Valuable Obras Troncoso', 2, 1, 1899, 'http://vaobtr.net', 'info@vaobtr.net', '977644263'),
(15, 'A00000015', 'VaCaPé', 'Valuable Cartones Pérez', 7, 3, 1987, 'http://vacapé.net', 'info@vacapé.net', '944657434'),
(16, 'A00000016', 'MaObGo', 'Maximized Obras González', 2, 1, 1934, NULL, 'info@maobgo.net', '937460614'),
(17, 'A00000017', 'OpObCa', 'Optimized Obras Cabaleiro', 2, 1, 1982, 'http://opobca.net', 'info@opobca.net', '911782807'),
(18, 'A00000018', 'UlPaAc', 'Ultra Papelería Acuña', 6, 1, 1996, 'http://ulpaac.net', 'info@ulpaac.net', '915424671'),
(19, 'A00000019', 'CuCaCa', 'Custom Cartones Cabaleiro', 7, 1, 1949, 'http://cucaca.net', 'info@cucaca.net', '911528812'),
(20, 'A00000020', 'BeCoOr', 'Better Comp. Mov. Orge', 3, 1, 1940, 'http://becoor.net', 'info@becoor.net', '973119853'),
(21, 'A00000021', 'VaWeAc', 'Valuable Web Acuña', 5, 3, 2009, NULL, 'info@vaweac.net', '989520489'),
(22, 'A00000022', 'ImEnMí', 'Improved Envíos Míguez', 1, 2, 1971, 'http://imenmí.net', 'info@imenmí.net', '978287830'),
(23, 'A00000023', 'PrPCMa', 'Prepared PC Parts Martínez', 4, 1, 1946, 'http://prpcma.net', 'info@prpcma.net', '948201339'),
(24, 'A00000024', 'OpWeRo', 'Optimized Web Rodríguez', 5, 1, 1961, 'http://opwero.net', 'info@opwero.net', '931518072'),
(25, 'A00000025', 'MaPaMa', 'Maximized Papelería Martínez', 6, 1, 1863, 'http://mapama.net', 'info@mapama.net', '925091217'),
(26, 'A00000026', 'PrCoCa', 'Prepared Comp. Mov. Cabaleiro', 3, 1, 1914, NULL, 'info@prcoca.net', '981067631'),
(27, 'A00000027', 'OpPaMa', 'Optimized Papelería Martínez', 6, 1, 1913, 'http://oppama.net', 'info@oppama.net', '910096063'),
(28, 'A00000028', 'ExPaRo', 'Extrem Papelería Rodríguez', 6, 1, 1922, 'http://exparo.net', 'info@exparo.net', '945087019'),
(29, 'A00000029', 'NuEnTr', 'Nuevo Envíos Troncoso', 1, 1, 2018, 'http://nuentr.net', 'info@nuentr.net', '937092180'),
(30, 'A00000030', 'ExEnFe', 'Experienced Envíos Fernández', 1, 2, 1962, 'http://exenfe.net', 'info@exenfe.net', '965982643'),
(31, 'A00000031', 'ExEnCa', 'Experienced Envíos Cabaleiro', 1, 1, 1925, NULL, 'info@exenca.net', '995135249'),
(32, 'A00000032', 'ExCaMa', 'Extrem Cartones Martínez', 7, 1, 1917, 'http://excama.net', 'info@excama.net', '901235058'),
(33, 'A00000033', 'ExCaGo', 'Extrem Cartones González', 7, 2, 1878, 'http://excago.net', 'info@excago.net', '931788422'),
(34, 'A00000034', 'PrWeJu', 'Prepared Web Juncal', 5, 3, 1957, 'http://prweju.net', 'info@prweju.net', '901102245'),
(35, 'A00000035', 'ImWeTr', 'Improved Web Troncoso', 5, 1, 1915, 'http://imwetr.net', 'info@imwetr.net', '945060848'),
(36, 'A00000036', 'SePaJu', 'Series Papelería Juncal', 6, 1, 1851, NULL, 'info@sepaju.net', '941724408'),
(37, 'A00000037', 'UlPaAc', 'Ultra Papelería Acuña', 6, 3, 1855, 'http://ulpaac.net', 'info@ulpaac.net', '945435761'),
(38, 'A00000038', 'ExWeNo', 'Extrem Web Novas', 5, 1, 1944, 'http://exweno.net', 'info@exweno.net', '940321157'),
(39, 'A00000039', 'VaWeCa', 'Valuable Web Cabaleiro', 5, 2, 1994, 'http://vaweca.net', 'info@vaweca.net', '939628841'),
(40, 'A00000040', 'BeEnFe', 'Best Envíos Ferreira', 1, 1, 1875, 'http://beenfe.net', 'info@beenfe.net', '976772786'),
(41, 'A00000041', 'BeWeCa', 'Best Web Cabaleiro', 5, 2, 1900, NULL, 'info@beweca.net', '955077188'),
(42, 'A00000042', 'CuCoMa', 'Custom Comp. Mov. Martínez', 3, 1, 1992, 'http://cucoma.net', 'info@cucoma.net', '931506210'),
(43, 'A00000043', 'UlCaFe', 'Ultra Cartones Ferreira', 7, 1, 1962, 'http://ulcafe.net', 'info@ulcafe.net', '981467761'),
(44, 'A00000044', 'CuPCFe', 'Custom PC Parts Ferreira', 4, 3, 1918, 'http://cupcfe.net', 'info@cupcfe.net', '955150786'),
(45, 'A00000045', 'BeObMa', 'Better Obras Martínez', 2, 2, 1997, 'http://beobma.net', 'info@beobma.net', '929836530'),
(46, 'A00000046', 'VaEnAc', 'Valuable Envíos Acuña', 1, 3, 1883, NULL, 'info@vaenac.net', '956145230'),
(47, 'A00000047', 'UlWeNo', 'Ultra Web Novas', 5, 1, 1909, 'http://ulweno.net', 'info@ulweno.net', '967055972'),
(48, 'A00000048', 'ExWeCa', 'Extrem Web Cabaleiro', 5, 1, 1988, 'http://exweca.net', 'info@exweca.net', '925877656'),
(49, 'A00000049', 'SeWeNa', 'Series Web Navarrete', 5, 3, 1916, 'http://sewena.net', 'info@sewena.net', '946555603'),
(50, 'A00000050', 'MaPaBa', 'Maximized Papelería Barros', 6, 3, 1987, 'http://mapaba.net', 'info@mapaba.net', '941659461'),
(51, 'A00000051', 'CuCaAr', 'Custom Cartones Areal', 7, 2, 1880, NULL, 'info@cucaar.net', '946891312'),
(52, 'A00000052', 'ExCoMí', 'Extrem Comp. Mov. Míguez', 3, 1, 1967, 'http://excomí.net', 'info@excomí.net', '901934742'),
(53, 'A00000053', 'UlEnRo', 'Ultra Envíos Rodrigues', 1, 1, 1890, 'http://ulenro.net', 'info@ulenro.net', '931099543'),
(54, 'A00000054', 'MaCaAr', 'Maxi Cartones Areal', 7, 3, 2020, 'http://macaar.net', 'info@macaar.net', '953823066'),
(55, 'A00000055', 'VaObAc', 'Valuable Obras Acuña', 2, 1, 1877, 'http://vaobac.net', 'info@vaobac.net', '946005630'),
(56, 'A00000056', 'MaWeFe', 'Maxi Web Fernández', 5, 1, 1956, NULL, 'info@mawefe.net', '951317430'),
(57, 'A00000057', 'NuObTr', 'Nuevo Obras Troncoso', 2, 2, 1917, 'http://nuobtr.net', 'info@nuobtr.net', '965652349'),
(58, 'A00000058', 'NuPCAc', 'Nuevo PC Parts Acuña', 4, 1, 1903, 'http://nupcac.net', 'info@nupcac.net', '998194068'),
(59, 'A00000059', 'PrCoFe', 'Prepared Comp. Mov. Fernández', 3, 2, 1949, 'http://prcofe.net', 'info@prcofe.net', '962689314'),
(60, 'A00000060', 'BeCaAc', 'Best Cartones Acuña', 7, 1, 1883, 'http://becaac.net', 'info@becaac.net', '925467475'),
(61, 'A00000061', 'MaWePé', 'Maxi Web Pérez', 5, 1, 1998, NULL, 'info@mawepé.net', '923476850'),
(62, 'A00000062', 'MaPaTr', 'Maximized Papelería Troncoso', 6, 1, 1874, 'http://mapatr.net', 'info@mapatr.net', '912156135'),
(63, 'A00000063', 'OpCoTr', 'Optimized Comp. Mov. Troncoso', 3, 2, 1865, 'http://opcotr.net', 'info@opcotr.net', '936026199'),
(64, 'A00000064', 'MaCaPa', 'Maximized Cartones Paz', 7, 1, 1933, 'http://macapa.net', 'info@macapa.net', '912632206'),
(65, 'A00000065', 'CuWePa', 'Custom Web Paz', 5, 1, 1866, 'http://cuwepa.net', 'info@cuwepa.net', '986718207'),
(66, 'A00000066', 'BeCoCa', 'Better Comp. Mov. Cabaleiro', 3, 1, 1857, NULL, 'info@becoca.net', '982455590'),
(67, 'A00000067', 'OpWeFe', 'Optimized Web Fernández', 5, 1, 1880, 'http://opwefe.net', 'info@opwefe.net', '956153453'),
(68, 'A00000068', 'NuObPé', 'Nuevo Obras Pérez', 2, 2, 1852, 'http://nuobpé.net', 'info@nuobpé.net', '990297152'),
(69, 'A00000069', 'OpObAc', 'Optimized Obras Acuña', 2, 1, 1906, 'http://opobac.net', 'info@opobac.net', '966416244'),
(70, 'A00000070', 'ImPaGo', 'Improved Papelería González', 6, 2, 1869, 'http://impago.net', 'info@impago.net', '994513716'),
(71, 'A00000071', 'PrObCa', 'Prepared Obras Cabaleiro', 2, 3, 1897, NULL, 'info@probca.net', '900454233'),
(72, 'A00000072', 'SePCOr', 'Series PC Parts Orge', 4, 3, 1879, 'http://sepcor.net', 'info@sepcor.net', '956109079'),
(73, 'A00000073', 'VaWeRo', 'Valuable Web Rodríguez', 5, 1, 1926, 'http://vawero.net', 'info@vawero.net', '995374336'),
(74, 'A00000074', 'ExEnGo', 'Experienced Envíos González', 1, 3, 1861, 'http://exengo.net', 'info@exengo.net', '997733824'),
(75, 'A00000075', 'UlObMa', 'Ultra Obras Martínez', 2, 1, 2013, 'http://ulobma.net', 'info@ulobma.net', '989201492'),
(76, 'A00000076', 'ImPCFe', 'Improved PC Parts Fernández', 4, 2, 1903, NULL, 'info@impcfe.net', '997845728'),
(77, 'A00000077', 'VaWeMí', 'Valuable Web Míguez', 5, 2, 1943, 'http://vawemí.net', 'info@vawemí.net', '929625519'),
(78, 'A00000078', 'BeObNa', 'Better Obras Navarrete', 2, 1, 1923, 'http://beobna.net', 'info@beobna.net', '901577833'),
(79, 'A00000079', 'MaCoFe', 'Maxi Comp. Mov. Fernández', 3, 1, 1986, 'http://macofe.net', 'info@macofe.net', '913335993'),
(80, 'A00000080', 'MaCoAr', 'Maximized Comp. Mov. Areal', 3, 1, 1960, 'http://macoar.net', 'info@macoar.net', '958226173'),
(81, 'A00000081', 'VaCoPé', 'Valuable Comp. Mov. Pérez', 3, 1, 1981, NULL, 'info@vacopé.net', '987080616'),
(82, 'A00000082', 'OpEnAr', 'Optimized Envíos Areal', 1, 1, 1925, 'http://openar.net', 'info@openar.net', '987775347'),
(83, 'A00000083', 'ImWeBa', 'Improved Web Barros', 5, 1, 1989, 'http://imweba.net', 'info@imweba.net', '938032437'),
(84, 'A00000084', 'VaEnMa', 'Valuable Envíos Martínez', 1, 2, 1890, 'http://vaenma.net', 'info@vaenma.net', '928023851'),
(85, 'A00000085', 'MaCoMa', 'Maxi Comp. Mov. Martínez', 3, 3, 1918, 'http://macoma.net', 'info@macoma.net', '945077856'),
(86, 'A00000086', 'UlPCRo', 'Ultra PC Parts Rodrigues', 4, 2, 2005, NULL, 'info@ulpcro.net', '908048913'),
(87, 'A00000087', 'MaCoCa', 'Maxi Comp. Mov. Cabaleiro', 3, 2, 1899, 'http://macoca.net', 'info@macoca.net', '920757882'),
(88, 'A00000088', 'VaObAr', 'Valuable Obras Areal', 2, 1, 2019, 'http://vaobar.net', 'info@vaobar.net', '923906014'),
(89, 'A00000089', 'ExCoGo', 'Extrem Comp. Mov. González', 3, 1, 1994, 'http://excogo.net', 'info@excogo.net', '966564388'),
(90, 'A00000090', 'VaCoJu', 'Valuable Comp. Mov. Juncal', 3, 1, 1995, 'http://vacoju.net', 'info@vacoju.net', '956167882'),
(91, 'A00000091', 'ExEnRo', 'Experienced Envíos Rodríguez', 1, 2, 1924, NULL, 'info@exenro.net', '988346270'),
(92, 'A00000092', 'BeCaMa', 'Better Cartones Martínez', 7, 3, 1957, 'http://becama.net', 'info@becama.net', '929098129'),
(93, 'A00000093', 'VaEnCa', 'Valuable Envíos Cabaleiro', 1, 2, 1960, 'http://vaenca.net', 'info@vaenca.net', '985001824'),
(94, 'A00000094', 'CuWeGo', 'Custom Web González', 5, 1, 1891, 'http://cuwego.net', 'info@cuwego.net', '994512272'),
(95, 'A00000095', 'VaObPa', 'Valuable Obras Paz', 2, 2, 1890, 'http://vaobpa.net', 'info@vaobpa.net', '946078629'),
(96, 'A00000096', 'MaCaJu', 'Maximized Cartones Juncal', 7, 1, 1972, NULL, 'info@macaju.net', '908110586'),
(97, 'A00000097', 'OpPaMa', 'Optimized Papelería Martínez', 6, 1, 1965, 'http://oppama.net', 'info@oppama.net', '936627986'),
(98, 'A00000098', 'SeCaCa', 'Series Cartones Cabaleiro', 7, 1, 1949, 'http://secaca.net', 'info@secaca.net', '921229994'),
(99, 'A00000099', 'MaWeBa', 'Maxi Web Barros', 5, 1, 2008, 'http://maweba.net', 'info@maweba.net', '976410751'),
(100, 'A00000100', 'MaPaTr', 'Maxi Papelería Troncoso', 6, 3, 1894, 'http://mapatr.net', 'info@mapatr.net', '954604340'),
(101, 'A00000101', 'OpObJu', 'Optimized Obras Juncal', 2, 3, 1902, NULL, 'info@opobju.net', '949275236'),
(102, 'A00000102', 'VaCoMa', 'Valuable Comp. Mov. Martínez', 3, 2, 1985, 'http://vacoma.net', 'info@vacoma.net', '980327507'),
(103, 'A00000103', 'NuPaGo', 'Nuevo Papelería González', 6, 1, 1958, 'http://nupago.net', 'info@nupago.net', '951429476'),
(104, 'A00000104', 'UlPaMa', 'Ultra Papelería Martínez', 6, 3, 1894, 'http://ulpama.net', 'info@ulpama.net', '913074835'),
(105, 'A00000105', 'PrPCRo', 'Prepared PC Parts Rodríguez', 4, 2, 1948, 'http://prpcro.net', 'info@prpcro.net', '995118309'),
(106, 'A00000106', 'OpWeTr', 'Optimized Web Troncoso', 5, 1, 1915, NULL, 'info@opwetr.net', '914266682'),
(107, 'A00000107', 'BeCaMí', 'Best Cartones Míguez', 7, 1, 1882, 'http://becamí.net', 'info@becamí.net', '945440401'),
(108, 'A00000108', 'OpEnPé', 'Optimized Envíos Pérez', 1, 2, 1902, 'http://openpé.net', 'info@openpé.net', '967305619'),
(109, 'A00000109', 'ImObNo', 'Improved Obras Novas', 2, 1, 1926, 'http://imobno.net', 'info@imobno.net', '929848476'),
(110, 'A00000110', 'OpEnRo', 'Optimized Envíos Rodríguez', 1, 3, 1908, 'http://openro.net', 'info@openro.net', '902757193'),
(111, 'A00000111', 'NuCaFe', 'Nuevo Cartones Fernández', 7, 1, 1919, NULL, 'info@nucafe.net', '962396127'),
(112, 'A00000112', 'SeEnRo', 'Series Envíos Rodríguez', 1, 1, 1940, 'http://seenro.net', 'info@seenro.net', '905529538'),
(113, 'A00000113', 'ImObMí', 'Improved Obras Míguez', 2, 2, 1907, 'http://imobmí.net', 'info@imobmí.net', '950772254'),
(114, 'A00000114', 'OpObNo', 'Optimized Obras Novas', 2, 1, 1925, 'http://opobno.net', 'info@opobno.net', '906996942'),
(115, 'A00000115', 'ExObAc', 'Extrem Obras Acuña', 2, 1, 1979, 'http://exobac.net', 'info@exobac.net', '960723778'),
(116, 'A00000116', 'BeObFe', 'Best Obras Ferreira', 2, 1, 1935, NULL, 'info@beobfe.net', '919782178'),
(117, 'A00000117', 'OpCoMa', 'Optimized Comp. Mov. Martínez', 3, 1, 1945, 'http://opcoma.net', 'info@opcoma.net', '918205092'),
(118, 'A00000118', 'ImCaMa', 'Improved Cartones Martínez', 7, 1, 1893, 'http://imcama.net', 'info@imcama.net', '994892627'),
(119, 'A00000119', 'MaPaGo', 'Maxi Papelería González', 6, 1, 1988, 'http://mapago.net', 'info@mapago.net', '954304319'),
(120, 'A00000120', 'UlCaCa', 'Ultra Cartones Cabaleiro', 7, 3, 1984, 'http://ulcaca.net', 'info@ulcaca.net', '942355340'),
(121, 'A00000121', 'ExWeOr', 'Experienced Web Orge', 5, 2, 2021, NULL, 'info@exweor.net', '952027366'),
(122, 'A00000122', 'BeWeRo', 'Better Web Rodríguez', 5, 1, 1874, 'http://bewero.net', 'info@bewero.net', '948183979'),
(123, 'A00000123', 'SeEnFe', 'Series Envíos Fernández', 1, 1, 2007, 'http://seenfe.net', 'info@seenfe.net', '967192827'),
(124, 'A00000124', 'ImEnJu', 'Improved Envíos Juncal', 1, 1, 1854, 'http://imenju.net', 'info@imenju.net', '926563585'),
(125, 'A00000125', 'BeCaRo', 'Better Cartones Rodríguez', 7, 3, 1994, 'http://becaro.net', 'info@becaro.net', '903960250'),
(126, 'A00000126', 'PrEnFe', 'Prepared Envíos Fernández', 1, 2, 1909, NULL, 'info@prenfe.net', '992062258'),
(127, 'A00000127', 'MaCaCa', 'Maxi Cartones Cabaleiro', 7, 1, 1908, 'http://macaca.net', 'info@macaca.net', '948078173'),
(128, 'A00000128', 'PrCaAc', 'Prepared Cartones Acuña', 7, 1, 1992, 'http://prcaac.net', 'info@prcaac.net', '994206238'),
(129, 'A00000129', 'BeObPé', 'Better Obras Pérez', 2, 1, 2003, 'http://beobpé.net', 'info@beobpé.net', '958521358'),
(130, 'A00000130', 'UlCaRo', 'Ultra Cartones Rodríguez', 7, 3, 1895, 'http://ulcaro.net', 'info@ulcaro.net', '950064541'),
(131, 'A00000131', 'MaWeBa', 'Maximized Web Barros', 5, 1, 1941, NULL, 'info@maweba.net', '950781146'),
(132, 'A00000132', 'UlObAc', 'Ultra Obras Acuña', 2, 1, 1976, 'http://ulobac.net', 'info@ulobac.net', '995398608'),
(133, 'A00000133', 'MaPCAr', 'Maximized PC Parts Areal', 4, 3, 1999, 'http://mapcar.net', 'info@mapcar.net', '978197711'),
(134, 'A00000134', 'PrCoTr', 'Prepared Comp. Mov. Troncoso', 3, 3, 1938, 'http://prcotr.net', 'info@prcotr.net', '961907263'),
(135, 'A00000135', 'BePCRo', 'Best PC Parts Rodríguez', 4, 1, 1978, 'http://bepcro.net', 'info@bepcro.net', '982691565'),
(136, 'A00000136', 'UlCoNa', 'Ultra Comp. Mov. Navarrete', 3, 1, 1885, NULL, 'info@ulcona.net', '938731235'),
(137, 'A00000137', 'ExPCPé', 'Experienced PC Parts Pérez', 4, 1, 1850, 'http://expcpé.net', 'info@expcpé.net', '908080337'),
(138, 'A00000138', 'SeObCa', 'Series Obras Cabaleiro', 2, 1, 1915, 'http://seobca.net', 'info@seobca.net', '970317098'),
(139, 'A00000139', 'BeWePé', 'Better Web Pérez', 5, 2, 1939, 'http://bewepé.net', 'info@bewepé.net', '933769307'),
(140, 'A00000140', 'SePaCa', 'Series Papelería Cabaleiro', 6, 3, 2015, 'http://sepaca.net', 'info@sepaca.net', '916168218'),
(141, 'A00000141', 'BeWePé', 'Best Web Pérez', 5, 1, 1885, NULL, 'info@bewepé.net', '985197646'),
(142, 'A00000142', 'ImObMa', 'Improved Obras Martínez', 2, 2, 2016, 'http://imobma.net', 'info@imobma.net', '910398072'),
(143, 'A00000143', 'ExCoNa', 'Experienced Comp. Mov. Navarrete', 3, 1, 1922, 'http://excona.net', 'info@excona.net', '962832573'),
(144, 'A00000144', 'ImPCAc', 'Improved PC Parts Acuña', 4, 1, 1948, 'http://impcac.net', 'info@impcac.net', '945009406'),
(145, 'A00000145', 'MaEnPé', 'Maxi Envíos Pérez', 1, 1, 1919, 'http://maenpé.net', 'info@maenpé.net', '997981421'),
(146, 'A00000146', 'VaPCPa', 'Valuable PC Parts Paz', 4, 3, 1932, NULL, 'info@vapcpa.net', '967483075'),
(147, 'A00000147', 'BePCPa', 'Better PC Parts Paz', 4, 1, 2021, 'http://bepcpa.net', 'info@bepcpa.net', '932774090'),
(148, 'A00000148', 'ExObFe', 'Extrem Obras Ferreira', 2, 1, 1904, 'http://exobfe.net', 'info@exobfe.net', '964120771'),
(149, 'A00000149', 'MaCaTr', 'Maximized Cartones Troncoso', 7, 2, 1896, 'http://macatr.net', 'info@macatr.net', '961236120'),
(150, 'A00000150', 'VaCaJu', 'Valuable Cartones Juncal', 7, 1, 1895, 'http://vacaju.net', 'info@vacaju.net', '954793042'),
(151, 'A00000151', 'ExCaJu', 'Experienced Cartones Juncal', 7, 1, 1965, NULL, 'info@excaju.net', '920423537'),
(152, 'A00000152', 'ImPaMí', 'Improved Papelería Míguez', 6, 2, 1932, 'http://impamí.net', 'info@impamí.net', '995932486'),
(153, 'A00000153', 'OpCoPa', 'Optimized Comp. Mov. Paz', 3, 3, 1860, 'http://opcopa.net', 'info@opcopa.net', '913857982'),
(154, 'A00000154', 'UlEnRo', 'Ultra Envíos Rodrigues', 1, 3, 1984, 'http://ulenro.net', 'info@ulenro.net', '957557675'),
(155, 'A00000155', 'MaObMí', 'Maximized Obras Míguez', 2, 1, 1984, 'http://maobmí.net', 'info@maobmí.net', '929452605'),
(156, 'A00000156', 'SeEnAr', 'Series Envíos Areal', 1, 2, 1850, NULL, 'info@seenar.net', '941706080'),
(157, 'A00000157', 'NuCoOr', 'Nuevo Comp. Mov. Orge', 3, 1, 1996, 'http://nucoor.net', 'info@nucoor.net', '968160337'),
(158, 'A00000158', 'PrCaBa', 'Prepared Cartones Barros', 7, 1, 1873, 'http://prcaba.net', 'info@prcaba.net', '924941658'),
(159, 'A00000159', 'SeCaPa', 'Series Cartones Paz', 7, 1, 1919, 'http://secapa.net', 'info@secapa.net', '935028337'),
(160, 'A00000160', 'VaPCRo', 'Valuable PC Parts Rodrigues', 4, 1, 1910, 'http://vapcro.net', 'info@vapcro.net', '911146521'),
(161, 'A00000161', 'ExCaCa', 'Experienced Cartones Cabaleiro', 7, 1, 2006, NULL, 'info@excaca.net', '985516071'),
(162, 'A00000162', 'BeEnPé', 'Better Envíos Pérez', 1, 1, 1959, 'http://beenpé.net', 'info@beenpé.net', '963387060'),
(163, 'A00000163', 'BeCaRo', 'Best Cartones Rodrigues', 7, 3, 1930, 'http://becaro.net', 'info@becaro.net', '957461658'),
(164, 'A00000164', 'VaPCRo', 'Valuable PC Parts Rodríguez', 4, 1, 1856, 'http://vapcro.net', 'info@vapcro.net', '970632317'),
(165, 'A00000165', 'OpWeGo', 'Optimized Web González', 5, 1, 1853, 'http://opwego.net', 'info@opwego.net', '921299350'),
(166, 'A00000166', 'ImPaOr', 'Improved Papelería Orge', 6, 2, 1905, NULL, 'info@impaor.net', '949067449'),
(167, 'A00000167', 'SeCaAr', 'Series Cartones Areal', 7, 1, 1862, 'http://secaar.net', 'info@secaar.net', '921319642'),
(168, 'A00000168', 'ExCaMa', 'Extrem Cartones Martínez', 7, 1, 1914, 'http://excama.net', 'info@excama.net', '918121354'),
(169, 'A00000169', 'SeWeFe', 'Series Web Ferreira', 5, 1, 2013, 'http://sewefe.net', 'info@sewefe.net', '901414333'),
(170, 'A00000170', 'ExPaAc', 'Experienced Papelería Acuña', 6, 2, 1997, 'http://expaac.net', 'info@expaac.net', '985174420'),
(171, 'A00000171', 'UlCoBa', 'Ultra Comp. Mov. Barros', 3, 3, 1978, NULL, 'info@ulcoba.net', '948588971'),
(172, 'A00000172', 'NuCaCa', 'Nuevo Cartones Cabaleiro', 7, 1, 1959, 'http://nucaca.net', 'info@nucaca.net', '923320626'),
(173, 'A00000173', 'BeCoCa', 'Best Comp. Mov. Cabaleiro', 3, 2, 1904, 'http://becoca.net', 'info@becoca.net', '901246373'),
(174, 'A00000174', 'MaEnPé', 'Maxi Envíos Pérez', 1, 1, 1979, 'http://maenpé.net', 'info@maenpé.net', '911235267'),
(175, 'A00000175', 'PrPaCa', 'Prepared Papelería Cabaleiro', 6, 2, 1862, 'http://prpaca.net', 'info@prpaca.net', '987579035'),
(176, 'A00000176', 'UlCaRo', 'Ultra Cartones Rodríguez', 7, 1, 1874, NULL, 'info@ulcaro.net', '927380947'),
(177, 'A00000177', 'VaCoPé', 'Valuable Comp. Mov. Pérez', 3, 1, 1976, 'http://vacopé.net', 'info@vacopé.net', '910835200'),
(178, 'A00000178', 'NuPCPé', 'Nuevo PC Parts Pérez', 4, 3, 1955, 'http://nupcpé.net', 'info@nupcpé.net', '989882703'),
(179, 'A00000179', 'MaWeTr', 'Maxi Web Troncoso', 5, 1, 1978, 'http://mawetr.net', 'info@mawetr.net', '921242711'),
(180, 'A00000180', 'SeCaRo', 'Series Cartones Rodrigues', 7, 1, 1901, 'http://secaro.net', 'info@secaro.net', '976894802'),
(181, 'A00000181', 'SePaCa', 'Series Papelería Cabaleiro', 6, 1, 1965, NULL, 'info@sepaca.net', '912478917'),
(182, 'A00000182', 'MaWeOr', 'Maximized Web Orge', 5, 3, 1940, 'http://maweor.net', 'info@maweor.net', '949883350'),
(183, 'A00000183', 'SePaAc', 'Series Papelería Acuña', 6, 3, 1912, 'http://sepaac.net', 'info@sepaac.net', '917225526'),
(184, 'A00000184', 'CuCaPa', 'Custom Cartones Paz', 7, 1, 1900, 'http://cucapa.net', 'info@cucapa.net', '946313060'),
(185, 'A00000185', 'ExWePa', 'Experienced Web Paz', 5, 3, 1918, 'http://exwepa.net', 'info@exwepa.net', '981685969'),
(186, 'A00000186', 'SeWeTr', 'Series Web Troncoso', 5, 1, 2015, NULL, 'info@sewetr.net', '978714578'),
(187, 'A00000187', 'ImEnRo', 'Improved Envíos Rodrigues', 1, 1, 1890, 'http://imenro.net', 'info@imenro.net', '995669783'),
(188, 'A00000188', 'NuObFe', 'Nuevo Obras Fernández', 2, 1, 2011, 'http://nuobfe.net', 'info@nuobfe.net', '932665557'),
(189, 'A00000189', 'ExCaOr', 'Experienced Cartones Orge', 7, 1, 1984, 'http://excaor.net', 'info@excaor.net', '908932066'),
(190, 'A00000190', 'MaCoNo', 'Maxi Comp. Mov. Novas', 3, 1, 2006, 'http://macono.net', 'info@macono.net', '937787744'),
(191, 'A00000191', 'ImCoOr', 'Improved Comp. Mov. Orge', 3, 2, 1955, NULL, 'info@imcoor.net', '974840888'),
(192, 'A00000192', 'MaEnPa', 'Maximized Envíos Paz', 1, 1, 1951, 'http://maenpa.net', 'info@maenpa.net', '921531270'),
(193, 'A00000193', 'VaWePa', 'Valuable Web Paz', 5, 3, 1892, 'http://vawepa.net', 'info@vawepa.net', '926844650'),
(194, 'A00000194', 'ImEnMí', 'Improved Envíos Míguez', 1, 1, 1988, 'http://imenmí.net', 'info@imenmí.net', '951040821'),
(195, 'A00000195', 'NuWeOr', 'Nuevo Web Orge', 5, 2, 1957, 'http://nuweor.net', 'info@nuweor.net', '993957452'),
(196, 'A00000196', 'CuPaOr', 'Custom Papelería Orge', 6, 1, 1966, NULL, 'info@cupaor.net', '923353006'),
(197, 'A00000197', 'SeCoMa', 'Series Comp. Mov. Martínez', 3, 1, 1974, 'http://secoma.net', 'info@secoma.net', '936576591'),
(198, 'A00000198', 'MaEnRo', 'Maximized Envíos Rodrigues', 1, 2, 2005, 'http://maenro.net', 'info@maenro.net', '945245781'),
(199, 'A00000199', 'BePaMí', 'Best Papelería Míguez', 6, 3, 1891, 'http://bepamí.net', 'info@bepamí.net', '968509466'),
(200, 'A00000200', 'ExObPa', 'Experienced Obras Paz', 2, 2, 1950, 'http://exobpa.net', 'info@exobpa.net', '925998081');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aux_continente`
--
ALTER TABLE `aux_continente`
  ADD PRIMARY KEY (`id_continente`);

--
-- Indexes for table `aux_tipo_proveedor`
--
ALTER TABLE `aux_tipo_proveedor`
  ADD PRIMARY KEY (`id_tipo_proveedor`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `proveedor2_UN` (`cif`),
  ADD KEY `proveedor_FK` (`id_continente`),
  ADD KEY `proveedor_FK_1` (`id_tipo_proveedor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aux_continente`
--
ALTER TABLE `aux_continente`
  MODIFY `id_continente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aux_tipo_proveedor`
--
ALTER TABLE `aux_tipo_proveedor`
  MODIFY `id_tipo_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Restricións para os envorcados das táboas
--

--
-- Restricións para a táboa `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_FK` FOREIGN KEY (`id_continente`) REFERENCES `aux_continente` (`id_continente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `proveedor_FK_1` FOREIGN KEY (`id_tipo_proveedor`) REFERENCES `aux_tipo_proveedor` (`id_tipo_proveedor`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
