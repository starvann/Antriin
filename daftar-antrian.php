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


        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 280px;
            background: #091F5B;
            color: white;
            padding: 30px;
            position: relative;
        }

        .logo {
            width: 260px;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
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
            flex: 1;
            background: white;
            border-radius: 40px 0 0 40px;

            background-image: url("assets/bg.png");
            background-size: cover;

            display: flex;
            flex-direction: column;
            align-items: center;
        }


        /* ================= HEADER ================= */

        .header {
            margin-top: 30px;
            background: white;
            padding: 10px 40px;
            border-radius: 30px;
            text-align: center;
            font-family: "Poppins", sans-serif;
        }

        .header h1 {
            margin: 0;
            font-weight: 800;
            font-size: 40px;
            color: #091F5B;
        }

        .header h2 {
            margin: 0;
            font-family: "Unica One", sans-serif;
            font-size: 32px;
            color: #091F5B;
        }

        /* ================= DAFTAR ANTRIAN ================= */

        .antrian-container {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 20px 40px;
            overflow-y: auto;
            margin: 30px auto;
        }

        .antrian-card {
            width: 100%;
            max-width: 400px;
            height: 190px;
            background: rgba(200, 220, 255, 0.7);
            border-radius: 15px;
            padding: 15px;
            text-align: center;
        }

        .antrian-card h1 {
            font-size: 80px;
            margin: 0px;
            color: #091F5B;
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            padding: 0px;
        }

        .judul {
            font-size: 20px;
            color: #091F5B;
            font-family: "Poppins", sans-serif;
            font-weight: bold;
            margin-top: 5px;
        }

        .tenant {
            font-size: 20px;
            color: #091F5B;
            font-family: "Poppins", sans-serif;
            border-top: 1px solid #091F5B;
            margin: 0px;
            padding-top: 5px;
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
                <div class="menu-item active"> <img src="assets/vector/daftar-antrian.png" alt="vector" class="icon-sidebar"><a href="daftar-antrian.php">Daftar Antrian</a></div>
            </div>

        </div>



        <!-- ================= MAIN CONTENT ================= -->

        <div class="main-content">

            <!-- HEADER -->

            <div class="header">
                <h1>FOODCOURT</h1>
                <h2>BELITOPIA</h2>
            </div>

            <!-- DAFTAR ANTRIAN -->

            <div class="antrian-container">
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">DimTop - Dimsum Topia</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">Pentol Gacor</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">Tea Station</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">Man Se</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">Samtara - Sambalan Nusantara</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">Jasera - Jamuan Sejuta Rasa</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">Ramen Chan</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">Sushii Kun</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">Teh Java</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">belitopia</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">Ah Bang Kopitiam</p>
                </div>
                <div class="antrian-card">
                    <div class="judul">NOMOR ANTRIAN SAAT INI</div>
                    <h1> 01 </h1>
                    <p class="tenant">-</p>
                </div>

            </div>

        </div>

    </div>

</body>

</html>