<?php
include "conn.php";
error_reporting(0);
session_start();

if (!isset($_SESSION['Nama'])) {
    header("location: index.html");
}

$maxDate  = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+14, date("Y")));

if (isset($_POST['submit-booking'])) {
    $Tanggal = $_POST['Tanggal'];
    $Jam = $_POST['Jam'];
    $Id_petugas = $_POST['Petugas'];

    include_once "errorsController.php";

    if (count($errors) === 0) {
        $Id = $_SESSION['Id'];
        if (isset($Id)) {
            $query = "INSERT INTO Data_Booking(Id_user, Tgl_service, Jam, Id_petugas) VALUES ('$Id', '$Tanggal', '$Jam', '$Id_petugas')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                include("sweetalert.php");
                echo "<script> forBooking(); </script>";
            } else {
                $errors['cannot-access'] = "Maaf Booking gagal, " . $conn->connect_error;
            }
        } else {
            $errors['undefined-id'] = "Maaf Booking gagal, silahkan login ulang!!";
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
        <p class="textt"></p>
        <a href="home.php"><img class="logo" src="css/images/logo.png" alt="logo"></a>

        <div class="form-pendaftaran">
            <form method="post">
                <p class="login-pendaftaran mb-4 mt-2">Jadwal Booking</p>

                <?php if (count($errors) > 0) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <li style="list-style-type: 'X: ';"><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 4</div>
                        <img src="css/images/petugas1.jpg" style="width:100%">
                        <div class="text">Ibrahim</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 4</div>
                        <img src="css/images/petugas2.jpg" style="width:100%">
                        <div class="text">Pandu utomo</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 4</div>
                        <img src="css/images/petugas3.jpg" style="width:100%">
                        <div class="text">Hafiz taufikul</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">4 / 4</div>
                        <img src="css/images/petugas4.jpg" style="width:100%">
                        <div class="text">John</div>
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

                </div>
                <br>

                <div style="text-align:center; margin-top:-1em; margin-bottom:1em">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    <span class="dot" onclick="currentSlide(4)"></span>
                </div>

                <div class="mb-4">
                    <select class="form-select" id="petugas" name="Petugas" onchange="choosePetugas(this.value)">
                        <option>Pilih Petugas</option>
                        <?php
                        include "conn.php";
                        $queryy = "SELECT * FROM Petugas";
                        $resultt = mysqli_query($conn, $queryy);
                        while ($rec = mysqli_fetch_assoc($resultt)) {
                            echo "<option value='$rec[Id_petugas]'>$rec[Nama_petugas] - Kursi No $rec[No_kursi]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-4">
                    <input type="date" class="form-control" id="date" name="Tanggal" placeholder="Tanggal" 
                    min="<?php echo date("Y-m-d"); ?>"
                    max="<?php echo $maxDate; ?>"
                    onchange="showJam(this.value)">
                </div>

                <div class="mb-4">
                    <select class="form-select" name="Jam" id="option-jam">
                        <option selected>Pilih Jam Yang Tersedia</option>
                    </select>
                    <div style="text-align: left; opacity: 80%;"> > pilih jam setelah pilih petugas dan tanggal!!</div>
                </div>

                <div class="form-check checkpembayaran mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                    <label class="form-check-label" for="flexCheckDefault">
                        Sudah melakukan pembayaran
                    </label>
                </div>


                <button type="submit" class="btn btn-primary btn-submit mb-3" name="submit-booking">Booking</button>
            </form>
        </div>
    </div>

    <script src="./js/jam.js"></script>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);


        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
</body>
</html>