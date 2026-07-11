<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Luxury Gallery Music</title>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<style>


body{

    background:#0f172a;

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    font-family:Poppins, sans-serif;

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




</style>


</head>



<body>

    <?php
include("templates/footer.php");
?>



<div class="music-player mt-[100px] " >



<div class="music-header">


<i class="bi bi-music-note-beamed"></i>


<h3>
Gallery Music
</h3>


</div>




<video id="music" style="display:none"></video>




<div class="song-name" id="songName">

Relax Music

</div>





<div class="controls">


<button onclick="previousSong()">

<i class="bi bi-skip-backward-fill"></i>

</button>



<button onclick="playMusic()" id="playBtn">

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


<span id="current">

0:00

</span>



<span id="duration">

0:00

</span>


</div>





<br>


<label>

🔊 Volume

</label>


<input

type="range"

id="volume"

min="0"

max="1"

step="0.01"

value="0.5"

>




<div class="playlist">


<h5>

Playlist

</h5>



<div onclick="changeSong(0)">
🎵 Relax Music
</div>



<div onclick="changeSong(1)">
🎹 Piano
</div>



<div onclick="changeSong(2)">
🌿 Nature Sound
</div>



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