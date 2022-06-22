SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Dumping data for table `inst1_biblioteca_autor`
--

INSERT INTO `#__biblioteca_autor` (`id`, `nome`, `alias`, `state`, `imagem`, `url`, `descricao`, `publish_up`, `publish_down`, `ordering`) VALUES
(1, 'Machado de Assis', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'Nelson Rodrigues', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'C.S. Lewis', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'Jordan B. Peterson', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'Mario Sérgio Cortella', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'Gary Chapman', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 'Charlie Donlea', '', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;