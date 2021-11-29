<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('id'))) {
            redirect('user/login');
        }

        //memanggil model
        $this->load->model('kategori_barang_model');
    }

    public function index()
    {
        //mengarahkan ke function read
        $this->read();
    }

    public function read()
    {
        //memanggil function read pada kategori barang model
        //function read berfungsi mengambil/read data dari table kategori barang di database
        $data_kategori_barang = $this->kategori_barang_model->read();

        //mengirim data ke view
        $output = array(
            //memanggil view
            'judul' => 'Daftar Kategori Barang',
            'theme_page' => 'Kategori/kategori_barang_read',

            //data kategori barang dikirim ke view
            'data_kategori_barang' => $data_kategori_barang
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert()
    {
        //mengirim data ke view
        $output = array(
            //memanggil view
            'judul' => 'Tambah Kategori Barang',
            'theme_page' => 'Kategori/kategori_barang_insert',
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function insert_submit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $this->insert();

            //jika validasi sukses
        } else {
            //menangkap data input dari view
            $nama = $this->input->post('nama');

            //mengirim data ke model
            $input = array(
                //format : nama field/kolom table => data input dari view
                'nama' => $nama
            );

            //memanggil function insert pada kategori_barang model
            //function insert berfungsi menyimpan/create data ke table kategori_barang di database
            $this->kategori_barang_model->insert($input);

            //pesan
            $this->session->set_flashdata('message', 'Data berhasil ditambah');

            //mengembalikan halaman ke function read
            redirect('kategori_barang/read');
        }
    }

    public function update()
    {
        //menangkap id data yg dipilih dari view (parameter get)
        $id = $this->uri->segment(3);

        //function read berfungsi mengambil 1 data dari table kategori barang sesuai id yg dipilih
        $data_kategori_barang_single = $this->kategori_barang_model->read_single($id);

        //mengirim data ke view
        $output = array(
            'judul' => 'Ubah Kategori Barang',
            'theme_page' => 'Kategori/kategori_barang_update',

            //mengirim data kategori barang yang dipilih ke view
            'data_kategori_barang_single' => $data_kategori_barang_single,
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }

    public function update_submit()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        //jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $this->update();

            //jika validasi sukses
        } else {
            //menangkap data input dari view
            $nama = $this->input->post('nama');

            //mengirim data ke model
            $input = array(
                //format : nama field/kolom table => data input dari view
                'nama' => $nama
            );

            //memanggil function update pada kategori_barang model
            //function update berfungsi merubah data ke table kategori_barang di database
            $this->kategori_barang_model->update($input, $id);

            //pesan
            $this->session->set_flashdata('message', 'Data berhasil diubah');

            //mengembalikan halaman ke function read
            redirect('kategori_barang/read');
        }
    }

    public function delete()
    {
        //menangkap id data yg dipilih dari view
        $id = $this->uri->segment(3);

        //memanggil function delete pada kategori_barang model
        $this->kategori_barang_model->delete($id);

        //pesan
        $this->session->set_flashdata('message', 'Data berhasil dihapus');

        //mengembalikan halaman ke function read
        redirect('kategori_barang/read');
    }
}
