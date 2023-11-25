<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSiswaModel extends Model
{
    protected $table            = 'csb_data_siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];


    // Validation
    protected $validationRules      = [
        'id'=> 'max_length[19]',
        'csb_akun_id' => 'required',
        'nik' => 'required|is_unique[csb_data_siswa.nik,id,{id}]',
        'nokk' => 'required',
        'jumlah_saudara' => 'required',
        'anak_ke' => 'required',
        'hobi' => 'required',
        'cita_cita' => 'required',
        'alamat_email' => 'required',
        'yang_membiayai_sekolah' => 'required',
        'kebutuhan_disabilitas' => 'required',
        'kebutuhan_khusus' => 'required',

        'ayah_nik' => 'required',
        'ayah_nama_lengkap' => 'required',
        'ayah_tempat_lahir' => 'required',
        'ayah_tanggal_lahir' => 'required',
        'ayah_pendidikan_terakhir' => 'required',
        'ayah_pekerjaan_utama' => 'required',
        'ayah_penghasilan_rata_perbulan' => 'required',
        
        'ibu_nik' => 'required',
        'ibu_nama_lengkap' => 'required',
        'ibu_tempat_lahir' => 'required',
        'ibu_tanggal_lahir' => 'required',
        'ibu_pendidikan_terakhir' => 'required',
        'ibu_pekerjaan_utama' => 'required',
        'ibu_penghasilan_rata_perbulan' => 'required',
        'orang_tua_alamat' => 'required',
        
        'sekolah_npsn' => 'required',
        'sekolah_nama' => 'required',
        'sekolah_status' => 'required',
        'sekolah_alamat' => 'required',
        

    ];
    protected $validationMessages   = [];

    public function GetDasis($id)
    {
        $data = $this->db->table('csb_data_siswa')->where('csb_akun_id', $id)->get()->getRow();
        if (!$data) {
            // $data = (object)[];
            return $data = (object)[
                'id'=> null,
                'csb_akun_id'=> null,
                'nik'=> null,
                'nokk'=> null,
                'jumlah_saudara'=> null,
                'anak_ke'=> null,
                'hobi'=> null,
                'cita_cita'=> null,
                'alamat_email'=> null,
                'yang_membiayai_sekolah'=> null,
                'kebutuhan_disabilitas'=> null,
                'kebutuhan_khusus'=> null,
                'ayah_nik'=> null,
                'ayah_nama_lengkap'=> null,
                'ayah_tempat_lahir'=> null,
                'ayah_tanggal_lahir'=> null,
                'ayah_status'=> null,
                'ayah_pendidikan_terakhir'=> null,
                'ayah_pekerjaan_utama'=> null,
                'ayah_no_handphone'=> null,
                'ayah_penghasilan_rata_perbulan'=> null,

                'ibu_nik'=> null,
                'ibu_nama_lengkap'=> null,
                'ibu_tempat_lahir'=> null,
                'ibu_tanggal_lahir'=> null,
                'ibu_status'=> null,
                'ibu_pendidikan_terakhir'=> null,
                'ibu_pekerjaan_utama'=>null,
                'ibu_no_handphone'=> null,
                'ibu_penghasilan_rata_perbulan'=> null,
                'orang_tua_alamat'=>null,
                
                'sekolah_npsn'=> null,
                'sekolah_nama'=> null,
                'sekolah_status'=> null,
                'sekolah_alamat'=> null
          
             ];
        }

        return $data;
        
    }

    public function JadwalDaftarUlang($periode, $jalur)
    {
        return $this->db->table('master_jadwal_daftar_ulang')
        ->where('master_periode_id', $periode)
        ->where('master_jalur_id', $jalur)
        ->get()
        ->getRow();
    }

}