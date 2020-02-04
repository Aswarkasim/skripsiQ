<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Tanggapan extends CI_Controller
{

    public function index()
    {
        $this->load->model('User_model');
        // $tanggapan = $this->User_model->listTanggapan();
        // echo print_r($tanggapan);
        // die;

        $id_user = $this->session->userdata('id_user');
        $tgpjlh = $this->User_model->listTanggapan($id_user, null);

        $this->load->library('pagination');

        $config['base_url'] = base_url('user/tanggapan/index/');
        $config['total_rows'] = count($tgpjlh);
        $config['per_page'] = 6;
        //$config['uri_segment'] = 3;
        // $choice = $config['total_rows'] / $config['per_page'];
        // $config['num_links'] = floor($choice);



        $from = $this->uri->segment(4);

        $this->pagination->initialize($config);

        $tanggapan = $this->User_model->listTanggapan($id_user, $config['per_page'], $from);

        $pagination = $this->pagination->create_links();

        $data = [
            'tanggapan'       => $tanggapan,
            'pagination'      => $pagination,
            'content'         => 'user/tanggapan/index'
        ];
        $this->load->view('user/layout/wrapper', $data);
    }
}
