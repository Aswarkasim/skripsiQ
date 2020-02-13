<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/Home_model');
    }


    public function index()
    {


        $kategori = $this->Crud_model->listing('tbl_kategori');
        $regional = $this->Crud_model->listing('tbl_regional');
        $banner = $this->Home_model->listBanner('home')->result();
        $job = $this->Home_model->listPost('tbl_job');
        $skill = $this->Home_model->listPost('tbl_skill');
        $data = [
            'kategori'  => $kategori,
            'regional'  => $regional,
            'banner'  => $banner,
            'job'       => $job,
            'skill'       => $skill,
            'content'   => 'home/home/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function cari()
    {
        $i = $this->input;
        $keyword = $i->post('keyword');
        $regional = $i->post('regional');
        $table = $i->post('table');

        $hasil = $this->Home_model->cari($keyword, $regional, $table);
        $data = [
            'hasil'     => $hasil,
            'content'   => 'home/cari/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function kategori($id_kategori)
    {
        $hasil = $this->Home_model->getKategori($id_kategori);
        $data = [
            'hasil'     => $hasil,
            'content'   => 'home/cari/kategori'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
