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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    if (!empty($name) and !empty($email) and !empty($message)) {
        // Replace the URL with your own webhook url
        $url = "https://discord.com/api/webhooks/926452833329512478/i5tI4WgM2Oo4OE54HXuVRep5m80I9dMnXV868JRJCn6Pu5D9Wd5M6l78KPv1-9CaMIIx";

        $timeStamp = date('Y-m-d\TH:i:sO');

        $name_title = "**Nom : **" . $name;
        $description =  "**Email : **" . $email . "\n**Message : **" . $message;
        $hookObject = json_encode([
            /*
             * The general "message" shown above your embeds
             */
            "content" => "",
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

    } else {
        $message='Formulaire non complété correctement';
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
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
</head>

<body class="blog-author bg-gray-200">
  <!-- Navbar Transparent -->
  <div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
    <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
      <div class="container-fluid px-0">
        <a class="navbar-brand font-weight-bolder ms-sm-3" href="../index.html" rel="tooltip" title="Heficience" data-placement="bottom">
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
                  <a href="../index.html" class="dropdown-item border-radius-md">
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

                  <a href="../index.html" class="dropdown-item border-radius-md">
                    <span>Accueil</span>
                  </a>
                  <a href="./reference.html" class="dropdown-item border-radius-md">
                    <span>Nos Projets en Cours</span>
                  </a>
                  <a href="./about-us.html" class="dropdown-item border-radius-md">
                    <span>À propos de nous</span>
                  </a>
                  <a href="contact-us.php" class="dropdown-item border-radius-md">
                    <span>Nous contacter</span>
                  </a>
                  <a href="./author.php" class="dropdown-item border-radius-md">
                    <span>Auteur de la page</span>
                  </a>
                </div>

              </div>
            </li>

            <!--<li class="nav-item dropdown dropdown-hover mx-2">
              <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons opacity-6 me-2 text-md">view_day</i>
                Sections
                <img src="../assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuBlocks">
                <div class="d-none d-lg-block">
                  <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="./presentation.html">
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Page Sections</h6>
                          <span class="text-sm">See all sections</span>
                        </div>
                        <img src="../assets/img/down-arrow.svg" alt="down-arrow" class="arrow">
                      </div>
                    </a>
                    <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/page-sections/hero-sections.html">
                        Page Headers
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/page-sections/features.html">
                        Features
                      </a>
                    </div>
                  </li>

                  <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="../presentation.html">
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Navigation</h6>
                          <span class="text-sm">See all navigations</span>
                        </div>
                        <img src="../assets/img/down-arrow.svg" alt="down-arrow" class="arrow">
                      </div>
                    </a>
                    <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/navigation/navbars.html">
                        Navbars
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/navigation/nav-tabs.html">
                        Nav Tabs
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/navigation/pagination.html">
                        Pagination
                      </a>
                    </div>
                  </li>

                  <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="../presentation.html">
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Input Areas</h6>
                          <span class="text-sm">See all input areas</span>
                        </div>
                        <img src="../assets/img/down-arrow.svg" alt="down-arrow" class="arrow">
                      </div>
                    </a>
                    <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/input-areas/inputs.html">
                        Inputs
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/input-areas/forms.html">
                        Forms
                      </a>
                    </div>
                  </li>

                  <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="../presentation.html">
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Attention Catchers</h6>
                          <span class="text-sm">See all examples</span>
                        </div>
                        <img src="../assets/img/down-arrow.svg" alt="down-arrow" class="arrow">
                      </div>
                    </a>
                    <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/attention-catchers/alerts.html">
                        Alerts
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/attention-catchers/modals.html">
                        Modals
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/attention-catchers/tooltips-popovers.html">
                        Tooltips & Popovers
                      </a>
                    </div>
                  </li>

                  <li class="nav-item dropdown dropdown-hover dropdown-subitem">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="../presentation.html">
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Elements</h6>
                          <span class="text-sm">See all elements</span>
                        </div>

                        <img src="../assets/img/down-arrow.svg" alt="down-arrow" class="arrow">
                      </div>
                    </a>
                    <div class="dropdown-menu mt-0 py-3 px-2 mt-3">
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/avatars.html">
                        Avatars
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/badges.html">
                        Badges
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/breadcrumbs.html">
                        Breadcrumbs
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/buttons.html">
                        Buttons
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/dropdowns.html">
                        Dropdowns
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/progress-bars.html">
                        Progress Bars
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/toggles.html">
                        Toggles
                      </a>
                      <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/typography.html">
                        Typography
                      </a>
                    </div>
                  </li>
                </div>

                <div class="row d-lg-none">
                  <div class="col-md-12">
                    <div class="d-flex mb-2">
                      <div class="icon h-10 me-3 d-flex mt-1">
                        <i class="ni ni-single-copy-04 text-gradient text-primary"></i>
                      </div>
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Page Sections</h6>
                        </div>
                      </div>
                    </div>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/page-sections/hero-sections.html">
                      Page Headers
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/page-sections/features.html">
                      Features
                    </a>

                    <div class="d-flex mb-2 mt-3">
                      <div class="icon h-10 me-3 d-flex mt-1">
                        <i class="ni ni-laptop text-gradient text-primary"></i>
                      </div>
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Navigation</h6>
                        </div>
                      </div>
                    </div>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/navigation/navbars.html">
                      Navbars
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/navigation/nav-tabs.html">
                      Nav Tabs
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/navigation/pagination.html">
                      Pagination
                    </a>


                    <div class="d-flex mb-2 mt-3">
                      <div class="icon h-10 me-3 d-flex mt-1">
                        <i class="ni ni-badge text-gradient text-primary"></i>
                      </div>
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Input Areas</h6>
                        </div>
                      </div>
                    </div>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/input-areas/inputs.html">
                      Inputs
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/input-areas/forms.html">
                      Forms
                    </a>


                    <div class="d-flex mb-2 mt-3">
                      <div class="icon h-10 me-3 d-flex mt-1">
                        <i class="ni ni-notification-70 text-gradient text-primary"></i>
                      </div>
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Attention Catchers</h6>
                        </div>
                      </div>
                    </div>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/attention-catchers/alerts.html">
                      Alerts
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/attention-catchers/modals.html">
                      Modals
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/attention-catchers/tooltips-popovers.html">
                      Tooltips & Popovers
                    </a>


                    <div class="d-flex mb-2 mt-3">
                      <div class="icon h-10 me-3 d-flex mt-1">
                        <i class="ni ni-app text-gradient text-primary"></i>
                      </div>
                      <div class="w-100 d-flex align-items-center justify-content-between">
                        <div>
                          <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Elements</h6>
                        </div>
                      </div>
                    </div>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/avatars.html">
                      Avatars
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/badges.html">
                      Badges
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/breadcrumbs.html">
                      Breadcrumbs
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/buttons.html">
                      Buttons
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/dropdowns.html">
                      Dropdowns
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/progress-bars.html">
                      Progress Bars
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/toggles.html">
                      Toggles
                    </a>
                    <a class="dropdown-item ps-3 border-radius-md mb-1" href="../sections/elements/typography.html">
                      Typography
                    </a>
                  </div>
                </div>

              </ul>
            </li>

            <li class="nav-item dropdown dropdown-hover mx-2">
              <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons opacity-6 me-2 text-md">article</i>
                Docs
                <img src="../assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
              </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg" aria-labelledby="dropdownMenuDocs">
                <div class="d-none d-lg-block">
                  <ul class="list-group">
                    <li class="nav-item list-group-item border-0 p-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href=" https://www.creative-tim.com/learning-lab/bootstrap/overview/material-kit ">
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Getting Started</h6>
                        <span class="text-sm">All about overview, quick start, license and contents</span>
                      </a>
                    </li>
                    <li class="nav-item list-group-item border-0 p-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href=" https://www.creative-tim.com/learning-lab/bootstrap/colors/material-kit ">
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Foundation</h6>
                        <span class="text-sm">See our colors, icons and typography</span>
                      </a>
                    </li>
                    <li class="nav-item list-group-item border-0 p-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href=" https://www.creative-tim.com/learning-lab/bootstrap/alerts/material-kit ">
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Components</h6>
                        <span class="text-sm">Explore our collection of fully designed components</span>
                      </a>
                    </li>
                    <li class="nav-item list-group-item border-0 p-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href=" https://www.creative-tim.com/learning-lab/bootstrap/datepicker/material-kit ">
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Plugins</h6>
                        <span class="text-sm">Check how you can integrate our plugins</span>
                      </a>
                    </li>
                    <li class="nav-item list-group-item border-0 p-0">
                      <a class="dropdown-item py-2 ps-3 border-radius-md" href=" https://www.creative-tim.com/learning-lab/bootstrap/utilities/material-kit ">
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Utility Classes</h6>
                        <span class="text-sm">For those who want flexibility, use our utility classes</span>
                      </a>
                    </li>
                  </ul>
                </div>

                <div class="row d-lg-none">
                  <div class="col-md-12 g-0">
                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="./about-us.html">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Getting Started</h6>
                      <span class="text-sm">All about overview, quick start, license and contents</span>
                    </a>

                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="./about-us.html">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Foundation</h6>
                      <span class="text-sm">See our colors, icons and typography</span>
                    </a>

                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="./about-us.html">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Components</h6>
                      <span class="text-sm">Explore our collection of fully designed components</span>
                    </a>

                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="./about-us.html">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Plugins</h6>
                      <span class="text-sm">Check how you can integrate our plugins</span>
                    </a>

                    <a class="dropdown-item py-2 ps-3 border-radius-md" href="./about-us.html">
                      <h6 class="dropdown-header text-dark font-weight-bolder d-flex justify-content-cente align-items-center p-0">Utility Classes</h6>
                      <span class="text-sm">For those who want flexibility, use our utility classes</span>
                    </a>
                  </div>
                </div>

              </ul>
            </li>-->
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
  <!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
  <header>
    <div class="page-header min-height-400" style="background-image: url('../assets/img/tours.jpg');">
      <span class="mask bg-gradient-dark opacity-8"></span>
    </div>
  </header>
  <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
  <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
    <!-- START Testimonials w/ user image & text & info -->
    <section class="py-sm-7 py-5 position-relative">
      <div class="container">
        <div class="row">
          <div class="col-12 mx-auto">
            <div class="mt-n8 mt-md-n9 text-center">
              <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="../assets/img/bruce-mars.jpg" alt="bruce" loading="lazy">
            </div>
            <div class="row py-5">
              <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h3 class="mb-0">PaulW</h3>
                  <div class="d-block">
                    <a target="_blank" href="https://twitter.com/PaulWOISARD?ref_src=twsrc%5Etfw" class="btn btn-sm btn-outline-info text-nowrap mb-0" data-show-count="false">Suivez-Moi</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <!--<button type="button" onclick="window.location.href='/page2'" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>-->
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-auto">
                    <span class="h6">211</span>
                    <span>Posts</span>
                  </div>
                  <div class="col-auto">
                    <span class="h6">28</span>
                    <span>Followers</span>
                  </div>
                  <div class="col-auto">
                    <span class="h6">21</span>
                    <span>Following</span>
                  </div>
                </div>
                <p class="text-lg mb-0">
                  Ayant durant plusieurs années à bosser sur le projet Handy Open Source,
                  une association aujourd'hui dissoute j'ai décidé de continuer mes activités
                  de développeur de logiciels d'accessibilité pour le plus grand nombre au sein d'Heficience.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END Testimonials w/ user image & text & info -->
    <section class="py-sm-7 py-5 position-relative">
      <div class="container">
        <div class="row">
          <div class="col-12 mx-auto">
            <div class="row py-5">
              <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                <p class="text-lg mb-0">
                  J'ai utilisé le modèle de site web Material Kit 2 de Creative Tim : https://www.creative-tim.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <section class="py-lg-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card box-shadow-xl overflow-hidden mb-5">
            <div class="row">
              <div class="col-lg-5 position-relative bg-cover px-0" style="background-image: url('../assets/img/tours.jpg')">
                <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                  <div class="mask bg-gradient-dark opacity-8"></div>
                  <div class="p-5 ps-sm-8 position-relative text-start my-auto z-index-2">
                    <h3 class="text-white">Contact pour plus d'Information</h3>
                    <p class="text-white opacity-8 mb-4">Remplissez le formulaire et on vous répond sous 24 heures.</p>
                    <div class="d-flex p-2 text-white">
                      <div>
                        <i class="fas fa-phone text-sm"></i>
                      </div>
                      <div class="ps-3">
                        <span class="text-sm opacity-8">(+33) 6 15 17 73 00</span>
                      </div>
                    </div>
                    <div class="d-flex p-2 text-white">
                      <div>
                        <i class="fas fa-envelope text-sm"></i>
                      </div>
                      <div class="ps-3">
                        <span class="text-sm opacity-8">paulwoisard@gmail.com</span>
                      </div>
                    </div>
                    <div class="d-flex p-2 text-white">
                      <div>
                        <i class="fas fa-map-marker-alt text-sm"></i>
                      </div>
                      <div class="ps-3">
                        <span class="text-sm opacity-8">All around the planet.</span>
                      </div>
                    </div>
                    <div class="mt-4">
                      <a target="_blank" href="https://www.facebook.com/Heficience"><i class="fab fa-facebook text-lg text-white me-4"></i></a>
                      <a target="_blank" href="https://www.tiktok.com/@heficience"><i class="fab fa-tiktok text-lg text-white me-4"></i></a>
                      <a target="_blank" href="https://twitter.com/heficience"><i class="fab fa-twitter text-lg text-white me-4"></i></a>
                      <a target="_blank" href="https://discord.gg/2dxKDJ2RNK"><i class="fab fa-discord text-lg text-white"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7">
                <form id="contact-form" method="post" autocomplete="off">
                  <h2></h2>
                  <div class="card-body p-0 my-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group input-group-static mb-4">
                          <label>Votre Nom complet</label>
                          <input name="name" type="text" class="form-control" placeholder="Nom complet">
                        </div>
                      </div>
                      <div class="col-md-6 ps-md-2">
                        <div class="input-group input-group-static mb-4">
                          <label>Votre Email</label>
                          <input name="email" type="email" class="form-control" placeholder="exemple@domaine.com">
                        </div>
                      </div>
                    </div>
                    <div class="form-group mb-0 mt-md-0 mt-4">
                      <div class="input-group input-group-static mb-4">
                        <label>Décrivez votre demande</label>
                        <textarea name="message" class="form-control" id="message" placeholder="Message" rows="5" placeholder="Décrivez votre demande avec 250 caractères aux maximum."></textarea>
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
  <!-- -------- START FOOTER 5 w/ DARK BACKGROUND ------- -->
  <footer class="footer card card-body pt-5 mt-5">
    <div class="container">
      <div class=" row">
        <div class="col-md-3 mb-4 ms-auto">
          <div>
            <a href="../index.html">
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
        <!--<div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Resources</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="https://iradesign.io/" target="_blank">
                  Illustrations
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/bits" target="_blank">
                  Bits & Snippets
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/affiliates/new" target="_blank">
                  Affiliate Program
                </a>
              </li>
            </ul>
          </div>
        </div>-->

        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-sm">Aides et Support</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="contact-us.php">
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
              <!--<li class="nav-item">
                <a class="nav-link" href="https://www.creative-tim.com/sponsorships" target="_blank">
                  Sponsorships
                </a>
              </li>-->

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
  <!-- -------- END FOOTER 5 w/ DARK BACKGROUND ------- -->
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
</body>

</html>