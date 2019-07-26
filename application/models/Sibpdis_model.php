<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sibpdis_model extends CI_Model
{
    public function BuscarRegistro($registro)
    {
        $query  = $this->db->query("SELECT * from sibpdis_personas_discapacidad 
        WHERE ap_paterno like '$registro' or  
        ap_materno like '$registro' 
        or  
        nro_registro like '$registro' 
        or  
        ci like '$registro' 
        ORDER BY ap_paterno,ap_materno,nombres ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function BuscarPorNroRegistro($nro){
        $query = $this->db->query("select * from sibpdis_personas_discapacidad where nro_registro like '$nro'");
        $row = $query->row();
        if(isset($row)){
            return $row;
        }
        else{
            return false;
        }
    }
    public function Carnetizado($nro){
        $query = $this->db->query("select * from sibpdis_carnetizados where nro_registro like '$nro'");
        $row = $query->row();
        if(isset($row)){
            return $row;
        }
        else{
            return false;
        }
    }
    public function Educacion($nro){
        $query = $this->db->query("select * from sibpdis_educacion where nro_registro like '$nro'");
        $row = $query->row();
        if(isset($row)){
            return $row;
        }
        else{
            return false;
        }
    }
    public function LeeEscribe($nro){
        $query = $this->db->query("select * from sibpdis_leen_escriben where nro_registro like '$nro'");
        $row = $query->row();
        if(isset($row)){
            return $row;
        }
        else{
            return false;
        }
    }
    public function Rehabilitacion($nro){
        $query = $this->db->query("select * from sibpdis_rehabilitacion where nro_registro like '$nro'");
        $row = $query->row();
        if(isset($row)){
            return $row;
        }
        else{
            return false;
        }
    }
    public function VariablesCruzadas($nro){
        $query = $this->db->query("select * from sibpdis_variables_cruzadas where nro_registro like '$nro'");
        $row = $query->row();
        if(isset($row)){
            return $row;
        }
        else{
            return false;
        }
    }
}