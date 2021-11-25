<?php

namespace Classes\Entity;

use Classes\Dao\db;
use PDO;

class MarcaDente
{

    public $idMarcaDente;
    public $nomeMarca;
    public $descricao;

    public function cadastrarMarcaDente()
    {
        $this->idMarcaDente = (new db('marcaDente'))->insertSQL([
            'nomeMarca' => $this->nomeMarca,
            'descricao' => $this->descricao
        ])[1];
    }

    public function updateMarcaDente()
    {
        (new db('marcaDente'))->updateSQL('idMarcaDente = ' . $this->idMarcaDente, [
            'nomeMarca' => $this->nomeMarca,
            'descricao' => $this->descricao
        ]);
    }


    public static function getMarcas($where = null, $like = null, $order = null, $limit= null)
    {
        $marcas = (new db('marcaDente'))->selectSQL($where, $like, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $marcas;
    }

    public static function getMarca($id){
        $marca = (new db('marcaDente'))->selectSQL('idMarcaDente = '.$id)->fetchObject(PDO::FETCH_CLASS,self::class);
        return $marca;
    }
}
