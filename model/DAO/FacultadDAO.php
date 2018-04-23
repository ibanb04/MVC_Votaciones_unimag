<?php

require_once ("DataSource.php");
require_once (__DIR__."/../ENTITIES/Facultad.php");

class FacultadDAO {

    public function buscarFacultad($table, $nameRow, $value){
        $data_source = new DataSource();
 
        $data_table= $data_source->ejecutarConsulta("SELECT * FROM $table WHERE $nameRow = :value", array(':value'=>$value));
        
        $Facultad=null;

        if(count($data_table) == 1){
            foreach($data_table as $indice => $valor){
                $Facultad = new Facultad(
                    $data_table[$indice]["id"],
                    $data_table[$indice]["nombre"]

                );
            }
        }
        return $Facultad;
    }

    public function obtenerFacultades(){
        $data_source = new DataSource();
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM facultad");
        $facultad=null;
        $facultades=array();
        foreach($data_table as $indice=>$valor){
            $facultad = new Facultad(
                $data_table[$indice]["id"],
                $data_table[$indice]["nombre"]
            );
            array_push($facultades, $facultad);
        }
        return $facultades;   
    }

}