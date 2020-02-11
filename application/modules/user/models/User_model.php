<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function listTanggapan($id_user, $limit = null, $offset = null)
    {
        $this->db->select('tbl_tanggapan.*,
                            tbl_user.namalengkap,
                            tbl_skill.nama_skill,
                            tbl_job.nama_job')
            ->from('tbl_tanggapan')
            ->join('tbl_user', 'tbl_user.id_user = tbl_tanggapan.id_user', 'LEFT')
            ->join('tbl_skill', 'tbl_skill.id_skill = tbl_tanggapan.id_post', 'LEFT')
            ->join('tbl_job', 'tbl_job.id_job = tbl_tanggapan.id_post', 'LEFT')
            ->where('tbl_tanggapan.id_to', $id_user)
            ->limit($limit)
            ->offset($offset);
        return $this->db->get()->result();
    }

    public function listTanggapanPost($id_post)
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

    public function cari($keyword, $id_user, $table)
    {
        $post = '';
        if ($table == 'tbl_skill') {
            $post = 'nama_skill';
        } else {
            $post = 'nama_job';
        }

        $this->db->select('*')
            ->from($table)
            ->where('id_user', $id_user)
            ->like($post, $keyword);
        $query = $this->db->get();
        return $query->result();
    }
}
