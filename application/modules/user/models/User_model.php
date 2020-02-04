<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function listTanggapan($id_user, $limit = null, $offset = null)
    {
        $this->db->select('tbl_tanggapan.*,
                            tbl_skill.nama_skill,
                            tbl_job.nama_job')
            ->from('tbl_tanggapan')
            ->join('tbl_skill', 'tbl_skill.id_skill = tbl_tanggapan.id_post', 'LEFT')
            ->join('tbl_job', 'tbl_job.id_job = tbl_tanggapan.id_post', 'LEFT')
            ->where('tbl_tanggapan.id_user', $id_user)
            ->limit($limit)
            ->offset($offset);
        return $this->db->get()->result();
    }
}
