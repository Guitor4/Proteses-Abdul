<?php

/**
 * Descrição do paciente
 *
 * @author Fernando
 */

namespace Classes\Entity;

use Classes\Entity\Imagem;
use Classes\Entity\Foto;
use Classes\Dao\db;
use \PDO;

class Paciente {

    public $prontuario;
    public $nomePaciente;
    public $sexo;
    public $telefone;
    public $email;

//Método de cadastramento do paciente
//    @return boolean

    public function cadastrarPaciente() {
        $db = new db('paciente');
        $this->prontuario = $db->insertSQL([
            'nomePaciente' => $this->nomePaciente,
            'sexo' => $this->sexo,
            'telefone' => $this->telefone,
            'email' => $this->email,
        ])[1];
        if ($this->prontuario > 0) {
//            echo "<pre>";
//            print_r($paciente);
//            echo "</pre>";
//            exit;
            $img = new Imagem();
            $img->titulo = "perfil_";
            $img->img = "./Imagens/usuario.png";
            $img->fkProntuario = $this->prontuario;
            $img->CadastrarImagem($this->prontuario);
            
            $foto = new Foto();
            $foto->titulo = "antes_";
            $foto->img = "semImagem";
            $foto->fkProntuario = $this->prontuario;
            $foto->CadastrarFoto($this->prontuario);
            
            $foto = new Foto();
            $foto->titulo = "depois_";
            $foto->img = "semImagem";
            $foto->fkProntuario = $this->prontuario;
            $foto->CadastrarFoto($this->prontuario);
           
        } 
    }

    /**
     * método de atualização 
     * return boolean
     */
    public function editarPaciente() {
        return (new db('paciente'))->
                        updateSQL('prontuario= ' . $this->prontuario, [
                            'nomePaciente' => $this->nomePaciente,
                            'sexo' => $this->sexo,
                            'telefone' => $this->telefone,
                            'email' => $this->email
        ]);
    }

    /**  Método para listar pacientes do banco
     * 
     * @param string $where
     * @param string $order
     * @param string $limit
     * return array
     */
    public static function getPacientes($where = null, $like = null, $order = null, $limit = null, $fields = null) {
        return (new db('paciente'))->selectSQL($where, $like, $order, $limit, $fields)
                        ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function getPacientes2($where = null, $like = null, $order = null, $limit = null, $fields = null) {
        $pacientes = (new db('paciente'))->selectSQL($where, $like, $order, $limit, $fields);
        while ($paciente = $pacientes->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $paciente['nomePaciente'];
        };


        return $data;
    }

    /**
     * Método de pesquisa pelo ID
     * @param integer $prontuario
     * return paciente
     */
    public static function getPaciente($prontuario) {
        return (new db('paciente'))->selectSQL('prontuario = ' . $prontuario)
                        ->fetchObject(self::class);
    }

}
