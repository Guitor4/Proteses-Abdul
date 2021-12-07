<?php

namespace Classes\Entity;

use \Classes\Dao\db;
use PDO;

class Funcionario
{

    public $idFuncionario;
    public $nomeFuncionario;
    public $dtContrato;
    public $sexo;
    public $telefone;
    public $email;
    public $perfil;
    public $login;
    public $senha;
    public $statusFuncionario;

    public function cadastrar()
    {

        $this->dataRegistro = date('Y-m-d H-i-s');

        $db = new db('funcionario');
        $this->idFuncionario = $db->insertSQL([
            'nomeFuncionario' => $this->nomeFuncionario,
            'dtContrato' => $this->dtContrato,
            'sexo' => $this->sexo,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'perfil' => $this->perfil,
            'login' => $this->login,
            'senha' => $this->senha,
            'statusFuncionario' => $this->statusFuncionario
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
    public static function getFuncionarios($where = null, $like = null, $order = null, $limit = null, $fields = '*')
    {
        return (new db('funcionario'))->selectSQL($where, $like, $order, $limit, $fields)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    /**
     * Método para obter uma vaga específica por meio do uso do ID $id
     *
     * @param int $id
     * @return object
     */
    public static function getFuncionario($idFuncionario)
    {
        return (new db('funcionario'))->selectSQL('idFuncionario = ' . $idFuncionario)
            ->fetchObject(self::class);
    }
    public function AtualizarFuncionario()
    {
        return (new db('funcionario'))->updateSQL('idFuncionario= ' . $this->idFuncionario, [
            'nomeFuncionario' => $this->nomeFuncionario,
            'dtContrato' => $this->dtContrato,
            'sexo' => $this->sexo,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'perfil' => $this->perfil,
            'login' => $this->login,
            'senha' => $this->senha,
            'statusFuncionario' => $this->statusFuncionario
        ]);
    }
    public static function getLogin($login, $senha)
    {
         $log = (new db('funcionario'))->validaLogin($login, $senha);
         if (gettype($log) == 'object'){
            return $log->fetch(PDO::FETCH_OBJ);
         
         }else{
             return 'usuário não cadastrado';
         }
         

        
    }
}
