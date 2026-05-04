<?php
include './koneksi.php';

// Ambil datanya gessss
if (isset($_POST['ambil'])) {

    $telp = $_POST['telp'];
    $service_id = $_POST['service_id']; // LANGSUNG IDNYA


    $today = date('Y-m-d');

    // ambil nomor terakhir
    $query = mysqli_query($conn, "
        SELECT MAX(queue_number) as last 
        FROM queues 
        WHERE service_id = $service_id 
        AND appointment_date = '$today'
    ");

    $data = mysqli_fetch_assoc($query);
    $last = $data['last'] ?? 0;
    $next = $last + 1;

    // insert
    mysqli_query($conn, "
        INSERT INTO queues 
        (service_id, queue_number, appointment_date, status, visitor_phone, created_at, updated_at) 
        VALUES 
        ($service_id, $next, '$today', 'waiting', '$telp', NOW(), NOW())
    ");

    // ambil nama loket
    $getService = mysqli_query($conn, "SELECT name FROM services WHERE id = $service_id");
    $service = mysqli_fetch_assoc($getService);
    $nama_loket = $service['name'];

    // ini ngirim ke next page yh gais 
    header("Location: nomor-antrian.php?nomor=$next&telp=$telp&loket=$nama_loket");
    exit;
}

$services = mysqli_query($conn, "SELECT id, name FROM services");
?>

<!DOCTYPE html>
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
        }

        .header h1 {
            margin: 0;
            font-weight: 800;
            font-size: 36px;
            color: #091F5B;
        }

        .header h2 {
            margin: 0;
            font-family: "Unica One", sans-serif;
            font-size: 24px;
            color: #091F5B;
        }


        /* ================= FORM ================= */

        .form-box {
            margin-top: 50px;
            background: #F1F5FB;
            padding: 40px;
            border-radius: 20px;
            width: 520px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .form-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #091F5B;
            font-weight: 700;
        }

        .form-box label {
            font-size: 14px;
            color: #091F5B;
        }

        .form-box input,
        .form-box select {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: none;
            background: #E9EDF5;
            font-family: "Poppins", sans-serif;
        }

        .form-box button {
            width: 100%;

            /* warna normal */
            background: #091F5B;

            color: white;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;

            transition: 0.3s;
        }

        /* saat kursor di atas button */

        .form-box button:hover {

            background: linear-gradient(90deg,
                    #020B25,
                    #0E308E,
                    #6F96D1);

            box-shadow: 0 6px 15px rgba(14, 48, 142, 0.4);

            transform: scale(1.03);
        }

        .hasil {
            margin-top: 20px;
            padding: 12px;
            background: #DFF0D8;
            color: #2E7D32;
            border-radius: 10px;
            text-align: center;
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


        .form-box select option:hover {
            background: #D0E3FF;
        }

        /* ================= RESPONSIVE ================= */

        /* Tablet */
        @media (max-width: 1024px) {

            .container {
                flex-direction: column;
                height: auto;
                display: flex;
                min-height: 100vh;
            }

            .sidebar {
                width: 100%;
                text-align: center;
            }

            .main-content {
                border-radius: 0;
                padding-bottom: 40px;
            }

            .form-box {
                width: 80%;
            }

        }

        /* HP */
        @media (max-width: 600px) {

            .logo {
                width: 120px;
            }

            .menu-item {
                font-size: 12px;
                padding: 10px 0;
            }

            /* header */
            .header h1 {
                font-size: 24px;
            }

            .header h2 {
                font-size: 16px;
            }

            /* form */
            .form-box {
                width: 90%;
                padding: 25px;
            }

            .form-box input,
            .form-box select {
                padding: 10px;
                font-size: 14px;
            }

            .form-box button {
                font-size: 14px;
                padding: 10px;
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
                <div class="menu-item active"> <img src="assets/vector/anmbil-antrian.png" alt="vector" class="icon-sidebar"> <a href="ambil-antian.php">Antrian</a> </div>
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



            <!-- ================= FORM PENGAMBILAN ================= -->

            <div class="form-box">

                <h2>Form Pengambilan Antrian</h2>

                <form method="post">

                    <label>Nomor Telepon</label>

                    <input
                        type="text"
                        name="telp"
                        placeholder="Masukkan Nomor Telepon"
                        required>

                    <label>Loket</label>

                    <select name="service_id" required>
                        <option value="">Pilih Loket</option>

                        <?php while ($s = mysqli_fetch_assoc($services)) { ?>
                            <option value="<?= $s['id']; ?>">
                                <?= $s['name']; ?>
                            </option>
                        <?php } ?>

                    </select>

                    <button type="submit" name="ambil">
                        Ambil Antrian
                    </button>

                </form>
            </div>

        </div>

    </div>

</body>

</html>