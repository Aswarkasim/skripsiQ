<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    function listingSkill()
    {
        $this->db->select('tbl_skill.id_skill,
                            tbl_skill.nama_skill,
                            tbl_skill.date_created,
                           tbl_user.username,
                           tbl_user.namalengkap')
            ->from('tbl_skill')
            ->order_by('tbl_skill.date_created', 'DESC')
            ->join('tbl_user', 'tbl_user.id_user = tbl_skill.id_user', 'LEFT');
        return $this->db->get()->result();
    }
    function listingJob()
    {
        $this->db->select('tbl_job.id_job,
                            tbl_job.nama_job,
                            tbl_job.date_created,
                           tbl_user.username,
                           tbl_user.namalengkap')
            ->from('tbl_job')
            ->order_by('tbl_job.date_created', 'DESC')
            ->join('tbl_user', 'tbl_user.id_user = tbl_job.id_user', 'LEFT');
        return $this->db->get()->result();
    }
}
