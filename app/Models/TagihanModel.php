<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanModel extends Model
{
    protected $table            = 'csb_tagihan_pembayaran';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function GetBiaya(string $is_gender=null, string $is_asrama=null,$jenis_biaya)
    {
        return $this->db->table('master_biaya')
        ->where('is_gender', $is_gender)
        ->where('is_asrama', $is_asrama)
        ->where('jenis_biaya', $jenis_biaya)
        ->get()->getRow();
    }

    public function GetTagihan($csb_akun_id, $master_biaya_id)
    {
        return $this->db->table('csb_tagihan_pembayaran')
        ->where('csb_akun_id', $csb_akun_id)
        ->where('master_biaya_id', $master_biaya_id)
        ->get()->getRow();
    }

    // public function StatusTagihan($csb_akun_id,$jenis_biaya)
    // {

    //     return $this->db->table('csb_tagihan_pembayaran')
    //     ->select('
    //     master_biaya.nama_biaya,
    //     master_biaya.jumlah,
    //     csb_tagihan_pembayaran.tanggal_invoice,
    //     csb_tagihan_pembayaran.nomor_bayar,
    //     csb_tagihan_pembayaran.nominal_tagihan,
    //     csb_tagihan_pembayaran.channel_pembayaran,
    //     csb_tagihan_pembayaran.status_pembayaran
    //     ')
    //     ->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')
    //     ->where('csb_tagihan_pembayaran.csb_akun_id', $csb_akun_id)
    //     ->where('master_biaya.jenis_biaya', $jenis_biaya)
    //     ->get()->getRow();
       
    // }
public function TagihanBy()
{

    return $this->db->table('csb_tagihan_bukti_bayar')
    ->select('
    csb_akun.noreg,
    csb_akun.nama_lengkap,
    master_biaya.nama_biaya,
    master_biaya.jenis_biaya,
    csb_tagihan_pembayaran.id,
    csb_tagihan_pembayaran.csb_akun_id,
    csb_tagihan_pembayaran.tanggal_invoice,
    csb_tagihan_pembayaran.nomor_bayar,
    csb_tagihan_pembayaran.nominal_tagihan,
    csb_tagihan_pembayaran.channel_pembayaran,
    csb_tagihan_pembayaran.status_pembayaran,
    csb_tagihan_pembayaran.payment_method,
    csb_tagihan_bukti_bayar.jumlah_transfer
    ')
    ->join('csb_tagihan_pembayaran','csb_tagihan_bukti_bayar.tagihan_id=csb_tagihan_pembayaran.id')
    ->join('csb_akun','csb_tagihan_pembayaran.csb_akun_id=csb_akun.id')
    ->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')
    ->where('csb_tagihan_bukti_bayar.status_bukti',NULL)
    ->get()->getResultArray();


}


// All Tagihan Siswa 
public function AllTagihan($csb_akun_id)
{
    return $this->db->table('csb_tagihan_pembayaran')
    ->select('
    csb_tagihan_pembayaran.id,
    master_biaya.nama_biaya,
    master_biaya.jenis_biaya,
        master_biaya.jumlah,
        csb_tagihan_pembayaran.tanggal_invoice,
        csb_tagihan_pembayaran.nomor_bayar,
        csb_tagihan_pembayaran.nominal_tagihan,
        csb_tagihan_pembayaran.channel_pembayaran,
        csb_tagihan_pembayaran.status_pembayaran,
        csb_tagihan_pembayaran.payment_method,
    ')
    ->join('csb_akun','csb_tagihan_pembayaran.csb_akun_id=csb_akun.id')
    ->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')
    ->where('csb_tagihan_pembayaran.csb_akun_id', $csb_akun_id)
    ->get()->getResultArray();
}


    public function TagihanAwal($csb_akun_id)
    {
        return $this->db->table('csb_tagihan_pembayaran')
        ->select('
        csb_tagihan_pembayaran.id,
        csb_akun.nama_lengkap,
        csb_akun.nisn,
        csb_akun.status_lulus,
        csb_akun.status_daftar_ulang,
        master_biaya.nama_biaya,
            master_biaya.jumlah,
            csb_tagihan_pembayaran.id as tagihan_id,
            csb_tagihan_pembayaran.tanggal_invoice,
            csb_tagihan_pembayaran.nomor_bayar,
            csb_tagihan_pembayaran.nominal_tagihan,
            csb_tagihan_pembayaran.channel_pembayaran,
            csb_tagihan_pembayaran.status_pembayaran,
            csb_tagihan_pembayaran.payment_method
        ')
        ->join('csb_akun','csb_tagihan_pembayaran.csb_akun_id=csb_akun.id')
        ->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')
        ->where('master_biaya.jenis_biaya', 'daftar')
        ->where('csb_tagihan_pembayaran.csb_akun_id', $csb_akun_id)
        ->get()->getRow();
    }
    
    public function TagihanDaftarUlang($csb_akun_id)
    {
        return $this->db->table('csb_tagihan_pembayaran')
        ->select('
            csb_akun.id,
            csb_akun.nama_lengkap,
            csb_akun.status_lulus,
            csb_akun.status_daftar_ulang,
            master_biaya.nama_biaya,
            master_biaya.jumlah,
            csb_tagihan_pembayaran.id as tagihan_id,
            csb_tagihan_pembayaran.tanggal_invoice,
            csb_tagihan_pembayaran.nomor_bayar,
            csb_tagihan_pembayaran.nominal_tagihan,
            csb_tagihan_pembayaran.channel_pembayaran,
            csb_tagihan_pembayaran.status_pembayaran,
            csb_tagihan_pembayaran.payment_method
        ')
        ->join('csb_akun','csb_tagihan_pembayaran.csb_akun_id=csb_akun.id')
        ->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')
        ->where('master_biaya.jenis_biaya', 'daftar-ulang')
        ->where('csb_tagihan_pembayaran.csb_akun_id', $csb_akun_id)
        ->get()->getRow();
    }


    public function PaymentList()
{

    return $this->db->table('csb_tagihan_pembayaran')
    ->select('
    csb_akun.id,
    csb_akun.noreg,
    csb_akun.nama_lengkap,
    csb_tagihan_pembayaran.id as tagihan_id,
    master_biaya.nama_biaya,
    master_biaya.jenis_biaya,
        master_biaya.jumlah,
        csb_tagihan_pembayaran.tanggal_invoice,
        csb_tagihan_pembayaran.nomor_bayar,
        csb_tagihan_pembayaran.nominal_tagihan,
        csb_tagihan_pembayaran.channel_pembayaran,
        csb_tagihan_pembayaran.payment_method,
    ')
    ->join('csb_akun','csb_tagihan_pembayaran.csb_akun_id=csb_akun.id')
    ->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')
    ->where('csb_tagihan_pembayaran.status_pembayaran','SUKSES' )
    ->get()->getResultArray();


}

   

}