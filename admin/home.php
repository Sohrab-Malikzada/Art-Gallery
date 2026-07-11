<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Art Gallery</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* ===========================
   RESET
=========================== */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

body{

    background:#050505;
    color:#fff;
    font-family:'Manrope',sans-serif;

    overflow-x:hidden;
}

/* ===========================
   HERO
=========================== */

.hero{
    min-height:400px;
    padding-top:110px;
    padding-bottom:20px;

    position:relative;

    display:flex;
    flex-direction:column;

    align-items:center;
}

.hero-content{

    width:850px;

    max-width:100%;

    margin-top:140px;

    text-align:center;

    z-index:100;
}

.hero h1{

    font-size:72px;

    font-weight:300;

    letter-spacing:-2px;

    margin-bottom:0px;
}

.hero p{

    width:700px;

    max-width:100%;

    margin:auto;

    color:#bdbdbd;

    font-size:20px;

    line-height:1.8;
}

/* ===========================
   Gallery
=========================== */

.gallery-scene{

    width:100%;

    height:620px;

    margin-top:0px;

    position:relative;

    overflow:hidden;
}

#gallery{

    width:1400px;

    max-width:100%;

    height:400px;

    margin:auto;

    position:relative;
}

/* ===========================
   Glow
=========================== */

.light{

    position:absolute;

    left:50%;

    bottom:-100px;

    transform:translateX(-50%);

    width:950px;

    height:320px;

    background:
    radial-gradient(circle,
    rgba(0,255,255,.25),
    transparent 70%);

    filter:blur(140px);

    pointer-events:none;
}

/* ===========================
   Paint
=========================== */

.paint{

    position:absolute;

    object-fit:cover;

    border-radius:22px;

    cursor:pointer;

    transition:.45s;

    border:1px solid rgba(255,255,255,.06);

    box-shadow:

    0 25px 55px rgba(0,0,0,.65),

    0 0 30px rgba(255,255,255,.05);

    -webkit-box-reflect:

    below 6px

    linear-gradient(

    transparent,

    rgba(255,255,255,.12));

}

.paint:hover{

    transform:

    translateY(-12px)

    scale(1.12);

    z-index:99999;

    box-shadow:

    0 35px 70px rgba(0,0,0,.8),

    0 0 40px rgba(0,255,255,.25);

}

/* ===========================
Floating Animation
=========================== */

@keyframes float{

    0%{

        transform:translateY(0px);

    }

    50%{

        transform:translateY(-10px);

    }

    100%{

        transform:translateY(0px);

    }

}

/* ===========================
Categories
=========================== */

.category-section{

    width:100%;

    margin-top:50px;

    display:flex;

    justify-content:center;
}

.categories{

    display:flex;

    gap:18px;

    flex-wrap:wrap;

    justify-content:center;
}

.categories button{

    border:none;

    outline:none;

    padding:14px 26px;

    border-radius:50px;

    background:#121212;

    color:white;

    transition:.35s;

    font-weight:600;
}

.categories button:hover{

    background:#1f1f1f;

}

.categories .active{

    background:white;

    color:black;
}

/* ===========================
Responsive
=========================== */

@media(max-width:992px){

.hero h1{

font-size:54px;

}

.hero p{

font-size:17px;

}

.paint{

border-radius:18px;

}

}

@media(max-width:768px){

.hero{

min-height:780px;

}

.hero h1{

font-size:42px;

}

.hero p{

font-size:16px;

}

.gallery-scene{

height:470px;

}

}

@media(max-width:576px){

.hero h1{

font-size:34px;

}

.hero p{

font-size:15px;

line-height:1.7;

}

.categories{

gap:10px;

}

.categories button{

padding:10px 18px;

font-size:14px;

}

}
</style>


<body>



<?php include("templates/header.php"); ?>



<!-- Fetch Data from Database  -->
<?php

include("connect.php");

$sql="SELECT * FROM paintings ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

$paintings=[];

while($row=mysqli_fetch_assoc($result)){

    $paintings[]=$row;

}

?>

<section class="hero">

<div class="hero-content">



<h1 style="margin-bottom: 8px; margin-top: -200px;">

Discover Amazing Artworks

</h1>

<p syle="margin-top: -30px; margin-top: 10px; font-size: 18px; line-height: 1.6; color: #cbd5e1; text-align: center; max-width: 600px; margin-left: auto; margin-right: auto;">

Discover paintings from talented artists around the world.
<!-- Explore modern art, oil paintings, landscapes and portraits in one premium gallery. -->

</p>

</div>

<div class="gallery-scene">

<div class="light"></div>

<div id="gallery"></div>

</div>


</section>



<section class="category-section">

<div class="container">

<div class="categories">

<button class="active">All</button>

<button>Oil Painting</button>

<button>Portrait</button>

<button>Landscape</button>

<button>Modern</button>

<button>Abstract</button>

</div>

</div>

</section>


<script src="app.js"></script>

<?php include("templates/footer.php"); ?>

<script>
//  it is used to pass the paintings data from PHP to JavaScript. The json_encode function converts the PHP array into a JSON string, which can then be used in JavaScript. This allows you to access the paintings data in your JavaScript code for further manipulation or display on the webpage.
const paintings = <?= json_encode($paintings); ?>;

</script>

<script>
    // This script dynamically creates image elements for each painting in the paintings array and positions them in a gallery layout. It also adds a parallax effect based on mouse movement.
    const gallery = document.getElementById("gallery");

/*
   بعداً فقط این آرایه را از دیتابیس پر می‌کنی
*/




window.onload=function(){

const gallery=document.getElementById("gallery");

if(!gallery) return;

// بقیه کدها ...

}

// Fetch Image From Database and Create Image Elements
const images = paintings.map(item => "image/" + item.image);

/* تعداد ردیف‌ها */

const rows = 4;

/* شماره عکس */

let index = 0;

for(let r=0;r<rows;r++){

    /* هر ردیف تعداد بیشتری عکس دارد */

    const cols = 4 + r;

    /* اندازه عکس */

    const size = 74 + (r*5);

    /* فاصله بین عکس‌ها */

    const gap = size + 80;

    /* عرض کل ردیف */

    const totalWidth = (cols-1) * gap;

    for(let c=0;c<cols;c++){

        const img = document.createElement("img");

        img.src = images[index % images.length];

        img.className = "paint";

        img.style.width = size+"px";
        img.style.height = size+"px";

        /*
           مرکز صفحه
        */

        let x = 650 - totalWidth/2 + c*gap;

        /*
           قوس
        */

        const center = (cols-1)/2;

        const curve = Math.pow(c-center,2);

        let y = 20 + r*58 + curve*2.4;

        /*
           کمی نامنظم مثل نمونه
        */

        x += Math.random()*16 - 8;
        y += Math.random()*10 - 5;

        img.style.left = x+"px";
        img.style.top  = y+"px";

        /*
           شفافیت
        */

        img.style.opacity = 0.12 + (r*0.11);

        /*
           لایه
        */

        img.style.zIndex = r;

        /*
           انیمیشن
        */

        img.style.animation =
        `float ${4+Math.random()*3}s ease-in-out infinite`;

        gallery.appendChild(img);

        index++;

    }

}


/*
=====================================
Mouse Parallax
=====================================
*/

document.addEventListener("mousemove",function(e){

    const x = (e.clientX/window.innerWidth)-0.5;

    const y = (e.clientY/window.innerHeight)-0.5;

    const items = document.querySelectorAll(".paint");

    items.forEach((item,i)=>{

        const speed = (i%6)+2;

        item.style.transform =
        `translate(${x*speed}px,${y*speed}px)`;

    });

});
</script>

</body>
</html>