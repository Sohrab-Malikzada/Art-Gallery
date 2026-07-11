<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Glass UI</title>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="btn.css">

</head>



<body class="bg-[#eef1f5] min-h-screen">
<div class="container mx-auto flex justify-center items-center min-h-screen">

<div class="container flex flex-wrap justify-center gap-8">

<button class="glass-btn glass-primary"><span>Primary</span></button>

<button class="glass-btn glass-success"><span>Success</span></button>

<button class="glass-btn glass-danger"><span>Danger</span></button>

<button class="glass-btn glass-warning"><span>Warning</span></button>

<button class="glass-btn glass-info"><span>Info</span></button>

<button class="glass-btn glass-dark"><span>Dark</span></button>

<button class="glass-btn glass-light"><span>Light</span></button>

</div>

    <button class="glass-btn glass-orange">

        <span>Start Project</span>

    </button>

</div>
  <div class="container mx-auto min-h-screen flex flex-wrap justify-center items-center gap-8">

    <button class="glass-btn glass-orange">
        <span>Start project</span>
    </button>

    <button class="glass-btn glass-blue">
        <span>Secondary</span>
    </button>

  </div>

  <button class="power-btn">

    <div class="power-glow"></div>

    <div class="power-ring">

        <svg
            width="42"
            height="42"
            viewBox="0 0 24 24"
            fill="none">

            <path
                d="M12 2V12"
                stroke="white"
                stroke-width="2.4"
                stroke-linecap="round"/>

            <path
                d="M7.5 5.8
                C4.8 7.4 3 10.4 3 13.8
                C3 18.3 6.7 22 12 22
                C17.3 22 21 18.3 21 13.8
                C21 10.4 19.2 7.4 16.5 5.8"
                stroke="white"
                stroke-width="2.4"
                stroke-linecap="round"/>

        </svg>

    </div>

  </button>
</body>

</html>