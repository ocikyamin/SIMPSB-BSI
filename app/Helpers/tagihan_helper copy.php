<?php

function CreateTagihan($csb_akun_id,$jenis_biaya,$is_gender=null, $is_asrama=null)
{
    $tagihanModel = new \App\Models\TagihanModel();
    if ($csb_akun_id==null) {
        return 0;
    }
    // Ambil data dari tabel master biaya
  $master_biaya = $tagihanModel->GetBiaya($is_gender, $is_asrama,$jenis_biaya);
   $get_tagihan = $tagihanModel->GetTagihan($csb_akun_id, $master_biaya->id);
   $data = [
    'id'=> $get_tagihan==null ? 0 : $get_tagihan->id,
    'csb_akun_id'=> $csb_akun_id,
    'master_biaya_id'=> $master_biaya->id
   ];

   $tagihanModel->save($data);
}