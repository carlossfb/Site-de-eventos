-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Jun-2019 às 22:21
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sextou_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eventos`
--

CREATE TABLE `tb_eventos` (
  `id_evento` int(11) NOT NULL,
  `nome_evento` varchar(255) NOT NULL,
  `categoria_evento` varchar(255) DEFAULT NULL,
  `ddi_evento` varchar(255) NOT NULL,
  `celular_evento` varchar(20) NOT NULL,
  `telefone_evento` varchar(20) NOT NULL,
  `dia_evento` varchar(20) NOT NULL,
  `inicio_evento` varchar(20) NOT NULL,
  `termino_evento` varchar(20) NOT NULL,
  `ingressoh` int(5) NOT NULL,
  `ingressom` int(5) NOT NULL,
  `obs_evento` varchar(255) DEFAULT NULL,
  `email_evento` varchar(255) NOT NULL,
  `chek_evento` varchar(50) NOT NULL,
  `cep_evento` int(10) NOT NULL,
  `uf_evento` char(2) NOT NULL,
  `bairro_evento` varchar(255) DEFAULT NULL,
  `rua_evento` varchar(255) DEFAULT NULL,
  `cidade_evento` varchar(50) NOT NULL,
  `numero_evento` int(8) NOT NULL,
  `complemento_evento` varchar(255) DEFAULT NULL,
  `visu_eventos` int(11) NOT NULL,
  `id_postador` int(11) NOT NULL,
  `musicas` varchar(255) DEFAULT NULL,
  `data_envio` datetime NOT NULL,
  `visivel` varchar(20) DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_eventos`
--

INSERT INTO `tb_eventos` (`id_evento`, `nome_evento`, `categoria_evento`, `ddi_evento`, `celular_evento`, `telefone_evento`, `dia_evento`, `inicio_evento`, `termino_evento`, `ingressoh`, `ingressom`, `obs_evento`, `email_evento`, `chek_evento`, `cep_evento`, `uf_evento`, `bairro_evento`, `rua_evento`, `cidade_evento`, `numero_evento`, `complemento_evento`, `visu_eventos`, `id_postador`, `musicas`, `data_envio`, `visivel`) VALUES
(3, 'Quarta-Feira', 'musical, festivo', '55', '(11) 11232-222', '(11) 1123-2222', '2019-09-30', '11:01', '11:01', 11, 11, '', 'root@gmail.com', 'Sem open-bar', 38402, 'MG', 'Minas Gerais', 'Rodovia BR-050', 'Uberlândia', 1, '', 1, 1, 'Rock Rock Rock ', '2019-05-13 16:12:00', 'true'),
(4, 'Quinta-Feira', 'musical, festivo', '55', '(38) 40201-9223', '(38) 4020-1933', '2019-12-11', '11:11', '11:01', 22, 11, '', 'root@gmail.com', 'Sem open-bar', 38402, 'MG', 'Minas Gerais', 'Rodovia BR-050', 'Uberlândia', 44, '', 3, 1, 'Reggae Rap Trap ', '2019-05-13 16:13:00', 'true');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_tok` varchar(255) NOT NULL,
  `nome_usuario` varchar(255) NOT NULL,
  `email_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `acesso` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `id_tok`, `nome_usuario`, `email_usuario`, `senha_usuario`, `acesso`) VALUES
(1, '', 'Carlos Eduardo', 'root@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '@admin'),
(2, 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjVmZTJkNTQxYTQyODJiN2FlMzYyOGZhMDc0ZGQ4YmVhNmRhNWIxOWIiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXpwIjoiNTkwODU2NzUzNDg1LTY2cWxybXUyZzFiNDhpaGpnb2k0dWJ0bW43azN2ZWc1LmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiYXVk', 'Sextou Eventos', 'sextoueventos@gmail.com', '1c29cfd5dad36585210f1e82dfbae8156d47177d7971d6e30ba7ffe730a8eb5e1c614ed1c0fea7212f69af11f01d5ee1b092886ab032143f7d087fe35f3cbdfd', '0'),
(3, 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjZmNjc4MWJhNzExOTlhNjU4ZTc2MGFhNWFhOTNlNWZjM2RjNzUyYjUiLCJ0eXAiOiJKV1QifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiYXpwIjoiNTkwODU2NzUzNDg1LTY2cWxybXUyZzFiNDhpaGpnb2k0dWJ0bW43azN2ZWc1LmFwcHMuZ29vZ2xldXNlcmNvbnRlbnQuY29tIiwiYXVk', 'Carlos Eduardo', 'carloseduardofreireb@gmail.com', '2066819c4002d8234c55078b0eb03c98bd180dc8e20eccdc2c8e7b21671b6245aaac6f7536d23aa679a9aab24eb3faf05c7f0364ee1d52ff4a4e3ffdf8d55ceb', '@admin'),
(4, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(5, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(6, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(7, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(8, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(9, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(11, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(12, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(13, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(14, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(15, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(16, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(17, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(18, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(19, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(20, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(21, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(22, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(23, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(24, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(25, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0'),
(26, '', 'Carlos Eduardo', 'roosdast@gmail.com', 'bdeb400a6c398a25022eb4015ae3cc9cdcef22660d3839a35776b1bb66d8eb00705a0a06ab2d1e4779937a5cc6dec0f6dff0a1d81c57dd7428ce2b3ca240550a', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_eventos`
--
ALTER TABLE `tb_eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_eventos`
--
ALTER TABLE `tb_eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
