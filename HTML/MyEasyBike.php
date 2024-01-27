<?php

$mail = isset($_GET['username']) ? urldecode($_GET['username']) : "";
$lastname = "Unknown";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql1 = "SELECT lastname, user_date_past, user_weekday_past FROM user WHERE usernameID = '$mail'";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
  // Datensatz gefunden
  $row = $result->fetch_assoc();
  $lastname = $row["lastname"];

  $datePast = $row["user_date_past"];
  $weekdayPast = $row["user_weekday_past"];


}


// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Images/favicon.ico" />
    <link rel="stylesheet" href="../bootstrap stuff/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/MyEasyBike.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
  let phpOnlineCount = 0;

  $(document).ready(function() {
    setInterval(function() {
      $.ajax({
        url: '../PHP/howManyUsersOnline.php',
        success: function(onlineCount) {
          phpOnlineCount = onlineCount;
          updateOnlineCount();
        }
      });
    }, 1000);
  });

  function updateOnlineCount() {
    document.getElementById("userOnline").textContent = phpOnlineCount;
  }
</script>
    
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top bg-transparent">
        
            <div class="container-fluid">
              <a class="navbar-brand" href="../index.html" style="color: rgb(255, 0, 0);"><b><button class="btn btn-bd-primary-2 btn-lg">easybike.</button></b></a>
              <button class="position-absolute top-0 start-50 translate-middle-x" type="button" style="background: transparent; border: none; align-items: center; margin-right: -302px;" class="position-relative">
                <a href="#"><span><b><ion-icon name="cart-outline" style="color: red; height: 60px; width: 50px; background: transparent;"></ion-icon></b></span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-top:  15px;">
                  1+
                  <span class="visually-hidden">unread messages</span>
              </button>
              <button class="navbar-toggler position-absolute top-0 end-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span><b><ion-icon name="grid-outline" style="color: red; height: 60px; width: 50px;"></ion-icon></b></span>
              </button>
              
              <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel" style="color: rgb(255, 0, 0);">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel" style="color: rgb(255, 0, 0);"><b>easybike.</b></h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      <a class="nav-link" href="MyEasyBike.html" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                          Modell's
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-center">
                          <li><a class="dropdown-item" href="PanigaleV4R.html" style="color: white;"><img id="imgDropdownV4R" src="../Images/PANV4R_SPIN_SCARICO_ALTO_E_FRIZIONE.png.webp" alt=""></a></li>
                          <li><a class="dropdown-item" href="SuperleggeraV4.html" style="color: white;"><img id="imgDropdown" src="../Images/SLV4-01-Model-Preview-1050x650.jpg.png" alt=""></a></li>
                          <li><a class="dropdown-item" href="Hypermotard.html" style="color: white;"><img id="imgDropdown" src="../Images/Hypermotard-950-SP-MY22-Model.png" alt=""></a></li>
                          <li><a class="dropdown-item" href="Streetfighter.html" style="color: white;"><img id="imgDropdownV4SP2" src="../Images/SFV4_SP2_00.png.webp" alt=""></a></li>
                          <li><a class="dropdown-item" href="HondaFireblade.html" style="color: white;"><img id="imgDropdownFire" src="../Images/fireblade.png" alt=""></a></li>
                        </ul>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Gear.html" style="color: white;">Gear</a>
                    </li>
                    
                  </ul> 
                </div>
              </div>
            </div>
          </nav>
    </header>
    <section>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="bootstrap" viewBox="0 0 118 94">
        <title>Bootstrap</title>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
      </symbol>
      <symbol id="home" viewBox="0 0 16 16">
        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
      </symbol>
      <symbol id="speedometer2" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
        <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
      </symbol>
      <symbol id="table" viewBox="0 0 16 16">
        <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
      </symbol>
      <symbol id="people-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </symbol>
      <symbol id="grid" viewBox="0 0 16 16">
        <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
      </symbol>
    </svg>
    <main class="d-flex flex-nowrap" data-bs-theme="dark">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
      <p aria-hidden="true">
        <span class="placeholder col-0"></span>
      </p>
      <hr class="hr">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item-2">
          <a href="MyEasyBike.html" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="20" height="20"><use xlink:href="#home"/></svg>
            Home
          </a>
        </li>
        <li class="nav-item-2">
          <a href="#USER Information" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="20" height="20"><use xlink:href="#people-circle"/></svg>
            Your Information
          </a>
        </li>
        <li class="nav-item-2">
          <a href="#Dashboard" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="20" height="20"><use xlink:href="#speedometer2"/></svg>
            Dashboard
          </a>
        </li>
        <li class="nav-item-2">
          <a href="#Orders" class="nav-link link-body-emphasis">
            <svg class="bi pe-none me-2" width="20" height="20"><use xlink:href="#table"/></svg>
            Orders
          </a>
        </li>
      </ul>
      <hr class="hr">
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <svg class="bi pe-none me-2" width="32" height="32"><use xlink:href="#people-circle"/></svg>
          <strong>USER</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
    </main>
    <section style="margin-left: 300px;" id="USER Information">
      <div class="container px-4 py-5" id="custom-cards">
          <h2 class="pb-2 border-bottom border-black border-2" style="text-align: center; color: black;margin-top: 20px;">Welcome Mr/Mrs <?php echo $lastname;?> to <b style="color: red;">easybike.</b><br>You were last online on <b><?php echo $weekdayPast, $datePast;?></b></h2>
      </div>
      <div class="container">
      <div class="row row-cols-1 row-cols-md-2 g-4">
          <div class="col">
            <div class="card" style="text-align: center;">
              <img src="../Images/motor.avif" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Engine</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="text-align: center;">
              <img src="../Images/motor.avif" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="text-align: center;">
              <img src="../Images/motor.avif" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="text-align: center;">
              <img src="../Images/motor.avif" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card" style="text-align: center;">
              <img src="../Images/motor.avif" class="card-img-top" alt="...">
              <div class="card-body">
              <button type="button" class="btn btn-primary">
  Currently online <span class="badge badge-light"><p id = "userOnline"></p></span>
</button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>


  <div class="container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interaval="2000">
                <img src="../Images/Ducati-Panigale-V4R-MY23-overview-gallery-02-1920x1080.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="../Images/PANV4R_SPIN_SCARICO_ALTO_E_FRIZIONE.png.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="../.Images/Ducati-Panigale-V-4-R-169.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
    </div>


    

    
</body>
</html>


<?php
$mail = isset($_GET['username']) ? urldecode($_GET['username']) : "";
$lastname = "Unknown";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "main_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql2 = "SELECT lastname, user_date_past, user_weekday_past, user_date_now, user_weekday_now FROM user WHERE usernameID = '$mail'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
  // Datensatz gefunden
  $row = $result->fetch_assoc();
  $lastname = $row["lastname"];

  $dateNow = $row["user_date_now"];
  $weekdayNow = $row["user_weekday_now"];
$sql3 = "UPDATE user SET user_date_past = '$dateNow', user_weekday_past = '$weekdayNow' WHERE usernameID = '$mail'";
$result = $conn->query($sql3);
}
?>