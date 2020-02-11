<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Skill extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }


    public function index()
    {
        $skill = $this->Admin_model->listingSkill();
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
