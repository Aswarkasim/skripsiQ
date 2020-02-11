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
        //  $id_user = $this->session->userdata('id_user');
        $this->load->model('home/Home_model');


        $this->load->library('pagination');

        $config['base_url']     = base_url('home/skill/index/');
        $config['total_rows']   = count($skill = $this->Crud_model->listing('tbl_skill'));
        $config['per_page']     = 5;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $skill = $this->Crud_model->listing('tbl_skill', $config['per_page'], $from);
        $banner = $this->Home_model->listBanner('skill')->row();

        $data = [
            'skill'       => $skill,
            'banner'       => $banner,
            'pagination' => $this->pagination->create_links(),
            'content'   => 'home/skill/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function detail($id_skill)
    {
        $this->load->model('Home_model');

        $this->session->unset_userdata('id_skill');
        $gambar = $this->Crud_model->listingOneAll('tbl_gambar', 'id_post', $id_skill);
        $skill = $this->Crud_model->listingOne('tbl_skill', 'id_skill', $id_skill);
        $profil = $this->Crud_model->listingOne('tbl_user', 'id_user', $skill->id_user);
        $tanggapan = $this->Home_model->listTanggapan($id_skill);
        $data = [
            'profil'      => $profil,
            'skill'       => $skill,
            'gambar'      => $gambar,
            'tanggapan'      => $tanggapan,
            'content'     => 'home/skill/detail'
        ];
        $this->load->view('layout/wrapper', $data);
    }
}
