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

body{
margin:0;
font-family:"Poppins", sans-serif;
background:#091F5B;
}

.container{
display:flex;
height:100vh;
}


/* ================= SIDEBAR ================= */

.sidebar{
width:280px;
background:#091F5B;
color:white;
padding:30px;
position:relative;
}

.logo{
width:150px;
margin-bottom:30px;
}

/* menu sidebar */

.menu{
margin-top:40px;
}

.menu-item{
display:flex;
align-items:center;
gap:10px;
padding:15px 0;
border-bottom: 1px  solid rgba(255,255,255,0.2);
cursor:pointer;
font-size:14px;
}

/* garis pendek default */

.menu-item::after{
content:"";
position:absolute;
bottom:0;
left:0;

width:40px; /* pendek */
height:2px;

background:rgba(255,255,255,0.3);

transition:0.3s;
}

/* saat hover → memanjang */

.menu-item:hover::after{
width:100%;
background:white;
}

/* menu aktif → tetap panjang */

.menu-item.active::after{
width:100%;
background:white;
}

/* ================= MAIN CONTENT ================= */

.main-content{
flex:1;
background:white;
border-radius:40px 0 0 40px;

background-image:url("assets/bg.png");
background-size:cover;

display:flex;
flex-direction:column;
align-items:center;
}


/* ================= HEADER ================= */

.header{
margin-top:30px;
background:white;
padding:10px 40px;
border-radius:30px;
text-align:center;
}

.header h1{
margin:0;
font-weight:800;
font-size:36px;
color:#091F5B;
}

.header h2{
margin:0;
font-family:"Unica One", sans-serif;
font-size:24px;
color:#091F5B;
}


/* ================= FORM ================= */

.form-box{
margin-top:50px;
background:#F1F5FB;
padding:40px;
border-radius:20px;
width:520px;
box-shadow:0 10px 25px rgba(0,0,0,0.15);
}

.form-box h2{
text-align:center;
margin-bottom:25px;
color:#091F5B;
font-weight:700;
}

.form-box label{
font-size:14px;
color:#091F5B;
}

.form-box input,
.form-box select{
width:100%;
padding:12px;
margin-top:8px;
margin-bottom:20px;
border-radius:10px;
border:none;
background:#E9EDF5;
font-family:"Poppins", sans-serif;
}

.form-box button{
width:100%;

/* warna normal */
background:#091F5B;

color:white;
padding:12px;
border:none;
border-radius:10px;
cursor:pointer;
font-size:14px;
font-weight:500;

transition:0.3s;
}

/* saat kursor di atas button */

.form-box button:hover{

background:linear-gradient(
90deg,
#020B25,
#0E308E,
#6F96D1
);

box-shadow:0 6px 15px rgba(14,48,142,0.4);

transform:scale(1.03);
}

.hasil{
margin-top:20px;
padding:12px;
background:#DFF0D8;
color:#2E7D32;
border-radius:10px;
text-align:center;
}


/* ================= BUTTON ================= */

.btn{
margin-top:30px;
background:#091F5B;
color:white;
border:none;
padding:12px 40px;
border-radius:8px;
cursor:pointer;
font-size:14px;
}


.form-box select option:hover{
background:#D0E3FF;
}

</style>
</head>



<body>

<div class="container">


<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

<img src="assets/logo.png" class="logo">

<div class="menu">

<div class="menu-item active"> Ambil Antrian</div><div class="menu-item"> Kartu Antrian</div>
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



<!-- ================= FORM PENGAMBILAN ================= -->

<div class="form-box">

<h2>Form Pengambilan Antrian</h2>

<form method="post">

<label>Nomor Telepon</label>

<input 
type="text" 
name="telp" 
placeholder="Masukkan Nomor Telepon"
required
>

<label>Loket</label>

<select name="loket" required>

<option value="">Pilih Loket</option>

<option>DimTop - Dimsum Topia</option>
<option>Pentol Gacor</option>
<option>Man Se</option>
<option>Tea Station</option>
<option>Samtara - Sambal Nusantara</option>
<option>Jasera</option>
<option>Steak City</option>
<option>Kememchan</option>
<option>Sushikun</option>
<option>Teh Jawa</option>
<option>Ah Bang Kopitiam</option>

</select>

<button type="submit" name="ambil">
Ambil Antrian
</button>

</form>

<?php

if(isset($_POST['ambil'])){

$telp = $_POST['telp'];
$loket = $_POST['loket'];

}

?>
</div>

</div>

</div>

</body>
</html>
