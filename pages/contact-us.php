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

if (isset($_POST["submit"])) {
    $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW);
    $configs = include('config.php');
    $url = $configs['url'];
    $messageWarning = "";
    $colorMessageWarning = "white";
    $nameTextAdded = "";
    $nameLabelColor = "";
    $emailTextAdded = "";
    $emailLabelColor = "";
    $MessageTextAdded = "";
    $messageLabelColor = "";
    if (!empty($name) and !empty($email) and !empty($message)) {
        $timeStamp = date('Y-m-d\TH:i:sO');

        $name_title = "**Nom : **" . $name;
        $description =  "**Email : **" . $email . "\n**Message : **" . $message;
        $hookObject = json_encode([
            /*
             * The general "message" shown above your embeds
             */
            "content" => "@here",
            /*
             * The username shown in the message
             */
            "username" => "Nouveau Message venant du Site Web",
            /*
             * The image location for the senders image
             */
            "avatar_url" => "https://pbs.twimg.com/profile_images/1466389663942381576/mhpFgjFd_400x400.png",
            /*
             * Whether or not to read the message in Text-to-speech
             */
            "tts" => false,
            /*
             * File contents to send to upload a file
             */
            // "file" => "",
            /*
             * An array of Embeds
             */
            "embeds" => [
                /*
                 * Our first embed
                 */
                [
                    // Set the title for your embed
                    "title" => $name_title,

                    // The type of your embed, will ALWAYS be "rich"
                    "type" => "rich",

                    // A description for your embed
                    "description" => $description,

                    // The URL of where your title will be a link to
                    "url" => "https://www.heficience.com/",

                    /* A timestamp to be displayed below the embed, IE for when an an article was posted
                     * This must be formatted as ISO8601
                     */
                    "timestamp" => $timeStamp,

                    // The integer color to be used on the left side of the embed
                    "color" => hexdec( "5DCDC6" ),

                    // Footer object
                    "footer" => [
                        "text" => "Heficience",
                        "icon_url" => ""
                    ],

                    // Image object
                    "image" => [
                        "url" => "https://cdn.discordapp.com/attachments/904849842629672980/904850659482959952/logofinal2large.png"
                    ],

                    // Author object
                    "author" => [
                        "name" => $name,
                        "url" => "https://www.heficience.com"
                    ]
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

        $ch = curl_init();

        curl_setopt_array( $ch, [
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);

        $response = curl_exec( $ch );
        curl_close( $ch );

        $messageWarning='Formulaire envoyé à Heficience, Merci pour votre participation.';
        $colorMessageWarning="green";
        $name = "";
        $email = "";
        $message = "";

    } else {
        $messageWarning='Veuillez remplir correctement le formulaire';
        $colorMessageWarning="red";
        if (empty($name)) {
            $nameManquant = "border:red 1px solid;border-radius: 30px; border-collapse: separate;";
            $nameTextAdded = " mal renseigné";
            $nameLabelColor = "color: red";
        } else {
            $nameManquant = "";
            $nameTextAdded = "";
            $nameLabelColor = "";
        }

        if (empty($email)) {
            $emailManquant = "border:red 1px solid;border-radius: 30px; border-collapse: separate;";
	        $emailTextAdded = " mal renseigné";
            $emailLabelColor = "color: red";
        } else {
            $emailManquant = "";
            $emailTextAdded = "";
            $emailLabelColor = "";
        }

        if (empty($message)) {
            $messageManquant = "border:red 1px solid;border-radius: 30px; border-collapse: separate;";
	        $messageTextAdded = " mal renseigné";
            $messageLabelColor = "color: red";
        } else {
            $messageManquant = "";
	        $MessageTextAdded = "";
            $messageLabelColor = "";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr" itemscope>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Heficience
  </title>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1673451336336178');
        fbq('track', 'PageView');
        fbq('track', 'Contact');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=1673451336336178&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="../assets/js/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-kit.css?v=3.0.0" rel="stylesheet" />
  <!-- Cookies -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
</head>

<body class="contact-us">
  <!-- Navbar Transparent -->
  <div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
    <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
      <div class="container-fluid px-0">
        <a class="navbar-brand font-weight-bolder ms-sm-3" href="../index.php" rel="tooltip" title="Heficience" data-placement="bottom">
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
                <img src="../assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
              </a>
              <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
                <div class="d-none d-lg-block">
                  <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                    Nos Pages à parcourir
                  </h6>
                  <a href="../index.php" class="dropdown-item border-radius-md">
                    <span>Accueil</span>
                  </a>
                  <a href="./reference.html" class="dropdown-item border-radius-md">
                    <span>Nos Projets en Cours</span>
                  </a>
                  <a href="./about-us.html" class="dropdown-item border-radius-md">
                    <span>À propos de nous</span>
                  </a>
                  <a href="./contact-us.php" class="dropdown-item border-radius-md">
                    <span>Nous contacter</span>
                  </a>
                  <a href="./author.php" class="dropdown-item border-radius-md">
                    <span>Auteur de la page</span>
                  </a>
                </div>

                <div class="d-lg-none">
                  <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                    Nos Pages à parcourir
                  </h6>

                  <a href="../index.php" class="dropdown-item border-radius-md">
                    <span>Accueil</span>
                  </a>
                  <a href="./reference.html" class="dropdown-item border-radius-md">
                    <span>Nos Projets en Cours</span>
                  </a>
                  <a href="./about-us.html" class="dropdown-item border-radius-md">
                    <span>À propos de nous</span>
                  </a>
                  <a href="./contact-us.php" class="dropdown-item border-radius-md">
                    <span>Nous contacter</span>
                  </a>
                  <a href="author.php" class="dropdown-item border-radius-md">
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
  <!-- -------- START HEADER 8 w/ card over right bg image ------- -->
  <section>
    <div class="page-header min-vh-100">
      <div class="container">
        <div class="row">
          <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signin.svg'); background-size: cover;">
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
            <div class="card d-flex blur justify-content-center shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-success shadow-primary border-radius-lg p-3">
                  <h3 class="text-white text-success mb-0">Pour nous contacter</h3>
                </div>
              </div>
              <div class="card-body">
                <p class="pb-3">
                  Pour vos questions, comprenant la participation à nos projets, envoyez un email à paul.woisard@heficience.com
                  ou utilisez le formulaire de contact ci-dessous.
                </p>
                  <form id="contact-form" method="post" autocomplete="off">
                      <h2></h2>
                      <div class="card-body p-0 my-3">
                          <div class="row">
                            <label style="color:<?php echo $colorMessageWarning; ?>" > <?php echo $messageWarning; ?> </label>
                            <div class="col-md-6">
                              <div class="input-group input-group-static mb-4">
                                  <label style="<?php echo $nameLabelColor; ?>" >Votre Nom complet <?php echo $nameTextAdded; ?></label>
                                  <input name="name" type="text" class="form-control" placeholder="Nom complet" style="<?php echo $nameManquant; ?>" value="<?php echo $name; ?>">
                              </div>
                            </div>
                            <div class="col-md-6 ps-md-2">
                              <div class="input-group input-group-static mb-4">
                                  <label style="<?php echo $emailLabelColor; ?>" >Votre Email <?php echo $emailTextAdded; ?></label>
                                  <input name="email" type="email" class="form-control" placeholder="exemple@domaine.com" style="<?php echo $emailManquant; ?>" value="<?php echo $email; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="form-group mb-0 mt-md-0 mt-4">
                            <div class="input-group input-group-static mb-4">
                                <label style="<?php echo $messageLabelColor; ?>" >Décrivez votre demande <?php echo $messageTextAdded; ?></label>
                                <textarea name="message" class="form-control" id="message" placeholder="Message" rows="5" placeholder="Décrivez votre demande avec 250 caractères aux maximum." style="<?php echo $messageManquant; ?>"><?php echo $message; ?></textarea>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12 text-center">
                                  <button name="submit" type="submit" class="btn bg-gradient-success mt-3 mb-0">Envoyer votre message</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- END HEADER 8 w/ card over right bg image ------- -->
  <footer class="footer card card-body pt-5 mt-5">
    <div class="container">
      <div class=" row">
        <div class="col-md-3 mb-4 ms-auto">
          <div>
            <a href="../index.php">
              <img src="../assets/img/favicon.png" class="mb-3 footer-logo" alt="main_logo">
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
                <a class="nav-link" href="./about-us.html">
                  À propos de nous
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./reference.html">
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
                <a class="nav-link" href="./contact-us.php">
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
                <a class="nav-link" href="./legal.html">
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
              All rights reserved. Copyright © <script>document.write(new Date().getFullYear())</script> Material Kit by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>. Ainsi que © <script>document.write(new Date().getFullYear())</script> <a href="https://www.heficience.com" target="_blank">Heficience</a><br>
              Distributed By: <a href="https://www.themewagon.com" target="_blank">ThemeWagon</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="../assets/js/plugins/parallax.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="../assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>

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
