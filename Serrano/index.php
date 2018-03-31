<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Serrano test</title>
  <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css?v=1.0">
</head>

<body>
  <div class="container-fluid">
  <img class="logo" src="./img/logo.png" alt="">

    <nav class="navbar navbar-expand-lg mt-1">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" style="background-color: white">
        <span>Meniu</span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto" style="margin-right: 20%">
          <li class="nav-item"><a class="navi nav-link" href="#" ba="pizza">Picos</a></li>
          <li class="nav-item"><a class="navi nav-link" href="#" ba="salad">Salotos</a></li>
          <li class="nav-item"><a class="navi nav-link" href="#" ba="rolls">Roletai</a></li>
          <li class="nav-item"><a class="navi nav-link" href="#" ba="other">Kiti Patiekalai</a></li>
        </ul>
      </div>
    </nav>

    <div class="row mt-2 justify-content-md-center">
      <section class="col-lg-6 mr-2">
        <div class="row wrapper">
          <div class="col-sm-12 food-pic np" id="food-wrapper">
            <img class="img-wrap" src="./img/map.png" id="first_img_wrap" alt="">
          </div>
        </div>
        <div class="row info">
          <div class="col-lg-9 ingridients_div">
          </div>
          <div class="col-lg-3 price_div">
          </div>
        </div>
      </section>
      <aside class="col-lg-2">
      </aside>
    </div>
    <footer class="row mt-2 ml-1 mr-1">
      <div class="col-lg-6 col-sm-3 social text-center">
          <a target="_blank" href="https://www.facebook.com/Serrano-picerija-544672549033066/">
            <img class="social_icon" src="./img/fb.png" alt="fb_icon">
            <span class="social_icon_text">Sekite mus Facebook</span>
          </a>
      </div>
      <div class="col-lg-6 col-sm-9">
        <div class="row contacts">
          <div class="col-lg-5 text-center">
            <a style="text-decoration: none; color: white" target="_blank" href="https://www.google.lt/maps/place/54%C2%B055'04.6%22N+23%C2%B058'02.5%22E/@54.9179665,23.9586162,2060m/data=!3m2!1e3!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d54.9179546!4d23.9673708?hl=en">
              <p>Mūsų adresas:</p>
              <p> V.Krėvės pr. 43, Kaunas</p>
            </a>
          </div>
          <div class="col-lg-1">
            <svg class="svg-phone" fill="white" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
              <g><path d="M647,656.8c0,0-41.7-28-87.6,18.8c0,0-37.8,42-79.5-11.6c0,0-115.2-126.5-150.7-268c0,0-8.6-24.9,23.9-30.1c0,0,87.6-18.8,98.1-58.3L398.9,39.5c0,0-15.8-48.9-77-20.7c0,0-104.6,26.7-150.5,71.7l-8.5,19.3l-9.4,75.5c0,0,4.9,511.3,447.6,798c0,0,151.6,46.6,234.8-106.2l10.6-39.5L647,656.8z"/></g>
            </svg>
          </div>
          <div class="col-lg-5">
            <span class="teleph"><a style="text-decoration: none; color: white" href="tel:+37060000000">860000000</a></span>
          </div>
        </div>

      </div>
    </footer>
  </div>
  <script type="text/javascript" src="./libs/jQuery/jquery-3.2.1.min.js" defer></script>
  <script type="text/javascript" src="./libs/bootstrap/js/bootstrap.min.js" defer></script>
  <script type="text/javascript" src="./js/script.js" defer></script>
</body>

</html>
