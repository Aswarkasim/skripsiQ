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
        $this->load->model('home/Home_model');

        //  $id_user = $this->session->userdata('id_user');


        $this->load->library('pagination');

        $config['base_url']     = base_url('home/job/index/');
        $config['total_rows']   = count($job = $this->Crud_model->listing('tbl_job'));
        $config['per_page']     = 5;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $job = $this->Crud_model->listing('tbl_job', $config['per_page'], $from);
        $banner = $this->Home_model->listBanner('job')->row();
        $data = [
            'job'       => $job,
            'banner'       => $banner,
            'pagination' => $this->pagination->create_links(),
            'content'   => 'home/job/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function detail($id_job)
    {

        $this->session->unset_userdata('id_post');

        $this->load->model('Home_model');

        $this->session->unset_userdata('id_job');
        $gambar = $this->Crud_model->listingOneAll('tbl_gambar', 'id_post', $id_job);
        $job = $this->Crud_model->listingOne('tbl_job', 'id_job', $id_job);
        $profil = $this->Crud_model->listingOne('tbl_user', 'id_user', $job->id_user);
        $tanggapan = $this->Home_model->listTanggapan($id_job);
        $data = [
            'profil'      => $profil,
            'job'       => $job,
            'gambar'      => $gambar,
            'tanggapan'      => $tanggapan,
            'content'     => 'home/job/detail'
        ];
        $this->load->view('layout/wrapper', $data);
    }

    function readTanggapan($id_job)
    {
        $this->load->model('Home_model');

        $tanggapan = $this->Home_model->listTanggapan($id_job);
        echo json_encode($tanggapan);
    }

    public function cari()
    {
        $this->load->model('home/Home_model');

        $i = $this->input;
        $id_user = $this->session->userdata('id_user');
        $data_user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
        $regional = $data_user->kota;
        $keyword = $i->post('keyword');
        $hasil = $this->Home_model->cari($keyword, $regional, 'tbl_job');
        $data = [
            'hasil'     => $hasil,
            'content'   => 'home/cari/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
