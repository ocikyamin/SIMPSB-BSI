<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentAccount extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'csb_akun';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];
    // All Data 
    public function GetAll($periode=null)
    {
        if ($periode !=='all') {
            return $this->db->table('csb_akun')
            ->select('
            csb_akun.id,
            csb_akun.noreg,
            csb_akun.nisn,
            csb_akun.nama_lengkap,
            csb_akun.gender,
            csb_akun.whatsapp,
            csb_akun.is_asrama,
            master_school_level.level_name,
            master_periode.periode,
            master_periode.tahap_daftar,
            master_jalur.jalur_name,
            master_school_level.level_name,       
            csb_akun.status_lulus,
            csb_akun.status_daftar_ulang
            ')
            ->join('master_periode','csb_akun.master_periode_id=master_periode.id')
            ->join('master_jalur','csb_akun.master_jalur_id=master_jalur.id')
            ->join('master_school_level','csb_akun.master_school_level_id=master_school_level.id')
            ->where('csb_akun.master_periode_id', $periode)
            ->get()->getResultArray();
        }
        return $this->db->table('csb_akun')
        ->select('
        csb_akun.id,
        csb_akun.noreg,
        csb_akun.nisn,
        csb_akun.nama_lengkap,
        csb_akun.gender,
        csb_akun.whatsapp,
        csb_akun.is_asrama,
        master_school_level.level_name,
        master_periode.periode,
        master_periode.tahap_daftar,
        master_jalur.jalur_name,
        master_school_level.level_name,       
        csb_akun.status_lulus,
        csb_akun.status_daftar_ulang
        ')
        ->join('master_periode','csb_akun.master_periode_id=master_periode.id')
        ->join('master_jalur','csb_akun.master_jalur_id=master_jalur.id')
        ->join('master_school_level','csb_akun.master_school_level_id=master_school_level.id')
        ->get()->getResultArray();
       
    }
    
// Dapatkan Akun CSB untuk login 
    public function GetAccount($nisn)
    {
       return $this->db->table('csb_akun')
       ->select('id,password,is_active')
       ->where('noreg', $nisn)->orWhere('nisn', $nisn)
       ->get()->getRow();
    }

    // Status CSB 
    public function StatusCSB($id)
    {
       return $this->db->table('csb_akun')
       ->select('
       csb_akun.id,
       csb_akun.status_lulus,
       csb_akun.status_daftar_ulang,
       csb_akun.master_jalur_id
       ')
       ->where('csb_akun.id', $id)
       ->get()->getRow();
    }
    // Detail Akun 
    public function AccountDetail($id)
    {
       return $this->db->table('csb_akun')
       ->select('
       csb_akun.id,
       csb_akun.noreg,
       csb_akun.txt_password,
       csb_akun.nisn,
       csb_akun.nama_lengkap,
       csb_akun.tempat_lahir,
       csb_akun.tanggal_lahir,
       csb_akun.gender,
       csb_akun.whatsapp,
       master_periode.periode,
       master_periode.tahap_daftar,
       master_jalur.jalur_name,
       master_jalur.nilai_minimal,
       master_school_level.level_name,
       csb_akun.master_periode_id,
       csb_akun.master_jalur_id,
       csb_akun.master_school_level_id,
       csb_akun.master_jenis_sekolah_asal_id,
       csb_akun.is_asrama,
       csb_akun.foto,
       csb_akun.status_lulus,
       csb_akun.status_daftar_ulang,
       csb_akun.created_at')
       ->join('master_periode','csb_akun.master_periode_id=master_periode.id')
       ->join('master_jalur','csb_akun.master_jalur_id=master_jalur.id')
       ->join('master_school_level','csb_akun.master_school_level_id=master_school_level.id')
       ->where('csb_akun.id', $id)
       ->get()->getRow();
    }


    // Syarat Jalur 
    public function SyaratJalur($jalur_id)
    {
        $data = $this->db->table('master_jalur_syarat')
        ->where('master_jalur_id', $jalur_id)->get()->getResultArray();
        if (!$data) {
            return 0;
        }
        return $data;
    }
    public function GetJalur($jalur_id)
    {
        $data = $this->db->table('master_jalur')
        ->where('id', $jalur_id)->get()->getRow();
        if (!$data) {
            return 0;
        }
        return $data;
    }

    public function GetSTTBSchool($school_id)
    {
        return $this->db->table('master_jenis_sekolah_asal')
        ->where('master_school_level_id', $school_id)->get()->getResultArray();
      
    }


    // Daftar Peserta Ujian 
    // Peserta Ujian yang telah membayar pendaftaran
    public function PesertaDaftarUlang($periode)
    {
        if ($periode !=='all') {
            return $this->db->table('csb_akun')
            ->select('
            csb_akun.id,
            csb_akun.noreg,
            csb_akun.nisn,
            csb_akun.nama_lengkap,
            csb_akun.gender,
            csb_akun.whatsapp,
            csb_akun.is_asrama,
            master_school_level.level_name,
            master_periode.periode,
            master_periode.tahap_daftar,
            master_jalur.jalur_name,
            master_school_level.level_name,       
            csb_akun.status_lulus,
            csb_akun.status_daftar_ulang
            ')
            ->join('master_periode','csb_akun.master_periode_id=master_periode.id')
            ->join('master_jalur','csb_akun.master_jalur_id=master_jalur.id')
            ->join('master_school_level','csb_akun.master_school_level_id=master_school_level.id')
            ->where('csb_akun.status_lulus', 'L')
            ->where('csb_akun.master_periode_id', $periode)
            ->get()->getResultArray();
        }
    }

    // Pendaftar By Tanggal 
public function RegByDate($date)
{
    return $this->db->table('csb_akun')
    ->select('
    csb_akun.id,
    csb_akun.noreg,
    csb_akun.nama_lengkap,
    csb_akun.gender,
    ')
    ->where('DATE(csb_akun.created_at)', $date)
    ->get()->getResultArray();
}
// Pebdaftar by Kabupaten 
public function RegByKab($kab_id = null)
{
    if ($kab_id) {
        return $this->db->table('csb_akun')
        ->select('csb_akun.id,
        csb_akun.noreg,
        csb_akun.nama_lengkap,
        csb_akun.gender,
        status_lulus,
status_daftar_ulang
        ')
        ->where('kabupaten_id', $kab_id)
        ->get()->getResultArray();
    }
    // return $this->groupBy('kabupaten_id')->findAll();
    return $this->db->table('csb_akun')
    ->select('kabupaten_id')
    ->groupBy('kabupaten_id')
    ->get()->getResultArray();
}


 
}