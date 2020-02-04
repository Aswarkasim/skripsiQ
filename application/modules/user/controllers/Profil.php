<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    protected $module = 'tbl_user';

    public function __construct()
    {
        parent::__construct();
    }



    function index()
    {
        $id_user = $this->session->userdata('id_user');
        $profil = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
        $kota = $this->Crud_model->listing('tbl_regional');

        $required = '%s tidak boleh kosong';
        $is_unique = $this->input->post('username') . ' telah ada, silakan masukkan nama yang lain';
        $valid = $this->form_validation;
        $valid->set_rules('namalengkap', 'Nama Lengkap', 'required', ['required' => $required]);
        $valid->set_rules('username', 'Username', 'required', ['required' => $required]);
        // if (empty($_FILES['foto']['name'])) {
        //     $valid->set_rules('foto', 'Foto', 'required');
        // }
        if ($valid->run()) {
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path']   = './assets/uploads/images/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $config['width']        = '500';
                $config['height']        = '500';
                $this->load->library('image_lib', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $data = [
                        'profil'    => $profil,
                        'kota'      => $kota,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'user/profil/index'
                    ];
                    $this->load->view('user/layout/wrapper', $data, FALSE);
                } else {
                    $upload_data = ['uploads' => $this->upload->data()];

                    $i = $this->input;
                    $data = [
                        'id_user'   => $this->session->userdata('id_user'),
                        'username'  => $i->post('username'),
                        'profesi'   => $i->post('profesi'),
                        'tgl_lahir' => $i->post('tgl_lahir'),
                        'deskripsi' => $i->post('deskripsi'),
                        'hp'        => $i->post('hp'),
                        'email'     => $i->post('email'),
                        'kota'      => $i->post('kota'),
                        'kecamatan' => $i->post('kecamatan'),
                        'kodepos'   => $i->post('kodepos'),
                        'alamat'    => $i->post('alamat'),
                        'tw'        => $i->post('tw'),
                        'fb'        => $i->post('fb'),
                        'ig'        => $i->post('ig'),
                        'linkedin'  => $i->post('linkedin'),
                        'foto'      => $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
                    $this->session->set_flashdata('msg', 'Profil diperbaharui');
                    redirect('user/profil/index');
                }
            } else {
                $i = $this->input;
                $data = [
                    'id_user'       => $this->session->userdata('id_user'),
                    'username'      => $i->post('username'),
                    'profesi'       => $i->post('profesi'),
                    'tgl_lahir'     => $i->post('tgl_lahir'),
                    'deskripsi'     => $i->post('deskripsi'),
                    'hp'            => $i->post('hp'),
                    'email'         => $i->post('email'),
                    'kota'          => $i->post('kota'),
                    'kecamatan'     => $i->post('kecamatan'),
                    'kodepos'     => $i->post('kodepos'),
                    'alamat'     => $i->post('alamat'),
                    'tw'     => $i->post('tw'),
                    'fb'     => $i->post('fb'),
                    'ig'     => $i->post('ig'),
                    'linkedin'     => $i->post('linkedin')
                ];
                $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
                $this->session->set_flashdata('msg', 'Profil diperbaharui');
                redirect('user/profil/index');
            }
        }
        $data = [
            'profil'  => $profil,
            'kota'      => $kota,
            'content' => 'user/profil/index'
        ];
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }

    public function ubahPassword()
    {
        $id_user = $this->session->userdata('id_user');
        $profil = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('old_pass', 'Password lama', 'required', array('required' => $required));
        $valid->set_rules('new_pass', 'Password baru', 'required|min_length[6]', array('required' => $required, 'min_length' => 'Password minimal 6 karakter'));
        $valid->set_rules('confirm_pass', 'Konfirmasi password', 'required|matches[new_pass]', array('required' => $required, 'matches' => 'Konfirmasi password yang anda masukkan tidak sama'));


        if ($valid->run() === FALSE) {
            // echo $required;
            // die;
            $data = [
                'content' => 'user/profil/ubahPassword'
            ];
            $this->load->view('user/layout/wrapper', $data, FALSE);
        } else {
            // echo $id_user;
            // die;
            if ($profil->password == sha1($this->input->post('old_pass'))) {
                $data = array(
                    'password' => sha1($this->input->post('new_pass'))
                );
                $this->Crud_model->edit($this->module, 'id_user', $id_user, $data);
                $this->session->set_flashdata('msg', 'Password diubah');
                redirect('user/profil/ubahPassword', 'refresh');
            } else {
                $data = [
                    'pesan_er'  => 'Password yang anda masukkan tidak sama',
                    'content' => 'user/profil/ubahPassword'
                ];
                $this->load->view('user/layout/wrapper', $data, FALSE);
            }
        }

        $data = [
            'content' => 'user/profil/ubahPassword'
        ];
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }
}
