<?php 

$mahasiswa = [
    [
        "nama" => "Fani Deswi Sapitri Tambunan",
        "nim" => "2217020011",
        "email" => "fanitambunan03@gmail.com"
    ],
      [
        "nama" => "Arfansyah",
        "nim" => "2217020012",
        "email" => "Arfansyah@gmail.com"
    ],
];

$data = json_encode($mahasiswa);
echo $data;

?>