<?php
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    
    <!--Link CSS-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/styledetails.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="shortcut icon" href="../assets/img/favicon_olc.ico" type="image/x-icon">

    <!--Link Animate-->
    <link rel='stylesheet' href="../assets/css/animate.min.css">

    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>

    <!--Link Owl Carousel-->
    <link rel='stylesheet' href="../assets/css/owl.carousel.css">
    <link rel='stylesheet' href="../assets/css/owl.carousel.min.css">
    <link rel='stylesheet' href="../assets/css/owl.theme.default.css">
    <link rel='stylesheet' href="../assets/css/owl.theme.default.min.css">

    <!--Link Owl Carousel-->
    <link rel='stylesheet' href="../assets/css/slick.css">
    <link rel='stylesheet' href="../assets/css/slick-theme.css">
    <title><?php echo $pageTitle;?>Ốp lưng chất</title>
    <style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial;
  font-size: 17px;
}

#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}

.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}
</style>
  </head>
  <body>
    <?php
    @session_start();
      require('../doanadmin/modules/config.php');
      if(isset($_POST['text'])){
      $search = $_POST['content'];
      echo $search;
      }
    ?>


<video style="width: 100%;" autoplay muted loop id="myVideo">
  <source src="debut2.mp4" type="video/mp4">
</video>

<form action="" method="post" class="content d-none">
<textarea name="content" id="content" cols="30" rows="10"></textarea>
<button type="submit" name="text">Xuất</button>
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!--Link Owl Carousel-->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    
    <script src="../assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'content');
    </script>

<script>
  $(document).ready(function () {
    $('#text').keyup(function (){
        var value = $(this).val().toLowerCase();
        var show = $('#show');
        if(value.search('hồ chí minh')){
            show.text('30000');
        }else{
            show.text('50000');
        }
    });
    
  });

</script>
    <!-- Place your kit's code here -->
    <script src="../assets/js/fontawesome.js"></script>

    <!-- WOW JS -->
    <script src="../assets/js/wow.min.js"></script>

    <!-- Owl Carousel-->
    <script src="../assets/js/owl.carousel.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>

    <!-- Optional JavaScript -->
    <script src="../assets/js/note.js"></script>

  </body>
</html>