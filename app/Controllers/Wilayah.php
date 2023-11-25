<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Wilayah extends BaseController
{
    public function index()
    {
        //
    }
    function GetPorovinsi()
    {
        if ($this->request->isAJAX() ) {
            $this->db= \Config\Database::connect();
            $keys = $this->request->getGet('search');
            $qryProvinsi = $this->db->table('wilayah_provinsi')->LIKE('nama', $keys)->get();
            if ($qryProvinsi->getNumRows() > 0) {
                $list =[];
                $key =0;

                foreach ($qryProvinsi->getResultArray() as $row) {
                    $list[$key]['id'] = $row['id'];
                    $list[$key]['text'] = $row['nama'];
                    $key ++;

                }
                echo json_encode($list);
            }


            
        }

        
    }


// data keabupaten 
function GetKabupaten()
    {
        if ($this->request->isAJAX() ) {
            $this->db= \Config\Database::connect();
            $keys = $this->request->getPost('provinsi');
            $qryKabupaten = $this->db->table('wilayah_kabupaten')->where('provinsi_id', $keys)->get();
            if ($qryKabupaten->getNumRows() > 0) {
                $option = "";

                foreach ($qryKabupaten->getResultArray() as $row) {

                   $option .= '<option value="'.$row['id'].'">'.$row['nama'].'</option>';

                }
                $msg = ['kab'=> $option];
                echo json_encode($msg);
            }
        }
    }

// data kecamatan 
    function GetKecamatan()
    {
        if ($this->request->isAJAX() ) {
       
            $this->db= \Config\Database::connect();
            $keys = $this->request->getPost('kabupaten');
            $qryKecamatan = $this->db->table('wilayah_kecamatan')->where('kabupaten_id',$keys)->get();
                $kec = "";
                foreach ($qryKecamatan->getResultArray() as $row) {
                   $kec .= '<option value="'.$row['id'].'">'.$row['nama'].'</option>';

                }

                $msg = ['kec'=> $kec];
                echo json_encode($msg);

            
        }
    }

    // data Desa 

    function GetDesa()
    {
        if ($this->request->isAJAX() ) {
       
            $this->db= \Config\Database::connect();
            $keys = $this->request->getPost('kecamatan');
            $qryDesa = $this->db->table('wilayah_desa')->where('kecamatan_id',$keys)->get();
                $desa = "";
                foreach ($qryDesa->getResultArray() as $row) {
                   $desa .= '<option value="'.$row['id'].'">'.$row['nama'].'</option>';

                }

                $msg = ['desa'=> $desa];
                echo json_encode($msg);

            
        }
    }
}