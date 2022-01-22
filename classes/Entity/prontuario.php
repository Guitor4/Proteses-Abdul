<?php

namespace Classes\Entity;
use Classes\Dao\db;
use \PDO;
Class Prontuario {


   
    
    public static function getTratamentoInner($proc,$nomeProcedimento,$c,$pron) {
        $where = ' where fkConsulta='.$c;
        $comProtese="";
        if ($nomeProcedimento=='Denture'||$nomeProcedimento=='Denture 2'){
            $comProtese="inner join protese on fkConsultaT=fkConsulta and fkProcedimentoT=fkProcedimento";
            $where = ' where fkConsulta='.$c.' and fkProcedimento = '.$proc.' and fkProcedimentoT = '.$proc;
        } 

        return $db = (new db)->executeSQL("SELECT *from tratamento inner join procedimento on idProcedimento=".$proc.
                                            " inner join paciente on prontuario=".$pron.
                                            " inner join consulta on idConsulta=fkConsulta".
                                            " inner join dentista on idDentista=CFKDentista".
                                            " inner join clinica on idClinica=CFKClinica
                                            ".$comProtese.$where)
                ->fetchObject(self::class);
    }
    


}