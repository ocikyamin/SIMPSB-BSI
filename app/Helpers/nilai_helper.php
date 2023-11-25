<?php

function NilaiConn()
{
	return $db= \Config\Database::connect(); 
}
function GetNilai($csb_akun_id=null, $mapel_jenis_id=null, $m_kelas_id=null)
{
   if ($csb_akun_id==null || $mapel_jenis_id==null || $m_kelas_id==null) {
    return null;
   }

   $data = NilaiConn()
   ->table('csb_nilai_rapor')
   ->select('id,nilai_sem1,nilai_sem2')
   ->where('csb_akun_id', $csb_akun_id)
   ->where('mapel_jenis_id', $mapel_jenis_id)
   ->where('m_kelas_id', $m_kelas_id)
   ->get()
   ->getRow();
   if ($data) {
    return $data;
   }else{
    return null;
   }

   
   
}


function RataRataSemester($csb_akun_id, $kelas_id)
{
$rataRataSemester = NilaiConn()->table('csb_nilai_rapor')->where('csb_akun_id', $csb_akun_id)
->where('m_kelas_id', $kelas_id)
->selectAvg('nilai_sem1', 'rata_rata_semester_1')
->selectAvg('nilai_sem2', 'rata_rata_semester_2')
->get()
->getRow();
return $rataRataSemester;
}

function CekNilai($csb_akun_id = null, $level_id = null)
{
   // Tampilkan daftar Kelas by level 
   $kelas = NilaiConn()->table('m_kelas')->select('id,kelas')->where('master_school_level_id', $level_id)->get()->getResultArray();

   $semua_sudah_diisi = true; // Inisialisasi dengan true

   foreach ($kelas as $k) {
      // Dapatkan Nilai by akun_id dan kelas_id 
      $nilai = NilaiConn()->table('csb_nilai_rapor')
      ->select('m_kelas_id')
      ->where('csb_akun_id', $csb_akun_id)
      ->where('m_kelas_id', $k['id'])
      ->get()->getRow();

      if (!$nilai) {
         // Jika ada yang belum diisi, set semua_sudah_diisi menjadi false
         $semua_sudah_diisi = NULL;
      }
   }

   return $semua_sudah_diisi;
}