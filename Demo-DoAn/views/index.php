<?php
  session_start();
  //unset($_SESSION['product']);
  $pageTitle = '';
  if(!isset($_GET['manage'])){
    $pageTitle = '';
  }else{
    if($_GET['manage'] == 'about'){
      $pageTitle = 'Giới thiệu | ';
    }elseif($_GET['manage'] == 'payment_delivery'){
      $pageTitle = 'Thanh toán & giao nhận | ';
    }elseif($_GET['manage'] == 'terms_of_use'){
      $pageTitle = 'Điều khoản sử dụng | ';
    }elseif($_GET['manage'] == 'contact'){
      $pageTitle = 'Liên hệ | ';
    }elseif($_GET['manage'] == 'product_detail'){
      $pageTitle = 'Chi tiết sản phẩm | ';
    }elseif($_GET['manage'] == 'order'){
      $pageTitle = 'Giỏ hàng | ';
    }elseif($_GET['manage'] == 'news'){
      $pageTitle = 'Tin tức | ';
    }elseif($_GET['manage'] == 'user'){
      $pageTitle = 'Thông tin khách hàng | ';
    }elseif($_GET['manage'] == 'view_cart'){
      $pageTitle = 'Thông tin đơn hàng | ';
    }
    
  }
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
  </head>
  <body>
    <?php
      require('../doanadmin/modules/config.php');
      require('../modules/header.php');
      require('../modules/menu.php');
      require('../modules/content.php');
      require('../modules/footer.php');
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

    <!--Link Owl Carousel-->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    

<script>
  $(document).ready(function () {

    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: true,
      centerMode: true,
      focusOnSelect: true
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
    <script src="../assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'content');
    </script>

  </body>
</html>