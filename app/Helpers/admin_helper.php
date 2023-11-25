<?php

function adminConn()
{
	return $db= \Config\Database::connect(); 
}

// Admin Login Account
function IsLogin()
{
    $is_login = session('XX-ADMIN');
    return adminConn()->table('users')
    ->select('
    users.id,
    users.email,
    users.whatsapp,
    users.fullname,
    users_level.level_name,
    ')
    ->join('users_level','users.user_level_id=users_level.id')
    ->where('users.id', $is_login)
    ->get()
    ->getRow();
}
function StatusBayar($id)
{
    return adminConn()->table('csb_tagihan_pembayaran')
    ->select('
    master_biaya.jenis_biaya,
    csb_tagihan_pembayaran.nominal_tagihan,
    csb_tagihan_pembayaran.status_pembayaran,
    ')
    ->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')
    ->where('csb_tagihan_pembayaran.csb_akun_id', $id)
    ->get()
    ->getResultArray();
}
// Status Pembayaran Daftar Ulang 
function StatusBayarDu($id)
{
    return adminConn()->table('csb_tagihan_pembayaran')
    ->select('
    master_biaya.jenis_biaya,
    csb_tagihan_pembayaran.nominal_tagihan,
    csb_tagihan_pembayaran.status_pembayaran,
    ')
    ->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')
    ->where('master_biaya.jenis_biaya', 'daftar-ulang')
    ->where('csb_tagihan_pembayaran.csb_akun_id', $id)
    ->get()
    ->getRow();
}

function PesertaUjian($jalur)
{
    return adminConn()->table('csb_tagihan_pembayaran')
    ->select('
    csb_akun.id,
    csb_akun.noreg,
    csb_akun.nisn,
    csb_akun.nama_lengkap,
    csb_akun.gender,

    ')
    ->join('csb_akun','csb_tagihan_pembayaran.csb_akun_id=csb_akun.id')

    ->join('master_biaya','csb_tagihan_pembayaran.master_biaya_id=master_biaya.id')
    ->where('master_biaya.jenis_biaya', 'daftar')
    ->where('csb_tagihan_pembayaran.status_pembayaran', 'SUKSES')
    ->where('csb_akun.master_jalur_id', $jalur)
    ->get()
    ->getResultArray();
}

// JadwalUjian 
function GetJadwalUjian($periode, $jalur)
{
    $data = adminConn()->table('master_jadwal_ujian')
    ->select('id,tanggal_ujian,waktu_ujian,tempat_ujian')
    ->where('master_periode_id', $periode)
    ->where('master_jalur_id', $jalur)
    ->get()
    ->getRow();
    if (!$data) {
        return null;
    }
    return $data;
}
function GetJadwalDU($periode, $jalur)
{
    $data = adminConn()->table('master_jadwal_daftar_ulang')
    ->select('id,tanggal_mulai,tanggal_akhir')
    ->where('master_periode_id', $periode)
    ->where('master_jalur_id', $jalur)
    ->get()
    ->getRow();
    if (!$data) {
        return null;
    }
    return $data;
}