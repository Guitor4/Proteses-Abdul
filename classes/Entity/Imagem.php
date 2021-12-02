<?php

namespace Classes\Entity;

/**
 * Description of Imagem
 *
 * @author Fernando
 */
use Classes\Dao\db;
use \PDO;

class Imagem {
    public $idImagem;
    public $titulo;
    public $img;
    public $fkProntuario;
    
    
    public function CadastrarImagem($pac) {
        
        $db = new db('imagem');
        $this->idImagem = $db->insertSQL([
            'titulo' => $this->titulo,
            'img' => $this->img,
            'fkProntuario' => $this->fkProntuario,
            
            
            
        ])[1]; //echo'<pre>';print_r($this);echo'</pre>';exit;
        if ($this->idImagem > 0) {
            header('Location: prontuario.php?paciente='.$pac.'&status=success&id='.$this->idImagem);
        } else {
            header('Location: prontuario.php?paciente='.$pac.'&status=error');
        }
    }
    
    public function EditarImagem() {
        return (new db('imagem'))->
                        updateSQL('idImagem='. $this->idImagem, [
                            'titulo' => $this->titulo,
                            'img' => $this->img,
                            'fkProntuario' => $this->fkProntuario,
        ]);
    }
    
//    public static function getImagem($pesq) {
//
//
//        return $db = (new db)->executeSQL('SELECT * FROM imagem '
//                        . 'inner JOIN paciente on fkProntuario=prontuario '
//                        . 'where fkProntuario='.$pesq. ' and titulo like "%perfil%"')
//                ->fetchObject(self::class);
//    }
    
    
}
