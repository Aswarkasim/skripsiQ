<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{


    public function index()
    {
        $banner = $this->Crud_model->listing('tbl_banner');
        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('posisi', 'Posisi', 'required', ['required' => $required]);
        $valid->set_rules('urutan', 'Urutan', 'required|is_unique[tbl_banner.urutan]', ['required' => $required, 'is_unique' => 'Urutan <strong>' . $this->input->post('urutan') . '</strong> telah ada. silakan masukkan angka urutan yang lain']);
        if (empty($_FILES['gambar']['name'])) {
            $valid->set_rules('gambar', 'Gambar', 'required');
        }
        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/banner/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $data = [
                        'banner'    => $banner,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'admin/banner/index'
                    ];
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                } else {
                    $upload_data = ['uploads' => $this->upload->data()];

                    $i = $this->input;
                    $data = [
                        'id_banner'      => random_string('numeric', '5'),
                        'posisi'        => $this->input->post('posisi'),
                        'urutan'        => $this->input->post('urutan'),
                        'gambar'        => $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->add('tbl_banner', $data);
                    $this->session->set_flashdata('msg', 'Banner ditambahkan');
                    redirect('admin/konfigurasi/banner/index');
                }
            }
        }
        $data = [
            'banner'    => $banner,
            'content'   => 'admin/banner/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function delete($id_banner)
    {
        $gambar = $this->Crud_model->listingOne('tbl_banner', 'id_banner', $id_banner);
        unlink('assets/uploads/banner/' . $gambar->gambar);
        $this->Crud_model->delete('tbl_banner', 'id_banner', $id_banner);
        $this->session->set_flashdata('msg', 'Gambar telah dihapus');

        redirect('admin/konfigurasi/banner', 'refresh');
    }
}
