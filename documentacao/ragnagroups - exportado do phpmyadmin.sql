-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Mar-2016 às 20:53
-- Versão do servidor: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ragnagroups`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `coments`
--

CREATE TABLE `coments` (
  `com_id` int(11) NOT NULL,
  `com_user_id` int(11) NOT NULL,
  `com_post_id` int(11) NOT NULL,
  `com_container` longtext NOT NULL,
  `com_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `coments`
--

INSERT INTO `coments` (`com_id`, `com_user_id`, `com_post_id`, `com_container`, `com_date`) VALUES
(5, 13, 40, 'erro', '2016-03-04 19:03:24'),
(7, 24, 40, 'Poem o tutorial ao e para de falar merda kkkk''', '2016-03-04 19:07:15'),
(9, 20, 40, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra ante ut ex faucibus, et facilisis nunc pharetra. Donec pulvinar interdum semper. Sed at tincidunt sem, aliquet fermentum arcu. Integer gravida semper commodo. Donec purus tortor, dictum nec interdum at, suscipit vitae lectus. Integer at porttitor nulla. Maecenas fermentum lacus at ultricies commodo. Nam volutpat magna sed justo maximus, in sodales ante placerat. Nulla nec lectus vitae arcu suscipit eleifend ut sit amet neque. Pellentesque in metus nec metus molestie tincidunt vel scelerisque risus. Sed auctor dolor congue, ornare nunc ut, lobortis sem. Sed finibus id tellus non tempor. Nulla eu vestibulum tortor. Proin non magna eget tortor euismod mattis sit amet quis nunc.', '2016-03-04 19:37:29'),
(14, 14, 40, 'Eita carai, geral comentando aqui, ai sim em kk', '2016-03-04 19:42:33'),
(15, 14, 39, 'Ah adm vai te foder', '2016-03-04 20:04:49'),
(19, 14, 26, 'No teu cu sua vaca', '2016-03-04 23:06:11'),
(20, 14, 26, 'Só entrar no Eden e entregar na missão correspondente', '2016-03-04 23:06:53'),
(23, 15, 26, 'Que isso Matheus, que ignorância da porra seu cuzao kkkk', '2016-03-04 23:08:43'),
(24, 15, 26, 'Isso aqui é um teste', '2016-03-04 23:09:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `post_container` longtext NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_top_id` int(11) NOT NULL,
  `post_user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`post_id`, `post_user_id`, `post_name`, `post_container`, `post_date`, `post_top_id`, `post_user_name`) VALUES
(1, 7, 'Como eu chego na ilha de Malangdo?', '', '2016-02-18 14:42:33', 18, ''),
(2, 0, 'Como eu viro algoz?', '', '2016-02-18 17:05:32', 3, ''),
(3, 0, 'Quest do elmo da valkiria', '', '2016-02-18 18:15:28', 0, ''),
(4, 0, 'Como eu pego os equipes do Eden?', '', '2016-02-19 14:11:35', 0, ''),
(5, 0, 'Como eu pego os equips do Eden?', '', '2016-02-19 14:13:14', 23, ''),
(6, 23, 'Gente meu rag está dando erro de dll, o que eu faço?', '', '2016-02-22 14:10:11', 25, 'amanda luciana'),
(7, 24, 'Estou tomando dc constantemente', '', '2016-02-22 14:52:26', 25, 'lucas vieira'),
(8, 15, 'Servidor Thor off?', '', '2016-02-22 16:07:42', 25, 'gustavo vieira'),
(13, 19, 'Jogo dando erro ao logar', 'Pessoal alguém já viu esse erro?', '2016-02-22 19:09:49', 0, '[ADM ] - Daniel Vieira'),
(14, 19, 'Alguém me ajuda???', 'O meu rag não quer abrir =/', '2016-02-22 19:16:00', 25, '[ADM ] - Daniel Vieira'),
(15, 19, 'Pessoal alguém sabe o que está acontecendo com o jogo', 'Não consigo logar a horas', '2016-02-22 19:16:37', 25, '[ADM ] - Daniel Vieira'),
(16, 19, 'Porra galera vou ensinar a refinar e encantar em Malangdo', 'Hoje..... aula...prints...etc', '2016-02-22 19:19:01', 31, '[ADM ] - Daniel Vieira'),
(17, 21, 'Pegando os equips do Eden', 'Vamos lá galera, bora para mais um tutorial hoje, rápido e fácil....Falar com..(print do npc) ...depois ir....fazer tal...', '2016-02-22 19:20:47', 28, 'luana da cunha'),
(18, 22, 'Como encanta asas de Arcanjo?', 'Alguém poderia me ajudar? Gostaria de deixar minhas asas de arcanjo assim :: foto', '2016-02-22 19:22:13', 31, 'carol mendes'),
(19, 24, 'Quest do elmo da Valkiria', 'Como eu faço o elmo da valk?', '2016-02-22 19:28:33', 32, 'lucas vieira'),
(20, 20, 'Matando Bafomé Selado', 'Pessoal segue meu vídeo dropando chifre misticos de bafomé, foi muito treta mas conseguimos', '2016-02-22 19:42:22', 27, 'michele castro'),
(21, 20, 'Como chegar no mapa do Hatii?', 'Alguém sabe como chego lá? Agradeço desde já. :3', '2016-02-22 19:43:09', 27, 'michele castro'),
(22, 20, 'Qual MVP mais forte do jogo?', 'Digam ai pessoal, sua lista dos 10 mvp''s mais forte do Ragnarok', '2016-02-22 19:44:06', 27, 'michele castro'),
(23, 15, 'Quest do Bio Lab', 'Muitas pessoas estão com dificuldade para fazer a quest do bio lab, então hoje eu vou ensinar como conseguir o passe', '2016-02-22 19:45:30', 32, 'gustavo vieira'),
(24, 15, 'Evoluindo os anéis do ifrit', 'Quer Anel do Vulcão? então segura..\r\nComo você já deve ter percebido, Ragnarök é um espaço que dá ao jogador infinitas possibilidades de construir sua história. Para tornar o jogo um dos Jogos de RPG mais desafiadores e divertidos foram criadas as Quests. \r\n', '2016-02-22 19:46:18', 28, 'gustavo vieira'),
(26, 22, 'Quest da avelã?', 'Onde entrego as avelãs?', '2016-02-23 12:26:00', 32, 'carol mendes'),
(27, 19, 'Ta ok, vou compartilhar meu conhecimento ¬¬''', 'Vamos lá rapaziada, go fazer a quest e pegar mais uma skill...', '2016-02-23 19:39:55', 14, '[ADM ] - daniel vieira'),
(29, 24, 'Leia com Atenção', 'As regras são as seguintes....', '2016-02-24 15:38:03', 29, 'lucas vieira'),
(30, 19, 'Tornando-se Mercenário', 'Todo mundo vive apanhando na hora de virar mercenário, principalmente no "labirinto invisível", hoje eu vou passar algumas dicas para ajudar a molecada.', '2016-02-24 16:00:02', 30, '[ADM ] - daniel vieira'),
(31, 19, 'Caçando os Esporos', 'Bora matar esporos, vou ensinar a chegar lá e como pode usufruir melhor dessa quest de xp', '2016-02-24 16:00:49', 28, '[ADM ] - daniel vieira'),
(33, 19, 'Build e Skills', 'É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparência similar a de um texto legível. Muitos softwares de publicação e editores de páginas na internet agora usam Lorem Ipsum como texto-modelo padrão, e uma rápida busca por ''lorem ipsum'' mostra vários websites ainda em sua fase de construção. Várias versões novas surgiram ao longo dos anos, eventualmente por acidente, e às vezes de propósito (injetando humor, e coisas do gênero).É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de "Conteúdo aqui, conteúdo aqui", fazendo com que ele tenha uma aparênc', '2016-03-03 20:49:15', 12, '[ADM ] - daniel vieira'),
(40, 13, 'Dono da Porra toda!', 'Se liga galera, hj vou mostrar meu sinx full cast.', '2016-03-04 12:07:51', 33, 'Luiz Carlos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `topics`
--

CREATE TABLE `topics` (
  `top_id` int(11) NOT NULL,
  `top_user_id` int(11) NOT NULL,
  `top_name` varchar(100) NOT NULL,
  `top_obj` varchar(100) NOT NULL,
  `top_post` varchar(500) NOT NULL,
  `top_container` varchar(500) NOT NULL,
  `top_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `top_user_name` varchar(50) NOT NULL,
  `top_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `topics`
--

INSERT INTO `topics` (`top_id`, `top_user_id`, `top_name`, `top_obj`, `top_post`, `top_container`, `top_date`, `top_user_name`, `top_status`) VALUES
(3, 7, 'Algoz', 'Tudo Sobre a classe algoz', 'Encantando armamentos nivel very hard', '', '2016-02-12 16:29:29', '', 1),
(6, 0, 'Tutorial de como upar', 'teste', 'Encantando armamentos nivel very hard', '', '2016-02-12 16:34:25', '', 0),
(7, 0, 'Como ser mito no pvp', 'vou ensinar a matar geral no pvp, vem com o pai.', 'Encantando armamentos nivel very hard', '', '2016-02-12 16:35:51', '', 0),
(8, 0, 'Regras do forum', 'Lista de regras e manuais de como se usar o fórum.', 'Encantando armamentos nivel very hard', '', '2016-02-12 16:36:47', '', 0),
(9, 0, 'junior', 'teste', 'Encantando armamentos nivel very hard', '', '2016-02-12 16:49:38', '', 0),
(10, 0, 'Aprediz', 'tudo sobre aprendiz', 'Encantando armamentos nivel very hard', '', '2016-02-12 16:51:24', '', 0),
(11, 0, 'Quest do justiceiro', 'teste do justiceiro', 'Encantando armamentos nivel very hard', '', '2016-02-12 16:51:57', '', 1),
(12, 0, 'Mestre Taekwon', 'Vou ensinar a usar as skills', 'Encantando armamentos nivel very hard', '', '2016-02-12 16:57:56', '', 1),
(13, 0, 'Sinx', 'teste do sincário', 'Encantando armamentos nivel very hard', '', '2016-02-12 14:18:36', '', 0),
(14, 0, 'Quest das Lâminas Aceleradas', 'Hoje vou ensinar a pegar essa maravilhosa skill do sinx, aumenta força de ataque e probabilidade de ', 'Encantando armamentos nivel very hard', '', '2016-02-12 17:39:27', '', 1),
(16, 0, 'Zerom', 'Vou mostrar como dropar a carta de forma mais rápida', 'Encantando armamentos nivel very hard', '', '2016-02-17 10:59:05', '', 0),
(17, 0, 'Anel do Senhor da Chama', 'Hoje eu vou ensinar a quest que "transforma" o anel Senhor da Chama em Anel do Vulcão', 'Encantando armamentos nivel very hard', '', '2016-02-17 11:22:34', '', 0),
(18, 0, 'Ilha Malangdo', 'O objetivo deste tópico é ensinar~passar informações sobre tudo que há na ilha dos felinos.', 'Encantando armamentos nivel very hard', '', '2016-02-17 11:31:00', '', 1),
(25, 12, 'Duvidas e Problemas técnicos', 'Aqui você reporta suas dúvidas com respeito a utilização do fórum ou qualquer problema no mesmo.', '', '', '2016-02-19 12:19:32', 'Felipe Rodrigues', 1),
(27, 14, 'Monster vs Player - MVP', 'Vamos cobrir todos mvp''s do jogo, seus drops, xp obtida, mapas e horários, etc', '', '', '2016-02-19 15:16:08', 'matheus almeida', 1),
(28, 9, 'Missões do Eden', 'Vamos depositar neste tópico todas dúvidas, dicas, etc, com repeito a missões no Eden', '', '', '2016-02-19 16:29:45', 'rodrigo rocha', 1),
(29, 19, 'Regras de utilização do fórum', 'Leia as regras', '', '', '2016-02-19 16:50:05', '[ADM ] - Daniel Vieira', 1),
(30, 19, 'Mudança de Classe', 'Post aqui suas dúvidas sobre mudanças de classe, qualquer classe.', '', '', '2016-02-19 19:09:32', '[ADM ] - Daniel Vieira', 1),
(31, 20, 'Refinamento e Encantamentos', 'Sendo ferreiro ou não, poste suas dúvidas sobre como encantar seus equips ou refina-los.', '', '', '2016-02-19 19:15:14', 'michele castro', 1),
(32, 24, 'Quests', 'Dentro deste tópico deve vai conter todas as quests do jogo, dúvidas com respeito a quests? Crie um ', '', '', '2016-02-22 19:24:18', 'lucas vieira', 1),
(33, 19, 'Guia de Up', 'O objetivo deste tópico é abordar o up do 1 ao 175, dando dicas de lugares para upar, equipamentos e', '', '', '2016-03-04 12:00:35', '[ADM ] - daniel vieira', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `ativo` char(2) DEFAULT NULL,
  `dataCad` date NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `user_dir` varchar(50) NOT NULL,
  `post` varchar(500) DEFAULT NULL,
  `topico` varchar(100) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `user_adm` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `nome`, `senha`, `email`, `ativo`, `dataCad`, `foto`, `user_dir`, `post`, `topico`, `ip`, `user_adm`) VALUES
(7, 'juuh0123', 'daniel vieira junior', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'danieljunior19942009@hotmail.com', 's', '2016-02-01', 'juuh0123.jpg', '', NULL, NULL, NULL, 0),
(11, 'junior.vieira', 'junior vieira', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'junior.vieira@hotmail.com', 's', '2016-02-15', 'junior.vieira.jpg', '', NULL, NULL, NULL, 0),
(12, 'felipe', 'Felipe Rodrigues', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'felipe@hotmail.com', 's', '2016-02-15', 'felipe.png', 'assetpictureprofilefelipe', NULL, NULL, NULL, 0),
(13, 'carlos', 'Luiz Carlos', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'carlos.luiz@gmail.com', 's', '2016-02-15', 'carlos.png', 'assetpictureprofile/carlos', NULL, NULL, NULL, 0),
(14, 'matheus', 'matheus almeida', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'matheus@gmail.com', 's', '2016-02-15', 'matheus.png', 'asset/picture/profile/matheus', NULL, NULL, NULL, 0),
(15, 'gustavo', 'gustavo vieira', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'gustavo@gmail.com', 's', '2016-02-15', 'gustavo.png', 'asset/picture/profile/gustavo', NULL, NULL, NULL, 0),
(16, 'marcos', 'Marcos guedes', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'marcos.guedes@tvglobo.com.br', 's', '2016-02-15', 'marcos.png', 'asset/picture/profile/marcos', NULL, NULL, NULL, 0),
(19, 'admin', '[ADM ] - daniel vieira', 'd0b09de91d77564fd58696dda2778dd0e8d50ec2', 'danieljunior19942009@gmail.com', 's', '2016-02-19', 'admin.png', 'asset/picture/profile/admin', NULL, NULL, NULL, 0),
(20, 'michele', 'michele castro', 'd0b09de91d77564fd58696dda2778dd0e8d50ec2', 'michele@gmail.com', 's', '2016-02-19', 'michele.jpg', 'asset/picture/profile/michele', NULL, NULL, '', 0),
(21, 'luana', 'luana da cunha', 'd0b09de91d77564fd58696dda2778dd0e8d50ec2', 'luana.cunha@gmail.com', 's', '2016-02-19', 'luana.png', 'asset/picture/profile/luana', NULL, NULL, '::1', 0),
(22, 'carol', 'carol mendes', 'd0b09de91d77564fd58696dda2778dd0e8d50ec2', 'carol@gmail.com', 's', '2016-02-22', 'carol.png', 'asset/picture/profile/carol', NULL, NULL, '::1', 0),
(23, 'amanda', 'amanda luciana', 'd0b09de91d77564fd58696dda2778dd0e8d50ec2', 'amanda.lemos@gmail.com', 's', '2016-02-22', 'amanda.png', 'asset/picture/profile/amanda', NULL, NULL, '::1', 0),
(24, 'lucas', 'lucas vieira', 'd0b09de91d77564fd58696dda2778dd0e8d50ec2', 'lucasvieira@gmail.com', 's', '2016-02-22', 'lucas.png', 'asset/picture/profile/lucas', NULL, NULL, '::1', 0),
(25, 'ronaldo', 'ronaldo cardoso', 'd0b09de91d77564fd58696dda2778dd0e8d50ec2', 'ronaldo@gmail.com', 's', '2016-02-23', NULL, 'asset/picture/profile/ronaldo', NULL, NULL, '::1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`top_id`),
  ADD UNIQUE KEY `top_name` (`top_name`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `top_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
