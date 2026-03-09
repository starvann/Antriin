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
        }

        /* menu sidebar */

        .menu {
            margin-top: 40px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            cursor: pointer;
            font-size: 14px;
        }

        /* icon besar dekorasi bawah */

        .sidebar-decoration {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            opacity: 0.2;
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


        /* ================= CARD ================= */

        .card-container {
            position: relative;
            margin-top: 40px;
        }

        /* gambar kartu */

        .card-img {
            width: 731px;
        }

        /* nomor antrian */

        .nomor {
            position: absolute;
            top: 130px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 200px;
            font-weight: 800;
        }


        /* info bawah kartu */

        .info {
            position: absolute;
            bottom: 90px;
            left: 90px;
            right: 90px;

            display: flex;
            font-size: 24px;
        }


        /* ================= BUTTON ================= */

        .btn {
            margin-top: 30px;
            background: #091F5B;
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #0d2c84;
        }
    </style>
</head>



<body>

    <div class="container">


        <!-- ================= SIDEBAR ================= -->

        <div class="sidebar">

            <img src="assets/logo.png" class="logo">

            <div class="menu">

                <div class="menu-item"> Ambil Antrian</div>
                <div class="menu-item"> Kartu Antrian</div>
                <div class="menu-item"> Daftar Antrian</div>

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

            <div class="card-container">

                <img src="assets/Kartu.png" class="card-img">

                <div class="nomor">
                    34
                </div>


                <div class="info">

                    <div>
                        Nomor Telepon : 084782347238 <br>
                        Loket : DimTop - Dimsum Topia
                    </div>

                </div>

            </div>



            <!-- BUTTON -->

            <button class="btn">
                Ambil Antrian Baru
            </button>

        </div>

    </div>

</body>

</html>