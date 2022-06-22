SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

#ATENCAO
#SUBSTITUA #__ PELO PREFIXO DE SEU BANCO DE DADOS (EXEMPLO: jos_)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP TABLE IF EXISTS `#__biblioteca_livro`;
CREATE TABLE IF NOT EXISTS `#__biblioteca_livro` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`titulo` varchar(250) NOT NULL DEFAULT '',
	`alias` varchar(255) NOT NULL DEFAULT '',
	`autorid` int(11) NOT NULL DEFAULT '0',
	`state` tinyint(1) NOT NULL default '0',
	`imagem` varchar(255) NOT NULL,
	`editora` varchar(250) NOT NULL DEFAULT '',
	`ano_publicacao` varchar(12) NOT NULL DEFAULT '',
	`url` varchar(255) NOT NULL,
	`descricao` TEXT,
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`ordering` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `#__biblioteca_autor`;
CREATE TABLE IF NOT EXISTS `#__biblioteca_autor` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`nome` varchar(250) NOT NULL DEFAULT '',
	`alias` varchar(255) NOT NULL DEFAULT '',
	`state` tinyint(1) NOT NULL default '0',
	`imagem` varchar(255) NOT NULL,
	`url` varchar(255) NOT NULL,
	`descricao` TEXT,
	`publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`ordering` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


INSERT INTO `#__biblioteca_livro` (`id`, `titulo`, `alias`, `autorid`, `state`, `imagem`, `editora`, `ano_publicacao`, `url`, `descricao`, `publish_up`, `publish_down`, `ordering`) VALUES
(1, 'Dom Casmurro', '', 1, 1, 'images/com_biblioteca/dom-casmurro.jpg', 'Principis', '2019', 'https://www.amazon.com.br/Dom-Casmurro-Machado-Assis/dp/859431860X/ref=sr_1_2?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=3F2WNFTTVWMAT&keywords=dom+casmurro&qid=1655690027&sprefix=dom+cas%2Caps%2C418&sr=8-2', '<p>Em Dom Casmurro, o narrador <strong>Bento Santiago</strong> retoma a infância que passou na Rua de Matacavalos e conta a história do amor e das desventuras que viveu com <strong>Capitu</strong>, uma das personagens mais enigmáticas e intrigantes da literatura brasileira. Nas páginas deste romance, encontra-se a versão de um homem perturbado pelo ciúme, que revela aos poucos sua psicologia complexa e enreda o leitor em sua narrativa ambígua acerca do acontecimento ou não do adultério da mulher com olhos de ressaca, uma das maiores polêmicas da literatura brasileira.</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 'O Reacionário', '', 3, 1, 'images/com_biblioteca/reacionario.jpg', 'Nova Fronteira', '2021', 'https://www.amazon.com.br/reacion%C3%A1rio-Nelson-Rodrigues/dp/6556402087/ref=sr_1_2?__mk_pt_BR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=1EZIK3NETY4V&keywords=Nelson+Rodrigues&qid=1655690146&sprefix=nelson+rodrigue%2Caps%2C217&sr=8-2&ufe=app_do%3Aamzn1.fos.6a', '<blockquote>\r\n<p>Ao intitular seu último livro de O reacionário, epíteto que, de tanto ouvir ligado ao seu nome, Nelson Rodrigues decidiu assumir para si, o autor resumiu toda a sua história de polemista.</p>\r\n</blockquote>\r\n<p>Sua obra jornalística, por sua vez, não pode ser relegada simplesmente à polêmica. Como escreveu Gilberto Freyre no prefácio à primeira edição de O reacionário, “o escritor-jornalista ou o jornalista-escritor é o que sobrevive ao jornal. Pode resistir à prova tremenda de passar do jornal ao livro”. Nas 130 crônicas reunidas neste livro, publicadas entre março de 1967 e maio de 1974 nas colunas “Memórias” do Correio da Manhã e “Confissões” de O Globo, estão presentes ao mesmo tempo o vigor e a graça do estilo de Nelson Rodrigues.</p>\r\n<p>Prova de que, além de retratar uma época e contrariar o “bem pensar”, seus textos são alguns dos melhores momentos do gênero brasileiro por excelência, ao mesmo tempo jornalismo e literatura: a crônica.<img src=\"media/editors/tinymce/plugins/emoticons/img/smiley-smile.gif\" alt=\"smile\" /></p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, '12 Regras para a vida', '', 5, 1, 'images/com_biblioteca/12regras.jpeg', 'Alta Books', '2018', 'https://www.amazon.com.br/12-regras-para-vida-ant%C3%ADdoto/dp/8550802751/ref=zg_bs_books_10/142-8536068-0243247?pd_rd_i=8550802751&psc=1', '<p>Aclamado psicólogo clínico, <strong>Jordan Peterson</strong> tem influenciado a compreensão moderna sobre a personalidade e, agora, se transformou em um dos pensadores públicos mais populares do mundo, com suas palestras sobre tópicos que variam da bíblia, às relações amorosas e à mitologia, atraindo dezenas de milhões de espectadores. Em uma era de mudanças sem precedentes e polarização da política, sua mensagem franca e revigorante sobre o valor da responsabilidade individual e da sabedoria ancestral tem ecoado em todos os cantos do mundo. Neste livro, ele oferece doze princípios profundos e práticos sobre como viver uma vida com significado. A partir de exemplos vívidos de sua prática clínica e vida pessoal, bem como de lições extraídas das histórias e mitos mais antigos da humanidade, 12 Regras para a Vida oferece um antídoto para o caos em nossas vidas: verdades eternas aplicadas aos nossos problemas modernos.</p>\r\n<blockquote>\r\n<p>“Um dos pensadores mais importantes a surgir no cenário mundial em muitos anos.”</p>\r\n</blockquote>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'Por que fazemos o que fazemos?', '', 6, 1, 'images/com_biblioteca/porque-fazemos.jpg', 'Planeta', '2016', 'https://www.amazon.com.br/Por-que-Fazemos/dp/8542207416/ref=zg_bs_books_9/142-8536068-0243247?pd_rd_i=8542207416&psc=1', '<p><strong>Bateu aquela preguiça de ir para o escritório na segunda-feira? A falta de tempo virou uma constante? A rotina está tirando o prazer no dia a dia? Anda em dúvida sobre qual é o real objetivo de sua vida?</strong></p>\r\n<p>O filósofo e escritor Mario Sergio Cortella desvenda em Por que fazemos o que fazemos? as principais preocupações com relação ao trabalho. Dividido em vinte capítulos, ele aborda questões como a importância de ter uma vida com propósito, a motivação em tempos difíceis, os valores e a lealdade a si e ao seu emprego.</p>\r\n<p>O livro é um verdadeiro manual para todo mundo que tem uma carreira mas vive se questionando sobre o presente e o futuro. Recheado de ensinamentos como \'Paciência na turbulência, sabedoria na travessia\', é uma obra fundamental para quem sonha com realização profissional sem abrir mão da vida pessoal.</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 'Crônicas de Nárnia', '', 4, 1, 'images/com_biblioteca/narnia.jpg', 'WMF Martins Fontes', '2019', 'https://www.amazon.com.br/As-Cr%C3%B4nicas-N%C3%A1rnia-Brochura-Lewis/dp/857827069X/ref=zg_bs_books_32/142-8536068-0243247?pd_rd_i=857827069X&psc=1', '<p><strong>Viagens ao fim do mundo, criaturas fantásticas e batalhas épicas entre o bem e o mal - o que mais um leitor poderia querer de um livro?</strong> O livro que tem tudo isso é \'O leão, a feiticeira e o guarda-roupa\', escrito em 1949 por Clive Staples Lewis. MasLewis não parou por aí. Seis outros livros vieram depois e, juntos, ficaram conhecidos como \'As crônicas de Nárnia\'. Nos últimos cinqüenta anos, \'As crônicas de Nárnia\' transcenderam o gênero da fantasia para se tornar parte do cânone da literaturaclássica. Cada um dos sete livros é uma obra-prima, atraindo o leitor para um mundo em que a magia encontra a realidade, e o resultado é um mundo ficcional que tem fascinado gerações. <span style=\"text-decoration: underline;\"><em>Esta edição apresenta todas as sete crônicas integralmente, num único volume.</em> </span></p>\r\n<p>Os livros são apresentados de acordo com a ordem de preferência de Lewis, cada capítulo com uma ilustração do artista original, Pauline Baynes. Enganosamente simples e direta, \'As crônicas de Nárnia\' continuam cativando os leitores com aventuras, personagens e fatos que falam a pessoas de todas as idades.</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 'As Cinco Linguagens do Amor', '', 7, 1, 'images/com_biblioteca/5linguagens.jpg', 'Mundo Cristão', '2013', 'https://www.amazon.com.br/cinco-linguagens-amor-expressar-compromisso/dp/8573258926/ref=zg_bs_books_13/142-8536068-0243247?pd_rd_i=8573258926&psc=1', '<p>As diferenças gritantes no jeito de ser e de agir de homens e mulheres já não são novidade há tempos. O que continua sendo um dilema é como fazer dar certo uma relação entre duas pessoas que às vezes parecem ter vindo de planetas distintos. Compreender essas diferenças é parte da solução e é nisso que Gary Chapman vai ajudar você. Com mais de 30 anos de experiência no aconselhamento de casais, ele percebeu que cada um de nós adota uma linguagem pela qual damos e recebemos amor. <strong>Quando o casal não entende corretamente a linguagem predominante de cada um, a comunicação é afetada, impedindo que se sintam amados, aceitos e valorizados.</strong> Nesta terceira edição de sua clássica obra sobre relacionamentos, que já vendeu mais de 8 milhões de exemplares, Gary Chapman não só explica as cinco linguagens como apresenta um questionário para os maridos e outro para as esposas descobrirem a sua linguagem de amor.</p>\r\n<p>Além disso, uma seção especial de perguntas e respostas vai esclarecer todas as suas dúvidas e lhe dar o direcionamento sobre como expressar melhor seu amor a seu cônjuge e ajudará você a compreender a forma dele manifestar o amor. Gary Chapman identificou cinco formas através das quais as pessoas expressam e recebem as manifestações de amor: palavras de afirmação; tempo de qualidade; presentes; atos de serviço; toque físico. Aprendam, você e seu cônjuge, a se comunicar através dessas linguagens e experimentem como é ser realmente amado e compreendido.</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 'A Garota do Lago', '', 8, 1, 'images/com_biblioteca/garota-do-lago.jpg', 'Faro Editoral', '2017', 'https://www.amazon.com.br/Garota-do-Lago-Charlie-Donlea/dp/856240988X/ref=sr_1_1?crid=8EH4F1H165NL&keywords=a+garota+do+lago&qid=1655701955&s=books&sprefix=a+ga%2Cstripbooks%2C266&sr=1-1', '<p>Summit Lake, uma pequena cidade entre montanhas, é esse tipo de lugar, bucólico e com encantadoras casas dispostas à beira de um longo trecho de água intocada.Duas semanas atrás, a estudante de direito Becca Eckersley foi brutalmente assassinada em uma dessas casas. Filha de um poderoso advogado, Becca estava no auge de sua vida. Atraída instintivamente pela notícia, a repórter Kelsey Castle vai até a cidade para investigar o caso. <span style=\"font-size: 18pt;\"><strong>...E LOGO SE ESTABELECE UMA CONEXÃO ÍNTIMA QUANDO UM VIVO CAMINHA NAS MESMAS PEGADAS DOS MORTOS...</strong></span>E enquanto descobre sobre as amizades de Becca, sua vida amorosa e os segredos que ela guardava, a repórter fica cada vez mais convencida de que a verdade sobre o que aconteceu com Becca pode ser a chave para superar as marcas sombrias de seu próprio passado.</p>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

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
