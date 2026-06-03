<?php
session_start();
include 'koneksi.php';

// Ambil datanya gessss
if (isset($_POST['ambil'])) {


    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $service_id = (int) $_POST['service_id'];

    $telp = $_POST['telp'];
    $service_id = $_POST['service_id'];

    $today = date('Y-m-d');

    $query = mysqli_query($conn, "
        SELECT MAX(queue_number) AS last_number
        FROM queues
        WHERE service_id = $service_id
        AND appointment_date = '$today'
    ");

    $data = mysqli_fetch_assoc($query);

    $last_number = $data['last_number'] ?? 0;
    $next_number = $last_number + 1;

    // Simpan ke database
    $insert = mysqli_query($conn, "
        INSERT INTO queues
        (
            service_id,
            queue_number,
            appointment_date,
            status,
            visitor_phone,
            created_at,
            updated_at
        )
        VALUES
        (
            $service_id,
            $next_number,
            '$today',
            'waiting',
            '$telp',
            NOW(),
            NOW()
        )
    ");


    if ($insert) {

        $queue_id = mysqli_insert_id($conn);

        if (!isset($_SESSION['riwayat_antrian'])) {
            $_SESSION['riwayat_antrian'] = [];
        }

        $_SESSION['riwayat_antrian'][] = $queue_id;

        header("Location: nomor-antrian.php?id=$queue_id");
        exit;
    }
}

$services = mysqli_query($conn, "
    SELECT id, name
    FROM services
    WHERE is_active = 1
    ORDER BY name
");
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
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: #091F5B;
            color: white;
            padding: 20px;
            position: relative;
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
            width: 90%;
            max-width: 520px;

            margin-top: 50px;
            background: #F1F5FB;
            padding: 40px;
            border-radius: 20px;
            box-sizing: border-box;

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
            box-sizing: border-box;
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


        /* ================= BUTTON ================= */


        .form-box select option:hover {
            background: #D0E3FF;
        }

        /* ================= RESPONSIVE ================= */

        /* Tablet */
        @media (max-width: 1024px) {

            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 15px;
            }

            .menu {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
                gap: 15px;
            }

            .menu-item {
                padding: 10px 15px;
            }

            .sidebar-decoration {
                display: none;
            }

            .main-content {
                border-radius: 30px 30px 0 0;
                min-height: auto;
                padding-bottom: 30px;
            }
        }

        /* HP */
        @media (max-width: 768px) {

            .container {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 15px;
                box-sizing: border-box;
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
                gap: 10px;
                margin-top: 10px;
                flex-wrap: wrap;
            }

            .menu-item {
                padding: 10px 15px;
                border-radius: 10px;
                background: rgba(255, 255, 255, 0.1);
                font-size: 14px;
            }

            .menu-item::after {
                display: none;
            }

            .icon-sidebar {
                width: 18px;
            }

            .main-content {
                border-radius: 30px 30px 0 0;
                padding: 20px;
                box-sizing: border-box;
            }

            .header {
                margin-top: 10px;
                width: fit-content;
                max-width: 90%;
            }

            .header h1 {
                font-size: 24px;
            }

            .header h2 {
                font-size: 16px;
            }

            .form-box {
                width: 100%;
                max-width: 500px;
                padding: 20px;
                margin-top: 25px;
                box-sizing: border-box;
            }

            .form-box h2 {
                font-size: 20px;
            }

            .form-box input,
            .form-box select,
            .form-box button {
                font-size: 14px;
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