<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Noticias_model extends CI_Model
{
    public function ObtenerNoticias()
    {
        $query  = $this->db->query("SELECT * from noticias ORDER BY fecha DESC");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function ObtenerNoticiasConFotos()
    {
        $query  = $this->db->query("SELECT * FROM noticias,imagenes WHERE noticias.id_noticia = imagenes.id_noticia group by noticias.titulo ORDER by noticias.fecha DESC LIMIT 4");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function AgregarNoticia($noticia)
    {
        if ($this->db->insert('noticias', $noticia)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }
    public function EliminarNoticia($id)
    {
        if ($this->EncontrarNoticia($id) != false) {
            if ($this->db->delete('noticias', array('id_noticia' => $id))) {
                return true;
            }
        } else {
            return false;
        }
    }
    public function EncontrarNoticia($id)
    {
        $query = $this->db->query("SELECT * FROM noticias n WHERE n.id_noticia = $id");
        if ($query->num_rows() === 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function AgregarFoto($fotografia)
    {
        if ($this->db->insert('imagenes', $fotografia)) {
            return true;
        } else {
            return false;
        }
    }
    public function BuscarNoticia($id)
    {
        $query = $this->db->query("SELECT * FROM noticias n WHERE n.id_noticia = $id");
        if ($query->num_rows() === 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function ObtenerFotos($id)
    {
        $query = $this->db->query("SELECT * FROM imagenes WHERE id_noticia = $id");
        if ($query->num_rows() >= 1) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}