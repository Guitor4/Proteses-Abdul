<?php

namespace Classes\Entity;

use \Classes\Dao\db;
use PDO;

class Lembrete
{

    public $idLembrete;
    public $titulo;
    public $descricao;
    public $dataLembrete;
    public $Funcionario;

    public function cadastrarLembrete()
    {
        $this->idLembrete = (new db('lembrete'))->insertSQL([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'dataLembrete' => $this->dataLembrete,
            'fkFuncionario' => $this->Funcionario

        ])[1];
    }

    public function editarLembrete(){
        (new db('lembrete'))->updateSQL('idLembrete='.$this->idLembrete,[
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'dataLembrete' => $this->dataLembrete,
            'fkFuncionario' => $this->Funcionario

        ]);
    }

    public static function getLembretesInner($where = null, $like = null, $order = null, $limit = null, $fields = null)
    {
        $lembretes = (new db('lembrete,funcionario'))->selectSQL($where, $like, $order, $limit, $fields, 'fkFuncionario,idFuncionario')->fetchAll(PDO::FETCH_CLASS, self::class);
        return $lembretes;
    }

    public static function getLembrete($where = null, $like = null, $order = null, $limit = null, $fields = null)
    {
        $lembretes = (new db('lembrete,funcionario'))->selectSQL($where, $like, $order, $limit, $fields, 'fkFuncionario,idFuncionario')->fetchObject();
        return $lembretes;
    }
}
