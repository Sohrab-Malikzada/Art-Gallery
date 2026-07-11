<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Art Gallery</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.4.0/color-thief.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/node-vibrant@3.2.1/dist/vibrant.min.js"></script>

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
    padding-top:100px;
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

    margin-top:-40px;

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

    height:440px;

    background:
    radial-gradient(circle,
    rgba(0,255,255,.25),
    transparent 70%);

    filter:blur(90px);
    opacity:.8;

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
    0 15px 35px rgba(0,0,0,.45),
    0 0 10px rgba(255,255,255,.05);

    /*  Reflection  */
    -webkit-box-reflect:
    below 8px
    linear-gradient(
    transparent 20%,
    rgba(255,255,255,.25) 60%,
    rgba(255,255,255,.05));

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

/* Painting card Filter */
.paint-card{

    position:relative;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.08);

    backdrop-filter:blur(18px);

    border-radius:24px;

    overflow:hidden;

    transition:.45s;

    cursor:pointer;

    box-shadow:
        0 15px 35px rgba(0,0,0,.45);
        

}

/* Big image card painting */
.paint-card img{

    width:100%;

    height:280px;

    object-fit:cover;

    transition:.6s;

}

/* Perfect Hover of painting card */
.paint-card:hover{

    transform:
        translateY(-12px)
        scale(1.02);

    border-color:rgba(0,255,255,.25);

    box-shadow:

        0 35px 80px rgba(0,0,0,.6),

        0 0 40px rgba(0,255,255,.15);

}

.paint-card:hover img{

    transform:scale(1.08);

}


/* نور متحرک داخل کارت */
.paint-card::before{

content:"";

position:absolute;

left:-120%;

top:0;

width:60%;

height:100%;

background:

linear-gradient(

90deg,

transparent,

rgba(255,255,255,.22),

transparent);

transform:skewX(-20deg);

transition:.8s;

}

.paint-card:hover::before{

left:150%;

}



/* 5. گرادیان روی عکس */
.image-overlay{

position:absolute;

left:0;
right:0;
bottom:0;

height:45%;

background:

linear-gradient(

transparent,

rgba(0,0,0,.92));

}


/* 6. اطلاعات کارت */
.card-body{

padding:22px;

}

.card-title{

font-size:22px;

font-weight:700;

margin-bottom:8px;

}

.art-content .artist{

    margin:6px 0 0;

    font-size:14px;

    font-weight:500;

    color:rgba(255,255,255,.78);

    line-height:1.2;

}

.price{

margin-top:15px;

font-size:26px;

font-weight:700;

color:#22d3eeee;

}


/* 7. دکمه */
.buy-btn{

margin-top:18px;

padding:12px 22px;

border-radius:40px;

border:none;

background:

linear-gradient(90deg,#06b6d4,#2563eb);

color:white;

font-weight:600;

transition:.35s;

}

.buy-btn:hover{

transform:translateY(-3px);

box-shadow:

0 12px 35px rgba(37,99,235,.45);

}


/* 8. چیدمان */
.paint-grid{

display:flex;

    flex-wrap:wrap;


grid-template-columns:

repeat(auto-fit,minmax(320px,1fr));

gap:32px;

margin-top:20px;
margin-bottom:40px;

}


.paintings-grid{

display:flex;
flex-wrap:wrap;
gap:22px;

justify-content:center;

margin-top:60px;

padding-bottom:80px;

}

.art-card{

    width:420px;
    height:180px;

    display:flex;

    position:relative;

    overflow:hidden;

    border-radius:8px;

    isolation:isolate;

    cursor:pointer;

    background:var(--gradient);

    border:1px solid rgba(255,255,255,.15);

    box-shadow:
    0 12px 25px rgba(0,0,0,.45),
    inset 0 1px 0 rgba(255,255,255,.18);

    transition:.45s;

}

.art-card::before{

content:"";

position:absolute;

left:0;
top:0;

width:100%;
height:100%;

background:

linear-gradient(

180deg,

rgba(255,255,255,.18),

transparent 40%);

pointer-events:none;

}

.art-card::after{

content:"";

position:absolute;

left:-40px;
top:-40px;

width:140px;
height:140px;

background:

radial-gradient(

circle,

rgba(255,255,255,.15),

transparent);

filter:blur(20px);

}

.art-card:hover{

transform:
translateY(-10px)
scale(1.03);

box-shadow:

0 28px 45px rgba(0,0,0,.55),

0 0 25px rgba(120,180,255,.35);

}

.art-image{

width:110px;

height:100%;

overflow:hidden;

flex-shrink:0;

}

.art-image img{

width:100%;

height:100%;

object-fit:cover;

transition:.6s;

}

.art-card:hover img{

transform:scale(1.12);

}



.art-content{

    padding:14px 18px;

    display:flex;

    flex-direction:column;

    justify-content:flex-start;

    flex:1;

}

.art-content h3{

    margin:0;

    
    font-size:20px;

    margin-bottom:4px;

    font-weight:700;

    color:#fff;

    line-height:1.1;

}

.rating{

margin-top:10px;

font-size:12px;

letter-spacing:2px;

color:#FFD55A;

}



.desc{

margin-top:6px;

font-size:11px;

line-height:1.45;

color:rgba(255,255,255,.75);

max-width:230px;

}

.bottom{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-top:-12px;

}



.view-btn{

padding:8px 18px;

border-radius:30px;

background:white;

color:#2d4358;

text-decoration:none;

font-weight:700;

transition:.3s;

}

.view-btn:hover{

background:#00d4ff;

color:white;

}




.card-bg{

    position:absolute;

    inset:0;

    overflow:hidden;

    z-index:0;

}

.card-bg img{

    width:100%;

    height:100%;

    object-fit:cover;

    transform:scale(1.7);

    filter:blur(4px);

    opacity:.55;

}

.card-bg::after{

    content:"";

    position:absolute;

    inset:0;

    background:linear-gradient(
    135deg,
    rgba(var(--c1),.55),
    rgba(var(--c2),.45)
);

    mix-blend-mode:overlay;

}



.art-card::before{

content:"";

position:absolute;

inset:0;

background:var(--card-gradient);

opacity:.82;

z-index:1;

}

.art-card::after{

content:"";

position:absolute;

left:0;
right:0;
top:0;

height:45%;

background:

linear-gradient(

180deg,

rgba(255,255,255,.22),

transparent

);

z-index:2;

}

.art-image,
.art-content{

position:relative;

z-index:5;

}


.art-image,
.art-content{

    position:relative;

    z-index:5;

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



<section>

<div class="paintings-grid">

<?php foreach($paintings as $row): ?>

<div class="art-card">

    <div class="card-bg">
        <img class="bg-image" src="image/<?= $row['image']; ?>">
    </div>

    <div class="art-image">
        <img class="cover-image" src="image/<?= $row['image']; ?>">
    </div>

    <div class="art-content">

        <h3><?= $row['title']; ?></h3>

        <p class="artist">
            By <?= $row['artist']; ?>
        </p>

        <div class="rating">★★★★★</div>

        <p class="desc">
            <?= substr($row['description'],0,55); ?>...
        </p>

        <div class="bottom">

            <span class="price">
                $<?= $row['price']; ?>
            </span>

            <a href="#" class="view-btn">
                View
            </a>

        </div>

    </div>

</div>

<?php endforeach; ?>

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

           

       const opacityLevels = [0.4, 0.6, 0.9, 1];
       const brightness = [35, 50, 75, 100];

       img.style.opacity = opacityLevels[r];
       img.style.filter = `brightness(${brightness[r]}%)`;


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

function makeGradient(card,img){

    const palette = thief.getPalette(img,5);

    const c1 = palette[0];
    const c2 = palette[1];
    const c3 = palette[2];

    card.style.setProperty(

        "--gradient",

        `linear-gradient(
        135deg,
        rgb(${c1.join(",")}),
        rgb(${c2.join(",")}),
        rgb(${c3.join(",")})
        )`

    );

}

const thief = new ColorThief();

document.querySelectorAll(".art-card").forEach(card=>{

    const img = card.querySelector(".cover-image");

    if(img.complete){

        makeGradient(card,img);

    }

    img.addEventListener("load",()=>{

        makeGradient(card,img);

    });

});


// card gradient for each painting
document.querySelectorAll(".art-card").forEach(card=>{

    const img=card.querySelector(".cover-image");

    Vibrant.from(img.src).getPalette().then(palette=>{

        const dark=palette.DarkVibrant || palette.Vibrant;
        const light=palette.LightVibrant || palette.Muted;
        const muted=palette.Muted || palette.DarkMuted;

        const c1=light.rgb.join(",");
        const c2=dark.rgb.join(",");
        const c3=muted.rgb.join(",");

        card.style.setProperty(

            "--card-gradient",

            `linear-gradient(
            135deg,
            rgba(${c1},.90),
            rgba(${c2},.85),
            rgba(${c3},.95)
            )`

        );

        card.style.boxShadow =

`
0 20px 40px rgba(${c2},.28),

0 0 35px rgba(${c1},.18),

inset 0 1px 0 rgba(255,255,255,.15)
`;

    });

});

</script>

</body>
</html>