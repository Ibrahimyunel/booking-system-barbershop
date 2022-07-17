<?php
$errors = array();

if(empty($Nama) && isset($Nama)){
    $errors['undefined-nama'] = "Anda belum isi Nama!!";
}

if(empty($NoWA) && isset($NoWA)){
    $errors['undefined-nowa'] = "Anda belum isi No Whatsapp!!";
}

if(empty($Alamat) && isset($Alamat)){
    $errors['undefined-alamat'] = "Anda belum isi Alamat!!";
}

if(empty($Email) && isset($Email)){
    $errors['undefined-email'] = "Anda belum isi Email!!";
} elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL) && isset($Email)) {
    $errors['wrong-email'] = "Email anda tidak sesuai!!";
}

if(empty($Password) && isset($Password)){
    $errors['undefined-password'] = "Anda belum isi Password!!";
} elseif ($Password !== $CPassword && isset($CPassword)) {
    $errors['wrong-Password'] = "Pengulangan Password tidak cocok!!";
}

// booking errors
if(isset($Id_petugas) && $Id_petugas == "Pilih Petugas"){
    $errors['wrong-Petugas'] = "Anda belum pilih Petugas!!";
}

if(isset($Tanggal) && empty($Tanggal)){
    $errors['wrong-Tanggal'] = "Anda belum pilih Tanggal!!";
}

if(isset($Jam) && $Jam == "Pilih Jam Yang Tersedia"){
    $errors['wrong-Jam'] = "Anda belum pilih Jam!!";
}
?>