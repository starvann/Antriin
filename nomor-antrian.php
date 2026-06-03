<?php
include 'koneksi.php';

$queue_id = (int)($_GET['id'] ?? 0);

$query = mysqli_query($conn,"
SELECT
    q.queue_number,
    q.visitor_phone,
    s.name AS layanan
FROM queues q
JOIN services s
ON q.service_id = s.id
WHERE q.id = $queue_id
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data antrian tidak ditemukan");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Antriin Foodcourt</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Unica+One&display=swap" rel="stylesheet">

    <style>
        /* ================= GLOBAL ================= */

        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: #091F5B;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }


        /* ================= SIDEBAR ================= */

.sidebar {
    position: fixed;
    top: 0;
    left: 0;

    width: 280px;
    height: 100vh;

    background: #091F5B;
    color: white;
    padding: 20px;

    box-sizing: border-box;
}

.logo {
    width: 100%;
    max-width: 220px;
    display: block;
    margin: 0 auto 20px;
}
        /* menu sidebar */

        .menu {
            margin-top: 40px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 0;
            cursor: pointer;
            font-size: 16px;
            color: white;
            position: relative;
            justify-content: center;
        }

        .menu-item::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40%;
            height: 2px;
            background: #6F96D1;
            transition: 0.3s;
        }

        .menu-item:hover::after {
            width: 85%;
        }

        .icon-sidebar {
            width: 25px;
        }

        /* icon besar dekorasi bawah */

        .sidebar-decoration {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        a {
            text-decoration: none;
            color: white;
        }


        /* ================= MAIN CONTENT ================= */

.main-content {
        margin-left: 280px;

    flex: 1;
    background: white;
    border-radius: 40px 0 0 40px;

    background-image: url("assets/bg.png");
    background-size: cover;

    display: flex;
    flex-direction: column;
    align-items: center;

    padding: 30px;
    box-sizing: border-box;
}


        /* ================= HEADER ================= */

.header {
    margin-top: 10px;
    background: white;
    padding: 10px 40px;
    border-radius: 30px;
    text-align: center;
}

.header h1 {
    margin: 0;
    font-weight: 800;
    font-size: 36px;
}

.header h2 {
    margin: 0;
    font-size: 24px;
}


        /* ================= CARD ================= */

.card-container {
    position: relative;

    width: 800px;
    max-width: 90%;

    aspect-ratio: 800 / 661;

    background-image: url("assets/Kartu.png");
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;

    margin-top: 30px;
}

.nomor {
    position: absolute;

    top: 40%;
    left: 50%;

    transform: translate(-50%, -50%);

    font-size: 150px;
    font-weight: 800;
    color: #000;

    line-height: 1;
}

.info {
    position: absolute;

    left: 50%;
    bottom: 13%;

    transform: translateX(-50%);

    width: 65%;

    text-align: left;

    font-size: 20px;
    line-height: 1.4;

    color: #000;
}

.content-wrapper{
    flex:1;
    width:100%;

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;

    gap:25px;
}

        /* ================= BUTTON ================= */
.btn {
    background: #091F5B;
    color: white;

    padding: 14px 40px;

    border: none;
    border-radius: 12px;

    cursor: pointer;

    font-size: 16px;
    font-weight: 600;
}

        .btn:hover {
                        background: linear-gradient(90deg,
                    #020B25,
                    #0E308E,
                    #6F96D1);

            box-shadow: 0 6px 15px rgba(14, 48, 142, 0.4);

            transform: scale(1.03);
        }

        /* RESPONSIVEEEEEEEEE */
        /* TABLET */
@media (max-width: 1024px) {

    .card-container {
        width: 700px;
    }

    .nomor {
        font-size: 110px;
    }

    .info {
        font-size: 16px;
    }
}

/* HP */
@media (max-width:768px){

    .container{
        flex-direction:column;
    }

    .sidebar{
        width:100%;
        padding:15px;
        box-sizing:border-box;
    }

    .logo{
        width:150px;
        display:block;
        margin:0 auto 15px;
    }

    .sidebar-decoration{
        display:none;
    }

    .menu{
        display:flex;
        justify-content:center;
        gap:10px;
        flex-wrap:wrap;
        margin-top:10px;
    }

    .menu-item{
        padding:10px 15px;
        border-radius:10px;
        background:rgba(255,255,255,.1);
        font-size:14px;
    }

    .menu-item::after{
        display:none;
    }

    .main-content{
        border-radius:30px 30px 0 0;
        padding:20px;
    }

    .header h1{
        font-size:24px;
    }

    .header h2{
        font-size:16px;
    }
}
    </style>
</head>



<body>

    <div class="container">


        <!-- ================= SIDEBAR ================= -->

        <div class="sidebar">

            <img src="assets/logo.png" class="logo">
            <img src="assets/sidebar-decor.png" class="sidebar-decoration">
            <div class="menu">
                <div class="menu-item"> <img src="assets/vector/anmbil-antrian.png" alt="vector" class="icon-sidebar"> <a href="ambil-antian.php">Antrian</a> </div>
                <div class="menu-item"> <img src="assets/vector/kartu-antrian.png" alt="vector" class="icon-sidebar"><a href="kartu-antrian.php">Kartu Antrian</a></div>
                <div class="menu-item"> <img src="assets/vector/daftar-antrian.png" alt="vector" class="icon-sidebar"><a href="daftar-antrian.php">Daftar Antrian</a></div>
            </div>

        </div>



        <!-- ================= MAIN CONTENT ================= -->

        <div class="main-content">

            <!-- HEADER -->

            <div class="header">
                <h1>FOODCOURT</h1>
                <h2>BELITOPIA</h2>
            </div>


<!-- KARTU ANTRIAN -->
<div class="content-wrapper">
    <div class="card-container">

    <img src="assets/Kartu.png" class="card-img">

<div class="nomor">
    <?= str_pad($data['queue_number'], 2, "0", STR_PAD_LEFT); ?>
</div>

    <div class="info">
        <div>
            Nomor Telepon : <?= $data['visitor_phone']; ?> <br>
            Loket : <?= $data['layanan']; ?>
        </div>
    </div>

</div>



            <!-- BUTTON -->

           <a href="ambil-antian.php" class="btn">
    Ambil Antrian Baru
</a>

        </div>

    </div>
</div>
</body>

</html>