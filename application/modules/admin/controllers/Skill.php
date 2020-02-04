<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Skill extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $skill = $this->Crud_model->listing('tbl_skill');
        $data = [
            'skill'     => $skill,
            'content' => 'admin/skill/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function edit()
    {
    }
}
