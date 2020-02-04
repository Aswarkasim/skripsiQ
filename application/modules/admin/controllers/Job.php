<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Job extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $job = $this->Crud_model->listing('tbl_job');
        $data = [
            'job'     => $job,
            'content' => 'admin/job/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function edit()
    {
    }
}
