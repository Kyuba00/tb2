<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //check manual
        if (!$this->session->userdata('id')) {
            redirect('user/login');
        }

        //check akses auto
        /*if(!check_akses('dashboard/index')) {
        	redirect('auth/login');
        }*/

        //memanggil model
        $this->load->model(array('dashboard_model'));
    }

    public function index()
    {
        //summary
        $data_penjualan = $this->dashboard_model->total_penjualan();
        $data_pembelian = $this->dashboard_model->total_pembelian();

        //grafik
        $data_grafik = $this->dashboard_model->rekap_penjualan_perbarang();

        //mengirim data ke view
        $output = array(
            'theme_page' => 'Dashboard/dashboard',
            'judul' => 'Dashboard',

            'data_penjualan' => $data_penjualan,
            'data_pembelian' => $data_pembelian,
            'data_grafik' => $data_grafik
        );

        //memanggil file view
        $this->load->view('theme/index', $output);
    }
}
