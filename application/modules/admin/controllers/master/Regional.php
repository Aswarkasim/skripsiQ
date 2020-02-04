<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Regional extends CI_Controller
{

    public function index()
    {
        $tombol  = [
            'add'     => 'admin/master/regional/add',
            'edit'    => 'admin/master/regional/edit/',
            'delete'  => 'admin/master/regional/delete/'
        ];

        $regional = $this->Crud_model->listing('tbl_regional');
        $data = [

            'regional' => $regional,
            'tombol'   => $tombol,
            'content' => 'admin/master/regional/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function add()
    {
        $valid = $this->form_validation;
        $valid->set_rules('nama_regional', 'Nama Kaategori', 'macthes[tbl_regional.nama_regional]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


        if ($valid->run() === TRUE) {
            $this->index();
        } else {
            $i = $this->input;
            $data = [
                'nama_regional'   => $i->post('nama_regional')
            ];
            $this->Crud_model->add('tbl_regional', $data);
            $this->session->set_flashdata('msg', 'regional berhasil ditambah');
            redirect('admin/master/regional');
        }
    }
    function edit($nama_regional)
    {
        $valid = $this->form_validation;
        $valid->set_rules('nama_regional', 'Nama Kaategori', 'macthes[tbl_regional.nama_regional]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


        if ($valid->run() === TRUE) {
            $this->index();
        } else {
            $i = $this->input;
            $data = [
                'nama_regional'   => $i->post('nama_regional')
            ];
            $this->Crud_model->edit('tbl_regional', 'nama_regional', $nama_regional, $data);
            $this->session->set_flashdata('msg', 'regional berhasil diedit');
            redirect('admin/master/regional');
        }
    }

    function delete($nama_regional)
    {
        $this->Crud_model->delete('tbl_regional', 'nama_regional', $nama_regional);
        $this->session->set_flashdata('msg', 'data telah dihapus');
        redirect('admin/master/regional');
    }
}
