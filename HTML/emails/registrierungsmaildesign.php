  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="shortcut icon" type="image/x-icon" href="../../Images/favicon.ico" />
      <link rel="stylesheet" href="../../bootstrap stuff/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      
    </head>
  <body>

      <p>Registrierungsmail</p>

      <?php
    // Retrieve the password from the query parameter
    $pw = isset($_GET['pw']) ? htmlspecialchars($_GET['pw']) : '';
    echo "<p>Password: $pw</p>";
    ?>
      
    </body>

    <script src="../../JS/registration.js"></script>

  </html>