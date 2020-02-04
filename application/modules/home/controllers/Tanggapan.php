<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Tanggapan extends CI_Controller
{

    public function addTanggapanJob()
    {
        is_logged_in_user();
        $data = [
            'id_tanggapan' => random_string('numeric', '15'),
            'id_user'   => $this->session->userdata('id_user'),
            'id_post'   => $this->input->post('id_post'),
            'id_to'     => $this->input->post('id_to'),
            'isi'       => $this->input->post('isi')
        ];
        $this->Crud_model->add('tbl_tanggapan', $data);
        redirect(base_url('home/job/detail/' . $data['id_post']), 'refresh');
    }
    public function addTanggapanSkill()
    {
        is_logged_in_user();
        $data = [
            'id_tanggapan' => random_string('numeric', '15'),
            'id_user'   => $this->session->userdata('id_user'),
            'id_post'   => $this->input->post('id_post'),
            'id_to'     => $this->input->post('id_to'),
            'isi'       => $this->input->post('isi')
        ];
        $this->Crud_model->add('tbl_tanggapan', $data);
        redirect(base_url('home/skill/detail/' . $data['id_post']), 'refresh');
    }

    public function delete($id_tanggapan)
    {
        $post = $this->Crud_model->listingOne('tbl_tanggapan', 'id_tanggapan', $id_tanggapan);
        $id_post = $post->id_post;
        $id = $this->session->set_userdata('id_post', $id_post);
        $this->Crud_model->delete('tbl_tanggapan', 'id_tanggapan', $id_tanggapan);
        redirect(base_url('home/job/detail/' . $this->session->userdata('id_post')), 'refresh');
    }
}
