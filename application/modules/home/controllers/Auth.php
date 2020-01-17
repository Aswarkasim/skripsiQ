<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $valid = $this->form_validation;
        $required = '%s tidak boleh kosong';
        $valid->set_rules('username', 'Email atau Username', 'required', array('required' => $required));
        $valid->set_rules('password', 'Password', 'required', array('required' => $required));


        if ($valid->run() === FALSE) {
            $data = [
                'content' => 'home/auth/login'
            ];
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $username = $i->post('username');
            $password = $i->post('password');
            $login = $this->Crud_model->login($username, $password);
            if ($login) {
                $s = $this->session;
                $s->set_userdata('id_user', $login->id_user);
                $s->set_userdata('username', $login->username);
                $s->set_userdata('email', $login->email);
                $s->set_userdata('namalengkap', $login->namalengkap);
                $s->set_userdata('is_active', $login->is_active);
                redirect('home', 'refresh');
            } else {
                $login = $this->Crud_model->loginUsername($username, $password);
                if ($login) {
                    $s = $this->session;
                    $s->set_userdata('id_user', $login->id_user);
                    $s->set_userdata('username', $login->username);
                    $s->set_userdata('email', $login->email);
                    $s->set_userdata('namalengkap', $login->namalengkap);
                    $s->set_userdata('is_active', $login->is_active);
                    redirect('home', 'refresh');
                } else {
                    $this->session->set_flashdata('msg', 'Kesalahan autentikasi. Perhatikan username atau email dan password');
                    redirect('home/auth', 'refresh');
                }
            }
        }
    }
    public function register()
    {
        $required = '%s tidak boleh kosong';
        $is_username = '%s ' . post('username') . ' telah ada, silakan masukkan %s yang lain';
        $is_email = '%s ' . post('email') . ' telah ada, silakan masukkan %s yang lain';
        $valid = $this->form_validation;
        $valid->set_rules('namalengkap', 'Nama Lengkap', 'required', array('required' => $required));
        $valid->set_rules('username', 'Username', 'required|is_unique[tbl_user.username]', array('required' => $required, 'is_unique' => $is_username));
        $valid->set_rules('email', 'email', 'required|is_unique[tbl_user.email]|valid_email', array('required' => $required, 'is_unique' => $is_email, 'valid_email' => '%s yang anda  masukkan tidak valid'));
        $valid->set_rules('password', 'Password', 'required', array('required' => $required, 'is_unique' => $is_email));
        $valid->set_rules('re_password', 'Konfirmasi Password', 'required|matches[password]', array('required' => $required, 'matches' => '%s password yang anda masukkan tidak sama'));

        if ($valid->run() === FALSE) {
            $data = [
                'content' => 'home/auth/register'
            ];
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'namalengkap'   => $i->post('namalengkap'),
                'username'      => $i->post('username'),
                'email'         => $i->post('email'),
                'password'      => sha1($i->post('password')),
                'role'          => 'User',
                'is_active'     =>  1,
            ];
            $this->Crud_model->add('tbl_user', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('home/auth/login', 'refersh');
        }
    }

    function logout()
    {
        $s = $this->session;
        $s->unset_userdata('id_user');
        $s->unset_userdata('username');
        $s->unset_userdata('email');
        $s->unset_userdata('namalengkap');
        $s->unset_userdata('is_active');

        redirect('home/auth', 'refresh');
    }
}
