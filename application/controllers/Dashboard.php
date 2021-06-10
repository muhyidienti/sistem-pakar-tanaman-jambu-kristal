<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {

        $data['gejala'] = $this->db->get('tb_gejala')->result_array();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('template/footer');
    }
    public function tampildata_gejala()
    {
        $data = $this->db->get('tb_gejala')->result_array();
        echo json_encode($data);
    }

    public function tambah_gejala()
    {
        $data = [
            'kode_gejala' => $this->input->post('kode_gejala'),
            'nama_gejala' => $this->input->post('nama_gejala'),
        ];
        $this->db->insert('tb_gejala', $data);
        echo json_encode($data);
    }

    public function hapus_gejala()
    {
        $id = $this->input->post('id_gejala');
        $data = $this->db->delete('tb_gejala', ['id_gejala' => $id]);
        echo json_encode($data);
    }
    public function getdatabyid_gejala()
    {
        $id = $this->input->post('id');
        $data = $this->db->get_where('tb_gejala', ['id_gejala' => $id])->row();
        echo json_encode($data);
    }
    public function updatedata_gejala()
    {
        $id = $this->input->post('id_gejala');
        $data = [
            'kode_gejala' => $this->input->post('kode_gejala'),
            'nama_gejala' => $this->input->post('nama_gejala')
        ];



        $kode_gejala = $this->input->post('kode_gejala');
        $nama_gejala = $this->input->post('nama_gejala');



        $this->db->set('kode_gejala', $kode_gejala);
        $this->db->set('nama_gejala', $nama_gejala);
        $this->db->where('id_gejala', $id);
        $this->db->update('tb_gejala');
        echo json_encode($data);
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
        $deskripsi_penyakit = $this->input->post('deskripsi_penyakit');
        $solusi_penyakit = $this->input->post('solusi_penyakit');

        $this->db->set('kode_penyakit', $kode_penyakit);
        $this->db->set('nama_penyakit', $nama_penyakit);
        $this->db->set('deskripsi_penyakit', $deskripsi_penyakit);
        $this->db->set('solusi_penyakit', $solusi_penyakit);
        $this->db->insert('tb_penyakit');

        $data = [
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'deskripsi_penyakit' => $this->input->post('deskripsi_penyakit'),
            'solusi_penyakit' => $this->input->post('solusi_penyakit')
        ];
        echo json_encode($data);
    }
    public function hapus_penyakit()
    {
        $id_penyakit = $this->input->post('id_penyakit');
        $data = $this->db->delete('tb_penyakit', ['id_penyakit' => $id_penyakit]);
        echo json_encode($data);
    }
    public function getdatabyid_penyakit()
    {
        $id_penyakit = $this->input->post('id_penyakit');
        $data = $this->db->get_where('tb_penyakit', ['id_penyakit' => $id_penyakit])->row();
        echo json_encode($data);
    }
    public function updatedata_penyakit()
    {
        $id_penyakit = $this->input->post('id_penyakit');

        $databaru = [
            'id_penyakit' => $this->input->post('id_penyakit'),
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'deskripsi_penyakit' => $this->input->post('deskripsi_penyakit'),
            'solusi_penyakit' => $this->input->post('solusi_penyakit'),
        ];

        $kode_penyakit = $this->input->post('kode_penyakit');
        $nama_penyakit = $this->input->post('nama_penyakit');
        $deskripsi_penyakit = $this->input->post('deskripsi_penyakit');
        $solusi_penyakit = $this->input->post('solusi_penyakit');

        $this->db->set('kode_penyakit', $kode_penyakit);
        $this->db->set('nama_penyakit', $nama_penyakit);
        $this->db->set('deskripsi_penyakit', $deskripsi_penyakit);
        $this->db->set('solusi_penyakit', $solusi_penyakit);
        $this->db->where('id_penyakit', $id_penyakit);
        $this->db->update('tb_penyakit');
        echo json_encode($databaru);
    }
}
