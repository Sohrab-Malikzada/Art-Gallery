<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Manrope',sans-serif;
}

body{

background:#000;

color:white;

}

.container{
    width:100%;
    max-width:1400px;
    margin:0 auto;

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:30px;
}

.navbar{

    position:fixed;

    top:0;
    left:0;

    width:100%;

    z-index:9999;

    margin:0;
    padding:25px 0;

}



.menu{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:25px;

    list-style:none;

    background:#111;

    padding:14px 30px;

    border-radius:50px;

    border:1px solid #222;

    box-shadow:0 0 30px rgba(255,255,255,.05);

    position:absolute;

    left:50%;

    transform:translateX(-50%);

    white-space:nowrap;
}

.logo{

font-size:32px;

font-weight:700;

}

.actions{

display:flex;

gap:15px;

}

.signin{

background:transparent;

border:none;

color:white;

}

.started{

background:white;

color:black;

padding:12px 24px;

border-radius:30px;

border:none;

font-weight:600;

}

.hero{

padding-top:180px;

text-align:center;

}

a{
    text-decoration: none !important;
}

.hero h1{

font-size:70px;

font-weight:300;

margin-bottom:20px;

}

.hero p{

max-width:700px;

margin:auto;

opacity:.7;

line-height:1.8;

font-size:20px;

}

.icons-wrapper{

height:420px;

position:relative;

margin-top:70px;

}

.glow{

width:700px;

height:220px;

background:#7c3aed;

filter:blur(180px);

opacity:.35;

position:absolute;

left:50%;

transform:translateX(-50%);

top:120px;

}


.menu li a{
    display:flex;
    align-items:center;
    gap:10px;   /* فاصله آیکن و متن */
    text-decoration:none;
    color:#fff;
}

.menu li a i{
    font-size:18px;
}

.logo a{
    display:flex;
    align-items:center;
    gap:10px;          /* فاصله بین آیکن و Liam */
    color:#fff;
    margin-right: 10px;   /* فاصله از دکمه Music */
    margin-left: 30px;   /* فاصله از دکمه Music */
    text-decoration:none;
    font-size:28px;
    font-weight:700;
}

.logo a i{
    font-size:30px;
    color:#fff;
}

.music-btn{
    display: flex;
    align-items: center;
    gap: 10px;          /* فاصله آیکن و متن */
    color: #fff;
    text-decoration: none;
    margin-left: 10px;   /* فاصله از دکمه Logout */
}

.music-btn i{
    font-size: 18px;
}


.started{
    display:inline-flex;
    align-items:center;
    gap:10px;           /* فاصله آیکن و متن */
    padding:10px 20px;
    border-radius:30px;
    background:#fff;
    color:#000;
    text-decoration:none;
    font-weight:600;
    transition:.3s;

}

.started i{
    font-size:18px;
}

.started:hover{
    background:#f3f3f3;
}


</style>
<body>

    <!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Integrations</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body class="bg-black text-white overflow-x-hidden">

<nav class="navbar">

<div class="container">

<div class="logo">
    <a href="./home.php">
        <i class="bi bi-palette-fill"></i>
        <span class="text-white ">Liam</span>
    </a>
</div>

<ul class="menu flex gap-8 list-none">

    <li ><a href="./home.php" class="bi bi-house-door-fill text-white hover:text-gray-400">Home</a></li>

    <li><a href="./gallary.php" class="bi bi-images text-white hover:text-gray-400">Gallery</a></li>

    <li><a href="./create.php" class="bi bi-plus-circle-fill text-white hover:text-gray-400">Add Painting</a></li>

    <li><a href="./favorite.php" class="bi bi-heart-fill text-white hover:text-gray-400">Favorite</a></li>

    <li><a href="./orderPainting.php" class="bi bi-cart-fill text-white hover:text-gray-400">Order Painting</a></li>

    <li><a href="./about.php" class="bi bi-person-circle text-white hover:text-gray-400">About</a></li>

    <li><a href="./contact.php" class="bi bi-envelope-fill text-white hover:text-gray-400">Contact</a></li>

</ul>

<div class="actions">

<a href="./music.php" class="music-btn">
    <i class="bi bi-music-note-beamed"></i>
    <span>Music</span>
</a>

<a href="./login.php" class="started">
    <i class="bi bi-box-arrow-right"></i>
    <span>Logout</span>
</a>

</div>

</div>

</nav>


<script src="app.js"></script>

</body>

</html>


</body>
</html>