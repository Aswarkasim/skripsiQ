<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $kategori = $this->Crud_model->listing('tbl_kategori');
        $data = [
            'kategori'  => $kategori,
            'content'   => 'home/home/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
