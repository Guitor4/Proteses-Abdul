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
    public $nome;
    public $img;
    
    
    public function CadastrarImagem($pac) {
        
        $db = new db('imagem');
        $this->idImagem = $db->insertSQL([
            'nome' => $this->nome,
            'img' => $this->img,
            
            
        ])[1]; //echo'<pre>';print_r($this);echo'</pre>';exit;
        if ($this->idImagem > 0) {
            header('Location: prontuario.php?paciente='.$pac.'&status=success&id='.$this->idImagem);
        } else {
            header('Location: prontuario.php?paciente='.$pac.'&status=error');
        }
    }
    
}
