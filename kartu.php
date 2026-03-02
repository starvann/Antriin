<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Unica+One&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #091F5B;
            font-family: "Poppins", sans-serif;
        }

        .container {
            display: flex;
            /* sidebar dan main-content sejajar */
        }

        .sidebar {
            width: 325px;
            background-color: #091F5B;
            /* styling menu, ikon, dll */
        }

        .main-content {
            flex: 1;
            /* mengambil sisa space */
            background-color: #fff;
            padding: 0;
            background-image: url("assets/bg.png");
            border-radius: 38px;
            display: flex;
            flex-direction: column;
            /* supaya elemen di dalam main-content tersusun vertikal */
            align-items: center;
            /* center horizontal */
            justify-content: center;
            /* center vertical */
            text-align: center;
            /* supaya teks juga center */
        }

        .header h1 {
            font-family: "Poppins", sans-serif;
            font-weight: 800;
            font-style: bold;
            font-size: 40px;
            margin-bottom: 0;
        }

        .header h2 {
            font-family: "Unica One", sans-serif;
            font-weight: 400;
            font-style: normal;
            font-size: 32px;
            margin-top: 0;
        }

        .logo {
            margin-top: 30px;
            margin-left: 35px;
        }

        .btn {
            background-color: #091F5B;
            margin-bottom: 150px;
            margin-top: 35px;
            color: #fff;
            padding: 10px;
            border-radius: 9px;
            width: 254px;
            height: 40px;
        }

        .kartu {
            width: 731px;
            height: 613px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="sidebar">
            <img src="assets/logo.png" alt="logo" class="logo">
        </div>
        <div class="main-content">
            <div class="header">
                <h1>FOODCOURT</h1>
                <h2>BELITOPIA</h2>
            </div>
            <img src="assets/Kartu.png" alt="card" class="kartu">
            <button class="btn">Ambil Antrian Baru</button>
        </div>
    </div>

</body>

</html>