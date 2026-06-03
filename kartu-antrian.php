<?php
session_start();
include 'koneksi.php';

$riwayat = $_SESSION['riwayat_antrian'] ?? [];

if (empty($riwayat)) {
    die("Belum ada riwayat antrian");
}

$id_list = implode(',', array_map('intval', $riwayat));

$query = mysqli_query($conn,"
SELECT
    q.id,
    q.queue_number,
    q.visitor_phone,
    s.name AS layanan
FROM queues q
JOIN services s
ON q.service_id = s.id
WHERE q.id IN ($id_list)
ORDER BY q.id DESC
");
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

    overflow: hidden;
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

        .menu-item.active::after {
            width: 85%;
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

    padding: 40px;

    display: flex;
    flex-direction: column;
    align-items: center;

    overflow-y: auto;
height: 100vh;
}


        /* ================= HEADER ================= */

        .header {
            margin-bottom: 30px;
            background: white;
            padding: 8px 35px;
            border-radius: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-weight: 800;
            font-size: 42px;
            color: #091F5B;
        }

        .header h2 {
            margin: 0;
            font-family: "Unica One", sans-serif;
            font-size: 28px;
            color: #091F5B;
        }


        /* ================= CARD ================= */

.cards {
    width: 100%;

    display: grid;
    grid-template-columns: repeat(2, 1fr);

    gap: 25px;

    justify-items: center;
    align-items: start;
}

        /* SATU KARTU  */
.card-container {
    position: relative;

    width: 500px;
    max-width: 100%;

    aspect-ratio: 800 / 661;

    background-image: url("assets/Kartu.png");
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

        /* nomor antrian */

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



        /* info bawah kartu */
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

        /* RESPONSIVEEEEEEEEEEEEE */
        /* TABLET */
        @media (max-width: 1024px) {

    .cards {
        grid-template-columns: 1fr;
        max-width: 700px;
    }

    .card-container {
        height: 280px;
    }

    .nomor {
        font-size: 75px;
    }

    .info {
        width: 70%;
    }
}

/* HP */
@media (max-width: 768px) {

    .container {
        flex-direction: column;
    }

    .sidebar {
        position: static;
        width: 100%;
        height: auto;
        padding: 15px;
    }

    .logo {
        width: 150px;
        display: block;
        margin: 0 auto 15px;
        border: none;
    }

    .sidebar-decoration {
        display: none;
    }

    .menu {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .menu-item {
        padding: 10px 15px;
        border-radius: 10px;
        background: rgba(255,255,255,.1);
        font-size: 14px;
    }

    .menu-item::after {
        display: none;
    }

    .icon-sidebar {
        width: 18px;
    }

    .main-content {
        margin-left: 0;
        border-radius: 30px 30px 0 0;
        padding: 20px;
    }

    .header {
        width: fit-content;
        max-width: 90%;
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 24px;
    }

    .header h2 {
        font-size: 16px;
    }

    .cards {
        grid-template-columns: 1fr;
        gap: 15px;
    }

        .card-container {
        width: 95%;
        height: auto;
        aspect-ratio: 800 / 661;
    }

    .nomor {
        font-size: 80px;
        top: 40%;
    }

    .info {
        width: 70%;
        font-size: 10px;
        bottom: 12%;
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
                <div class="menu-item active"> <img src="assets/vector/kartu-antrian.png" alt="vector" class="icon-sidebar"><a href="kartu-antrian.php">Kartu Antrian</a></div>
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

            <div class="cards">

<?php while($data = mysqli_fetch_assoc($query)) : ?>

<div class="card-container">

    <div class="nomor">
       <?= str_pad($data['queue_number'], 2, "0", STR_PAD_LEFT); ?>
    </div>

    <div class="info">
        Nomor Telepon : <?= $data['visitor_phone']; ?> <br>
        Loket : <?= $data['layanan']; ?>
    </div>

</div>

<?php endwhile; ?>

</div>
        </div>

    </div>

    </div>
</body>

</html>