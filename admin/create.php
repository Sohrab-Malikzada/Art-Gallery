<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">

</head>

<style>

/* Image Styles */



body{
font-family:Inter,sans-serif;
background:linear-gradient(135deg,#eef1f5,#dfe8f5);
min-height:100vh;
}

.create-form{
background:rgba(255,255,255,.25);
backdrop-filter:blur(25px);
-webkit-backdrop-filter:blur(25px);
border:1px solid rgba(255,255,255,.6);
border-radius:28px;
box-shadow:0 20px 45px rgba(0,0,0,.12),inset 0 2px 8px rgba(255,255,255,.9),inset 0 -4px 8px rgba(0,0,0,.08);
margin:40px auto;

position:relative;
overflow:hidden;
}
.create-form::before{
content:"";
position:absolute;left:8px;right:8px;top:8px;height:40%;
border-radius:24px;
background:linear-gradient(180deg,rgba(255,255,255,.60),rgba(255,255,255,.35),transparent);
pointer-events:none;
}
.form-label{
font-weight:600;
    color:#111827;
margin-bottom:.6rem;
}
.form-control{
background:rgba(255,255,255,.35)!important;
border:1px solid rgba(255,255,255,.7)!important;
border-radius:18px!important;
min-height:56px;
backdrop-filter:blur(15px);
box-shadow:inset 0 2px 6px rgba(255,255,255,.9), inset 0 -2px 6px rgba(0,0,0,.05);
transition:.3s;
padding:14px 18px;
}
textarea.form-control{min-height:160px;resize:vertical;}
.form-control:focus{
background:rgba(255,255,255,.45)!important;
border-color:#3b82f6!important;
box-shadow:0 0 0 .25rem rgba(59,130,246,.18), inset 0 2px 6px rgba(255,255,255,.9)!important;
}
input[type=file].form-control{
padding:12px;
cursor:pointer;
}
input[type=file]::file-selector-button{
border:none;
padding:10px 18px;
border-radius:12px;
margin-right:12px;
color:#fff;
background:linear-gradient(180deg,#60a5fa,#2563eb);
}
.btn{
border:none;
border-radius:999px;
padding:14px 34px;
font-weight:600;
transition:.35s;
}
.btn-primary{
background:linear-gradient(180deg,#93c5fd,#3b82f6,#2563eb);
box-shadow:0 18px 35px rgba(37,99,235,.35), inset 0 2px 8px rgba(255,255,255,.8);
}
.btn-primary:hover{
transform:translateY(-3px);
box-shadow:0 24px 45px rgba(37,99,235,.45), inset 0 2px 8px rgba(255,255,255,.8);
}
@media(max-width:768px){
.create-form{margin:20px 15px;padding:22px!important}
.form-control{min-height:50px}
}


/* perfect */
body{
    font-family:Inter,sans-serif;
    background:#eef3fb;
    overflow-x:hidden;
    position:relative;
    min-height:100vh;
}

.bg-circle{
    position:fixed;
    border-radius:50%;
    filter:blur(120px);
    z-index:-1;
}

.one{
    width:350px;
    height:350px;
    background:#6ea8fe;
    top:-100px;
    left:-120px;
}

.two{
    width:300px;
    height:300px;
    background:#ff7eb3;
    right:-120px;
    top:150px;
}

.three{
    width:300px;
    height:300px;
    background:#84fab0;
    bottom:-100px;
    left:40%;
}


.upload-box{

display:block;

padding:45px;

border:3px dashed #7aa8ff;

border-radius:25px;

text-align:center;

cursor:pointer;

background:white;

transition:.4s;

}

.upload-box:hover{

background:#f4f8ff;

transform:scale(1.02);

}

.btn-primary{

background:linear-gradient(135deg,#2563eb,#7c3aed);

font-size:18px;

position:relative;

overflow:hidden;

}

.btn-primary:before{

content:"";

position:absolute;

left:-100%;

top:0;

width:100%;

height:100%;

background:rgba(255,255,255,.25);

transform:skewX(-25deg);

transition:.6s;

}

.btn-primary:hover:before{

left:120%;

}


.create-form{

transition:.5s;

}

.create-form:hover{

transform:translateY(-6px);

box-shadow:0 30px 80px rgba(0,0,0,.18);

}

.painting-form{
    margin-top:100px;
}

.form-container{
    margin-top:100px;
}
</style>

<body>
    <?php
include("templates/header.php");
?>


<script>

const image=document.querySelector("input[name=image]");

const preview=document.getElementById("preview");

image.onchange=e=>{

const file=e.target.files[0];

if(file){

preview.src=URL.createObjectURL(file);

}

}


const txt=document.querySelector("textarea");

const count=document.getElementById("count");

txt.oninput=()=>{

count.innerHTML=txt.value.length;

}

const form=document.querySelector("form");

form.onsubmit=function(){

const btn=document.querySelector(".btn-primary");

btn.innerHTML="Uploading...";

btn.disabled=true;

}

</script>


<!-- Gallary Start -->


<main class="form-container">
<div class="create-form  w-100 mt-10 mx-auto p-4" style="max-width:700px;">

<form  action="./addPainting.php" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label class="form-label" style="color:black;">Painting Title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter Painting Title" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Artist</label>
        <input type="text" name="artist" class="form-control" placeholder="Enter Artist Name" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Year</label>
        <input type="number" name="year" class="form-control" placeholder="2026" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Size</label>
        <input type="text" name="size" class="form-control" placeholder="80 × 120 cm" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Technique</label>
        <input type="text" name="technique" class="form-control" placeholder="Oil on Canvas" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" name="price" class="form-control" placeholder="$1200" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="6" placeholder="Painting Description" required></textarea>
    </div>

    <div class="mb-4">
        <label class="form-label">Painting Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>

    <div class="text-center">
        <input type="submit" name="create" value="Add Painting" class="btn btn-primary px-5">
    </div>

</form>
</div>
</main>
<!-- Gallary end -->


        <?php
include("templates/footer.php");
?>

</body>
</html>
