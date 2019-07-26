<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Biblioteca_model extends CI_Model
{
    public function AgregarColeccion($coleccion)
    {
        if ($this->db->insert('colecciones', $coleccion)) {
            return true;
        } else {
            return false;
        }
    }
    public function ObtenerColecciones()
    {
        $query  = $this->db->query("SELECT * from colecciones");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function AgregarLibro($libro)
    {
        if ($this->db->insert('libros', $libro)) {
            return true;
        } else {
            return false;
        }
    }
    public function EncontrarColeccion($id)
    {
        $query = $this->db->query("SELECT * FROM colecciones n WHERE n.id_coleccion = $id");
        if ($query->num_rows() === 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function EliminarColeccion($id)
    {
        if ($this->EncontrarColeccion($id) != false) {
            if ($this->db->delete('colecciones', array('id_coleccion' => $id))) {
                return true;
            }
        } else {
            return false;
        }
    }
    public function ObtenerLibrosDeColeccion($id)
    {
        $query  = $this->db->query("SELECT * from libros WHERE id_coleccion = $id");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}