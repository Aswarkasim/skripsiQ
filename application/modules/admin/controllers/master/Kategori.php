<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function index()
    {
        $tombol  = [
            'add'     => 'admin/master/kategori/add',
            'edit'    => 'admin/master/kategori/edit/',
            'delete'  => 'admin/master/kategori/delete/'
        ];

        $kategori = $this->Crud_model->listing('tbl_kategori');
        $data = [

            'kategori' => $kategori,
            'tombol'   => $tombol,
            'content' => 'admin/master/kategori/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function add()
    {
        $valid = $this->form_validation;
        $valid->set_rules('kd_kategori', 'Kode Kaategori', 'macthes[tbl_kategori.kd_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
        $valid->set_rules('nm_kategori', 'Nama Kaategori', 'macthes[tbl_kategori.nm_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


        if ($valid->run() === TRUE) {
            $this->index();
        } else {
            $i = $this->input;
            $data = [
                'nm_kategori'   => $i->post('nm_kategori'),
                'kd_kategori'   => $i->post('kd_kategori')
            ];
            $this->Crud_model->add('tbl_kategori', $data);
            $this->session->set_flashdata('msg', 'kategori berhasil ditambah');
            redirect('admin/master/kategori');
        }
    }
    function edit($kd_kategori)
    {
        $valid = $this->form_validation;
        // $valid->set_rules('kd_kategori', 'Kode Kaategori', 'macthes[tbl_kategori.kd_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
        // $valid->set_rules('nm_kategori', 'Nama Kaategori', 'macthes[tbl_kategori.nm_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


        if ($valid->run() === TRUE) {
            $this->index();
        } else {
            $i = $this->input;
            $data = [
                'nm_kategori'   => $i->post('nm_kategori'),
                'kd_kategori'   => $i->post('kd_kategori')
            ];
            $this->Crud_model->edit('tbl_kategori', 'kd_kategori', $kd_kategori, $data);
            $this->session->set_flashdata('msg', 'kategori berhasil diedit');
            redirect('admin/master/kategori');
        }
    }

    function delete($kd_kategori)
    {
        $this->Crud_model->delete('tbl_kategori', 'kd_kategori', $kd_kategori);
        $this->session->set_flashdata('msg', 'data telah dihapus');
        redirect('admin/master/kategori');
    }
}
