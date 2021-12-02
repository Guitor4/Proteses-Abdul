<?php

namespace Classes\Entity;

use Classes\Dao\db;
use PDO;

class Terceirizado
{

    public $fkTerceiro;
    public $fkServicoTerceiro;
   


    public function cadastoTerceirizado()
    {
        $terceiro = (new db('terceirizado'))->insertSQL([
            'fkTerceiro' => $this->fkTerceiro,
            'fkServicoTerceiro' => $this->fkServicoTerceiro,
            
        ]);
        //echo'<pre>';print_r($terceiro);echo'</pre>';exit;
        return $terceiro;
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
    public static function getTerceirizados($where = null, $like = null, $order = null, $limit = null, $fields = '*'){
        return (new db('terceirizado'))->selectSQL($where,$like,$order,$limit,$fields)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    public static function getTerceirizadoInnerJoin($tabela = null,$where = null,$innerjoin = null, $like = null, $order = null, $limit = null, $fields = '*'){
        
        if ($tabela != null){
            $tabela = ','.$tabela;
        }
        
        return $db = (new db('terceirizado'.$tabela))->selectSQL($where,$like,$order, $limit, $fields,$innerjoin)
                                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    }    
    /**
     * Método para obter uma vaga específica por meio do uso do ID $id
     *
     * @param int $id
     * @return object
     */

    public function AtualizarTerceiro()
    {
        return (new db('terceiriziado'))->updateSQL('idterceiriziado= ' . $this->idTerceiro, [
                'nometerceiriziado' => $this->nomeTerceiro,
                'telefone' => $this->telefone,
                'statusTerceiro' => $this->statusTerceiro
            ]);
    }
}
