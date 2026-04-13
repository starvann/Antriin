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
            height: 100vh;
        }

        .judul {
            position: absolute;
            top: 25px;
            width: 100%;
            text-align: center;
            font-weight: bold;
            color: #091F5B;
}

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 260px;
            background: #091F5B;
            color: white;
            padding: 30px;
            position: relative;
        }

        .logo {
            width: 220px;
            margin-bottom: 30px;
            
        }

        /* menu sidebar */

        .menu {
            margin-top: 40px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 0;
            cursor: pointer;
            color: white;
            justify-content: center;
            position: relative;
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


        /* ================= MAIN CONTENT ================= */

        .main-content {
            flex: 1;
            background: white;
            border-radius: 40px 0 0 40px;
            background-image: url("assets/bg.png");
            background-size: cover;
            padding: 40px;
            overflow-y: auto;

            display: flex;
            flex-direction: column;
            align-items: center;
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
            display: grid;
            gap: 40px;
            grid-template-columns: repeat(2, 1fr);
            width: 100%;
            max-width: 1050px;
        }

        .card{
            position: relative;
            width: 100%;
            height: 220px;
        }

        /* SATU KARTU  */

        .card-container {
            position: relative;
            height: 320px;
            width: 100%;
        }

        .content{
            text-align: center;
        }

        /* gambar kartu */

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }


        /* nomor antrian */

        .nomor {
            position: absolute;
            top: 46%;
            left: 50%;
            transform: translate(-50%, -50%);
            
            font-size: 90px;
            font-weight: 800;
        }


        /* info bawah kartu */

        .info {
            position: absolute;
            bottom: 35px;
            left: 50%;
            font-size: 13px;
            transform: translateX(-50%);
            width: 65%;
            text-align: center;
            line-height: 1.4;
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

                <div class="menu-item"> <img src="assets/vector/anmbil-antrian.png" alt="vector" class="icon-sidebar">Ambil Antrian</div>
                <div class="menu-item"> <img src="assets/vector/kartu-antrian.png" alt="vector" class="icon-sidebar">Kartu Antrian</div>
                <div class="menu-item"> <img src="assets/vector/daftar-antrian.png" alt="vector" class="icon-sidebar">Daftar Antrian</div>

            </div>

        </div>


        <!-- ================= MAIN CONTENT ================= -->
<div class="main-content">

    <!-- HEADER -->
    <div class="header">
        <h1>FOODCOURT</h1>
        <h2>BELITOPIA</h2>
    </div>

    <!-- TAMBAHAN PENTING (INI YANG KAMU KURANGIN!) -->
    <div class="cards">

        <!-- KARTU -->
        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : DimTop - Dimsum Topia
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Samtara - Sambal Nusantara
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Pentol Gacor
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Man Se
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Ah Bang Kopitiam
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Tea Station
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Jasera
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Steak City
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Sushikun
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Ramenchan
            </div>
        </div>

        <div class="card-container">
            <img src="assets/Kartu.png" class="card-img">
            <div class="nomor">34</div>
            <div class="info">
                Nomor Telepon : 084782347238 <br>
                Loket : Teh Jawa
            </div>
        </div>

    </div>

</div>

        </div>

    </div>
</body>

</html>