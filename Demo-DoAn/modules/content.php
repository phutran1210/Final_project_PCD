<?php
    if(isset($_GET['manage']) && $_GET['manage'] != ''){
        $tam = $_GET['manage'];
    }else{
        $tam = '';
    }
    if($tam == 'about'){
        require('../modules/about/about.php');
    }elseif($tam == 'contact'){
        require('../modules/about/contact.php');
    }elseif($tam == 'product_detail'){
        require('../modules/product/product_detail.php');
    }elseif($tam == 'payment_delivery'){
        require('../modules/about/payment_delivery.php');
    }elseif($tam == 'typeproduct'){
        require('../modules/product/producstlistbytype.php');
    }elseif($tam == 'terms_of_use'){
        require('../modules/about/terms_of_use.php');
    }elseif($tam == 'login'){
        require('../modules/user/login.php');
    }elseif($tam == 'updateuser'){
        require('../modules/user/update.php');
    }elseif($tam == 'allproduct'){
        require('../modules/product/allproduct.php');
    }elseif($tam == 'search'){
        require('../modules/search.php');
    }elseif($tam == 'registration'){
        require('../modules/user/registration.php');
    }elseif($tam == 'view_cart'){
        require('../modules/user/view_cart.php');
    }elseif($tam == 'news'){
        require('../modules/news/news.php');
    }elseif($tam == 'news_detail'){
        require('../modules/news/news_detail.php');
    }elseif($tam == 'user'){
        require('../modules/user/user_detail.php');
    }elseif($tam == 'thankyou'){
        require('../modules/cart/thankyou.php');
    }elseif($tam == 'order'){
        require('../modules/cart/cart.php');
    }else{
        require('../modules/product/newproduct.php');
    }
?>