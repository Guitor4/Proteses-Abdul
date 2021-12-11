<?php

namespace Classes\Entity;

/**
 * Description of Foto
 *
 * @author Fernando
 */
use Classes\Dao\db;
use \PDO;

class Foto {
    public $idFoto;
    public $titulo;
    public $img;
    public $fkProntuario;
    
    
    public function CadastrarFoto() {
        
        $db = new db('foto');
        $this->idFoto = $db->insertSQL([
            'titulo' => $this->titulo,
            'img' => $this->img,
            'fkProntuario' => $this->fkProntuario,
            
            
            
        ])[1]; //echo'<pre>';print_r($this);echo'</pre>';exit;
/*         if ($this->idFoto > 0) {
            header('Location: prontuario.php?paciente='.$pac.'&status=success1&id='.$this->idFoto);
        } else {
            header('Location: prontuario.php?paciente='.$pac.'&status=error');
        } */
    }
    
    public function DeletarFoto($id,$img){
        $query = 'delete from foto where img = "'.$img.'"';
        (new db('foto'))->executeSQL($query);
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
