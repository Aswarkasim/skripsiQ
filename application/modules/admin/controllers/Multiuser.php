<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Multiuser extends CI_Controller
{

    public function index()
    {
        $multiuser = $this->Crud_model->listingOneAll('tbl_user', 'role', 'User');
        $data = [
            'multiuser'    => $multiuser,
            'add'      => 'admin/user/add',
            'edit'      => 'admin/user/edit/',
            'delete'      => 'admin/user/delete/',
            'content' => 'admin/multiuser/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function detail($id_user)
    {
        $profil = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
        $skill = $this->Crud_model->listingOneAll('tbl_skill', 'id_user', $id_user);
        $job = $this->Crud_model->listingOneAll('tbl_job', 'id_user', $id_user);
        $data = [
            'job'    => $job,
            'skill'    => $skill,
            'profil'    => $profil,
            'content'   => 'admin/multiuser/detail'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
