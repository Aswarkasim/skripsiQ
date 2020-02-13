<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{


    public function index()
    {
        $kategori = $this->Crud_model->listing('tbl_kategori');
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('nama_kategori', 'Nama Kategori', 'required', ['required' => $required]);
        $valid->set_rules('icon', 'Icon', 'required', ['required' => $required]);
        if (empty($_FILES['gambar']['name'])) {
            $valid->set_rules('gambar', 'Gambar', 'required');
        }
        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/kategori/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $data = [
                        'kategori'    => $kategori,
                        'error'     => $this->upload->display_errors(),
                        'content' => 'admin/master/kategori/index'
                    ];
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                } else {
                    $upload_data = ['uploads' => $this->upload->data()];

                    // $i = $this->input;
                    $data = [
                        'id_kategori'      => random_string('numeric', '5'),
                        'nama_kategori'        => $this->input->post('nama_kategori'),
                        'icon'        => $this->input->post('icon'),
                        'gambar'        => $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->add('tbl_kategori', $data);
                    $this->session->set_flashdata('msg', 'Banner ditambahkan');
                    redirect('admin/master/kategori/index');
                }
            }
        }
        $data = [
            'kategori'    => $kategori,
            'content'   => 'admin/master/kategori/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


    function edit($id_kategori)
    {
        // $valid = $this->form_validation;
        // $valid->set_rules('id_kategori', 'Kode Kaategori', 'macthes[tbl_kategori.id_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));
        // $valid->set_rules('nama_kategori', 'Nama Kaategori', 'macthes[tbl_kategori.nama_kategori]', array('matches' => '%s telah ada. Silahkan masukkan kode yang lain'));


        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './assets/uploads/kategori/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['max_size']      = '24000'; // KB 
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data = [
                    'error'     => $this->upload->display_errors(),
                    'content' => 'admin/master/kategori/index'
                ];
                $this->load->view('admin/layout/wrapper', $data, FALSE);
            } else {
                $upload_data = ['uploads' => $this->upload->data()];

                // $i = $this->input;
                $data = [
                    'id_kategori'      => $id_kategori,
                    'nama_kategori'        => $this->input->post('nama_kategori'),
                    'icon'        => $this->input->post('icon'),
                    'gambar'        => $upload_data['uploads']['file_name']
                ];
                $this->Crud_model->edit('tbl_kategori', 'id_kategori', $id_kategori, $data);
                $this->session->set_flashdata('msg', 'Kategori diedit');
                redirect('admin/master/kategori/index');
            }
        } else {
            $data = [
                'id_kategori'      => $id_kategori,
                'nama_kategori'        => $this->input->post('nama_kategori'),
                'icon'        => $this->input->post('icon')
            ];
            $this->Crud_model->edit('tbl_kategori', 'id_kategori', $id_kategori, $data);
            $this->session->set_flashdata('msg', 'Kategori diedit');
            redirect('admin/master/kategori/index');
        }
    }

    public function delete($id_kategori)
    {
        $kategori = $this->Crud_model->listingOne('tbl_kategori', 'id_kategori', $id_kategori);
        $gambar  = $kategori->gambar;
        unlink('assets/uploads/kategori/' . $gambar);
        $this->Crud_model->delete('tbl_kategori', 'id_kategori', $id_kategori);
        $this->session->set_flashdata('msg', 'data telah dihapus');
        redirect('admin/master/kategori');
    }
}
