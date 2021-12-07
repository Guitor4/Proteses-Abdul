<?php

namespace Classes\Entity;

use \Classes\Dao\db;
use \PDO;

class ServicoTerceiro
{

    public $idServico;
    public $nomeServico;
    public $descricao;
    public $statusServicoTerceiro;


    public function cadastro()
    {

        $this->dataRegistro = date('Y-m-d H-i-s');

        $obdb = new db('ServicoTerceiro');
        $this->idServico = $obdb->insertSQL([
            'nomeServico' => $this->nomeServico,
            'descricao' => $this->descricao,
            'statusServicoTerceiro
            ' => $this->statusServicoTerceiro

        ])[1];
    }

    /**
     * Função responsável por: executar a function presente em db.php->selectSQL passando os parâmetros desejados; Receber os dados pesquisados por ela; Atribuí-los
     * à classe por meio do PDO::FETCH_CLASS em várias instancias de uma só vez
     * Para mais informações sobre isso: descomentar a linha 14 de pesquisar.php. 
     * obs: pré requisito necessário: linhas já inseridas na tabela.
     *
     * @param string $where
     * @param string $like
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return array
     */
    public static function getServicoTerceiros($where = null, $like = null, $order = null, $limit = null, $fields = '*')
    {
        return (new db('ServicoTerceiro'))->selectSQL($where, $like, $order, $limit, $fields)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    /**
     * Método para obter uma vaga específica por meio do uso do ID $id
     *
     * @param int $id
     * @return object
     */
    public static function getServicoTerceiro($idServico)
    {
        return (new db('ServicoTerceiro'))->selectSQL('idServico = ' . $idServico)
            ->fetchObject(self::class);
    }
    public function AtualizarServicoTerceiro()
    {
        return (new db('ServicoTerceiro'))->updateSQL('idServico= ' . $this->idServico, [
            '  nomeServico ' => $this->nomeServico,
            'descricao' => $this->descricao,
            'statusServicoTerceiro' => $this->statusServicoTerceiro
        ]);
    }
}


/*
SELECT * FROM servicoterceiro 
INNER JOIN terceirizado on fkServicoTerceiro=idServico
INNER JOIN terceiro ON fkTerceiro=idTerceiro

CREATE VIEW serv as SELECT * FROM servicoterceiro 
INNER JOIN terceirizado on fkServicoTerceiro=idServico
INNER JOIN terceiro ON fkTerceiro=idTerceiro
*/