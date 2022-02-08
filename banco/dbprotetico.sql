-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Fev-2022 às 05:29
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbprotetico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clinica`
--

CREATE TABLE `clinica` (
  `idClinica` int(11) NOT NULL,
  `nomeClinica` varchar(255) NOT NULL,
  `statusClinica` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `idConsulta` int(11) NOT NULL,
  `dataConsulta` date NOT NULL,
  `horaConsulta` time NOT NULL,
  `statusConsulta` varchar(45) NOT NULL,
  `relatorio` text DEFAULT NULL,
  `fkProntuario` int(11) NOT NULL,
  `fkFuncionario` int(11) NOT NULL,
  `CFKDentista` int(11) NOT NULL COMMENT 'C = Consulta\\n\\nCFK = Consulta Foreign Key',
  `CFKClinica` int(11) NOT NULL COMMENT 'C = Consulta\\n\\nCFK = Consulta Foreign Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dentista`
--

CREATE TABLE `dentista` (
  `idDentista` int(11) NOT NULL,
  `nomeDentista` varchar(255) NOT NULL,
  `statusDentista` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `nomeFuncionario` varchar(255) NOT NULL,
  `dtContrato` varchar(45) DEFAULT NULL,
  `telefone` varchar(60) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `statusFuncionario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nomeFuncionario`, `dtContrato`, `telefone`, `sexo`, `email`, `perfil`, `login`, `senha`, `statusFuncionario`) VALUES
(2, 'Admin', '2021-02-08', '61991685788', 'Masculine', 'admin@gmail.com', 'Administrator', 'admin', 'admin', 'Active');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `idImagem` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `fkProntuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lembrete`
--

CREATE TABLE `lembrete` (
  `idLembrete` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `dataLembrete` date NOT NULL,
  `fkFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcadente`
--

CREATE TABLE `marcadente` (
  `idMarcaDente` int(11) NOT NULL,
  `nomeMarca` varchar(255) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `prontuario` int(11) NOT NULL,
  `nomePaciente` varchar(255) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `idProcedimento` int(11) NOT NULL COMMENT 'índice (Chave primária) da tabela.',
  `nomeProcedimento` varchar(255) NOT NULL COMMENT 'Campo para receber o nome do procedimento.',
  `statusProcedimento` varchar(20) NOT NULL COMMENT 'Campo que retrata o estado do procedimento.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `protese`
--

CREATE TABLE `protese` (
  `idProtese` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `posicao` varchar(50) NOT NULL,
  `marcaDente` varchar(45) NOT NULL,
  `extensao` varchar(50) NOT NULL,
  `qtdDente` int(11) NOT NULL,
  `ouro` enum('yes','no') NOT NULL,
  `qtdOuro` int(11) NOT NULL,
  `dataRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `observacao` text DEFAULT NULL,
  `fkConsultaT` int(11) NOT NULL,
  `fkProcedimentoT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rastreio`
--

CREATE TABLE `rastreio` (
  `idRastreio` int(11) NOT NULL,
  `dtEntrega` date NOT NULL,
  `dtRetorno` date NOT NULL,
  `obs` text DEFAULT NULL,
  `vlrCobrado` varchar(255) DEFAULT NULL,
  `statusRastreio` varchar(45) NOT NULL,
  `RFKTerceiro` int(11) NOT NULL COMMENT 'R = Rastreio\\n\\nRFK = Rastreio Foreign Key',
  `RFKServico` int(11) NOT NULL COMMENT 'R = Rastreio\\n\\nRFK = Rastreio Foreign Key',
  `fkProtese` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicoterceiro`
--

CREATE TABLE `servicoterceiro` (
  `idServico` int(11) NOT NULL,
  `nomeServico` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `statusServicoTerceiro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terceirizado`
--

CREATE TABLE `terceirizado` (
  `fkTerceiro` int(11) NOT NULL,
  `fkServicoTerceiro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terceiro`
--

CREATE TABLE `terceiro` (
  `idTerceiro` int(11) NOT NULL,
  `nomeTerceiro` varchar(255) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `statusTerceiro` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamento`
--

CREATE TABLE `tratamento` (
  `fkConsulta` int(11) NOT NULL,
  `fkProcedimento` int(11) NOT NULL,
  `observacao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`idClinica`);

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `fk_consulta_paciente1_idx` (`fkProntuario`),
  ADD KEY `fk_consulta_Funcionario1_idx` (`fkFuncionario`),
  ADD KEY `fk_consulta_dentista1_idx` (`CFKDentista`),
  ADD KEY `fk_consulta_clinica1_idx` (`CFKClinica`);

--
-- Índices para tabela `dentista`
--
ALTER TABLE `dentista`
  ADD PRIMARY KEY (`idDentista`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`idImagem`),
  ADD KEY `fk_imagem_paciente1_idx` (`fkProntuario`);

--
-- Índices para tabela `lembrete`
--
ALTER TABLE `lembrete`
  ADD PRIMARY KEY (`idLembrete`),
  ADD KEY `fk_lembrete_funcionario1_idx` (`fkFuncionario`);

--
-- Índices para tabela `marcadente`
--
ALTER TABLE `marcadente`
  ADD PRIMARY KEY (`idMarcaDente`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`prontuario`);

--
-- Índices para tabela `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`idProcedimento`);

--
-- Índices para tabela `protese`
--
ALTER TABLE `protese`
  ADD PRIMARY KEY (`idProtese`),
  ADD KEY `fk_protese_tratamento1_idx` (`fkConsultaT`,`fkProcedimentoT`);

--
-- Índices para tabela `rastreio`
--
ALTER TABLE `rastreio`
  ADD PRIMARY KEY (`idRastreio`),
  ADD KEY `fk_rastreio_terceiro_has_servicoTerceiro1_idx` (`RFKTerceiro`,`RFKServico`),
  ADD KEY `fk_rastreio_protese1_idx` (`fkProtese`);

--
-- Índices para tabela `servicoterceiro`
--
ALTER TABLE `servicoterceiro`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices para tabela `terceirizado`
--
ALTER TABLE `terceirizado`
  ADD PRIMARY KEY (`fkTerceiro`,`fkServicoTerceiro`),
  ADD KEY `fk_terceiro_has_servicoTerceiro_servicoTerceiro1_idx` (`fkServicoTerceiro`),
  ADD KEY `fk_terceiro_has_servicoTerceiro_terceiro1_idx` (`fkTerceiro`);

--
-- Índices para tabela `terceiro`
--
ALTER TABLE `terceiro`
  ADD PRIMARY KEY (`idTerceiro`);

--
-- Índices para tabela `tratamento`
--
ALTER TABLE `tratamento`
  ADD PRIMARY KEY (`fkConsulta`,`fkProcedimento`),
  ADD KEY `fk_consulta_has_servicoConsulta_servicoConsulta1_idx` (`fkProcedimento`),
  ADD KEY `fk_consulta_has_servicoConsulta_consulta1_idx` (`fkConsulta`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clinica`
--
ALTER TABLE `clinica`
  MODIFY `idClinica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idConsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `dentista`
--
ALTER TABLE `dentista`
  MODIFY `idDentista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lembrete`
--
ALTER TABLE `lembrete`
  MODIFY `idLembrete` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marcadente`
--
ALTER TABLE `marcadente`
  MODIFY `idMarcaDente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `prontuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `idProcedimento` int(11) NOT NULL AUTO_INCREMENT COMMENT 'índice (Chave primária) da tabela.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `protese`
--
ALTER TABLE `protese`
  MODIFY `idProtese` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rastreio`
--
ALTER TABLE `rastreio`
  MODIFY `idRastreio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `servicoterceiro`
--
ALTER TABLE `servicoterceiro`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `terceiro`
--
ALTER TABLE `terceiro`
  MODIFY `idTerceiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_Funcionario1` FOREIGN KEY (`fkFuncionario`) REFERENCES `funcionario` (`idFuncionario`),
  ADD CONSTRAINT `fk_consulta_clinica1` FOREIGN KEY (`CFKClinica`) REFERENCES `clinica` (`idClinica`),
  ADD CONSTRAINT `fk_consulta_dentista1` FOREIGN KEY (`CFKDentista`) REFERENCES `dentista` (`idDentista`),
  ADD CONSTRAINT `fk_consulta_paciente1` FOREIGN KEY (`fkProntuario`) REFERENCES `paciente` (`prontuario`);

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `fk_imagem_paciente1` FOREIGN KEY (`fkProntuario`) REFERENCES `paciente` (`prontuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `lembrete`
--
ALTER TABLE `lembrete`
  ADD CONSTRAINT `fk_lembrete_funcionario1` FOREIGN KEY (`fkFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `protese`
--
ALTER TABLE `protese`
  ADD CONSTRAINT `fk_protese_tratamento1` FOREIGN KEY (`fkConsultaT`,`fkProcedimentoT`) REFERENCES `tratamento` (`fkConsulta`, `fkProcedimento`);

--
-- Limitadores para a tabela `rastreio`
--
ALTER TABLE `rastreio`
  ADD CONSTRAINT `fk_rastreio_protese1` FOREIGN KEY (`fkProtese`) REFERENCES `protese` (`idProtese`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rastreio_terceiro_has_servicoTerceiro1` FOREIGN KEY (`RFKTerceiro`,`RFKServico`) REFERENCES `terceirizado` (`fkTerceiro`, `fkServicoTerceiro`);

--
-- Limitadores para a tabela `terceirizado`
--
ALTER TABLE `terceirizado`
  ADD CONSTRAINT `fk_terceiro_has_servicoTerceiro_servicoTerceiro1` FOREIGN KEY (`fkServicoTerceiro`) REFERENCES `servicoterceiro` (`idServico`),
  ADD CONSTRAINT `fk_terceiro_has_servicoTerceiro_terceiro1` FOREIGN KEY (`fkTerceiro`) REFERENCES `terceiro` (`idTerceiro`);

--
-- Limitadores para a tabela `tratamento`
--
ALTER TABLE `tratamento`
  ADD CONSTRAINT `fk_consulta_has_servicoConsulta_consulta1` FOREIGN KEY (`fkConsulta`) REFERENCES `consulta` (`idConsulta`),
  ADD CONSTRAINT `fk_consulta_has_servicoConsulta_servicoConsulta1` FOREIGN KEY (`fkProcedimento`) REFERENCES `procedimento` (`idProcedimento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
