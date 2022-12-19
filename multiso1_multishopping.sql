-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jul-2022 às 00:19
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `multiso1_multishopping`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caracteristics`
--

CREATE TABLE `caracteristics` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idCarrinho` int(10) UNSIGNED NOT NULL,
  `idCliente` int(10) UNSIGNED NOT NULL,
  `idImagem_produto` int(10) UNSIGNED NOT NULL,
  `idLoja` int(10) UNSIGNED NOT NULL,
  `idCategoria` int(10) UNSIGNED NOT NULL,
  `idProduto` int(10) UNSIGNED NOT NULL,
  `data_inclusao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(16, 'Cosméticos', '2022-05-05 21:25:26', '2022-05-05 21:25:26'),
(17, 'Moda Masculina', '2022-05-05 21:25:56', '2022-05-05 21:25:56'),
(19, 'Eletrónicos', '2022-05-17 14:31:21', '2022-05-17 14:31:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `category_livros`
--

CREATE TABLE `category_livros` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `category_livros`
--

INSERT INTO `category_livros` (`id`, `nome`, `created_at`, `updated_at`) VALUES
(5, 'Romance', '2022-05-02 11:19:54', '2022-05-02 11:19:54'),
(6, 'Aventura', '2022-05-02 11:20:05', '2022-05-02 11:20:05'),
(7, 'Biografias e Memórias', '2022-05-02 11:20:27', '2022-05-02 11:20:27'),
(8, 'Ficção', '2022-05-02 11:20:44', '2022-05-02 11:20:44'),
(9, 'Ficção Fantástica', '2022-05-02 11:21:05', '2022-05-02 11:21:05'),
(10, 'Ficção científica', '2022-05-02 11:21:16', '2022-05-02 11:21:16'),
(11, 'Contos e Crônicas', '2022-05-02 11:21:32', '2022-05-02 11:21:32'),
(12, 'Infanto e Juvenil', '2022-05-02 11:21:54', '2022-05-02 11:21:54'),
(13, 'Policial', '2022-05-02 11:22:10', '2022-05-02 11:22:10'),
(14, 'Humor', '2022-05-02 11:22:35', '2022-05-02 11:22:35'),
(15, 'Poemas e Poesias', '2022-05-02 11:22:49', '2022-05-02 11:22:49'),
(16, 'Suspense e terror', '2022-05-02 11:23:04', '2022-05-02 11:23:04'),
(17, 'Artes e músicas', '2022-05-02 11:23:15', '2022-05-02 11:23:15'),
(18, 'Administração e economia', '2022-05-02 11:23:27', '2022-05-02 11:23:27'),
(19, 'Direito', '2022-05-02 11:23:44', '2022-05-02 11:23:44'),
(20, 'Política', '2022-05-02 11:23:50', '2022-05-02 11:23:50'),
(21, 'Filosofia', '2022-05-02 11:23:59', '2022-05-02 11:23:59'),
(22, 'Didáticos', '2022-05-02 11:24:17', '2022-05-02 11:24:17'),
(23, 'Concurso público', '2022-05-02 11:24:26', '2022-05-02 11:24:26'),
(24, 'Informática', '2022-05-02 11:24:42', '2022-05-02 11:24:42'),
(25, 'História', '2022-05-02 11:24:51', '2022-05-02 11:24:51'),
(26, 'Gastronomia', '2022-05-02 11:24:58', '2022-05-02 11:24:58'),
(27, 'Humanas e sociais', '2022-05-02 11:25:10', '2022-05-02 11:25:10'),
(28, 'Psicologia', '2022-05-02 11:25:26', '2022-05-02 11:25:26'),
(29, 'Nutrição e dieta', '2022-05-02 11:25:41', '2022-05-02 11:25:41'),
(30, 'Ciências', '2022-05-02 11:25:50', '2022-05-02 11:25:50'),
(31, 'Saúde, medicina', '2022-05-02 11:26:06', '2022-05-02 11:26:06'),
(32, 'Auto-ajuda', '2022-05-02 11:26:20', '2022-05-02 11:26:20'),
(33, 'Auto-ajuda', '2022-05-02 11:26:35', '2022-05-02 11:26:35'),
(34, 'Esportes e jogos', '2022-05-02 11:29:13', '2022-05-02 11:29:13'),
(35, 'Espiritualidade', '2022-05-02 11:29:29', '2022-05-02 11:29:29'),
(36, 'Turismo e guias de viagens', '2022-05-02 11:29:49', '2022-05-02 11:29:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `nome`, `email`, `senha`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Milagres Jr', 'milagrestobjr@gmail.com', '$2y$10$suMv1o0.ZcYbqEzYZeo7YuUX2uJlQ0bt.WfBiAY.QxXhobF4LfhCG', 'Ativo', '2022-05-01 19:43:45', '2022-05-01 19:43:45'),
(14, 'Salomão Albino', 'Salomao.ms2022@gmail.com', '$2y$10$z3cQppnutiJYmWUmCsgbEub/ws2gRFEV.PzlJ1LNt016csF3ptKn6', 'Ativo', '2022-05-02 11:01:21', '2022-05-02 11:01:21'),
(16, 'Manuel Gomes', 'manu@gmail.com', '$2y$10$QigqsazOHZpzGB9K5b3pF.HCIt1vGLlhr0D6D9Opk2OwpMwzSLRqW', 'Ativo', '2022-05-25 13:01:17', '2022-05-25 13:01:17'),
(17, 'Adriano Gomes', 'adriano@gmail.com', '$2y$10$FcN/5/Uegx0AYqt6mP3Ud.i.Aiw4FmjJ1.ETaYVf/CZQwTAjMB5qS', 'Ativo', '2022-06-27 21:46:13', '2022-06-27 21:46:13'),
(18, 'Quimbuadi Gonçalves', '941675544', '$2y$10$MGwsRj57b6owuSRk39VJY.i6OuK/DXxSiutBXDKN9O2y..Cv47J5S', 'Ativo', '2022-07-07 03:49:11', '2022-07-07 03:49:11'),
(19, 'Carlos Alberto', '991332214', '$2y$10$JZlKWg0pZvSOvHWtInPMTOEVoLOfuqiVoknKF7u8Z/ZgXC4mdY2nq', 'Ativo', '2022-07-07 04:02:48', '2022-07-07 04:02:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compras`
--

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `total_pago` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_bancarios`
--

CREATE TABLE `dados_bancarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `numero_conta` int(11) NOT NULL,
  `iban` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banco` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `dados_bancarios`
--

INSERT INTO `dados_bancarios` (`id`, `client_id`, `numero_conta`, `iban`, `banco`, `created_at`, `updated_at`) VALUES
(2, 16, 2345678, '000076554432366', 'BPC', '2022-05-25 16:37:47', '2022-05-25 16:37:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `downloads`
--

CREATE TABLE `downloads` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `livro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `downloads`
--

INSERT INTO `downloads` (`id`, `client_id`, `livro_id`, `created_at`, `updated_at`) VALUES
(4, 13, 19, '2022-05-17 18:14:00', '2022-05-17 18:14:00'),
(16, 16, 19, '2022-05-25 14:33:15', '2022-05-25 14:33:15'),
(17, 16, 19, '2022-05-25 14:34:19', '2022-05-25 14:34:19'),
(18, 13, 19, '2022-05-27 12:02:14', '2022-05-27 12:02:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `download_pays`
--

CREATE TABLE `download_pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `livro_id` int(10) UNSIGNED NOT NULL,
  `plano` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_limite` date NOT NULL,
  `statu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `download_pays`
--

INSERT INTO `download_pays` (`id`, `client_id`, `livro_id`, `plano`, `data_limite`, `statu`, `created_at`, `updated_at`) VALUES
(3, 13, 19, '1', '2022-06-24', 'Inativo', '2022-05-24 14:41:30', '2022-05-24 14:41:30'),
(7, 13, 19, '1', '2022-06-24', 'Inativo', '2022-05-24 16:48:55', '2022-05-24 16:48:55'),
(8, 13, 19, '1', '2022-06-24', 'Inativo', '2022-05-24 16:51:59', '2022-05-24 16:51:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(10) UNSIGNED NOT NULL,
  `provincia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `casa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estrelas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens_categoria`
--

CREATE TABLE `imagens_categoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagem` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `imagens_categoria`
--

INSERT INTO `imagens_categoria` (`id`, `imagem`, `categoria_id`, `created_at`, `updated_at`) VALUES
(12, 'imagem_inicial.jpg', 16, '2022-05-05 21:25:26', '2022-05-05 21:25:26'),
(13, 'imagem_inicial.jpg', 17, '2022-05-05 21:25:56', '2022-05-05 21:25:56'),
(15, 'imagem_inicial.jpg', 19, '2022-05-17 14:31:21', '2022-05-17 14:31:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens_product`
--

CREATE TABLE `imagens_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagem` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `imagens_product`
--

INSERT INTO `imagens_product` (`id`, `imagem`, `product_id`, `created_at`, `updated_at`) VALUES
(91, 'fKV6hvNotbW4Qe3zttGuWrTxYxydqwm5zleSiS79.jpg', 76, '2022-06-28 01:48:28', '2022-06-28 01:48:28'),
(92, 'His7hfLaxx2oQjzXmIawXJcOd5TJWSAHGukgVDk9.jpg', 77, '2022-06-28 01:50:00', '2022-06-28 01:50:00'),
(93, 'evsw5jiuAWf1fPtBo22Kn8oYXhtyc3dYJ1Djfmfn.jpg', 78, '2022-06-28 01:53:25', '2022-06-28 01:53:25'),
(94, 'JpbKcBE9TIJ6OhyYuepTqypI2mJt00Fs7peXjj0e.jpg', 79, '2022-06-28 01:54:51', '2022-06-28 01:54:51'),
(95, 'F3UJUxJ4VLmuQk4qKpZ4lLGGePDVvePNSlEdbo0v.jpg', 80, '2022-06-28 01:56:05', '2022-06-28 01:56:05'),
(96, 'dszmE5bX58uWPXAy0eRZ0y6kfncKZOh02C7bACPe.jpg', 81, '2022-06-28 01:56:42', '2022-06-28 01:56:42'),
(97, 'fsUDgIs0RYXjh0TtUqjR7ECqoHJrbgldvrxwubIq.jpg', 82, '2022-06-28 02:00:38', '2022-06-28 02:00:38'),
(98, 'zq49PgbCrF5USkvsTQNPU88cs3VCK0rhtfklxZkj.jpg', 83, '2022-06-28 02:03:37', '2022-06-28 02:03:37'),
(99, 'TVrr2ACn88rE6Ek3P0GDoNJEJF4AjunwKyfedyyT.jpg', 84, '2022-06-28 02:07:36', '2022-06-28 02:07:36'),
(100, 'DKMakGM16goMdtpkeBF0C3WuDxh5AAZQbM0eEsT7.jpg', 85, '2022-06-28 02:10:46', '2022-06-28 02:10:46'),
(101, 'UPd4E0QM25NzLJJsPsICMEbv8rFNE74CstiiErqg.jpg', 86, '2022-06-28 21:48:17', '2022-06-28 21:48:17'),
(102, 'E7r1IIIzJzuf915uIxeMdwwDsSCAHw0xppCJ4Du4.jpg', 87, '2022-06-28 21:53:37', '2022-06-28 21:53:37'),
(103, '8wVKwE2KSLSTwfK174lW5BALxytkhSr7WokWuWYN.jpg', 88, '2022-06-28 22:09:29', '2022-06-28 22:09:29'),
(104, '7eojZTls0wkJfC5bIlLW9uNqR0CJDCi024S7w09a.jpg', 89, '2022-06-28 22:10:07', '2022-06-28 22:10:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem_capa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_pdf` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_epub` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `category_id`, `titulo`, `autor`, `descricao`, `imagem_capa`, `file_pdf`, `file_epub`, `created_at`, `updated_at`) VALUES
(19, 5, 'Timone de Beauvoir_ a Mulher de Montparnasse', 'Caroline Bernard', 'Meu livro preferido..', '3MIxCkxogunGF0Z3PIKAuaTLAxIO7n8zzDK94d3f.jpg', NULL, '6sfGkUDZ04xZ80MWmwn62qgRnSwrYpBzT72Anh1u.epub', '2022-05-16 12:26:47', '2022-05-16 12:26:47'),
(20, 28, 'Fique rico e viva feliz', 'Lauro Araujo', 'Melhor livro do mundo..', 'kTJJ6JWNHHVVQhItnqx5EcK8svj2cl2puRijMJkY.jpg', 'Fique rico e viva feliz.pdf', NULL, '2022-06-11 00:20:42', '2022-06-11 00:20:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `idMensagem` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL,
  `texto` text NOT NULL,
  `data` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_02_25_223914_create_users_table', 1),
(2, '2022_02_25_223948_create_clients_table', 1),
(3, '2022_02_25_224027_create_categories_table', 1),
(4, '2022_02_25_224204_create_caracteristics_table', 1),
(5, '2022_02_25_224243_create_newsletters_table', 1),
(6, '2022_02_25_224336_create_imagens_categoria_table', 1),
(7, '2022_02_24_224843_create_sub_categories_table', 2),
(8, '2022_02_25_224415_create_products_table', 3),
(9, '2022_02_25_224456_create_compras_table', 3),
(10, '2022_02_25_224543_create_product_carac_table', 3),
(11, '2022_02_25_224707_create_avaliacao_table', 3),
(12, '2022_02_25_224802_create_imagens_product_table', 3),
(13, '2022_02_25_225403_create_enderecos_table', 3),
(14, '2022_03_15_003030_create_pedidos_table', 4),
(15, '2022_03_15_003130_create_pedido_produtos_table', 4),
(16, '2022_03_16_175103_create_category_livros_table', 5),
(17, '2022_03_17_173739_create_livros_table', 5),
(18, '2022_03_23_014148_create_downloads_table', 6),
(19, '2022_03_31_114231_create_points_table', 7),
(20, '2022_03_31_161638_create_dados_bancarios_table', 8),
(21, '2022_03_31_211937_create_pub_livros_table', 9),
(22, '2022_04_02_235214_create_evaluations_table', 10),
(23, '2022_04_03_140937_create_product_caracteristics_table', 11),
(24, '2022_04_21_142825_create_promocoes_table', 12),
(25, '2022_04_28_211728_create_reset_passwords_table', 13),
(26, '2022_05_19_094317_create_download_pay_table', 14),
(27, '2022_05_19_110532_create_plano_client_table', 15),
(28, '2022_05_22_160128_create_plano1_table', 15),
(29, '2022_05_24_094317_create_download_pay_table', 16),
(30, '2022_05_25_174828_create_points_total_table', 17),
(31, '2022_05_26_141306_create_notifications_table', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `notificacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `notifications`
--

INSERT INTO `notifications` (`id`, `notificacao`, `statu`, `created_at`, `updated_at`) VALUES
(1, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, solicitou o levanto dos seus pontos.\nEnviar o código por Email \nEm: 26-May-2022', 'Vista', '2022-05-26 14:30:58', '2022-06-10 23:55:08'),
(2, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, solicitou o levanto dos seus pontos.\nEnviar o código por Whastapp \nEm: 26-May-2022', 'Vista', '2022-05-26 14:33:19', '2022-05-26 15:26:30'),
(3, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, solicitou o levanto dos seus pontos.\nEnviar o código por SMS de Texto Normal \nEm: 26-May-2022', 'Vista', '2022-05-26 14:34:41', '2022-06-10 23:55:16'),
(4, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, solicitou o levanto dos seus pontos.\nEnviar o código por Whastapp \nEm: 26-May-2022', 'Vista', '2022-05-26 14:35:49', '2022-06-10 23:54:59'),
(5, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, solicitou o levanto dos seus pontos.\nEnviar o código por Whastapp \nEm: 26-May-2022', 'Vista', '2022-05-26 14:36:12', '2022-05-26 16:17:42'),
(6, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, assinou o Plano MS-Ultimate.', 'Vista', '2022-05-27 15:58:06', '2022-06-10 23:54:51'),
(7, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, assinou o Plano MS-Ultimate.', 'Vista', '2022-05-27 16:01:11', '2022-06-10 23:54:43'),
(8, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, assinou o Plano MS-Ultimate.', 'Vista', '2022-05-27 16:13:39', '2022-06-10 23:54:35'),
(9, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, assinou o Plano MS-Ultimate.', 'Vista', '2022-05-27 16:15:02', '2022-06-10 23:54:27'),
(10, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, assinou o Plano MS-Ultimate.', 'Vista', '2022-05-27 16:15:40', '2022-06-10 23:54:21'),
(11, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, solicitou o levanto dos seus pontos.\nEnviar o código por Email.', 'Vista', '2022-05-27 20:50:35', '2022-05-30 22:02:33'),
(12, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, assinou o Plano MS-Ultimate.', 'Vista', '2022-05-27 20:52:47', '2022-05-30 22:02:19'),
(13, 'O cliente Milagres Jr com o email milagrestobjr@gmail.com, assinou o Plano MS-Premium.', 'Vista', '2022-05-30 22:00:10', '2022-06-10 23:54:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `status` enum('RE','PA','CA','AP','FI') COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` int(11) DEFAULT NULL,
  `nome_empresa` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_referenca` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informacao_pedido` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forma_pagamento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `client_id`, `status`, `telefone`, `nome_empresa`, `provincia`, `endereco`, `local_referenca`, `informacao_pedido`, `forma_pagamento`, `created_at`, `updated_at`) VALUES
(12, 13, 'AP', 941608052, 'Praça da Mulheres', 'Luanda', 'Cacuaco Vill', 'Praça da Mulheres', NULL, 'Pagamento na entrega', '2022-05-16 19:02:00', '2022-05-16 20:05:00'),
(13, 13, 'FI', 941608052, 'Praça da Mulheres', 'Luanda', 'Cacuaco Vill', 'Praça da Mulheres', NULL, 'Pagamento por transferencia', '2022-05-17 13:47:24', '2022-05-17 14:26:15'),
(14, 13, 'FI', 941608052, 'Praça da Mulheres', 'Luanda', 'Cacuaco Vill', 'Praça da Mulheres', NULL, 'Pagamento por transferencia', '2022-05-17 16:27:13', '2022-05-26 13:03:29'),
(15, 13, 'FI', 941608052, 'Praça da Mulheres', 'Luanda', 'Cacuaco Vill', 'Praça da Mulheres', NULL, 'Pagamento na entrega', '2022-05-17 17:44:46', '2022-05-26 13:02:56'),
(16, 13, 'FI', 941608052, 'Praça da Mulheres', 'Luanda', 'Cacuaco Vill', 'Praça da Mulheres', NULL, 'Pagamento na entrega', '2022-05-17 17:48:59', '2022-05-25 17:13:15'),
(17, 13, 'FI', 941608052, 'Praça da Mulheres', 'Luanda', 'Cacuaco Vill', 'Praça da Mulheres', NULL, 'Pagamento na entrega', '2022-05-22 10:21:41', '2022-05-25 17:15:02'),
(18, 16, 'FI', 941608052, 'Praça da Mulheres', 'Luanda', 'Cacuaco Vill', 'Praça da Mulheres', NULL, 'Pagamento por transferencia', '2022-05-25 14:59:16', '2022-05-25 17:31:39'),
(19, 16, 'FI', 941608052, 'Praça da Mulheres', 'Luanda', 'Cacuaco Vill', 'Praça da Mulheres', NULL, 'Pagamento por transferencia', '2022-05-25 17:32:26', '2022-05-25 17:36:38'),
(20, 13, 'AP', 941608052, 'Praça da Mulheres', 'Luanda', 'Cacuaco Vill', 'Praça da Mulheres', NULL, 'Pagamento por transferencia', '2022-05-31 11:58:42', '2022-06-01 08:47:06'),
(26, 19, 'RE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-08 00:06:59', '2022-07-08 00:06:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_produtos`
--

CREATE TABLE `pedido_produtos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `status` enum('RE','PA','CA','AP','FI') COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `desconto` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedido_produtos`
--

INSERT INTO `pedido_produtos` (`id`, `pedido_id`, `product_id`, `status`, `valor`, `desconto`, `created_at`, `updated_at`) VALUES
(70, 26, 87, 'RE', '134000.00', '0.00', '2022-07-08 00:07:00', '2022-07-08 00:07:00'),
(71, 26, 87, 'RE', '134000.00', '0.00', '2022-07-08 00:07:08', '2022-07-08 00:07:08'),
(72, 26, 89, 'RE', '20000.00', '0.00', '2022-07-08 00:07:28', '2022-07-08 00:07:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano1`
--

CREATE TABLE `plano1` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `statu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_limite` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `plano1`
--

INSERT INTO `plano1` (`id`, `client_id`, `statu`, `data_limite`, `created_at`, `updated_at`) VALUES
(1, 13, 'Ativo', '2022-06-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano_client`
--

CREATE TABLE `plano_client` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `plano` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_limite` date NOT NULL,
  `statu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `plano_client`
--

INSERT INTO `plano_client` (`id`, `client_id`, `plano`, `data_limite`, `statu`, `created_at`, `updated_at`) VALUES
(1, 13, '1', '2022-06-24', 'Inativo', '2022-05-24 14:35:41', '2022-05-24 14:35:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `points`
--

CREATE TABLE `points` (
  `id` int(10) UNSIGNED NOT NULL,
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `pontos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `points`
--

INSERT INTO `points` (`id`, `pedido_id`, `client_id`, `pontos`, `created_at`, `updated_at`) VALUES
(7, 18, 16, 12000, '2022-05-25 17:31:39', '2022-05-25 17:31:39'),
(9, 19, 16, 300, '2022-05-25 17:36:38', '2022-05-25 17:36:38'),
(10, 15, 16, 450, '2022-05-26 13:02:56', '2022-05-26 13:02:56'),
(11, 14, 16, 600, '2022-05-26 13:03:29', '2022-05-26 13:03:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `points_total`
--

CREATE TABLE `points_total` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `ponto_total` int(11) NOT NULL,
  `total_retirado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `points_total`
--

INSERT INTO `points_total` (`id`, `client_id`, `ponto_total`, `total_retirado`, `created_at`, `updated_at`) VALUES
(2, 16, 0, 12000, '2022-05-25 17:31:39', '2022-05-26 13:02:03'),
(3, 16, 10050, NULL, '2022-05-26 13:02:56', '2022-05-26 13:03:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `descricao` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `subcategoria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `nome`, `preco`, `descricao`, `quantidade`, `categoria_id`, `subcategoria_id`, `created_at`, `updated_at`) VALUES
(76, 'Brow blue Demon', '49000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, sunt at corporis mollitia vero neque architecto earum. Quae inventore ex m', 5, 16, 23, '2022-06-28 01:48:27', '2022-06-28 01:48:27'),
(77, 'Brow blue Demon', '49000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, sunt at corporis mollitia vero neque architecto earum. Quae inventore ex m', 5, 16, 23, '2022-06-28 01:50:00', '2022-06-28 01:50:00'),
(78, 'Cavalier', '25000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, \r\n    sunt at corporis mollitia vero neque architecto earum. Quae inventor', 7, 16, 23, '2022-06-28 01:53:25', '2022-06-28 01:53:25'),
(79, 'Excite Violet', '15000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, \r\n    sunt at corporis mollitia vero neque architecto earum. Quae inventor', 6, 16, 23, '2022-06-28 01:54:51', '2022-06-28 01:54:51'),
(80, 'Epic Adventure', '75000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, \r\n    sunt at corporis mollitia vero neque architecto earum. Quae inventor', 3, 16, 23, '2022-06-28 01:56:04', '2022-06-28 01:56:04'),
(81, 'Hot Black', '30000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, \r\n    sunt at corporis mollitia vero neque architecto earum. Quae inventor', 6, 16, 23, '2022-06-28 01:56:42', '2022-06-28 01:56:42'),
(82, 'Curious Britney Spear', '20000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, \r\n    sunt at corporis mollitia vero neque architecto earum. Quae inventor', 8, 16, 23, '2022-06-28 02:00:38', '2022-06-28 02:00:38'),
(83, 'Genesis Oud Malaki', '44000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, \r\n    sunt at corporis mollitia vero neque architecto earum. Quae inventor', 7, 16, 23, '2022-06-28 02:03:37', '2022-06-28 02:03:37'),
(84, 'La vie est belle', '15000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, \r\n    sunt at corporis mollitia vero neque architecto earum. Quae inventor', 5, 16, 23, '2022-06-28 02:07:36', '2022-06-28 02:07:36'),
(85, 'Flora by Flora', '30000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laudantium cumque dignissimos impedit recusandae rem quia cum, \r\n    sunt at corporis mollitia vero neque architecto earum. Quae inventor', 3, 16, 23, '2022-06-28 02:10:45', '2022-06-28 02:10:45'),
(86, 'Relaxo Brown', '134000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing eli', 34, 17, 24, '2022-06-28 21:48:17', '2022-06-28 21:48:17'),
(87, 'Puma Dark blue', '134000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing eli', 6, 17, 24, '2022-06-28 21:53:37', '2022-06-28 21:53:37'),
(88, 'Air Nike White/Blue', '20000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing eli', 6, 17, 24, '2022-06-28 22:09:29', '2022-06-28 22:09:29'),
(89, 'Air Nike White/Red', '20000.00', 'Lorem ipsum dolor sit amet, consectetur adipisicing eli', 4, 17, 24, '2022-06-28 22:10:07', '2022-06-28 22:10:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_carac`
--

CREATE TABLE `product_carac` (
  `id` int(10) UNSIGNED NOT NULL,
  `valor_caract` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `caracteristic_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_caracteristics`
--

CREATE TABLE `product_caracteristics` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `caracteristic_id` int(10) UNSIGNED NOT NULL,
  `valor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes`
--

CREATE TABLE `promocoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `porcentagem` int(11) NOT NULL,
  `data_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pub_livros`
--

CREATE TABLE `pub_livros` (
  `id` int(10) UNSIGNED NOT NULL,
  `tema` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pensamento_dia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `autor` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conteudo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reset_passwords`
--

CREATE TABLE `reset_passwords` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `reset_passwords`
--

INSERT INTO `reset_passwords` (`id`, `codigo`, `email`, `created_at`, `updated_at`) VALUES
(20, '3A9IZIW', 'milagrestobjr@gmail.com', '2022-05-03 00:01:13', '2022-05-03 00:01:13'),
(21, 'OYNRCNY', 'milagrestobjr@gmail.com', '2022-05-03 00:05:33', '2022-05-03 00:05:33'),
(22, 'TB6V0AO', 'milagrestobjr@gmail.com', '2022-05-03 00:05:59', '2022-05-03 00:05:59'),
(23, 'CG7MUAF', 'milagrestobjr@gmail.com', '2022-05-03 00:06:29', '2022-05-03 00:06:29'),
(24, 'UZ3XFD7', 'milagrestobjr@gmail.com', '2022-05-03 00:07:13', '2022-05-03 00:07:13'),
(25, 'E94JGVN', 'milagrestobjr@gmail.com', '2022-05-03 00:14:09', '2022-05-03 00:14:09'),
(26, '2P0RVVW', 'milagrestobjr@gmail.com', '2022-05-03 01:41:05', '2022-05-03 01:41:05'),
(27, 'HWXGNWI', 'milagrestobjr@gmail.com', '2022-05-03 01:42:13', '2022-05-03 01:42:13'),
(28, '045I10V', 'milagrestobjr@gmail.com', '2022-05-03 01:43:27', '2022-05-03 01:43:27'),
(29, 'DWUOFIQ', 'multisocial.geral@gmail.com', '2022-05-03 01:44:00', '2022-05-03 01:44:00'),
(30, 'WM0XO2J', 'milagrestobjr@gmail.com', '2022-05-03 01:55:22', '2022-05-03 01:55:22'),
(31, 'QHA3E8W', 'milagrestobjr@gmail.com', '2022-05-03 09:13:58', '2022-05-03 09:13:58'),
(32, 'BVE3IBS', 'milagrestobjr@gmail.com', '2022-05-03 09:15:08', '2022-05-03 09:15:08'),
(33, '9XPGOCT', 'milagrestobjr@gmail.com', '2022-05-03 10:11:09', '2022-05-03 10:11:09'),
(34, 'KJZ1TVX', 'milagrestobjr@gmail.com', '2022-05-03 10:16:54', '2022-05-03 10:16:54'),
(35, '2GSFW0X', 'milagrestobjr@gmail.com', '2022-05-03 10:22:43', '2022-05-03 10:22:43'),
(36, 'DI49WPM', 'milagrestobjr@gmail.com', '2022-05-03 10:27:20', '2022-05-03 10:27:20'),
(37, '13MXL1T', 'multisocial.geral@gmail.com', '2022-05-03 10:59:23', '2022-05-03 10:59:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `nome`, `categoria_id`, `created_at`, `updated_at`) VALUES
(22, 'Telemóveis', 19, '2022-05-17 14:31:39', '2022-05-17 14:31:39'),
(23, 'Perfumes', 16, '2022-06-28 01:45:49', '2022-06-28 01:45:49'),
(24, 'Tenis', 17, '2022-06-28 21:46:24', '2022-06-28 21:46:24'),
(25, 'Computadores', 19, '2022-07-07 19:03:03', '2022-07-07 19:03:03'),
(26, 'Camisas', 17, '2022-07-07 19:03:19', '2022-07-07 19:03:19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `permissao`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Multisocial', 'multisocial.geral@gmail.com', '$2y$10$EgsIsYXYYGUo81u5HqzKROfHTj9xXbUbY3e/dKv0HssC5BtSeBxvS', 'Administrador', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `caracteristics`
--
ALTER TABLE `caracteristics`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`idCarrinho`),
  ADD KEY `carrinho_FKIndex1` (`idProduto`),
  ADD KEY `carrinho_FKIndex2` (`idCategoria`),
  ADD KEY `carrinho_FKIndex3` (`idLoja`),
  ADD KEY `carrinho_FKIndex4` (`idImagem_produto`),
  ADD KEY `carrinho_FKIndex5` (`idCliente`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `category_livros`
--
ALTER TABLE `category_livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_product_id_foreign` (`product_id`),
  ADD KEY `compras_client_id_foreign` (`client_id`);

--
-- Índices para tabela `dados_bancarios`
--
ALTER TABLE `dados_bancarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dados_bancarios_client_id_foreign` (`client_id`);

--
-- Índices para tabela `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_client_id_foreign` (`client_id`),
  ADD KEY `downloads_livro_id_foreign` (`livro_id`);

--
-- Índices para tabela `download_pays`
--
ALTER TABLE `download_pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `download_pays_client_id_foreign` (`client_id`),
  ADD KEY `download_pays_livro_id_foreign` (`livro_id`);

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enderecos_client_id_foreign` (`client_id`);

--
-- Índices para tabela `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_client_id_foreign` (`client_id`),
  ADD KEY `evaluations_product_id_foreign` (`product_id`);

--
-- Índices para tabela `imagens_categoria`
--
ALTER TABLE `imagens_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagens_categoria_categoria_id_foreign` (`categoria_id`);

--
-- Índices para tabela `imagens_product`
--
ALTER TABLE `imagens_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imagens_product_product_id_foreign` (`product_id`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livros_category_id_foreign` (`category_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_client_id_foreign` (`client_id`);

--
-- Índices para tabela `pedido_produtos`
--
ALTER TABLE `pedido_produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_produtos_pedido_id_foreign` (`pedido_id`),
  ADD KEY `pedido_produtos_product_id_foreign` (`product_id`);

--
-- Índices para tabela `plano1`
--
ALTER TABLE `plano1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plano1_client_id_foreign` (`client_id`);

--
-- Índices para tabela `plano_client`
--
ALTER TABLE `plano_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plano_client_client_id_foreign` (`client_id`);

--
-- Índices para tabela `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `points_pedido_id_foreign` (`pedido_id`),
  ADD KEY `points_client_id_foreign` (`client_id`);

--
-- Índices para tabela `points_total`
--
ALTER TABLE `points_total`
  ADD PRIMARY KEY (`id`),
  ADD KEY `points_total_client_id_foreign` (`client_id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categoria_id_foreign` (`categoria_id`),
  ADD KEY `products_subcategoria_id_foreign` (`subcategoria_id`);

--
-- Índices para tabela `product_carac`
--
ALTER TABLE `product_carac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_carac_product_id_foreign` (`product_id`),
  ADD KEY `product_carac_caracteristic_id_foreign` (`caracteristic_id`);

--
-- Índices para tabela `product_caracteristics`
--
ALTER TABLE `product_caracteristics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_caracteristics_product_id_foreign` (`product_id`),
  ADD KEY `product_caracteristics_caracteristic_id_foreign` (`caracteristic_id`);

--
-- Índices para tabela `promocoes`
--
ALTER TABLE `promocoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promocoes_product_id_foreign` (`product_id`);

--
-- Índices para tabela `pub_livros`
--
ALTER TABLE `pub_livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reset_passwords`
--
ALTER TABLE `reset_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_categoria_id_foreign` (`categoria_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `caracteristics`
--
ALTER TABLE `caracteristics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `category_livros`
--
ALTER TABLE `category_livros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `dados_bancarios`
--
ALTER TABLE `dados_bancarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `download_pays`
--
ALTER TABLE `download_pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `imagens_categoria`
--
ALTER TABLE `imagens_categoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `imagens_product`
--
ALTER TABLE `imagens_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `pedido_produtos`
--
ALTER TABLE `pedido_produtos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `plano1`
--
ALTER TABLE `plano1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `plano_client`
--
ALTER TABLE `plano_client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `points`
--
ALTER TABLE `points`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `points_total`
--
ALTER TABLE `points_total`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `product_carac`
--
ALTER TABLE `product_carac`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `product_caracteristics`
--
ALTER TABLE `product_caracteristics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `promocoes`
--
ALTER TABLE `promocoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pub_livros`
--
ALTER TABLE `pub_livros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `reset_passwords`
--
ALTER TABLE `reset_passwords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `compras_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `dados_bancarios`
--
ALTER TABLE `dados_bancarios`
  ADD CONSTRAINT `dados_bancarios_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `downloads_livro_id_foreign` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `download_pays`
--
ALTER TABLE `download_pays`
  ADD CONSTRAINT `download_pays_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `download_pays_livro_id_foreign` FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `imagens_categoria`
--
ALTER TABLE `imagens_categoria`
  ADD CONSTRAINT `imagens_categoria_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `imagens_product`
--
ALTER TABLE `imagens_product`
  ADD CONSTRAINT `imagens_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_livros` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `pedido_produtos`
--
ALTER TABLE `pedido_produtos`
  ADD CONSTRAINT `pedido_produtos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_produtos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `plano1`
--
ALTER TABLE `plano1`
  ADD CONSTRAINT `plano1_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `plano_client`
--
ALTER TABLE `plano_client`
  ADD CONSTRAINT `plano_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `points_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `points_total`
--
ALTER TABLE `points_total`
  ADD CONSTRAINT `points_total_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategoria_id_foreign` FOREIGN KEY (`subcategoria_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `product_carac`
--
ALTER TABLE `product_carac`
  ADD CONSTRAINT `product_carac_caracteristic_id_foreign` FOREIGN KEY (`caracteristic_id`) REFERENCES `caracteristics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_carac_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `product_caracteristics`
--
ALTER TABLE `product_caracteristics`
  ADD CONSTRAINT `product_caracteristics_caracteristic_id_foreign` FOREIGN KEY (`caracteristic_id`) REFERENCES `caracteristics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_caracteristics_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `promocoes`
--
ALTER TABLE `promocoes`
  ADD CONSTRAINT `promocoes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
