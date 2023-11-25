<?php
function connCSB()
{
	return $db= \Config\Database::connect(); 
}
// CSB Login / Detail Akun
function CSB()
{
   $is_login = session('STUDENT');
   return connCSB()->table('csb_akun')
      ->select('
      csb_akun.id,
      csb_akun.noreg,
      csb_akun.nisn,
      csb_akun.nama_lengkap,
      csb_akun.gender,
      csb_akun.whatsapp,
      master_periode.periode,
      master_periode.tahap_daftar,
      master_jalur.jalur_name,
      master_school_level.level_name,
      csb_akun.master_periode_id,
      csb_akun.master_jalur_id,
      csb_akun.master_school_level_id,
      csb_akun.master_jenis_sekolah_asal_id,
      csb_akun.is_asrama,
      csb_akun.foto,
      csb_akun.created_at')
      ->join('master_periode','csb_akun.master_periode_id=master_periode.id')
      ->join('master_jalur','csb_akun.master_jalur_id=master_jalur.id')
      ->join('master_school_level','csb_akun.master_school_level_id=master_school_level.id')
      ->where('csb_akun.id', $is_login)
      ->get()->getRow();
}



// Buat Nomor Pendaftaran 
   function nomorRegister()
   {
          // Ambil tahun saat ini
       $currentYear = date('Y');
       // Buat format nomor otomatis
       $format = 'CSB-' . $currentYear . '-%03d';
       // Ambil data terakhir dari tabel untuk tahun ini
       $lastData = connCSB()->table('csb_akun')->select('noreg')->like('noreg', 'CSB-' . $currentYear)->orderBy('noreg', 'DESC')->get()->getRowArray();
       // Jika tidak ada data sebelumnya, beri nomor awal
       if (!$lastData) {
           return sprintf($format, 1);
       }
       // Ambil nomor terakhir dan tambahkan 1
       $lastNumber = (int)substr($lastData['noreg'], strlen('CSB-' . $currentYear) + 1);
       $newNumber = $lastNumber + 1;
       // Format nomor otomatis dengan 3 digit angka
       return sprintf($format, $newNumber);
   }
// Buat Tagihan 
// function CreateTagihan($csb_akun_id,$jenis_biaya,$is_gender=null, $is_asrama=null)
// {
// $tagihanModel = new \App\Models\TagihanModel();
// if ($csb_akun_id==null) {
// return 0;
// }
// // Ambil data dari tabel master biaya
// $master_biaya = $tagihanModel->GetBiaya($is_gender, $is_asrama,$jenis_biaya);
// $get_tagihan = $tagihanModel->GetTagihan($csb_akun_id, $master_biaya->id);
// $data = [
// 'id'=> $get_tagihan==null ? 0 : $get_tagihan->id,
// 'csb_akun_id'=> $csb_akun_id,
// 'master_biaya_id'=> $master_biaya->id,
// 'tanggal_invoice'=> date('Y-m-d')
// ];

// $tagihanModel->save($data);
// }