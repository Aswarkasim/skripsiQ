<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function listTanggapan($id_post)
    {
        $this->db->select('tbl_tanggapan.*,
                          tbl_user.username,
                          tbl_user.namalengkap,
                          tbl_user.foto')
            ->from('tbl_tanggapan')
            ->join('tbl_user', 'tbl_user.id_user = tbl_tanggapan.id_user', 'LEFT')
            ->where('id_post', $id_post)
            ->order_by('date_created', 'ASC');
        return $this->db->get()->result();
    }

    public function listPost($table)
    {
        $query = $this->db->select('*')
            ->from($table)
            ->limit(8)
            ->order_by('date_created', 'RAND')
            ->get();
        return $query->result();
    }

    public function cari($keyword, $regional, $table)
    {
        $post = '';
        if ($table == 'tbl_skill') {
            $post = 'nama_skill';
        } else {
            $post = 'nama_job';
        }

        $this->db->select('*')
            ->from($table)
            ->where('regional', $regional)
            ->like($post, $keyword);
        $query = $this->db->get();
        return $query->result();
    }

    function listBanner($posisi)
    {
        $this->db->select('*')
            ->from('tbl_banner')
            ->where('posisi', $posisi)
            ->order_by('urutan', 'ASC');
        $query = $this->db->get();
        return $query;
    }
}
