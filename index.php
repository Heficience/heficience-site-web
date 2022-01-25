<!--
=========================================================
* Material Kit 2 - v3.0.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<?php
/**
 * ===================================================
 * DATA DE L'APPLICATION
 * ===================================================
 **/
$data = [
    'Menu' => ["3JvDvhu", "3JvFEtm", "3qEPLnj", "3r2yaFJ", "31GIhYo", "3HLwyqL"],
    'App'  => ["3jhxM3H", "31brKLP"],
    'DVK'  => ["3sGYwjj", "3JwemD4"]

];
$configs = include('./pages/config.php');
$token = $configs['token'];
/**
 * ===================================================
 * FUNCTION PRINCIPALS
 * ===================================================
 **/
function countClicksMonth($bitlyCode)
{
    $url = "https://api-ssl.bitly.com/v4/bitlinks/bit.ly/$bitlyCode/clicks/summary";
    global $token;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . $token,
        "Content-Type: application/json"
    ]);

    $data = curl_exec($ch);
    curl_close($ch);

    $arr_result = json_decode($data);
    return $arr_result->total_clicks;
}

function getCountTableName($tableName)
{
    $count = 0;
    global $data;

    foreach ($data[$tableName] as $clicks) {
        $count += countClicksMonth($clicks);
    }
    echo $count;
}
?>
<!DOCTYPE html>
<html lang="fr" itemscope>

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="./assets/img/favicon.png">

    <title>
     Heficience
    </title>
    <meta name="keywords" content="handicap" />
    <meta name="description" content="Un groupe de développeurs créé pour aider les personnes en situation de handicap en développant des applications pour ordinateur ou mobile." />
    <meta name="author" content="Heficience" />
    <meta property="og:title" content="Découvrez Heficience !" />
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:image" content="https://heficience.com/assets/img/Carte-og.png" />
    <meta property="og:description" content="Un groupe de développeurs créé pour aider les personnes en situation de handicap en développant des applications pour ordinateur ou mobile." />
    <meta property="og:url" content="https://www.heficience.com/" />
    <meta name="theme-color" content="#38a3a5" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@heficience" />
    <meta name="twitter:title" content="Découvrez Heficience !" />
    <meta name="twitter:description" content="Un groupe de développeurs créé pour aider les personnes en situation de handicap en développant des applications pour ordinateur ou mobile." />
    <meta name="twitter:image" content="https://heficience.com/assets/img/Carte-Twitter.png" />
    <meta name="twitter:image:alt" content="Heficience Logo" />
<!--     Fonts and icons     -->
<link rel="styleshesvet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

<!-- Nucleo Icons -->
<link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="./assets/js/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- CSS Files -->
<link id="pagestyle" href="./assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />

<!-- Cookies -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />

</head>

<body class="index-page bg-gray-200">


  <!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
<nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
  <div class="container-fluid px-0">
    <a class="navbar-brand font-weight-bolder ms-sm-3" href="index.php" rel="tooltip" title="Heficience" data-placement="bottom">
      Heficience
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
      <ul class="navbar-nav navbar-nav-hover ms-auto">
        <li class="nav-item dropdown dropdown-hover mx-2">
          <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="material-icons opacity-6 me-2 text-md">dashboard</i>
            Pages
            <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
          </a>
          <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
            <div class="d-none d-lg-block">
  <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
    Nos Pages à parcourir
  </h6>
  <a href="index.php" class="dropdown-item border-radius-md">
    <span>Accueil</span>
  </a>
  <a href="./pages/reference.html" class="dropdown-item border-radius-md">
    <span>Nos Projets en Cours</span>
  </a>
  <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
    <span>À propos de nous</span>
  </a>
  <a href="pages/contact-us.php" class="dropdown-item border-radius-md">
    <span>Nous contacter</span>
  </a>
  <a href="pages/author.php" class="dropdown-item border-radius-md">
    <span>Auteur de la page</span>
  </a>
</div>

<div class="d-lg-none">
  <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
    Nos Pages à parcourir
  </h6>

  <a href="index.php" class="dropdown-item border-radius-md">
    <span>Accueil</span>
  </a>
  <a href="./pages/reference.html" class="dropdown-item border-radius-md">
    <span>Nos Projets en Cours</span>
  </a>
  <a href="./pages/about-us.html" class="dropdown-item border-radius-md">
    <span>À propos de nous</span>
  </a>
  <a href="pages/contact-us.php" class="dropdown-item border-radius-md">
    <span>Nous contacter</span>
  </a>
  <a href="pages/author.php" class="dropdown-item border-radius-md">
    <span>Auteur de la page</span>
  </a>

</div>

          </div>
        </li>
        <li class="nav-item ms-lg-auto">
          <a class="nav-link nav-link-icon me-2" href="https://github.com/heficience" target="_blank">
            <i class="fa fa-github me-1"></i>
            <p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Star us on Github">Github</p>
          </a>
        </li>
        <li class="nav-item my-auto ms-3 ms-lg-0">

          <a href="https://discord.gg/2dxKDJ2RNK" class="btn btn-sm  bg-gradient-success  mb-0 me-1 mt-2 mt-md-0">Rejoignez nous</a>

        </li>
      </ul>
    </div>
  </div>
</nav>
</div></div></div>
  <!-- End Navbar -->


<header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url('./assets/img/bg1.svg')">
    <span class="mask bg-gradient-success opacity-4"></span>
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">Heficience</h1>
          <p class="lead text-white mt-3">Un groupe de développeurs créé pour aider les personnes en situation de handicap en développant des applications pour ordinateur ou mobile. </p>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

<section class="pt-3 pb-4" id="count-stats">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mx-auto py-3">
        <div class="row">
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
                <h1 class="text-gradient text-success"><span id="state1" countTo="<?php getCountTableName("Menu"); ?>">0</span></h1>
              <h5 class="mt-3">Téléchargements ce mois de Heficience Menu</h5>
              <p class="text-sm font-weight-normal">Une nouvelle façon d'utiliser votre ordinateur (sous macOS, sous Windows ou Linux)</p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
                <h1 class="text-gradient text-success"><span id="state2" countTo="<?php getCountTableName("App"); ?>">0</span></h1>
              <h5 class="mt-3">Téléchargements ce mois de Heficience EasyPhone</h5>
              <p class="text-sm font-weight-normal">Une application Android qui est conçue pour aider les gens éloignés de l'utilisation des smartphones</p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4">
            <div class="p-3 text-center">
                <h1 class="text-gradient text-success"><span id="state3" countTo="<?php getCountTableName("DVK"); ?>">0</span></h1>
              <h5 class="mt-3">Téléchargements ce mois de Heficience DVKBuntu</h5>
              <p class="text-sm font-weight-normal">Deux distributions Linux avec plusieurs outils d'accessibilité pour les personnes en situation de handicap.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="my-5 py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
        <div class="card-container">
          <div class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
            <div class="front front-background" style="background-image: url(https://images.unsplash.com/photo-1498889444388-e67ea62c464b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1365&q=80); background-size: cover; border-radius: 12px;">
              <div class="card-body py-7 text-center">
                <i class="material-icons text-white text-4xl my-3">touch_app</i>
                <h3 class="text-white">Envie de tester nos applications ?</h3>
                <a href="./pages/reference.html" class="btn btn-white btn-sm w-50 mx-auto mt-3">Télécharger</a><br>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 ms-auto">
        <div class="row justify-content-start">
          <div class="col-md-6">
            <div class="info">
              <i class="material-icons text-gradient text-success text-3xl">content_copy</i>
              <h5 class="font-weight-bolder mt-3">Nous écrivons de la documentation</h5>
              <p class="pe-5">Pour vous aider à utiliser nos logiciels.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info">
              <i class="material-icons text-gradient text-success text-3xl">flip_to_front</i>
              <h5 class="font-weight-bolder mt-3">Nous voulons vous proposer des solutions logicielles clés en mains</h5>
              <p class="pe-3">Nous utilisons les langages informatiques les plus connus pour assurer la meilleure continuité de service possible :<br> C++ Python Javascript, etc.</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-start mt-5">
          <div class="col-md-6 mt-3">
            <i class="material-icons text-gradient text-success text-3xl">price_change</i>
            <h5 class="font-weight-bolder mt-3">Économisez sur le coût de vos équipements informatiques</h5>
            <p class="pe-5">En effet, nous développons nos logiciels sous licence open source et nous vous les distribuons gratuitement.</p>
          </div>
          <div class="col-md-6 mt-3">
            <div class="info">
              <i class="material-icons text-gradient text-success text-3xl">devices</i>
              <h5 class="font-weight-bolder mt-3">Nous sommes présent sous mobile et ordinateur</h5>
              <p class="pe-3">Nous avons une application en C++ pour windows, mac et linux, et nous avons une application android à terminer (un développeur kotlin serait accueillis comme il se doit par notre équipe de bénévoles).</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<footer class="footer pt-5 mt-5">
  <div class="container">
    <div class=" row">
      <div class="col-md-3 mb-4 ms-auto">
        <div>
          <a href="index.php">
            <img src="./assets/img/favicon.png" class="mb-3 footer-logo" alt="main_logo">
          </a>
          <h6 class="font-weight-bolder mb-4">Heficience</h6>
        </div>
        <div>
          <ul class="d-flex flex-row ms-n3 nav">
            <li class="nav-item">
              <a class="nav-link pe-1" href="https://www.facebook.com/Heficience" target="_blank">
                <i class="fab fa-facebook text-lg opacity-8"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link pe-1" href="https://www.tiktok.com/@heficience" target="_blank">
                <i class="fab fa-tiktok text-lg opacity-8"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link pe-1" href="https://twitter.com/heficience" target="_blank">
                <i class="fab fa-twitter text-lg opacity-8"></i>
              </a>
            </li>


            <li class="nav-item">
              <a class="nav-link pe-1" href="https://discord.gg/2dxKDJ2RNK" target="_blank">
                <i class="fab fa-discord text-lg opacity-8"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link pe-1" href="https://github.com/Heficience" target="_blank">
                <i class="fab fa-github text-lg opacity-8"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-6 mb-4">
        <div>
          <h6 class="text-sm">Qui Sommes Nous</h6>
          <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
              <a class="nav-link" href="./pages/about-us.html">
                À propos de nous
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="./pages/reference.html">
                Nos solutions libres et open source
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-6 mb-4">
        <div>
          <h6 class="text-sm">Aides et Support</h6>
          <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
              <a class="nav-link" href="pages/contact-us.php">
                Nous contacter
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="https://github.com/Heficience" target="_blank">
                Toutes les sources de nos logiciels.
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="https://github.com/Heficience" target="_blank">
                Signaler des issues<br>
                (des rapports de problèmes).
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
        <div>
          <h6 class="text-sm">Légal</h6>
          <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
              <a class="nav-link" href="./pages/legal.html">
                Mentions Légales et<br>
                Politique de Confidentialité
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="https://github.com/Heficience/Heficience-menu/blob/main/LICENSE%20GPL.md" target="_blank">
                Licence de nos logiciels.
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-12">
        <div class="text-center">
          <p class="text-dark my-4 text-sm font-weight-normal">
            All rights reserved. Copyright © <script>document.write(new Date().getFullYear())</script> Material Kit by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>. Ainsi que © <script>document.write(new Date().getFullYear())</script> <a href="https://www.heficience.com">Heficience</a><br>
            Distributed By: <a href="https://www.themewagon.com" target="_blank">ThemeWagon</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>


<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>

<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="./assets/js/plugins/countup.min.js"></script>

<script src="./assets/js/plugins/choices.min.js"></script>

<script src="./assets/js/plugins/prism.min.js"></script>
<script src="./assets/js/plugins/highlight.min.js"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="./assets/js/plugins/rellax.min.js"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="./assets/js/plugins/tilt.min.js"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="./assets/js/plugins/choices.min.js"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="./assets/js/plugins/parallax.min.js"></script>











<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="./assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>

<script type="text/javascript">
    function functionName() {
        if (document.getElementById('state1')) {
            const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
            if (!countUp.error) {
                countUp.start();
            } else {
                console.error(countUp.error);
            }
        }
        if (document.getElementById('state2')) {
            const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
            if (!countUp1.error) {
                countUp1.start();
            } else {
                console.error(countUp1.error);
            }
        }
        if (document.getElementById('state3')) {
            const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
            if (!countUp2.error) {
                countUp2.start();
            } else {
                console.error(countUp2.error);
            }
        }
    }
    document.onload = functionName();
</script>

  <!-- Cookies -->
  <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
  <script>
      window.cookieconsent.initialise({
          "palette": {
              "popup": {
                  "background": "#72bd84"
              },
              "button": {
                  "background": "#467661"
              }
          },
          "theme": "classic",
          "position": "bottom-right",
          "content": {
              "message": "Ce site web utilise des cookies afin de vous proposer une meilleure expérience de navigation.",
              "dismiss": "OK",
              "link": "En savoir plus...",
              "href": "http://heficience.com/pages/legal.html"
          }
      });
  </script>

</body>

</html>
