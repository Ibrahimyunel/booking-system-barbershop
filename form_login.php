<?php
include "conn.php";

error_reporting(0);
session_start();

if (isset($_SESSION['Nama'])) {
    header("location: home.php");
}

if (isset($_POST['submit'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    include_once "errorsController.php";

    if (count($errors) === 0) {
        $query = "SELECT * FROM Biodata_Pengguna WHERE Email = '$Email' AND password = '$Password'";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['Nama'] = $row['Nama'];
            $_SESSION['Id'] = $row['Id'];
            header("location: home.php");
        } else {
            $errors['wrong-input'] = "Email atau Password anda salah!!";
        }
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('PHPMailer-master/src/Exception.php');
include('PHPMailer-master/src/PHPMailer.php');
include('PHPMailer-master/src/SMTP.php');

if(isset($_POST['submit-request'])){
    $Email = $_POST['Email'];

    $sql = "SELECT * FROM Biodata_Pengguna WHERE Email = '$Email'";
    $resultsql = mysqli_query($conn, $sql);

    if($resultsql->num_rows > 0){
        $row = mysqli_fetch_assoc($resultsql);
        $Password = $row['Password'];
        $email_pengirim = 'ibrahim.cbshp@gmail.com';
        $nama_pengirim = 'Keluarga Cokro Barbershop';
        $email_penerima = $Email;
        $subjek = 'Request Password';
        $pesan = 'Password anda adalah '.$Password.' Silahkan login menggunakan password tersebut.';
        
        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->Username = $email_pengirim;
        $mail->Password = 'spwfswkfllchrdic';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        // $mail->SMTPDebug = 2;

        $mail->setFrom($email_pengirim, $nama_pengirim);
        $mail->addAddress($email_penerima);
        $mail->isHTML(true);
        $mail->Subject = $subjek;
        $mail->Body = $pesan;
    
        $send = $mail->send();

        include("sweetalert.php");
        echo "<script> forRequest(); </script>";

    } else {
        if(empty($Email)){
            $errors['undefined-Request'] = "Silahkan masukan Email anda!!";
        }
        else{
            $errors['undefined-Request'] = "Email belum terdaftar, silahkan daftar akun baru!!";
        }
    }
}
mysqli_close($conn);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cokro Barbershop</title>
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Lobster&family=Shizuru&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <div class="container">
        <a href="index.html"><img class="logo" src="css/images/logo.png" alt="logo"></a>

        <div class="form-pendaftaran">
            <form method="post">
                <p class="login-pendaftaran mb-4 mt-2">Login</p>

                <?php if (count($errors) > 0) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <li style="list-style-type: 'X: ';"><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="mb-4">
                    <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="Password" placeholder="Password">
                </div>

                <!-- <p><a href="forgot_password.php">Lupa Password?</a></p> -->

                <button type="submit" class="btn btn-primary btn-submit mb-3" name="submit">Login</button>
                <button type="submit" class="submit-request mb-3" name="submit-request">Lupa Password?</button>
                
                <p>Belum punya akun? <a href="form_pendaftaran.php">Daftar Disini.</a></p>
            </form>
        </div>
    </div>
</body>

</html>