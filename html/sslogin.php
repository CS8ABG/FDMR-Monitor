<?php
session_start();
include_once "ssconfunc.php";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = $_POST['callsign'];
  $password = $_POST['password'];

  if (authenticateUser($username, $password)) {
      header("Location: ssmain.php");
      exit();
  } else {
      // error message
      $errorMsg = "<span>Invalid callsign or password. Please try again.</span>";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Page Title -->
  <title>FreeDMR</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="img/favicon.ico">
  <!-- Site Description -->
  <meta name="description" content="FreeDMR Dashboard">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/adminlte/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode layout-top-nav layout-navbar-fixed text-sm">
  <div class="wrapper">
    <?php if ($display_preloader): ?>
    <div class="preloader flex-column justify-content-center align-items-center">
      <!-- Preload small icon -->
      <img class="animation__wobble" src="img/Logo_mini.png" alt="" height="60" width="60">
    </div>
    <?php endif; ?>
    <?php include 'include/navbar.php';?>
    <!-- Background image -->
    <!-- <div class="content-wrapper" style="background-image: url('img/bk.jpg'); background-attachment: fixed;"> -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container">
          <div class="row mb-2 justify-content-center">
            <div class="col-sm-auto">
              <!-- Header logo -->
              <img src="../img/logo.png" alt="FreeDMR" width="100%">
            </div>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="container">
          <div class="row justify-content-center">
            <div class="login-box">
              <div class="login-logo">
                <a href="#">Self Service</a>
              </div>
              <div class="card">
                <div class="card-body">
                  <!-- <p class="login-box-msg">Iniciar Sessão</p> -->
                  <?php if (isset($errorMsg)): ?>
                  <p class="text-center">
                    <?php echo $errorMsg; ?>
                  </p>
                  <?php endif; ?>

                  <form action="sslogin.php" method="post">
                    <div class="input-group mb-3 mt-4">
                      <input type="text" class="form-control" name="callsign" placeholder="" id="sslog_call" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class=" fas fa-broadcast-tower"></i>
                        </div>
                      </div>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" name="password" placeholder="" min="6" id="sslog_pass" required>
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8">
                      </div>
                      <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" id="sslog_login"></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mb-5">
            <div class="login-box mt-5 col-8">
              <div class="card">

                <div class="card-body ">
                  <b><p class="text-center" id="sslog_use"></p></b>
                  <span id="sslog_instruc"></span><br><br>
                  <span>Pi-star:</span>
                  <img src="img/pi-star_pass.png" alt="" width="100%" class="mt-1"><br><br>
                  <span>WPSD:</span>
                  <img src="img/wpsd_pass.png" alt="" width="100%" class="mb-4">
                 
                </div>
              </div>
            </div>
          </div>
          <div>
            <br>
          </div>
        </div>
      </div>
    </div>
    <footer class="main-footer text-sm">
      <?php include 'include/footer.php';?>
    </footer>
  </div>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="scripts/mode.js"></script>
  <script src="plugins/adminlte/js/adminlte.min.js"></script>
  <script src="scripts/monitor.js"></script>
</body>

</html>