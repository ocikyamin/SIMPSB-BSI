<?php

function KirimWA($target, $message)
{
// $curl = curl_init();
// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://api.fonnte.com/send',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_POSTFIELDS => array(
// 'target' => $target,
// 'message' => $message, 
// // 'url' => 'https://md.fonnte.com/images/wa-logo.png',
// 'countryCode' => '62', //optional
// ),
//   CURLOPT_HTTPHEADER => array(
//     'Authorization: SVo+wKPwRwkGqQY2pIpN' //change TOKEN to your actual token
//   ),
// ));

// $response = curl_exec($curl);
// curl_close($curl);
// return $response;
try {
  $client = \Config\Services::curlrequest();
  $url = 'https://api.fonnte.com/send';
  $data = [
      'target' => $target,
      'message' => $message,
      'countryCode' => '62' // Opsional
  ];

  $response = $client->request('POST', $url, [
      'headers' => [
          'Authorization' => 'SVo+wKPwRwkGqQY2pIpN' // Ganti dengan token sebenarnya Anda
      ],
      'form_params' => $data
  ]);

  return $response->getBody();
} catch (\Exception $e) {
  return 'Error: ' . $e->getMessage();
}
}


function GetWilayah($url)
{
    try {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', $url);

        return json_decode($response->getBody(), true);
    } catch (\Exception $e) {
        // Tangani pengecualian di sini
        return 'Error: ' . $e->getMessage();
    }
}

?>