<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Skill extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
    }


    public function index()
    {

        $id_user = $this->session->userdata('id_user');
        $skillJlh = $this->Crud_model->listingOneAll('tbl_skill', 'id_user', $id_user, null);

        $this->load->library('pagination');

        $config['base_url'] = base_url('user/skill/index/');
        $config['total_rows'] = count($skillJlh);
        $config['per_page'] = 6;
        //$config['uri_segment'] = 3;
        // $choice = $config['total_rows'] / $config['per_page'];
        // $config['num_links'] = floor($choice);



        $from = $this->uri->segment(4);

        $this->pagination->initialize($config);

        $skill = $this->Crud_model->listingOneAll('tbl_skill', 'id_user', $id_user, $config['per_page'], $from);

        $pagination = $this->pagination->create_links();

        $data = [
            'skill'       => $skill,
            'pagination'  => $pagination,
            'content'     => 'user/skill/index'
        ];
        $this->load->view('user/layout/wrapper', $data);
    }

    function detail($id_skill)
    {
        $this->session->unset_userdata('id_skill');
        $gambar = $this->Crud_model->listingOneAll('tbl_gambar', 'id_post', $id_skill);
        $skill = $this->Crud_model->listingOne('tbl_skill', 'id_skill', $id_skill);
        $profil = $this->Crud_model->listingOne('tbl_user', 'id_user', $skill->id_user);
        $tanggapan = $this->User_model->listTanggapanPost($id_skill);
        $data = [
            'profil'      => $profil,
            'tanggapan'   => $tanggapan,
            'skill'       => $skill,
            'gambar'      => $gambar,
            'content'     => 'user/skill/detail'
        ];
        $this->load->view('user/layout/wrapper', $data);
    }

    function post()
    {
        $regional = $this->Crud_model->listing('tbl_regional');
        $kategori = $this->Crud_model->listing('tbl_kategori');
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('nama_skill', 'Nama Skill', 'required', ['required' => $required]);
        if (empty($_FILES['gambar']['name'])) {
            $valid->set_rules('gambar', 'Gambar', 'required');
        }
        if ($valid->run()) {
            echo 'rr';
            echo $this->input->post('nama_skill');
            echo $this->input->post('gambar');
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/skill/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    echo 'aa';
                    $data = [
                        'kategori'  => $kategori,
                        'regional'  => $regional,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'user/skill/post'
                    ];
                    $this->load->view('user/layout/wrapper', $data, FALSE);
                } else {
                    echo 'bb';
                    $upload_data = ['uploads' => $this->upload->data()];

                    $i = $this->input;
                    $data = [
                        'id_skill'        => 'SKILL' . random_string('numeric', '15'),
                        'id_user'       => $this->session->userdata('id_user'),
                        'id_kategori'   => $i->post('id_kategori'),
                        'nama_skill'      => $i->post('nama_skill'),
                        // 'type'          => $i->post('type'),
                        'regional'      => $i->post('regional'),
                        'slug'          => url_title($i->post('nama_skill', 'dash', TRUE)),
                        'deskripsi'     => $i->post('deskripsi'),
                        'upah_min'      => $i->post('upah_min'),
                        'upah_max'      => $i->post('upah_max'),
                        'gambar'        => $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->add('tbl_skill', $data);
                    $this->session->set_flashdata('msg', 'Skill ditambahkan');
                    redirect('user/skill');
                }
            }
        }
        $data = [
            'kategori'  => $kategori,
            'regional'  => $regional,
            'content' => 'user/skill/post'
        ];
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }

    function edit($id_skill)
    {
        $skill  = $this->Crud_model->listingOne('tbl_skill', 'id_skill', $id_skill);
        $kategori = $this->Crud_model->listing('tbl_kategori');
        $regional = $this->Crud_model->listing('tbl_regional');
        $gambar = $this->Crud_model->listingOneAll('tbl_gambar', 'id_post', $id_skill);
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('nama_skill', 'Nama Skill', 'required', ['required' => $required]);

        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/skill/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    echo 'aa';
                    $data = [
                        'kategori'  => $kategori,
                        'skill'     => $skill,
                        'regional'     => $regional,
                        'gambar'    => $gambar,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'user/skill/edit'
                    ];
                    $this->load->view('user/layout/wrapper', $data, FALSE);
                } else {

                    if ($skill->gambar != '') {
                        unlink(base_url('assets/uploads/skill/' . $skill->gambar));
                    }

                    $upload_data = ['uploads' => $this->upload->data()];

                    $i = $this->input;
                    $data = [
                        'id_skill'        => $id_skill,
                        'id_user'       => $this->session->userdata('id_user'),
                        'id_kategori'   => $i->post('id_kategori'),
                        'nama_skill'      => $i->post('nama_skill'),
                        // 'type'          => $i->post('type'),
                        'slug'          => url_title($i->post('nama_skill', 'dash', TRUE)),
                        'regional'      => $i->post('regional'),
                        'deskripsi'     => $i->post('deskripsi'),
                        'upah_min'      => $i->post('upah_min'),
                        'upah_max'      => $i->post('upah_max'),
                        'gambar'        => $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->edit('tbl_skill', 'id_skill', $id_skill, $data);
                    $this->session->set_flashdata('msg', 'Skill diubah');
                    redirect('user/skill/detail/' . $id_skill);
                }
            } else {
                $upload_data = ['uploads' => $this->upload->data()];

                $i = $this->input;
                $data = [
                    'id_skill'        => $id_skill,
                    'id_user'       => $this->session->userdata('id_user'),
                    'id_kategori'   => $i->post('id_kategori'),
                    'nama_skill'      => $i->post('nama_skill'),
                    // 'type'          => $i->post('type'),
                    'slug'          => url_title($i->post('nama_skill', 'dash', TRUE)),
                    'regional'      => $i->post('regional'),
                    'deskripsi'     => $i->post('deskripsi'),
                    'upah_min'      => $i->post('upah_min'),
                    'upah_max'      => $i->post('upah_max'),
                ];
                $this->Crud_model->edit('tbl_skill', 'id_skill', $id_skill, $data);
                $this->session->set_flashdata('msg', 'Skill diubah');
                redirect('user/skill/detail/' . $id_skill);
            }
        }
        $data = [
            'kategori'  => $kategori,
            'skill'     => $skill,
            'gambar'    => $gambar,
            'regional'    => $regional,
            'content' => 'user/skill/edit'
        ];
        $this->load->view('user/layout/wrapper', $data, FALSE);
    }

    function delete($id_skill)
    {
        $skill = $this->Crud_model->listingOneAll('tbl_skill', 'id_skill', $id_skill);
        $gambar = $this->Crud_model->listingOneAll('tbl_gambar', 'id_post', $id_skill);
        if ($gambar) {
            foreach ($gambar as $row) {
                unlink(base_url('assets/uploads/skill/' . $row->gambar));
            }
        }
        unlink('assets/uploads/skill/' . $skill->gambar);
        $this->Crud_model->delete('tbl_gambar', 'id_post', $id_skill);
        $this->Crud_model->delete('tbl_skill', 'id_skill', $id_skill);
        $this->session->set_flashdata('msg', 'Skill dihapus');
        redirect('user/skill');
    }

    function addPict()
    {
        $id_skill = $this->input->post('id_skill');
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('id_skill', 'ID Skil', 'required', ['required' => $required]);

        // if ($valid->run()) {
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './assets/uploads/skill/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['max_size']      = '24000'; // KB 
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                redirect('user/skill/edit/' . $id_skill);
            } else {
                $upload_data = ['uploads' => $this->upload->data()];

                $i = $this->input;
                $data = [
                    'id_post'       => $id_skill,
                    'gambar'        => $upload_data['uploads']['file_name']
                ];
                $this->Crud_model->add('tbl_gambar', $data);
                $this->session->set_flashdata('msg', 'gambar ditambah');
                redirect('user/skill/edit/' . $id_skill);
            }
            // }
        }
    }

    function deletePict($id_gambar)
    {
        $gambar = $this->Crud_model->listingOne('tbl_gambar', 'id_gambar', $id_gambar);
        $this->session->set_userdata('id_skill', $gambar->id_post);
        // print_r($this->session->userdata('id_skill'));
        // die;
        unlink(base_url('assets/uploads/skill/' . $gambar->id_gambar));
        $this->Crud_model->delete('tbl_gambar', 'id_gambar', $id_gambar);
        $this->session->set_flashdata('msg', 'Gambar telah dihapus');
        redirect('user/skill/edit/' . $this->session->userdata('id_skill'));
    }

    public function cari()
    {
        $this->load->model('user/User_model');

        $i = $this->input;
        $id_user = $this->session->userdata('id_user');
        $keyword = $i->post('keyword');
        $hasil = $this->User_model->cari($keyword, $id_user, 'tbl_skill');
        $data = [
            'skill'     => $hasil,
            'content'   => 'user/skill/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function tanggapan()
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
        redirect(base_url('user/skill/detail/' . $data['id_post']), 'refresh');
    }
}
