<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Job extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_user();
    }


    public function index()
    {
        $id_user = $this->session->userdata('id_user');


        $this->load->library('pagination');

        $config['base_url']     = base_url('user/job/index/');
        $config['total_rows']   = count($job = $this->Crud_model->listingOneAll('tbl_job', 'id_user', $id_user, null, null));
        $config['per_page']     = 5;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $job = $this->Crud_model->listingOneAll('tbl_job', 'id_user', $id_user, $config['per_page'], $from);

        $data = [
            'job'       => $job,
            'pagination' => $this->pagination->create_links(),
            'content'   => 'user/job/index'
        ];
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }

    public function post()
    {
        $regional = $this->Crud_model->listing('tbl_regional');
        $kategori = $this->Crud_model->listing('tbl_kategori');
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('nama_job', 'Nama Job', 'required', ['required' => $required]);
        if (empty($_FILES['gambar']['name'])) {
            $valid->set_rules('gambar', 'Gambar', 'required');
        }
        if ($valid->run()) {
            echo 'rr';
            echo $this->input->post('nama_job');
            echo $this->input->post('gambar');
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/job/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    echo 'aa';
                    $data = [
                        'kategori'  => $kategori,
                        'regional'  => $regional,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'user/job/post'
                    ];
                    $this->load->view('user/layout/wrapper', $data, FALSE);
                } else {
                    echo 'bb';
                    $upload_data = ['uploads' => $this->upload->data()];

                    $i = $this->input;
                    $data = [
                        'id_job'        => 'JOB' . random_string('numeric', '15'),
                        'id_user'       => $this->session->userdata('id_user'),
                        'id_kategori'   => $i->post('id_kategori'),
                        'nama_job'      => $i->post('nama_job'),
                        'lokasi'        => $i->post('lokasi'),
                        // 'type'          => $i->post('type'),
                        'slug'          => url_title($i->post('nama_job', 'dash', TRUE)),
                        'regional'      => 'Makassar',
                        'link'          => $i->post('link'),
                        'deskripsi'          => $i->post('deskripsi'),
                        'upah_min'      => $i->post('upah_min'),
                        'upah_max'      => $i->post('upah_max'),
                        'gambar'        => $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->add('tbl_job', $data);
                    $this->session->set_flashdata('msg', 'Job ditambahkan');
                    redirect('user/job/');
                }
            }
        }
        $data = [
            'kategori'  => $kategori,
            'regional'  => $regional,
            'content' => 'user/job/post'
        ];
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }

    public function delete($id_job)
    {
        $job = $this->Crud_model->listingOne('tbl_job', 'id_job', $id_job);;
        unlink('assets/uploads/job/' . $job->gambar);
        $this->Crud_model->delete('tbl_job', 'id_job', $id_job);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('user/job');
    }

    function detail($id_job)
    {
        $this->load->model('User_model');
        $this->session->unset_userdata('id_job');
        $gambar = $this->Crud_model->listingOneAll('tbl_gambar', 'id_post', $id_job);
        $job = $this->Crud_model->listingOne('tbl_job', 'id_job', $id_job);
        $profil = $this->Crud_model->listingOne('tbl_user', 'id_user', $job->id_user);
        $tanggapan = $this->User_model->listTanggapanPost($id_job);
        $data = [
            'profil'      => $profil,
            'job'       => $job,
            'tanggapan'       => $tanggapan,
            'gambar'      => $gambar,
            'content'     => 'user/job/detail'
        ];
        $this->load->view('user/layout/wrapper', $data);
    }

    function edit($id_job)
    {
        $job  = $this->Crud_model->listingOne('tbl_job', 'id_job', $id_job);
        $kategori = $this->Crud_model->listing('tbl_kategori');
        $regional = $this->Crud_model->listing('tbl_regional');
        $gambar = $this->Crud_model->listingOneAll('tbl_gambar', 'id_post', $id_job);
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('nama_job', 'Nama Skill', 'required', ['required' => $required]);

        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/job/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    echo 'aa';
                    $data = [
                        'kategori'  => $kategori,
                        'job'     => $job,
                        'gambar'    => $gambar,
                        'regional'  => $regional,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'user/job/edit'
                    ];
                    $this->load->view('user/layout/wrapper', $data, FALSE);
                } else {

                    if ($job->gambar != '') {
                        unlink(base_url('assets/uploads/job/' . $job->gambar));
                    }

                    $upload_data = ['uploads' => $this->upload->data()];

                    $i = $this->input;
                    $data = [
                        'id_job'        => $id_job,
                        'id_user'       => $this->session->userdata('id_user'),
                        'id_kategori'   => $i->post('id_kategori'),
                        'nama_job'      => $i->post('nama_job'),
                        // 'type'          => $i->post('type'),
                        'type'          => 'Part Time',
                        'regional'      => 'Makassar',
                        'slug'          => url_title($i->post('nama_job', 'dash', TRUE)),
                        'deskripsi'     => $i->post('deskripsi'),
                        'upah_min'      => $i->post('upah_min'),
                        'upah_max'      => $i->post('upah_max'),
                        'gambar'        => $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->edit('tbl_job', 'id_job', $id_job, $data);
                    $this->session->set_flashdata('msg', 'Skill diubah');
                    redirect('user/job/detail/' . $id_job);
                }
            } else {
                $upload_data = ['uploads' => $this->upload->data()];

                $i = $this->input;
                $data = [
                    'id_job'        => $id_job,
                    'id_user'       => $this->session->userdata('id_user'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'nama_job'      => $i->post('nama_job'),
                    // 'type'          => $i->post('type'),
                    'type'          => 'Part Time',
                    'regional'      => $i->post('regional'),
                    'slug'          => url_title($i->post('nama_job', 'dash', TRUE)),
                    'deskripsi'     => $i->post('deskripsi'),
                    'upah_min'      => $i->post('upah_min'),
                    'upah_max'      => $i->post('upah_max'),
                ];
                $this->Crud_model->edit('tbl_job', 'id_job', $id_job, $data);
                $this->session->set_flashdata('msg', 'Skill diubah');
                redirect('user/job/detail/' . $id_job);
            }
        }
        $data = [
            'kategori'  => $kategori,
            'job'     => $job,
            'regional'  => $regional,
            'gambar'    => $gambar,
            'content' => 'user/job/edit'
        ];
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }

    public function cari()
    {
        $this->load->model('user/User_model');

        $i = $this->input;
        $id_user = $this->session->userdata('id_user');
        $keyword = $i->post('keyword');
        $hasil = $this->User_model->cari($keyword, $id_user, 'tbl_job');
        $data = [
            'job'     => $hasil,
            'content'   => 'user/job/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
