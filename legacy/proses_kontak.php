<?php
require 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = strip_tags($_POST['nama']);
    $email = strip_tags($_POST['email']);
    $subjek = strip_tags($_POST['subjek']);
    $pesan = strip_tags($_POST['pesan']);

    $sql = "INSERT INTO pesan_kontak (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)";
    $row = $config->prepare($sql);
    
    if($row->execute(array($nama, $email, $subjek, $pesan))){
        echo "success";
    } else {
        echo "error";
    }
}
?>