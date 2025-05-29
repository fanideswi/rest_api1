<?php 

// $mahasiswa = [
//     [
//         "nama" => "Fani Deswi Sapitri Tambunan",
//         "nim" => "2217020011",
//         "email" => "fanitambunan03@gmail.com"
//     ],
//     [
//         "nama" => "Arfansyah",
//         "nim" => "2217020012",
//         "email" => "Arfansyah@gmail.com"
//     ],
// ];

$dbh = new PDO('mysql:host=localhost;dbname=db_mahasiswa', 'root', 'root');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);



$data = json_encode($mahasiswa);
echo $data;

?>