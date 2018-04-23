<?php

    function obtenerProgramas($table){
        require_once(__DIR__."/../../model/DAO/ProgramaDAO.php");
        $dao=new ProgramaDAO();
        $programa = $dao->obtenerProgramas($table);
        return $programa;
    }

    function buscarPrograma($table, $row, $value){
        require_once(__DIR__."/../../model/DAO/ProgramaDAO.php");
        $dao=new ProgramaDAO();
        $programa = $dao->buscarPrograma($table, $row, $value);
        return $programa;
    }
    
    function insertPrograma_mdbPrograma( $nombre, $facultad_id){

        require_once(__DIR__."/../../model/DAO/ProgramaDAO.php");
        require_once(__DIR__."/../../model/ENTITIES/Programa.php");

        $objectPrograma = new Programa(0, $nombre, $facultad_id);
        
        $dao = new ProgramaDAO();
        $resultado = $dao->insertPrograma_ProgramaDAO($objectPrograma , 'programa');
        return $resultado;
    }

    function updatePrograma_mdbPrograma($id, $nombre, $facultad_id){

        require_once(__DIR__."/../../model/DAO/ProgramaDAO.php");
        require_once(__DIR__."/../../model/ENTITIES/Programa.php");

        $objectPrograma = new Programa($id, $nombre, $facultad_id);
        
        $dao = new ProgramaDAO();
        $resultado = $dao->updatePrograma_ProgramaDAO($objectPrograma , 'programa');
        return $resultado;
    }

    function deletePrograma_mdbPrograma($table, $row, $value){
        require_once(__DIR__."/../../model/DAO/ProgramaDAO.php");
        $dao = new ProgramaDAO();
        $resultado=$dao->deletePrograma_ProgramaDAO($table, $row, $value);
        return $resultado;
    }     