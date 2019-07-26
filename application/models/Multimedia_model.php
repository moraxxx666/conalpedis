<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Multimedia_model extends CI_Model
{
    public function ObtenerAlbums()
    {
        $query  = $this->db->query("SELECT * from album");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function AgregarAlbum($album)
    {
        if ($this->db->insert('album', $album)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }
    public function AgregarImagenesMultimedia($multimedia)
    {
        if ($this->db->insert('multimedia', $multimedia)) {
            return true;
        } else {
            return false;
        }
    }
    public function EncontrarAlbum($id)
    {
        $query = $this->db->query("SELECT * FROM album n WHERE n.id_album = $id");
        if ($query->num_rows() === 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function ObtenerFotosDeAlbum($id_album)
    {
        $query  = $this->db->query("SELECT * from multimedia WHERE id_album = $id_album");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function EliminarAlbum($id)
    {
        if ($this->EncontrarAlbum($id) != false) {
            if ($this->db->delete('album', array('id_album' => $id))) {
                return true;
            }
        } else {
            return false;
        }
    }
}