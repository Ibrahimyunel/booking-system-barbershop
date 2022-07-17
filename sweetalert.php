<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cokro Barbershop</title>
</head>

<body>
    <script src="js/sweetalert.js"></script>
    <script>
        function forBooking() {
            swal({
                    title: "Booking berhasil!",
                    text: "Silahkan lihat detail booking pada menu Akun!",
                    icon: "success",
                    button: true,
                })
                .then((buttonClicked) => {
                    if (buttonClicked) {
                        window.location = "home.php";
                    } else {
                        window.location = "home.php";
                    }
                });
        }

        function forRequest() {
            swal({
                    title: "Request berhasil!",
                    text: "Silahkan cek email untuk melihat password anda!",
                    icon: "success",
                    button: true,
                });
        }

        function forPendaftaran() {
            swal({
                    title: "Pendaftaran berhasil!",
                    text: "Silahkan Login!",
                    icon: "success",
                    button: true,
                })
                .then((buttonClicked) => {
                    if (buttonClicked) {
                        window.location = "form_login.php";
                    } else {
                        window.location = "form_login.php";
                    }
                });
        }
    </script>
</body>

</html>