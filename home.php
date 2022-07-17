<?php

session_start();
if (!isset($_SESSION['Nama'])) {
    header("location: form_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cokro Barbershop</title>
    <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Lobster&family=Shizuru&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="main-img"></div>
    <div class="wrapper">
        <header>
            <a href="home.php"><img class="logo" src="css/images/logo.png" alt="logo"></a>

            <nav>
                <svg class="close" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2V2ZM14.71 13.29C14.8037 13.383 14.8781 13.4936 14.9289 13.6154C14.9797 13.7373 15.0058 13.868 15.0058 14C15.0058 14.132 14.9797 14.2627 14.9289 14.3846C14.8781 14.5064 14.8037 14.617 14.71 14.71C14.617 14.8037 14.5064 14.8781 14.3846 14.9289C14.2627 14.9797 14.132 15.0058 14 15.0058C13.868 15.0058 13.7373 14.9797 13.6154 14.9289C13.4936 14.8781 13.383 14.8037 13.29 14.71L12 13.41L10.71 14.71C10.617 14.8037 10.5064 14.8781 10.3846 14.9289C10.2627 14.9797 10.132 15.0058 10 15.0058C9.86799 15.0058 9.73729 14.9797 9.61543 14.9289C9.49357 14.8781 9.38297 14.8037 9.29 14.71C9.19628 14.617 9.12188 14.5064 9.07111 14.3846C9.02034 14.2627 8.99421 14.132 8.99421 14C8.99421 13.868 9.02034 13.7373 9.07111 13.6154C9.12188 13.4936 9.19628 13.383 9.29 13.29L10.59 12L9.29 10.71C9.1017 10.5217 8.99591 10.2663 8.99591 10C8.99591 9.7337 9.1017 9.4783 9.29 9.29C9.47831 9.1017 9.7337 8.99591 10 8.99591C10.2663 8.99591 10.5217 9.1017 10.71 9.29L12 10.59L13.29 9.29C13.4783 9.1017 13.7337 8.99591 14 8.99591C14.2663 8.99591 14.5217 9.1017 14.71 9.29C14.8983 9.4783 15.0041 9.7337 15.0041 10C15.0041 10.2663 14.8983 10.5217 14.71 10.71L13.41 12L14.71 13.29Z" fill="black" />
                </svg>

                <ul>
                    <li><a href="#">Akun</a></li>
                    <li><a href="booking.php">Booking</a></li>
                    <li><svg class="down-arrow" viewBox="0 0 16 132" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.7071 0.292893C8.31658 -0.0976311 7.68341 -0.0976311 7.29289 0.292893L0.928927 6.65685C0.538402 7.04738 0.538402 7.68054 0.928927 8.07107C1.31945 8.46159 1.95262 8.46159 2.34314 8.07107L7.99999 2.41421L13.6568 8.07107C14.0474 8.46159 14.6805 8.46159 15.0711 8.07107C15.4616 7.68054 15.4616 7.04738 15.0711 6.65685L8.7071 0.292893ZM9 132L8.99999 1L6.99999 1L7 132L9 132Z" fill="black" />
                    </svg></li>
                    <li><a class="logout" href="logout.php">< Logout</a></li>
                </ul>

            </nav>

            <svg class="menu" viewBox="0 0 48 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24 32H0V26.6667H24V32ZM48 18.6667H0V13.3333H48V18.6667ZM48 5.33333H24V0H48V5.33333Z" fill="white" />
            </svg>

            <svg class="down-arrow" viewBox="0 0 16 132" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.7071 0.292893C8.31658 -0.0976311 7.68341 -0.0976311 7.29289 0.292893L0.928927 6.65685C0.538402 7.04738 0.538402 7.68054 0.928927 8.07107C1.31945 8.46159 1.95262 8.46159 2.34314 8.07107L7.99999 2.41421L13.6568 8.07107C14.0474 8.46159 14.6805 8.46159 15.0711 8.07107C15.4616 7.68054 15.4616 7.04738 15.0711 6.65685L8.7071 0.292893ZM9 132L8.99999 1L6.99999 1L7 132L9 132Z" fill="black" />
            </svg>
        </header>

        <section class="main-txt">
            <?php echo "<h1>Hai " . $_SESSION['Nama'] . " Siap-siap Buat Tampilan Rambutmu Semakin Rapih dan Stylish.</h1>"; ?>
            <p class="sub-txt">> <?php echo $_SESSION['Nama']; ?> sekarang kamu bisa booking sesuai jadwal yang kamu inginkan loh..</p>
        </section>

        <section class="more-info">
            <div class="benefit-info">
                <div class="benefit-content">
                    <p class="tittle">Harga Terjangkau</p>
                    <p class="desc">Hanya dengan 25K kamu sudah dapat All in One Service (Cukur - Pijat - keramas).</p>
                    <img src="css/images/iconmoney.png" alt="moneyicon" width="100em">
                </div>
                <div class="benefit-content">
                    <p class="tittle">Barber Professional</p>
                    <p class="desc">Tim Barber yang sudah berpengalaman bisa menyesuaikan dengan bentuk personality
                        kamu.</p>
                    <img src="css/images/iconbarber.jpg" alt="barbericon" width="110em">
                </div>
            </div>
            <div class="row">
                <div class="feature">
                    <div class="content">
                        <p class="tittle">Tepat</p>
                        <p class="desc">Potong rambut sesuai persona yang kamu inginkan.</p>
                    </div>
                    <img src="css/images/cokro2.jpg" alt="shoe1">
                </div>
                <div class="feature left">
                    <div class="content">
                        <p class="tittle">Detail</p>
                        <p class="desc">Libat habis bulu-bulu halus yang ada di sekitar rambut.</p>
                    </div>
                    <img src="css/images/cokro3.jpg" alt="shoe2">
                </div>
                <div class="feature">
                    <div class="content">
                        <p class="tittle">Konsisten</p>
                        <p class="desc">Barber professional siap membuat rambut kamu makin rapi.</p>
                    </div>
                    <img src="css/images/cokro4.jpg" alt="shoe3">
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer-desc">
            <p>Cokro Barbershop ©2022 <br>
                Your Legend Barbershop</p>
        </div>
    </footer>

    <script>
        const menu = document.querySelector('.menu')
        const close = document.querySelector('.close')
        const nav = document.querySelector('nav')

        menu.addEventListener('click', () => {
            nav.classList.add('open-nav')
        })

        close.addEventListener('click', () => {
            nav.classList.remove('open-nav')
        })
    </script>
</body>

</html>