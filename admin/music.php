<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Luxury Gallery Music</title>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<style>

body{

    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    font-family:Poppins,sans-serif;

    background:
    radial-gradient(circle at top,#3b82f620,transparent 35%),
    radial-gradient(circle at bottom right,#06b6d420,transparent 35%),
    linear-gradient(135deg,#030712,#0f172a,#111827);

    overflow-x:hidden;
    overflow-y:auto;

}




.music-player{


    width:400px;

    padding:25px;

    border-radius:25px;


    background:

    linear-gradient(

    145deg,

    rgba(255,255,255,.15),

    rgba(255,255,255,.05)

    );


    backdrop-filter:blur(20px);


    border:1px solid rgba(255,255,255,.15);


    box-shadow:

    0 20px 50px rgba(0,0,0,.5);


    color:white;


}





.music-header{


    text-align:center;

}



.music-header i{


    font-size:45px;

    color:#38bdf8;


}



.music-header h3{


    margin-top:10px;

    font-size:20px;


}



.song-name{


    text-align:center;

    margin:15px 0;

    color:#cbd5e1;

}





.controls{


    display:flex;

    justify-content:center;

    gap:12px;


}



.controls button{


    width:45px;

    height:45px;


    border-radius:50%;


    border:none;


    background:#38bdf8;


    color:white;


    font-size:20px;


    cursor:pointer;


    transition:.3s;


}



.controls button:hover{


    transform:scale(1.15);

    background:#0284c7;


}




input[type="range"]{


    width:100%;


}





.time{


    display:flex;

    justify-content:space-between;

    font-size:13px;

    color:#cbd5e1;


}



.playlist{


    margin-top:20px;


}



.playlist div{


    padding:10px;

    margin:6px 0;

    background:rgba(255,255,255,.08);

    border-radius:10px;

    cursor:pointer;


}



.playlist div:hover{


    background:#0284c7;


}

.blob{

position:fixed;

border-radius:50%;

filter:blur(120px);

z-index:-1;

animation:floatBlob 12s ease-in-out infinite;

}

.one{

width:300px;
height:300px;

background:#2563eb;

top:-80px;
left:-80px;

}

.two{

width:250px;
height:250px;

background:#06b6d4;

bottom:-80px;
right:-60px;

animation-delay:2s;

}

.three{

width:200px;
height:200px;

background:#9333ea;

top:45%;
left:55%;

animation-delay:5s;

}

@keyframes floatBlob{

0%,100%{

transform:translateY(0) scale(1);

}

50%{

transform:translateY(-35px) scale(1.1);

}

}

.music-player{

width:440px;

padding:35px;

border-radius:32px;

background:rgba(255,255,255,.08);

backdrop-filter:blur(35px);

border:1px solid rgba(255,255,255,.15);

box-shadow:

0 30px 80px rgba(0,0,0,.55),

inset 0 1px 0 rgba(255,255,255,.25);

overflow:hidden;

position:relative;

}

.music-player::before{

content:"";

position:absolute;

left:-150px;

top:-150px;

width:300px;
height:300px;

border-radius:50%;

background:

radial-gradient(circle,

rgba(56,189,248,.25),

transparent);

filter:blur(40px);

}

.music-header i{

font-size:60px;

color:#38bdf8;

text-shadow:

0 0 20px #38bdf8,

0 0 50px #38bdf8;

animation:pulse 3s infinite;

}

@keyframes pulse{

50%{

transform:scale(1.08);

}

}

.album{

width:180px;
height:180px;

margin:auto;

border-radius:50%;

overflow:hidden;

box-shadow:

0 20px 60px rgba(0,0,0,.5);

animation:rotateAlbum 25s linear infinite;

}

.album img{

width:100%;
height:100%;

object-fit:cover;

}

@keyframes rotateAlbum{

from{

transform:rotate(0deg);

}

to{

transform:rotate(360deg);

}

}


.controls button{

width:58px;

height:58px;

border-radius:50%;

background:

linear-gradient(180deg,

#38bdf8,

#0284c7);

box-shadow:

0 10px 30px rgba(56,189,248,.45);

transition:.35s;

}

.controls button:hover{

transform:

translateY(-6px)

scale(1.08);

}


.playlist div{

padding:14px;

border-radius:16px;

margin:10px 0;

background:rgba(255,255,255,.06);

transition:.35s;

}

.playlist div:hover{

transform:translateX(10px);

background:#0ea5e9;

}

input[type=range]{

accent-color:#38bdf8;

height:7px;

}

.music-player{

animation:show .8s ease;

}

@keyframes show{

from{

opacity:0;

transform:

translateY(40px)

scale(.95);

}

to{

opacity:1;

transform:

translateY(0)

scale(1);

}

}


</style>


</head>



<body>

    <?php
include("templates/footer.php");
?>



<div class="blob one"></div>
<div class="blob two"></div>
<div class="blob three"></div>

<div class="music-player mt-[100px] mb-[40px]">

    <div class="album">
        <img src="image/Art (40).jpg">
    </div>

    <div class="music-header">
        <i class="bi bi-music-note-beamed"></i>
        <h3>Gallery Music</h3>
    </div>

    <video id="music" style="display:none"></video>

    <div class="song-name" id="songName">
        Relax Music
    </div>

    <div class="controls">

        <button onclick="previousSong()">
            <i class="bi bi-skip-backward-fill"></i>
        </button>

        <button id="playBtn">
            <i class="bi bi-play-fill"></i>
        </button>

        <button onclick="nextSong()">
            <i class="bi bi-skip-forward-fill"></i>
        </button>

    </div>

    <input
        type="range"
        id="progress"
        value="0"
        min="0"
        max="100">

    <div class="time">
        <span id="current">0:00</span>
        <span id="duration">0:00</span>
    </div>

    <br>

    <label>🔊 Volume</label>

    <input
        type="range"
        id="volume"
        min="0"
        max="1"
        step="0.01"
        value="0.5">

    <div class="playlist">

        <h5>Playlist</h5>

        <div onclick="changeSong(0)">🎵 Relax Music</div>

        <div onclick="changeSong(1)">🎹 Piano</div>

        <div onclick="changeSong(2)">🌿 Nature Sound</div>

    </div>

</div>






<script>



const music = document.getElementById("music");


const songs=[


{

name:"Relax Music",

file:"./music/relax.mp4"

},


{

name:"Piano",

file:"./music/piano.mp4"

},


{

name:"Nature Sound",

file:"./music/nature.mp4"

}


];



let index=0;




const songName=document.getElementById("songName");

const progress=document.getElementById("progress");

const volume=document.getElementById("volume");

const current=document.getElementById("current");

const duration=document.getElementById("duration");

const playBtn=document.getElementById("playBtn");





loadSong();





function loadSong(){


music.src=songs[index].file;


songName.innerHTML=songs[index].name;



}





function playMusic(){


music.play();


playBtn.innerHTML=

'<i class="bi bi-pause-fill"></i>';


}




function pauseMusic(){


music.pause();


playBtn.innerHTML=

'<i class="bi bi-play-fill"></i>';

}




playBtn.onclick=function(){


if(music.paused){

playMusic();

}

else{

pauseMusic();

}


};






function nextSong(){


index++;


if(index>=songs.length)

index=0;



loadSong();

playMusic();


}





function previousSong(){


index--;


if(index<0)

index=songs.length-1;



loadSong();

playMusic();


}





function changeSong(number){


index=number;


loadSong();


playMusic();


}





volume.oninput=function(){


music.volume=this.value;


}





music.addEventListener("timeupdate",()=>{


progress.value=

(music.currentTime/music.duration)*100;


current.innerHTML=

formatTime(music.currentTime);



});





music.addEventListener("loadedmetadata",()=>{


duration.innerHTML=

formatTime(music.duration);


});





progress.oninput=function(){


music.currentTime=

(this.value/100)*music.duration;


}





music.onended=function(){


nextSong();


}





function formatTime(time){


let min=Math.floor(time/60);


let sec=Math.floor(time%60);



if(sec<10)

sec="0"+sec;



return min+":"+sec;


}



</script>
    <?php
include("templates/header.php");
?>

</body>

</html>