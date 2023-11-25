<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table            = 'csb_tagihan_pembayaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];


    // Kartu Ujian

    public function KartuUjian($id)
    {
       return $this->db->table('csb_tagihan_pembayaran')
        ->select('
        csb_akun.id,
        csb_akun.noreg,
        csb_akun.nisn,
        csb_akun.nama_lengkap,
        csb_akun.tempat_lahir,
        csb_akun.tanggal_lahir,
        csb_akun.gender,
        csb_akun.master_periode_id,
        csb_akun.master_jalur_id,
        csb_akun.is_asrama,
        csb_akun.foto,
        master_periode.periode,
        master_periode.tahap_daftar,
        master_jalur.jalur_name,
        master_school_level.level_name,
        master_school_level.description
        ')
        ->join('csb_akun','csb_tagihan_pembayaran.csb_akun_id=csb_akun.id')
        ->join('master_periode','csb_akun.master_periode_id=master_periode.id')
        ->join('master_jalur','csb_akun.master_jalur_id=master_jalur.id')
        ->join('master_school_level','csb_akun.master_school_level_id=master_school_level.id')
        ->where('csb_tagihan_pembayaran.csb_akun_id', $id)
        ->where('csb_tagihan_pembayaran.status_pembayaran', 'SUKSES')
        ->get()
        ->getRow();

    }


    public function getJadwal($periode, $jalur)
    {
        return $this->db->table('master_jadwal_ujian')
        ->select('
        tanggal_ujian,
        waktu_ujian,
        tempat_ujian
        ')
        ->where('master_periode_id', $periode)
        ->where('master_jalur_id', $jalur)
        ->get()
        ->getRow();
        
    }


    
    
    

}