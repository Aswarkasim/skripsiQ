<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data = [
            'job'   => count($this->Crud_model->listingOneAll('tbl_job', 'id_user', $id_user)),
            'skill'   => count($this->Crud_model->listingOneAll('tbl_skill', 'id_user', $id_user)),
            'content' => 'user/dashboard/index'
        ];
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }
}
