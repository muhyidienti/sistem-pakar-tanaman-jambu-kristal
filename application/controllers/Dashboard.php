<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['kategori'] = $this->db->get('tb_kategori')->result_array();
        $data['makanan'] = $this->db->get('tb_penyakit')->result_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard/index', $data);
    }
    public function tampildata_makanan()
    {
        $data = $this->db->get_where('tb_penyakit', ['kategori' => 'Makanan'])->result_array();
        echo json_encode($data);
    }
    public function tambah_makanan()
    {

        $upload_image = $_FILES['gambar_makanan'];
        if ($upload_image) {
            $config['upload_path']  = './assets/images_upload/makanan/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $_FILES['gambar_makanan']['name'];
            $config['max_size']  = 10048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar_makanan')) {

                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            }
        } else {
            echo $this->upload->display_errors();
        }


        $kategori = $this->input->post('kategori');
        $nama = $this->input->post('nama_makanan');
        $harga = $this->input->post('harga_makanan');

        $this->db->set('kategori', $kategori);
        $this->db->set('nama', $nama);
        $this->db->set('harga', $harga);
        $this->db->insert('tb_penyakit');

        $data = [
            'kategori' => $this->input->post('kategori'),
            'nama' => $this->input->post('nama_makanan'),
            'harga' => $this->input->post('harga_makanan'),
            'gambar' => $_FILES['gambar_makanan']
        ];
        echo json_encode($data);
    }
    public function hapus_makanan()
    {
        $id = $this->input->post('id');
        $data = $this->db->delete('tb_penyakit', ['id' => $id]);
        echo json_encode($data);
    }
    public function getdatabyid_makanan()
    {
        $id = $this->input->post('id');
        $data = $this->db->get_where('tb_penyakit', ['id' => $id])->row();
        echo json_encode($data);
    }
    public function updatedata_makanan()
    {
        $id = $this->input->post('id');
        $upload_image = $_FILES['gambar_makanan'];
        if ($upload_image) {
            $config['upload_path']  = './assets/images_upload/makanan/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['file_name'] = $_FILES['gambar_makanan']['name'];
            $config['max_size']  = 10048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar_makanan')) {

                $data['cek_gambar'] = $this->db->get_where('tb_penyakit', ['id' => $id])->row_array();
                $old_image = $data['cek_gambar']['gambar'];

                if ($old_image != 'default.png') {
                    unlink(FCPATH . '/assets/images_upload/makanan/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            }
        } else {
            echo $this->upload->display_errors();
        }


        $databaru = [
            'kategori' => $this->input->post('kategori'),
            'nama' => $this->input->post('nama_makanan'),
            'harga' => $this->input->post('harga_makanan'),
            'gambar' => $_FILES['gambar_makanan']
        ];


        $kategori = $this->input->post('kategori');
        $nama = $this->input->post('nama_makanan');
        $harga = $this->input->post('harga_makanan');


        $this->db->set('harga', $harga);
        $this->db->set('nama', $nama);
        $this->db->set('kategori', $kategori);
        $this->db->where('id', $id);
        $this->db->update('tb_penyakit');
        echo json_encode($databaru);
    }



    public function penyakit()
    {

        $data['penyakit'] = $this->db->get('tb_penyakit')->result_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard/penyakit', $data);
    }
    public function tampildata_penyakit()
    {
        $data = $this->db->get('tb_penyakit')->result_array();
        echo json_encode($data);
    }
    public function tambah_penyakit()
    {
        $kode_penyakit = $this->input->post('kode_penyakit');
        $nama_penyakit = $this->input->post('nama_penyakit');

        $this->db->set('kode_penyakit', $kode_penyakit);
        $this->db->set('nama_penyakit', $nama_penyakit);
        $this->db->insert('tb_penyakit');

        $data = [
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
        ];


        echo json_encode($data);
    }
    public function hapus_penyakit()
    {
        $id = $this->input->post('id');
        $data = $this->db->delete('tb_penyakit', ['id' => $id]);
        echo json_encode($data);
    }
    public function getdatabyid_penyakit()
    {
        $id = $this->input->post('id');
        $data = $this->db->get_where('tb_penyakit', ['id' => $id])->row();
        echo json_encode($data);
    }
    public function updatedata_penyakit()
    {
        $id = $this->input->post('id');

        $databaru = [
            'id' => $this->input->post('id'),
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit')
        ];

        $kode_penyakit = $this->input->post('kode_penyakit');
        $nama_penyakit = $this->input->post('nama_penyakit');

        $this->db->set('kode_penyakit', $kode_penyakit);
        $this->db->set('nama_penyakit', $nama_penyakit);
        $this->db->where('id', $id);
        $this->db->update('tb_penyakit');
        echo json_encode($databaru);
    }

    // public function laporan()
    // {
    //     $query_tanggal_laporan = "SELECT *
    //                                 FROM `tb_laporan_transaksi`
    //                                 GROUP BY `tanggal_transaksi`";
    //     $data['tanggal_laporan'] = $this->db->query($query_tanggal_laporan)->result_array();

    //     $this->load->view('template/header');
    //     $this->load->view('template/navbar');
    //     $this->load->view('template/sidebar');
    //     $this->load->view('dashboard/laporan', $data);
    // }

    // public function tampil_laporan_pertanggal($tanggal)
    // {

    //     $data['tanggal'] = $this->db->get_where('tb_laporan_transaksi', ['tanggal_transaksi' => $tanggal])->result_array();
    //     $data['tanggal_'] = $this->db->get_where('tb_laporan_transaksi', ['tanggal_transaksi' => $tanggal])->row_array();

    //     $query_jumlah = "SELECT SUM(harga) AS `jumlahHarga`
    //                      FROM `tb_laporan_transaksi`
    //                      WHERE `tanggal_transaksi` = '$tanggal'";
    //     $data['jumlah'] = $this->db->query($query_jumlah)->row_array();

    //     $query_grafik = "SELECT SUM(harga) AS `jumlahHarga`
    //                      FROM `tb_laporan_transaksi`
    //                      GROUP BY `tanggal_transaksi`";
    //     $data['dataGrafik'] = $this->db->query($query_grafik)->result_array();

    //     $this->load->view('template/header');
    //     $this->load->view('template/navbar');
    //     $this->load->view('template/sidebar');
    //     $this->load->view('dashboard/laporanPerTanggal', $data);
    // }
}
