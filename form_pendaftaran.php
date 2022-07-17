<?php
include 'conn.php';

error_reporting(0);
session_start();

if (isset($_SESSION['Nama'])) {
    header("location: home.php");
}

if (isset($_POST['submit'])) {
    $Nama = $_POST['Nama'];
    $NoWA = $_POST['NoWA'];
    $Alamat = $_POST['Alamat'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $CPassword = $_POST['CPassword'];

    include "errorsController.php";
    if (count($errors) === 0) {
        $queryEmail = "SELECT * FROM Biodata_Pengguna WHERE Email = '$Email'";
        $resultEmail = mysqli_query($conn, $queryEmail);
        if (!$resultEmail->num_rows > 0) {
            $query = "INSERT INTO Biodata_Pengguna(Nama, NoWA, Alamat, Email, Password)
            VALUES ('$Nama', '$NoWA', '$Alamat', '$Email','$Password')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                include("sweetalert.php");
                echo "<script> forPendaftaran(); </script>";
            } else {
                $errors['cannot-access'] = "Maaf Booking gagal, ".$conn->connect_error;
            }
        } else {
            $errors['email-exist'] = "Email sudah terdaftar!!";
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
    <link href="css/form.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <a href="index.html"><img class="logo" src="css/images/logo.png" alt="logo"></a>

        <div class="form-pendaftaran">

            <form method="post">
                <div>
                    <p class="login-pendaftaran mb-4 mt-2">Pendaftaran</p>
                </div>

                <?php if (count($errors) > 0) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <li style="list-style-type: 'X: ';"><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="mb-4">
                    <input type="text" class="form-control" name="Nama" placeholder="Nama" value="<?php echo $Nama; ?>">
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="NoWA" placeholder="No Whatsapp" value="<?php echo $NoWA; ?>">
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="Alamat" placeholder="Alamat" value="<?php echo $Alamat; ?>">
                </div>
                <div class="mb-4">
                    <input type="text" class="form-control" name="Email" placeholder="Email" value="<?php echo $Email; ?>">
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control" name="Password" placeholder="Password">
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control" name="CPassword" placeholder="Ulangi Password" >
                </div>
                <button type="submit" class="btn btn-primary btn-submit mb-3" name="submit">Daftar</button>
                <p>Sudah punya akun? <a href="form_login.php">Login Disini.</a></p>
            </form>
        </div>
    </div>
</body>

</html>