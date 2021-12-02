<?php

namespace Classes\Entity;

use Classes\Dao\db;
use PDO;

class Tratamento
{

    public $fkProcedimento;
    public $fkConsulta;
    public $observacao;

    public function cadastrarTratamento() {
        $tratamento = (new db('tratamento'))->insertSQL([
            'fkConsulta' => $this->fkConsulta,
            'fkProcedimento' => $this->fkProcedimento,
            'observacao' => $this->observacao

        ]);
        return $tratamento;
    }

    public static function getTratamentos($tabela = null, $where = null, $innerjoin = null, $like = null, $order = null, $limit = null, $fields = '*') {

        if ($tabela != null) {
            $tabela = ',' . $tabela;
        }

        return $db = (new db('tratamento' . $tabela))->selectSQL($where, $like, $order, $limit, $fields, $innerjoin)
                ->fetchAll(PDO::FETCH_CLASS ,self::class);
    }

    public static function getTratamento($tabela = null, $where = null, $innerjoin = null, $like = null, $order = null, $limit = null, $fields = '*') {

        if ($tabela != null) {
            $tabela = ',' . $tabela;
        }

        return $db = (new db('tratamento' . $tabela))->selectSQL($where, $like, $order, $limit, $fields, $innerjoin)
                ->fetchObject(self::class);
    }

    public static function getTratamentosInner($pesq) {


        return $db = (new db)->executeSQL('SELECT * FROM rastreio '
                . 'RIGHT JOIN protese on idProtese=fkProtese '
                . 'inner JOIN tratamento on fkConsulta=fkConsultaT and fkProcedimento=fkProcedimentoT '
                . 'inner JOIN consulta on fkConsulta=idConsulta '
                . 'inner JOIN procedimento on fkProcedimento=idProcedimento '
                . 'inner JOIN dentista on CFKDentista=idDentista '
                . 'inner JOIN clinica on CFKClinica=idClinica '
                . 'inner JOIN paciente on fkProntuario=prontuario '
                . 'where idProtese not in (select fkProtese from rastreio) '. $pesq)
                ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

   public static function getTratamentoInner($pro) {


        return $db = (new db)->executeSQL('SELECT * FROM tratamento '
                        . 'inner JOIN consulta on fkConsulta=idConsulta '
                        . 'inner JOIN dentista on CFKDentista=idDentista '
                        . 'inner JOIN clinica on CFKClinica=idClinica '
                        . 'inner JOIN paciente on fkProntuario=prontuario '
                        . 'inner JOIN procedimento on fkProcedimento=idProcedimento '
                        
                        . 'inner JOIN protese on fkProcedimento=fkProcedimentoT and fkConsulta=fkConsultaT '
                        . 'where idProtese='.$pro)
                ->fetchObject(self::class);
    }

    public function atualizarStatusConsulta($id,$status){
        $db = new db('consulta');
        $this->idConsulta = $db->updateSQL('idConsulta = '.$id,[
            'statusConsulta' => $status
        ]);
    }

}
//SELECT * FROM consulta INNER JOIN tratamento on tratamento.fkConsulta = idConsulta 
//and tratamento.fkProcedimento in (SELECT idProcedimento from procedimento 
//where nomeProcedimento in ("Protese")) INNER JOIN protese on protese.fkConsultaT = tratamento.fkConsulta 
//and protese.idProtese not in (SELECT fkProtese from rastreio) INNER JOIN clinica,dentista,paciente 
//where CFKClinica = idClinica and CFKDentista = idDentista and fkProntuario = prontuario
