<?php

namespace Classes\Entity;

/**
 * Description of clinica
 *
 * @author Fernando
 */
use Classes\Dao\db;
use \PDO;

class Clinica {
    
    public $idClinica;
    public $nomeClinica;
    public $statusClinica;
   

//Método de cadastramento da clinica
//    @return boolean

    public function cadastrarClinica() {
        $db = new db('clinica');
        $this->idClinica = $db->insertSQL([
            'nomeClinica' => $this->nomeClinica,
            'statusClinica' => $this->statusClinica,
           
            
        ])[1];
        if ($this->idClinica > 0) {
            header ('Location: listaClinica.php?status=success');;

        }else{
            header ('Location: listaClinica.php?status=error');;
        }
    }

    /**
     * método de atualização 
     * return boolean
     */
    public function editarClinica() {
        return (new db('clinica'))->
                        updateSQL('idClinica= ' .$this->idClinica,[
                                                            'nomeClinica' => $this->nomeClinica,
                                                            'statusClinica' => $this->statusClinica,
                                                           
                                                        ]);
    }
    
    
/**  Método para listar clinica do banco
 * 
 * @param string $where
 * @param string $order
 * @param string $limit
 * return array
 */  
    public static function getClinicas($where = null, $like = null, $order = null, $limit= null) {
        return (new db('clinica'))->selectSQL($where, $like, $order, $limit)
                ->fetchAll(PDO::FETCH_CLASS, self::class);

      
    }
    
    
    /**
         * Método de pesquisa pelo ID
         * @param integer $idClinica
         * return clinica
         */
    public static function getClinica($idClinica) {
        return (new db('clinica'))->selectSQL('idClinica = ' .$idClinica)
                   ->fetchObject(self::class) ;
    }
}
