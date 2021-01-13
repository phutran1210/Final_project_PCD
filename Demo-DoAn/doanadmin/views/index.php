<?php
  session_start();
  if(!isset($_SESSION['login'])){
    header('location:login.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/doan/assets/css/bootstrap.min.css">
    <!--Link CSS-->
    <link rel="stylesheet" href="/doan/assets/css/style.css">
    <link rel="shortcut icon" href="/doan/assets/img/favicon_olc.ico" type="image/x-icon">

    <title>Quản lý website Ốp lưng chất</title>
  </head>
  <body>
    
    <?php

      require('../modules/config.php');
      require('../modules/header.php');
      require('../modules/content.php');
      require('../modules/footer.php');
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/doan/assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="/doan/assets/js/popper.min.js"></script>
    <script src="/doan/assets/js/bootstrap.min.js"></script>
    
    <!-- Place your kit's code here -->
    <script src="/doan/assets/js/fontawesome.js"></script>
    <!-- Place your kit's code here -->
    <script src="/doan/assets/js/bs-custom-file-input.js"></script>
    <script src="/doan/assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'content', {
          uiColor: '#dc3545'
       });
    </script>

    <script>
      $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
          bsCustomFileInput.init()
      });
    </script>
  </body>
</html>