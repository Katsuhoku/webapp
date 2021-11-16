<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  $current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>   
  <head>
      <title>Trueques FCC</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"></script>
      <script src="js/script.js"></script>
  </head>

  <body>
      <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top navbar-scroll">
              <div class="container-fluid">
                  <a class="navbar-brand" href="./index">
                      <img src="./img/logo.png" alt="" width="56" height="56" class="d-inline-block align-text-center">
                      Trueques FCC
                  </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                  <?php
                  if ($_SESSION == null || !array_key_exists('type', $_SESSION)) {
                    require_once("./components/header/internet_user.php");
                  } else {
                      if ($_SESSION['type'] == 1)
                        require_once("./components/header/admi.php");
                      else
                        require_once("./components/header/user.php");   
                  }
                  ?>
                </div>
              </div>
            </nav>
      </header>