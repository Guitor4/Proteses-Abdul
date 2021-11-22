<?php

namespace Classes\Dao;

use PDO;
use PDOException;

class db {

    /**
     * Nome do host do mysql
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'dbprotetico';

    /**
     * Usuario de acesso ao banco de dados
     * @var string
     */
    const USER = 'root';

    /**
     * Senha do banco de dados
     * @var string
     */
    const PASS = '';


    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * Instancia de PDO para conectar com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define o método construtor e adiciona o parâmetro $table necessário para 
     * que a classe funcione devidamente.
     * @var string
     */
    public function __construct($table = null) {
        //Pega a string da tabela a ser trabalhada que foi escrita no momento da instancia da classe
        //e atribui a uma variável interna para que seja utilizada nas funções
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método que faz a conexão com o banco de dados, utilizando as constantes que definimos ali encima
     * (HOST, NAME, USER, PASS). Além de setar o atributo PDO::ERRMODE_EXCEPTION para que possamos saber onde está o 
     * erro de sintaxe SQL mais facilmente.
     */
    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
        } catch (PDOException $e) {
            die('ERROR' . $e->getMessage());
        }
    }

    /**
     * Método que executa as queries dentro do banco de dados
     *
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function executeSQL($query, $params = [])
    {
        /* echo "<pre>"; print_r($query); echo "<pre>";exit; */
        try {
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $this->connection->prepare($query);
            $statement->execute($params);


            return $statement;
        } catch (PDOException $e) {
            die ($e->getMessage());
        }
    }

    /**
     * Método responsável por inserir dados no banco
     *
     * @param array $values [field => value] 
     * @return integer ID inserido
     */
    public function insertSQL($values) {
        //Utiliza de funcionalidades do array para extrair os titulos e os valores passados como array no parâmetro da função ($values)
        //array_keys pega os titulos do array
        $fields = array_keys($values);
        //echo "<pre>"; print_r($fields); echo "<pre>";exit;
        //array_pad recebe um array como parâmetro e o tamanho que aquele array deveria ter (count($fields)), caso ele não tenha alcançado esse tamanho ainda,
        //preenche as posições que faltam com uma string específica, neste caso o ?
        //Desse jeito, a nossa query de inserção terá o mesmo número de colunas e interrogações sem que seja necessário esforço da nossa parte.
        $binds = array_pad([], count($fields), '?');
        //echo "<pre>"; print_r($binds); echo "<pre>";exit;
        //Comando que vai pro SQL. 
        //Query dinâmica que varia dependendo da tabela escolhida e de quantos campos a classe que rodou este método passou pelo array no parâmetro da função
        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') values (' . implode(',', $binds) . ')';
        //echo '<pre>';print_r($query);echo'<pre>';exit; 
        /* echo '<pre>';print_r($query);echo'<pre>';exit; */
        
        //Roda o método executeSQL, que tem por função de fato executar o comando que criamos logo acima, substituindo as interrogações pelos valores que passamos como parâmetro
        //($query e $array_values($values)).
         /* echo '<pre>';print_r($values);echo'<pre>';exit; */
        
      //echo "<pre>"; print_r($this->); echo "<pre>";exit; 

        $check[0] = $this->executeSQL($query, array_values($values));
        
        $check[1] = $this->connection->lastInsertId();
       
        
        //Se tiver sucesso na execução, retorna o último id inserido no banco. Em caso de falha é vazio e não retorna nada.
        //Utilizado na verificação de sucesso localizado em cadastrar.php linhas 31 à 36



        return $check;
    }

    /**
     * Função dinamica que pode ou não receber parâmetros extras para fazer pesquisas simples ou mais detalhadas no banco de dados
     * @param string $where
     * @param string $like
     * @param string $order
     * @param string $limit
     * @param array $fields
     * @return PDOStatement
     */
    public function selectSQL($where = null, $like = null, $order = null, $limit = null, $fields = '*', $inner1 = null)
    {

        //Verificação: Se tiver algo diferente de NULL nas variáveis presentes no parâmetro, ele adiciona tal especificação
        //à query dinâmica.
        $tabelas = explode(',',$this->table,12);
        
        $where = strlen($where) ? ' WHERE ' .$where : '';
        /* echo "<pre>"; print_r($where); echo "<pre>";exit; */
        $like = strlen($like) ? ' LIKE ' . $like : '';
        $order = strlen($order) ? ' ORDER BY ' . $order : '';
        $limit = strlen($limit) ? ' LIMIT ' . $limit : '';
        $i = count($tabelas);
        $innerjoin = '';
        $inner1 = explode(',',$inner1,12);
        $fk = 0;
        $id = 1;
        $Tposition = 1;
        /* echo '<pre>';print_r($tabelas);echo'<pre>';exit; */
        if ( $i > 1) {
            /* echo '<pre>';print_r($tabelas);echo'<pre>';exit; */
            for ($x = 1;$x<$i;$x++){
                $innerjoin .= ' INNER JOIN '.$tabelas[$Tposition].' ON '.$tabelas[0].'.'.$inner1[$fk].' = '.$tabelas[$Tposition].'.'.$inner1[$id].' ';
                $fk = $fk + 2;
                $id = $id + 2;
                
                $Tposition++;
            }
            
        }
        /* echo "<pre>"; print_r($innerjoin); echo "<pre>";exit; */
        $fields = $fields == null ? '*' : $fields;

        //Montagem da query dinâmica baseado em quais variáveis foram preenchidas no parâmetro
        //obs: tabela obrigatória

        $query = 'SELECT ' . $fields . ' FROM ' . $tabelas[0] . '' . $innerjoin . '' . $where . '' . $like . '' . $order . '' . $limit;
        /* echo "<pre>"; print_r($query); echo "<pre>";exit; */
        //echo '<pre>';print_r($query);echo'<pre>';exit;
        //Retorno é o mesmo da função executeSQL. (PDOStatement)
        /* echo "<pre>"; print_r($this->executeSQL($query)); echo "<pre>";exit; */
        return $this->executeSQL($query);
    }

    /**
     * Método de edição 
     * @param string $where 
     * @param array $values
     * @return boolean;
     */
    public function updateSQL($where, $values) {
        //DADOS DA QUERY
        $fields = array_keys($values);

        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;
       // echo '<pre>';print_r($query);echo'<pre>';exit;
        //echo '<pre>';print_r(array_values($values));echo '<pre>';exit; 
        $this->executeSQL($query, array_values($values));

        return true;
    }
    /**
     * Função de validação do login
     *
     * @param string $login
     * @param string $senha
     * @return object/string
     */
    public function validaLogin($login,$senha){
        $query = "SELECT idFuncionario,nomeFuncionario,perfil FROM funcionario WHERE login = '$login' and senha = '$senha'";
        /* echo "<pre>"; print_r($query); echo "<pre>";exit; */
        $st = $this->executeSQL($query);
        if ($st->rowcount() > 0){
            return $st;
        }
        return 'usuario não cadastrado';
    }
    
}
