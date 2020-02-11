<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Job extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }


    public function index()
    {
        $job = $this->Admin_model->listingJob();
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
