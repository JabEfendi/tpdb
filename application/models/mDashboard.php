<?php

class mDashboard extends CI_Model
{
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_all_data($tabel)
    {
        $q = $this->db->get($tabel);
        return $q;
    }

    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }

    public function selectJudul($tanggal)
    {
        // Load database
        $this->load->database();

        // Query untuk menampilkan data berdasarkan rentang tanggal
        $this->db->select('*');
        $this->db->from('proposal_kegiatan_dan_pendanaan');
        $this->db->where('tanggal =', $tanggal);
        $query = $this->db->get();

        // Mengembalikan hasil query
        return $query->result();
    }

    public function selectStatus($status)
    {
        // Load database
        $this->load->database();

        // Query untuk menampilkan data berdasarkan rentang tanggal
        $this->db->select('*');
        $this->db->from('proposal_kegiatan_dan_pendanaan');
        $this->db->where('STAT =', $status);
        $query = $this->db->get();

        // Mengembalikan hasil query
        return $query->result();
    }
}
