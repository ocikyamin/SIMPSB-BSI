<?php

namespace App\Controllers\Uploads;

use App\Controllers\BaseController;
use App\Models\StudentAccount;

class Foto extends BaseController
{
    public function index()
    {
        //
    }
     // FormUploadFoto 
     public function FormUploadFoto()
     {
         if ($this->request->isAJAX()) {
             $akunM = new StudentAccount();
             $id = $this->request->getVar('id');
             $data =['old'=> $akunM->select('id,foto')->where('id',$id)->get()->getRow()];
             $response = ['form_foto'=> view('Upload/student_foto', $data)];
 
             echo json_encode($response);
         }
     }
     public function UploadFoto()
     {
         if ($this->request->isAJAX()) {
             $validationRules = [
                 'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,jpg,jpeg,png]',
             ];
     
             if ($this->validate($validationRules)) {
                 $file = $this->request->getFile('image');
                 $fileName = $file->getRandomName();
                 $file->move(ROOTPATH . 'files/_foto/', $fileName);
 
                 $oldImageName = $this->request->getPost('old_image_name'); // Nama gambar lama dari formulir
 
                 // Periksa apakah gambar lama bukan default.png sebelum menghapusnya
                 if ($oldImageName && $oldImageName != 'no_image.png') {
                     unlink(ROOTPATH . 'files/_foto/' . $oldImageName); // Hapus gambar lama
                 }
                 
                 // Simpan informasi file di database
                 // Misalnya, Anda dapat menggunakan model untuk ini
 
                 $data = [
                     'id'=> $this->request->getPost('id'),
                     'foto'=> $fileName
                 ];
                 $akunM = new StudentAccount();
                 $akunM->save($data);
     
                 return $this->response->setJSON(['success' => 'File uploaded successfully']);
             } else {
                 return $this->response->setJSON(['error' => $this->validator->getErrors()]);
             }
         }
     }
}