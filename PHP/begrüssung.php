

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
    <link rel="stylesheet" href="../CSS/shophelm1.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

    <header>
        <nav class="navbar navbar-dark bg-dark fixed-top bg-transparent">
            <div class="container-fluid">
              <a class="navbar-brand" href="../index.html" style="color: rgb(255, 0, 0);"><b><button class=" btn btn-bd-primary-2 btn-lg">easybike.</button></b></a>
              <button class="position-absolute top-0 start-50 translate-middle-x" type="button" style="background: transparent; border: none; align-items: center; margin-right: 32px;" class="position-relative">
                <a href="#"><span><b><ion-icon name="cart-outline" style="color: red; height: 60px; width: 50px; background: transparent;"></ion-icon></b></span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="margin-top:  15px;">
                  1+
                  <span class="visually-hidden">unread messages</span>
              </button>
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
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
                      <a class="nav-link" href="#" style="color: white;">Gear</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                        MYEASYBIKE
                      </a>
                      <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="login.html" style="color: white;">Login</a></li>
                        <li><a class="dropdown-item" href="Registration.html" style="color: white;">Register</a></li>
                        <li><button class="dropdown-item" id="button" onclick="" style="color: white;">Logout</button></li>
                      </ul>
                    </li>
                  </ul> 
                </div>
              </div>
            </div>
          </nav>
    </header>
   
    <section>
    
      <div class="container text-center" style="margin-top: 250px;">
            <div class="card" style="width: 100%; height: 100%;">
              <div class="card-body">
                <h5 class="card-title"><b>Herzlich willkommen Herr/Frau<?php echo $lastname;?></b></h5>
                <br>
                <p class="card-text">Sie waren zuletzt am ... online<br>

              </div>
              
              
            </div>
      </section>
      
    
    
</body>
</html>