<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function tampil_makanan()
    {

        $data['makanan'] = $this->db->get_where('tb_makanan', ['kategori' => 'Makanan'])->result_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar_pembayaran');
        $this->load->view('transaksi_makanan/tampil_makanan', $data);
        $this->load->view('template/footer_transaksi');
    }

    public function tampil_minuman()
    {

        $data['minuman'] = $this->db->get_where('tb_makanan', ['kategori' => 'Minuman'])->result_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar_pembayaran');
        $this->load->view('transaksi_minuman/tampil_minuman', $data);
        $this->load->view('template/footer_transaksi');
    }

    public function tampildata_transaksi()
    {
        $data = $this->db->get('tb_transaksi')->result_array();
        echo json_encode($data);
    }

    public function simpanPilihan()
    {
        $id = $this->input->post('id');
        $dataPilihan = $this->db->get_where('tb_makanan', ['id' => $id])->row_array();


        $kategori = $dataPilihan['kategori'];
        $nama = $dataPilihan['nama'];
        $harga = $dataPilihan['harga'];
        $data = [
            'id_makanan' => $id,
            'kategori' => $kategori,
            'nama' => $nama,
            'qty' => 1,
            'harga' => $harga,
            'tanggal_transaksi' => Date('y-m-d')
        ];

        $cek_barang = $this->db->get_where('tb_transaksi', ['id_makanan' => $id])->row();


        if ($cek_barang) {
            $qty = $cek_barang->qty;
            $newQty = $qty + 1;
            $this->db->where('id_makanan', $id);
            $data2 = $this->db->update('tb_transaksi', [
                'id' => $id,
                'qty' => $newQty,
                'harga' => $harga * $newQty
            ]);
        } else {

            $data2 = $this->db->insert('tb_transaksi', $data);
            $this->db->insert('tb_laporan_transaksi', $data);
        }
        echo json_encode($data2);
    }

    public function jumlahTransaksi()
    {
        $jumlah = "SELECT SUM(harga) AS jumlahHarga FROM tb_transaksi";
        $data = $this->db->query($jumlah)->result();
        echo json_encode($data);
    }

    public function bayar()
    {
        $jumlah = "SELECT SUM(harga) AS jumlahHarga FROM tb_transaksi";
        $jumlah_pilihan = $this->db->query($jumlah)->row();

        $bayar = $this->input->post('bayar');

        $kembalian = $bayar - $jumlah_pilihan->jumlahHarga;
        $data = $kembalian;
        $data_print = [
            'bayar' => $bayar,
            'kembalian' => $data
        ];
        $this->session->set_userdata($data_print);
        echo json_encode($data);
    }

    public function export()
    {
        $jumlah = "SELECT SUM(harga) AS jumlahHarga FROM tb_transaksi";
        $data['jumlah_pilihan'] = $this->db->query($jumlah)->row();
        $data['data_export'] = $this->db->get('tb_transaksi')->result_array();
        $data['bayar'] = $this->session->userdata('bayar');
        $data['kembalian'] = $this->session->userdata('kembalian');

        $this->load->view('export', $data);
    }

    public function bersihkan_data()
    {
        $hapus_isi_tabel = "TRUNCATE TABLE tb_transaksi";

        $this->db->query($hapus_isi_tabel);
        redirect('transaksi/tampil_makanan');
    }

    public function ubahQty()
    {
        $id = $this->input->post('id');
        $type = $this->input->post('type');

        $query = $this->db->get_where('tb_transaksi', ['id' => $id])->row_array();
        $qty = $query['qty'];

        $nama_makanan = $query['nama'];

        $query_satuan = $this->db->get_where('tb_makanan', ['nama' => $nama_makanan])->row_array();
        $harga_satuan = $query_satuan['harga'];


        if ($type == 'kurang') {
            $newQty = $qty - 1;
            $newHarga = $harga_satuan * $newQty;
        } else {
            $newQty = $qty + 1;
            $newHarga = $harga_satuan * $newQty;
        }

        $this->db->set('harga', $newHarga);
        $this->db->set('qty', $newQty);
        $this->db->where('id', $id);
        $this->db->update('tb_transaksi');
        if ($this->db->affected_rows()) {
            if ($newQty == 0) {
                $this->db->delete('tb_transaksi', ['id' => $id]);
            }
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
