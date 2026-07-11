<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./gallaryStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>




        <?php 
    include("templates/header.php");
    ?>
    <div class="modal fade" id="paintingModal">
    
    <div class="modal-dialog modal-xl">
    
    <div class="modal-content bg-dark text-white">
    
    <div class="modal-header">
    
    <h4 id="modalTitle"></h4>
    
    <button class="btn-close btn-close-white"
    data-bs-dismiss="modal"></button>
    
    </div>
    
    <div class="modal-body">
    
    <div class="row">
    
    <div class="col-md-6">
    
    <img id="modalImage"
    class="img-fluid rounded shadow">
    
    </div>
    
    <div class="col-md-6">
    
    <h3 id="modalArtist"></h3>
    
    <hr>
    
    <p><strong>Year:</strong>
    <span id="modalYear"></span></p>
    
    <p><strong>Size:</strong>
    <span id="modalSize"></span></p>
    
    <p><strong>Technique:</strong>
    <span id="modalTechnique"></span></p>
    
    <p><strong>Price:</strong>
    <span id="modalPrice"></span></p>
    
    <p id="modalDescription"></p>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>

    <div class="posts-list w-100  p-5">
    <div class="post-list">
        <div class="container mt-4">
            <?php
            include("./connect.php");
            

            $gallery = [];

            $sql = "SELECT * FROM paintings ORDER BY id ASC";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($result)){

            $row["image"] = "image/" . $row["image"];

            $gallery[] = $row;

            }

            ?>

<!-- Gallary Slidshow -->



<div class="arrow left">
&#10094;
</div>

<div class="arrow right">
&#10095;
</div>

<div class="gallery">

<div class="sideFrame">
<img src="https://picsum.photos/id/1015/400/600">
</div>

<div class="center">

<div class="counter" style="margin-top: 4px; font-size: 18px; color: #cbd5e1; text-align: center;">



</div>

<div class="frame">

<img id="mainImage" src="https://picsum.photos/id/1018/900/600">

</div>

<button class="selectBtn" style="color:darkgray; text-bold; font-size: 18px; padding: 10px 20px; border-radius: 5px;  border: none; cursor: pointer;">

SELECT

</button>

</div>

<div class="sideFrame">

<img src="https://picsum.photos/id/1016/400/600">

</div>

</div>

<div class="footer">


</div>

<script>


let current = 0;

const image = document.getElementById("mainImage");
const counter = document.querySelector(".counter");

const leftFrame=document.querySelectorAll(".sideFrame img")[0];
const rightFrame=document.querySelectorAll(".sideFrame img")[1];

function updateGallery(){

image.style.opacity=0;
image.style.transform="scale(.9)";

setTimeout(()=>{

image.src=paintings[current].image;

counter.innerHTML=`${current+1}/${paintings.length}`;

let prev=current-1;
if(prev<0) prev=paintings.length-1;

let next=current+1;
if(next>=paintings.length) next=0;

leftFrame.src=paintings[prev].image;
rightFrame.src=paintings[next].image;

image.style.opacity=1;
image.style.transform="scale(1)";

},250);

}

document.querySelector(".left").onclick=()=>{

current--;

if(current<0){

current=paintings.length-1;

}

updateGallery();

};

document.querySelector(".right").onclick=()=>{

current++;

if(current>=paintings.length){

current=0;

}

updateGallery();

};

updateGallery();

document.addEventListener("keydown",(e)=>{

if(e.key==="ArrowLeft"){

document.querySelector(".left").click();

}

if(e.key==="ArrowRight"){

document.querySelector(".right").click();

}

});

// Auto Slide
setInterval(()=>{

current++;

if(current>=paintings.length){

current=0;

}

updateGallery();

},5000);


//  Hover Effect mousemove 
const frame=document.querySelector(".frame");

document.addEventListener("mousemove",(e)=>{

let x=(window.innerWidth/2-e.clientX)/40;

let y=(window.innerHeight/2-e.clientY)/40;

frame.style.transform=`rotateY(${x}deg) rotateX(${-y}deg)`;

});


//  Fetch Data from PHP to JS
const paintings = <?php echo json_encode($gallery); ?>;

const selectBtn = document.querySelector(".selectBtn");

selectBtn.addEventListener("click",()=>{

const painting = paintings[current];

document.getElementById("modalTitle").innerHTML = painting.title;

document.getElementById("modalArtist").innerHTML = painting.artist;

document.getElementById("modalYear").innerHTML = painting.year;

document.getElementById("modalSize").innerHTML = painting.size;

document.getElementById("modalTechnique").innerHTML = painting.technique;

document.getElementById("modalPrice").innerHTML = painting.price;

document.getElementById("modalDescription").innerHTML = painting.description;

document.getElementById("modalImage").src = painting.image;

new bootstrap.Modal(document.getElementById("paintingModal")).show();

});




</script>

    <?php 
    include("templates/footer.php");
    ?>


</body>
</html>