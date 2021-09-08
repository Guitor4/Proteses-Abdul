<?php

namespace Classes\Entity;

use \Classes\Dao\db;
use \PDO;
class Protese{

    /**
     * Declaração das variáveis presentes no banco de dados.
     * obs: não precisa ser na mesma ordem do banco porém tem que ter o mesmo nome que está no banco,
     * pois mais à frente usaremos de uma funcionalidade do PDO para
     * atribuir os valores do banco diretamente à classe por meio do FETCH::CLASS.
     */
    public $idProtese;
    public $tipo;
    public $posicao;
    public $material;
    public $dureza = 0;
    public $extensao;
    public $dente;
    public $qtdDente;
    public $ouro;
    public $qtdOuro = 0 ;
    public $dataRegistro;
    public $status;
    public $paciente;
    public $observacao;
    public $fkConsultaT;
    public $fkServicoT;



    /**
     * Método para cadastrar a prótese no banco
     * @return boolean
     */
    public function cadastrar(){
        //Método para pegar a data e a hora em que está ocorrendo o cadastro no banco de dados
        //Atribuindo também o formato da string. Para mais informações :
        // https://www.php.net/manual/pt_BR/function.date.php
        $this->dataRegistro = date('Y-m-d H-i-s');

        //Método que executa a função insertSQL presente na classe db.php para de fato efetuar a inserção
        //dos dados no banco de dados. Possui como retorno o útimo id inserido caso a inserção tenha sido um sucesso.
        //O parâmetro que deve ser passado no insertSQL é no formato array e deve estar de 
        $obdb = new db('protese');
        $this->idProtese = $obdb->insertSQL([
                            //Envia como um parâmetro e por meio de um array (titulo => valor) os valores que foram trazidos do POST e agora estão
                            //na classe Protese, para que sejam contabilizados e devidamente adicionados à query (comando que vai pro SQL) 
                            //que está sendo montada em db.php->insertSQL.
                            'tipo' => $this->tipo,
                            'posicao'=> $this->posicao,
                            'material'=> $this->material,
                            'dureza'=> $this->dureza,
                            'extensao'=> $this->extensao,
                            'dente'=> $this->dente,
                            'qtdDente'=> $this->qtdDente,
                            'ouro'=> $this->ouro,
                            'qtdOuro'=> $this->qtdOuro,
                            'dataRegistro'=> $this->dataRegistro,
                            'status'=> $this->status,
                            'observacao'=> $this->observacao,
                            'fkConsultaT'=>'1',
                            'fkServicoT'=>'1'


        ]);
        
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
    public static function getProteses($where = null, $like = null, $order = null, $limit = null, $fields = '*',$innerjoin = null){
        return (new db('protese'))->selectSQL($where,$like,$order,$limit,$fields,$innerjoin)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    /**
     * Método para obter uma vaga específica por meio do uso do ID $id
     *
     * @param int $id
     * @return object
     */
    public static function getProtese($id){
        return (new db('protese'))->selectSQL('id = '.$id)
                                   ->fetchObject(self::class); 

    }
}
