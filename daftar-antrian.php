<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "admin_antrian");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ambil data service + antrian aktif
$query = mysqli_query($conn, "
    SELECT s.id, s.name,
    (
        SELECT q.queue_number 
        FROM queues q
        WHERE q.service_id = s.id
        AND q.status = 'waiting'
        ORDER BY q.queue_number ASC
        LIMIT 1
    ) as current_queue
    FROM services s
");

$services = [];

while ($row = mysqli_fetch_assoc($query)) {
    $services[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antriin Foodcourt</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Unica+One&display=swap" rel="stylesheet">

    <style>
        /* (CSS kamu aku biarin, ga diubah) */
        body {
            margin: 0;
            font-family: "Poppins";
            background: #091F5B;
        }

        .container {
            display: flex;
            height: 100vh;
        }

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

        .menu {
            margin-top: 40px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 0;
            cursor: pointer;
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
            transition: 0.3s;
        }

        .menu-item.active::after,
        .menu-item:hover::after {
            width: 85%;
        }

        .icon-sidebar {
            width: 25px;
        }

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
            font-family: "Unica One";
            font-size: 32px;
            color: #091F5B;
        }

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
            max-width: 400px;
            height: 190px;
            background: rgba(200, 220, 255, 0.7);
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .antrian-card h1 {
            font-size: 80px;
            margin: 0;
            color: #091F5B;
            font-weight: 500;
        }

        .judul {
            font-size: 20px;
            font-weight: bold;
            color: #091F5B;
        }

        .tenant {
            font-size: 20px;
            border-top: 1px solid #091F5B;
            margin-top: 5px;
            padding-top: 5px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="sidebar">
            <img src="assets/logo.png" class="logo">
            <img src="assets/sidebar-decor.png" class="sidebar-decoration">

            <div class="menu">
                <div class="menu-item"><img src="assets/vector/anmbil-antrian.png" class="icon-sidebar"><a href="ambil-antian.php">Antrian</a></div>
                <div class="menu-item"><img src="assets/vector/kartu-antrian.png" class="icon-sidebar"><a href="kartu-antrian.php">Kartu Antrian</a></div>
                <div class="menu-item active"><img src="assets/vector/daftar-antrian.png" class="icon-sidebar"><a href="#">Daftar Antrian</a></div>
            </div>
        </div>

        <div class="main-content">

            <div class="header">
                <h1>FOODCOURT</h1>
                <h2>BELITOPIA</h2>
            </div>

            <div class="antrian-container">

                <?php foreach ($services as $s): ?>

                    <div class="antrian-card">
                        <div class="judul">NOMOR ANTRIAN SAAT INI</div>

                        <h1>
                            <?= $s['current_queue']
                                ? str_pad($s['current_queue'], 2, "0", STR_PAD_LEFT)
                                : "--"; ?>
                        </h1>

                        <p class="tenant"><?= $s['name']; ?></p>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

</body>

</html>