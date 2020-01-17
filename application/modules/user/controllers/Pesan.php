<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{

    public function index()
    {
        $data = [
            'content' => 'user/pesan/index'
        ];
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }
}
